<?php
/**
 * Main class for module Blogger
 * 
 * @package      WebGuru3
 * @subpackage   modules/Blogger/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        11. June 2009
 */

class moduleBlogger {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	
    /**
     * $blogID - Blog ID used for demo operations
     *
     * @var string
     */
    public $blogID; 

    /**
     * $gdClient - Client class used to communicate with the Blogger service
     *
     * @var Zend_Gdata_Client
     */
    public $gdClient; 
	
    public function __construct() {
		$this->_init();
	}
	
	private function _init() {
		$this->name    = 'Blogger';
		$this->code    = 'blogger';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';

		require_once('Zend/Loader.php');
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_Query');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Uri_Http');
		Zend_Loader::loadClass('Zend_Http_Client_Adapter_Socket');
		
	}
	
	// ------------------------- class functions -------------------------
	
    public function connect($email, $password, $blogId=NULL) {
    	try {
			$client = Zend_Gdata_ClientLogin::getHttpClient($email, $password, 'blogger');
	        $this->gdClient = new Zend_Gdata($client);
	        $blogId = $this->connectBlog($blogId);
	        return $blogId;
	    }
		catch (Exception $err) { wgError::add($err->getMessage());
			$this->resetConnection();
			return false;
		}
    }
    
    public function isConnected() {
    	return (bool) $this->gdClient;
    }
    
    public function connectBlog($id=NULL) {
    	$bl = $this->getUserBlogs();
    	if (!(bool) $id) foreach ($bl as $k=>$bl) {
    		$this->blogID = $k;
    		return $k;
    	}
    	elseif (isset($bl[$id])) {
    		$this->blogID = $id;
    		return $id;
    	}
    	else {
    		$this->resetConnection();
    		return false;
    	}
    }
    
    public function resetConnection() {
    	$this->gdClient = NULL;
		$this->blogID = NULL;
		return true;
    }
    
    public function getUserBlogs() {
    	if (!$this->isConnected()) return array();
    	$query = new Zend_Gdata_Query('http://www.blogger.com/feeds/default/blogs');
        $feed = $this->gdClient->getFeed($query);
        return $this->parseBlogFeed($feed);
    }
    
    public function parseBlogFeed($feed) {
        $new = array();
    	foreach($feed->entries as $k=>$entry) {
            $id = split('-', $entry->id->text);
    		$new[$id[2]] = $entry->title->text;
        }
        return $new;
    }

    public function getAllPosts() {
        if (!$this->isConnected()) return array();
    	$query = new Zend_Gdata_Query('http://www.blogger.com/feeds/' . $this->blogID . '/posts/default');
        $feed = $this->gdClient->getFeed($query);
        return $this->parsePostFeed($feed);
    }
    
    public function parsePostFeed($feed) {
        $new = array();
    	foreach($feed->entries as $k=>$entry) {
    		$id = split('-', $entry->id->text);
            $new[$k]['id'] = $id[2];
            $new[$k]['title'] = $entry->title->text;
            $new[$k]['text'] = $entry->content->text;
            $new[$k]['published'] = date('Y.m.d H:i:s', strtotime($entry->published->text));
            $new[$k]['updated'] = date('Y.m.d H:i:s', strtotime($entry->updated->text));
            $new[$k]['author']['name'] = $entry->author[0]->name->text;
            $new[$k]['author']['email'] = $entry->author[0]->email->text;
            $new[$k]['author']['uri'] = $entry->author[0]->uri->text;
            $new[$k]['draft'] = (isset($entry->control->draft->text) && strtolower($entry->control->draft->text) == 'yes') ? 1 : 0;
    	}
        return $new;
    }
    
    public function createPost($title, $content, $isDraft=False) {
        Zend_Loader::loadClass('Zend_Gdata_Kind_EventEntry');
    	$uri = 'http://www.blogger.com/feeds/' . $this->blogID . '/posts/default';
		$entry = $this->gdClient->newEventEntry();
		$entry->title = $this->gdClient->newTitle(trim($title));
		$entry->content = $this->gdClient->newContent($content);
		$entry->content->setType('text');
		$control = $this->gdClient->newControl();
		$draft = $this->gdClient->newDraft('yes');
		$control->setDraft($draft);
		$entry->control = $control;
		exit();
		$createdPost = $this->gdClient->insertEntry($entry, $uri);
		$idText = split('-', $createdPost->id->text);
		return $idText[2];
    }
    

    /**
     * Retrieves the specified post and updates the title and body. Also sets
     * the post's draft status.
     *
     * @param string  $postID         The ID of the post to update. PostID in <id> field:
     *                                tag:blogger.com,1999:blog-blogID.post-postID
     * @param string  $updatedTitle   The new title of the post.
     * @param string  $updatedContent The new body of the post.
     * @param boolean $isDraft        Whether the post will be published or saved as a draft.
     * @return Zend_Gdata_Entry The updated post. 
     */
    public function updatePost($postID, $updatedTitle, $updatedContent, $isDraft) {
        $query = new Zend_Gdata_Query('http://www.blogger.com/feeds/' . $this->blogID . '/posts/default/' . $postID); 
        $postToUpdate = $this->gdClient->getEntry($query);
        $postToUpdate->title->text = $this->gdClient->newTitle(trim($updatedTitle));
        $postToUpdate->content->text = $this->gdClient->newContent(trim($updatedContent));

        if ($isDraft) {
            $draft = $this->gdClient->newDraft('yes'); 
        } else {
            $draft = $this->gdClient->newDraft('no');
        }
   
        $control = $this->gdClient->newControl();
        $control->setDraft($draft);
        $postToUpdate->control = $control;
        $updatedPost = $postToUpdate->save();
        
        return $updatedPost; 
    }

    /**
     * This function uses query parameters to retrieve and print all posts 
     * within a specified date range.
     *
     * @param  string $startDate Beginning date, inclusive. Preferred format is a RFC-3339 date,
     *                           though other formats are accepted. 
     * @param  string $endDate   End date, exclusive.
     * @return void  
     */
    public function printPostsInDateRange($startDate, $endDate) {
        $query = new Zend_Gdata_Query('http://www.blogger.com/feeds/' . $this->blogID . '/posts/default'); 
        $query->setParam('published-min', $startDate);
        $query->setParam('published-max', $endDate); 
   
        $feed = $this->gdClient->getFeed($query); 
        $this->parseFeed($feed); 
    }

    /** 
     * This function creates a new comment and adds it to the specified post.
     * A comment is created as a Zend_Gdata_Entry.
     *
     * @param  string $postID      The ID of the post to add the comment to. PostID
     *                             in the <id> field: tag:blogger.com,1999:blog-blogID.post-postID
     * @param  string $commentText The text of the comment to add. 
     * @return string The ID of the newly created comment.
     */
    public function createComment($postID, $commentText) {
        $uri = 'http://www.blogger.com/feeds/' . $this->blogID . '/' . $postID . '/comments/default'; 
        
        $newComment = $this->gdClient->newEntry(); 
        $newComment->content = $this->gdClient->newContent($commentText); 
        $newComment->content->setType('text'); 
        $createdComment = $this->gdClient->insertEntry($newComment, $uri); 
        
        echo 'Added new comment: ' . $createdComment->content->text . "\n";
        // Edit link follows format: /feeds/blogID/postID/comments/default/commentID 
        $editLink = split('/', $createdComment->getEditLink()->href);
        $commentID = $editLink[8];      
 
        return $commentID; 
    }

    /** 
     * This function prints all comments associated with the specified post.
     *
     * @param  string $postID The ID of the post whose comments we'll print.
     * @return void
     */
    public function printAllComments($postID) {
        $query = new Zend_Gdata_Query('http://www.blogger.com/feeds/' . $this->blogID . '/' . $postID . '/comments/default'); 
        $feed = $this->gdClient->getFeed($query);
        $this->parseFeed($feed); 
    }

    /** 
     * This function deletes the specified comment from a post.
     *
     * @param  string $postID    The ID of the post where the comment is. PostID in
     *                           the <id> field: tag:blogger.com,1999:blog-blogID.post-postID
     * @param  string $commentID The ID of the comment to delete. The commentID
     *                           in the editURL: /feeds/blogID/postID/comments/default/commentID
     * @return void 
     */
    public function deleteComment($postID, $commentID) {
        $uri = 'http://www.blogger.com/feeds/' . $this->blogID . '/' . $postID . '/comments/default/' . $commentID; 
        $this->gdClient->delete($uri); 
    }

    /** 
     * This function deletes the specified post.
     *
     * @param  string $postID The ID of the post to delete.
     * @return void
     */
    public function deletePost($postID) {
        $uri = 'http://www.blogger.com/feeds/' . $this->blogID . '/posts/default/' . $postID; 
        $this->gdClient->delete($uri);  
    }

    public function parseFeed($feed) {
        $new = array();
    	foreach($feed->entries as $k=>$entry) {
            echo $new[$k] = $entry->title->text;
        }
        return $new;
    }
    
}
?>