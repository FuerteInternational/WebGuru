<?php

/**
 * SimpleTwitter class.
 *
 * Simple twitter class for retrieving your status messages and
 * some other basic functionality.
 * None of the actions in this class require user authentication.
 *
 * @copyright  2009 TomaÅ¾ Muraus
 * @license    http://www.gnu.org/copyleft/gpl.html   GPL License
 * @version    Release: 1.0
 * @link       http://www.tomaz-muraus.info
 */
class SimpleTwitter
{
    protected $_screenName;

    /**
     * Constructor.
     *
     * @param string $screenName Your twitter.com username.
     */
    public function __construct($screenName)
    {
        $this->_screenName = $screenName;
    }

    /**
     * Returns your status messages.
     *
     * @param integer $limit Number of status messages to retrieve.
     * @param boolean $formatLinks If you want the links in the status messages to be formatted for the display on a web site.
     *
     * @return object Object with status messages and user information.
     */
    public function getMyTimeline($limit = 10, $formatLinks = TRUE)
    {
        $data = file_get_contents('http://twitter.com/statuses/user_timeline.json?screen_name=' . $this->_screenName . '&count=' . $limit);
        $twitts = json_decode($data);

        if ($formatLinks === TRUE)
        {
            $twitts = $this->_formatLinks($twitts);
        }

        return $twitts;
    }

    /**
     * Returns latest status messages from the public time line.
     *
     * @param int $limit Number of status messages to retrieve.
     * @param boolean $formatLinks If you want the links in the status messages to be formatted for the display on a web site.
     *
     * @return object Object with the status messages.
     */
    public function getPublicTimeline($limit = 10, $formatLinks = TRUE)
    {
        $data = file_get_contents('http://twitter.com/statuses/public_timeline.json');
        $twitts = json_decode($data);

        if ($formatLinks === TRUE)
        {
            $twitts = $this->_formatLinks($twitts);
        }

        return $twitts;
    }

    /**
     * Returns status messages from your friends.
     *
     * @param boolean $formatLinks If you want the links in the status messages to be formatted for the display on a web site.
     *
     * @return object Object with the status messages.
     */
    public function getFriendsStatus($formatLinks = TRUE)
    {
        $data = file_get_contents('http://twitter.com/statuses/friends.json?screen_name=' . $this->_screenName);
        $status = json_decode($data);

        return $status;
    }

    /**
     * Returns user relationship information between your and provided user account.
     *
     * @param string $targetScreenname Username of the target user.
     *
     * @return object User relationship.
     */
    public function getUserRelationship($targetScreenname)
    {
        $data = file_get_contents('http://twitter.com/friendships/show.json?source_screen_name=' . $this->_screenName . '&target_screen_name=' . $targetScreenname);
        $relationship = json_decode($data);

        return $relationship->relationship;
    }

    /**
     * Retrieves status messages matching the search query.
     *
     * @param string $query Search query.
     * @param boolean $formatLinks If you want the links in the status messages to be formatted for the display on a web site.
     *
     * @return object Object with the status messages.
     */
    public function findTwitts($query, $formatLinks = TRUE)
    {
        $data = file_get_contents('http://search.twitter.com/search.json?q=' . urlencode($query));
        $twitts = json_decode($data);

        if ($formatLinks === TRUE)
        {
            $twitts = $this->_formatLinks($twitts->results);
        }
        else
        {
            $twitts = $twitts->results;
        }

        return $twitts;
    }

    /**
     * Returns user information.
     *
     * @return object User information.
     */
    public function getUserInformation()
    {
        $data = file_get_contents('http://twitter.com/users/show.json?screen_name=' . $this->_screenName);
        $userInformation = json_decode($data);

        return $userInformation;
    }

    /**
     * Formats normal links, links to the user profiles and hashtag links in the status messages (wraps them in the <a> tag).
     *
     * @param object $twitts Object containing the status messages.
     *
     * @return object Object with the formatted links in the status messages.
     */
    protected function _formatLinks($twitts)
    {
        for ($i = 0; $i < count($twitts); $i++)
        {
            // Format normal links
            $twitts[$i]->text = preg_replace('/((http|ftp|https|ftps|irc):\/\/[^()<>\s]+)/i', '<a href="$1" target="_blank">$1</a>', $twitts[$i]->text);

            // Format links to user profiles (for @ messages)
            $twitts[$i]->text = preg_replace('/@([a-zA-Z-+_]+)/i', '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $twitts[$i]->text);

            // Format hashtag links
            $twitts[$i]->text = preg_replace('/#([a-zA-Z-+_]+)/i', '<a href="http://twitter.com/search?q=%23$1" target="_blank">#$1</a>', $twitts[$i]->text);
        }

        return $twitts;
    }
}

?> 