<?php
/**
 * Main class for module Picasa
 * 
 * @package      WebGuru3
 * @subpackage   modules/picasa/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.1
 * @since        11. June 2009
 */

class modulePicasa {
	
	public $name            = NULL;
	public $version         = NULL;
	public $author          = NULL;
	
	private static $_path   = NULL;
	private static $_module = NULL;
	
	private static $_client = NULL;
	private static $_user = NULL;
	private static $_albumId = NULL;
	private static $_photoId = NULL;
	private static $_commentId = NULL;
	//private static $_client = NULL;
	//private static $_client = NULL;
			
	public function __construct() {
		$this->_init();
	}
	
	
	private function _init() {
		$this->name    = 'Picasa';
		$this->code    = 'picasa';
		$this->version = '0.0.0.1';
		$this->author  = 'Ondrej Rafaj';
		
		$this->_module = dbSystem::getModulesByName($this->code);
		$this->_path   = wgPaths::getAdminPath().$this->_module['part'].'/';
		
		require_once('Zend/Loader.php');
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_AuthSub');
		Zend_Loader::loadClass('Zend_Gdata_Photos');
		Zend_Loader::loadClass('Zend_Gdata_Photos_UserQuery');
		Zend_Loader::loadClass('Zend_Gdata_Photos_AlbumQuery');
		Zend_Loader::loadClass('Zend_Gdata_Photos_PhotoQuery');
		Zend_Loader::loadClass('Zend_Gdata_App_Extension_Category');
		
	}
	
	// ------------------------- class functions -------------------------
	
	public static function connect($name, $password, $albumId=NULL) {
		;
	}
	
	public static function isConnected() {
		if (!isset($_SESSION['sessionToken']) && !isset($_GET['token'])) return false;
	    else return true;
	}
	
	
	function getAuthSubUrl() {
	    $next = getCurrentUrl();
	    $scope = 'http://picasaweb.google.com/data';
	    $secure = false;
	    $session = true;
	    return Zend_Gdata_AuthSub::getAuthSubTokenUri($next, $scope, $secure, $session);
	}
	
	function getCurrentUrl() {
	    /**
	     * Filter php_self to avoid a security vulnerability.
	     */
	    $php_request_uri = htmlentities(substr($_SERVER['REQUEST_URI'], 0,
	    strcspn($_SERVER['REQUEST_URI'], "\n\r")), ENT_QUOTES);
	
	    if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') {
	        $protocol = 'https://';
	    } else {
	        $protocol = 'http://';
	    }
	    $host = $_SERVER['HTTP_HOST'];
	    if ($_SERVER['SERVER_PORT'] != '' &&
	        (($protocol == 'http://' && $_SERVER['SERVER_PORT'] != '80') ||
	        ($protocol == 'https://' && $_SERVER['SERVER_PORT'] != '443'))) {
	            $port = ':' . $_SERVER['SERVER_PORT'];
	    } else {
	        $port = '';
	    }
	    return $protocol . $host . $port . $php_request_uri;
	}
	
	public static function getAuthSubHttpClient() {
	    if (!isset($_SESSION['sessionToken']) && isset($_GET['token'])) {
	        $_SESSION['sessionToken'] = 
	            Zend_Gdata_AuthSub::getAuthSubSessionToken($_GET['token']);
	    } 
	    self::$_client = Zend_Gdata_AuthSub::getHttpClient($_SESSION['sessionToken']);
	    return self::$_client;
	}
	
	function addPhoto($client, $user, $albumId, $photo) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $fd = $photos->newMediaFileSource($photo["tmp_name"]);
	    $fd->setContentType($photo["type"]);
	    
	    $entry = new Zend_Gdata_Photos_PhotoEntry();
	    $entry->setMediaSource($fd);
	    $entry->setTitle($photos->newTitle($photo["name"]));
	    
	    $albumQuery = new Zend_Gdata_Photos_AlbumQuery;
	    $albumQuery->setUser($user);
	    $albumQuery->setAlbumId($albumId);
	    
	    $albumEntry = $photos->getAlbumEntry($albumQuery);
	    
	    $result = $photos->insertPhotoEntry($entry, $albumEntry);
	    if ($result) {
	        outputAlbumFeed($client, $user, $albumId);
	    } 
	    else {
	        echo "There was an issue with the file upload.";
	    }
	}
	
	function deletePhoto($client, $user, $albumId, $photoId) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $photoQuery = new Zend_Gdata_Photos_PhotoQuery;
	    $photoQuery->setUser($user);
	    $photoQuery->setAlbumId($albumId);
	    $photoQuery->setPhotoId($photoId);
	    $photoQuery->setType('entry');
	
	    $entry = $photos->getPhotoEntry($photoQuery);
	    
	    $photos->deletePhotoEntry($entry, true);
	    
	    outputAlbumFeed($client, $user, $albumId);
	}
	
	function addAlbum($client, $user, $name) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $entry = new Zend_Gdata_Photos_AlbumEntry();
	    $entry->setTitle($photos->newTitle($name));
	    
	    $result = $photos->insertAlbumEntry($entry);
	    if ($result) {
	        outputUserFeed($client, $user);
	    } else {
	        echo "There was an issue with the album creation.";
	    }
	}
	
	function deleteAlbum($client, $user, $albumId) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $albumQuery = new Zend_Gdata_Photos_AlbumQuery;
	    $albumQuery->setUser($user);
	    $albumQuery->setAlbumId($albumId);
	    $albumQuery->setType('entry');
	
	    $entry = $photos->getAlbumEntry($albumQuery);
	    
	    $photos->deleteAlbumEntry($entry, true);
	    
	    outputUserFeed($client, $user);
	}
	
	function addComment($client, $user, $album, $photo, $comment) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $entry = new Zend_Gdata_Photos_CommentEntry();
	    $entry->setTitle($photos->newTitle($comment));
	    $entry->setContent($photos->newContent($comment));
	    
	    $photoQuery = new Zend_Gdata_Photos_PhotoQuery;
	    $photoQuery->setUser($user);
	    $photoQuery->setAlbumId($album);
	    $photoQuery->setPhotoId($photo);
	    $photoQuery->setType('entry');
	
	    $photoEntry = $photos->getPhotoEntry($photoQuery);
	    
	    $result = $photos->insertCommentEntry($entry, $photoEntry);
	    if ($result) {
	        outputPhotoFeed($client, $user, $album, $photo);
	    } else {
	        echo "There was an issue with the comment creation.";
	    }
	}
	
	function deleteComment($client, $user, $albumId, $photoId, $commentId) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $photoQuery = new Zend_Gdata_Photos_PhotoQuery;
	    $photoQuery->setUser($user);
	    $photoQuery->setAlbumId($albumId);
	    $photoQuery->setPhotoId($photoId);
	    $photoQuery->setType('entry');
	    
	    $path = $photoQuery->getQueryUrl() . '/commentid/' . $commentId;
	    
	    $entry = $photos->getCommentEntry($path);
	    
	    $photos->deleteCommentEntry($entry, true);
	    
	    outputPhotoFeed($client, $user, $albumId, $photoId);
	}
	
	function addTag($client, $user, $album, $photo, $tag) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $entry = new Zend_Gdata_Photos_TagEntry();
	    $entry->setTitle($photos->newTitle($tag));
	    
	    $photoQuery = new Zend_Gdata_Photos_PhotoQuery;
	    $photoQuery->setUser($user);
	    $photoQuery->setAlbumId($album);
	    $photoQuery->setPhotoId($photo);
	    $photoQuery->setType('entry');
	
	    $photoEntry = $photos->getPhotoEntry($photoQuery);
	    
	    $result = $photos->insertTagEntry($entry, $photoEntry);
	    if ($result) {
	        outputPhotoFeed($client, $user, $album, $photo);
	    } else {
	        echo "There was an issue with the tag creation.";
	    }
	}
	
	function deleteTag($client, $user, $albumId, $photoId, $tagContent) {
	    $photos = new Zend_Gdata_Photos($client);
	    
	    $photoQuery = new Zend_Gdata_Photos_PhotoQuery;
	    $photoQuery->setUser($user);
	    $photoQuery->setAlbumId($albumId);
	    $photoQuery->setPhotoId($photoId);
	    $query = $photoQuery->getQueryUrl() . "?kind=tag";
	    
	    $photoFeed = $photos->getPhotoFeed($query);
	    
	    foreach ($photoFeed as $entry) {
	        if ($entry instanceof Zend_Gdata_Photos_TagEntry) {
	            if ($entry->getContent() == $tagContent) {
	                $tagEntry = $entry;
	            }
	        }
	    }
	    
	    $photos->deleteTagEntry($tagEntry, true);
	    
	    outputPhotoFeed($client, $user, $albumId, $photoId);
	}


}
		
?>