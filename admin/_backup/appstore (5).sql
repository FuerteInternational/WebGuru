-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2012 at 03:44 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks_groups`
--

CREATE TABLE IF NOT EXISTS `blocks_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `template` text NOT NULL,
  `system_websites_id` int(4) NOT NULL,
  `system_language_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kwebsite` (`system_websites_id`),
  KEY `klanguage` (`system_language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blocks_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `blocks_items`
--

CREATE TABLE IF NOT EXISTS `blocks_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_language_id` int(3) NOT NULL,
  `system_websites_id` int(4) NOT NULL,
  `blocks_groups_id` int(8) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `html` text NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `klanguage` (`system_language_id`),
  KEY `kwebsite` (`system_websites_id`),
  KEY `kgroup` (`blocks_groups_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blocks_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `blocks_permissions`
--

CREATE TABLE IF NOT EXISTS `blocks_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blocks_groups_id` int(8) unsigned NOT NULL,
  `system_teams_id` int(8) unsigned NOT NULL,
  `permissions` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `kgroups` (`blocks_groups_id`),
  KEY `kteams` (`system_teams_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blocks_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `users_groups_id` int(8) unsigned NOT NULL,
  `system_websites_id` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `users_groups_id`, `system_websites_id`) VALUES
(1, 'xprogress.com - Blog', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogger_accounts`
--

CREATE TABLE IF NOT EXISTS `blogger_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blogid` varchar(100) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blogger_accounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `head` text NOT NULL,
  `description` longtext NOT NULL,
  `blog_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blog_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog_files`
--

CREATE TABLE IF NOT EXISTS `blog_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `added` datetime NOT NULL,
  `blog_posts_id` bigint(20) unsigned NOT NULL,
  `size` int(11) NOT NULL,
  `mime` varchar(60) NOT NULL,
  `views` bigint(16) unsigned NOT NULL DEFAULT '0',
  `downloads` bigint(16) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blog_posts_id` (`blog_posts_id`),
  KEY `size` (`size`,`mime`),
  KEY `views` (`views`,`downloads`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blog_files`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog_groups`
--

CREATE TABLE IF NOT EXISTS `blog_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(8) unsigned NOT NULL,
  `blog_categories_id` int(11) unsigned DEFAULT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `head` text NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_categories_id` (`blog_categories_id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blog_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) unsigned NOT NULL DEFAULT '0',
  `users_id` bigint(20) NOT NULL DEFAULT '0',
  `system_users_id` int(8) unsigned NOT NULL,
  `blog_categories_id` int(11) unsigned DEFAULT NULL,
  `blog_groups_id` int(11) unsigned DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `category` int(4) NOT NULL DEFAULT '0',
  `excerpt` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(40) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `changed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `changed_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content_filtered` text NOT NULL,
  `parent` bigint(20) NOT NULL DEFAULT '0',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` tinyint(1) NOT NULL DEFAULT '1',
  `views` bigint(20) NOT NULL DEFAULT '0',
  `rssviews` bigint(20) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `type_status_date` (`post_type`,`status`,`added`,`id`),
  KEY `parent` (`parent`),
  KEY `blog_id` (`blog_id`),
  KEY `blog_categories_id` (`blog_categories_id`,`blog_groups_id`),
  KEY `identifier` (`identifier`),
  KEY `views` (`views`,`rssviews`),
  KEY `system_users_id` (`system_users_id`),
  KEY `featured` (`featured`),
  FULLTEXT KEY `content_filtered` (`content_filtered`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blog_posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `blog_templates`
--

CREATE TABLE IF NOT EXISTS `blog_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL,
  `dateformat` varchar(255) NOT NULL,
  `datasource` varchar(200) NOT NULL,
  `limit` int(4) unsigned NOT NULL,
  `pager` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `search` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `variable` varchar(50) NOT NULL,
  `someid` varchar(255) NOT NULL,
  `useedit` tinyint(1) NOT NULL DEFAULT '0',
  `tbegin` text NOT NULL,
  `titem` text NOT NULL,
  `tend` text NOT NULL,
  `tnoitem` text NOT NULL,
  `tnoperm` text NOT NULL,
  `blog_cats_id` int(11) DEFAULT NULL,
  `blog_id` int(11) unsigned NOT NULL,
  `system_websites_id` int(4) unsigned NOT NULL,
  `error1` varchar(255) NOT NULL,
  `error2` varchar(255) NOT NULL,
  `error3` varchar(255) NOT NULL,
  `error4` varchar(255) NOT NULL,
  `error5` varchar(255) NOT NULL,
  `error6` varchar(255) NOT NULL,
  `redirect1` varchar(255) NOT NULL,
  `redirect2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temptype` (`temptype`,`system_websites_id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `blog_templates`
--

INSERT INTO `blog_templates` (`id`, `name`, `identifier`, `temptype`, `dateformat`, `datasource`, `limit`, `pager`, `search`, `variable`, `someid`, `useedit`, `tbegin`, `titem`, `tend`, `tnoitem`, `tnoperm`, `blog_cats_id`, `blog_id`, `system_websites_id`, `error1`, `error2`, `error3`, `error4`, `error5`, `error6`, `redirect1`, `redirect2`) VALUES
(1, 'home', 'home', 0, '', '1', 15, 1, 0, 'search', '', 0, '<div class="posts">\r\n', '<div class="post">\r\n    <dl class="dateBox">\r\n        <dt>{%MonthShort}</dt>\r\n        <dd>{%Day}</dd>\r\n    </dl>\r\n    <div class="onPageDigg" id="onPageDigg1">\r\n        <script type="text/javascript">\r\n        digg_url = ''{#WEBROOT}post-{%id}-{%Identifier}/'';\r\n        digg_title = ''{%Title}'';\r\n        loadDiggWithDelay(digg_url, digg_title, ''onPageDigg1'');\r\n        </script>\r\n    </div>\r\n    <h2><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%Title}</a></h2>\r\n    <p class="credit"><strong>{%Date}</strong> by <strong>{%Author}</strong></p>\r\n    <p class="postart"><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%ArtImageFull}</a></p>\r\n    <div class="head">{%Excerpt}</div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="{#WEBROOT}post-{%id}-{%Identifier}/" class="more" title="Read more about {%Title}"><span>Read more ...</span></a>\r\n    </p>\r\n</div>\r\n', '</div>\r\n<div class="pager">\r\n    {%PAGER}\r\n</div>\r\n', '<div>\r\n	<p>There is no article in this category</p>\r\n</div>', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(2, 'main', 'main', 1, '', '0', 0, 0, 0, 'id', '', 1, '', '<div class="detail">\r\n    <h1>{%Title}</h1>\r\n    <p class="credits"><strong>{%Author}</strong> on <span class="date">{%Date}</span> <!--<a class="DiggThisButton"><img src="http://digg.com/img/diggThisCompact.png" height="18" width="120" alt="DiggThis" /></a></p>\r\n    <script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>-->\r\n    {#MOD_blog_files_detailfiles}\r\n    <div class="head">{%Excerpt}</div>\r\n    <p class="postart">{%ArtImageFull}</p>\r\n    <div class="text">{%Content}</div>\r\n    <div class="signature">\r\n        <p class="avatar"><img src="http://www.gravatar.com/avatar/913dd7ab0644335c4c30f27ad8bc310b" alt="Ondrej Rafaj" width="50" height="50" /></p>\r\n        <p class="name"><strong>{%Author}</strong></p>\r\n        <small>Technical director @ <a href="http://www.fuerteint.com/">Fuerte International</a></small>\r\n        <p class="info">\r\n            \r\n        </p>\r\n    </div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="#comment" class="more"><span>Comment</span></a>\r\n    </p>\r\n    <h5><strong>Comments ...</strong> Why not to get involved!</h5>\r\n\r\n<!-- begin htmlcommentbox.com -->\r\n <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">HTML Comment Box</a> is loading comments...</div>\r\n <link rel="stylesheet" type="text/css" href="http://www.htmlcommentbox.com/static/skins/simple/skin.css" />\r\n <script type="text/javascript" language="javascript" id="hcb"> /*<!--*/ (function(){s=document.createElement("script");s.setAttribute("type","text/javascript");s.setAttribute("src", "http://www.htmlcommentbox.com/jread?page="+escape((typeof hcb_user !== "undefined" && hcb_user.PAGE)||(""+window.location)).replace("+","%2B")+"&mod=%241%24wq1rdBcg%24RgBJQD1.JT6DuB/bTI9S50"+"&opts=22430&num=50");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>\r\n<!-- end htmlcommentbox.com -->\r\n\r\n    <p>Old comments:</p>\r\n    {#MOD_comments_list_article-comments}\r\n    <!--{# MOD_comments_form_post}-->\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n    </p>\r\n</div>\r\n', '', 'does not exist', '', 0, 0, 0, '', '', '', '', '', '', '', ''),
(3, 'search', 'search', 0, '', '1', 30, 1, 1, 'search', '', 0, '<div class="posts">\r\n', '<div class="post">\r\n    <dl class="dateBox">\r\n        <dt>{%MonthShort}</dt>\r\n        <dd>{%Day}</dd>\r\n    </dl>\r\n    <div class="onPageDigg" id="onPageDigg1">\r\n        <script type="text/javascript">\r\n        digg_url = ''{#WEBROOT}post-{%id}-{%Identifier}/'';\r\n        digg_title = ''{%Title}'';\r\n        loadDiggWithDelay(digg_url, digg_title, ''onPageDigg1'');\r\n        </script>\r\n    </div>\r\n    <h2><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%Title}</a></h2>\r\n    <p class="credit"><strong>{%Date}</strong> by <strong>{%Author}</strong></p>\r\n    <p class="postart"><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%ArtImageFull}</a></p>\r\n    <div class="head">{%Excerpt}</div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="{#WEBROOT}post-{%id}-{%Identifier}/" class="more" title="Read more about {%Title}"><span>Read more ...</span></a>\r\n    </p>\r\n</div>\r\n', '</div>\r\n<div class="pager">\r\n    <a href="#"><span>First</span></a>\r\n    <a href="#"><span>1</span></a>\r\n    <a href="#"><span>2</span></a>\r\n    <a href="#"><span>3</span></a>\r\n    <a href="#"><span>4</span></a>\r\n    <a href="#"><span>5</span></a>\r\n    <a href="#"><span>Last</span></a>\r\n</div>', '<div>\r\n	<p>No article has been found</p>\r\n</div>', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(12, 'footerarch', 'footerarch', 3, '', '1', 0, 0, 0, '%Y %M', '', 0, '', '<li><a href="{#WEBROOT}archive-for-{%ArchiveSortDate}/">{%ArchiveDate} ({%ArchiveTotal})</a></li>', '', '<!-- There is no post in the blog -->', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(13, 'archive', 'archive', 0, '', '1', 10, 1, 0, 'search', 'cat', 0, '<div class="posts">\r\n', '<div class="post">\r\n    <dl class="dateBox">\r\n        <dt>{%MonthShort}</dt>\r\n        <dd>{%Day}</dd>\r\n    </dl>\r\n    <div class="onPageDigg" id="onPageDigg1">\r\n        <script type="text/javascript">\r\n        digg_url = ''{#WEBROOT}post-{%id}-{%Identifier}/'';\r\n        digg_title = ''{%Title}'';\r\n        loadDiggWithDelay(digg_url, digg_title, ''onPageDigg1'');\r\n        </script>\r\n    </div>\r\n    <h2><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%Title}</a></h2>\r\n    <p class="credit"><strong>{%Date}</strong> by <strong>{%Author}</strong></p>\r\n    <p class="postart"><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%ArtImageFull}</a></p>\r\n    <div class="head">{%Excerpt}</div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="{#WEBROOT}post-{%id}-{%Identifier}/" class="more" title="Read more about {%Title}"><span>Read more ...</span></a>\r\n    </p>\r\n</div>\r\n', '</div>\r\n<div class="pager">\r\n    <a href="#"><span>First</span></a>\r\n    <a href="#"><span>1</span></a>\r\n    <a href="#"><span>2</span></a>\r\n    <a href="#"><span>3</span></a>\r\n    <a href="#"><span>4</span></a>\r\n    <a href="#"><span>5</span></a>\r\n    <a href="#"><span>Last</span></a>\r\n</div>\r\n\r\n{#MOD_forms_main_new-article}', '<div>\r\n	<p>There is no article for this date</p>\r\n</div>', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(6, 'dynamic', 'dynamic', 0, '', '3', 10, 1, 0, 'search', 'cat', 0, '<div class="posts">\r\n', '<div class="post">\r\n    <dl class="dateBox">\r\n        <dt>{%MonthShort}</dt>\r\n        <dd>{%Day}</dd>\r\n    </dl>\r\n    <div class="onPageDigg" id="onPageDigg1">\r\n        <script type="text/javascript">\r\n        digg_url = ''{#WEBROOT}post-{%id}-{%Identifier}/'';\r\n        digg_title = ''{%Title}'';\r\n        loadDiggWithDelay(digg_url, digg_title, ''onPageDigg1'');\r\n        </script>\r\n    </div>\r\n    <h2><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%Title}</a></h2>\r\n    <p class="credit"><strong>{%Date}</strong> by <strong>{%Author}</strong></p>\r\n    <p class="postart"><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%ArtImageFull}</a></p>\r\n    <div class="head">{%Excerpt}</div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="{#WEBROOT}post-{%id}-{%Identifier}/" class="more" title="Read more about {%Title}"><span>Read more ...</span></a>\r\n    </p>\r\n</div>\r\n', '</div>\r\n<div class="pager">{%PAGER}</div>\r\n\r\n{#MOD_forms_main_new-article}', '<div>\r\n	<p>There is no article in this category</p>\r\n</div>\r\n{#MOD_forms_main_new-article}', '', 8, 1, 0, '', '', '', '', '', '', '', ''),
(7, 'main', 'main', 6, '', '1', 30, 1, 0, 'category', '', 0, '<div>\r\n', '<div class="post">\r\n	<h2><a href="?article={%id}">{%Title}</a></h2>\r\n	<p class="info"><strong>{%Date}</strong> - {%Author}</p>\r\n	<div class="excerpt">{%Excerpt}<div>\r\n</div>', '</div>\r\n{%PAGER}', '<div>\r\n	<p>There is no article in this category</p>\r\n</div>', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(9, 'detailfiles', 'detailfiles', 7, '', '2', 0, 0, 0, 'article', '', 0, '<table class="files">\r\n    <thead>\r\n        <tr>\r\n            <th colspan="2"><span>Attached files</span></th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n', '<tr>\r\n	<td>{%Name}</td>\r\n	<td><a href="?download={%Id}"><span>Download</span></a></td>\r\n</tr>', '    </tbody>\r\n</table>\r\n', '<!-- no files to display -->', '', 0, 0, 0, '', '', '', '', '', '', '', ''),
(11, 'main', 'main', 5, '', '1', 0, 0, 0, 'cat', '', 1, '', '<!--<a href="javascript: bookmarkMe(location.href, ''{%Name} - Xprogress.com'');" class="bookmark" title="Bookmark this page"><span>Bookmark this page</span></a>\r\n<div class="info">\r\n    <p><strong>Articles:</strong> {%Articles}</p>\r\n</div>\r\n<div class="content">\r\n    <div class="excerpt">{%Head}</div>\r\n    <div class="text">{%Description}</div>\r\n</div>-->\r\n', '', '<!-- this category does not exist -->', '', 8, 0, 0, '', '', '', '', '', '', '', ''),
(10, 'basiclist', 'basiclist', 2, '', '0', 0, 0, 0, 'cat', '', 0, '<ul class="box">', '<li><a href="{#WEBROOT}category-{%Id}-{%Identifier}/" class="{#ACTIVE_cat_id}">{%Name} (<?php echo (int) BlogPostsModel::getCountArticlesInCat($v->getId()); ?>)</a></li>', '</ul>', '<!-- there is no category -->', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(14, 'sitemap', 'sitemap', 0, '', '1', 0, 0, 0, 'search', 'cat', 0, '<ul>\r\n', '<li><a href="{#WEBROOT}post-{%id}-{%Identifier}/">{%Title}</a> by {%Author}</li>', '</ul>\r\n<p class="bottom">\r\n    <a href="#top" class="top"><span>Back to top</span></a>\r\n</p>\r\n', '', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(15, 'Article Images', 'article-images', 7, '', '2', 0, 0, 0, 'article', '', 0, '<div class="images">\r\n', '<div class="image">\r\n	<p><strong>{%Name}</strong></p>\r\n	<p><a href="?view={%Id}"><img src="{#WEBROOT}userfiles/{%Filename}" alt="{%Name}" /></a></p>\r\n</div>', '</div>', '<!-- no files to display -->', '', 0, 0, 0, '', '', '', '', '', '', '', ''),
(16, 'hiddenlist', 'hiddenlist', 2, '', '0', 0, 0, 0, 'cat', '', 0, '<ul class="noscreen">', '<li><a href="{#WEBROOT}category-{%Id}-{%Identifier}/" class="{#ACTIVE_cat_id}">{%Name} (<?php echo (int) BlogPostsModel::getCountArticlesInCat($v->getId()); ?>)</a></li>', '</ul>', '<!-- there is no category -->', '', 0, 1, 0, '', '', '', '', '', '', '', ''),
(17, 'detail', 'detail', 7, '', '2', 0, 0, 0, 'article', '', 0, '<table class="files">\r\n    <thead>\r\n        <tr>\r\n            <th colspan="2" class="center"><span>Attached files</span></th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n', '<tr>\r\n    <td>{%Name}</td>\r\n    <td><a href="?download={%Id}"><span>Download</span></a></td>\r\n</tr>\r\n', '    </tbody>\r\n</table>\r\n', '<!-- no files to display -->', '', 0, 0, 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `clicktrack_hits`
--

CREATE TABLE IF NOT EXISTS `clicktrack_hits` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(8) unsigned NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `top` int(4) unsigned NOT NULL,
  `left` int(4) unsigned NOT NULL,
  `usrx` int(4) unsigned NOT NULL,
  `usry` int(4) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `campaign_id` (`campaign_id`,`added`,`usrx`,`usry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `clicktrack_hits`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments_groups`
--

CREATE TABLE IF NOT EXISTS `comments_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `system_websites_id` int(4) DEFAULT NULL,
  `system_language_id` int(3) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `registered` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `parameter` varchar(45) NOT NULL DEFAULT 'id',
  PRIMARY KEY (`id`),
  KEY `keys` (`system_websites_id`,`system_language_id`),
  KEY `FK_comments_groups_language` (`system_language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comments_groups`
--

INSERT INTO `comments_groups` (`id`, `system_websites_id`, `system_language_id`, `name`, `registered`, `parameter`) VALUES
(2, 3, 10, 'Test group', 0, ''),
(3, 1, 1, 'Article comments', 0, ''),
(4, 3, 4, 'Little helper', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comments_messages`
--

CREATE TABLE IF NOT EXISTS `comments_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comments_groups_id` int(8) NOT NULL DEFAULT '0',
  `for_id` int(11) NOT NULL DEFAULT '0',
  `author` tinytext NOT NULL,
  `author_email` varchar(100) NOT NULL DEFAULT '',
  `author_url` varchar(255) NOT NULL DEFAULT '',
  `author_ip` varchar(20) NOT NULL DEFAULT '',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL,
  `karma` int(11) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `agent` varchar(255) NOT NULL DEFAULT '',
  `parent` bigint(20) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `approved` (`approved`),
  KEY `for_id` (`for_id`),
  KEY `approved_date_gmt` (`approved`,`added_gmt`),
  KEY `date_gmt` (`added_gmt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments_templates`
--

CREATE TABLE IF NOT EXISTS `comments_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pager` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `comments_groups_id` int(4) unsigned NOT NULL,
  `perpage` int(4) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `datasource` int(3) unsigned NOT NULL DEFAULT '0',
  `noidsyserror` varchar(255) NOT NULL,
  `emptyauthor` varchar(255) NOT NULL,
  `emptyemail` varchar(255) NOT NULL,
  `emptycomment` varchar(255) NOT NULL,
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  `notemp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments_templates`
--

INSERT INTO `comments_templates` (`id`, `name`, `identifier`, `temptype`, `pager`, `comments_groups_id`, `perpage`, `variable`, `datasource`, `noidsyserror`, `emptyauthor`, `emptyemail`, `emptycomment`, `tempbegin`, `tempitem`, `tempend`, `notemp`) VALUES
(4, 'Article comments', 'article-comments', 0, 0, 3, 20, 'id', 0, '', '', '', '', '<ul class="comments">\r\n', '<li class="{%OddEven}">\r\n    <div class="signature">\r\n        <p class="avatar"><img src="{%Gravatar}" alt="{%Author}" width="50" height="50" /></p>\r\n        <p class="name"><strong>{%Author}</strong></p>\r\n        <small>from {%Ip} @ &nbsp;&nbsp; {%FullDate}</small>\r\n        <p class="info">{%Content}</p>\r\n    </div>\r\n</li>\r\n', '</ul>\r\n', ''),
(5, 'Article comments', 'post', 1, 0, 3, 1, 'id', 0, 'System error: There is no system id', 'Please fill your name', 'Please check your email address', 'Please put some comment', '<a name="comment"><span class="noscreen">Comment</span></a>\r\n<form action="#commentsForm" method="post" class="commentForm">\r\n    <h3>Leave a Reply</h3>\r\n    <p>\r\n        <label for="author" class="mandatory">Name / Nickname</label>\r\n        <input name="author" id="author" value="{%UserName}" tabindex="1" type="text" title="Please type in your name or nickname" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Mail (will not be published)</label>\r\n        <input name="email" id="email" value="{%UserMail}" tabindex="2" type="text" title="Please type in your email address" />\r\n    </p>\r\n    <p>\r\n        <label for="url">Website</label>\r\n        <input name="url" id="url" value="{%Website}" tabindex="3" type="text" title="Fill your website URL in if you have any :)" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Comment</label>\r\n        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>\r\n    </p>\r\n    <p>\r\n        <input name="for_id" type="hidden" id="for_id" value="{%For}" />\r\n        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />\r\n        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>\r\n    </p>\r\n</form>\r\n', '<a name="comment"><span class="noscreen">Comment</span></a>\r\n<form action="#commentsForm" method="post" class="commentForm">\r\n    <h3>Leave a Reply</h3>\r\n    <p>\r\n        <label for="author" class="mandatory">Name / Nickname</label>\r\n        <input name="author" id="author" value="{%Name}" tabindex="1" type="text" title="Please type in your name or nickname" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Mail (will not be published)</label>\r\n        <input name="email" id="email" value="{%Mail}" tabindex="2" type="text" title="Please type in your email address" />\r\n    </p>\r\n    <p>\r\n        <label for="url">Website</label>\r\n        <input name="url" id="url" value="{%Website}" tabindex="3" type="text" title="Fill your website URL in if you have any :)" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Comment</label>\r\n        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>\r\n    </p>\r\n    <p class="captcha">\r\n        <label class="mandatory" for="captcha">Enter verification code</label>\r\n        <span>\r\n            <?php echo ''<img src="''.wgPaths::getAdminPath(''url'').''data/captcha/captcha.php" alt="" />'';?><br />\r\n            <input name="captcha" id="captcha" value="" type="text" />\r\n        </span>\r\n    </p>\r\n    <p>\r\n        <input name="for_id" type="hidden" id="for_id" value="{%For}" />\r\n        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />\r\n        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>\r\n    </p>\r\n</form>\r\n', '', ''),
(1, 'Snippet comments', 'snippet-comments', 0, 0, 2, 20, 'snippet', 0, '', '', '', '', '<ul class="comments">', '<li class="{%OddEven}">\r\n    <div class="signature">\r\n        <p class="avatar"><img src="{%Gravatar}" alt="{%Author}" width="50" height="50" /></p>\r\n        <p class="name"><strong>{%Author}</strong></p>\r\n        <small>from {%Ip} @ &nbsp;&nbsp; {%FullDate}</small>\r\n        <p class="info">{%Content}</p>\r\n    </div>\r\n</li>\r\n', '</ul>\r\n', ''),
(2, 'Snippet comments', 'snippet', 1, 0, 2, 1, 'snippet', 0, 'System error: There is no system id', 'Please fill your name', 'Please check your email address', 'Please put some comment', '<a name="comment"><span class="noscreen">Comment</span></a>\r\n<form action="#commentsForm" method="post" class="commentForm">\r\n    <h3>Leave a Reply</h3>\r\n    <p>\r\n        <label for="author" class="mandatory">Name / Nickname</label>\r\n        <input name="author" id="author" value="{%UserName}" tabindex="1" type="text" title="Please type in your name or nickname" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Mail (will not be published)</label>\r\n        <input name="email" id="email" value="{%UserMail}" tabindex="2" type="text" title="Please type in your email address" />\r\n    </p>\r\n    <p>\r\n        <label for="url">Website</label>\r\n        <input name="url" id="url" value="{%Website}" tabindex="3" type="text" title="Fill your website URL in if you have any :)" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Comment</label>\r\n        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>\r\n    </p>\r\n    <p>\r\n        <input name="for_id" type="hidden" id="for_id" value="{%For}" />\r\n        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />\r\n        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>\r\n    </p>\r\n</form>\r\n', '<a name="comment"><span class="noscreen">Comment</span></a>\r\n<form action="#commentsForm" method="post" class="commentForm">\r\n    <h3>Leave a Reply</h3>\r\n    <p>\r\n        <label for="author" class="mandatory">Name / Nickname</label>\r\n        <input name="author" id="author" value="{%Name}" tabindex="1" type="text" title="Please type in your name or nickname" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Mail (will not be published)</label>\r\n        <input name="email" id="email" value="{%Mail}" tabindex="2" type="text" title="Please type in your email address" />\r\n    </p>\r\n    <p>\r\n        <label for="url">Website</label>\r\n        <input name="url" id="url" value="{%Website}" tabindex="3" type="text" title="Fill your website URL in if you have any :)" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Comment</label>\r\n        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>\r\n    </p>\r\n    <p class="captcha">\r\n        <label class="mandatory" for="captcha">Enter verification code</label>\r\n        <span>\r\n            <?php echo ''<img src="''.wgPaths::getAdminPath(''url'').''data/captcha/captcha.php" alt="" />'';?><br />\r\n            <input name="captcha" id="captcha" value="" type="text" />\r\n        </span>\r\n    </p>\r\n    <p>\r\n        <input name="for_id" type="hidden" id="for_id" value="{%For}" />\r\n        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />\r\n        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>\r\n    </p>\r\n</form>\r\n', '', ''),
(6, 'Little helper', 'little-helper', 1, 0, 4, 1, 'lh', 0, 'System error: There is no system id', 'Please fill your name', 'Please check your email address', 'Please put some comment', '<a name="comment"><span class="noscreen">Comment</span></a>\r\n<form action="#commentsForm" method="post" class="commentForm">\r\n    <h3>Leave a Reply</h3>\r\n    <p>\r\n        <label for="author" class="mandatory">Name / Nickname</label>\r\n        <input name="author" id="author" value="{%Name}" tabindex="1" type="text" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Mail (will not be published)</label>\r\n        <input name="email" id="email" value="{%Mail}" tabindex="2" type="text" />\r\n    </p>\r\n    <p>\r\n        <label for="url">Website</label>\r\n        <input name="url" id="url" value="{%Website}" tabindex="3" type="text" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Comment</label>\r\n        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>\r\n    </p>\r\n    <p>\r\n        <input name="for_id" type="hidden" id="for_id" value="{%For}" />\r\n        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />\r\n        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>\r\n    </p>\r\n</form>', '<a name="comment"><span class="noscreen">Comment</span></a>\r\n<form action="#commentsForm" method="post" class="commentForm">\r\n    <h3>Leave a Reply</h3>\r\n    <p>\r\n        <label for="author" class="mandatory">Name / Nickname</label>\r\n        <input name="author" id="author" value="{%Name}" tabindex="1" type="text" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Mail (will not be published)</label>\r\n        <input name="email" id="email" value="{%Mail}" tabindex="2" type="text" />\r\n    </p>\r\n    <p>\r\n        <label for="url">Website</label>\r\n        <input name="url" id="url" value="{%Website}" tabindex="3" type="text" />\r\n    </p>\r\n    <p>\r\n        <label for="email" class="mandatory">Comment</label>\r\n        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">{%Message}</textarea>\r\n    </p>\r\n    <p class="captcha">\r\n        <label class="mandatory" for="captcha">Enter verification code</label>\r\n        <span>\r\n            <?php echo ''<img src="''.wgPaths::getAdminPath(''url'').''data/captcha/captcha.php" alt="" />'';?><br />\r\n            <input name="captcha" id="captcha" value="" type="text" />\r\n        </span>\r\n    </p>\r\n    <p>\r\n        <input name="for_id" type="hidden" id="for_id" value="{%For}" />\r\n        <input name="comment_parent" type="hidden" id="comment_parent" value="{%Parent}" />\r\n        <button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>\r\n    </p>\r\n</form>\r\n', '', ''),
(7, 'Little helper', 'little-helper', 0, 1, 4, 200, 'lh', 1, '', '', '', '', '<ul class="comments">', '<li class="{%OddEven}">\r\n    <div class="signature">\r\n        <p class="avatar"><img src="{%Gravatar}" alt="{%Author}" width="50" height="50" /></p>\r\n        <p class="name"><strong>{%Author}</strong></p>\r\n        <small>from {%Ip} @ &nbsp;&nbsp; {%FullDate}</small>\r\n        <p class="info">{%Content}</p>\r\n    </div>\r\n</li>', '</ul>', '');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `identifier` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `identifier`) VALUES
(1, 'Fuerte International', 'fuerte-international'),
(2, 'SOMO Global', 'somo-global'),
(3, 'Wunderman London', 'wunderman-london'),
(4, 'Icon Mobile', 'icon-mobile'),
(5, 'JWT London', 'jwt-london'),
(6, 'Being London', 'being-london');

-- --------------------------------------------------------

--
-- Table structure for table `crawler_cached`
--

CREATE TABLE IF NOT EXISTS `crawler_cached` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `addr` text NOT NULL,
  `root` varchar(255) NOT NULL,
  `crawler_websites_id` int(8) NOT NULL DEFAULT '0',
  `level` int(4) NOT NULL DEFAULT '0',
  `html` text,
  `text` text,
  `links` text,
  `title` text,
  `h1` text,
  `keywords` text,
  `description` text,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `cached` datetime NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `ilinks` int(11) NOT NULL DEFAULT '0',
  `elinks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `root` (`root`),
  KEY `webid` (`crawler_websites_id`),
  KEY `cached` (`cached`,`cid`),
  KEY `level` (`level`),
  FULLTEXT KEY `addr` (`addr`,`html`,`text`,`links`,`title`,`h1`,`keywords`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `crawler_cached`
--


-- --------------------------------------------------------

--
-- Table structure for table `crawler_categories`
--

CREATE TABLE IF NOT EXISTS `crawler_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `catdescription` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  KEY `added` (`added`,`changed`),
  KEY `system_users_id` (`system_users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `crawler_categories`
--

INSERT INTO `crawler_categories` (`id`, `parent`, `name`, `catdescription`, `added`, `changed`, `users_id`, `system_users_id`) VALUES
(1, 0, 'Mobiles', '', '0000-00-00 00:00:00', '2009-02-18 17:54:49', 1, 1),
(2, 1, 'iPhone', ':-)', '0000-00-00 00:00:00', '2009-02-20 16:40:02', 0, 1),
(3, 1, 'Blackberry', '', '2009-02-18 15:47:49', '2009-02-18 17:54:29', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crawler_html`
--

CREATE TABLE IF NOT EXISTS `crawler_html` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crawler_results_id` int(11) NOT NULL,
  `html` longblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `crawler_results_id` (`crawler_results_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `crawler_html`
--


-- --------------------------------------------------------

--
-- Table structure for table `crawler_images`
--

CREATE TABLE IF NOT EXISTS `crawler_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crawler_results_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `image` longblob,
  `mime` varchar(30) NOT NULL,
  `internal` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `crawler_results_id` (`crawler_results_id`),
  KEY `internal` (`internal`),
  FULLTEXT KEY `alt` (`alt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `crawler_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `crawler_links`
--

CREATE TABLE IF NOT EXISTS `crawler_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crawler_results_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `internal` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `crawler_results_id` (`crawler_results_id`),
  KEY `internal` (`internal`),
  FULLTEXT KEY `link` (`link`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `crawler_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `crawler_queries`
--

CREATE TABLE IF NOT EXISTS `crawler_queries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cqc_id` int(8) NOT NULL,
  `query` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cqc_id` (`cqc_id`,`query`,`added`,`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `crawler_queries`
--

INSERT INTO `crawler_queries` (`id`, `cqc_id`, `query`, `added`, `users_id`) VALUES
(1, 0, 'sdf', '2009-05-19 11:08:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `crawler_queries_categories`
--

CREATE TABLE IF NOT EXISTS `crawler_queries_categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `par` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `crawler_queries_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `crawler_results`
--

CREATE TABLE IF NOT EXISTS `crawler_results` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `addr` text NOT NULL,
  `root` varchar(255) NOT NULL,
  `crawler_websites_id` int(8) NOT NULL DEFAULT '0',
  `arank` int(4) NOT NULL DEFAULT '0',
  `level` int(4) NOT NULL DEFAULT '0',
  `text` text,
  `title` text,
  `h1` text,
  `keywords` text,
  `description` text,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `image` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `root` (`root`),
  KEY `webid` (`crawler_websites_id`),
  KEY `level` (`level`),
  KEY `arank` (`arank`),
  FULLTEXT KEY `text` (`text`),
  FULLTEXT KEY `title` (`title`),
  FULLTEXT KEY `h1` (`h1`),
  FULLTEXT KEY `keywords` (`keywords`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `addr` (`addr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `crawler_results`
--

INSERT INTO `crawler_results` (`id`, `addr`, `root`, `crawler_websites_id`, `arank`, `level`, `text`, `title`, `h1`, `keywords`, `description`, `added`, `changed`, `image`) VALUES
(1, 'http://www.avs4you.com/Register.aspx?ProgID=21&Type=Install&URL=Register', 'http://www.avs4you.com/', 2, 1, 1, 'sfgdsfgdadfgh sdfgt sdfgdfgerg er gtert g', 'ae rtsdrgt egtr ertet', 'ae rtaert ert ert ert ert ert ert ', 'qe rtert ert ert ', 'er twert ert ert ', '2009-02-18 17:08:09', '2009-02-18 17:08:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `crawler_templates`
--

CREATE TABLE IF NOT EXISTS `crawler_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `typetemp` int(2) NOT NULL DEFAULT '0',
  `begintemp` text NOT NULL,
  `item` text NOT NULL,
  `endtemp` text NOT NULL,
  `search` text NOT NULL,
  `notemp` text NOT NULL,
  `pager` tinyint(1) NOT NULL DEFAULT '1',
  `perpage` int(8) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`),
  KEY `typetemp` (`typetemp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `crawler_templates`
--


-- --------------------------------------------------------

--
-- Table structure for table `crawler_websites`
--

CREATE TABLE IF NOT EXISTS `crawler_websites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crawler_categories_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `crawled` datetime DEFAULT NULL,
  `cached` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL DEFAULT '0',
  `system_users_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `crawler_categories_id` (`crawler_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `crawler_websites`
--

INSERT INTO `crawler_websites` (`id`, `crawler_categories_id`, `name`, `url`, `description`, `added`, `changed`, `crawled`, `cached`, `users_id`, `system_users_id`) VALUES
(1, 0, 'WebGuru3 Framework CMS', 'http://www.webgurucms.com/', ':-)', '2009-02-18 16:26:11', '2009-02-20 16:39:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(2, 3, 'AVS Video to BlackBerry', 'http://www.avs4you.com/AVS-Video-to-BlackBerry.aspx', '', '2009-02-18 16:42:46', '2009-02-18 17:40:10', '2009-02-19 16:20:17', NULL, 2, 1),
(3, 1, 'Phase3', 'http://phase3/login.php?lo=1', '...', '2009-02-19 16:57:29', '2009-02-19 17:00:54', NULL, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cron_jobs`
--

CREATE TABLE IF NOT EXISTS `cron_jobs` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `datefrom` datetime NOT NULL,
  `dateto` datetime NOT NULL,
  `period` int(11) unsigned NOT NULL DEFAULT '3600',
  `phpcode` text NOT NULL,
  `timelimit` int(4) unsigned NOT NULL DEFAULT '60',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cron_jobs`
--

INSERT INTO `cron_jobs` (`id`, `name`, `identifier`, `datefrom`, `dateto`, `period`, `phpcode`, `timelimit`) VALUES
(1, 'Basic job', 'basic-job', '2009-04-14 00:00:00', '2009-04-16 16:04:00', 3600, '', 120),
(2, 'Another job', 'another-job', '2009-04-14 17:21:00', '2011-04-14 17:21:00', 3600, '', 120);

-- --------------------------------------------------------

--
-- Table structure for table `cron_jobs_log`
--

CREATE TABLE IF NOT EXISTS `cron_jobs_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cron_jobs_id` int(4) unsigned NOT NULL,
  `message` text NOT NULL,
  `added` datetime NOT NULL,
  `iserror` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_cron_jobs_id` (`cron_jobs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cron_jobs_log`
--

INSERT INTO `cron_jobs_log` (`id`, `cron_jobs_id`, `message`, `added`, `iserror`) VALUES
(1, 1, 'Error', '2009-04-14 16:47:22', 1),
(2, 1, 'Ok', '2009-04-14 16:47:41', 0),
(3, 2, 'Too busy', '2009-04-14 17:22:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cron_userjobs`
--

CREATE TABLE IF NOT EXISTS `cron_userjobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `datefrom` datetime NOT NULL,
  `dateto` datetime NOT NULL,
  `period` int(11) unsigned NOT NULL DEFAULT '3600',
  `lastrun` datetime NOT NULL,
  `counter` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `reportmail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_keys` (`datefrom`,`dateto`,`lastrun`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cron_userjobs`
--

INSERT INTO `cron_userjobs` (`id`, `name`, `datefrom`, `dateto`, `period`, `lastrun`, `counter`, `user_id`, `url`, `reportmail`) VALUES
(1, 'test', '2009-04-14 17:30:00', '2012-04-14 17:30:00', 86400, '0000-00-00 00:00:00', 0, 1, 'http://phase3/frontend_dev.php/list_qa', 'info@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `cron_userjobs_log`
--

CREATE TABLE IF NOT EXISTS `cron_userjobs_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cron_userjobs_id` int(11) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `iserror` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_cron_userjobs_id` (`cron_userjobs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cron_userjobs_log`
--

INSERT INTO `cron_userjobs_log` (`id`, `cron_userjobs_id`, `message`, `added`, `iserror`) VALUES
(1, 1, 'Hu', '2009-04-14 17:31:29', 0),
(2, 1, 'Ho', '2009-04-14 17:31:52', 0),
(3, 1, 'He', '2009-04-14 17:31:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `csnippets_categories`
--

CREATE TABLE IF NOT EXISTS `csnippets_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `csnippets_categories`
--

INSERT INTO `csnippets_categories` (`id`, `name`, `identifier`, `description`) VALUES
(1, 'Objective C Language', 'objective-c-language', ''),
(2, 'Javascript', 'javascript', '');

-- --------------------------------------------------------

--
-- Table structure for table `csnippets_snippets`
--

CREATE TABLE IF NOT EXISTS `csnippets_snippets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `snippet` longtext NOT NULL,
  `excerpt` text NOT NULL,
  `description` longtext NOT NULL,
  `keywords` text NOT NULL,
  `csnippets_categories_id` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `system_users_id` int(11) unsigned NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`csnippets_categories_id`,`added`),
  KEY `users_id` (`users_id`,`system_users_id`),
  KEY `approved` (`approved`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `csnippets_snippets`
--


-- --------------------------------------------------------

--
-- Table structure for table `csnippets_templates`
--

CREATE TABLE IF NOT EXISTS `csnippets_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `temptype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `datasource` varchar(255) NOT NULL,
  `csnippets_categories_id` int(11) unsigned NOT NULL,
  `variable` varchar(150) NOT NULL,
  `errmess1` varchar(255) NOT NULL,
  `errmess2` varchar(255) NOT NULL,
  `errmess3` varchar(255) NOT NULL,
  `errmess4` varchar(255) NOT NULL,
  `useseo` tinyint(1) NOT NULL DEFAULT '1',
  `issearch` tinyint(1) NOT NULL DEFAULT '0',
  `pager` tinyint(1) NOT NULL DEFAULT '0',
  `perpage` int(11) NOT NULL,
  `tbegin` text NOT NULL,
  `titem` text NOT NULL,
  `tend` text NOT NULL,
  `fofred` tinyint(1) NOT NULL DEFAULT '1',
  `noitem` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temptype` (`temptype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `csnippets_templates`
--

INSERT INTO `csnippets_templates` (`id`, `temptype`, `name`, `identifier`, `datasource`, `csnippets_categories_id`, `variable`, `errmess1`, `errmess2`, `errmess3`, `errmess4`, `useseo`, `issearch`, `pager`, `perpage`, `tbegin`, `titem`, `tend`, `fofred`, `noitem`) VALUES
(5, 2, 'main', 'main', '', 0, '', '', '', '', '', 1, 0, 0, 0, '<ul>', '<li><a href="?cat={%Id}">{%Name}</a> - {%Description}</li>', '</ul>', 0, '<!-- there is no category -->'),
(6, 1, 'main', 'main', '0', 1, 'snippet', '', '', '', '', 1, 0, 0, 0, '', '<div class="detail">\r\n    <h1>{%Name}</h1>\r\n    <p class="credits"><strong>{%Author}</strong> on <span class="date">{%Date}</span> <!--<a class="DiggThisButton"><img src="http://digg.com/img/diggThisCompact.png" height="18" width="120" alt="DiggThis" /></a></p>\r\n    <script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>-->\r\n    <!--{# MOD_blog_files_detailfiles}-->\r\n    <div class="head">{%Excerpt}</div>\r\n    <div class="text"><pre>{%Snippet}</pre> {%Description}</div>\r\n    <div class="signature">\r\n        <p class="avatar"><img src="http://www.gravatar.com/avatar/913dd7ab0644335c4c30f27ad8bc310b" alt="Ondrej Rafaj" width="50" height="50" /></p>\r\n        <p class="name"><strong>{%Author}</strong></p>\r\n        <small>Independent iPhone developer @ <a href="http://www.ondrej-rafaj.co.uk/">ondrej-rafaj.co.uk</a></small>\r\n        <p class="info">\r\n            I am available to give you a free quote or start working on your project ... just give me a call or drop a line. Please find all my details on my portfolio site <a href="http://www.ondrej-rafaj.co.uk/">ondrej-rafaj.co.uk</a>\r\n        </p>\r\n\r\n    </div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="#comment" class="more"><span>Comment</span></a>\r\n    </p>\r\n    <h5><strong>Comments ...</strong> Why not to get involved!</h5>\r\n    <p>We had to disable comments till the problem with spam will be solved, sorry for any inconvenience caused.</p>\r\n    <!--{# MOD_comments_list_snippet-comments}\r\n    {# MOD_comments_form_snippet}-->\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n    </p>\r\n</div>\r\n', '', 0, '<p>there is no snippet</p>'),
(7, 3, 'main', 'main', '0', 2, 'snippet', 'Please check the snippet name', 'Snippet field can not be empty', 'You dont have enough permissions to send a snippet', 'Your snippet has been sent', 1, 1, 0, 0, '', '<form action="" method="post">\r\n	<p>\r\n		<label for="cname">Name</label>\r\n		<input type="text" name="cname" id="cname" value="{%Name}" />\r\n	</p>\r\n	<p>\r\n		<label for="csnippet">Code</label>\r\n		<input type="text" name="csnippet" id="csnippet" value="{%Snippet}" />\r\n	</p>\r\n	<p>\r\n		<label for="cexcerpt">Excerpt</label>\r\n		<input type="text" name="cexcerpt" id="cexcerpt" value="{%Excerpt}" />\r\n	</p>\r\n	<p>\r\n		<label for="cdescription">Full description</label>\r\n		<input type="text" name="cdescription" id="cdescription" value="{%Description}" />\r\n	</p>\r\n	<p>\r\n		<label for="ckeywords">Keyword tags</label>\r\n		<input type="text" name="ckeywords" id="ckeywords" value="{%Keywords}" />\r\n	</p>\r\n	<p>\r\n		<button type="reset">Reset</button>\r\n		<button type="submit">Send</button>\r\n	</p>\r\n</form>', 'http://', 0, '<!-- you need to be logget in to see the form -->'),
(8, 0, 'main', 'main', '2', 2, 'snippet', '', '', '', '0', 0, 0, 1, 20, '<div class="posts">\r\n', '<div class="post">\r\n    <h2><a href="{#WEBROOT}snippet-{%id}-{%Identifier}/">{%Name}</a></h2>\r\n    <p class="credit"><strong>{%Date}</strong> by <strong>{%Author}</strong></p>\r\n    <div class="head">{%Excerpt}</div>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="{#WEBROOT}snippet-{%id}-{%Identifier}/" class="more" title="Read more about {%Title}"><span>Read more ...</span></a>\r\n    </p>\r\n</div>\r\n', '</div>\r\n<div class="pager">{%PAGER}</div>', 0, '<!-- there is no snippet -->'),
(9, 0, 'my snippets', 'my-snippets', '5', 1, 'snippet', 'Snippet has been deleted', 'Unable to delete this snippet', 'You don''t have enough permissions to delete this snippet', '0', 0, 0, 1, 20, '<table class="admin">\r\n	<colgroup>\r\n		<col style="width: 80%;" />\r\n		<col style="width: 10%;" />\r\n		<col style="width: 10%;" />\r\n	</colgroup>\r\n    <thead>\r\n        <tr>\r\n            <th colspan="3"><span>Your snippets</span></th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>', '<tr>\r\n    <td class="{%Enabled}">{%Name}</td>\r\n    <td><a href="{#LINK_42}?edit={%Id}#editForm"><span>Edit</span></a></td>\r\n    <td><a href="{#LINK_42}?delete={%Id}"><span>Delete</span></a></td>\r\n</tr>\r\n', '    </tbody>\r\n</table>\r\n<div class="pager">{%PAGER}</div>', 0, '<!-- there is no snippet -->'),
(10, 0, 'Sitemap', 'sitemap', '2', 2, 'snippet', 'Snippet has been deleted', 'Unable to delete this snippet', 'You don''t have enough permissions to delete this snippet', '0', 0, 0, 0, 9999, '<ul>', '<li><a href="?snippet={%Id}">{%Name}</a> by {%Author}</li>', '</ul>\r\n<p class="bottom">\r\n    <a href="#top" class="top"><span>Back to top</span></a>\r\n</p>\r\n', 0, '<!-- there is no snippet -->');

-- --------------------------------------------------------

--
-- Table structure for table `dda_firmy`
--

CREATE TABLE IF NOT EXISTS `dda_firmy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ic` varchar(50) NOT NULL,
  `dic` varchar(50) NOT NULL,
  `zalozena` datetime NOT NULL,
  `kapital` int(11) NOT NULL,
  `typ` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dda_firmy`
--

INSERT INTO `dda_firmy` (`id`, `name`, `ic`, `dic`, `zalozena`, `kapital`, `typ`) VALUES
(1, 'Ondrej Rafaj', '71987002', 'CZ71987002', '2006-06-29 00:00:00', 0, 'Zivnostnik'),
(2, 'Nantuko', '27246591', 'CZ', '2005-06-17 19:00:00', 200, 'S.R.O.');

-- --------------------------------------------------------

--
-- Table structure for table `dda_kontakty`
--

CREATE TABLE IF NOT EXISTS `dda_kontakty` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prijmeni` varchar(255) NOT NULL,
  `funkce` varchar(255) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `telefon` varchar(60) NOT NULL,
  `mobil` varchar(60) NOT NULL,
  `dda_firmy_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dda_kontakty`
--

INSERT INTO `dda_kontakty` (`id`, `name`, `prijmeni`, `funkce`, `mail`, `telefon`, `mobil`, `dda_firmy_id`) VALUES
(1, 'Ondrej', 'Rafaj', 'CEO', 'ondrej.rafaj@fuerte.cz', '447972574949', '447972574949', 1),
(2, 'Jiri', 'Chorous', 'CEO, Jednatel', 'jiri.chorous@nantuko.cz', '420', '420', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dda_payment_types`
--

CREATE TABLE IF NOT EXISTS `dda_payment_types` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cost` int(6) unsigned DEFAULT NULL,
  `sort` int(6) unsigned NOT NULL DEFAULT '0',
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dda_payment_types`
--

INSERT INTO `dda_payment_types` (`id`, `name`, `cost`, `sort`, `default`) VALUES
(1, 'Hotove', 20, 0, 1),
(2, 'PayPal', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dda_platby`
--

CREATE TABLE IF NOT EXISTS `dda_platby` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `ammount` int(11) unsigned DEFAULT NULL,
  `dda_payment_types_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paytype` (`dda_payment_types_id`),
  KEY `users` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dda_platby`
--

INSERT INTO `dda_platby` (`id`, `users_id`, `added`, `ammount`, `dda_payment_types_id`) VALUES
(1, 1, '2009-05-09 21:40:37', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dda_pohledavky`
--

CREATE TABLE IF NOT EXISTS `dda_pohledavky` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `dda_firmy_id` int(10) unsigned NOT NULL,
  `dda_firmy_dluznik_id` int(10) unsigned NOT NULL,
  `castka` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`,`dda_firmy_id`,`dda_firmy_dluznik_id`),
  KEY `firmy` (`dda_firmy_id`),
  KEY `ud` (`dda_firmy_dluznik_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dda_pohledavky`
--

INSERT INTO `dda_pohledavky` (`id`, `users_id`, `dda_firmy_id`, `dda_firmy_dluznik_id`, `castka`, `added`, `status`) VALUES
(1, 1, 1, 1, 50000, '2009-05-09 21:53:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `documents_categories`
--

CREATE TABLE IF NOT EXISTS `documents_categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `documents_categories`
--

INSERT INTO `documents_categories` (`id`, `parent`, `name`, `desc`, `added`, `changed`) VALUES
(3, 2, 'ccccccccccccc', '', '2009-02-24 15:53:40', '2009-02-24 16:00:55'),
(4, 3, 'ggggggggggg', '', '2009-02-24 16:14:49', '2009-02-24 16:14:49'),
(5, 3, 'fffffffffffffff', '', '2009-02-24 16:15:30', '2009-02-24 16:15:30'),
(6, 0, 'HR Forms', '', '2009-03-18 10:24:38', '2009-03-18 10:24:38'),
(7, 0, 'Creative Forms', '', '2009-03-18 10:30:06', '2009-03-18 10:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `documents_items`
--

CREATE TABLE IF NOT EXISTS `documents_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `documents_categories_id` int(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` int(8) unsigned NOT NULL,
  `description` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  `downloads` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `enabled` (`enabled`),
  KEY `views` (`views`,`downloads`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `documents_items`
--

INSERT INTO `documents_items` (`id`, `documents_categories_id`, `name`, `file`, `size`, `description`, `added`, `changed`, `enabled`, `views`, `downloads`) VALUES
(1, 6, 'Joshua Holiday Form', 'documents-6-J_HOLIDAY_FORM.pdf', 104057, '', '2009-03-18 10:27:28', '2009-03-18 10:27:28', 1, 0, 0),
(2, 6, 'Railcard Season Ticket Loan', 'documents-6-Season_Ticket_Loan.pdf', 20086, '', '2009-03-18 10:28:23', '2009-03-18 10:28:23', 1, 0, 0),
(3, 6, 'Staff Recruitment Form', 'documents-6-Staff_Recruitment_Formb.pdf', 101704, '', '2009-03-18 10:29:11', '2009-03-18 10:29:11', 1, 0, 0),
(4, 7, 'Scope of Work', 'documents-7-Scope of Work.doc', 198144, '', '2009-03-18 10:30:59', '2009-03-18 10:30:59', 1, 0, 0),
(5, 7, 'Change Request Template', 'documents-7-Change Request Template.doc', 126976, '', '2009-03-18 10:31:34', '2009-03-18 10:31:34', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `documents_templates`
--

CREATE TABLE IF NOT EXISTS `documents_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pager` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `perpage` int(4) unsigned NOT NULL,
  `datasource` int(3) unsigned NOT NULL DEFAULT '0',
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `documents_templates`
--

INSERT INTO `documents_templates` (`id`, `name`, `identifier`, `temptype`, `pager`, `perpage`, `datasource`, `tempbegin`, `tempitem`, `tempend`) VALUES
(1, 'aaaaaaaaa', 'aaaaaaaaa', 0, 0, 0, 5, '<ul>', '<li><a href="{%CheckedLink}" class="{%Empty}">{%name}</a></li>', '</ul>\r\n{%FullBackLink}\r\n{%PAGER}'),
(2, 'all', 'all', 1, 0, 4, 4, '<ul>', '<li><a href="{%DownloadLink}">{%Icon} - {%Name}</a></li>', '</ul>{%PAGER}'),
(5, 'My detail', 'my-detail', 2, 0, 0, 0, '', '<br />{HAHAHA} :-)', '<h1>There is nothing in there</h1>'),
(6, 'favourites', 'favourites', 3, 0, 2, 0, '<ul>', '<li><a href="{%DownloadLink}">{%Icon} - {%Name}</a></li>', '</ul>{%PAGER}');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_columns`
--

CREATE TABLE IF NOT EXISTS `dynamic_columns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `type` int(3) unsigned NOT NULL DEFAULT '1',
  `validation` int(3) unsigned NOT NULL DEFAULT '0',
  `mandatory` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `note` text NOT NULL,
  `dynamic_modules_id` int(8) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_dynamic_columns_mod` (`dynamic_modules_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dynamic_columns`
--


-- --------------------------------------------------------

--
-- Table structure for table `dynamic_modules`
--

CREATE TABLE IF NOT EXISTS `dynamic_modules` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `system_websites_id` int(4) unsigned DEFAULT '0',
  `system_users_id` int(8) unsigned NOT NULL,
  `categories` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `items` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `templates` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dynamic_modules`
--

INSERT INTO `dynamic_modules` (`id`, `name`, `identifier`, `added`, `changed`, `system_websites_id`, `system_users_id`, `categories`, `items`, `templates`) VALUES
(1, 'List', 'list', '2009-03-05 15:19:12', '2009-03-05 15:19:19', 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emails_addresses`
--

CREATE TABLE IF NOT EXISTS `emails_addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emails_groups_id` int(8) unsigned DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `unsubscribed` datetime NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`emails_groups_id`,`enabled`,`mail`,`unsubscribed`,`added`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emails_addresses`
--


-- --------------------------------------------------------

--
-- Table structure for table `emails_groups`
--

CREATE TABLE IF NOT EXISTS `emails_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emails_groups`
--

INSERT INTO `emails_groups` (`id`, `name`) VALUES
(2, 'test'),
(3, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `emails_permissions`
--

CREATE TABLE IF NOT EXISTS `emails_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emails_groups_id` int(8) unsigned NOT NULL,
  `system_teams_id` int(8) unsigned NOT NULL,
  `permissions` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `keys` (`emails_groups_id`,`system_teams_id`),
  KEY `FK_emails_permissions_team` (`system_teams_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emails_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `emails_templates`
--

CREATE TABLE IF NOT EXISTS `emails_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `system_encoding_id` int(8) unsigned DEFAULT NULL,
  `system_language_id` int(3) DEFAULT NULL,
  `system_websites_id` int(4) DEFAULT NULL,
  `emails_groups_id` int(8) unsigned NOT NULL,
  `html` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kencoding` (`system_encoding_id`),
  KEY `klanguage` (`system_language_id`),
  KEY `kwebsite` (`system_websites_id`),
  KEY `kgroup` (`emails_groups_id`),
  KEY `identifier` (`identifier`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emails_templates`
--

INSERT INTO `emails_templates` (`id`, `name`, `identifier`, `default`, `system_encoding_id`, `system_language_id`, `system_websites_id`, `emails_groups_id`, `html`, `text`) VALUES
(1, 'first master', 'first-master', 1, NULL, NULL, 1, 2, '<html> <h1>Welcome {NAME} {SURNAME}</h1> {CONTENT} </html>', 'Welcome {CONTENT}'),
(2, 'first temp', 'first-temp', 0, 1, 1, 1, 2, '<html> <h1>Welcome {NAME} {SURNAME}</h1> {CONTENT} </html>', 'Welcome {CONTENT}');

-- --------------------------------------------------------

--
-- Table structure for table `emails_templates_revisions`
--

CREATE TABLE IF NOT EXISTS `emails_templates_revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emails_templates_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `system_encoding_id` int(8) unsigned NOT NULL,
  `system_language_id` int(3) NOT NULL,
  `system_websites_id` int(4) NOT NULL,
  `emails_groups_id` int(8) unsigned NOT NULL,
  `html` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kencoding` (`system_encoding_id`),
  KEY `klanguage` (`system_language_id`),
  KEY `kwebsite` (`system_websites_id`),
  KEY `kgroup` (`emails_groups_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emails_templates_revisions`
--


-- --------------------------------------------------------

--
-- Table structure for table `emails_trimage`
--

CREATE TABLE IF NOT EXISTS `emails_trimage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email_templates_id` int(11) unsigned NOT NULL,
  `email_addresses_id` int(11) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `referer` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `agent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_emails_trimage_template` (`email_templates_id`),
  KEY `FK_emails_trimage_adresses` (`email_addresses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `emails_trimage`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `datestart` datetime NOT NULL,
  `dateend` datetime NOT NULL,
  `country` varchar(150) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `activity_other` varchar(255) NOT NULL,
  `activity_note` text NOT NULL,
  `action` varchar(255) NOT NULL,
  `action_note` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_note` text NOT NULL,
  `action_next` varchar(255) NOT NULL,
  `action_next_date` date NOT NULL,
  `general_note` text NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `datestart`, `dateend`, `country`, `activity`, `activity_other`, `activity_note`, `action`, `action_note`, `status`, `status_note`, `action_next`, `action_next_date`, `general_note`, `users_id`, `added`, `changed`) VALUES
(1, 'First event', '2009-05-14 10:37:21', '2009-05-26 10:37:26', 'UK', 'Machen quatsch', 'none', 'no note', 'action', 'action note', 'status', 'status note', 'action next', '2009-05-14', 'general note', 0, '2009-05-14 10:38:42', '2009-05-14 10:38:42'),
(2, 'Second event', '2009-05-14 10:37:21', '2009-05-26 10:37:26', 'UK', 'Machen quatsch', 'none', 'no note', 'action', 'action note', 'status', 'status note', 'action next', '2009-05-14', 'general note', 1, '2009-05-14 10:38:42', '2009-05-14 10:38:42'),
(3, 'Third event', '2009-05-14 10:37:21', '2009-05-26 10:37:26', 'UK', 'Machen quatsch', 'none', 'no note', 'action', 'action note', 'status', 'status note', 'action next', '2009-05-14', 'general note', 1, '2009-05-14 10:38:42', '2009-05-14 10:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `flash_categories`
--

CREATE TABLE IF NOT EXISTS `flash_categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `flash_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `flash_items`
--

CREATE TABLE IF NOT EXISTS `flash_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `flash_categories_id` int(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `width` int(4) unsigned NOT NULL,
  `lenght` int(4) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `keys` (`flash_categories_id`,`enabled`),
  FULLTEXT KEY `ft` (`description`,`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `flash_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `forms_fields`
--

CREATE TABLE IF NOT EXISTS `forms_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forms_items_id` int(8) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` varchar(115) NOT NULL DEFAULT 'text',
  `system_validation_id` int(4) unsigned DEFAULT '0',
  `errmessage` varchar(255) NOT NULL,
  `errorgroup` int(4) unsigned NOT NULL,
  `sort` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `keys` (`forms_items_id`,`system_validation_id`,`sort`),
  KEY `FK_forms_fields_validation` (`system_validation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `forms_fields`
--

INSERT INTO `forms_fields` (`id`, `forms_items_id`, `name`, `label`, `type`, `system_validation_id`, `errmessage`, `errorgroup`, `sort`) VALUES
(245, 1, 'cname', 'Name', 'text', 1, 'Check your name', 1, 10),
(246, 1, 'cmail', 'Email', 'text', 1, 'Please check your email address', 1, 9),
(247, 1, 'cmessage', 'Message', 'text', 1, 'Please check the message', 1, 7),
(249, 2, 'cname', 'Name', 'text', 1, 'Please provide your name', 1, 200),
(250, 2, 'cmail', 'Email', 'text', 1, 'Please check your email', 1, 100),
(240, 3, 'captcha', 'Captcha', 'captcha', 1, 'Please type the CAPTCHA code properly', 1, 0),
(239, 3, 'message', 'Description', 'text', 0, 'Please check link description', 0, 30),
(236, 3, 'name', 'Name', 'text', 1, 'Please check your name', 1, 100),
(237, 3, 'email', 'Email', 'text', 1, 'Please check your email', 1, 90),
(238, 3, 'url', 'URL', 'text', 0, '', 0, 50),
(251, 2, 'cmessage', 'Message', 'text', 1, 'Please check the message', 1, 50),
(230, 4, 'sffName', 'Name', 'text', 1, 'Please fill your name in.', 1, 200),
(231, 4, 'sffMail', 'Email', 'text', 1, 'Please provide a valid Email address.', 1, 100),
(232, 4, 'sffMessage', 'Message', 'text', 1, 'Please type in some message :)', 1, 0),
(248, 1, 'captcha', 'Captcha', 'captcha', 1, 'Please type the CAPTCHA code properly', 1, 0),
(252, 2, 'captcha', 'Captcha', 'captcha', 1, 'Please type the CAPTCHA code properly', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forms_items`
--

CREATE TABLE IF NOT EXISTS `forms_items` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `system_language_id` int(3) DEFAULT NULL,
  `system_websites_id` int(4) DEFAULT NULL,
  `mailfield` varchar(80) NOT NULL,
  `forms_messages_group_id` int(8) unsigned DEFAULT NULL,
  `adminmail` varchar(255) NOT NULL,
  `template` text NOT NULL,
  `usehtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mailhtml` text NOT NULL,
  `usetxt` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mailtxt` text NOT NULL,
  `okmessage` varchar(255) NOT NULL,
  `errormessage` varchar(255) NOT NULL,
  `warningmessage` varchar(255) NOT NULL,
  `redirect` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`system_language_id`,`system_websites_id`,`forms_messages_group_id`),
  KEY `FK_forms_items_website` (`system_websites_id`),
  KEY `FK_forms_items_messgroup` (`forms_messages_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `forms_items`
--

INSERT INTO `forms_items` (`id`, `system_language_id`, `system_websites_id`, `mailfield`, `forms_messages_group_id`, `adminmail`, `template`, `usehtml`, `mailhtml`, `usetxt`, `mailtxt`, `okmessage`, `errormessage`, `warningmessage`, `redirect`, `name`, `identifier`, `added`, `changed`) VALUES
(1, 4, 3, 'cmail', 1, 'contact-us@ondrej-rafaj.co.uk', '<form method="post" action="">\r\n    <p>\r\n        <label for="cname">Full name:</label>\r\n        <input type="text" name="cname" value="{CNAME}" title="Please type your full name" />\r\n    </p>\r\n    <p>\r\n        <label for="cmail">Email:</label>\r\n        <input type="text" name="cmail" value="{CMAIL}" title="Please type your email address name" />\r\n    </p>\r\n    <p>\r\n        <label for="cmessage">Message:</label>\r\n        <textarea name="cmessage" cols="30" rows="5" title="And if you have anything to say (mind that we don''t like complaints)">{CMESSAGE}</textarea>\r\n    </p>\r\n	<p class="captcha">\r\n        <label class="mandatory" for="captcha">Enter verification code</label>\r\n        <span>\r\n            {CAPTCHAIMG}<br />\r\n            <input name="captcha" id="captcha" value="" type="text" />\r\n        </span>\r\n    </p>\r\n    <p>\r\n        <input type="hidden" name="submitqform" value="{IDFORM}" />\r\n        <button type="reset"><span>Reset</span></button>\r\n        <button type="submit" name="submit"><span>Submit</span></button>\r\n    </p>\r\n</form>\r\n', 0, '<h1>{SUBJECT}</h1>\r\n<p>{MESSAGE}</p>', 0, 'From: {NAME} ({EMAIL})\r\n\r\n{SUBJECT}\r\n\r\n{MESSAGE}', 'Message has been sent, thank you', 'Something is wrong', '', '', 'xProgress - Main contact form', 'contact-form', '0000-00-00 00:00:00', '2010-01-26 15:33:39'),
(2, 4, 3, 'cmail', 1, 'info@xprogress.com', '<form action="" method="post">\r\n    <p>\r\n        <label>Name</label>\r\n        <input type="text" name="cname" value="{CNAME}" title="Please type your full name here" />\r\n    </p>\r\n    <p>\r\n        <label>Email</label>\r\n        <input type="text" name="cmail" value="{CMAIL}" title="Please type your email address here" />\r\n    </p>\r\n    <p>\r\n        <label>What do you want to know about?</label>\r\n        <textarea name="cmessage" cols="30" rows="5" title="Please provide a short description or a specific topic you want to know more about ...">{CMESSAGE}</textarea>\r\n    </p>\r\n	<p class="captcha">\r\n        <label class="mandatory" for="captcha">Enter verification code</label>\r\n        <span>\r\n            {CAPTCHAIMG}<br />\r\n            <input name="captcha" id="captcha" value="" type="text" />\r\n        </span>\r\n    </p>\r\n    <p>\r\n        <button name="reset" type="reset"><span>Reset</span></button>\r\n        <input name="submitqform" value="{IDFORM}" type="hidden">\r\n        <button name="submit" type="submit"><span>Send request</span></button>\r\n    </p>\r\n</form>\r\n', 0, '', 0, '', 'Your message has been sent', 'Please try again later', '', '', 'xProgress - Tutorial request', 'xprogress-tutorial-request', '2009-06-17 21:37:11', '2010-01-26 15:36:02'),
(3, 4, 3, 'email', 1, 'articles@xprogress.com', '<h2>Have you seen some nice tutorial, application or article? Please tell us.</h2>\r\n<form action="" method="post" class="bottom">\r\n	<p>\r\n		<label class="mandatory">Your Name an Surname:</label>\r\n		<input name="name" value="{NAME}" type="text" />\r\n	</p>\r\n	<p>\r\n		<label class="mandatory">Your E-Mail:</label>\r\n		<input name="email" value="{EMAIL}" type="text" />\r\n	</p>\r\n	<p>\r\n		<label for="subject">URL / Link:</label>\r\n		<input name="url" value="{SUBJECT}" type="text" />\r\n	</p>\r\n	<p>\r\n		<label for="message" class="mandatory">Description:</label>\r\n		<textarea name="message" cols="50" rows="9">{MESSAGE}</textarea>\r\n	</p>\r\n	<p class="captcha">\r\n        <label class="mandatory" for="captcha">Enter verification code</label>\r\n        <span>\r\n            {CAPTCHAIMG}<br />\r\n            <input name="captcha" id="captcha" value="" type="text" />\r\n        </span>\r\n    </p>\r\n	<p>\r\n		<!-- submitqform field must be used to identify the form -->\r\n		<input name="submitqform" value="{IDFORM}" type="hidden">\r\n		<button name="reset" type="reset">Reset</button>\r\n		<button name="submit" type="submit">Submit</button>\r\n	</p>\r\n</form>\r\n', 0, '', 0, '', 'Your message has been sent', 'Please try again later', '', '', 'xProgress - New article', 'new-article', '2009-06-22 19:36:46', '2010-01-25 19:51:42'),
(4, 4, 3, 'email', 1, 'ondrej.rafaj@gmail.com', '<form action="" method="post" class="inline">\r\n    <ul class="col col4">\r\n        <li class="header">Contact us</li>\r\n        <li>\r\n            <label for="sffName" class="mandatory">Name:</label>\r\n            <input type="text" name="sffName" id="sffName" value="{SFFNAME}" title="Your name" />\r\n        </li>\r\n        <li>\r\n            <label for="sffMail" class="mandatory">Email:</label>\r\n            <input type="text" name="sffMail" id="sffMail" value="{SFFEMAIL}" title="Your email address" />\r\n        </li>\r\n        <li>\r\n            <label for="sffMessage" class="mandatory">Message:</label>\r\n            <textarea name="sffMessage" id="sffMessage" cols="35" rows="3" title="Your message">{SFFMESSAGE}</textarea>\r\n        </li>\r\n        <li>\r\n        	<input name="submitqform" value="{IDFORM}" type="hidden">\r\n            <button type="submit" name="submit"><span>Submit</span></button>\r\n        </li>\r\n    </ul>\r\n</form>', 0, '', 0, '', 'Your message has been sent', 'Please try again later', '', '', 'xProgress - Footer contact form', 'xprogress-footer-contact-form', '2010-01-18 13:54:18', '2010-01-18 13:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `forms_messages`
--

CREATE TABLE IF NOT EXISTS `forms_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forms_items_id` int(8) unsigned DEFAULT '0',
  `forms_messages_groups_id` int(8) unsigned NOT NULL,
  `data` text NOT NULL,
  `added` datetime NOT NULL,
  `readflag` int(8) NOT NULL DEFAULT '0',
  `readwhen` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`forms_items_id`,`forms_messages_groups_id`),
  KEY `added` (`added`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forms_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `forms_messages_groups`
--

CREATE TABLE IF NOT EXISTS `forms_messages_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forms_messages_groups`
--

INSERT INTO `forms_messages_groups` (`id`, `name`) VALUES
(1, 'Contact forms'),
(2, 'Enquiry forms');

-- --------------------------------------------------------

--
-- Table structure for table `forms_messages_history`
--

CREATE TABLE IF NOT EXISTS `forms_messages_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forms_messages_id` int(11) unsigned NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `action` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`forms_messages_id`,`system_users_id`,`added`),
  KEY `FK_forms_messages_history_users` (`system_users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forms_messages_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `forms_recipients`
--

CREATE TABLE IF NOT EXISTS `forms_recipients` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `forms_items_id` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_forms_recipients_form` (`forms_items_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `forms_recipients`
--

INSERT INTO `forms_recipients` (`id`, `mail`, `forms_items_id`) VALUES
(186, 'ondrej.rafaj@googlemail.com', 4),
(190, 'ondrej.rafaj@googlemail.com', 1),
(191, 'ondrej.rafaj@googlemail.com', 2),
(188, 'ondrej.rafaj@googlemail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `forms_sendmails`
--

CREATE TABLE IF NOT EXISTS `forms_sendmails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forms_items_id` int(8) unsigned NOT NULL,
  `emails_templates_id` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`forms_items_id`,`emails_templates_id`,`type`),
  KEY `FK_forms_sendmails_template` (`emails_templates_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forms_sendmails`
--


-- --------------------------------------------------------

--
-- Table structure for table `forms_subscriptions`
--

CREATE TABLE IF NOT EXISTS `forms_subscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emails_groups_id` int(8) unsigned NOT NULL,
  `forms_items_id` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`emails_groups_id`,`forms_items_id`),
  KEY `FK_forms_subscriptions_form` (`forms_items_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forms_subscriptions`
--


-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE IF NOT EXISTS `gallery_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT '0',
  `system_language_id` int(3) NOT NULL DEFAULT '0',
  `system_websites_id` int(4) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `main_thumb_id` bigint(20) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `head` text NOT NULL,
  `description` longtext NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `added` (`added`),
  KEY `parent` (`parent`),
  KEY `system_language_id` (`system_language_id`,`system_websites_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `parent`, `system_language_id`, `system_websites_id`, `name`, `identifier`, `added`, `changed`, `main_thumb_id`, `date`, `head`, `description`, `note`) VALUES
(1, 0, 1, 1, 'test', 'test', '2009-06-15 04:24:57', '2009-06-15 04:25:16', 0, '2009-06-15 09:23:00', '', '', ''),
(2, 1, 1, 1, 'aaaaaaa', 'aaaaaaa', '2009-06-15 04:27:22', '2009-06-15 04:27:22', 0, '2009-06-15 09:28:00', '', '', ''),
(3, 2, 1, 1, 'bbbbbb', 'bbbbbb', '2009-06-15 04:27:33', '2009-06-15 04:27:33', 0, '2009-06-15 09:28:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_items`
--

CREATE TABLE IF NOT EXISTS `gallery_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `metakeywords` text NOT NULL,
  `metadescription` text NOT NULL,
  `note` text NOT NULL,
  `added` datetime NOT NULL,
  `captured` datetime DEFAULT NULL,
  `users_id` int(11) unsigned DEFAULT NULL,
  `system_users_id` int(11) unsigned DEFAULT NULL,
  `head` text NOT NULL,
  `description` longtext NOT NULL,
  `exif` longtext NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gallery_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `gallery_types`
--

CREATE TABLE IF NOT EXISTS `gallery_types` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `mime` varchar(150) NOT NULL,
  `maxsize` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gallery_types`
--


-- --------------------------------------------------------

--
-- Table structure for table `htaccess_code`
--

CREATE TABLE IF NOT EXISTS `htaccess_code` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `system_users_id` int(11) unsigned DEFAULT NULL,
  `system_websites_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_htaccess_code_users` (`system_users_id`),
  KEY `FK_htaccess_code_web` (`system_websites_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `htaccess_code`
--


-- --------------------------------------------------------

--
-- Table structure for table `htaccess_htpasswd`
--

CREATE TABLE IF NOT EXISTS `htaccess_htpasswd` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `system_websites_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_htaccess_htpasswd_web` (`system_websites_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `htaccess_htpasswd`
--

INSERT INTO `htaccess_htpasswd` (`id`, `name`, `password`, `location`, `enabled`, `system_websites_id`) VALUES
(1, 'ondrej', 'aaaaaa', './temp/', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `htaccess_rows`
--

CREATE TABLE IF NOT EXISTS `htaccess_rows` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rule` text NOT NULL,
  `type` int(2) unsigned NOT NULL,
  `system_users_id` int(8) unsigned DEFAULT NULL,
  `system_modules_id` int(6) unsigned DEFAULT NULL,
  `system_websites_id` int(4) NOT NULL,
  `sort` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_htaccess_rows_users` (`system_users_id`),
  KEY `FK_htaccess_rows_module` (`system_modules_id`),
  KEY `FK_htaccess_rows_website` (`system_websites_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `htaccess_rows`
--

INSERT INTO `htaccess_rows` (`id`, `name`, `rule`, `type`, `system_users_id`, `system_modules_id`, `system_websites_id`, `sort`) VALUES
(5, 'Main Rewrite', 'RewriteRule ^app-plist-(.*).plist$ app-plist/?mobileAppId=$1 [QSA]', 1, 1, 8, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `iblog_blogs`
--

CREATE TABLE IF NOT EXISTS `iblog_blogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `users_id` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `pictures` int(11) NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `motto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier_2` (`identifier`),
  KEY `keys` (`users_id`,`posts`,`pictures`,`added`,`changed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `iblog_blogs`
--

INSERT INTO `iblog_blogs` (`id`, `name`, `identifier`, `description`, `users_id`, `posts`, `pictures`, `added`, `changed`, `motto`) VALUES
(1, 'My blog', 'my-blog1', '...', 0, 0, 0, '2009-11-10 22:39:35', '2009-11-10 22:39:35', 'Play hard, die well'),
(2, 'My second blog', 'my-second-blog1', '...', 0, 0, 0, '2009-11-10 22:39:48', '2009-11-10 22:39:48', 'Play hard, die well'),
(11, 'Blog that actually has some data', 'aaaaa10', 'test woe', 0, 0, 0, '2009-11-11 12:05:42', '2009-11-12 23:36:53', 'Play hard, die quickly'),
(12, 'My first iBlog', 'my-first-iblog11', '...', 0, 0, 0, '2009-11-11 14:47:51', '2009-11-11 14:47:51', 'Play hard, die well'),
(16, 'Ben aa', 'copsey-cccccc', 'Desc woe pyco :) dddddd', 0, 0, 0, '2009-11-11 18:11:42', '2009-11-12 23:35:47', 'huhuhu'),
(20, 'Andrews blog', 'andrews-blog19', '...', 0, 0, 0, '2009-11-11 18:16:37', '2009-11-11 18:16:37', 'Play hard, die well'),
(21, 'huuuuuuu', 'asdadad', '...', 0, 0, 0, '2010-02-19 22:28:41', '2010-02-19 22:29:35', 'Asdasdadad'),
(22, 'My first iBlog', 'my-first-iblog21', '...', 0, 0, 0, '2010-02-20 06:01:13', '2010-02-20 06:01:13', 'Play hard, die well');

-- --------------------------------------------------------

--
-- Table structure for table `iblog_devices`
--

CREATE TABLE IF NOT EXISTS `iblog_devices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `device` varchar(60) NOT NULL,
  `iblog_blogs_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`,`device`,`iblog_blogs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `iblog_devices`
--

INSERT INTO `iblog_devices` (`id`, `users_id`, `device`, `iblog_blogs_id`) VALUES
(1, 0, 'd24965e1be39da8e5e5263ccf9258afdc5f7eea9', 1),
(2, 0, 'd24965e1be39da8e5e5263ccf9258afdc5f7eea9', 2),
(12, 0, 'iphoned24965e1be39da8e5e5263ccf9258afdc5f7eea9', 11),
(13, 0, 'iphone7cec0e5a-a16b-5d60-8c0d-5150b37e69bb', 12),
(14, 0, 'iphone7cec0e5a-a16b-5d60-8c0d-5150b37e69bb', 12),
(18, 0, 'iphoned24965e1be39da8e5e5263ccf9258afdc5f7eea9', 16),
(22, 0, 'iphoned24965e1be39da8e5e5263ccf9258afdc5f7eea9', 20),
(23, 0, 'iphone7cec0e5a-a16b-5d60-8c0d-5150b37e69bb', 21),
(24, 0, 'iphone8c6ea579acdc2e1a9ce878bd5f392faaf75b8161', 22),
(25, 0, 'iphone8c6ea579acdc2e1a9ce878bd5f392faaf75b8161', 22);

-- --------------------------------------------------------

--
-- Table structure for table `iblog_posts`
--

CREATE TABLE IF NOT EXISTS `iblog_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iblog_blogs_id` int(11) unsigned NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `head` text NOT NULL,
  `text` longtext NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL DEFAULT '0',
  `lastcomment` datetime NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `iblog_blogs_id` (`iblog_blogs_id`,`users_id`,`views`,`enabled`),
  KEY `comments` (`comments`),
  KEY `lastcomments` (`lastcomment`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `iblog_posts`
--

INSERT INTO `iblog_posts` (`id`, `iblog_blogs_id`, `users_id`, `name`, `identifier`, `head`, `text`, `added`, `changed`, `views`, `comments`, `lastcomment`, `enabled`) VALUES
(1, 11, 0, 'Test post', 'test-post', 'this is my head.\r\n\r\nand new line', 'this is my text.\r\n\r\nand new line\r\n\r\nthis is my text.\r\n\r\nand new line\r\nthis is my text.\r\n\r\nand new line', '2009-11-12 17:07:36', '2009-11-12 17:27:36', 69, 666, '2009-11-12 18:07:36', 1),
(2, 11, 0, 'This is another test post :)', 'test-post', 'this is my head.\r\n\r\nand new line', 'this is my text.\r\n\r\nand new line\r\n\r\nthis is my text.\r\n\r\nand new line\r\nthis is my text.\r\n\r\nand new line', '2009-11-12 17:07:36', '2009-11-12 17:27:36', 460, 1, '2009-11-12 18:07:36', 1),
(3, 11, 0, 'Test post', 'test-post', 'this is my head.\r\n\r\nand new line', 'this is my text.\r\n\r\nand new line\r\n\r\nthis is my text.\r\n\r\nand new line\r\nthis is my text.\r\n\r\nand new line', '2009-11-12 17:07:36', '2009-11-12 17:27:36', 69, 666, '2009-11-12 18:07:36', 1),
(4, 11, 0, 'This one will be really interesting for anyone who''ll have the patience to reaad it ...', 'test-post', 'this is my head.\r\n\r\nand new line', 'this is my text.\r\n\r\nand new line\r\n\r\nthis is my text.\r\n\r\nand new line\r\nthis is my text.\r\n\r\nand new line', '2009-11-12 17:07:36', '2009-11-12 17:27:36', 69, 666, '2009-11-12 18:07:36', 1),
(5, 11, 0, 'Test post', 'test-post', 'this is my head.\r\n\r\nand new line', 'this is my text.\r\n\r\nand new line\r\n\r\nthis is my text.\r\n\r\nand new line\r\nthis is my text.\r\n\r\nand new line', '2009-11-12 17:07:36', '2009-11-12 17:27:36', 16546432, 12, '2009-11-12 18:07:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iblog_urls`
--

CREATE TABLE IF NOT EXISTS `iblog_urls` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `url` varchar(255) NOT NULL,
  `install` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `iblog_urls`
--


-- --------------------------------------------------------

--
-- Table structure for table `igallery_galleries`
--

CREATE TABLE IF NOT EXISTS `igallery_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `users_id` int(11) unsigned NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`,`users_id`,`added`,`changed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `igallery_galleries`
--

INSERT INTO `igallery_galleries` (`id`, `name`, `code`, `users_id`, `added`, `changed`) VALUES
(1, '7CEC0E5A-A16B-5D60-8C0D-5150B37E69BB', 'iphone-7cec0e5a-a16b-5d60-8c0d-5150b37e69bb', 0, '2009-10-29 16:50:16', '2009-10-29 16:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `igallery_items`
--

CREATE TABLE IF NOT EXISTS `igallery_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `smallid` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `igallery_galleries_id` bigint(20) unsigned NOT NULL,
  `exif` longtext NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `igallery_galleries_id` (`igallery_galleries_id`),
  KEY `added` (`added`,`changed`),
  KEY `smallid` (`smallid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `igallery_items`
--

INSERT INTO `igallery_items` (`id`, `smallid`, `name`, `caption`, `file`, `longitude`, `latitude`, `igallery_galleries_id`, `exif`, `added`, `changed`) VALUES
(1, 0, 'Name :)', 'Caption :))', 'igallery.1.0.images-original.jpg', 0, 0, 1, '<?xml version="1.0" encoding="utf-8"?>\n<response>\n	<a key="FileName">igallery.1.0.images-original.jpg</a>\n	<a key="FileDateTime">1256831416</a>\n	<a key="FileSize">497003</a>\n	<a key="FileType">2</a>\n	<a key="MimeType">image/jpeg</a>\n	<a key="SectionsFound">ANY_TAG, IFD0, THUMBNAIL, EXIF</a>\n	<a key="COMPUTED">\n		<a key="html">width=&quot;995&quot; height=&quot;494&quot;</a>\n		<a key="Height">494</a>\n		<a key="Width">995</a>\n		<a key="IsColor">1</a>\n		<a key="ByteOrderMotorola">1</a>\n		<a key="Thumbnail.FileType">2</a>\n		<a key="Thumbnail.MimeType">image/jpeg</a>\n	</a>\n	<a key="Orientation">1</a>\n	<a key="XResolution">720090/10000</a>\n	<a key="YResolution">720090/10000</a>\n	<a key="ResolutionUnit">2</a>\n	<a key="Software">Adobe Photoshop CS3 Macintosh</a>\n	<a key="DateTime">2009:04:27 17:39:12</a>\n	<a key="Exif_IFD_Pointer">164</a>\n	<a key="THUMBNAIL">\n		<a key="Compression">6</a>\n		<a key="XResolution">72/1</a>\n		<a key="YResolution">72/1</a>\n		<a key="ResolutionUnit">2</a>\n		<a key="JPEGInterchangeFormat">302</a>\n		<a key="JPEGInterchangeFormatLength">5949</a>\n	</a>\n	<a key="ColorSpace">65535</a>\n	<a key="ExifImageWidth">995</a>\n	<a key="ExifImageLength">494</a>\n</response>', '2009-10-29 15:49:58', '2009-10-29 16:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `imenu_items`
--

CREATE TABLE IF NOT EXISTS `imenu_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'web',
  `image` varchar(255) NOT NULL,
  `imagetype` tinyint(1) NOT NULL DEFAULT '0',
  `variable1` varchar(255) NOT NULL,
  `variable2` varchar(255) NOT NULL,
  `variable3` varchar(255) NOT NULL,
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  `imenu_menus_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `sort` (`sort`),
  KEY `imenu_menus` (`imenu_menus_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `imenu_items`
--

INSERT INTO `imenu_items` (`id`, `name`, `type`, `image`, `imagetype`, `variable1`, `variable2`, `variable3`, `sort`, `imenu_menus_id`) VALUES
(1, 'Neoluxor.cz', 'web', 'http://www.xprogress.com/data/icons/53-house.png', 0, 'http://www.neoluxor.cz/', '', '', 100, 0),
(2, 'Sci-Fi fantasy', 'rss', 'http://www.xprogress.com/data/icons/27-planet.png', 0, 'http://rss.kosmas.cz/kat.asp?id=56', '', '', 50, 0),
(3, 'Cestopisy a reportáže', 'rss', 'http://www.xprogress.com/data/icons/86-camera.png', 0, 'http://rss.kosmas.cz/kat.asp?id=405', '', '', 0, 0),
(4, 'Cizojazy?ná beletrie', 'rss', 'http://www.xprogress.com/data/icons/38-airplane.png', 0, 'http://catalog.lib.ksu.edu/ksul/rss/literature.xml', '', '', 0, 0),
(5, 'Krásná literatura', 'rss', 'http://www.xprogress.com/data/icons/96-book.png', 0, 'http://rss.kosmas.cz/kat.asp?id=54', '', '', 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `imenu_menus`
--

CREATE TABLE IF NOT EXISTS `imenu_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `rewriteurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `imenu_menus`
--

INSERT INTO `imenu_menus` (`id`, `name`, `identifier`, `rewriteurl`) VALUES
(1, 'XProgress More menu', 'xprogress-more-menu', ''),
(2, 'Neoluxor More Menu', 'neoluxor-more-menu', '');

-- --------------------------------------------------------

--
-- Table structure for table `imessages_fields`
--

CREATE TABLE IF NOT EXISTS `imessages_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imessages_forms_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `fcode` varchar(150) NOT NULL,
  `fieldtype` smallint(3) NOT NULL DEFAULT '1',
  `mandatory` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(3) NOT NULL DEFAULT '0',
  `validation` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`),
  KEY `imessages_forms_id` (`imessages_forms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=506 ;

--
-- Dumping data for table `imessages_fields`
--

INSERT INTO `imessages_fields` (`id`, `imessages_forms_id`, `name`, `fcode`, `fieldtype`, `mandatory`, `sort`, `validation`) VALUES
(57, 19, 'Name', 'name', 0, 0, 500, 0),
(6, 8, 'Email', 'email', 1, 0, 401, 0),
(5, 8, 'Name', 'name', 0, 0, 501, 0),
(8, 8, 'Message', 'message', 0, 0, 201, 0),
(55, 18, 'Subject', 'subject', 2, 0, 300, 0),
(56, 18, 'Message', 'message', 0, 0, 200, 0),
(13, 8, 'Subject', 'subject', 0, 0, 301, 0),
(47, 16, 'Subject', 'subject', 2, 0, 300, 0),
(52, 17, 'Message', 'message', 0, 0, 200, 0),
(46, 16, 'Email', 'email', 1, 0, 400, 0),
(45, 16, 'Name', 'name', 0, 0, 500, 0),
(51, 17, 'Subject', 'subject', 2, 0, 300, 0),
(49, 17, 'Name', 'name', 0, 0, 500, 0),
(50, 17, 'Email', 'email', 1, 0, 400, 0),
(48, 16, 'Message', 'message', 0, 0, 200, 0),
(53, 18, 'Name', 'name', 0, 0, 500, 0),
(54, 18, 'Email', 'email', 1, 0, 400, 0),
(27, 12, 'Name', 'name', 0, 0, 500, 0),
(28, 12, 'Email', 'email', 1, 0, 400, 0),
(29, 12, 'Subject', 'subject', 2, 0, 300, 0),
(30, 12, 'Message', 'message', 0, 0, 200, 0),
(31, 12, 'blah', 'blah', 0, 0, 250, 0),
(32, 13, 'Name', 'name', 0, 0, 500, 0),
(33, 13, 'Email', 'email', 1, 0, 400, 0),
(34, 13, 'Subject', 'subject', 2, 0, 300, 0),
(36, 14, 'Name', 'name', 0, 0, 500, 0),
(37, 14, 'Email', 'email', 1, 0, 400, 0),
(38, 14, 'Subject', 'subject', 2, 0, 300, 0),
(39, 14, 'Message', 'message', 0, 0, 200, 0),
(62, 20, 'Email', 'email', 1, 0, 400, 0),
(61, 20, 'Name', 'name', 0, 0, 500, 0),
(60, 19, 'Request', 'request', 0, 0, 500, 0),
(63, 20, 'Subject', 'subject', 2, 0, 300, 0),
(64, 20, 'Message', 'message', 0, 0, 200, 0),
(65, 21, 'Name', 'name', 0, 0, 500, 0),
(66, 21, 'Email', 'email', 1, 0, 400, 0),
(67, 21, 'Subject', 'subject', 2, 0, 300, 0),
(68, 21, 'Message', 'message', 0, 0, 200, 0),
(69, 22, 'theirName', 'theirname', 0, 0, 500, 0),
(70, 22, 'theirEmail', 'theiremail', 1, 0, 400, 0),
(71, 22, 'theirNumber', 'theirnumber', 0, 0, 300, 0),
(72, 22, 'Message', 'message', 0, 0, 500, 0),
(73, 22, 'myName', 'myname', 0, 0, 500, 0),
(74, 22, 'myEmail', 'myemail', 0, 0, 400, 0),
(75, 22, 'myNumber', 'mynumber', 0, 0, 300, 0),
(76, 23, 'Name', 'name', 0, 0, 500, 0),
(77, 23, 'Email', 'email', 1, 0, 400, 0),
(80, 24, 'FriendsName', 'friendsname', 0, 0, 500, 0),
(79, 23, 'Request', 'request', 0, 0, 1500, 0),
(81, 24, 'friendsEmail', 'friendsemail', 0, 0, 400, 0),
(82, 24, 'friendsphone', 'friendsphone', 0, 0, 300, 0),
(83, 24, 'Reason', 'reason', 0, 0, 700, 0),
(84, 24, 'yourname', 'yourname', 0, 0, 500, 0),
(85, 24, 'youremail', 'youremail', 0, 0, 400, 0),
(86, 24, 'yourphone', 'yourphone', 0, 0, 300, 0),
(87, 25, 'Name', 'name', 0, 0, 500, 0),
(88, 25, 'Email', 'email', 1, 0, 400, 0),
(89, 25, 'Subject', 'subject', 2, 0, 300, 0),
(90, 25, 'Message', 'message', 0, 0, 200, 0),
(91, 26, 'Name', 'name', 0, 0, 500, 0),
(92, 26, 'Email', 'email', 1, 0, 400, 0),
(93, 26, 'Subject', 'subject', 2, 0, 300, 0),
(94, 26, 'Message', 'message', 0, 0, 200, 0),
(95, 27, 'Name', 'name', 0, 0, 500, 0),
(96, 27, 'Email', 'email', 1, 0, 400, 0),
(97, 27, 'Subject', 'subject', 2, 0, 300, 0),
(98, 27, 'Message', 'message', 0, 0, 200, 0),
(105, 28, 'VIN# (17 char)', 'vin-17-char', 0, 0, 550, 0),
(104, 28, 'Acura Model', 'acura-model', 0, 0, 450, 0),
(103, 28, 'Year', 'year', 0, 0, 500, 0),
(106, 28, 'Body style (Type-S, 2WD, 4WD, etc.)', 'body-style-type-s-2wd-4wd-etc', 0, 0, 350, 0),
(107, 28, 'Trim level (Tech, Sport, etc.)', 'trim-level-tech-sport-etc', 0, 0, 400, 0),
(108, 28, 'Exterior Color', 'exterior-color', 0, 0, 300, 0),
(109, 28, 'Interior Color', 'interior-color', 0, 0, 250, 0),
(110, 28, 'Transmission (Automatic or Manual)', 'transmission-automatic-or-manual', 0, 0, 150, 0),
(111, 28, 'Name', 'name', 0, 0, 700, 0),
(112, 28, 'Contact phone #', 'contact-phone', 0, 0, 650, 0),
(113, 28, 'E-mail address', 'e-mail-address', 0, 0, 600, 0),
(114, 28, 'Part description', 'part-description', 0, 0, 100, 0),
(115, 29, 'Name', 'name', 0, 0, 500, 0),
(116, 29, 'Email', 'email', 1, 0, 400, 0),
(117, 29, 'Subject', 'subject', 2, 0, 300, 0),
(118, 29, 'Message', 'message', 0, 0, 200, 0),
(119, 30, 'Name', 'name', 0, 0, 500, 0),
(120, 30, 'Email', 'email', 1, 0, 400, 0),
(121, 30, 'Subject', 'subject', 2, 0, 300, 0),
(122, 30, 'Message', 'message', 0, 0, 200, 0),
(123, 31, 'Name', 'name', 0, 0, 500, 0),
(124, 31, 'Email', 'email', 1, 0, 400, 0),
(125, 31, 'Subject', 'subject', 2, 0, 300, 0),
(127, 32, 'Name', 'name', 0, 0, 500, 0),
(128, 32, 'Email', 'email', 1, 0, 400, 0),
(129, 32, 'Subject', 'subject', 2, 0, 300, 0),
(130, 32, 'Message', 'message', 0, 0, 200, 0),
(131, 33, 'Name', 'name', 0, 0, 500, 0),
(132, 33, 'Email', 'email', 1, 0, 400, 0),
(133, 33, 'Subject', 'subject', 2, 0, 300, 0),
(134, 33, 'Message', 'message', 0, 0, 200, 0),
(139, 35, 'Referrer Name', 'referrer-name', 0, 0, 500, 0),
(140, 35, 'Client Name', 'client-name', 0, 0, 400, 0),
(141, 35, 'Client Phone Number', 'client-phone-number', 0, 0, 300, 0),
(142, 35, 'Asset type', 'asset-type', 0, 0, 200, 0),
(143, 35, 'Make & model', 'make-model', 0, 0, 0, 0),
(144, 35, 'Finance amount', 'finance-amount', 0, 0, 0, 0),
(145, 35, 'Personal or business use', 'personal-or-business-use', 0, 0, 0, 0),
(146, 36, 'FirstName', 'firstname', 0, 0, 500, 0),
(147, 36, 'LastName', 'lastname', 0, 0, 400, 0),
(148, 36, 'Test', 'test', 0, 0, 300, 0),
(149, 36, 'Test2', 'test2', 0, 0, 200, 0),
(150, 37, 'Name', 'name', 0, 0, 500, 0),
(155, 38, 'Email', 'email', 1, 0, 400, 0),
(156, 38, 'Subject', 'subject', 2, 0, 300, 0),
(154, 38, 'Name', 'name', 0, 0, 500, 0),
(157, 38, 'Message', 'message', 0, 0, 200, 0),
(158, 39, 'Full Name', 'full-name', 0, 0, 500, 0),
(159, 39, 'Your Email', 'your-email', 1, 0, 400, 0),
(162, 39, 'How Comfortable are you with computers?', 'how-comfortable-are-you-with-computers', 1, 0, 350, 0),
(163, 39, 'Your phone number', 'your-phone-number', 1, 0, 450, 0),
(164, 39, 'Your Address in Duxbury', 'your-address-in-duxbury', 1, 0, 300, 0),
(165, 40, 'Name', 'name', 0, 0, 500, 0),
(166, 40, 'Email', 'email', 1, 0, 400, 0),
(167, 40, 'Phone Number', 'phone-number', 0, 0, 300, 0),
(169, 40, 'Q-Jump', 'q-jump', 4, 0, 0, 0),
(170, 40, '£2 Off All Night', '2-off-all-night', 4, 0, 0, 0),
(171, 40, 'Date for Guestlist', 'date-for-guestlist', 0, 0, 10, 0),
(172, 41, 'Name', 'name', 0, 0, 500, 0),
(173, 41, 'Email', 'email', 1, 0, 400, 0),
(174, 41, 'Subject', 'subject', 2, 0, 300, 0),
(175, 41, 'Message', 'message', 0, 0, 200, 0),
(176, 42, 'TheName', 'thename', 1, 0, 500, 0),
(177, 42, 'TheEmail', 'theemail', 0, 0, 400, 0),
(178, 42, 'TheSubject', 'thesubject', 4, 0, 300, 0),
(179, 42, 'TheMessage', 'themessage', 2, 0, 200, 0),
(180, 43, 'Name', 'name', 0, 0, 500, 0),
(181, 43, 'Email', 'email', 1, 0, 400, 0),
(182, 43, 'Subject', 'subject', 2, 0, 300, 0),
(183, 43, 'Message', 'message', 0, 0, 200, 0),
(184, 44, 'Your Name', 'your-name', 0, 0, 500, 0),
(185, 44, 'Email', 'email', 1, 0, 400, 0),
(186, 44, 'Project Name', 'project-name', 0, 0, 300, 0),
(187, 44, 'Website URL', 'website-url', 3, 0, 200, 0),
(188, 44, 'Spelling Mistakes', 'spelling-mistakes', 4, 0, 100, 0),
(189, 45, 'Name', 'name', 0, 0, 500, 0),
(190, 45, 'Email', 'email', 1, 0, 400, 0),
(191, 45, 'Subject', 'subject', 2, 0, 300, 0),
(192, 45, 'Message', 'message', 0, 0, 200, 0),
(193, 46, 'Name', 'name', 0, 0, 500, 0),
(194, 46, 'Email', 'email', 1, 0, 400, 0),
(195, 46, 'Subject', 'subject', 2, 0, 300, 0),
(196, 46, 'Message', 'message', 0, 0, 200, 0),
(203, 48, 'Subject', 'subject', 2, 0, 300, 0),
(202, 48, 'Email', 'email', 1, 0, 400, 0),
(201, 48, 'Name', 'name', 0, 0, 500, 0),
(204, 48, 'Message', 'message', 0, 0, 200, 0),
(205, 49, 'Name', 'name', 0, 0, 500, 0),
(206, 49, 'Email', 'email', 1, 0, 400, 0),
(207, 49, 'Subject', 'subject', 2, 0, 300, 0),
(208, 49, 'Message', 'message', 0, 0, 200, 0),
(209, 50, 'url', 'url', 3, 0, 500, 0),
(218, 52, 'Email', 'email', 1, 0, 400, 0),
(214, 51, 'Email', 'email', 1, 0, 300, 0),
(217, 52, 'Name', 'name', 0, 0, 500, 0),
(216, 51, 'Message', 'message', 0, 0, 200, 0),
(219, 52, 'Subject', 'subject', 2, 0, 300, 0),
(220, 52, 'Message', 'message', 0, 0, 200, 0),
(221, 53, 'Nome', 'nome', 0, 0, 500, 0),
(222, 53, 'Email', 'email', 1, 0, 400, 0),
(223, 53, 'Soggetto', 'soggetto', 2, 0, 300, 0),
(224, 53, 'Messaggio', 'messaggio', 0, 0, 200, 0),
(225, 54, 'Name', 'name', 0, 0, 500, 0),
(226, 54, 'Email', 'email', 1, 0, 400, 0),
(227, 54, 'Subject', 'subject', 2, 0, 300, 0),
(228, 54, 'Message', 'message', 0, 0, 200, 0),
(229, 55, 'Name', 'name', 0, 0, 500, 0),
(230, 55, 'Email', 'email', 1, 0, 400, 0),
(231, 55, 'Subject', 'subject', 2, 0, 300, 0),
(232, 55, 'Message', 'message', 0, 0, 200, 0),
(243, 58, 'Subject', 'subject', 2, 0, 300, 0),
(242, 58, 'Email', 'email', 1, 0, 400, 0),
(241, 58, 'Name', 'name', 0, 0, 500, 0),
(237, 57, 'Name', 'name', 0, 0, 500, 0),
(238, 57, 'Email', 'email', 1, 0, 400, 0),
(239, 57, 'Subject', 'subject', 2, 0, 300, 0),
(240, 57, 'Message', 'message', 0, 0, 200, 0),
(244, 58, 'Message', 'message', 0, 0, 200, 0),
(245, 59, 'Name', 'name', 0, 0, 500, 0),
(246, 59, 'Email', 'email', 1, 0, 400, 0),
(247, 59, 'Subject', 'subject', 2, 0, 300, 0),
(248, 59, 'Message', 'message', 0, 0, 200, 0),
(249, 60, 'Name', 'name', 0, 0, 500, 0),
(255, 61, 'username', 'username', 0, 0, 300, 0),
(258, 62, 'Email', 'email', 1, 0, 400, 0),
(257, 62, 'Name', 'name', 0, 0, 500, 0),
(259, 62, 'Subject', 'subject', 2, 0, 200, 0),
(260, 62, 'Message', 'message', 0, 0, 100, 0),
(261, 62, 'Surname', 'surname', 0, 0, 300, 0),
(262, 63, 'fname', 'fname', 0, 0, 300, 0),
(263, 63, 'miname', 'miname', 0, 0, 300, 0),
(264, 63, 'lname', 'lname', 0, 0, 300, 0),
(265, 63, 'icd_a', 'icd_a', 0, 0, 300, 0),
(283, 65, 'Blood Pressure (systolic)', 'blood-pressure-systolic', 0, 0, 0, 0),
(281, 65, 'Age:', 'age', 0, 0, 300, 0),
(280, 65, 'Gender', 'gender', 4, 0, 400, 0),
(279, 65, 'Name:', 'name', 0, 0, 500, 0),
(270, 63, 'icd_b', 'icd_b', 0, 0, 300, 0),
(271, 63, 'icd_c', 'icd_c', 0, 0, 300, 0),
(272, 63, 'icd_d', 'icd_d', 0, 0, 300, 0),
(273, 63, 'cpt_a', 'cpt_a', 0, 0, 300, 0),
(274, 63, 'cpt_b', 'cpt_b', 0, 0, 300, 0),
(275, 63, 'cpt_c', 'cpt_c', 0, 0, 300, 0),
(276, 63, 'cpt_d', 'cpt_d', 0, 0, 0, 0),
(277, 63, 'date', 'date', 0, 0, 0, 0),
(278, 63, 'mr_number', 'mr_number', 0, 0, 0, 0),
(282, 65, 'Weight', 'weight', 0, 0, 200, 0),
(284, 65, 'Blood Pressure (diastolic)', 'blood-pressure-diastolic', 0, 0, 0, 0),
(285, 65, 'Pulse', 'pulse', 0, 0, 0, 0),
(286, 65, 'Allergies', 'allergies', 0, 0, 0, 0),
(287, 65, 'Medication', 'medication', 0, 0, 0, 0),
(288, 66, 'Name', 'name', 0, 0, 500, 0),
(294, 67, 'Subject', 'subject', 2, 0, 300, 0),
(293, 67, 'Email', 'email', 1, 0, 400, 0),
(292, 67, 'Name', 'name', 0, 0, 500, 0),
(295, 67, 'Message', 'message', 0, 0, 200, 0),
(296, 68, 'Name', 'name', 0, 0, 500, 0),
(297, 68, 'Email', 'email', 1, 0, 400, 0),
(298, 68, 'Subject', 'subject', 2, 0, 300, 0),
(299, 68, 'Message', 'message', 0, 0, 200, 0),
(300, 69, 'Name', 'name', 0, 0, 500, 0),
(301, 69, 'Email', 'email', 1, 0, 400, 0),
(454, 123, 'Name', 'name', 0, 0, 500, 0),
(303, 69, 'Message', 'message', 0, 0, 200, 0),
(304, 70, 'Name', 'name', 0, 0, 500, 0),
(305, 70, 'Email', 'email', 1, 0, 400, 0),
(306, 70, 'Subject', 'subject', 2, 0, 300, 0),
(307, 70, 'Message', 'message', 0, 0, 200, 0),
(308, 71, 'Name', 'name', 0, 0, 500, 0),
(309, 71, 'Email', 'email', 1, 0, 400, 0),
(310, 71, 'Subject', 'subject', 2, 0, 300, 0),
(311, 71, 'Message', 'message', 0, 0, 200, 0),
(312, 72, 'Name', 'name', 0, 0, 500, 0),
(313, 72, 'Emailnaidu.srk@gmail.com', 'emailnaidu-srk-gmail-com', 1, 0, 400, 0),
(314, 72, 'Subject message', 'subject-message', 2, 0, 300, 0),
(315, 72, 'Messagemore info', 'messagemore-info', 0, 0, 200, 0),
(316, 73, 'Contact Name', 'contact-name', 0, 0, 500, 0),
(321, 73, 'Surname', 'surname', 0, 0, 0, 0),
(318, 73, 'Subject', 'subject', 2, 0, 300, 0),
(319, 73, 'Message', 'message', 0, 0, 200, 0),
(320, 73, 'Mail', 'mail', 0, 0, 0, 0),
(322, 74, 'Name', 'name', 0, 0, 500, 0),
(323, 74, 'Email', 'email', 1, 0, 400, 0),
(324, 74, 'Subject', 'subject', 2, 0, 300, 0),
(325, 74, 'Message', 'message', 0, 0, 200, 0),
(326, 75, 'Name', 'name', 0, 0, 500, 0),
(327, 75, 'Email', 'email', 1, 0, 400, 0),
(328, 75, 'Subject', 'subject', 2, 0, 300, 0),
(329, 75, 'Message', 'message', 0, 0, 200, 0),
(330, 76, 'Name', 'name', 0, 0, 500, 0),
(331, 76, 'Email', 'email', 1, 0, 400, 0),
(332, 76, 'Subject', 'subject', 2, 0, 300, 0),
(333, 76, 'Message', 'message', 0, 0, 200, 0),
(334, 77, 'Name', 'name', 0, 0, 500, 0),
(335, 77, 'Email', 'email', 1, 0, 400, 0),
(336, 77, 'Subject', 'subject', 2, 0, 300, 0),
(337, 77, 'Message', 'message', 0, 0, 200, 0),
(338, 78, 'Name', 'name', 0, 0, 500, 0),
(339, 78, 'Email', 'email', 1, 0, 400, 0),
(340, 78, 'Subject', 'subject', 2, 0, 300, 0),
(341, 78, 'Message', 'message', 0, 0, 200, 0),
(342, 79, 'Name', 'name', 0, 0, 500, 0),
(343, 79, 'Email', 'email', 1, 0, 400, 0),
(344, 79, 'Subject', 'subject', 2, 0, 300, 0),
(345, 79, 'Message', 'message', 0, 0, 200, 0),
(346, 79, 'HoursWorked', 'hoursworked', 0, 0, 100, 0),
(347, 80, 'Name', 'name', 0, 0, 500, 0),
(348, 80, 'Email', 'email', 1, 0, 400, 0),
(349, 80, 'Subject', 'subject', 2, 0, 300, 0),
(350, 80, 'Message', 'message', 0, 0, 200, 0),
(351, 81, 'Name', 'name', 0, 0, 500, 0),
(352, 81, 'Email', 'email', 1, 0, 400, 0),
(353, 81, 'Subject', 'subject', 2, 0, 300, 0),
(354, 81, 'Message', 'message', 0, 0, 200, 0),
(355, 82, 'Name', 'name', 0, 0, 500, 0),
(356, 82, 'Email', 'email', 1, 0, 400, 0),
(357, 82, 'Subject', 'subject', 2, 0, 300, 0),
(358, 82, 'Message', 'message', 0, 0, 200, 0),
(359, 83, 'Name', 'name', 0, 0, 500, 0),
(360, 83, 'Email', 'email', 1, 0, 400, 0),
(361, 83, 'Subject', 'subject', 2, 0, 300, 0),
(362, 83, 'Message', 'message', 0, 0, 200, 0),
(363, 84, 'Name', 'name', 0, 0, 500, 0),
(364, 84, 'Email', 'email', 1, 0, 400, 0),
(365, 84, 'Phone No.', 'phone-no', 0, 0, 300, 0),
(366, 84, 'Car Registration No.', 'car-registration-no', 0, 0, 9, 0),
(367, 84, 'Address Line 1', 'address-line-1', 0, 0, 500, 0),
(368, 84, 'Address Line 2', 'address-line-2', 0, 0, 500, 0),
(369, 84, 'Address Line 3', 'address-line-3', 0, 0, 500, 0),
(370, 84, 'Postcode', 'postcode', 0, 0, 12, 0),
(371, 85, 'Name', 'name', 0, 0, 500, 0),
(372, 85, 'Email', 'email', 1, 0, 400, 0),
(373, 85, 'Subject', 'subject', 2, 0, 300, 0),
(374, 85, 'Message', 'message', 0, 0, 200, 0),
(375, 86, 'Name', 'name', 0, 0, 500, 0),
(376, 86, 'Email', 'email', 1, 0, 400, 0),
(377, 86, 'Subject', 'subject', 2, 0, 300, 0),
(378, 86, 'Message', 'message', 0, 0, 200, 0),
(379, 86, 'Sended', 'sended', 0, 0, 100, 0),
(380, 87, 'Name', 'name', 0, 0, 500, 0),
(381, 87, 'Email', 'email', 1, 0, 400, 0),
(382, 87, 'Subject', 'subject', 2, 0, 300, 0),
(383, 87, 'Message', 'message', 0, 0, 200, 0),
(384, 88, 'Name', 'name', 0, 0, 500, 0),
(385, 88, 'Email', 'email', 1, 0, 400, 0),
(386, 88, 'Subject', 'subject', 2, 0, 300, 0),
(387, 88, 'Message', 'message', 0, 0, 200, 0),
(388, 89, 'Name', 'name', 0, 0, 500, 0),
(389, 89, 'Email', 'email', 1, 0, 400, 0),
(390, 89, 'Phone', 'phone', 0, 0, 300, 0),
(391, 89, 'Message', 'message', 0, 0, 200, 0),
(392, 89, 'Address', 'address', 0, 0, 100, 0),
(393, 89, 'Sex', 'sex', 0, 0, 1, 0),
(394, 90, 'Name', 'name', 0, 0, 500, 0),
(395, 90, 'Email', 'email', 1, 0, 400, 0),
(398, 90, 'Company', 'company', 0, 0, 300, 0),
(397, 90, 'Message', 'message', 0, 0, 200, 0),
(399, 91, 'Name', 'name', 0, 0, 500, 0),
(400, 91, 'Email', 'email', 1, 0, 400, 0),
(401, 91, 'Subject', 'subject', 2, 0, 300, 0),
(402, 91, 'Message', 'message', 0, 0, 200, 0),
(403, 92, 'Name', 'name', 0, 0, 500, 0),
(404, 92, 'Email', 'email', 1, 0, 400, 0),
(405, 92, 'Subject', 'subject', 2, 0, 300, 0),
(406, 92, 'Message', 'message', 0, 0, 200, 0),
(407, 92, 'Date', 'date', 0, 0, 100, 0),
(408, 92, 'Description', 'description', 0, 0, 300, 0),
(409, 93, 'Name', 'name', 0, 0, 500, 0),
(410, 93, 'Email', 'email', 1, 0, 400, 0),
(411, 93, 'Subject', 'subject', 2, 0, 300, 0),
(412, 93, 'Message', 'message', 0, 0, 200, 0),
(413, 94, 'Name', 'name', 0, 0, 500, 0),
(414, 94, 'Email', 'email', 1, 0, 400, 0),
(415, 94, 'Account', 'account', 2, 0, 300, 0),
(416, 94, 'Message', 'message', 0, 0, 200, 0),
(417, 95, 'Name', 'name', 0, 0, 500, 0),
(418, 95, 'Email', 'email', 1, 0, 400, 0),
(419, 95, 'Subject', 'subject', 2, 0, 300, 0),
(420, 95, 'Message', 'message', 0, 0, 200, 0),
(421, 96, 'Store Id', 'store-id', 0, 0, 500, 0),
(422, 96, 'email', 'email', 1, 0, 400, 0),
(423, 96, 'available', 'available', 4, 0, 300, 0),
(424, 96, 'Message', 'message', 0, 0, 200, 0),
(425, 97, 'Name', 'name', 0, 0, 500, 0),
(426, 97, 'Email', 'email', 1, 0, 400, 0),
(427, 97, 'Subject', 'subject', 2, 0, 300, 0),
(428, 97, 'Message', 'message', 0, 0, 200, 0),
(429, 98, 'Name', 'name', 0, 0, 500, 0),
(430, 98, 'Email', 'email', 1, 0, 400, 0),
(431, 98, 'Subject', 'subject', 2, 0, 300, 0),
(432, 98, 'Message', 'message', 0, 0, 200, 0),
(433, 98, 'Surename', 'surename', 0, 0, 500, 0),
(446, 102, 'Name', 'name', 0, 0, 500, 0),
(447, 102, 'Email', 'email', 1, 0, 400, 0),
(443, 101, 'Email', 'email', 1, 0, 400, 0),
(442, 101, 'Name', 'name', 0, 0, 500, 0),
(438, 100, 'Name', 'name', 0, 0, 500, 0),
(439, 100, 'Email', 'email', 1, 0, 400, 0),
(440, 100, 'Subject', 'subject', 2, 0, 300, 0),
(441, 100, 'Message', 'message', 0, 0, 200, 0),
(445, 101, 'Message', 'message', 0, 0, 200, 0),
(448, 102, 'Subject', 'subject', 2, 0, 700, 0),
(449, 102, 'Message', 'message', 0, 0, 600, 0),
(450, 102, 'Company', 'company', 0, 0, 450, 0),
(451, 102, 'Address', 'address', 0, 0, 425, 0),
(452, 102, 'Telephone', 'telephone', 0, 0, 300, 0),
(453, 102, 'Fax', 'fax', 0, 0, 200, 0),
(455, 123, 'Email', 'email', 1, 0, 400, 0),
(456, 123, 'Subject', 'subject', 2, 0, 300, 0),
(457, 123, 'Message', 'message', 0, 0, 200, 0),
(458, 124, 'Name', 'name', 0, 0, 500, 0),
(459, 124, 'Email', 'email', 1, 0, 400, 0),
(460, 124, 'Subject', 'subject', 2, 0, 300, 0),
(461, 124, 'Message', 'message', 0, 0, 200, 0),
(462, 124, 'Variety', 'variety', 0, 0, 200, 0),
(463, 125, 'Name', 'name', 0, 0, 500, 0),
(464, 125, 'Email', 'email', 1, 0, 400, 0),
(465, 125, 'Subject', 'subject', 2, 0, 300, 0),
(466, 125, 'Message', 'message', 0, 0, 200, 0),
(467, 126, 'Apellido', 'apellido', 0, 0, 400, 0),
(468, 126, 'Correo', 'correo', 1, 0, 400, 0),
(469, 126, 'Subject', 'subject', 2, 0, 400, 0),
(470, 126, 'Nombre', 'nombre', 0, 0, 400, 0),
(471, 126, 'Telefono', 'telefono', 0, 0, 400, 0),
(472, 126, 'Mensaje', 'mensaje', 0, 0, 900, 0),
(473, 127, 'Name', 'name', 0, 0, 500, 0),
(474, 127, 'Email', 'email', 1, 0, 400, 0),
(475, 127, 'Subject', 'subject', 2, 0, 300, 0),
(476, 127, 'Message', 'message', 0, 0, 200, 0),
(477, 128, 'Name', 'name', 0, 0, 500, 0),
(478, 128, 'Email', 'email', 1, 0, 400, 0),
(479, 128, 'Onderwerp', 'onderwerp', 2, 0, 300, 0),
(480, 128, 'Bericht', 'bericht', 0, 0, 200, 0),
(481, 129, 'Name', 'name', 0, 0, 500, 0),
(482, 129, 'Surname', 'surname', 0, 0, 400, 0),
(483, 129, 'Username', 'username', 2, 0, 300, 0),
(484, 129, 'Password', 'password', 2, 0, 200, 0),
(485, 129, 'eMail', 'email', 2, 0, 0, 0),
(486, 130, 'Name', 'name', 0, 0, 500, 0),
(487, 130, 'Email', 'email', 1, 0, 400, 0),
(488, 130, 'Subject', 'subject', 2, 0, 300, 0),
(489, 130, 'Message', 'message', 0, 0, 200, 0),
(490, 131, 'Name', 'name', 0, 0, 500, 0),
(491, 131, 'Email', 'email', 1, 0, 400, 0),
(492, 131, 'Subject', 'subject', 2, 0, 300, 0),
(493, 131, 'Message', 'message', 0, 0, 200, 0),
(494, 132, 'Name', 'name', 0, 0, 500, 0),
(495, 132, 'Email', 'email', 1, 0, 400, 0),
(496, 132, 'Subject', 'subject', 2, 0, 300, 0),
(497, 132, 'Message', 'message', 0, 0, 200, 0),
(498, 133, 'Name', 'name', 0, 0, 500, 0),
(499, 133, 'Email', 'email', 1, 0, 400, 0),
(500, 133, 'Subject', 'subject', 2, 0, 300, 0),
(501, 133, 'Message', 'message', 0, 0, 200, 0),
(502, 134, 'Name', 'name', 0, 0, 500, 0),
(503, 134, 'Email', 'email', 1, 0, 400, 0),
(504, 134, 'Subject', 'subject', 2, 0, 300, 0),
(505, 134, 'Message', 'message', 0, 0, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `imessages_forms`
--

CREATE TABLE IF NOT EXISTS `imessages_forms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `code` varchar(40) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`,`code`,`added`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `imessages_forms`
--

INSERT INTO `imessages_forms` (`id`, `name`, `users_id`, `code`, `added`) VALUES
(17, 'RadioBeat - xProgress feedback', 1, 'e88375c712ee91d2d19101d89e179dfcbb11d169', '2010-02-27 15:33:57'),
(8, 'iDeviant contact form', 1, '7ea53b70fa8473d4d540ddf9ead85d6f166659b5', '2010-02-03 11:26:03'),
(16, 'test', 106, '031809b65d6e488e6c3061c8bdec84fb3fd4c656', '2010-02-25 08:35:39'),
(18, 'RadioBeat - Radio feedback', 1, '6a69934a927b646eec1d270e5f65c4cd3b012942', '2010-02-27 15:34:54'),
(12, 'andrew', 23, '43d695a2e2338daefddb4b2b97a2c957edd377a1', '2010-02-04 15:47:53'),
(13, 'ZomBoy Submission', 70, '27a757933fd41f2c4c0230c863d8b533390c26b7', '2010-02-16 18:08:17'),
(14, 'iBBClone - Feedback', 1, 'c1f44f134aa0af466c4751e8f54666b78036d010', '2010-02-21 07:02:40'),
(19, 'Form_test', 205, '8cb7f446768b8d50b906313d6aa2b44cb63a9cba', '2010-03-06 20:53:10'),
(20, 'TankedCam', 225, '12c755674570ada20a80de487c4c1fbded176920', '2010-03-08 06:16:57'),
(21, 'iPinchStats - Feedback', 1, '206d146c5aa24f742f0cd2032617aa4b81c1bbbc', '2010-03-19 01:33:52'),
(22, 'Angel_Network', 414, 'd6cb3303f25bde818eabc933a719107ec0cabe2c', '2010-03-25 21:39:28'),
(23, 'Prayer Request form', 523, '9b3bc8a30eec7011f4c03ef068b9243ae1f81b93', '2010-04-02 15:33:26'),
(24, 'Angel_form', 523, 'a70bf68b2f8f3d72219167c7a096de8fae073436', '2010-04-04 14:07:44'),
(25, 'TestForm', 28, 'efe7a622ee2a6e1044c645e8d92c9036275df009', '2010-04-08 18:03:15'),
(26, 'testmessage', 716, '34689131bc1a9d1dfa9972dc210e4d1c76e075d0', '2010-04-23 05:30:29'),
(27, 'testmessage', 716, 'aac694b65ba30f5a1abe03f6c4326fbfc3d6e3e8', '2010-04-23 05:30:47'),
(28, 'Parts order form for Elite Acura NJ', 748, 'f025a72d12f52ae407546f9a5bb3768305bcdae3', '2010-04-25 15:20:00'),
(29, 'Contact', 793, '157fd5b7716f915ae0ee3c77c681235cb8a22e2c', '2010-04-29 14:28:12'),
(30, 'icast data', 1128, '6abc0144934fcd386a18a1b0ab158c6a250d2d33', '2010-05-20 17:18:13'),
(31, 'mydata', 1449, 'a66937b3c36d1da2518de297576c43f339415835', '2010-06-10 04:52:42'),
(32, 'Family Wine WIne Contact From', 1537, 'f9dd3cdd327680499f38ed110aff57e43ce08223', '2010-06-16 07:52:40'),
(33, 'FWIA table booking form', 793, '34a5d104066c5640231cbcb8007c27539b392b0d', '2010-06-19 06:52:08'),
(36, 'Test', 2036, '95c0ea263494309054b0b96853cbaa201a8daf27', '2010-07-22 07:33:36'),
(35, 'Yarra Finance Referrer ', 1702, '5bff680c3b978248140433de3f68c18e4727d129', '2010-06-28 05:11:26'),
(37, 'abc', 2036, '82baed814f14acceabdc4570aa470134623d9acb', '2010-07-22 08:50:05'),
(38, 'Letter to Santa', 2080, '3510dc92db050c96cb06602ac2909c65b190fd1b', '2010-07-25 01:06:09'),
(39, 'Duxbury Tech Help Form', 2112, '04cd602dace60bac61bce93d99a2045a20a9435d', '2010-07-26 22:57:58'),
(40, 'Guestlist', 2136, 'b5411d7cec82ae5c9cd79f9af3606ec626221158', '2010-07-28 18:33:51'),
(41, 'Forma', 2211, '32b7cf702b6c08ffc89c54f14eff62024d0504f2', '2010-08-02 19:08:23'),
(42, 'iMessage', 2296, '8b3dd66257f0fa0832bc5ca8104563dc1cb9e640', '2010-08-06 10:42:15'),
(43, 'ASITest', 2336, '2292011614aa8cd64217afcc5439b46d3aefcb47', '2010-08-08 05:42:28'),
(44, 'Launch', 2460, '2d01a10f894341b4c87129a858ee98924ad014ba', '2010-08-15 10:42:01'),
(45, 'TutorialProject', 2552, 'f5928bf5888db54de80438cab316ea4d5079eb4b', '2010-08-19 11:14:31'),
(46, 'testform1', 2567, '4498aa12b9c26d5319d6da35f1d374f7a2a7267f', '2010-08-20 04:26:26'),
(48, 'team leaders', 2639, 'fdd68ca9d28438bda4e5011bbeff3a6dc558546d', '2010-08-23 05:13:27'),
(49, 'Chetzeron', 2770, '24546cec5ca5c970a2bb7c3e9d03bcc3e139a5f6', '2010-08-29 02:16:54'),
(50, 'Little URL', 2080, '4e388da26e3a19abaf90e8a2bab7a351cb4eb57e', '2010-08-30 04:40:40'),
(51, 'Club La Vela', 2898, '3f162261bf0ad10669fd57fd613217a783b37dd9', '2010-09-02 15:35:03'),
(52, 'ZaldzBugz Form', 2266, '77dbd173c6256fe579ec1925ab164361dc6e6882', '2010-09-06 08:45:50'),
(53, 'Segnala', 3024, 'b925c8abcf691122b40fd41a664497d761fd4ccb', '2010-09-08 15:00:58'),
(54, 'Testing', 3099, '0db43ed989376e35487adb3bf09e87fe75bf3aa6', '2010-09-12 02:48:28'),
(55, 'elso form', 3360, '59fdd0bbbd221165dab5b7589188a32e340ba3f5', '2010-09-21 11:05:05'),
(58, 'XFM Hitradio - Request', 3561, '9299bcb4b4a546b2dabcbb87443a09d29b780fb5', '2010-09-28 15:41:12'),
(57, 'TestApp', 3526, '1f6816f87a1287d23b04f658b591c166cfaa6508', '2010-09-27 09:55:52'),
(59, 'iMessages', 3728, '88099e29f9e04349b92c501d8d6dff32dce86337', '2010-10-05 02:36:00'),
(60, 'DemoApp', 4141, '21ef22dfdd65e921755f2811a983970be5f08ebc', '2010-10-21 11:27:10'),
(61, 'login', 4184, '89e4944407bb90b570aa7ad313a9198014ce17fd', '2010-10-22 10:43:20'),
(62, 'test contact', 4290, '0ac2dfbc4c353c89e89e79fc77d4cd93b3f2c1b3', '2010-10-25 16:25:44'),
(63, 'Data', 4754, '19443f6e8ce5be6c5f02720a434372b4935f6b41', '2010-11-08 04:48:16'),
(65, 'My_Health', 5717, 'fb47a98f0adf2af1fe1b2f06c92834704d6bac59', '2010-12-04 04:47:07'),
(66, 'my1', 5717, '1b660a5a3b512e72a8ceb859c5a99958f1d23c07', '2010-12-05 04:12:33'),
(67, 'Tammuz', 6001, '1edfd4461b8fcf214bebbd06f383bdb359378dbe', '2010-12-12 06:31:12'),
(68, 'Contact Us', 6476, '567ac430eaa67374e9974d7fce5cc6c460d550e7', '2010-12-21 19:10:51'),
(69, 'Contact Us', 6476, '135c0cfd0a56f68b742d34fb4ee1c33c89ea9431', '2010-12-21 19:10:55'),
(70, 'User', 6815, '386ada796eaee7a2b7503371291a7a4665447223', '2010-12-28 10:36:51'),
(71, 'Test form', 6898, '2d0cb63a0acbe363d9e0a48ef8a183724c0c8035', '2010-12-30 03:10:50'),
(72, 'app store', 7905, 'e704a08d19c1e9a86dab5ac74541f7c145f47f1b', '2011-01-19 07:35:35'),
(73, 'preferredEmployer', 8421, '9c4ca7c095c74363244e7181f5856b8705bdf975', '2011-01-27 20:12:24'),
(74, 'me', 8628, '0a07914f7d75d6693f6822430df1fcbdd77f6122', '2011-01-31 06:52:02'),
(75, 'LCRM Job Sheet', 9197, 'c638c36c35d8bd173c3492490d0a6aebf2503728', '2011-02-09 22:36:26'),
(76, 'Sample HTTPRequest', 9245, 'df6666adec5271b390d7872a730795a441e079a3', '2011-02-10 14:25:43'),
(77, 'message', 9359, 'bbd1a7ed1df8aefc7710395e76682481b0eb2873', '2011-02-12 14:13:29'),
(78, 'form1', 9359, 'c9beda4f513c297441664af94e4e840b0bd1b72a', '2011-02-12 17:46:54'),
(79, 'test form', 9531, '60e9039a8847970438c707bc77c68664ca73938b', '2011-02-15 16:57:03'),
(80, 'Animal Alphabet iPhone App', 9621, 'daba928c34a9c5d0a10e8edc46609668166cc79c', '2011-02-16 23:31:35'),
(81, 'Demo Form', 9721, '371d2564131d185f39b0681c795c651a2f7528c0', '2011-02-18 07:32:16'),
(82, 'Test', 9841, '7cd0475ff8fe2b4a0d3fb7c4e5e32c113ee927e7', '2011-02-20 01:57:09'),
(83, 'test', 10052, '564296dfdc826361385de622cb3c466845adcf2e', '2011-02-23 05:21:02'),
(84, 'RTR Register Now', 10661, '6dbba256abe673da61534b696a58fb3aca0ca10f', '2011-03-05 11:30:49'),
(85, 'iMessage', 10812, '41c6e03ecf092063e85c3dd5d18e3bc97f5ff07a', '2011-03-08 04:45:12'),
(86, 'NewMatch', 10879, '36cdc9b12265744c3b399cafc61e1db80667dc8b', '2011-03-09 14:17:17'),
(87, 'Melanomservice', 11621, '37837fb3c001e8a08053e442bbabb6ef60bc4cf6', '2011-03-21 20:29:31'),
(88, 'xiaolonglin', 11665, '07c46f410a6c550629db1b0299136417191359eb', '2011-03-22 14:08:45'),
(89, 'Party Invite', 11724, 'f5d17a617f37f5f60a35af1930b2e1cd91af28a3', '2011-03-23 17:12:31'),
(90, 'Feedback Submit', 12100, '84e66776caa15d77fde8263e4f26e9b5d2c9cc70', '2011-03-31 02:41:10'),
(91, 'Email Us!', 12367, '3bf4401a1a9ef70e95d83cea3153dae43aed5368', '2011-04-06 03:07:51'),
(92, 'Problem Ticket', 12412, '26a23695a1e2b249c775f5706730a29ef5cd3403', '2011-04-07 02:19:45'),
(93, 'Q8EventS', 12516, '98481f547d9e671ac5d18922f5bb3d018bc5a327', '2011-04-09 07:44:54'),
(94, 'TestForm1', 12887, '1f43053b94927818605e89b23ef0f51d6d9a8201', '2011-04-18 14:25:33'),
(95, 'trial', 13570, 'f6aabd8ac648cbfebc9bc83c468a594c154d6bda', '2011-05-04 01:13:06'),
(96, 'Store Information', 13937, '142edecd9332d0c01eff5fdffcb60a077fedeff9', '2011-05-12 16:06:50'),
(97, 'DSR Email', 13976, '6f43edf7fd398d2b9b5dc7e184eaded3d7bd674a', '2011-05-13 16:51:23'),
(98, 'TestForm', 14785, 'e20a6a9d514988ed07cd23fd682b0be49e457405', '2011-06-02 09:12:13'),
(101, 'Add a Pick', 12516, '26aae5bb1f1d95e6e77596db00e2cc9a119bea71', '2011-07-28 22:22:50'),
(100, 'kiApp', 15130, 'b997f41702dba47a0341c2c032f61393f853bb2b', '2011-06-11 06:01:59'),
(102, 'SIBC iPhone Contact Form', 16670, '275065fe2dfaf49d8b556973d26fb3050dbb4423', '2011-08-01 17:59:35'),
(103, 'Haunted Carlow Contact', 18569, '9afc02cd0cdf279a2f55810a241165f09e8f1695', '2011-09-12 09:26:43'),
(104, 'Haunted Carlow Contact', 18569, 'bc35117cdb0936480ce17461169dd20ab90d1fc3', '2011-09-12 09:27:09'),
(105, 'testform', 18677, '0625e272caab18846f60098263db1d9f92b499f3', '2011-09-15 23:08:25'),
(107, 'login', 18706, '55687aa4be8dab3eb28c8f369cd055ec89ddbf60', '2011-09-16 11:36:44'),
(108, 'login', 18706, '6e2c791c3c395968fd4338cd1fef42790d14312e', '2011-09-16 11:37:03'),
(109, 'register', 18836, '37cf3e1f7106da1b16e2142ff63a6dcdeb8cd189', '2011-09-19 18:04:15'),
(110, 'Enter you email for updates, offers and FREE promotions!', 19188, '76a6d295c7ed287c5737350ca7d859893de3ab6a', '2011-09-29 02:45:46'),
(113, 'test', 19730, 'dd67a0c303ba5112ab75f3a0695b9f9cbe4642b9', '2011-10-15 06:48:58'),
(114, 'SF28Feedback', 19826, '05f12a8c1ed9fa36919a7947a19051bf5c554610', '2011-10-18 19:27:36'),
(116, 'Pruebas', 20360, '6ed0db379e8ae9ece5a947da75c6dd0688661d22', '2011-12-13 17:48:51'),
(119, 'TodayTV', 21045, '3842f968bbd7ae48c2f72a6bed230b6515bcd855', '2012-01-03 03:13:55'),
(118, 'ICMISpeaker', 20967, '8ae31034533613dbf7db4d1d08b914ab98dfda45', '2011-12-31 12:36:25'),
(120, 'testApp', 21226, '19592c85d5cb50c3210f5574f9aa8a6977c5bee0', '2012-01-09 00:57:43'),
(122, 'xxx', 21329, '89b0c1f4b84863be7b6f2e89e068cf373e53a736', '2012-01-11 21:13:07'),
(123, 'aass', 21614, '2b1b191635e7fe6460c0ba2b7fae94168e994218', '2012-01-20 02:56:18'),
(124, 'test', 22081, 'b6fe21578d59fa79a02b69a9edbc6a29240b84ce', '2012-02-07 17:05:48'),
(125, 'Hello Application', 22443, '0ad2236399e84d94c54dc7ba986a29cc74523b16', '2012-02-21 11:38:23'),
(126, 'Yazbek', 22849, '0ac203ac3089f26605b07d5471a6d8f6c8b58ce3', '2012-03-07 04:44:57'),
(127, 'ofir102', 23202, '4967ab9668742a619b7fcef4cf4b5aeaaa4e3ad3', '2012-03-19 13:27:51'),
(128, 'Contact', 23989, '30d28155d4a22c3125f961f48b3fcf4784539a6b', '2012-04-19 07:01:19'),
(129, '420', 24039, '65590dd27a0e12620ef2df354c9623699d1bbd6f', '2012-04-21 16:34:26'),
(130, 'Contact Us', 24142, '2b3ded72a56b07e33a2ba1125d1d0e6bcea429a8', '2012-04-26 11:18:19'),
(131, 'Email Contact Screamo Radio App', 25269, '3d26ac6bcd40a9b6b8a842eac3eec4d83149f190', '2012-06-13 15:30:11'),
(132, 'OrchardContact', 25351, 'c745691dc79c8cd0804185e6c85255f07ed40951', '2012-06-16 22:10:49'),
(133, 'OrchardContact', 25351, '853b16cd7217b954d2ea9f13aa5b40070d6f27b5', '2012-06-16 22:11:12'),
(134, 'epdtest', 25604, '2ef8d1b80356cacd6f7209d705ba734422493a72', '2012-06-29 17:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `imessages_messages`
--

CREATE TABLE IF NOT EXISTS `imessages_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imessages_forms_id` int(11) unsigned NOT NULL,
  `data` longtext NOT NULL,
  `from` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `device` varchar(150) NOT NULL,
  `code` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `imessages_forms_id` (`imessages_forms_id`,`from`,`code`)
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imessages_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `imessages_recipients`
--

CREATE TABLE IF NOT EXISTS `imessages_recipients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imessages_forms_id` int(11) unsigned NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `imessages_forms` (`imessages_forms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=665 ;

--
-- Dumping data for table `imessages_recipients`
--

INSERT INTO `imessages_recipients` (`id`, `imessages_forms_id`, `mail`) VALUES
(84, 17, 'Recipients e-mail'),
(83, 17, 'Recipients e-mail'),
(82, 17, 'Recipients e-mail'),
(81, 17, 'Recipients e-mail'),
(80, 17, 'ondrej.rafaj@gmail.com'),
(75, 16, 'chris@outofexile.com'),
(69, 14, 'Recipients e-mail'),
(68, 14, 'Recipients e-mail'),
(42, 8, 'Recipients e-mail'),
(38, 8, 'ondrejr@fiftyfootsquid.com'),
(39, 8, 'ondrej.rafaj@gmail.com'),
(40, 8, 'Recipients e-mail'),
(41, 8, 'Recipients e-mail'),
(93, 18, 'Recipients e-mail'),
(79, 16, 'Recipients e-mail'),
(78, 16, 'Recipients e-mail'),
(77, 16, 'Recipients e-mail'),
(76, 16, 'Recipients e-mail'),
(50, 12, 'andreww@fiftyfootsquid.com'),
(51, 12, 'Recipients e-mail'),
(52, 12, 'Recipients e-mail'),
(53, 12, 'Recipients e-mail'),
(54, 12, 'Recipients e-mail'),
(55, 13, 'zombieninjas@gmail.com'),
(56, 13, 'tombiagioni@zombieninjasoftware.com'),
(57, 13, 'Recipients e-mail'),
(58, 13, 'Recipients e-mail'),
(59, 13, 'Recipients e-mail'),
(67, 14, 'ondrej.rafaj@fuerte.cz'),
(66, 14, 'ondrej.rafaj@gmail.com'),
(65, 14, 'ondrejr@fiftyfootsquid.com'),
(92, 18, 'Recipients e-mail'),
(91, 18, 'studio@radiobeat.cz'),
(90, 18, 'ondrej.rafaj@gmail.com'),
(94, 18, 'Recipients e-mail'),
(95, 19, 'help_pls2003@yahoo.com'),
(96, 19, 'Recipients e-mail'),
(97, 19, 'Recipients e-mail'),
(98, 19, 'Recipients e-mail'),
(99, 19, 'Recipients e-mail'),
(100, 20, 'devries.james@gmail.com'),
(101, 20, 'Recipients e-mail'),
(102, 20, 'Recipients e-mail'),
(103, 20, 'Recipients e-mail'),
(104, 20, 'Recipients e-mail'),
(112, 21, 'Recipients e-mail'),
(111, 21, 'ondrejr@fiftyfootsquid.com'),
(110, 21, 'ondrej.rafaj@gmail.com'),
(113, 21, 'Recipients e-mail'),
(114, 21, 'Recipients e-mail'),
(122, 22, 'Recipients e-mail'),
(121, 22, 'help_pls2003@yahoo.com'),
(120, 22, 'eniabiola@gmail.com'),
(123, 22, 'Recipients e-mail'),
(124, 22, 'Recipients e-mail'),
(125, 23, 'jhiphoneapp@googlemail.com'),
(126, 23, 'help_pls2003@yahoo.com'),
(127, 23, 'Recipients e-mail'),
(128, 23, 'Recipients e-mail'),
(129, 23, 'Recipients e-mail'),
(144, 24, 'Recipients e-mail'),
(142, 24, 'Recipients e-mail'),
(143, 24, 'Recipients e-mail'),
(141, 24, 'jhiphoneapp@googlemail.com'),
(140, 24, 'help_pls2003@yahoo.com'),
(153, 25, 'Recipients e-mail'),
(152, 25, 'Recipients e-mail'),
(151, 25, 'Recipients e-mail'),
(150, 25, 'jakub.knej@centrum.cz'),
(154, 25, 'Recipients e-mail'),
(155, 26, 'p@pedrams.com'),
(156, 26, 'Recipients e-mail'),
(157, 26, 'Recipients e-mail'),
(158, 26, 'Recipients e-mail'),
(159, 26, 'Recipients e-mail'),
(160, 27, 'p@pedrams.com'),
(161, 27, 'Recipients e-mail'),
(162, 27, 'Recipients e-mail'),
(163, 27, 'Recipients e-mail'),
(164, 27, 'Recipients e-mail'),
(165, 28, 'bmartinsen@gpiauto.com'),
(166, 28, 'Recipients e-mail'),
(167, 28, 'Recipients e-mail'),
(168, 28, 'Recipients e-mail'),
(169, 28, 'Recipients e-mail'),
(178, 29, 'Recipients e-mail'),
(177, 29, 'Recipients e-mail'),
(176, 29, 'Recipients e-mail'),
(175, 29, 'liam_mandeville@yahoo.co.uk'),
(179, 29, 'Recipients e-mail'),
(180, 30, 'mcraft@pacbell.net'),
(181, 30, 'mikecraft@pacbell.net'),
(182, 30, 'Recipients e-mail'),
(183, 30, 'Recipients e-mail'),
(184, 30, 'Recipients e-mail'),
(185, 31, 'name'),
(186, 31, 'email'),
(187, 31, 'addressbill'),
(188, 31, 'pin'),
(189, 31, 'telnumber'),
(190, 32, 'brian@thefamilywinevine.com'),
(191, 32, 'Recipients e-mail'),
(192, 32, 'Recipients e-mail'),
(193, 32, 'Recipients e-mail'),
(194, 32, 'Recipients e-mail'),
(195, 33, 'liam_mandeville@yahoo.co.uk'),
(196, 33, 'Recipients e-mail'),
(197, 33, 'Recipients e-mail'),
(198, 33, 'Recipients e-mail'),
(199, 33, 'Recipients e-mail'),
(220, 37, 'Recipients e-mail'),
(219, 36, 'e'),
(217, 36, 'c'),
(218, 36, 'd'),
(216, 36, 'b'),
(205, 35, 'mmanias@yarrafinance.com'),
(206, 35, 'admin@yarrafinance.com'),
(207, 35, 'leasing@yarrafinance.com'),
(208, 35, 'backend.app.custom@gmail.com'),
(209, 35, 'Recipients e-mail'),
(215, 36, 'a'),
(221, 37, 'Recipients e-mail'),
(222, 37, 'Recipients e-mail'),
(223, 37, 'Recipients e-mail'),
(224, 37, 'Recipients e-mail'),
(225, 38, 'info@henryspettags.com'),
(226, 38, 'Recipients e-mail'),
(227, 38, 'Recipients e-mail'),
(228, 38, 'Recipients e-mail'),
(229, 38, 'Recipients e-mail'),
(230, 39, 'help@duxburytechhelp.com'),
(231, 39, 'Recipients e-mail'),
(232, 39, 'Recipients e-mail'),
(233, 39, 'Recipients e-mail'),
(234, 39, 'Recipients e-mail'),
(235, 40, 'sjanssen@live.co.uk'),
(236, 40, 'Recipients e-mail'),
(237, 40, 'Recipients e-mail'),
(238, 40, 'Recipients e-mail'),
(239, 40, 'Recipients e-mail'),
(240, 41, 'Usuario'),
(241, 41, 'Contraceña'),
(242, 41, 'Recipients e-mail'),
(243, 41, 'Recipients e-mail'),
(244, 41, 'Recipients e-mail'),
(245, 42, 'mderiu@gmail.com'),
(246, 42, 'Recipients e-mail'),
(247, 42, 'Recipients e-mail'),
(248, 42, 'Recipients e-mail'),
(249, 42, 'Recipients e-mail'),
(250, 43, 'niket_79@yahoo.com'),
(251, 43, 'Recipients e-mail'),
(252, 43, 'Recipients e-mail'),
(253, 43, 'Recipients e-mail'),
(254, 43, 'Recipients e-mail'),
(255, 44, 'ben@pauleycreative.co.uk'),
(256, 44, 'Recipients e-mail'),
(257, 44, 'Recipients e-mail'),
(258, 44, 'Recipients e-mail'),
(259, 44, 'Recipients e-mail'),
(260, 45, 'ssuksuk@gmail.com'),
(261, 45, 'ssuksuk@yahoo.com'),
(262, 45, 'somboon@ecots-group.com'),
(263, 45, 'ping@gmail.com'),
(264, 45, 'tan@gmail.com'),
(265, 46, 'phaquspammer@yahoo.com'),
(266, 46, 'Recipients e-mail'),
(267, 46, 'Recipients e-mail'),
(268, 46, 'Recipients e-mail'),
(269, 46, 'Recipients e-mail'),
(277, 48, 'tatrat66@hell.com'),
(276, 48, 'tatrat66@hotmail.com'),
(275, 48, 'tatrat66@yahoo.com'),
(278, 48, 'tatrat66@blue.com'),
(279, 48, 'tatrat66@red.com'),
(280, 49, 'bnabilos@gmail.com'),
(281, 49, 'Recipients e-mail'),
(282, 49, 'Recipients e-mail'),
(283, 49, 'Recipients e-mail'),
(284, 49, 'Recipients e-mail'),
(285, 50, 'littleurlsupport@gmail.com'),
(286, 50, 'Recipients e-mail'),
(287, 50, 'Recipients e-mail'),
(288, 50, 'Recipients e-mail'),
(289, 50, 'Recipients e-mail'),
(290, 51, 'jon@clublavela.com'),
(291, 51, 'Recipients e-mail'),
(292, 51, 'Recipients e-mail'),
(293, 51, 'Recipients e-mail'),
(294, 51, 'Recipients e-mail'),
(295, 52, 'zbnb@yahoo.com'),
(296, 52, 'consider8done@gmail.com'),
(297, 52, 'Recipients e-mail'),
(298, 52, 'Recipients e-mail'),
(299, 52, 'Recipients e-mail'),
(300, 53, 'info@meletta.net'),
(301, 53, 'Recipients e-mail'),
(302, 53, 'Recipients e-mail'),
(303, 53, 'Recipients e-mail'),
(304, 53, 'Recipients e-mail'),
(305, 54, 'anupama_bhadani@yahoo.com'),
(306, 54, 'anupamabhadani@sify.com'),
(307, 54, 'anupamabhadani@rediffmail.com'),
(308, 54, 'anupama@sonitek.ca'),
(309, 54, 'anupama@sonitekinternational.ca'),
(310, 55, 'peatrevo2@me.com'),
(311, 55, 'Recipients e-mail'),
(312, 55, 'Recipients e-mail'),
(313, 55, 'Recipients e-mail'),
(314, 55, 'Recipients e-mail'),
(329, 58, 'Recipients e-mail'),
(328, 58, 'Recipients e-mail'),
(327, 58, 'Recipients e-mail'),
(326, 58, 'Recipients e-mail'),
(325, 58, 'dennisdreissen@gmail.com'),
(320, 57, 'abhishek.kalagoudra@powerweave.com'),
(321, 57, 'abhii_blackstone@yahoo.com'),
(322, 57, 'abhi@gmail.com'),
(323, 57, 'roshan@gmail.com'),
(324, 57, 'rohit_valunj@rediffmail.com'),
(330, 59, 'lyndeelazarte@gmail.com'),
(331, 59, 'Recipients e-mail'),
(332, 59, 'Recipients e-mail'),
(333, 59, 'Recipients e-mail'),
(334, 59, 'Recipients e-mail'),
(335, 60, 'lfarookh@gmail.com'),
(336, 60, 'farookh_laddaf@yahoo.in'),
(337, 60, 'laddaf_farookh@yahoo.in'),
(338, 60, 'Recipients e-mail'),
(339, 60, 'Recipients e-mail'),
(340, 61, 'swapnil.jagtap88@gmail.com'),
(341, 61, 'lfarookh@gmail.com'),
(342, 61, 'Recipients e-mail'),
(343, 61, 'Recipients e-mail'),
(344, 61, 'Recipients e-mail'),
(345, 62, 'petesavva@gmail.com'),
(346, 62, 'Recipients e-mail'),
(347, 62, 'Recipients e-mail'),
(348, 62, 'Recipients e-mail'),
(349, 62, 'Recipients e-mail'),
(365, 65, 'shiva@sandiego.edu'),
(364, 63, 'Recipients e-mail'),
(363, 63, 'Recipients e-mail'),
(362, 63, 'Recipients e-mail'),
(360, 63, 'eckhart.diestel@gmail.com'),
(361, 63, 'Recipients e-mail'),
(367, 65, 'Recipients e-mail'),
(366, 65, 'shiva.ayalasomayajula@gmail.com'),
(368, 65, 'Recipients e-mail'),
(369, 65, 'Recipients e-mail'),
(370, 66, 'shiva@sandiego.edu'),
(371, 66, 'Recipients e-mail'),
(372, 66, 'Recipients e-mail'),
(373, 66, 'Recipients e-mail'),
(374, 66, 'Recipients e-mail'),
(375, 67, 'golan.barnov@gmail.com'),
(376, 67, 'Recipients e-mail'),
(377, 67, 'Recipients e-mail'),
(378, 67, 'Recipients e-mail'),
(379, 67, 'Recipients e-mail'),
(380, 68, 'Salapps@me.com'),
(381, 68, 'Phanatic_music@hotmail.com'),
(382, 68, 'Recipients e-mail'),
(383, 68, 'Recipients e-mail'),
(384, 68, 'Recipients e-mail'),
(385, 69, 'Salapps@me.com'),
(386, 69, 'Phanatic_music@hotmail.com'),
(387, 69, 'Recipients e-mail'),
(388, 69, 'Recipients e-mail'),
(389, 69, 'Recipients e-mail'),
(390, 70, 'edouard@optishops.fr'),
(391, 70, 'Recipients e-mail'),
(392, 70, 'Recipients e-mail'),
(393, 70, 'Recipients e-mail'),
(394, 70, 'Recipients e-mail'),
(395, 71, 'matthewphiong@gmail.com'),
(396, 71, 'Recipients e-mail'),
(397, 71, 'Recipients e-mail'),
(398, 71, 'Recipients e-mail'),
(399, 71, 'Recipients e-mail'),
(407, 72, 'Recipients e-mail'),
(406, 72, 'naidu.srk@gmail.com'),
(405, 72, 'naidu.srk452@gmail.com'),
(408, 72, 'Recipients e-mail'),
(409, 72, 'Recipients e-mail'),
(410, 73, 'management@experiencealicante.com'),
(411, 73, 'Recipients e-mail'),
(412, 73, 'Recipients e-mail'),
(413, 73, 'Recipients e-mail'),
(414, 73, 'Recipients e-mail'),
(415, 74, 'name'),
(416, 74, 'email'),
(417, 74, 'page'),
(418, 74, 'age'),
(419, 74, 'edu'),
(420, 75, 'support@lcrm.co.uk'),
(421, 75, 'Recipients e-mail'),
(422, 75, 'Recipients e-mail'),
(423, 75, 'Recipients e-mail'),
(424, 75, 'Recipients e-mail'),
(433, 76, 'tuyennguyengb@gmail.com'),
(432, 76, 'mary@gasbuddy.com'),
(431, 76, 'judy@gasbuddy.com'),
(430, 76, 'john@gasbuddy.com'),
(434, 76, 'tuyennguyencanada@gmail.com'),
(435, 77, 'guzman'),
(436, 77, 'esther'),
(437, 77, 'kiko'),
(438, 77, 'rosa'),
(439, 77, 'graucha'),
(440, 78, 'a'),
(441, 78, 'b'),
(442, 78, 'c'),
(443, 78, 'd'),
(444, 78, 'e'),
(445, 79, 'tom_schreck@solutiaconsulting.com'),
(446, 79, 'tom@schreckmail.com'),
(447, 79, 'Recipients e-mail'),
(448, 79, 'Recipients e-mail'),
(449, 79, 'Recipients e-mail'),
(450, 80, 'scburns123@gmail.com'),
(451, 80, 'Recipients e-mail'),
(452, 80, 'Recipients e-mail'),
(453, 80, 'Recipients e-mail'),
(454, 80, 'Recipients e-mail'),
(455, 81, 'arpi_nicky@rediffmail.com'),
(456, 81, 'abhinavbhatt2004@gmail.com'),
(457, 81, 'abhinavbhatt2004@rediffmail.com'),
(458, 81, 'arpita.jadhav@ariosesoftware.com'),
(459, 81, 'Recipients e-mail'),
(460, 82, 'chad@eight20consulting.com'),
(461, 82, 'Recipients e-mail'),
(462, 82, 'Recipients e-mail'),
(463, 82, 'Recipients e-mail'),
(464, 82, 'Recipients e-mail'),
(465, 83, 'fname'),
(466, 83, 'lname'),
(467, 83, 'email'),
(468, 83, 'tel'),
(469, 83, 'address'),
(479, 84, 'tommyhawk520@hotmail.com'),
(478, 84, 'Recipients e-mail'),
(477, 84, 'Recipients e-mail'),
(476, 84, 'Recipients e-mail'),
(475, 84, 'Recipients e-mail'),
(480, 85, 'Recipients e-mail'),
(481, 85, 'Recipients e-mail'),
(482, 85, 'Recipients e-mail'),
(483, 85, 'Recipients e-mail'),
(484, 85, 'Recipients e-mail'),
(485, 86, 'email1'),
(486, 86, 'email2'),
(487, 86, 'email3'),
(488, 86, 'email4'),
(489, 86, 'email5'),
(490, 87, 'hugo.borjesson@gmail.com'),
(491, 87, 'Recipients e-mail'),
(492, 87, 'Recipients e-mail'),
(493, 87, 'Recipients e-mail'),
(494, 87, 'Recipients e-mail'),
(495, 88, '88277648@163.com'),
(496, 88, 'linsmalldragon@yeah.net'),
(497, 88, 'Recipients e-mail'),
(498, 88, 'Recipients e-mail'),
(499, 88, 'Recipients e-mail'),
(500, 89, 'kunalce4u@gmail.com'),
(501, 89, 'kunalbitce@gmail.com'),
(502, 89, 'kpkantaw@syr.edu'),
(503, 89, 'Recipients e-mail'),
(504, 89, 'Recipients e-mail'),
(505, 90, 'cpeters@coreipsystems.com'),
(506, 90, 'Recipients e-mail'),
(507, 90, 'Recipients e-mail'),
(508, 90, 'Recipients e-mail'),
(509, 90, 'Recipients e-mail'),
(510, 91, 'modyourphone@gmail.com'),
(511, 91, 'Recipients e-mail'),
(512, 91, 'Recipients e-mail'),
(513, 91, 'Recipients e-mail'),
(514, 91, 'Recipients e-mail'),
(524, 92, 'workorder@cobratec.com'),
(523, 92, 'Recipients e-mail'),
(522, 92, 'Recipients e-mail'),
(521, 92, 'Recipients e-mail'),
(520, 92, 'Recipients e-mail'),
(525, 93, 'd7my_7@hotmail.com'),
(526, 93, 'Recipients e-mail'),
(527, 93, 'Recipients e-mail'),
(528, 93, 'Recipients e-mail'),
(529, 93, 'Recipients e-mail'),
(530, 94, 'mikedroy@gmail.com'),
(531, 94, 'Recipients e-mail'),
(532, 94, 'Recipients e-mail'),
(533, 94, 'Recipients e-mail'),
(534, 94, 'Recipients e-mail'),
(535, 95, 'becca_wee@yahoo.com.sg'),
(536, 95, 'rebeckam_13surf@msn.com'),
(537, 95, 'Recipients e-mail'),
(538, 95, 'Recipients e-mail'),
(539, 95, 'Recipients e-mail'),
(540, 96, 'eletfds@gmail.com'),
(541, 96, 'Recipients e-mail'),
(542, 96, 'Recipients e-mail'),
(543, 96, 'Recipients e-mail'),
(544, 96, 'Recipients e-mail'),
(545, 97, 'jesse_tomchak@uhaul.com'),
(546, 97, 'Recipients e-mail'),
(547, 97, 'Recipients e-mail'),
(548, 97, 'Recipients e-mail'),
(549, 97, 'Recipients e-mail'),
(550, 98, 'izon90@yahoo.com.cn'),
(551, 98, 'hyong.ad@gmail.com'),
(552, 98, 'Recipients e-mail'),
(553, 98, 'Recipients e-mail'),
(554, 98, 'Recipients e-mail'),
(568, 101, 'Recipients e-mail'),
(567, 101, 'Recipients e-mail'),
(566, 101, 'Recipients e-mail'),
(565, 101, 'd7my_7@hotmail.com'),
(560, 100, 'asgawa@gmail.com'),
(561, 100, 'Recipients e-mail'),
(562, 100, 'Recipients e-mail'),
(563, 100, 'Recipients e-mail'),
(564, 100, 'Recipients e-mail'),
(569, 101, 'Recipients e-mail'),
(570, 102, 'BoEllisAnderson@aol.com'),
(571, 102, 'Recipients e-mail'),
(572, 102, 'Recipients e-mail'),
(573, 102, 'Recipients e-mail'),
(574, 102, 'Recipients e-mail'),
(584, 110, 'sinclaire90210@yahoo.com'),
(583, 110, 'Recipients e-mail'),
(582, 110, 'Recipients e-mail'),
(581, 110, 'Recipients e-mail'),
(580, 110, 'Recipients e-mail'),
(593, 123, 'Recipients e-mail'),
(592, 123, 'Recipients e-mail'),
(591, 123, 'Recipients e-mail'),
(590, 123, 'm.a.n.e.d@hotmail.com'),
(594, 123, 'Recipients e-mail'),
(595, 124, 'dukester2000uk@yahoo.co.uk'),
(596, 124, 'Recipients e-mail'),
(597, 124, 'Recipients e-mail'),
(598, 124, 'Recipients e-mail'),
(599, 124, 'Recipients e-mail'),
(600, 125, 'veerabathinianusha@gmail.com'),
(601, 125, 'crazy2mailme@gmail.com'),
(602, 125, 'srujannuthan2000@gmail.com'),
(603, 125, 'ujwala566@gmail.com'),
(604, 125, 'anusha11.bits@gmail.com'),
(619, 126, 'Recipients e-mail'),
(617, 126, 'Recipients e-mail'),
(618, 126, 'Recipients e-mail'),
(616, 126, 'jorge.leal@yazbek.com.mx'),
(615, 126, 'jorge.leal@yahoo.com'),
(628, 127, 'Recipients e-mail'),
(627, 127, 'Recipients e-mail'),
(626, 127, 'Recipients e-mail'),
(625, 127, 'computers102@gmail.com'),
(629, 127, 'Recipients e-mail'),
(630, 128, 'wfwajer@gmail.com'),
(631, 128, 'Recipients e-mail'),
(632, 128, 'Recipients e-mail'),
(633, 128, 'Recipients e-mail'),
(634, 128, 'Recipients e-mail'),
(635, 129, 'username'),
(636, 129, 'password'),
(637, 129, 'nome'),
(638, 129, 'cognome'),
(639, 129, 'email'),
(640, 130, 'benhuson1@gmail.com'),
(641, 130, 'husondesign@gmail.com'),
(642, 130, 'Recipients e-mail'),
(643, 130, 'Recipients e-mail'),
(644, 130, 'Recipients e-mail'),
(645, 131, 'mikecrane@me.com'),
(646, 131, 'Recipients e-mail'),
(647, 131, 'Recipients e-mail'),
(648, 131, 'Recipients e-mail'),
(649, 131, 'Recipients e-mail'),
(650, 132, 'david_piearcy@yahoo.com'),
(651, 132, 'writekimevans@yahoo.com'),
(652, 132, 'Recipients e-mail'),
(653, 132, 'Recipients e-mail'),
(654, 132, 'Recipients e-mail'),
(655, 133, 'david_piearcy@yahoo.com'),
(656, 133, 'writekimevans@yahoo.com'),
(657, 133, 'Recipients e-mail'),
(658, 133, 'Recipients e-mail'),
(659, 133, 'Recipients e-mail'),
(660, 134, 'tylersmom@gmail.com'),
(661, 134, 'Recipients e-mail'),
(662, 134, 'Recipients e-mail'),
(663, 134, 'Recipients e-mail'),
(664, 134, 'Recipients e-mail');

-- --------------------------------------------------------

--
-- Table structure for table `innoportal_groups`
--

CREATE TABLE IF NOT EXISTS `innoportal_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `variable` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `users_groups_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `innoportal_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `innoportal_ideas`
--

CREATE TABLE IF NOT EXISTS `innoportal_ideas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idea` text NOT NULL,
  `innoportal_groups_id` int(11) unsigned NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) unsigned NOT NULL DEFAULT '0',
  `ansvered` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `lastcomment` datetime NOT NULL,
  `lastvote` datetime NOT NULL,
  `votes` int(11) unsigned NOT NULL DEFAULT '0',
  `users_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `innoportal_groups_id` (`innoportal_groups_id`,`rating`,`comments`,`ansvered`,`added`,`lastcomment`,`lastvote`,`votes`,`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `innoportal_ideas`
--


-- --------------------------------------------------------

--
-- Table structure for table `ipromote_apps`
--

CREATE TABLE IF NOT EXISTS `ipromote_apps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ipromote_campaigns_id` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `link` varchar(255) NOT NULL,
  `head` text NOT NULL,
  `description` text NOT NULL,
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ipromote_campaigns_id` (`ipromote_campaigns_id`,`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ipromote_apps`
--

INSERT INTO `ipromote_apps` (`id`, `name`, `ipromote_campaigns_id`, `added`, `link`, `head`, `description`, `sort`) VALUES
(1, 'Radio Beat', 1, '2009-08-23 14:42:06', 'http://itunes.apple.com/cz/app/radiobeat/id358969002?mt=8', 'Live stream oblíbeného rádia', '', 0),
(3, 'smsJizdenka', 4, '2009-08-24 11:36:17', 'test link', 'Application that allows you to buy an electronic ticket for MHD in Prague.', '', 0),
(7, 'iDeviant', 5, '2009-10-20 17:30:02', 'http://itunes.apple.com/us/app/ideviant/id355122830?mt=8', 'Your daily amount of art ...', 'Your daily amount of art ... really cool image feed from server DeviantArt.com', 0),
(14, 'DomainCheck', 5, '2010-04-05 19:04:16', 'http://itunes.apple.com/us/app/domaincheck/id365253874?mt=8', 'Domain check (40+ domains)', '', 0),
(10, 'SMS Jízdenka', 1, '2010-04-05 18:32:08', 'http://itunes.apple.com/cz/app/smsjizdenka/id335240122?mt=8', 'Nákup elektronické jízdenky v Praze', '', 0),
(11, 'iDeviant', 1, '2010-04-05 18:34:37', 'http://itunes.apple.com/cz/app/ideviant/id355122830?mt=8', 'Obrázky z DeviantArt.com', '', 0),
(12, 'iBBClone', 1, '2010-04-05 18:39:08', 'http://itunes.apple.com/cz/app/ibbclone/id359004804?mt=8', 'Pocítadlo prístupu pro webmastery', '', 0),
(13, 'Domain Check', 1, '2010-04-05 18:41:03', 'http://itunes.apple.com/cz/app/domaincheck/id365253874?mt=8', 'Kontrola volných domén (40+)', '', 0),
(15, 'iBBClone', 5, '2010-04-05 19:05:43', 'http://itunes.apple.com/us/app/ibbclone/id359004804?mt=8', 'Web analytic tool', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ipromote_campaigns`
--

CREATE TABLE IF NOT EXISTS `ipromote_campaigns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `system_users_id` int(11) unsigned zerofill NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`,`system_users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ipromote_campaigns`
--

INSERT INTO `ipromote_campaigns` (`id`, `name`, `users_id`, `system_users_id`, `added`) VALUES
(1, 'Czech apps', 0, 00000000001, '2009-08-23 14:27:02'),
(5, 'International apps', 1, 00000000001, '2009-09-04 16:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `ipromote_templates`
--

CREATE TABLE IF NOT EXISTS `ipromote_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) NOT NULL DEFAULT '0',
  `mess1` varchar(255) NOT NULL,
  `mess2` varchar(255) NOT NULL,
  `mess3` varchar(255) NOT NULL,
  `mess4` varchar(255) NOT NULL,
  `red1` int(11) NOT NULL,
  `red2` int(11) NOT NULL,
  `tbegin` text NOT NULL,
  `titem` text NOT NULL,
  `tend` text NOT NULL,
  `tnoitem` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`,`temptype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ipromote_templates`
--

INSERT INTO `ipromote_templates` (`id`, `name`, `identifier`, `temptype`, `mess1`, `mess2`, `mess3`, `mess4`, `red1`, `red2`, `tbegin`, `titem`, `tend`, `tnoitem`) VALUES
(2, 'main', 'main', 0, 'Promotion has been deleted', 'Unable to delete this promotion', 'You don''t have enough permissions to delete this promotion', '', 0, 0, '<table class="fancy">\r\n	<colgroup>\r\n    	<col />\r\n    	<col style="width:90px;" />\r\n    	<col style="width:90px;" />\r\n    </colgroup>\r\n    <thead>\r\n    	<tr>\r\n        	<th>Promotion name</th>\r\n        	<th>Edit</th>\r\n        	<th>Delete</th>\r\n        </tr>\r\n    </thead>', '<tr>\r\n	<td>\r\n        <a href="{#LINK_38}?promo={%Id}"><strong>{%Name}</strong></a><br />\r\n		<span class="small">{#WEBROOT}ipromote-{%Id}-{%Identifier}.xml</span><br />\r\n		<span class="small">{#WEBROOT}ipromote-{%Id}-{%Identifier}.json</span><br />\r\n		<span class="small">{#WEBROOT}ipromote-{%Id}-{%Identifier}.html</span>\r\n    </td>\r\n	<td><a href="?editpromo={%Id}" class="edit mcenter"><span>Edit</span></a></td>\r\n	<td><a href="?deletepromo={%Id}" class="delete mcenter" onclick="return confirmAction(''Do you really want to delete {%Name}?'')"><span>Delete</span></a></td>\r\n</tr>\r\n', '<tbody>\r\n</table>\r\n', '<div class="infobox">\r\n	<h3>There is no Promotional campaign in your account</h3>\r\n    <p>Try to create one by setting the campaign name into the text field below and clicking the "Save" button.</p>\r\n</div>\r\n'),
(3, 'main', 'main', 2, 'Application has been deleted', 'Can''t delete this application', 'You don''t have enough permissions to delete this application', '', 0, 0, '<p><a href="{#LINK_36}" class="back"><span>Back</span></a></p>\r\n<table class="fancy">\r\n	<colgroup>\r\n    	<col />\r\n    	<col />\r\n    	<col style="width:90px;" />\r\n    	<col style="width:90px;" />\r\n    </colgroup>\r\n    <thead>\r\n    	<tr>\r\n        	<th>&nbsp;</th>\r\n        	<th>Promotion name</th>\r\n        	<th>Edit</th>\r\n        	<th>Delete</th>\r\n        </tr>\r\n    </thead>\r\n', '<tr>\r\n	<td>{%SmallImage}</td>\r\n	<td><a href="{%Link}">{%Name}</a></td>\r\n	<td><a href="?editapp={%Id}" class="edit mcenter"><span>Edit</span></a></td>\r\n	<td><a href="?deleteapp={%Id}" class="delete mcenter" onclick="return confirmAction(''Do you really want to delete {%Name}?'')"><span>Delete</span></a></td>\r\n</tr>', '	<tbody>\r\n</table>\r\n', '<p><a href="{#LINK_36}" class="back"><span>Back</span></a></p>\r\n<div class="infobox">\r\n	<h3>There is no application in your Promotional campaign yet</h3>\r\n    <p>Try to create one by setting the application name and all the other fields below and clicking the "Save" or "Apply" button.</p>\r\n</div>\r\n'),
(4, 'main', 'main', 1, 'Promotion has been saved', 'You need to fill the name of the promotion', 'You don''t have a permissions to save this promotion', 'Can''t save this promotion', 0, 0, '', '<form action="" method="post">\r\n	<p>\r\n		<label for="cname">New promotion list name:</label>\r\n		<input type="text" name="cname" value="{%Name}" />\r\n	</p>\r\n	<p>\r\n    	<a href="{#LINK_36}" class="new" style="float:left;"><span>New promotion</span></a>\r\n		<button type="submit" name="csave" class="create" style="float:right;"><span>Create</span></button>\r\n	</p>\r\n</form>\r\n', '<form action="" method="post">\r\n	<p>\r\n		<label for="cname">Edit <strong>{%Name}</strong>:</label>\r\n		<input type="text" name="cname" value="{%Name}" />\r\n	</p>\r\n	<p>\r\n		<input type="hidden" name="cedit" value="{%Id}" />\r\n    	<a href="{#LINK_36}" class="new" style="float:left;"><span>New promotion</span></a>\r\n		<button type="submit" name="csave" class="save" style="float:right;"><span>Save</span></button>\r\n	</p>\r\n</form>\r\n', ''),
(5, 'main', 'main', 3, 'Application has been saved', 'You need to fill the name of the application', 'You dont have enough permissions to see those applications', 'Unable to save this application', 38, 0, '', '<form action="" method="post" enctype="multipart/form-data">\r\n	<p>\r\n		<label for="cname">New application name</label>\r\n		<input type="text" name="aname" value="{%Name}" class="medium" />\r\n	</p>\r\n	<p>\r\n		<label for="alink">Link to the AppStore:</label>\r\n		<input type="text" name="alink" value="{%Link}" />\r\n	</p>\r\n	<p class="small" style="text-align:right;">You can get this link URL by Right-Clicking on the link below the application picture in iTunes</p>\r\n	<p>\r\n		<label for="ahead">Short description:</label>\r\n		<textarea name="ahead" cols="50" rows="3" class="small">{%Head}</textarea>\r\n	</p>\r\n	<p>\r\n		<label for="adescription">Long description:</label>\r\n		<textarea name="adescription" cols="50" rows="8">{%Description}</textarea>\r\n	</p>\r\n	<p>\r\n		<label for="asort">Sort order number:</label>\r\n		<input type="text" name="asort" value="{%Sort}" class="tiny" />\r\n	</p>\r\n    <p>\r\n        <label for="smallico">Small picture:</label>\r\n        <input type="file" name="smallico" />\r\n        {%SmallImage}\r\n    </p>\r\n    <p>\r\n        <label for="bigico">Big picture:</label>\r\n        <input type="file" name="bigico" />\r\n        {%BigImage}\r\n    </p>\r\n	<p>\r\n    	<a href="{#LINK_38}" class="new" style="float:left;"><span>New application</span></a>\r\n		<button type="submit" name="asave" class="create" style="float:right;"><span>Create</span></button>\r\n		<button type="submit" name="aapply" class="apply" style="float:right;"><span>Apply</span></button>\r\n	</p>\r\n</form>', '<form action="" method="post" enctype="multipart/form-data">\r\n	<p>\r\n		<label for="cname" class="mandatory">Edit {%Name}: *</label>\r\n		<input type="text" name="aname" value="{%Name}" class="medium" />\r\n	</p>\r\n	<p>\r\n		<label for="alink">Link to the AppStore:</label>\r\n		<input type="text" name="alink" value="{%Link}" />\r\n	</p>\r\n	<p class="small" style="text-align:right;">You can get this link URL by Right-Clicking on the link below the application picture in iTunes</p>\r\n	<p>\r\n		<label for="ahead">Short description:</label>\r\n		<textarea name="ahead" cols="50" rows="3">{%Head}</textarea>\r\n	</p>\r\n	<p>\r\n		<label for="adescription">Long description:</label>\r\n		<textarea name="adescription" cols="50" rows="8">{%Description}</textarea>\r\n	</p>\r\n	<p>\r\n		<label for="asort">Sort order number:</label>\r\n		<input type="text" name="asort" value="{%Sort}" class="tiny" />\r\n	</p>\r\n    <p>\r\n        <label for="smallico">Small picture:</label>\r\n        <input type="file" name="smallico" />\r\n        {%SmallImage}\r\n    </p>\r\n    <p>\r\n        <label for="bigico">Big picture:</label>\r\n        <input type="file" name="bigico" />\r\n        {%BigImage}\r\n    </p>\r\n	<p>\r\n		<input type="hidden" name="aedit" value="{%Id}" />\r\n    	<a href="{#LINK_38}" class="new" style="float:left;"><span>New application</span></a>\r\n		<button type="submit" name="asave" class="save" style="float:right;"><span>Save</span></button>\r\n		<button type="submit" name="aapply" class="apply" style="float:right;"><span>Apply</span></button>\r\n	</p>\r\n</form>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `ispeed_cameras`
--

CREATE TABLE IF NOT EXISTS `ispeed_cameras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `longitude` float(11,8) NOT NULL,
  `latitude` float(11,8) NOT NULL,
  `ispeed_category_id` int(8) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `longitude` (`longitude`,`latitude`,`ispeed_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ispeed_cameras`
--


-- --------------------------------------------------------

--
-- Table structure for table `iwallpapers_images`
--

CREATE TABLE IF NOT EXISTS `iwallpapers_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `ratingdata` longtext NOT NULL,
  `votes` bigint(20) NOT NULL,
  `rating` int(4) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `iwallpapers_images`
--

INSERT INTO `iwallpapers_images` (`id`, `name`, `file`, `ratingdata`, `votes`, `rating`, `description`, `keywords`, `user_id`, `added`) VALUES
(1, 'area04.jpg', 'area04.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:10'),
(2, 'auros.jpg', 'auros.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:10'),
(3, 'baurora_dorado.jpg', 'baurora_dorado.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:10'),
(4, 'baurora.jpg', 'baurora.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:10'),
(5, 'binome.jpg', 'binome.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(6, 'bocuma.jpg', 'bocuma.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(7, 'bolino.jpg', 'bolino.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(8, 'bruto.jpg', 'bruto.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(9, 'casual_01.jpg', 'casual_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(10, 'casual_02.jpg', 'casual_02.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(11, 'casual_03.jpg', 'casual_03.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:11'),
(12, 'celso_01.jpg', 'celso_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(13, 'celso_02.jpg', 'celso_02.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(14, 'cenefismo.jpg', 'cenefismo.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(15, 'dark_aqua.jpg', 'dark_aqua.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(16, 'evo_lounge.jpg', 'evo_lounge.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(17, 'fiordo.jpg', 'fiordo.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(18, 'glaA?.jpg', 'glaa-.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(19, 'glasso.jpg', 'glasso.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(20, 'leffa_classic.jpg', 'leffa_classic.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(21, 'leffa_graphite.jpg', 'leffa_graphite.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(22, 'leffa_volcano.jpg', 'leffa_volcano.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(23, 'minimal_aqua_01.jpg', 'minimal_aqua_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(24, 'minimal_aqua_02.jpg', 'minimal_aqua_02.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(25, 'minimal_aqua_03.jpg', 'minimal_aqua_03.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(26, 'minimal_wallpaper_01.jpg', 'minimal_wallpaper_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(27, 'minimal_wallpaper_04_01.jpg', 'minimal_wallpaper_04_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(28, 'minimal_wallpaper_04_02.jpg', 'minimal_wallpaper_04_02.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(29, 'minimal_wallpaper_04_03.jpg', 'minimal_wallpaper_04_03.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:12'),
(30, 'minimal_wallpaper_04_04.jpg', 'minimal_wallpaper_04_04.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(31, 'p_blue.jpg', 'p_blue.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(32, 'p_green.jpg', 'p_green.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(33, 'quizio.jpg', 'quizio.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(34, 'radial.jpg', 'radial.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(35, 'refined.jpg', 'refined.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(36, 'room29.jpg', 'room29.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(37, 'simple_mac_black.jpg', 'simple_mac_black.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(38, 'simple_mac_white.jpg', 'simple_mac_white.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(39, 'six_feet_under.jpg', 'six_feet_under.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(40, 'snowmotion_01.jpg', 'snowmotion_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(41, 'snowmotion_02.jpg', 'snowmotion_02.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(42, 'ubuntu_01.jpg', 'ubuntu_01.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(43, 'ubuntu_02.jpg', 'ubuntu_02.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:13'),
(44, 'wiko.jpg', 'wiko.jpg', '', 0, 0, '', '', 0, '2010-01-26 18:33:14'),
(45, 'Road-To-No-where.png', 'road-to-no-where.png', '', 0, 0, '', '', 0, '2010-01-26 18:33:45'),
(46, 'Nice-Ass.png', 'nice-ass.png', '', 0, 0, '', '', 0, '2010-01-26 18:33:45'),
(47, 'Broken-Earth.png', 'broken-earth.png', '', 0, 0, '', '', 0, '2010-01-26 18:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobnumbers`
--

CREATE TABLE IF NOT EXISTS `jobnumbers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortname` varchar(255) NOT NULL,
  `jnumber` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `shortname` (`shortname`),
  KEY `jnumber` (`jnumber`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jobnumbers`
--


-- --------------------------------------------------------

--
-- Table structure for table `joshtray_friends`
--

CREATE TABLE IF NOT EXISTS `joshtray_friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `joshtray_people_id` int(11) unsigned NOT NULL,
  `friend_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`joshtray_people_id`,`friend_id`),
  KEY `FK_joshtray_friends_friends` (`friend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `joshtray_friends`
--

INSERT INTO `joshtray_friends` (`id`, `joshtray_people_id`, `friend_id`) VALUES
(25, 116, 1),
(3, 116, 4),
(5, 116, 5),
(4, 116, 18),
(22, 116, 26),
(23, 116, 58),
(9, 116, 106),
(24, 116, 130),
(26, 116, 140),
(20, 116, 146),
(21, 116, 157);

-- --------------------------------------------------------

--
-- Table structure for table `joshtray_groups`
--

CREATE TABLE IF NOT EXISTS `joshtray_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `joshtray_groups`
--

INSERT INTO `joshtray_groups` (`id`, `name`) VALUES
(1, 'Joshua');

-- --------------------------------------------------------

--
-- Table structure for table `joshtray_images`
--

CREATE TABLE IF NOT EXISTS `joshtray_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `joshtray_people_id` int(11) unsigned NOT NULL,
  `filename` varchar(100) NOT NULL,
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `keys` (`joshtray_people_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `joshtray_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `joshtray_messages`
--

CREATE TABLE IF NOT EXISTS `joshtray_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `joshtray_people_id` int(11) unsigned NOT NULL,
  `from_id` int(10) unsigned DEFAULT NULL,
  `message` text NOT NULL,
  `added` datetime NOT NULL,
  `received` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`joshtray_people_id`,`from_id`,`added`,`received`),
  KEY `FK_joshtray_messages_from` (`from_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `joshtray_messages`
--

INSERT INTO `joshtray_messages` (`id`, `joshtray_people_id`, `from_id`, `message`, `added`, `received`) VALUES
(1, 116, 1, 'fgdjfdhj', '2008-11-12 19:05:14', NULL),
(2, 116, 1, ':-)', '2008-11-12 19:06:52', NULL),
(3, 116, 1, 'sftyhdfgh', '2008-11-12 19:20:40', NULL),
(4, 116, 116, 'holala hola :-)', '2008-11-12 19:21:39', NULL),
(5, 116, 5, 'nazdaaaar :-)', '2008-11-12 19:54:53', NULL),
(6, 116, 5, 'dalsi test :-)', '2008-11-12 20:02:25', NULL),
(7, 116, 5, 'wtf??', '2008-11-12 20:14:45', NULL),
(8, 116, 5, 'quote test \\''\\''\\''\\''', '2008-11-12 20:16:47', NULL),
(9, 116, 5, 'quote test \\''\\''\\''\\''', '2008-11-12 20:17:20', NULL),
(10, 116, 5, 'quote test \\''\\''\\''\\''', '2008-11-12 20:18:12', NULL),
(11, 116, 5, 'and now I\\''m really going home ... fuck it!!', '2008-11-12 20:19:17', NULL),
(12, 5, 5, 'GO HOME!!!!!!!!!!!', '2008-11-12 20:22:19', NULL),
(13, 116, 5, 'GO HOME!!!!!!!!!!!!!', '2008-11-12 20:22:41', NULL),
(14, 116, 5, 'Good Morning Andrew!', '2008-11-13 09:41:11', NULL),
(15, 116, 5, 'I know it\\''s cool, thanks!', '2008-11-13 09:58:17', NULL),
(16, 116, 5, 'Hey mate, how are you?', '2008-11-13 11:38:12', NULL),
(17, 81, 5, 'test', '2008-11-13 12:09:59', NULL),
(18, 116, NULL, 'aaaaaaaaaaaaaaa', '2008-11-13 14:23:08', NULL),
(19, 5, 116, 'test test test', '2008-11-13 18:39:32', NULL),
(20, 4, 116, 'Hi ... my friend ...', '2008-11-13 18:53:57', NULL),
(21, 4, 116, 'hu :-)', '2008-11-13 18:55:31', NULL),
(22, 4, 116, 'huhuhu :-)', '2008-11-13 18:57:22', NULL),
(23, 5, 116, ':-)', '2008-11-14 09:26:50', NULL),
(24, 4, 116, 'http://livedocs.adobe.com/flex/3/html/help.html?content=12_Using_Regular_Expressions_03.html', '2008-11-14 09:51:53', NULL),
(25, 5, 116, 'hi', '2008-11-14 10:56:47', NULL),
(26, 5, 116, 'GO HOME!!!!!!', '2008-11-14 18:02:26', NULL),
(27, 116, 18, 'hi', '2008-11-14 18:28:59', NULL),
(28, 116, 18, 'how are you', '2008-11-14 18:29:46', NULL),
(29, 18, 116, 'loooser !!', '2008-11-14 18:29:51', NULL),
(30, 116, 18, 'this is cool', '2008-11-14 18:29:58', NULL),
(31, 4, 116, 'heeeeey!!!!', '2008-11-17 11:15:34', NULL),
(32, 4, 116, 'where are you?????!!!!!!!', '2008-11-17 11:15:52', NULL),
(33, 116, 5, 'http://blog.flexexamples.com/2007/08/06/creating-custom-pop-up-windows-with-the-popupmanager-class/\r\n\r\nhttp://localhost/phpmyadmin/index.php?db=wg3&token=948014863cd071889b434fa5634e6b0e\r\n\r\nhttp://www.saskovic.com/blog/code/Systray.txt\r\n\r\nwww.example.com\r\n\r\n', '2008-11-17 17:00:18', NULL),
(34, 116, 5, 'http://blog.flexexamples.com/2007/08/06/creating-custom-pop-up-windows-with-the-popupmanager-class/\r\n\r\nhttp://localhost/phpmyadmin/index.php?db=wg3&token=948014863cd071889b434fa5634e6b0e\r\n\r\nhttp://www.saskovic.com/blog/code/Systray.txt\r\n\r\nwww.example.com a\r\nb\r\nc\r\nd\r\ne\r\n\r\nhttp://blog.flexexamples.com/2007/08/06/creating-custom-pop-up-windows-with-the-popupmanager-class/\r\n\r\nhttp://localhost/phpmyadmin/index.php?db=wg3&token=948014863cd071889b434fa5634e6b0e\r\n\r\nhttp://www.saskovic.com/blog/code/Systray.txt\r\n\r\nwww.example.com\r\n\r\n', '2008-11-17 17:00:18', NULL),
(35, 18, 116, 'test', '2008-11-17 19:49:53', NULL),
(36, 146, 116, 'test', '2008-11-17 19:50:02', NULL),
(37, 130, 116, 'test :-)', '2008-11-17 19:50:21', NULL),
(38, 157, 116, 'test :-)', '2008-11-17 19:51:32', NULL),
(39, 1, 116, 'hey mate, how r u? :-)', '2008-11-17 19:52:02', NULL),
(40, 106, 116, 'one little test ... GOOD MORNING :-)', '2008-11-17 19:54:10', NULL),
(41, 58, 116, 'hello Fiona :-)', '2008-11-17 19:54:39', NULL),
(42, 1, 116, 'test', '2008-11-17 21:05:26', NULL),
(43, 4, 116, 'huuuuu :-)', '2008-11-17 23:18:46', NULL),
(44, 116, 18, 'Hey, nice app!', '2008-11-18 10:51:27', NULL),
(45, 18, 116, 'thanks ...', '2008-11-18 10:51:42', NULL),
(46, 18, 116, 'Adam: 328874', '2008-11-18 11:16:21', NULL),
(47, 18, 116, 'Adrian: 2d30d6', '2008-11-18 11:16:33', NULL),
(48, 18, 116, 'mark: 49a959', '2008-11-18 11:17:00', NULL),
(49, 18, 116, 'Alain: 0f7c13', '2008-11-18 11:17:32', NULL),
(50, 18, 116, 'Adam: 328874\rAdrian: 2d30d6\rmark: 49a959\rAlain: 0f7c13\rSteve: 424b20', '2008-11-18 11:18:37', NULL),
(51, 116, 18, 'Drew.Hart-Shea@joshua-g2.co.uk', '2008-11-18 11:22:44', NULL),
(52, 18, 116, 'Richard: 34a140', '2008-11-18 11:23:08', NULL),
(53, 18, 116, 'Richard: 34a140', '2008-11-18 11:26:18', NULL),
(54, 18, 116, 'http://labs.adobe.com/downloads/air.html', '2008-11-18 11:28:35', NULL),
(56, 18, 106, 'Does this work then?', '2008-11-18 11:44:35', NULL),
(57, 106, 18, 'yes it does', '2008-11-18 11:46:32', NULL),
(58, 18, NULL, 'Hello,hello..? Are we up and running?  :D', '2008-11-18 11:50:24', NULL),
(59, 116, NULL, 'Hey man!  I\\''m good!  Ondrej yo are pure genius!  This thing is awesome', '2008-11-18 11:51:01', NULL),
(60, 116, NULL, 'How can we see who else is online?', '2008-11-18 11:52:05', NULL),
(63, 5, 1, 'asqa', '2008-11-18 12:06:43', NULL),
(65, 116, NULL, 'One thing I just spotted...', '2008-11-18 12:08:26', NULL),
(66, 116, NULL, 'if it\\''s a long message you can\\''t see all of it!', '2008-11-18 12:08:39', NULL),
(68, 1, 116, 'test for teju ...', '2008-11-18 12:23:13', NULL),
(69, 1, 116, 'you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ... you can see the entire message on the left ... ?! ... I hope so ...', '2008-11-18 12:24:16', NULL),
(70, 1, 116, 'was not for you :-)', '2008-11-18 12:24:51', NULL),
(72, 18, 116, 'Oh Tannenbaum, oh Tannenbaum\rWie treu sind Deine Blätter\rDu grünst nicht nur zur Sommerzeit\rNein auch im Winter wenn es schneit\rOh Tannenbaum, oh Tannenbaum\rWie treu sind Deine Blätter\r\r[Oh Tannenbaum, oh Tannenbaum\rDein Kleid will mich was lehren\rDie Hoffnung und Beständigkeit\rGibt Trost und Kraft zu aller Zeit\rOh Tannenbaum, oh Tannenbaum\rDein Kleid will mich was lehren]\r\r((Ich kenne ein Bäumchen...))\r\rIch kenne ein Bäumchen\rGar fein und zart\rDas trägt euch Früchte seltener Art\rEs funkelt und leuchtet in hellem Schein\rWeit in des Winters Nacht hinein', '2008-11-18 12:25:57', NULL),
(73, 146, 116, 'Oh Tannenbaum, oh Tannenbaum\rWie treu sind Deine Blätter\rDu grünst nicht nur zur Sommerzeit\rNein auch im Winter wenn es schneit\rOh Tannenbaum, oh Tannenbaum\rWie treu sind Deine Blätter\r\r[Oh Tannenbaum, oh Tannenbaum\rDein Kleid will mich was lehren\rDie Hoffnung und Beständigkeit\rGibt Trost und Kraft zu aller Zeit\rOh Tannenbaum, oh Tannenbaum\rDein Kleid will mich was lehren]\r\r((Ich kenne ein Bäumchen...))\r\rIch kenne ein Bäumchen\rGar fein und zart\rDas trägt euch Früchte seltener Art\rEs funkelt und leuchtet in hellem Schein\rWeit in des Winters Nacht hinein', '2008-11-18 12:26:36', NULL),
(74, 18, 116, 'Oh Tannenbaum, oh Tannenbaum\rWie treu sind Deine Blätter\rDu grünst nicht nur zur Sommerzeit\rNein auch im Winter wenn es schneit\rOh Tannenbaum, oh Tannenbaum\rWie treu sind Deine Blätter\r\r[Oh Tannenbaum, oh Tannenbaum\rDein Kleid will mich was lehren\rDie Hoffnung und Beständigkeit\rGibt Trost und Kraft zu aller Zeit\rOh Tannenbaum, oh Tannenbaum\rDein Kleid will mich was lehren]\r\r((Ich kenne ein Bäumchen...))\r\rIch kenne ein Bäumchen\rGar fein und zart\rDas trägt euch Früchte seltener Art\rEs funkelt und leuchtet in hellem Schein\rWeit in des Winters Nacht hinein', '2008-11-18 12:27:20', NULL),
(75, 116, 18, 'uh... what?', '2008-11-18 12:33:42', NULL),
(76, 116, NULL, 'Oh yes...  on the right actually.  I didn\\''t spot that!', '2008-11-18 12:33:56', NULL),
(77, 1, NULL, 'Hey Adam!', '2008-11-18 12:34:35', NULL),
(78, 116, NULL, 'Is Steve McG online with da bear yet?', '2008-11-18 12:36:19', NULL),
(81, 116, 1, 'yo', '2008-11-18 12:50:06', NULL),
(82, 116, 1, 'it works!', '2008-11-18 12:50:14', NULL),
(83, 116, 1, 'i think that contacts should be on right hand side, this drop down on top is difficult to use', '2008-11-18 12:50:44', NULL),
(84, 116, 1, 'and messages sent by myself should be greyed out a bit, I know what I\\''d written and it would help divide them within conversation', '2008-11-18 12:51:32', NULL),
(85, 116, 1, 'ah and sending message should be with "enter" key if possible', '2008-11-18 12:51:48', NULL),
(86, 116, 1, 'and what is whather for :))))', '2008-11-18 12:51:57', NULL),
(87, 116, 1, 'I dot think we need wather here, everybody has it on dashboard or somewhere ele', '2008-11-18 12:52:26', NULL),
(88, 1, 116, 'weather is here just for fun :-)', '2008-11-18 13:43:40', NULL),
(89, 18, 116, 'http://ryanswanson.com/regexp/', '2008-11-18 14:37:40', NULL),
(90, 18, 116, 'http://regexlib.com/\r\n\r\nhttp://blog.flexexamples.com/2007/08/06/creating-custom-pop-up-windows-with-the-popupmanager-class/\r\n\r\nhttp://localhost/phpmyadmin/index.php?db=wg3&token=948014863cd071889b434fa5634e6b0e\r\n\r\nhttp://www.saskovic.com/blog/code/Systray.txt\r\n\r\nwww.example.com a\r\nb\r\nc\r\nd\r\ne\r\n\r\nhttp://blog.flexexamples.com/2007/08/06/creating-custom-pop-up-windows-with-the-popupmanager-class/\r\n\r\nhttp://localhost/phpmyadmin/index.php?db=wg3&token=948014863cd071889b434fa5634e6b0e\r\n\r\nhttp://www.saskovic.com/blog/code/Systray.txt\r\n\r\nwww.example.com\r\n\r\n', '2008-11-18 14:37:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `joshtray_news`
--

CREATE TABLE IF NOT EXISTS `joshtray_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `joshtray_people_id` int(10) unsigned DEFAULT NULL,
  `joshtray_groups_id` int(10) unsigned DEFAULT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `keys` (`joshtray_people_id`,`joshtray_groups_id`,`added`,`show`),
  KEY `FK_joshtray_news_group` (`joshtray_groups_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `joshtray_news`
--

INSERT INTO `joshtray_news` (`id`, `joshtray_people_id`, `joshtray_groups_id`, `added`, `changed`, `name`, `message`, `show`) VALUES
(1, 116, NULL, '2008-11-18 11:45:07', '2008-11-18 11:45:07', 'This is first test message', 'This is content of the first test message', 1),
(2, 1, 1, '2009-02-09 18:12:48', '2009-02-09 18:13:47', 'Second message', ':-)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `joshtray_people`
--

CREATE TABLE IF NOT EXISTS `joshtray_people` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `joshtray_groups_id` int(8) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `line` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `note` varchar(45) NOT NULL,
  `online` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `mail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`mail`,`password`),
  KEY `joshtray_groups_id` (`joshtray_groups_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `joshtray_people`
--

INSERT INTO `joshtray_people` (`id`, `joshtray_groups_id`, `firstname`, `lastname`, `line`, `phone`, `mobile`, `note`, `online`, `lastlogin`, `mail`, `title`, `password`, `initials`, `added`, `changed`) VALUES
(1, 0, 'Adam', 'Buczek', '7953', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adam.buczek@joshua-g2.co.uk', '', '328874', 'A.B.', '0000-00-00 00:00:00', '2009-03-24 17:45:46'),
(2, 0, 'Adam', 'Griffiths', '7962', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adam.griffiths@g2.com', 'G2 Art Director ', '319db0', 'A.G.', '0000-00-00 00:00:00', '2009-03-24 17:48:47'),
(3, 0, 'Adrian', 'McKay', '5326', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adrian.mckay@g2.com', 'F/L G2 B&D\r\n', 'c09d7d', 'A.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 'Adrian', 'Wilson', '7761', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adrian.wilson@joshua-g2.co.uk', 'F/L Creative Proof Reader \r\n', '2d30d6', 'A.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 'Alain', 'Attica', 'N/A', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'alain.attica@joshua-g2.co.uk', 'F/L Interactive', '0f7c13', 'A.A.', '0000-00-00 00:00:00', '2009-03-24 14:10:28'),
(6, 0, 'Alberto', 'Pandolfo', '7714', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'alberto.pandolfo@joshua-g2.co.uk', 'I.T Manager \r\n', '323e5a', 'A.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 'Allan', 'Findley', '7874', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'allan.findley@joshua-g2.co.uk', 'F/L Art Director (BAT) \r\n', '0cfe30', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 'Alistair', 'Cansdale', '7875', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'alistair.cansdale@joshua-g2.co.uk', 'Group Account Director\r\n', '256c3e', 'A.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 0, 'Alexandra', 'Johnson', '7994', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'alexandra.johnson@joshua-g2.co.uk', 'Account Executive       \r\n', '90e02a', 'A.J.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 0, 'Alexey', 'Kuzmin', '6144', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'alexey.kuzmin@g2.com', 'Euro Communication Director KENT\r\n', '352415', 'A.K.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 0, 'Allan', 'Cast', '7820', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'allan.cast@joshua-g2.co.uk', 'Account Supervisor Finance\r\n', '5c96a6', 'A.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 0, 'Amanda', 'Wright', '7875', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'amanda.wright@joshua-g2.co.uk', 'Group Account Director MATERNITY\r\n', '33d414', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 0, 'Amit', 'Chowdury', '7666', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'amit.chowdury@joshua-g2.co.uk', 'IT Helpdesk \r\n', 'd1371b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 0, 'Amy', 'Bedford', '7718', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'amy.bedford@joshua-g2.co.uk', 'Rewards and Content Co-ordinator  \r\n', '123456', 'A.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 0, 'Ananda', 'Roy', '6153', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ananda.roy@g2.com', 'Global Director of Business Strategy - BAT\r\n', 'cf5c31', 'A.R.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 0, 'Andy', 'Bundock', '8329', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'andy.bundock@joshua-g2.co.uk', 'Art Director\r\n', '0d6124', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 0, 'Andrew', 'Walker', '6134', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'andrew.walker@joshua-g2.co.uk', 'Web Developer JI \r\n', '63d2c5', 'A.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 0, 'Anita', 'Ware', '7947', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'anita.ware@g2.com', 'PA  JG2 \r\n', 'b33608', 'A.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 0, 'Anna', 'Mozhutina', '6154', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'anna.mozhutina@g2.com', 'Kent Regional \r\n', 'ca77d0', 'A.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 0, 'Anna', 'Stump', '7822', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'anna.stump@joshua-g2.co.uk', 'Account Manager \r\n', '966651', 'A.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 0, 'Ayla', 'De Moraes', '7946', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ayla.demoraes@joshua-g2.co.uk', 'Data Planner\r\n', '52921d', 'A.D.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 0, 'Baz', 'Williamson', '7973', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'baz.williamson@joshua-g2.co.uk', 'F/L Art Director\r\n', 'a6fc96', 'B.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 0, 'Belinda', 'Willis', '6102', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'belinda.willis@joshua-g2.co.uk', 'PA G2 EMEA\r\n', 'eca003', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 0, 'Binit', 'Shah', '6115', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'binit.shah@g2.com', 'Regional Finance Director G2 EMEA  \r\n', '9bb614', 'B.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 0, 'Carl', 'Petrou', '7748', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'carl.petrou@joshua-g2.co.uk', 'F/L Interactive\r\n', 'c7242e', 'C.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 0, 'Carole', 'Moody', '7964', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'carole.moody@joshua-g2.co.uk', 'Group Production Manager \r\n', '0ff28b', 'C.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 0, 'Caroline', 'Coates', '5337', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'caroline.coates@g2.com', 'Studio Manager G2 B&D \r\n', '123455', 'C.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 0, 'Caroline', 'Grindrod', '7609', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'caroline.grindrod@joshua-g2.co.uk', 'Head of Project Management \r\n', '7bef1b', 'C.G.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 0, 'Charles', 'Millet', '7814', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'charles.millet@g2.com', 'KENT Account Executive \r\n', '06a9b7', 'C.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 0, 'Chris', 'De Jongh', '7753', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'chris.dejongh@joshua-g2.co.uk', 'F/L Management Accountant \r\n', '7bbf07', 'C.D.J.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 0, 'Chris', 'Gowar', '6150', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'chris.gowar@g2.com', 'Global Planning Director KENT \r\n', 'fb101c', 'C.G.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 0, 'Christian', 'Clark', '7961', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'christian.clark@joshua-g2.co.uk', 'Executive Creative Director      \r\n', '86a3a2', 'C.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 0, 'Christina', 'Konrath', '5306', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'christina.konrath@g2.com', 'Art Worker G2 B&D\r\n', 'e910b8', 'C.K.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 0, 'Chris', 'Collett', '7992', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'chris.collett@joshua-g2.co.uk', 'Creative Art Worker Studio \r\n', '5b3fff', 'C.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 0, 'Chris', 'Hubert', '7943', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'chris.hubert@joshua-g2.co.uk', 'Creative Art Director\r\n', 'a3d42a', 'C.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 0, 'Claire', 'Meadows', '6110', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'claire.meadows@g2.com', 'Group Account Director MATERNITY\r\n', 'ee8e58', 'C.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 0, 'Craig', 'Bee', '6108', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'craig.bee@joshua-g2.co.uk', 'Creative Director G2 \r\n', 'd3fce9', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 0, 'Daisy', 'Palmer', '7804', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'daisy.palmer@joshua-g2.co.uk', 'Head Receptionist\r\n', 'e84aa9', 'D.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 0, 'Dan', 'Bryant', '7876', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dan.bryant@joshua-g2.co.uk', 'F/L Copywriter\r\n', '9347ad', 'D.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 0, 'Daniel', 'Westin', '7954', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'daniel.westin@joshua-g2.co.uk', 'Designer Creative \r\n', '5a29e4', 'D.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 0, 'Darryl', 'Bolton', '7961', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'darryl.bolton@joshua-g2.co.uk', 'TV Producer\r\n', '3b6f2c', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 0, 'Davide', 'Bigoni', '7704', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'davide.bigoni@joshua-g2.co.uk', 'BAT UK Client Director\r\n', '658497', 'D.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 0, 'David', 'King', '7744', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'david.king@joshua-g2.co.uk', 'Head of Digital\r\n', '5d7ea6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 0, 'David', 'Villiers', '5303', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'david.villiers@g2.com', 'Creative Director G2B&D \r\n', '0a5726', 'D.V.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 0, 'Dean', 'Lanzman', '6110', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dean.lanzman@g2.com', 'Account Director BAT\r\n', '0c8d8a', 'D.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 0, 'Den', 'Cops', '8337', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'den.cops@joshua-g2.co.uk', 'Visualisor \r\n', 'a77d92', 'D.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 0, 'Dick', 'Bloomfield', '7972', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dick.bloomfield@joshua-g2.co.uk', 'Business Development Director \r\n', '479215', 'D.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 0, 'Dylan', 'Coyne', '7915', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dylan.coyne@joshua-g2.co.uk', 'Interactive Designer\r\n', '17d7ff', 'D.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 0, 'Elise', 'Bodin', '5334', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'elise.bodin@g2.com', 'Graduate Designer G2B&D \r\n', 'dc2fed', 'E.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 0, 'Elrike', 'Lochner', '8339', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'elrike.lochner@joshua-g2.co.uk', 'Digital Account Manager \r\n', 'fda825', 'E.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 0, 'Emma', 'Modler', '7963', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'emma.modler@joshua-g2.co.uk', 'Art Buyer   ', '01e98c', 'E.M.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 0, 'Emma', 'Randerson', '7718', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'emma.randerson@joshua-g2.co.uk', 'Account Director JI  MATERNITY\r\n', '29a97d', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 0, 'Emma', 'Tilbury', '6121', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'emma.tilbury@joshua-g2.co.uk', 'Biller \r\n', '81b4cf', 'E.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 0, 'Emma', 'Verity', '6134', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'emma.verity@joshua-g2.co.uk', 'F/L Interactive\r\n', '059bf9', 'E.V.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 0, 'Fai', 'Leung', '5309', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fai.leung@g2.com', 'Senior Designer G2 \r\n', 'd348dc', 'F.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 0, 'Federico', 'Puche', '6119', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'federico.puche@g2.com', 'Account Supervisor JG2 \r\n', '4c30c5', 'F.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 0, 'Fiona', 'Uwagwu', '7850', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fiona.uwagwu@joshua-g2.co.uk', 'Account Director JI \r\n', '9df0f8', 'F.U.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 0, 'Franco', 'Reda', '7957', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'franco.reda@joshua-g2.co.uk', 'Senior Art Director \r\n', '0e538f', 'F.R.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 0, 'Franki', 'Cawdron', '7784', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'franki.cawdron@joshua-g2.co.uk', 'Production Manager  \r\n', '1402c3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 0, 'Gail', 'Wensley-Walker', '7922', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gail.wensley-walker@g2.com', 'Temporary PA\r\n', '8993f3', 'G.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 0, 'Gary', 'Harwood', '7881', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gary.harwood@g2.com', 'Global Retail & Convenience Director\r\n', 'e7d5db', 'G.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 0, 'Gary', 'McNulty', '7749', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gary.mcnulty@joshua-g2.co.uk', 'F/L Creative\r\n', '76a9b0', 'G.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 0, 'George', 'Hooper', '7990', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'george.hooper@joshua-g2.co.uk', 'Planner Interactive\r\n', '60d119', 'G.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 0, 'Greig', 'McCallum', '7944', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'greig.mccallum@joshua-g2.co.uk', 'Brand & CRM Strategy\r\n', '5a3bef', 'G.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 0, 'Gregory', 'Pageau', '6109', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gregory.pageau@g2.com', 'Account Supervisor DUNHILL\r\n', '9f642c', 'G.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 0, 'Harriet', 'Jarvis', '7730', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'harriet.jarvis@joshua-g2.co.uk', 'Group Account Director    \r\n', '80f98e', 'H.J.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 0, 'Heather', 'Dansie', '7727', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'heather.dansie@g2.com', 'Junior Researcher \r\n', '68323', 'H.D.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 0, 'Henrietta', 'Villiers', '5317', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'henrietta.villiers@joshua-g2.co.uk', 'Associate Design Director G2B&D \r\n', '581694', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 0, 'Hugh', 'Bateman', '7754', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hugh.bateman@g2.com', 'F/L Planner \r\n', 'e1c91e', 'H.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 0, 'Hugo', 'Bone', '7853', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hugo.bone@joshua-g2.co.uk', 'Copywriter Creative \r\n', '96c8f2', 'H.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 0, 'Howard', 'Rudder', '7758', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'howard.rudder@g2.com', 'HR Consultant\r\n', '3b23fc', 'H.R.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 0, 'Ian', 'Todd', '7614', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ian.todd@joshua-g2.co.uk', 'Commercial Business Manager\r\n', '626bfc', 'I.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 0, 'Ian', 'Hutchings', '5323', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ian.hutchings@g2.com', 'F/L Designer G2B&D \r\n', '5aefb8', 'I.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 0, 'Jack', 'Tanna', '7916', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jack.tanna@joshua-g2.co.uk', 'Financial Director B/M    \r\n', '9332c5', 'J.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 0, 'Jak', 'Colgate', '7948', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jak.colgate@joshua-g2.co.uk', 'Studio Junior \r\n', 'b78bb1', 'J.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 0, 'Jayesh', 'Vyas', '6101', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jayesh.vyas@g2.com', 'Regional Controller G2 EMEA            \r\n', 'a8582d', 'J.V.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 0, 'Jen', 'Caverhill', '5335', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jen.caverhill@joshua-g2.co.uk', 'Dunhill Account Executive \r\n', '2341b9', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 0, 'Joanna', 'Chekroun', '5314', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'joanna.chekroun@g2.com', 'Account Director G2B&D \r\n', '2e08e3', 'J.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 0, 'Joanne', 'Nuttall', '7740', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'joanne.nuttall@joshua-g2.co.uk', 'F/L Account Manager JI \r\n', '1f296b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 0, 'Johannah', 'Barclay', '5333', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'johannah.barclay@joshua-g2.co.uk', 'Creative Assistant \r\n', '7dab9a', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 0, 'Jonathan', 'Dove', '7854', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jonathan.dove@g2.com', 'New Business Manager G2 B&D\r\n', '1bdbe5', 'J.D.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 0, 'Jonathan', 'McIntosh', '7666', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jonathan.mcintosh@joshua-g2.co.uk', 'IT Help Desk\r\n', 'f0f33c', 'J.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 0, 'Jonathan', 'Smith', '7978', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jonathan.smith@joshua-g2.co.uk', 'Creative Copywriter\r\n', '8d793b', 'J.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 0, 'Juan', 'Jose Rodriguez', '5325', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'juan.joserodriguez@joshua-g2.co.uk', 'Account Manager BAT\r\n', 'ee1f00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 0, 'Juliet', 'Gouldstone', '6149', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'juliet.gouldstone@g2.com', 'European Regional Communications Director - Dunhill\r\n', '123454', 'J.G.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 0, 'Julie', 'Parvin', '7768', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'julie.parvin@joshua-g2.co.uk', 'Shopper Marketing Director G2 EMEA\r\n', 'ffda8e', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 0, 'Julie', 'Petard', '6123', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'julie.petard@g2.com', 'Account Manager DUNHILL\r\n', 'f343d0', 'J.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 0, 'Justin', 'Shill', '7925', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'justin.shill@joshua-g2.co.uk', 'Senior Creative Artworker\r\n', '20df71', 'J.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 0, 'Kate', 'Orlowski', '6146', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kate.orlowski@g2.com', 'Account Executive G2\r\n', '2e590b', 'K.O.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 0, 'Kate', 'Thompson', '7804', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kate.thompson@joshua-g2.co.uk', 'Receptionist \r\n', 'c095a1', 'K.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 0, 'Katie', 'Maguire', '7794', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'katie.maguire@joshua-g2.co.uk', 'New Biz Assistant\r\n', 'ac8020', 'K.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 0, 'Kathryn', 'Cochran', '6140', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kathryn.cochran@joshua-g2.co.uk', 'Account Director (MAT)\r\n', 'd7034e', 'K.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 0, 'Kelly', 'Lyons', '7827', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kelly.lyons@joshua-g2.co.uk', 'Despatch & Facilities Co-ordinator\r\n', '754125', 'K.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 0, 'Kerry', 'Brady', '5329', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kerry.brady@joshua-g2.co.uk', 'Client Biller \r\n', '5b1794', 'K.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 0, 'Kevin', 'Howes', '7860', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kevin.howes@joshua-g2.co.uk', 'Creative Art Director\r\n', 'e50089', 'K.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 0, 'Lai-Yi', 'Cheung', '7781', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lai-yi.cheung@joshua-g2.co.uk', 'Management Accountant Finance \r\n', '1cf526', 'L.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 0, 'Lena', 'Shah', '7960', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lena.shah@joshua-g2.co.uk', 'HR Advisor \r\n', '16fd50', 'L.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 0, 'Lettie', 'Coombs', '7769', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lettie.coombs@g2.com', 'PA  to Peter Thompson\r\n', '04f4be', 'L.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 0, 'Louise', 'Day', '7746', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'louise.day@joshua-g2.co.uk', 'Group Head Copywriter \r\n', 'ed4be0', 'L.D.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 0, 'Marie', 'Socratous', '6143', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'marie.socratous@g2.com', 'Project Supervisor KENT\r\n', '36f564', 'M.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 0, 'Marc', 'Smith', '5316', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'marc.smith@g2.com', 'Business Development Director G2  \r\n', '4d8cf6', 'M.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 0, 'Marc', 'Smith', '6148', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'marc.smith@g2.com', '2nd Line (2nd floor)\r\n', '3fa543', 'M.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 0, 'Maria', 'Humphrey', '7920', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'maria.humphrey@joshua-g2.co.uk', 'Head of Account Handling \r\n', 'c181c4', 'M.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 0, 'Mark', 'Barrett', '7622', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'mark.barrett@joshua-g2.co.uk', 'Junior Account Payable\r\n', '6e7c13', 'M.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 0, 'Mark', 'Leahy', '7967', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'mark.leahy@joshua-g2.co.uk', 'Technical Director JI \r\n', '49a959', 'M.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 0, 'Matthew', 'Howells', '7602', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'matthew.howells@joshua-g2.co.uk', 'Business Development Director/TV Enquiries \r\n', '117a82', 'M.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 0, 'Michael', 'Miley', '7905', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'michael.miley@g2.com', 'Director of Sales & Promotion B/D  \r\n', 'bb8a1e', 'M.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 0, 'Michelle', 'Danan', '8323', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'michelle.danan@joshua-g2.co.uk', 'F/L Planner \r\n', '17b2d1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 0, 'Mike', 'Cornwell', '7604', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'mike.cornwell@joshua-g2.co.uk', 'Chief Executive Officer\r\n', 'ec9998', 'M.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 0, 'Mike', 'Coppen Gardner', '6138', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'mike.coppengardner@joshua-g2.co.uk', 'G2 EMEA\r\n', '2ec8b1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 0, 'Monica', 'Lawal', '7921', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'monica.lawal@g2.com', 'Team Assistant G2 B&D\r\n', 'b6075f', 'M.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 0, 'Nadeem', 'Dudhia', '8342', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nadeem.dudhia@g2.com', 'Assistant Researcher \r\n', 'd96bb5', 'N.D.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 0, 'Nick', 'Hamilton', '7931', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nick.hamilton@g2.com', 'Executive Creative Director G2 International\r\n', '951212', 'N.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 0, 'Nicola', 'Wardell', '6117', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nicola.wardell@joshua-g2.co.uk', 'Regional Brand Leader EMEA\r\n', '77390d', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 0, 'Ondrej', 'Rafaj', '6134', '4205050', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ondrej.rafaj@joshua-g2.co.uk', 'Senior Developer', 'aaaaaa', 'O.R.', '0000-00-00 00:00:00', '2009-02-26 15:04:02'),
(117, 0, 'Paul', 'Gillam', '5304', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'paul.gillam@g2.com', 'G2 Art Director \r\n', '48fd35', 'P.G.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 0, 'Paul', 'Moran', '7764', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'paul.moran@joshua-g2.co.uk', 'F/L Creative\r\n', '397f86', 'P.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 0, 'Paul', 'Thompson', '5307', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'paul.thompson@joshua-g2.co.uk', 'Account Manger \r\n', '2f5900', 'P.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 0, 'Paul', 'Thomson', '7619', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'paul.thomson@joshua-g2.co.uk', 'F/L Interactive\r\n', 'c2a6ae', 'P.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 0, 'Peter', 'Thompson', '7902', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'peter.thompson@g2.com', 'Chief Executive G2 EMEA  \r\n', '797cbd', 'P.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 0, 'Peter', 'Thompson', '7970', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'peter.thompson@g2.com', 'Chief Executive G2 EMEA\r\n', '34b3d3', 'P.T.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 0, 'Peter', 'Waring', '8334', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'peter.waring@g2.com', 'Client Director\r\n', 'cc8042', 'P.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 0, 'Philip', 'Ramage', '7904', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'philip.ramage@joshua-g2.co.uk', 'Creative copywriter \r\n', '123545', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 0, 'Pippa', 'White', '7883', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pippa.white@joshua-g2.co.uk', 'Studio Services \r\n', 'd6a183', 'P.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 0, 'Rachel', 'Patman', '7975', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rachel.patman@joshua-g2.co.uk', 'F/L Account Manager\r\n', '1c570b', 'R.P.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 0, 'Rebecca', 'Robson', '7762', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rebecca.robson@joshua-g2.co.uk', 'Senior Account Manager  MATERNITY\r\n', '0aec86', 'R.R.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 0, 'Richard', 'Bevacqua', '7855', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'richard.bevacqua@joshua-g2.co.uk', 'Client Director \r\n', '2df184', 'R.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 0, 'Richard', 'Morgan', '7819', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'richard.morgan@joshua-g2.co.uk', 'Junior Art Director Creative\r\n', '7faee2', 'R.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 0, 'Richard', 'Morgan', '8321', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'richard.morgan2@joshua-g2.co.uk', 'Senior Art Director Interactive\r\n', '34a140', 'R.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 0, 'Russell', 'Gillman', '5304', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'russell.gillman@g2.com', 'F/L G2 B&D\r\n', '94d2c6', 'R.G.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 0, 'Sabina', 'Mathewson', '6107', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sabina.mathewson@g2.com', 'Account Director DUNHILL \r\n', '0362f7', 'S.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 0, 'Sally', 'Cooper', '7767', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sally.cooper@joshua-g2.co.uk', 'Project Manager \r\n', '6a2f26', 'S.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 0, 'Sam', 'White', '6127', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sam.white@joshua-g2.co.uk', 'F/L Group Account Director\r\n', 'e8f905', 'S.W.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 0, 'Samsher', 'Lalli', '7666', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsher.lalli@joshua-g2.co.uk', 'IT Helpdesk\r\n', '87470a', 'S.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 0, 'Sangeeta', 'Bhuchar', '7918', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sangeeta.bhuchar@joshua-g2.co.uk', 'Finance Controller\r\n', 'e0bd73', 'S.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 0, 'Sara', 'Beach', '7792', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sara.beach@joshua-g2.co.uk', 'Mac Operator\r\n', 'e3c9ff', 'S.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 0, 'Sarah', 'Davey', '7842', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sarah.davey@joshua-g2.co.uk', 'Facilities Manager \r\n', '23ddaa', 'S.D.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 0, 'Sarah', 'Marshall', '7928', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sarah.marshall@joshua-g2.co.uk', 'Account Supervisor\r\n', '78667f', 'S.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 0, 'Sarah', 'Street', '5345', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sarah.street@joshua-g2.co.uk', 'HR/Payroll Administrator\r\n', '1a3cad', 'S.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 0, 'Sheila', 'Denney', '7604', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sheila.denney@joshua-g2.co.uk', 'PA  to Mike Cornwell\r\n', '19196b', 'S.D.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 0, 'Simon', 'Levitt', '7748', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'simon.levitt@greymail.co.uk', 'F/L Interactive\r\n', '124115', 'S.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 0, 'Simon', 'Nunes de Souza', '5308', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'simon.nunesdesouza@g2.com', 'Designer G2B&D\r\n', 'cceaa0', 'S.N.d.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 0, 'Sourav', 'Burman', '7765', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sourav.burman@g2.com', 'EMEA Director  JG2 \r\n', '542a42', 'S.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 0, 'Steve', 'Lunn', '6132', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'steve.lunn@g2.com', 'Creative Director G2B&D \r\n', 'b5505f', 'S.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 0, 'Steve', 'McGeorge', '8330', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'steve.mcgeorge@joshua-g2.co.uk', 'Junior Designer Interactive\r\n', '424b20', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 0, 'Stuart', 'Whittaker', '7930', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'stuart.whittaker@joshua-g2.co.uk', 'Project Manager Interactive\r\n', '4c0d3a', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 0, 'Susie', 'Miller', '7870', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'susie.miller@joshua-g2.co.uk', 'Hospitality Manager\r\n', 'b1a1b4', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 0, 'Sven', 'Hughes', '5327', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sven.hughes@g2.com', 'Associate Creative Director \r\n', '007b29', 'S.H.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 0, 'Tania', 'Mag', '7640', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tania.mag@joshua-g2.co.uk', 'Team Assistant\r\n', '731131', 'T.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 0, 'Tanya', 'Mutkin', '6131', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tanya.mutkin@joshua-g2.co.uk', 'Account Director KENT\r\n', 'e1f6f2', 'T.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 0, 'Tanya', 'Sirkin', '7844', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tanya.sirkin@g2.com', 'Visualisor Studio\r\n', '03543f', 'T.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 0, 'Teju', 'Sanusi', '7833', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'teju.sanusi@joshua-g2.co.uk', 'Flash Developer\r\n', 'd63031', 'T.S.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 0, 'Thomas', 'Michelou', '7610', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'thomas.michelou@joshua-g2.co.uk', 'Senior Account Director\r\n', '014a50', 'T.M.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 0, 'Tim', 'Johnston', '7909', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tim.johnston@g2.com', 'Account Manager \r\n', '483c57', 'T.J.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 0, 'Tracey', 'Lindsey', '7793', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'tracey.lindsey@joshua-g2.co.uk', '\r\n', '133420', 'T.L.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 0, 'Uta', 'Finger', '6128', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'uta.finger@g2.com', '\r\n', '9bf8ab', 'U.F.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 0, 'Verra', 'Budimlija', '7899', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'verra.budimlija@joshua-g2.co.uk', 'Credit Control \r\n', 'f82ecd', 'V.B.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 0, 'Victoria', 'Hutchings', '7987', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'victoria.hutchings@joshua-g2.co.uk', '\r\n', 'd1397d', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 0, 'Wendy', 'Carpenter', '7829', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'wendy.carpenter@joshua-g2.co.uk', '\r\n', 'b2d281', 'W.C.\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `joshtray_templates`
--

CREATE TABLE IF NOT EXISTS `joshtray_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pager` int(11) unsigned NOT NULL DEFAULT '1',
  `perpage` int(11) unsigned NOT NULL DEFAULT '20',
  `search` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `joshtray_templates`
--

INSERT INTO `joshtray_templates` (`id`, `name`, `identifier`, `temptype`, `pager`, `perpage`, `search`, `tempbegin`, `tempitem`, `tempend`) VALUES
(1, 'test', 'test', 0, 1, 20, 1, '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Full Extra Small Image</th>\r\n			<th>Firstname</th>\r\n			<th>Lastname</th>\r\n			<th>Mail</th>\r\n			<th>Line</th>\r\n			<th>Phone</th>\r\n			<th>Mobile</th>\r\n			<th>Note</th>\r\n			<th>Lastlogin</th>\r\n			<th>Title</th>\r\n			<th>Initials</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>', '<tr>\r\n	<td><a href="{#LINK_19}?person={%Id}">{%FullXSmallImage}</a></td>\r\n	<td>{%Firstname}</td>\r\n	<td>{%Lastname}</td>\r\n	<td>{%Mail}</td>\r\n	<td>{%Line}</td>\r\n	<td>{%Phone}</td>\r\n	<td>{%Mobile}</td>\r\n	<td>{%Note}</td>\r\n	<td>{%Lastlogin}</td>\r\n	<td>{%Title}</td>\r\n	<td>{%Initials}</td>\r\n</tr>', '	</tbody>\r\n</table>\r\n{%PAGER}'),
(2, 'Main detail', 'main-detail', 1, 0, 0, 0, '', '<div>\r\n	<h1>{%FullXSmallImage} {%Lastname}, {%Firstname}</h1>\r\n	<p>Mail: {%Mail}</p>\r\n	<p>Phone line: {%Line}</p>\r\n	<p>Phone: {%Phone}</p>\r\n	<p>Mobile phone: {%Mobile}</p>\r\n	<p>Note: {%Note}</p>\r\n	<p>Lastlogin: {%Lastlogin}</p>\r\n	<p>Title: {%Title}</p>\r\n	<p>Initials: {%Initials}</p>\r\n	<p>{%FullSmallImage}</p>\r\n	<p>{%FullMediumImage}</p>\r\n	<p>{%FullLargeImage}</p>\r\n</div>', '<h1>Sorry selectected contact was not found</h1>');

-- --------------------------------------------------------

--
-- Table structure for table `languages_definitions`
--

CREATE TABLE IF NOT EXISTS `languages_definitions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `minchar` int(11) NOT NULL,
  `maxchar` int(11) NOT NULL DEFAULT '99999',
  `pages_id` int(11) unsigned DEFAULT '0',
  `isglobal` tinyint(1) unsigned NOT NULL,
  `system_websites_id` int(4) unsigned DEFAULT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `default_lang_id` int(11) unsigned NOT NULL DEFAULT '0',
  `default_text` text NOT NULL,
  `allowhtml` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pages_id` (`pages_id`,`isglobal`,`system_websites_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `languages_definitions`
--

INSERT INTO `languages_definitions` (`id`, `name`, `minchar`, `maxchar`, `pages_id`, `isglobal`, `system_websites_id`, `enabled`, `default_lang_id`, `default_text`, `allowhtml`) VALUES
(1, 'AAA', 1, 999999, 10, 0, 3, 1, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages_translations`
--

CREATE TABLE IF NOT EXISTS `languages_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `languages_definitions_id` bigint(20) unsigned NOT NULL,
  `system_languages_id` int(11) unsigned NOT NULL,
  `definition` text NOT NULL,
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `languages_definitions_id` (`languages_definitions_id`,`system_languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `languages_translations`
--


-- --------------------------------------------------------

--
-- Table structure for table `links_urls`
--

CREATE TABLE IF NOT EXISTS `links_urls` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `target` varchar(25) NOT NULL DEFAULT '',
  `links_categories_id` int(8) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` int(11) NOT NULL DEFAULT '1',
  `added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `changed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rel` varchar(255) NOT NULL DEFAULT '',
  `notes` text NOT NULL,
  `rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `category` (`links_categories_id`),
  KEY `visible` (`visible`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `links_urls`
--


-- --------------------------------------------------------

--
-- Table structure for table `mobileapps`
--

CREATE TABLE IF NOT EXISTS `mobileapps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `identifier` varchar(150) NOT NULL,
  `devtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `apptype` smallint(1) unsigned NOT NULL DEFAULT '0',
  `icon` smallint(1) unsigned NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `version` varchar(20) NOT NULL,
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`,`devtype`,`apptype`,`icon`,`sort`,`added`,`changed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mobileapps`
--

INSERT INTO `mobileapps` (`id`, `name`, `identifier`, `devtype`, `apptype`, `icon`, `sort`, `added`, `changed`, `version`, `size`) VALUES
(4, 'polligraf', 'com.fuerteint.polligraf', 0, 0, 0, 0, '2012-09-27 18:07:42', '2012-10-01 22:50:13', '1.0', 1608033),
(8, 'AR Racer', 'com.fuerteint.enterprise.arracer', 0, 0, 0, 0, '2012-09-28 11:29:27', '2012-09-28 11:29:27', '', 0),
(9, 'Motorsport', 'com.fuerteint.Skoda.enterprise', 0, 0, 0, 0, '2012-09-28 11:32:17', '2012-10-02 13:57:02', '1.0', 49502658),
(10, 'polligraf', 'com.fuerteint.polligraf', 1, 0, 0, 0, '2012-10-01 22:50:28', '2012-10-01 22:50:28', '1.0', 1608033),
(11, 'polligraf', 'com.fuerteint.polligraf', 2, 0, 0, 0, '2012-10-01 22:50:42', '2012-10-01 22:50:42', '1.0', 1608033);

-- --------------------------------------------------------

--
-- Table structure for table `mobileapps_companies`
--

CREATE TABLE IF NOT EXISTS `mobileapps_companies` (
  `companies_id` bigint(20) unsigned NOT NULL,
  `mobileapps_id` bigint(20) unsigned NOT NULL,
  KEY `companies_id` (`companies_id`,`mobileapps_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobileapps_companies`
--

INSERT INTO `mobileapps_companies` (`companies_id`, `mobileapps_id`) VALUES
(1, 8),
(1, 10),
(2, 8),
(2, 10),
(3, 8),
(3, 10),
(4, 8),
(5, 8),
(6, 8),
(6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `mobileapps_users`
--

CREATE TABLE IF NOT EXISTS `mobileapps_users` (
  `users_id` int(11) unsigned NOT NULL,
  `companies_id` bigint(20) unsigned NOT NULL,
  KEY `users_id` (`users_id`,`companies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobileapps_users`
--

INSERT INTO `mobileapps_users` (`users_id`, `companies_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `motocatalogue_brands`
--

CREATE TABLE IF NOT EXISTS `motocatalogue_brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `motocatalogue_brands`
--

INSERT INTO `motocatalogue_brands` (`id`, `name`, `description`) VALUES
(1, 'Harley-Davidson', ''),
(2, 'Yamaha', ''),
(3, 'Piaggio', '');

-- --------------------------------------------------------

--
-- Table structure for table `motocatalogue_images`
--

CREATE TABLE IF NOT EXISTS `motocatalogue_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `smallid` bigint(20) NOT NULL,
  `projects_items_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mdescription` text NOT NULL,
  `mkeywords` text NOT NULL,
  `h2` varchar(255) NOT NULL,
  `h3` varchar(255) NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text NOT NULL,
  `text4` text NOT NULL,
  `views` bigint(20) NOT NULL,
  `downloads` bigint(20) NOT NULL,
  `size` int(11) NOT NULL,
  `itemtype` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `variable1` varchar(255) NOT NULL,
  `variable2` varchar(255) NOT NULL,
  `variable3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `smallid` (`smallid`),
  KEY `itemtype` (`itemtype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `motocatalogue_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `motocatalogue_items`
--

CREATE TABLE IF NOT EXISTS `motocatalogue_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pretext` text NOT NULL,
  `description` text NOT NULL,
  `cubature` varchar(50) NOT NULL,
  `power` varchar(50) NOT NULL,
  `kilometers` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `vintage` date NOT NULL,
  `technical_approve` tinyint(1) NOT NULL DEFAULT '1',
  `origin` int(11) DEFAULT NULL,
  `leasing` tinyint(1) NOT NULL DEFAULT '1',
  `tax` tinyint(1) NOT NULL DEFAULT '0',
  `brand` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `promo` tinyint(1) NOT NULL DEFAULT '0',
  `state` varchar(50) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `motocatalogue_items`
--

INSERT INTO `motocatalogue_items` (`id`, `name`, `pretext`, `description`, `cubature`, `power`, `kilometers`, `price`, `vintage`, `technical_approve`, `origin`, `leasing`, `tax`, `brand`, `type`, `promo`, `state`, `added`, `changed`) VALUES
(1, 'Harlej cislo jedna', 'Cool bike', 'Super cool bike', '6500', '8000', '5', 670000, '2008-01-01', 1, 56, 1, 0, 'Harley-Davidson', 'Ctyrkolky', 0, 'motoused', '2009-05-20 03:50:19', '2009-05-20 04:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `motocatalogue_types`
--

CREATE TABLE IF NOT EXISTS `motocatalogue_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `motocatalogue_types`
--

INSERT INTO `motocatalogue_types` (`id`, `name`, `description`) VALUES
(1, 'Motorky', ''),
(2, 'Skutry', ''),
(3, 'Ctyrkolky', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` varchar(8) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `system_websites_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_categories_user` (`system_users_id`),
  KEY `FK_news_categories_web` (`system_websites_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `parent`, `name`, `system_users_id`, `added`, `changed`, `system_websites_id`) VALUES
(1, '0', 'Main news', 1, '2009-02-19 18:52:02', '2009-12-17 18:04:03', 3),
(2, '1', 'huuuuu', 1, '2009-02-19 18:56:21', '2009-02-19 18:56:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_items`
--

CREATE TABLE IF NOT EXISTS `news_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_categories_id` int(8) unsigned DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `head` text NOT NULL,
  `text` text NOT NULL,
  `displayfrom` datetime NOT NULL,
  `displayto` datetime NOT NULL,
  `datefor` datetime NOT NULL,
  `system_users_id` int(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_items_user` (`system_users_id`),
  KEY `FK_news_items_cat` (`news_categories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `news_rss`
--

CREATE TABLE IF NOT EXISTS `news_rss` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `version` tinyint(1) unsigned NOT NULL,
  `news_categories_id` int(8) unsigned NOT NULL DEFAULT '0',
  `showitems` int(4) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `displaylanguage` varchar(30) NOT NULL,
  `copyright` text NOT NULL,
  `ttl` int(4) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `imagetitle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_rss_cat` (`news_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news_rss`
--

INSERT INTO `news_rss` (`id`, `name`, `identifier`, `version`, `news_categories_id`, `showitems`, `link`, `folder`, `description`, `displaylanguage`, `copyright`, `ttl`, `image`, `imagetitle`) VALUES
(2, 'Main cat', 'main-cat-v1-0', 1, 0, 20, 'index.php?pageid=1&amp;news={%CAT}', 'rss', '', 'en', 'c 2009 Rafiki', 15, '', ''),
(3, 'Main cat', 'main-cat-v2-0', 2, 0, 20, 'index.php?pageid=1&amp;news={%CAT}', 'rss/', '', 'en', '', 15, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_templates`
--

CREATE TABLE IF NOT EXISTS `news_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pager` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `perpage` int(4) unsigned NOT NULL,
  `addid` int(11) NOT NULL DEFAULT '0',
  `datasource` int(3) unsigned NOT NULL DEFAULT '0',
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  `notemp` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news_templates`
--

INSERT INTO `news_templates` (`id`, `name`, `identifier`, `temptype`, `pager`, `perpage`, `addid`, `datasource`, `tempbegin`, `tempitem`, `tempend`, `notemp`) VALUES
(1, 'All categories', 'all-categories', 0, 0, 20, 0, 4, '<div>', '<p>\r\n	<a href="{#WEBROOT}news-{%Id}-{%SafeName}/"><strong>{%Title}</strong></a><br />\r\n	<em>{%Date}</em><br />\r\n	{%Perex}\r\n</p>', '</div>\r\n{%PAGER}', '<p>There is NO article in this category</p>'),
(2, 'Home categories', 'home-categories', 2, 0, 0, 1, 3, '<ul>', '	<li><a href="?newscat={%Id}">{%Name}</a></li>', '</ul>\r\n\r\n', '<h1>There is no category</h1>'),
(3, 'Main article', 'main-article', 1, 0, 0, 0, 0, '', '<div>\r\n	<p><strong>{%Author}</strong> - <em>{%Date}</em></p>\r\n	<div class="perex">{%Perex}</div>\r\n	<div class="content">{%Content}</div>\r\n</div>', '', '<h1>There is no article</h1>'),
(4, 'footer news', 'footer-news', 0, 0, 4, 0, 5, '', '<p><small>{%Date}</small>{%Title} <a href="{#WEBROOT}news-{%Id}-{%SafeName}/">Read more ...</a></p>\r\n', '', '<p>There is no article in this category</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_websites_id` int(4) NOT NULL DEFAULT '1',
  `system_language_id` int(3) NOT NULL DEFAULT '1',
  `pages_templates_id` int(11) unsigned DEFAULT NULL,
  `revision` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `rewrite` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `addtext1` varchar(255) NOT NULL,
  `addtext2` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `master` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parentid` int(10) unsigned NOT NULL DEFAULT '1',
  `home` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` int(8) unsigned NOT NULL DEFAULT '0',
  `head` text NOT NULL,
  `page` longtext NOT NULL,
  `note` text NOT NULL,
  `redirect1` int(11) unsigned NOT NULL,
  `redirect2` int(11) unsigned NOT NULL,
  `redirect3` varchar(255) NOT NULL,
  `redirect4` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kangkey` (`system_language_id`),
  KEY `keys` (`system_websites_id`,`pages_templates_id`,`identifier`,`enabled`,`sort`),
  KEY `FK_pages_templates` (`pages_templates_id`),
  KEY `home` (`home`),
  KEY `master` (`master`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `system_websites_id`, `system_language_id`, `pages_templates_id`, `revision`, `name`, `identifier`, `title`, `heading1`, `heading2`, `heading3`, `rewrite`, `keywords`, `description`, `addtext1`, `addtext2`, `enabled`, `master`, `parentid`, `home`, `sort`, `head`, `page`, `note`, `redirect1`, `redirect2`, `redirect3`, `redirect4`) VALUES
(1, 4, 5, 23, 10, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, 1, 6, '<style>\r\n#errors {\r\n	width:600px;\r\n	margin-top:50px;\r\n	margin-bottom:-30px;\r\n	margin-left:auto;\r\n	margin-right:auto;\r\n	text-align:center;\r\n	font-size:12px;\r\n}\r\n#errors ul {\r\n}\r\n#errors ul.red li {\r\n	color:#900;\r\n}\r\n#errors ul.green li {\r\n	color: #090;\r\n}\r\n#errors ul.orange li {\r\n	color:#C60;\r\n}\r\n#errors ul li {\r\n	margin-bottom:12px;\r\n}\r\n</style>', 'Hi David', '', 0, 2, '', ''),
(2, 4, 5, 20, 7, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, 0, 4, '<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>', '<div class="actionButtons">\r\n    <a href="{#WEBROOT}/admin/?part=system&mod=mobileapps&page=apps" class="button">Add new app</a>\r\n</div>\r\n<div class="content">\r\n		{#FRONTEND_mobileapps_appslist}\r\n        {#FRONTEND_mobileapps_appdetail}\r\n</div>', '...', 1, 0, 'You have to be logged in to access this section', ''),
(3, 4, 5, 26, 4, 'App PLIST', 'app-plist', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, 1, '', 'This page is using FRONTEND template in mobileapps module only!!!', '...', 1, 0, 'Go away! :)', ''),
(4, 4, 5, 20, 2, 'Dashboard', 'dashboard', 'Dashboard', 'Dashboard', '', '', '', '', '', '', '', 1, 0, 0, 0, 5, '', 'Dashboard', '...', 0, 0, '', ''),
(5, 4, 5, 20, 8, 'Groups', 'groups', 'groups', 'groups', '', '', '', '', '', '', '', 1, 0, 0, 0, 3, '', '<div class="content">\r\n	{#FRONTEND_mobileapps_companiesmenu}\r\n        {#FRONTEND_mobileapps_usersselector}\r\n</div>\r\n', '...', 0, 0, '', ''),
(6, 4, 5, 20, 2, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 0, 0, 2, '', '', '...', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages_alternatelang`
--

CREATE TABLE IF NOT EXISTS `pages_alternatelang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pages_id` int(11) unsigned NOT NULL,
  `system_language_id` int(3) NOT NULL,
  `alternative_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kpages` (`pages_id`),
  KEY `fklanguages` (`system_language_id`),
  KEY `fkalternative` (`alternative_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages_alternatelang`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages_history`
--

CREATE TABLE IF NOT EXISTS `pages_history` (
  `id` int(10) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `rewrite` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `head` text NOT NULL,
  `page` longtext NOT NULL,
  `pages_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkuser` (`system_users_id`),
  KEY `fkpage` (`pages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_history`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages_languages`
--

CREATE TABLE IF NOT EXISTS `pages_languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_languages_id` int(3) NOT NULL,
  `code` varchar(120) NOT NULL,
  `definition` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `klanguage` (`system_languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages_languages`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages_permissions`
--

CREATE TABLE IF NOT EXISTS `pages_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_teams_id` int(8) unsigned NOT NULL,
  `pages_id` int(10) unsigned NOT NULL,
  `permissions` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `system_teams_id` (`system_teams_id`),
  KEY `pages_id` (`pages_id`),
  KEY `permissions` (`permissions`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages_revisions`
--

CREATE TABLE IF NOT EXISTS `pages_revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pages_id` int(11) unsigned NOT NULL,
  `system_websites_id` int(4) NOT NULL DEFAULT '1',
  `revision` int(11) NOT NULL DEFAULT '1',
  `system_language_id` int(3) NOT NULL DEFAULT '1',
  `pages_templates_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `heading3` varchar(255) NOT NULL,
  `rewrite` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `addtext1` varchar(255) NOT NULL,
  `addtext2` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parentid` int(10) unsigned NOT NULL DEFAULT '1',
  `sort` int(8) unsigned NOT NULL DEFAULT '0',
  `head` text NOT NULL,
  `page` longtext NOT NULL,
  `note` text NOT NULL,
  `redirect1` int(11) NOT NULL,
  `redirect2` int(11) NOT NULL,
  `redirect3` varchar(255) NOT NULL,
  `redirect4` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`system_websites_id`,`pages_templates_id`,`identifier`,`enabled`,`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `pages_revisions`
--

INSERT INTO `pages_revisions` (`id`, `pages_id`, `system_websites_id`, `revision`, `system_language_id`, `pages_templates_id`, `name`, `identifier`, `title`, `heading1`, `heading2`, `heading3`, `rewrite`, `keywords`, `description`, `addtext1`, `addtext2`, `enabled`, `parentid`, `sort`, `head`, `page`, `note`, `redirect1`, `redirect2`, `redirect3`, `redirect4`) VALUES
(1, 1, 4, 2, 5, 20, 'Home Page', 'home-page', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(2, 1, 4, 3, 5, 20, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(3, 1, 4, 4, 5, 20, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '', 'Hi David', '', 0, 0, '', ''),
(4, 1, 4, 5, 5, 20, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '', 'Hi David', '', 0, 0, '', ''),
(5, 2, 4, 1, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, '', 'This is My Apps page', '...', 0, 0, '', ''),
(6, 1, 4, 6, 5, 20, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(7, 1, 4, 7, 5, 23, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(8, 1, 4, 8, 5, 23, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '', 'Hi David', '', 0, 2, '', ''),
(9, 2, 4, 2, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, '', '<div class="actionButtons">\r\n    <button name="addAppGo">Add app</button>\r\n    <a href="#saveAppGo" class="button">Save</a>\r\n</div>\r\n<div class="content">\r\n    <ul class="menu">\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://modmyi.com/attachments/forums/iphone-4-new-skins-themes-launches/582232d1335434551-jaku-ios-5-icon-iphone4.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://mobile2.twimg.com/d651fac477658479e5224b000812d74e5e34fcbe/images/apple-touch-icon-114.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li class="active">\r\n            <a href="#" title="">\r\n                <img src="http://a2.mzstatic.com/us/r1000/066/Purple/v4/ac/f8/b9/acf8b9ba-f878-b27f-c9da-b80eb2244448/Icon.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://1.bp.blogspot.com/_WED6TVb-zzk/TSPmSrVp1yI/AAAAAAAAAHQ/roX6sR_Fnrs/s400/CampbellsSoup.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://www.caitlinpotts.com/ux-portfolio/wp-content/uploads/2011/08/Icon@2x.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://e.miniclip.com/images/smartphone/icons/rendered/iphone_tab/FlingIcon512.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n    </ul>\r\n    <div class="appDetail">\r\n        <div class="box noBorder">\r\n            <h3 class="appName">Alza dance app name</h3>\r\n            <p class="appBundleId">com.fuerteint.arracer.enterprise</p>\r\n            <a href="#" class="button rightButton">Delete</a>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Production version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.1</span></li>\r\n                <li>Build date: <span>24. Aug 1991 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Beta version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.0</span></li>\r\n                <li>Build date: <span>4. Jul 1981 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n            <p class="peopleInfo">\r\n                All, Developers, Management, SOMO\r\n            </p>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Development version</h3>\r\n            <div class="controls">\r\n                <a href="#" title="Upload new development version of #########" class="button upload">Upload</a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', '...', 0, 0, '', ''),
(10, 1, 4, 9, 5, 23, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '<style>\r\ndiv.errors {\r\n	width:600px;\r\n	margin-top:50px;\r\n	margin-bottom:-30px;\r\n	margin-left:auto;\r\n	margin-right:auto;\r\n	text-align:center;\r\n	font-size:12px;\r\n}\r\ndiv.errors ul {\r\n}\r\ndiv.errors ul.red li {\r\n	color:#900;\r\n}\r\ndiv.errors ul.green li {\r\n	color: #090;\r\n}\r\ndiv.errors ul.orange li {\r\n	color:#C60;\r\n}\r\ndiv.errors ul li {\r\n	margin-bottom:12px;\r\n}\r\n</style>\r\n', 'Hi David', '', 0, 2, '', ''),
(11, 2, 4, 3, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, '', '<div class="actionButtons">\r\n    <button name="addAppGo">Add app</button>\r\n    <a href="#saveAppGo" class="button">Save</a>\r\n</div>\r\n<div class="content">\r\n    <ul class="menu">\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://modmyi.com/attachments/forums/iphone-4-new-skins-themes-launches/582232d1335434551-jaku-ios-5-icon-iphone4.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://mobile2.twimg.com/d651fac477658479e5224b000812d74e5e34fcbe/images/apple-touch-icon-114.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li class="active">\r\n            <a href="#" title="">\r\n                <img src="http://a2.mzstatic.com/us/r1000/066/Purple/v4/ac/f8/b9/acf8b9ba-f878-b27f-c9da-b80eb2244448/Icon.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://1.bp.blogspot.com/_WED6TVb-zzk/TSPmSrVp1yI/AAAAAAAAAHQ/roX6sR_Fnrs/s400/CampbellsSoup.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://www.caitlinpotts.com/ux-portfolio/wp-content/uploads/2011/08/Icon@2x.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://e.miniclip.com/images/smartphone/icons/rendered/iphone_tab/FlingIcon512.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n    </ul>\r\n    <div class="appDetail">\r\n        <div class="box noBorder">\r\n            <h3 class="appName">Alza dance app name</h3>\r\n            <p class="appBundleId">com.fuerteint.arracer.enterprise</p>\r\n            <a href="#" class="button rightButton">Delete</a>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Production version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.1</span></li>\r\n                <li>Build date: <span>24. Aug 1991 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Beta version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.0</span></li>\r\n                <li>Build date: <span>4. Jul 1981 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n            <p class="peopleInfo">\r\n                All, Developers, Management, SOMO\r\n            </p>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Development version</h3>\r\n            <div class="controls">\r\n                <a href="#" title="Upload new development version of #########" class="button upload">Upload</a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', '...', 1, 0, 'You have to be logged in to access this section', ''),
(12, 1, 4, 10, 5, 23, 'Home Page', 'home-page', 'Test!', '', '', '', '', '', '', '', '', 1, 0, 0, '<style>\r\n#errors {\r\n	width:600px;\r\n	margin-top:50px;\r\n	margin-bottom:-30px;\r\n	margin-left:auto;\r\n	margin-right:auto;\r\n	text-align:center;\r\n	font-size:12px;\r\n}\r\n#errors ul {\r\n}\r\n#errors ul.red li {\r\n	color:#900;\r\n}\r\n#errors ul.green li {\r\n	color: #090;\r\n}\r\n#errors ul.orange li {\r\n	color:#C60;\r\n}\r\n#errors ul li {\r\n	margin-bottom:12px;\r\n}\r\n</style>', 'Hi David', '', 0, 2, '', ''),
(13, 2, 4, 4, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, '', '<div class="actionButtons">\r\n    <a href="{#WEBROOT}/admin/?part=system&mod=mobileapps&page=apps" class="button">Add new app</a>\r\n</div>\r\n<div class="content">\r\n    <ul class="menu">\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://modmyi.com/attachments/forums/iphone-4-new-skins-themes-launches/582232d1335434551-jaku-ios-5-icon-iphone4.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://mobile2.twimg.com/d651fac477658479e5224b000812d74e5e34fcbe/images/apple-touch-icon-114.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li class="active">\r\n            <a href="#" title="">\r\n                <img src="http://a2.mzstatic.com/us/r1000/066/Purple/v4/ac/f8/b9/acf8b9ba-f878-b27f-c9da-b80eb2244448/Icon.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://1.bp.blogspot.com/_WED6TVb-zzk/TSPmSrVp1yI/AAAAAAAAAHQ/roX6sR_Fnrs/s400/CampbellsSoup.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://www.caitlinpotts.com/ux-portfolio/wp-content/uploads/2011/08/Icon@2x.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n        <li>\r\n            <a href="#" title="">\r\n                <img src="http://e.miniclip.com/images/smartphone/icons/rendered/iphone_tab/FlingIcon512.png" alt="" />\r\n                <strong>App name</strong>\r\n                <small>Version <span>1.0.2.54</span></small>\r\n            </a>\r\n        </li>\r\n    </ul>\r\n    <div class="appDetail">\r\n        <div class="box noBorder">\r\n            <h3 class="appName">Alza dance app name</h3>\r\n            <p class="appBundleId">com.fuerteint.arracer.enterprise</p>\r\n            <a href="#" class="button rightButton">Delete</a>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Production version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.1</span></li>\r\n                <li>Build date: <span>24. Aug 1991 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Beta version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.0</span></li>\r\n                <li>Build date: <span>4. Jul 1981 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n            <p class="peopleInfo">\r\n                All, Developers, Management, SOMO\r\n            </p>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Development version</h3>\r\n            <div class="controls">\r\n                <a href="#" title="Upload new development version of #########" class="button upload">Upload</a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n', '...', 1, 0, 'You have to be logged in to access this section', ''),
(14, 2, 4, 5, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, '', '<div class="actionButtons">\r\n    <a href="{#WEBROOT}/admin/?part=system&mod=mobileapps&page=apps" class="button">Add new app</a>\r\n</div>\r\n<div class="content">\r\n		{#FRONTEND_mobileapps_appslist}\r\n        <div class="appDetail">\r\n        <div class="box noBorder">\r\n            <h3 class="appName">Alza dance app name</h3>\r\n            <p class="appBundleId">com.fuerteint.arracer.enterprise</p>\r\n            <a href="#" class="button rightButton">Delete</a>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Production version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.1</span></li>\r\n                <li>Build date: <span>24. Aug 1991 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Beta version</h3>\r\n            <ul class="values">\r\n                <li>Version: <span>v1.0</span></li>\r\n                <li>Build date: <span>4. Jul 1981 12:15 PM</span></li>\r\n            </ul>\r\n            <div class="controls">\r\n                <a href="#" title="Edit #########" class="button edit">Edit</a>\r\n                <a href="#" title="Download #########" class="button download">Download</a>\r\n                <a href="#" title="Replace #########" class="button replace">Replace</a>\r\n            </div>\r\n            <p class="peopleInfo">\r\n                All, Developers, Management, SOMO\r\n            </p>\r\n        </div>\r\n        <div class="box">\r\n            <h3>Development version</h3>\r\n            <div class="controls">\r\n                <a href="#" title="Upload new development version of #########" class="button upload">Upload</a>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n', '...', 1, 0, 'You have to be logged in to access this section', ''),
(15, 2, 4, 6, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 0, '', '<div class="actionButtons">\r\n    <a href="{#WEBROOT}/admin/?part=system&mod=mobileapps&page=apps" class="button">Add new app</a>\r\n</div>\r\n<div class="content">\r\n		{#FRONTEND_mobileapps_appslist}\r\n        {#FRONTEND_mobileapps_appdetail}\r\n</div>', '...', 1, 0, 'You have to be logged in to access this section', ''),
(16, 3, 4, 1, 5, 0, 'App PLIST', 'app-plist', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '...', 0, 0, '', ''),
(17, 3, 4, 2, 5, 0, 'App PLIST', 'app-plist', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '...', 1, 0, 'Go away! :)', ''),
(18, 3, 4, 3, 5, 26, 'App PLIST', 'app-plist', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '...', 1, 0, 'Go away! :)', ''),
(19, 3, 4, 4, 5, 26, 'App PLIST', 'app-plist', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', 'This page is using FRONTEND template in mobileapps module only!!!', '...', 1, 0, 'Go away! :)', ''),
(20, 4, 4, 1, 5, 0, 'Dashboard', 'dashboard', 'Dashboard', 'Dashboard', '', '', '', '', '', '', '', 1, 0, 0, '', 'Dashboard', '...', 0, 0, '', ''),
(21, 4, 4, 2, 5, 20, 'Dashboard', 'dashboard', 'Dashboard', 'Dashboard', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(22, 5, 4, 1, 5, 0, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 0, '', '', '...', 0, 0, '', ''),
(23, 6, 4, 1, 5, 20, 'Companies', 'companies', 'Companies', 'Companies', '', '', '', '', '', '', '', 1, 0, 0, '', '', '...', 0, 0, '', ''),
(24, 5, 4, 2, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(25, 5, 4, 3, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 3, '', '<div class="content">\r\n	{#FRONTEND_mobileapps_companiesmenu}\r\n        {#FRONTEND_mobileapps_usersselector}\r\n</div>', '...', 0, 0, '', ''),
(26, 5, 4, 4, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 3, '', '<div class="content">\r\n	{#FRONTEND_mobileapps_companiesmenu}\r\n        {#FRONTEND_mobileapps_usersselector}\r\n	 <div class="clear"></div>\r\n</div>', '...', 0, 0, '', ''),
(27, 5, 4, 5, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 3, '', '<div class="content">\r\n	{#FRONTEND_mobileapps_companiesmenu}\r\n<div class="clear"></div>\r\n\r\n        {#FRONTEND_mobileapps_usersselector}\r\n	 <div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n', '...', 0, 0, '', ''),
(28, 5, 4, 6, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 3, '', '<div class="content">\r\n	{#FRONTEND_mobileapps_companiesmenu}\r\n        {#FRONTEND_mobileapps_usersselector}\r\n	 <div class="clear"></div>\r\n</div>\r\n<div class="clear"></div>\r\n', '...', 0, 0, '', ''),
(29, 5, 4, 7, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 3, '', '<div class="content">\r\n	{#FRONTEND_mobileapps_companiesmenu}\r\n        {#FRONTEND_mobileapps_usersselector}\r\n</div>\r\n', '...', 0, 0, '', ''),
(30, 2, 4, 7, 5, 20, 'My Apps', 'my-apps', 'My Apps', 'My Apps', '', '', '', '', '', '', '', 1, 0, 4, '<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>', '<div class="actionButtons">\r\n    <a href="{#WEBROOT}/admin/?part=system&mod=mobileapps&page=apps" class="button">Add new app</a>\r\n</div>\r\n<div class="content">\r\n		{#FRONTEND_mobileapps_appslist}\r\n        {#FRONTEND_mobileapps_appdetail}\r\n</div>', '...', 1, 0, 'You have to be logged in to access this section', ''),
(31, 5, 4, 8, 5, 20, 'Groups', 'groups', 'groups', 'groups', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', ''),
(32, 6, 4, 2, 5, 20, 'Users', 'users', 'Users', 'Users', '', '', '', '', '', '', '', 1, 0, 0, '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages_templates`
--

CREATE TABLE IF NOT EXISTS `pages_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `revision` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `master` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `registered` tinyint(1) NOT NULL DEFAULT '0',
  `system_language_id` int(3) DEFAULT '1',
  `pages_templates_groups_id` int(4) unsigned DEFAULT '1',
  `template` longtext,
  `note` text,
  PRIMARY KEY (`id`),
  KEY `language` (`system_language_id`),
  KEY `website` (`pages_templates_groups_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `pages_templates`
--

INSERT INTO `pages_templates` (`id`, `revision`, `name`, `identifier`, `master`, `registered`, `system_language_id`, `pages_templates_groups_id`, `template`, `note`) VALUES
(20, 12, 'Main template', 'main-template', 1, 0, 1, 3, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#TEMP_header}\r\n    <div id="page">\r\n    	{#MOD_configuration_errors_main}\r\n        {#CONTENT}\r\n        <div class="clear"></div>\r\n    </div>\r\n    {#TEMP_footer}\r\n</div>\r\n</body>\r\n</html>', '...'),
(24, 8, 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li class="{#ACTIVE_4}"><a href="{#LINK_4}" title="Dashboard">Dashboard</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <li class="{#ACTIVE_6}"><a href="{#LINK_6}" title="Users">Users</a></li>\r\n        <li class="{#ACTIVE_5}"><a href="{#LINK_5}" title="Groups">Groups</a></li>\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>', '...'),
(22, 2, 'Head', 'head', 0, 0, 1, 0, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\r\n<title>{#TITLE} - Mobile Application Store - Fuerte International</title>\r\n<link href="{#WEBROOT}assets/basic/css/styles.css" rel="stylesheet" type="text/css" />\r\n<meta name="keywords" content="{#KEYWORDS}" />\r\n<meta name="description" content="{#KEYWORDS}" />\r\n<script type="text/javascript">\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([''_setAccount'', ''UA-515522-56'']);\r\n  _gaq.push([''_trackPageview'']);\r\n\r\n  (function() {\r\n    var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;\r\n    ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';\r\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n</script>\r\n{#HEAD}\r\n</head>', '...'),
(23, 4, 'Login template', 'login-template', 1, 0, 1, 0, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#MOD_configuration_errors_login}\r\n	{#MOD_users_login_page-login}\r\n</div>\r\n</body>\r\n</html>', '...'),
(25, 1, 'Footer', 'footer', 0, 0, 1, 0, '<div id="footer">\r\n\r\n</div>\r\n', '...'),
(26, 1, 'App PLIST', 'app-plist', 1, 0, 1, 0, '{#FRONTEND_mobileapps_plist}', '...');

-- --------------------------------------------------------

--
-- Table structure for table `pages_templates_groups`
--

CREATE TABLE IF NOT EXISTS `pages_templates_groups` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `identifier` varchar(150) NOT NULL,
  `folder` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages_templates_groups`
--

INSERT INTO `pages_templates_groups` (`id`, `name`, `identifier`, `folder`) VALUES
(3, 'appstore.fuerteint.com', 'appstore-fuerteint-com', 'assets/');

-- --------------------------------------------------------

--
-- Table structure for table `pages_templates_revisions`
--

CREATE TABLE IF NOT EXISTS `pages_templates_revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pages_templates_id` int(11) unsigned NOT NULL,
  `revision` int(11) NOT NULL DEFAULT '1',
  `added` datetime NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `master` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `registered` tinyint(1) NOT NULL DEFAULT '0',
  `system_language_id` int(3) DEFAULT '1',
  `pages_templates_groups_id` int(4) unsigned DEFAULT '1',
  `template` longtext,
  `note` text,
  PRIMARY KEY (`id`),
  KEY `language` (`system_language_id`),
  KEY `website` (`pages_templates_groups_id`),
  KEY `added` (`added`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pages_templates_revisions`
--

INSERT INTO `pages_templates_revisions` (`id`, `pages_templates_id`, `revision`, `added`, `name`, `identifier`, `master`, `registered`, `system_language_id`, `pages_templates_groups_id`, `template`, `note`) VALUES
(1, 21, 1, '2012-09-24 16:12:10', 'Additional tmplate', 'additional-tmplate', 0, 0, 1, 0, 'dfgd fgsdf gf', '...'),
(2, 20, 7, '2012-09-24 16:12:22', 'Main template', 'main-template', 1, 0, 1, 3, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\r\n<title>{#TITLE} - Mobile Application Store - Fuerte International</title>\r\n<link href="{#WEBROOT}assets/basic/css/styles.css" rel="stylesheet" type="text/css" />\r\n</head>\r\n\r\n<body>\r\n<div id="container">\r\n	<div id="header">\r\n    	<h1><span>Mobile Application Store - </span><strong>{#HEADING}</strong></h1>\r\n    </div>\r\n	<div id="page">\r\n    	{#CONTENT}\r\n        {#TEMP_additional-tmplate}\r\n    </div>\r\n	<div id="footer">\r\n    \r\n    </div>\r\n</div>\r\n</body>\r\n</html>\r\n', '...'),
(3, 20, 8, '2012-09-26 13:55:05', 'Main template', 'main-template', 1, 0, 1, 3, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\r\n<title>{#TITLE} - Mobile Application Store - Fuerte International</title>\r\n<link href="{#WEBROOT}assets/basic/css/styles.css" rel="stylesheet" type="text/css" />\r\n</head>\r\n\r\n<body>\r\n<div id="container">\r\n	<div id="header">\r\n    	<h1><span>Mobile Application Store - </span><strong>{#HEADING}</strong></h1>\r\n    </div>\r\n	<div id="page">\r\n    	{#CONTENT}\r\n        {#TEMP_additional-tmplate}\r\n    </div>\r\n	<div id="footer">\r\n    \r\n    </div>\r\n</div>\r\n</body>\r\n</html>\r\n', '...'),
(4, 22, 1, '2012-09-26 13:58:12', 'Head', 'head', 0, 0, 1, 0, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\r\n<title>{#TITLE} - Mobile Application Store - Fuerte International</title>\r\n<link href="assets/basic/css/styles.css" rel="stylesheet" type="text/css" />\r\n<meta name="keywords" content="{#KEYWORDS}" />\r\n<meta name="description" content="{#KEYWORDS}" />\r\n<script type="text/javascript">\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([''_setAccount'', ''UA-515522-56'']);\r\n  _gaq.push([''_trackPageview'']);\r\n\r\n  (function() {\r\n    var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;\r\n    ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';\r\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n</script>\r\n{#HEAD}\r\n</head>', '...'),
(5, 23, 1, '2012-09-26 14:01:22', 'Login template', 'login-template', 1, 0, 1, 0, '', '...'),
(6, 23, 2, '2012-09-26 14:02:00', 'Login template', 'login-template', 1, 0, 1, 0, '{#TEMP_head}\r\n{#MOD_users_login_page-login}', '...'),
(7, 20, 9, '2012-09-26 14:08:07', 'Main template', 'main-template', 1, 0, 1, 3, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#TEMP_header}\r\n    <div id="page">\r\n    	{#MOD_configuration_errors_errors}\r\n        {#CONTENT}\r\n    </div>\r\n    {#TEMP_footer}\r\n</div>\r\n</body>\r\n</html>\r\n', '...'),
(8, 22, 2, '2012-09-26 14:08:14', 'Head', 'head', 0, 0, 1, 0, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />\r\n<title>{#TITLE} - Mobile Application Store - Fuerte International</title>\r\n<link href="{#WEBROOT}assets/basic/css/styles.css" rel="stylesheet" type="text/css" />\r\n<meta name="keywords" content="{#KEYWORDS}" />\r\n<meta name="description" content="{#KEYWORDS}" />\r\n<script type="text/javascript">\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([''_setAccount'', ''UA-515522-56'']);\r\n  _gaq.push([''_trackPageview'']);\r\n\r\n  (function() {\r\n    var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;\r\n    ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';\r\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n</script>\r\n{#HEAD}\r\n</head>', '...'),
(9, 24, 1, '2012-09-26 14:08:34', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li><a href="#" title="Dashboard">Dashboard</a></li>\r\n        <li class="active"><a href="#" title="Apps">Apps</a></li>\r\n        <!--<li><a href="#" title="Users">Users</a></li>\r\n        <li><a href="#" title="Groups">Groups</a></li>-->\r\n    </ul>\r\n    <p>Ondrej Rafaj&nbsp;&nbsp;|&nbsp;&nbsp;<a href="login.html" title="Logout from AppStore">Logout</a></p>\r\n</div>', '...'),
(10, 20, 10, '2012-09-26 14:09:31', 'Main template', 'main-template', 1, 0, 1, 3, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#TEMP_header}\r\n    <div id="page">\r\n    	{#MOD_configuration_errors_errors}\r\n        {#CONTENT}\r\n        <div class="clear"></div>\r\n    </div>\r\n    {#TEMP_footer}\r\n</div>\r\n</body>\r\n</html>\r\n', '...'),
(11, 25, 1, '2012-09-26 14:09:45', 'Footer', 'footer', 0, 0, 1, 0, '<div id="footer">\r\n\r\n</div>\r\n', '...'),
(12, 20, 11, '2012-09-27 10:48:44', 'Main template', 'main-template', 1, 0, 1, 3, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#TEMP_header}\r\n    <div id="page">\r\n    	{#MOD_configuration_errors_main}\r\n        {#CONTENT}\r\n        <div class="clear"></div>\r\n    </div>\r\n    {#TEMP_footer}\r\n</div>\r\n</body>\r\n</html>', '...'),
(13, 23, 3, '2012-09-27 10:49:53', 'Login template', 'login-template', 1, 0, 1, 0, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#MOD_configuration_errors_main}\r\n	{#MOD_users_login_page-login}\r\n</div>\r\n</body>\r\n</html>', '...'),
(14, 24, 2, '2012-09-27 12:26:03', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <!--<li><a href="#" title="Dashboard">Dashboard</a></li>-->\r\n        <li class="active"><a href="#" title="Apps">Apps</a></li>\r\n        <!--<li><a href="#" title="Users">Users</a></li>\r\n        <li><a href="#" title="Groups">Groups</a></li>-->\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>\r\n', '...'),
(15, 23, 4, '2012-09-27 12:31:59', 'Login template', 'login-template', 1, 0, 1, 0, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#MOD_configuration_errors_login}\r\n	{#MOD_users_login_page-login}\r\n</div>\r\n</body>\r\n</html>', '...'),
(16, 20, 12, '2012-09-27 12:33:01', 'Main template', 'main-template', 1, 0, 1, 3, '{#TEMP_head}\r\n<body>\r\n<div id="container">\r\n	<div id="topLine"></div>\r\n    {#TEMP_header}\r\n    <div id="page">\r\n    	{#MOD_configuration_errors_main}\r\n        {#CONTENT}\r\n        <div class="clear"></div>\r\n    </div>\r\n    {#TEMP_footer}\r\n</div>\r\n</body>\r\n</html>', '...'),
(17, 24, 3, '2012-09-27 12:45:47', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <!--<li><a href="#" title="Dashboard">Dashboard</a></li>-->\r\n        <li class="active"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <!--<li><a href="#" title="Users">Users</a></li>\r\n        <li><a href="#" title="Groups">Groups</a></li>-->\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>\r\n', '...'),
(18, 26, 1, '2012-09-27 13:38:43', 'App PLIST', 'app-plist', 1, 0, 1, 0, '{#FRONTEND_mobileapps_plist}', '...'),
(19, 24, 4, '2012-10-01 21:16:19', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li class="{#ACTIVE_3}"><a href="{#LINK_3}" title="Dashboard">Dashboard</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <!--<li class="{#ACTIVE_2}"><a href="#" title="Users">Users</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="#" title="Groups">Groups</a></li>-->\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>', '...'),
(20, 24, 5, '2012-10-01 21:18:58', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li class="{#ACTIVE_4}"><a href="{#LINK_3}" title="Dashboard">Dashboard</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <!--<li class="{#ACTIVE_2}"><a href="#" title="Users">Users</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="#" title="Groups">Groups</a></li>-->\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>', '...'),
(21, 24, 6, '2012-10-01 21:24:55', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li class="{#ACTIVE_4}"><a href="{#LINK_4}" title="Dashboard">Dashboard</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <!--<li class="{#ACTIVE_2}"><a href="#" title="Users">Users</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="#" title="Groups">Groups</a></li>-->\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>', '...'),
(22, 24, 7, '2012-10-01 21:29:06', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li class="{#ACTIVE_4}"><a href="{#LINK_4}" title="Dashboard">Dashboard</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <li class="{#ACTIVE_5}"><a href="{#LINK_5}" title="Users">Users</a></li>\r\n        <li class="{#ACTIVE_6}"><a href="{#LINK_6}" title="Groups">Groups</a></li>\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>', '...'),
(23, 24, 8, '2012-10-02 15:14:40', 'Header', 'header', 0, 0, 1, 0, '<div id="header">\r\n    <h1><span>Fuerte International - {#H1}</span></h1>\r\n    <ul>\r\n        <li class="{#ACTIVE_4}"><a href="{#LINK_4}" title="Dashboard">Dashboard</a></li>\r\n        <li class="{#ACTIVE_2}"><a href="{#LINK_2}" title="Apps">Apps</a></li>\r\n        <li class="{#ACTIVE_6}"><a href="{#LINK_6}" title="Users">Users</a></li>\r\n        <li class="{#ACTIVE_5}"><a href="{#LINK_5}" title="Groups">Groups</a></li>\r\n    </ul>\r\n    {#MOD_users_login_login-line}\r\n</div>', '...');

-- --------------------------------------------------------

--
-- Table structure for table `payments_categories`
--

CREATE TABLE IF NOT EXISTS `payments_categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(8) unsigned NOT NULL,
  `head` text NOT NULL,
  `description` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payments_categories`
--

INSERT INTO `payments_categories` (`id`, `name`, `parent`, `head`, `description`, `added`, `changed`) VALUES
(1, 'Hosting', 0, 'hot head', 'host text', '2009-03-02 11:51:07', '2009-03-02 11:57:49'),
(2, 'Free hosting', 1, ':-)', '', '2009-03-02 11:59:24', '2009-03-02 12:04:13'),
(3, 'Clients hosting', 0, '', '', '2009-03-02 12:06:57', '2009-03-02 12:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments_costs`
--

CREATE TABLE IF NOT EXISTS `payments_costs` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `costs` int(6) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payments_costs`
--

INSERT INTO `payments_costs` (`id`, `name`, `description`, `costs`, `added`, `changed`) VALUES
(1, 'Server', '', 5333, '2009-03-02 13:51:25', '2009-03-02 13:51:25'),
(2, 'WebGuru3.com Hosting', '', 105, '2009-03-02 13:52:02', '2009-03-02 13:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments_customers`
--

CREATE TABLE IF NOT EXISTS `payments_customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL,
  `payments_services_id` int(8) unsigned DEFAULT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `paid_until` datetime NOT NULL,
  `credit` int(6) unsigned NOT NULL,
  `reminders` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_payments_customers_users` (`users_id`),
  KEY `FK_payments_customers_SERVIS` (`payments_services_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payments_customers`
--

INSERT INTO `payments_customers` (`id`, `users_id`, `payments_services_id`, `added`, `changed`, `paid_until`, `credit`, `reminders`, `note`) VALUES
(1, 1, 1, '2009-03-02 14:54:37', '2009-03-02 14:54:37', '2009-03-02 14:54:00', 0, 1, ''),
(2, 1, 1, '2009-03-02 14:55:57', '2009-03-02 15:00:00', '2009-03-03 14:57:00', 0, 1, ''),
(3, 1, 1, '2009-03-02 15:04:31', '2009-03-02 15:04:31', '2009-03-03 15:02:00', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments_fundings`
--

CREATE TABLE IF NOT EXISTS `payments_fundings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `payments_services_id` int(8) unsigned NOT NULL,
  `percent` int(3) NOT NULL DEFAULT '100',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payments_fundings`
--

INSERT INTO `payments_fundings` (`id`, `payments_services_id`, `percent`, `added`, `changed`) VALUES
(1, 1, 80, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments_payments`
--

CREATE TABLE IF NOT EXISTS `payments_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `ammount` int(6) unsigned NOT NULL,
  `users_id` int(11) unsigned NOT NULL,
  `payments_services_id` int(8) unsigned NOT NULL,
  `system_users_id` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_payments_payments_users` (`users_id`),
  KEY `FK_payments_payments_services` (`payments_services_id`),
  KEY `admin_users_id` (`system_users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payments_payments`
--

INSERT INTO `payments_payments` (`id`, `added`, `changed`, `ammount`, `users_id`, `payments_services_id`, `system_users_id`) VALUES
(1, '2009-03-02 13:36:53', '2009-03-02 13:36:53', 20, 1, 1, 0),
(2, '2009-03-02 13:37:01', '2009-03-02 13:37:01', 50, 1, 1, 0),
(3, '2009-03-02 14:34:21', '2009-03-02 14:34:21', 800, 1, 1, 0),
(4, '2009-03-02 14:34:27', '2009-03-02 14:34:27', 900, 1, 1, 0),
(5, '2009-03-02 14:34:31', '2009-03-02 14:34:31', 485, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments_permissions`
--

CREATE TABLE IF NOT EXISTS `payments_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_users_id` int(8) unsigned NOT NULL,
  `payments_services_id` int(8) unsigned NOT NULL,
  `permission` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_payments_permissions_user` (`system_users_id`),
  KEY `FK_payments_permissions_servis` (`payments_services_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments_services`
--

CREATE TABLE IF NOT EXISTS `payments_services` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `payments_categories_id` int(8) unsigned NOT NULL,
  `price` varchar(6) NOT NULL,
  `head` text NOT NULL,
  `description` text NOT NULL,
  `period` int(3) NOT NULL DEFAULT '2',
  `minperiods` int(6) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payments_services`
--

INSERT INTO `payments_services` (`id`, `name`, `payments_categories_id`, `price`, `head`, `description`, `period`, `minperiods`, `added`, `changed`, `system_users_id`) VALUES
(1, 'Basic', 1, '60', '', '', 2, 6, '2009-03-02 12:15:48', '2009-03-02 12:18:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_categories`
--

CREATE TABLE IF NOT EXISTS `projects_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `system_language_id` int(3) unsigned DEFAULT NULL,
  `system_websites_id` int(4) unsigned DEFAULT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `head` text NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `system_language_id` (`system_language_id`),
  KEY `system_websites_id` (`system_websites_id`),
  KEY `parent` (`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects_details`
--

CREATE TABLE IF NOT EXISTS `projects_details` (
  `id_pd` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name_pd` varchar(255) NOT NULL,
  `identifier_pd` varchar(255) NOT NULL,
  `dateformat_pd` varchar(50) NOT NULL,
  `images_pd` tinyint(1) NOT NULL DEFAULT '1',
  `imgsize_pd` varchar(10) NOT NULL,
  `temp_pd` text NOT NULL,
  `istart_pd` text NOT NULL,
  `iitem_pd` text NOT NULL,
  `iend_pd` text NOT NULL,
  PRIMARY KEY (`id_pd`),
  KEY `identifier_pd` (`identifier_pd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects_images`
--

CREATE TABLE IF NOT EXISTS `projects_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `smallid` bigint(20) NOT NULL,
  `projects_items_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mdescription` text NOT NULL,
  `mkeywords` text NOT NULL,
  `h2` varchar(255) NOT NULL,
  `h3` varchar(255) NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text NOT NULL,
  `text4` text NOT NULL,
  `views` bigint(20) NOT NULL,
  `downloads` bigint(20) NOT NULL,
  `size` int(11) NOT NULL,
  `itemtype` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `variable1` varchar(255) NOT NULL,
  `variable2` varchar(255) NOT NULL,
  `variable3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `smallid` (`smallid`),
  KEY `itemtype` (`itemtype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects_images_details`
--

CREATE TABLE IF NOT EXISTS `projects_images_details` (
  `id_pid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name_pid` varchar(255) NOT NULL,
  `identifier_pid` varchar(255) NOT NULL,
  `image_pid` varchar(50) NOT NULL DEFAULT 'medium',
  `temp_pid` text NOT NULL,
  PRIMARY KEY (`id_pid`),
  KEY `identifier_pid` (`identifier_pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects_images_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects_items`
--

CREATE TABLE IF NOT EXISTS `projects_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `projects_categories_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `h1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mkeywords` text NOT NULL,
  `mdescription` text NOT NULL,
  `h2` varchar(255) NOT NULL,
  `h3` varchar(255) NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text NOT NULL,
  `text4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `projects_items`
--

INSERT INTO `projects_items` (`id`, `projects_categories_id`, `name`, `identifier`, `client`, `link`, `info`, `views`, `date`, `added`, `changed`, `h1`, `title`, `mkeywords`, `mdescription`, `h2`, `h3`, `text1`, `text2`, `text3`, `text4`) VALUES
(1, 0, 'iBBClone - Live web stats in your palm', 'ibbclone-live-web-stats-in-your-palm', 'Ondrej Rafaj', 'http://www.xprogress.com/iBBClone/', '', 0, '2010-02-20 19:23:00', '2010-02-20 20:24:20', '2010-02-20 21:22:50', '', '', '', '', '', '', '', '', '', ''),
(2, 0, 'ChrisAndPhil.com - Personal portfolio', 'chrisandphil-com-personal-portfolio', 'Chris and Phil', 'http://www.chrisandphil.com/', '', 0, '2010-02-20 19:36:00', '2010-02-20 20:38:01', '2010-02-20 21:23:14', '', '', '', '', '', '', '', '', '', ''),
(3, 0, '3M NATO - stock numbers catalogue', '3m-nato-stock-numbers', '3M - FiftyFootSquid', 'http://work.stage-fiftyfootsquid.com/nato/', '', 0, '2010-02-20 19:47:00', '2010-02-20 20:50:19', '2010-02-20 21:20:10', '', '', '', '', '', '', '', '', '', ''),
(4, 0, 'FlyingChef - London catering company', 'flyingchef-london-catering-company', 'Crown Group', 'http://www.flyingchef.co.uk/', '', 0, '2010-02-20 19:50:00', '2010-02-20 20:51:25', '2010-02-20 21:23:01', '', '', '', '', '', '', '', '', '', ''),
(5, 0, 'iDeviant - your daily aamount of art', 'ideviant-your-daily-aamount-of-art', 'Ondrej Rafaj', 'http://www.xprogress.com/post-49-ideviant-your-daily-amount-of-art-and-photography-for-your-iphone/', '', 0, '2010-02-20 19:51:00', '2010-02-20 20:52:43', '2010-02-20 20:52:43', '', '', '', '', '', '', '', '', '', ''),
(6, 0, 'iMessages - forms handling API', 'imessages-forms-handling-api', 'xProgress.com', 'http://www.xprogress.com/ideveloper-tools/', '', 0, '2010-02-20 19:52:00', '2010-02-20 20:53:36', '2010-02-20 20:53:36', '', '', '', '', '', '', '', '', '', ''),
(7, 0, 'Jobs2Go - waiting staff recruitment', 'jobs2go-waiting-staff-recruitment', 'Crown Group', 'http://www.jobs-2-go.co.uk/', '', 0, '2010-02-20 19:53:00', '2010-02-20 20:54:33', '2010-02-20 20:54:46', '', '', '', '', '', '', '', '', '', ''),
(8, 0, 'LeisureXtra - catering solutions to the leisure industry', 'leisurextra-catering-solutions-to-the-leisure-industry', 'Crown Group', 'http://www.leisurextra.co.uk/', '', 0, '2010-02-20 19:54:00', '2010-02-20 21:11:03', '2010-02-20 21:11:03', '', '', '', '', '', '', '', '', '', ''),
(9, 0, 'Neoluxor.cz - Unique book store', 'neoluxor-cz-unique-book-store', 'Nantuko.cz', 'http://www.neoluxor.cz/', '', 0, '2010-02-20 20:11:00', '2010-02-20 21:12:13', '2010-02-20 21:12:13', '', '', '', '', '', '', '', '', '', ''),
(10, 0, 'OmniForce.co.uk - WebDesign Studio', 'omniforce-co-uk-webdesign-studio', 'Crown Group', 'http://www.omniforce.co.uk/', '', 0, '2010-02-20 20:16:00', '2010-02-20 21:18:44', '2010-02-20 21:18:44', '', '', '', '', '', '', '', '', '', ''),
(11, 0, 'VenueReservations.co.uk', 'venuereservations-co-uk', 'Crown Group', 'http://www.venuereservations.co.uk/', '', 0, '2010-02-20 20:23:00', '2010-02-20 21:26:32', '2010-02-20 21:26:32', '', '', '', '', '', '', '', '', '', ''),
(12, 0, 'WebGuru3 - Framework CMS', 'webguru3-framework-cms', 'Ondrej Rafaj', '#', '', 0, '2010-02-20 20:28:00', '2010-02-20 21:30:11', '2010-02-20 21:51:48', '', '', '', '', '', '', '', '', '', ''),
(13, 0, 'MUSE', 'muse', 'Warner Music - FiftyFootSquid', 'http://muse.mu/', '', 0, '2010-02-20 20:30:00', '2010-02-20 21:50:31', '2010-02-20 21:50:31', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects_listings`
--

CREATE TABLE IF NOT EXISTS `projects_listings` (
  `id_pl` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `pc_id_pl` int(8) NOT NULL,
  `name_pl` varchar(255) NOT NULL,
  `identifier_pl` varchar(255) NOT NULL,
  `dateformat_pl` varchar(50) NOT NULL,
  `perpage_pl` int(4) NOT NULL,
  `link_pl` varchar(255) NOT NULL,
  `image_pl` varchar(10) NOT NULL,
  `begin_pl` text NOT NULL,
  `clstart_pl` text NOT NULL,
  `item_pl` text NOT NULL,
  `clend_pl` text NOT NULL,
  `end_pl` text NOT NULL,
  PRIMARY KEY (`id_pl`),
  KEY `pc_id_pl` (`pc_id_pl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects_listings`
--


-- --------------------------------------------------------

--
-- Table structure for table `projects_templates`
--

CREATE TABLE IF NOT EXISTS `projects_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `pager` tinyint(1) NOT NULL DEFAULT '1',
  `perpage` int(4) NOT NULL,
  `search` tinyint(1) NOT NULL DEFAULT '0',
  `variable1` varchar(50) NOT NULL,
  `variable2` varchar(50) NOT NULL,
  `dateformat` varchar(100) NOT NULL,
  `linkformat` varchar(255) NOT NULL,
  `seo` tinyint(1) NOT NULL DEFAULT '1',
  `datasource` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `projects_categories_id` int(11) unsigned NOT NULL,
  `sorting` varchar(255) NOT NULL,
  `tbegin` text NOT NULL,
  `titem1` text NOT NULL,
  `titem2` text NOT NULL,
  `titem3` text NOT NULL,
  `titem4` text NOT NULL,
  `titem5` text NOT NULL,
  `tend` text NOT NULL,
  `tnoitem` text NOT NULL,
  `temptype` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `temptype` (`temptype`),
  KEY `projects_categories_id` (`projects_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projects_templates`
--

INSERT INTO `projects_templates` (`id`, `name`, `identifier`, `pager`, `perpage`, `search`, `variable1`, `variable2`, `dateformat`, `linkformat`, `seo`, `datasource`, `projects_categories_id`, `sorting`, `tbegin`, `titem1`, `titem2`, `titem3`, `titem4`, `titem5`, `tend`, `tnoitem`, `temptype`) VALUES
(1, 'main', 'main', 0, 500, 0, 'cat', 'search', 'Y-m-d', '', 0, 0, 0, '`date` ASC', '<div class="posts">', '<div class="post">\r\n    <h2><a href="{#WEBROOT}orp-{%Id}-{%Identifier}/">{%Name}</a></h2>\r\n    <p class="postart"><a href="{#WEBROOT}orp-{%Id}-{%Identifier}/""><img src="{%MainImageMedium}" alt="{%Name}" /></a></p>\r\n    <p class="bottom">\r\n        <a href="#top" class="top"><span>Back to top</span></a>\r\n        <a href="{#WEBROOT}orp-{%Id}-{%Identifier}/" class="more" title="Read more about {%Name}"><span>Read more ...</span></a>\r\n    </p>\r\n</div>\r\n', '', '', '', '', '</div><!--\r\n<div class="pager">\r\n    {%PAGER}\r\n</div>-->', '<div>\r\n	<p>There is no project in this category</p>\r\n</div>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_points`
--

CREATE TABLE IF NOT EXISTS `rating_points` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `added` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `var_id` bigint(20) NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`,`var_id`),
  KEY `value` (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rating_points`
--


-- --------------------------------------------------------

--
-- Table structure for table `rating_points_groups`
--

CREATE TABLE IF NOT EXISTS `rating_points_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `variable` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rating_points_groups`
--

INSERT INTO `rating_points_groups` (`id`, `name`, `variable`, `type`, `note`) VALUES
(1, 'Test group', 'var', 0, 'note');

-- --------------------------------------------------------

--
-- Table structure for table `rssreader_templates`
--

CREATE TABLE IF NOT EXISTS `rssreader_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) NOT NULL DEFAULT '0',
  `rssreader_urls` int(11) NOT NULL,
  `limit` int(6) NOT NULL,
  `ascending` tinyint(1) NOT NULL DEFAULT '2',
  `cache` tinyint(1) NOT NULL DEFAULT '1',
  `tbegin` text NOT NULL,
  `tdetail` text NOT NULL,
  `tend` text NOT NULL,
  `tnoitem` text NOT NULL,
  `system_websites_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temptype` (`temptype`,`system_websites_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rssreader_templates`
--


-- --------------------------------------------------------

--
-- Table structure for table `rssreader_urls`
--

CREATE TABLE IF NOT EXISTS `rssreader_urls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `system_websites_id` int(4) unsigned NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `system_websites_id` (`system_websites_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rssreader_urls`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_actualizations`
--

CREATE TABLE IF NOT EXISTS `system_actualizations` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `string` text NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fulltext` (`string`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_actualizations`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_addons`
--

CREATE TABLE IF NOT EXISTS `system_addons` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_addons`
--

INSERT INTO `system_addons` (`id`, `name`) VALUES
(1, 'aaaaaa'),
(2, 'bbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `system_codebackups`
--

CREATE TABLE IF NOT EXISTS `system_codebackups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `code` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_codebackups`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_countries`
--

CREATE TABLE IF NOT EXISTS `system_countries` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `iso1` char(2) NOT NULL,
  `iso2` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `COUNTRIES_NAME` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `system_countries`
--

INSERT INTO `system_countries` (`id`, `name`, `iso1`, `iso2`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Albania', 'AL', 'ALB'),
(3, 'Algeria', 'DZ', 'DZA'),
(4, 'American Samoa', 'AS', 'ASM'),
(5, 'Andorra', 'AD', 'AND'),
(6, 'Angola', 'AO', 'AGO'),
(7, 'Anguilla', 'AI', 'AIA'),
(8, 'Antarctica', 'AQ', 'ATA'),
(9, 'Antigua and Barbuda', 'AG', 'ATG'),
(10, 'Argentina', 'AR', 'ARG'),
(11, 'Armenia', 'AM', 'ARM'),
(12, 'Aruba', 'AW', 'ABW'),
(13, 'Australia', 'AU', 'AUS'),
(14, 'Austria', 'AT', 'AUT'),
(15, 'Azerbaijan', 'AZ', 'AZE'),
(16, 'Bahamas', 'BS', 'BHS'),
(17, 'Bahrain', 'BH', 'BHR'),
(18, 'Bangladesh', 'BD', 'BGD'),
(19, 'Barbados', 'BB', 'BRB'),
(20, 'Belarus', 'BY', 'BLR'),
(21, 'Belgium', 'BE', 'BEL'),
(22, 'Belize', 'BZ', 'BLZ'),
(23, 'Benin', 'BJ', 'BEN'),
(24, 'Bermuda', 'BM', 'BMU'),
(25, 'Bhutan', 'BT', 'BTN'),
(26, 'Bolivia', 'BO', 'BOL'),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH'),
(28, 'Botswana', 'BW', 'BWA'),
(29, 'Bouvet Island', 'BV', 'BVT'),
(30, 'Brazil', 'BR', 'BRA'),
(31, 'British Indian Ocean Territory', 'IO', 'IOT'),
(32, 'Brunei Darussalam', 'BN', 'BRN'),
(33, 'Bulgaria', 'BG', 'BGR'),
(34, 'Burkina Faso', 'BF', 'BFA'),
(35, 'Burundi', 'BI', 'BDI'),
(36, 'Cambodia', 'KH', 'KHM'),
(37, 'Cameroon', 'CM', 'CMR'),
(38, 'Canada', 'CA', 'CAN'),
(39, 'Cape Verde', 'CV', 'CPV'),
(40, 'Cayman Islands', 'KY', 'CYM'),
(41, 'Central African Republic', 'CF', 'CAF'),
(42, 'Chad', 'TD', 'TCD'),
(43, 'Chile', 'CL', 'CHL'),
(44, 'China', 'CN', 'CHN'),
(45, 'Christmas Island', 'CX', 'CXR'),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(47, 'Colombia', 'CO', 'COL'),
(48, 'Comoros', 'KM', 'COM'),
(49, 'Congo', 'CG', 'COG'),
(50, 'Cook Islands', 'CK', 'COK'),
(51, 'Costa Rica', 'CR', 'CRI'),
(52, 'Cote D''Ivoire', 'CI', 'CIV'),
(53, 'Croatia', 'HR', 'HRV'),
(54, 'Cuba', 'CU', 'CUB'),
(55, 'Cyprus', 'CY', 'CYP'),
(56, 'Czech Republic', 'CZ', 'CZE'),
(57, 'Denmark', 'DK', 'DNK'),
(58, 'Djibouti', 'DJ', 'DJI'),
(59, 'Dominica', 'DM', 'DMA'),
(60, 'Dominican Republic', 'DO', 'DOM'),
(61, 'East Timor', 'TP', 'TMP'),
(62, 'Ecuador', 'EC', 'ECU'),
(63, 'Egypt', 'EG', 'EGY'),
(64, 'El Salvador', 'SV', 'SLV'),
(65, 'Equatorial Guinea', 'GQ', 'GNQ'),
(66, 'Eritrea', 'ER', 'ERI'),
(67, 'Estonia', 'EE', 'EST'),
(68, 'Ethiopia', 'ET', 'ETH'),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(70, 'Faroe Islands', 'FO', 'FRO'),
(71, 'Fiji', 'FJ', 'FJI'),
(72, 'Finland', 'FI', 'FIN'),
(73, 'France', 'FR', 'FRA'),
(74, 'France, Metropolitan', 'FX', 'FXX'),
(75, 'French Guiana', 'GF', 'GUF'),
(76, 'French Polynesia', 'PF', 'PYF'),
(77, 'French Southern Territories', 'TF', 'ATF'),
(78, 'Gabon', 'GA', 'GAB'),
(79, 'Gambia', 'GM', 'GMB'),
(80, 'Georgia', 'GE', 'GEO'),
(81, 'Germany', 'DE', 'DEU'),
(82, 'Ghana', 'GH', 'GHA'),
(83, 'Gibraltar', 'GI', 'GIB'),
(84, 'Greece', 'GR', 'GRC'),
(85, 'Greenland', 'GL', 'GRL'),
(86, 'Grenada', 'GD', 'GRD'),
(87, 'Guadeloupe', 'GP', 'GLP'),
(88, 'Guam', 'GU', 'GUM'),
(89, 'Guatemala', 'GT', 'GTM'),
(90, 'Guinea', 'GN', 'GIN'),
(91, 'Guinea-bissau', 'GW', 'GNB'),
(92, 'Guyana', 'GY', 'GUY'),
(93, 'Haiti', 'HT', 'HTI'),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD'),
(95, 'Honduras', 'HN', 'HND'),
(96, 'Hong Kong', 'HK', 'HKG'),
(97, 'Hungary', 'HU', 'HUN'),
(98, 'Iceland', 'IS', 'ISL'),
(99, 'India', 'IN', 'IND'),
(100, 'Indonesia', 'ID', 'IDN'),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN'),
(102, 'Iraq', 'IQ', 'IRQ'),
(103, 'Ireland', 'IE', 'IRL'),
(104, 'Israel', 'IL', 'ISR'),
(105, 'Italy', 'IT', 'ITA'),
(106, 'Jamaica', 'JM', 'JAM'),
(107, 'Japan', 'JP', 'JPN'),
(108, 'Jordan', 'JO', 'JOR'),
(109, 'Kazakhstan', 'KZ', 'KAZ'),
(110, 'Kenya', 'KE', 'KEN'),
(111, 'Kiribati', 'KI', 'KIR'),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK'),
(113, 'Korea, Republic of', 'KR', 'KOR'),
(114, 'Kuwait', 'KW', 'KWT'),
(115, 'Kyrgyzstan', 'KG', 'KGZ'),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO'),
(117, 'Latvia', 'LV', 'LVA'),
(118, 'Lebanon', 'LB', 'LBN'),
(119, 'Lesotho', 'LS', 'LSO'),
(120, 'Liberia', 'LR', 'LBR'),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY'),
(122, 'Liechtenstein', 'LI', 'LIE'),
(123, 'Lithuania', 'LT', 'LTU'),
(124, 'Luxembourg', 'LU', 'LUX'),
(125, 'Macau', 'MO', 'MAC'),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD'),
(127, 'Madagascar', 'MG', 'MDG'),
(128, 'Malawi', 'MW', 'MWI'),
(129, 'Malaysia', 'MY', 'MYS'),
(130, 'Maldives', 'MV', 'MDV'),
(131, 'Mali', 'ML', 'MLI'),
(132, 'Malta', 'MT', 'MLT'),
(133, 'Marshall Islands', 'MH', 'MHL'),
(134, 'Martinique', 'MQ', 'MTQ'),
(135, 'Mauritania', 'MR', 'MRT'),
(136, 'Mauritius', 'MU', 'MUS'),
(137, 'Mayotte', 'YT', 'MYT'),
(138, 'Mexico', 'MX', 'MEX'),
(139, 'Micronesia, Federated States of', 'FM', 'FSM'),
(140, 'Moldova, Republic of', 'MD', 'MDA'),
(141, 'Monaco', 'MC', 'MCO'),
(142, 'Mongolia', 'MN', 'MNG'),
(143, 'Montserrat', 'MS', 'MSR'),
(144, 'Morocco', 'MA', 'MAR'),
(145, 'Mozambique', 'MZ', 'MOZ'),
(146, 'Myanmar', 'MM', 'MMR'),
(147, 'Namibia', 'NA', 'NAM'),
(148, 'Nauru', 'NR', 'NRU'),
(149, 'Nepal', 'NP', 'NPL'),
(150, 'Netherlands', 'NL', 'NLD'),
(151, 'Netherlands Antilles', 'AN', 'ANT'),
(152, 'New Caledonia', 'NC', 'NCL'),
(153, 'New Zealand', 'NZ', 'NZL'),
(154, 'Nicaragua', 'NI', 'NIC'),
(155, 'Niger', 'NE', 'NER'),
(156, 'Nigeria', 'NG', 'NGA'),
(157, 'Niue', 'NU', 'NIU'),
(158, 'Norfolk Island', 'NF', 'NFK'),
(159, 'Northern Mariana Islands', 'MP', 'MNP'),
(160, 'Norway', 'NO', 'NOR'),
(161, 'Oman', 'OM', 'OMN'),
(162, 'Pakistan', 'PK', 'PAK'),
(163, 'Palau', 'PW', 'PLW'),
(164, 'Panama', 'PA', 'PAN'),
(165, 'Papua New Guinea', 'PG', 'PNG'),
(166, 'Paraguay', 'PY', 'PRY'),
(167, 'Peru', 'PE', 'PER'),
(168, 'Philippines', 'PH', 'PHL'),
(169, 'Pitcairn', 'PN', 'PCN'),
(170, 'Poland', 'PL', 'POL'),
(171, 'Portugal', 'PT', 'PRT'),
(172, 'Puerto Rico', 'PR', 'PRI'),
(173, 'Qatar', 'QA', 'QAT'),
(174, 'Reunion', 'RE', 'REU'),
(175, 'Romania', 'RO', 'ROM'),
(176, 'Russian Federation', 'RU', 'RUS'),
(177, 'Rwanda', 'RW', 'RWA'),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(179, 'Saint Lucia', 'LC', 'LCA'),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT'),
(181, 'Samoa', 'WS', 'WSM'),
(182, 'San Marino', 'SM', 'SMR'),
(183, 'Sao Tome and Principe', 'ST', 'STP'),
(184, 'Saudi Arabia', 'SA', 'SAU'),
(185, 'Senegal', 'SN', 'SEN'),
(186, 'Seychelles', 'SC', 'SYC'),
(187, 'Sierra Leone', 'SL', 'SLE'),
(188, 'Singapore', 'SG', 'SGP'),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK'),
(190, 'Slovenia', 'SI', 'SVN'),
(191, 'Solomon Islands', 'SB', 'SLB'),
(192, 'Somalia', 'SO', 'SOM'),
(193, 'South Africa', 'ZA', 'ZAF'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
(195, 'Spain', 'ES', 'ESP'),
(196, 'Sri Lanka', 'LK', 'LKA'),
(197, 'St. Helena', 'SH', 'SHN'),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM'),
(199, 'Sudan', 'SD', 'SDN'),
(200, 'Suriname', 'SR', 'SUR'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM'),
(202, 'Swaziland', 'SZ', 'SWZ'),
(203, 'Sweden', 'SE', 'SWE'),
(204, 'Switzerland', 'CH', 'CHE'),
(205, 'Syrian Arab Republic', 'SY', 'SYR'),
(206, 'Taiwan', 'TW', 'TWN'),
(207, 'Tajikistan', 'TJ', 'TJK'),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA'),
(209, 'Thailand', 'TH', 'THA'),
(210, 'Togo', 'TG', 'TGO'),
(211, 'Tokelau', 'TK', 'TKL'),
(212, 'Tonga', 'TO', 'TON'),
(213, 'Trinidad and Tobago', 'TT', 'TTO'),
(214, 'Tunisia', 'TN', 'TUN'),
(215, 'Turkey', 'TR', 'TUR'),
(216, 'Turkmenistan', 'TM', 'TKM'),
(217, 'Turks and Caicos Islands', 'TC', 'TCA'),
(218, 'Tuvalu', 'TV', 'TUV'),
(219, 'Uganda', 'UG', 'UGA'),
(220, 'Ukraine', 'UA', 'UKR'),
(221, 'United Arab Emirates', 'AE', 'ARE'),
(222, 'United Kingdom', 'GB', 'GBR'),
(223, 'United States', 'US', 'USA'),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI'),
(225, 'Uruguay', 'UY', 'URY'),
(226, 'Uzbekistan', 'UZ', 'UZB'),
(227, 'Vanuatu', 'VU', 'VUT'),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT'),
(229, 'Venezuela', 'VE', 'VEN'),
(230, 'Viet Nam', 'VN', 'VNM'),
(231, 'Virgin Islands (British)', 'VG', 'VGB'),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR'),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF'),
(234, 'Western Sahara', 'EH', 'ESH'),
(235, 'Yemen', 'YE', 'YEM'),
(236, 'Yugoslavia', 'YU', 'YUG'),
(237, 'Zaire', 'ZR', 'ZAR'),
(238, 'Zambia', 'ZM', 'ZMB'),
(239, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `system_encoding`
--

CREATE TABLE IF NOT EXISTS `system_encoding` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(40) NOT NULL,
  `num` int(8) NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `code` (`code`,`num`,`show`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `system_encoding`
--

INSERT INTO `system_encoding` (`id`, `name`, `code`, `num`, `show`, `default`) VALUES
(1, 'IBM EBCDIC (US-Canada)', 'IBM037', 37, 1, 0),
(2, 'OEM United States', 'IBM437', 437, 1, 0),
(3, 'IBM EBCDIC (International)', 'IBM500', 500, 1, 0),
(4, 'Arabic (ASMO 708)', 'ASMO-708', 708, 1, 0),
(5, 'Arabic (DOS)', 'DOS-720', 720, 1, 0),
(6, 'Greek (DOS)', 'ibm737', 737, 1, 0),
(7, 'Baltic (DOS)', 'ibm775', 775, 1, 0),
(8, 'Western European (DOS)', 'ibm850', 850, 1, 0),
(9, 'Central European (DOS)', 'ibm852', 852, 1, 0),
(10, 'OEM Cyrillic', 'IBM855', 855, 1, 0),
(11, 'Turkish (DOS)', 'ibm857', 857, 1, 0),
(12, 'OEM Multilingual Latin I', 'IBM00858', 858, 1, 0),
(13, 'Portuguese (DOS)', 'IBM860', 860, 1, 0),
(14, 'Icelandic (DOS)', 'ibm861', 861, 1, 0),
(15, 'Hebrew (DOS)', 'DOS-862', 862, 1, 0),
(16, 'French Canadian (DOS)', 'IBM863', 863, 1, 0),
(17, 'Arabic (864)', 'IBM864', 864, 1, 0),
(18, 'Nordic (DOS)', 'IBM865', 865, 1, 0),
(19, 'Cyrillic (DOS)', 'cp866', 866, 1, 0),
(20, 'Greek, Modern (DOS)', 'ibm869', 869, 1, 0),
(21, 'IBM EBCDIC (Multilingual Latin-2)', 'IBM870', 870, 1, 0),
(22, 'Thai (Windows)', 'windows-874', 874, 1, 0),
(23, 'IBM EBCDIC (Greek Modern)', 'cp875', 875, 1, 0),
(24, 'Japanese (Shift-JIS)', 'shift_jis', 932, 1, 0),
(25, 'Chinese Simplified (GB2312)', 'gb2312', 936, 1, 0),
(26, 'Korean', 'ks_c_5601-1987', 949, 1, 0),
(27, 'Chinese Traditional (Big5)', 'big5', 950, 1, 0),
(28, 'IBM EBCDIC (Turkish Latin-5)', 'IBM1026', 1026, 1, 0),
(29, 'IBM Latin-1', 'IBM01047', 1047, 1, 0),
(30, 'IBM EBCDIC (US-Canada-Euro)', 'IBM01140', 1140, 1, 0),
(31, 'IBM EBCDIC (Germany-Euro)', 'IBM01141', 1141, 1, 0),
(32, 'IBM EBCDIC (Denmark-Norway-Euro)', 'IBM01142', 1142, 1, 0),
(33, 'IBM EBCDIC (Finland-Sweden-Euro)', 'IBM01143', 1143, 1, 0),
(34, 'IBM EBCDIC (Italy-Euro)', 'IBM01144', 1144, 1, 0),
(35, 'IBM EBCDIC (Spain-Euro)', 'IBM01145', 1145, 1, 0),
(36, 'IBM EBCDIC (UK-Euro)', 'IBM01146', 1146, 1, 0),
(37, 'IBM EBCDIC (France-Euro)', 'IBM01147', 1147, 1, 0),
(38, 'IBM EBCDIC (International-Euro)', 'IBM01148', 1148, 1, 0),
(39, 'IBM EBCDIC (Icelandic-Euro)', 'IBM01149', 1149, 1, 0),
(40, 'Unicode', 'utf-16', 1200, 1, 0),
(41, 'Unicode (Big-Endian)', 'unicodeFFFE', 1201, 1, 0),
(42, 'Central European (Windows)', 'windows-1250', 1250, 1, 0),
(43, 'Cyrillic (Windows)', 'windows-1251', 1251, 1, 0),
(44, 'Western European (Windows)', 'Windows-1252', 1252, 1, 0),
(45, 'Greek (Windows)', 'windows-1253', 1253, 1, 0),
(46, 'Turkish (Windows)', 'windows-1254', 1254, 1, 0),
(47, 'Hebrew (Windows)', 'windows-1255', 1255, 1, 0),
(48, 'Arabic (Windows)', 'windows-1256', 1256, 1, 0),
(49, 'Baltic (Windows)', 'windows-1257', 1257, 1, 0),
(50, 'Vietnamese (Windows)', 'windows-1258', 1258, 1, 0),
(51, 'Korean (Johab)', 'Johab', 1361, 1, 0),
(52, 'Western European (Mac)', 'macintosh', 10000, 1, 0),
(53, 'Japanese (Mac)', 'x-mac-japanese', 10001, 1, 0),
(54, 'Chinese Traditional (Mac)', 'x-mac-chinesetrad', 10002, 1, 0),
(55, 'Korean (Mac)', 'x-mac-korean', 10003, 1, 0),
(56, 'Arabic (Mac)', 'x-mac-arabic', 10004, 1, 0),
(57, 'Hebrew (Mac)', 'x-mac-hebrew', 10005, 1, 0),
(58, 'Greek (Mac)', 'x-mac-greek', 10006, 1, 0),
(59, 'Cyrillic (Mac)', 'x-mac-cyrillic', 10007, 1, 0),
(60, 'Chinese Simplified (Mac)', 'x-mac-chinesesimp', 10008, 1, 0),
(61, 'Romanian (Mac)', 'x-mac-romanian', 10010, 1, 0),
(62, 'Ukrainian (Mac)', 'x-mac-ukrainian', 10017, 1, 0),
(63, 'Thai (Mac)', 'x-mac-thai', 10021, 1, 0),
(64, 'Central European (Mac)', 'x-mac-ce', 10029, 1, 0),
(65, 'Icelandic (Mac)', 'x-mac-icelandic', 10079, 1, 0),
(66, 'Turkish (Mac)', 'x-mac-turkish', 10081, 1, 0),
(67, 'Croatian (Mac)', 'x-mac-croatian', 10082, 1, 0),
(68, 'Unicode (UTF-32)', 'utf-32', 12000, 1, 0),
(69, 'Unicode (UTF-32 Big-Endian)', 'utf-32BE', 12001, 1, 0),
(70, 'Chinese Traditional (CNS)', 'x-Chinese-CNS', 20000, 1, 0),
(71, 'TCA Taiwan', 'x-cp20001', 20001, 1, 0),
(72, 'Chinese Traditional (Eten)', 'x-Chinese-Eten', 20002, 1, 0),
(73, 'IBM5550 Taiwan', 'x-cp20003', 20003, 1, 0),
(74, 'TeleText Taiwan', 'x-cp20004', 20004, 1, 0),
(75, 'Wang Taiwan', 'x-cp20005', 20005, 1, 0),
(76, 'Western European (IA5)', 'x-IA5', 20105, 1, 0),
(77, 'German (IA5)', 'x-IA5-German', 20106, 1, 0),
(78, 'Swedish (IA5)', 'x-IA5-Swedish', 20107, 1, 0),
(79, 'Norwegian (IA5)', 'x-IA5-Norwegian', 20108, 1, 0),
(80, 'US-ASCII', 'us-ascii', 20127, 1, 0),
(81, 'T.61', 'x-cp20261', 20261, 1, 0),
(82, 'ISO-6937', 'x-cp20269', 20269, 1, 0),
(83, 'IBM EBCDIC (Germany)', 'IBM273', 20273, 1, 0),
(84, 'IBM EBCDIC (Denmark-Norway)', 'IBM277', 20277, 1, 0),
(85, 'IBM EBCDIC (Finland-Sweden)', 'IBM278', 20278, 1, 0),
(86, 'IBM EBCDIC (Italy)', 'IBM280', 20280, 1, 0),
(87, 'IBM EBCDIC (Spain)', 'IBM284', 20284, 1, 0),
(88, 'IBM EBCDIC (UK)', 'IBM285', 20285, 1, 0),
(89, 'IBM EBCDIC (Japanese katakana)', 'IBM290', 20290, 1, 0),
(90, 'IBM EBCDIC (France)', 'IBM297', 20297, 1, 0),
(91, 'IBM EBCDIC (Arabic)', 'IBM420', 20420, 1, 0),
(92, 'IBM EBCDIC (Greek)', 'IBM423', 20423, 1, 0),
(93, 'IBM EBCDIC (Hebrew)', 'IBM424', 20424, 1, 0),
(94, 'IBM EBCDIC (Korean Extended)', 'x-EBCDIC-KoreanExtended', 20833, 1, 0),
(95, 'IBM EBCDIC (Thai)', 'IBM-Thai', 20838, 1, 0),
(96, 'Cyrillic (KOI8-R)', 'koi8-r', 20866, 1, 0),
(97, 'IBM EBCDIC (Icelandic)', 'IBM871', 20871, 1, 0),
(98, 'IBM EBCDIC (Cyrillic Russian)', 'IBM880', 20880, 1, 0),
(99, 'IBM EBCDIC (Turkish)', 'IBM905', 20905, 1, 0),
(100, 'IBM Latin-1', 'IBM00924', 20924, 1, 0),
(101, 'Japanese (JIS 0208-1990 and 0212-1990)', 'EUC-JP', 20932, 1, 0),
(102, 'Chinese Simplified (GB2312-80)', 'x-cp20936', 20936, 1, 0),
(103, 'Korean Wansung', 'x-cp20949', 20949, 1, 0),
(104, 'IBM EBCDIC (Cyrillic Serbian-Bulgarian)', 'cp1025', 21025, 1, 0),
(105, 'Cyrillic (KOI8-U)', 'koi8-u', 21866, 1, 0),
(106, 'Western European (ISO)', 'iso-8859-1', 28591, 1, 0),
(107, 'Central European (ISO)', 'iso-8859-2', 28592, 1, 0),
(108, 'Latin 3 (ISO)', 'iso-8859-3', 28593, 1, 0),
(109, 'Baltic (ISO)', 'iso-8859-4', 28594, 1, 0),
(110, 'Cyrillic (ISO)', 'iso-8859-5', 28595, 1, 0),
(111, 'Arabic (ISO)', 'iso-8859-6', 28596, 1, 0),
(112, 'Greek (ISO)', 'iso-8859-7', 28597, 1, 0),
(113, 'Hebrew (ISO-Visual)', 'iso-8859-8', 28598, 1, 0),
(114, 'Turkish (ISO)', 'iso-8859-9', 28599, 1, 0),
(115, 'Estonian (ISO)', 'iso-8859-13', 28603, 1, 0),
(116, 'Latin 9 (ISO)', 'iso-8859-15', 28605, 1, 0),
(117, 'Europa', 'x-Europa', 29001, 1, 0),
(118, 'Hebrew (ISO-Logical)', 'iso-8859-8-i', 38598, 1, 0),
(119, 'Japanese (JIS)', 'iso-2022-jp', 50220, 1, 0),
(120, 'Japanese (JIS-Allow 1 byte Kana)', 'csISO2022JP', 50221, 1, 0),
(121, 'Japanese (JIS-Allow 1 byte Kana - SO/SI)', 'iso-2022-jp', 50222, 1, 0),
(122, 'Korean (ISO)', 'iso-2022-kr', 50225, 1, 0),
(123, 'Chinese Simplified (ISO-2022)', 'x-cp50227', 50227, 1, 0),
(124, 'Japanese (EUC)', 'euc-jp', 51932, 1, 0),
(125, 'Chinese Simplified (EUC)', 'EUC-CN', 51936, 1, 0),
(126, 'Korean (EUC)', 'euc-kr', 51949, 1, 0),
(127, 'Chinese Simplified (HZ)', 'hz-gb-2312', 52936, 1, 0),
(128, 'Chinese Simplified (GB18030)', 'GB18030', 54936, 1, 0),
(129, 'ISCII Devanagari', 'x-iscii-de', 57002, 1, 0),
(130, 'ISCII Bengali', 'x-iscii-be', 57003, 1, 0),
(131, 'ISCII Tamil', 'x-iscii-ta', 57004, 1, 0),
(132, 'ISCII Telugu', 'x-iscii-te', 57005, 1, 0),
(133, 'ISCII Assamese', 'x-iscii-as', 57006, 1, 0),
(134, 'ISCII Oriya', 'x-iscii-or', 57007, 1, 0),
(135, 'ISCII Kannada', 'x-iscii-ka', 57008, 1, 0),
(136, 'ISCII Malayalam', 'x-iscii-ma', 57009, 1, 0),
(137, 'ISCII Gujarati', 'x-iscii-gu', 57010, 1, 0),
(138, 'ISCII Punjabi', 'x-iscii-pa', 57011, 1, 0),
(139, 'Unicode (UTF-7)', 'utf-7', 65000, 1, 0),
(140, 'Unicode (UTF-8)', 'utf-8', 65001, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_errors_templates`
--

CREATE TABLE IF NOT EXISTS `system_errors_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `errorbegin` text NOT NULL,
  `groupokbegin` text NOT NULL,
  `itemok` text NOT NULL,
  `groupokend` text NOT NULL,
  `groupalertbegin` text NOT NULL,
  `itemalert` text NOT NULL,
  `groupalertend` text NOT NULL,
  `grouperrorbegin` text NOT NULL,
  `itemerror` text NOT NULL,
  `grouperrorend` text NOT NULL,
  `errorend` text NOT NULL,
  `groupmessages` tinyint(1) NOT NULL DEFAULT '0',
  `firstinlist` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `identifier` (`identifier`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `system_errors_templates`
--

INSERT INTO `system_errors_templates` (`id`, `name`, `identifier`, `errorbegin`, `groupokbegin`, `itemok`, `groupokend`, `groupalertbegin`, `itemalert`, `groupalertend`, `grouperrorbegin`, `itemerror`, `grouperrorend`, `errorend`, `groupmessages`, `firstinlist`) VALUES
(4, 'main', 'main', '<div class="errors">', '<ul class="green">', '<li>{%Message}</li>', '</ul>', '<ul class="orange">', '<li>{%Message}</li>', '</ul>', '<ul class="red">', '<li>{%Message}</li>', '</ul>', '</div>', 1, 0),
(5, 'login', 'login', '<div id="errors">', '<ul class="green">', '<li>{%Message}</li>', '</ul>', '<ul class="orange">', '<li>{%Message}</li>', '</ul>', '<ul class="red">', '<li>{%Message}</li>', '</ul>', '</div>', 1, 0),
(6, 'nyve error message!', 'nyve-error-message', '<div class="errors">', '<ul class="green">', '<li>{%Message}</li>', '</ul>', '<ul class="orange">', '<li>{%Message}</li>', '</ul>', '<ul class="red">', '<li>{%Message}</li>', '</ul>', '</div>', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_images`
--

CREATE TABLE IF NOT EXISTS `system_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alttext` varchar(255) NOT NULL,
  `system_images_folders_id` int(8) unsigned NOT NULL,
  `note` text NOT NULL,
  `image` longblob NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `keys` (`system_images_folders_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_images_folders`
--

CREATE TABLE IF NOT EXISTS `system_images_folders` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `system_websites_id` int(4) DEFAULT '1',
  `parentid` int(8) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `keys` (`system_websites_id`,`parentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system_images_folders`
--

INSERT INTO `system_images_folders` (`id`, `name`, `system_websites_id`, `parentid`) VALUES
(1, 'System', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_language`
--

CREATE TABLE IF NOT EXISTS `system_language` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` char(3) NOT NULL,
  `image` varchar(15) DEFAULT NULL,
  `directory` varchar(15) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `system_websites_id` int(4) NOT NULL DEFAULT '1',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LANGUAGES_NAME` (`name`),
  KEY `fkwebsite` (`system_websites_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 11264 kB; (`system_websites_id`) REFER `wg3/sys' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `system_language`
--

INSERT INTO `system_language` (`id`, `name`, `code`, `image`, `directory`, `sort`, `isdefault`, `system_websites_id`, `added`, `changed`) VALUES
(1, 'English', 'en', '', 'en/', 100, 0, 1, '2009-05-19 14:20:42', '2009-05-21 02:22:22'),
(2, 'Czech', 'cz', '', 'cz/', 0, 0, 1, '2009-05-19 14:49:36', '2009-05-21 02:22:29'),
(3, 'English', 'en', '', 'en/', 0, 1, 2, '2009-06-17 15:33:15', '2009-06-17 15:36:46'),
(4, 'Default language', 'def', '', 'default/', 0, 1, 3, '2009-06-18 10:53:27', '2009-06-18 10:53:27'),
(5, 'Default language', 'def', '', 'default/', 0, 1, 4, '2012-09-19 15:11:59', '2012-09-19 15:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `system_modules`
--

CREATE TABLE IF NOT EXISTS `system_modules` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `added` datetime NOT NULL,
  `part` varchar(15) NOT NULL DEFAULT 'modules',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `system_modules`
--

INSERT INTO `system_modules` (`id`, `name`, `added`, `part`) VALUES
(1, 'comments', '2009-05-19 16:38:30', 'system'),
(2, 'configuration', '2009-05-19 16:38:30', 'system'),
(3, 'crawler', '2009-05-19 16:38:30', 'system'),
(4, 'developer', '2009-05-19 16:38:30', 'system'),
(5, 'documents', '2009-05-19 16:38:30', 'system'),
(6, 'forms', '2009-05-19 16:38:30', 'system'),
(7, 'home', '2009-05-19 16:38:30', 'system'),
(8, 'htaccess', '2009-05-19 16:38:30', 'system'),
(9, 'languages', '2009-05-19 16:38:30', 'system'),
(10, 'news', '2009-05-19 16:38:30', 'system'),
(11, 'pages', '2009-05-19 16:38:30', 'system'),
(12, 'systemusers', '2009-05-19 16:38:30', 'system'),
(13, 'users', '2009-05-19 16:38:30', 'system'),
(14, 'databazedluzniku', '2009-05-19 21:43:29', 'system'),
(15, 'documentstructure', '2009-05-19 21:43:29', 'system'),
(16, 'dynamic', '2009-05-19 21:43:29', 'system'),
(17, 'emailer', '2009-05-19 21:43:29', 'system'),
(18, 'flash', '2009-05-19 21:43:29', 'system'),
(19, 'htmlcoder', '2009-05-19 21:43:29', 'system'),
(20, 'jobnumbers', '2009-05-19 21:43:29', 'system'),
(21, 'motocatalogue', '2009-05-19 21:43:29', 'system'),
(22, 'newmodule', '2009-05-19 21:43:31', 'system'),
(23, 'payments', '2009-05-19 21:43:31', 'system'),
(24, 'phonebook', '2009-05-19 21:43:31', 'system'),
(25, 'wgcron', '2009-05-19 21:43:31', 'system'),
(26, 'youtube', '2009-05-19 21:43:31', 'system'),
(27, 'ratings', '2009-05-20 06:38:02', 'system'),
(28, 'innoportal', '2009-05-20 08:20:15', 'system'),
(29, 'gallery', '2009-06-01 05:50:29', 'system'),
(30, 'campaigns', '2009-06-01 11:01:33', 'system'),
(31, 'campaignsad', '2009-06-01 11:01:33', 'system'),
(32, 'twitter', '2009-06-05 07:38:53', 'system'),
(33, 'blogger', '2009-06-10 19:32:07', 'system'),
(34, 'picasa', '2009-06-10 20:07:02', 'system'),
(35, 'projects', '2009-06-13 17:36:54', 'system'),
(36, 'blog', '2009-06-18 13:38:35', 'system'),
(37, 'rssreader', '2009-06-18 13:38:35', 'system'),
(38, 'tinyurl', '2009-06-20 02:00:52', 'system'),
(39, 'subscriptions', '2009-08-07 16:51:57', 'system'),
(40, 'codesnippets', '2009-08-07 16:51:57', 'system'),
(41, 'imenu', '2009-08-21 17:05:12', 'system'),
(42, 'ipromote', '2009-08-23 17:18:02', 'system'),
(43, 'igallery', '2009-10-29 15:44:46', 'system'),
(44, '3mcatalogue', '2009-11-02 12:41:49', 'system'),
(45, 'wsprite', '2009-11-02 12:41:49', 'system'),
(53, 'iblog', '2012-09-24 18:22:10', 'system'),
(48, 'iwallpapers', '2010-01-26 11:21:44', 'system'),
(49, 'imessages', '2010-02-04 13:41:00', 'system'),
(50, 'companies', '2012-09-21 12:36:59', 'system'),
(51, 'mobileapps', '2012-09-21 12:36:59', 'system'),
(54, 'michaluvmodul', '2012-10-01 23:28:44', 'system');

-- --------------------------------------------------------

--
-- Table structure for table `system_modules_permissions`
--

CREATE TABLE IF NOT EXISTS `system_modules_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `system_modules_id` int(6) unsigned DEFAULT NULL,
  `system_teams_id` int(8) unsigned DEFAULT NULL,
  `perm` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `system_modules_id` (`system_modules_id`),
  KEY `system_teams_id` (`system_teams_id`),
  KEY `perm` (`perm`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=631 ;

--
-- Dumping data for table `system_modules_permissions`
--

INSERT INTO `system_modules_permissions` (`id`, `system_modules_id`, `system_teams_id`, `perm`) VALUES
(482, 42, 2, 1),
(481, 40, 2, 1),
(480, 36, 2, 1),
(630, 13, 1, 1),
(629, 32, 1, 1),
(628, 12, 1, 1),
(627, 35, 1, 1),
(626, 11, 1, 1),
(625, 51, 1, 1),
(624, 54, 1, 1),
(623, 9, 1, 1),
(622, 8, 1, 1),
(483, 10, 2, 1),
(621, 6, 1, 1),
(620, 4, 1, 1),
(619, 2, 1, 1),
(618, 50, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_query_analyzer`
--

CREATE TABLE IF NOT EXISTS `system_query_analyzer` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `query` text NOT NULL,
  `count` int(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `count` (`count`),
  FULLTEXT KEY `query` (`query`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_query_analyzer`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_rewrites`
--

CREATE TABLE IF NOT EXISTS `system_rewrites` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `rule` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `system_modules_id` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kmodules` (`system_modules_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_rewrites`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(40) NOT NULL,
  `prop` varchar(40) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`,`prop`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_teams`
--

CREATE TABLE IF NOT EXISTS `system_teams` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `ipfilter` text NOT NULL,
  `superadmin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Index_keys` (`superadmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_teams`
--

INSERT INTO `system_teams` (`id`, `name`, `note`, `ipfilter`, `superadmin`) VALUES
(1, 'Administrators', 'huhuh', '', 1),
(2, 'Editors', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_templates`
--

CREATE TABLE IF NOT EXISTS `system_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `module` varchar(60) NOT NULL,
  `pager` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `limit` int(4) unsigned NOT NULL DEFAULT '20',
  `temptype` int(2) unsigned NOT NULL,
  `datasource` int(6) unsigned NOT NULL,
  `group1` int(11) unsigned NOT NULL,
  `group2` int(11) unsigned NOT NULL,
  `group3` int(11) unsigned NOT NULL,
  `var1` varchar(45) NOT NULL,
  `var2` varchar(45) NOT NULL,
  `var3` varchar(45) NOT NULL,
  `begin1` text NOT NULL,
  `item1` text NOT NULL,
  `end1` text NOT NULL,
  `notemp1` text NOT NULL,
  `begin2` text NOT NULL,
  `item2` text NOT NULL,
  `end2` text NOT NULL,
  `notemp2` text NOT NULL,
  `int1` int(11) unsigned NOT NULL,
  `int2` int(11) unsigned NOT NULL,
  `int3` int(11) unsigned NOT NULL,
  `tint1` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `tint2` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `tint3` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`identifier`,`module`,`temptype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `system_templates`
--

INSERT INTO `system_templates` (`id`, `name`, `identifier`, `module`, `pager`, `limit`, `temptype`, `datasource`, `group1`, `group2`, `group3`, `var1`, `var2`, `var3`, `begin1`, `item1`, `end1`, `notemp1`, `begin2`, `item2`, `end2`, `notemp2`, `int1`, `int2`, `int3`, `tint1`, `tint2`, `tint3`, `added`, `changed`) VALUES
(1, 'test', 'test', 'youtube', 0, 0, 2, 0, 0, 0, 0, 'detail', '', '', '{%Id} - {%Name}', 'No video', '!! only regs !!', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2009-03-04 17:32:36'),
(2, 'test', 'test', 'youtube', 1, 20, 1, 0, 0, 0, 0, 'cat', '', '', 'begin', 'item', 'end', 'no item', '', '', '', 'reg only', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2009-03-04 17:24:21'),
(4, 'test', 'test', 'youtube', 1, 20, 0, 0, 0, 0, 0, 'cat', '', '', '<ul>', '<li>{%Id} - {%Name}</li>', '</ul>\r\n{%PAGER}', '<p>no item</p>', '', '', '', '!!!! reg only !!!!', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2009-03-04 17:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE IF NOT EXISTS `system_users` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(60) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `system_team_id` int(8) unsigned NOT NULL,
  `timever` varchar(15) NOT NULL,
  `codever` varchar(5) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `xdata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `system_team_id` (`system_team_id`),
  KEY `lastlogin` (`lastlogin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `nickname`, `mail`, `pass`, `firstname`, `lastname`, `lastlogin`, `lastip`, `system_team_id`, `timever`, `codever`, `active`, `xdata`) VALUES
(1, 'admin', 'ondrej.rafaj@gmail.com', '26150cd292e4450ab8e6f799cce7b391bf2f1aef', 'Ondrej', 'Rafaj', '2012-10-02 14:49:17', '127.0.0.1', 1, '1349189917', '15531', 1, ''),
(2, 'ninjabiscuit', 'andreww@fiftyfootsquid.com', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', 'Andrew', 'Walker', '2009-08-10 16:23:02', '87.194.126.191', 1, '1249914182', '31432', 1, ''),
(3, 'editor', 'editor@xprogress.com', '26150cd292e4450ab8e6f799cce7b391bf2f1aef', 'test', 'test', '2009-08-23 17:20:49', '78.86.171.36', 2, '1251041359', '2044', 1, ''),
(4, 'ash', 'ashleymills@mac.com', '7ab515d12bd2cf431745511ac4ee13fed15ab578', 'Ashley', 'Mills', '2009-08-23 22:35:41', '78.86.171.36', 2, '1251059786', '17947', 1, ''),
(5, 'koubess', 'kuba.rafaj@napoo.cz', 'e1e2b01e4a1c3f082d85e0154e8520d5e951fcb2', 'Jakub', 'Rafaj', '2009-09-13 15:50:22', '193.2.209.120', 1, '1252850120', '85931', 1, ''),
(6, 'grizzlynetch', 'jakub.knejzlik@fuerte.cz', '43eb8595a499c92ecb8ab221eefadaf56a91a55e', 'Jakub', 'Knejzlik', '2010-03-30 12:51:07', '93.99.202.119', 1, '1269953910', '48592', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `system_validations`
--

CREATE TABLE IF NOT EXISTS `system_validations` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `regex` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `revert` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system_validations`
--

INSERT INTO `system_validations` (`id`, `name`, `regex`, `function`, `revert`, `sort`) VALUES
(1, 'empty', '', 'empty', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_websites`
--

CREATE TABLE IF NOT EXISTS `system_websites` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` char(3) NOT NULL,
  `image` varchar(15) DEFAULT NULL,
  `directory` varchar(255) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `alternativepath` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LANGUAGES_NAME` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `system_websites`
--

INSERT INTO `system_websites` (`id`, `name`, `code`, `image`, `directory`, `sort`, `isdefault`, `alternativepath`, `added`, `changed`) VALUES
(4, 'appstore.fuerteint.com', 'aps', '', '', 0, 1, 'http://localhost/appstore.fuerteint.com/', '2012-09-19 15:08:55', '2012-10-02 11:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `system_websites_permissions`
--

CREATE TABLE IF NOT EXISTS `system_websites_permissions` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `system_websites_id` int(4) NOT NULL,
  `system_users_id` int(8) unsigned NOT NULL,
  `permissions` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `keys` (`system_websites_id`,`system_users_id`),
  KEY `FK_system_websites_permissions_users` (`system_users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `system_websites_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `tinyurls_templates`
--

CREATE TABLE IF NOT EXISTS `tinyurls_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) NOT NULL DEFAULT '0',
  `pager` tinyint(1) NOT NULL DEFAULT '1',
  `limit` int(5) NOT NULL DEFAULT '20',
  `ascending` tinyint(1) NOT NULL DEFAULT '1',
  `tbegin` text NOT NULL,
  `tdetail` text NOT NULL,
  `tend` text NOT NULL,
  `tnoitem` text NOT NULL,
  `system_websites_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temptype` (`temptype`,`system_websites_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tinyurls_templates`
--


-- --------------------------------------------------------

--
-- Table structure for table `tinyurls_urls`
--

CREATE TABLE IF NOT EXISTS `tinyurls_urls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `system_websites_id` int(4) unsigned NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `system_websites_id` (`system_websites_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tinyurls_urls`
--


-- --------------------------------------------------------

--
-- Table structure for table `twitter_accounts`
--

CREATE TABLE IF NOT EXISTS `twitter_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `users_id` int(11) unsigned DEFAULT NULL,
  `system_users_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `twitter_accounts`
--

INSERT INTO `twitter_accounts` (`id`, `name`, `password`, `added`, `users_id`, `system_users_id`) VALUES
(1, 'rafiki270', 'exploited3330', '2009-06-05 10:34:59', 0, 1),
(2, 'xprogresscom', 'exploited3330', '2009-07-01 16:58:19', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `twitter_templates`
--

CREATE TABLE IF NOT EXISTS `twitter_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `limit` int(4) NOT NULL DEFAULT '20',
  `datasource` int(4) unsigned NOT NULL DEFAULT '0',
  `dateformat` varchar(150) NOT NULL,
  `tempbegin` text NOT NULL,
  `tempitem` text NOT NULL,
  `tempend` text NOT NULL,
  `twitter_accounts_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `twitter_accounts_id` (`twitter_accounts_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `twitter_templates`
--

INSERT INTO `twitter_templates` (`id`, `name`, `identifier`, `temptype`, `limit`, `datasource`, `dateformat`, `tempbegin`, `tempitem`, `tempend`, `twitter_accounts_id`) VALUES
(1, 'left bar tweets', 'left-bar-tweets', 0, 5, 1, 'd. m. Y, H:i:s', '<h3>xProgress on Twitter</h3>\r\n<dl class="box">', '<dd id="text{%Id}">{%Text}</dd>\r\n<dt id="date{%Id}"><!--<img src="{%Image}" alt="{%Username}" />--><em>{%Fullname}</em> {%Date}</dt>\r\n', '</dl>', 2),
(3, 'testsend', 'testsend', 2, 0, 0, '', '', '', '', 1),
(6, 'xprogress.com', 'xprogress-com', 1, 0, 0, 'd. m. Y, H:i', '', '<dl>\r\n<dt id="twDate{%Id}">{%Date}</dt>\r\n<dd id="twText{%Id}">{%Text}</dd>\r\n</dl>\r\n', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_groups_id` int(8) unsigned NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ansver` varchar(150) NOT NULL,
  `added` datetime NOT NULL,
  `online` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `timever` varchar(15) NOT NULL,
  `codever` varchar(5) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `lastlogin` datetime NOT NULL,
  `gender` set('m','f') NOT NULL,
  `lastip` varchar(17) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `system_countries_id` int(5) unsigned NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `downloads` int(11) NOT NULL DEFAULT '0',
  `xdata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`users_groups_id`,`nickname`,`mail`,`password`,`online`,`active`,`lastlogin`,`gender`,`system_countries_id`),
  KEY `FK_users_country` (`system_countries_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_groups_id`, `nickname`, `mail`, `password`, `question`, `ansver`, `added`, `online`, `changed`, `timever`, `codever`, `active`, `lastlogin`, `gender`, `lastip`, `firstname`, `lastname`, `system_countries_id`, `visits`, `downloads`, `xdata`) VALUES
(1, 2, 'ondrej', 'ondrej.rafaj@gmail.com', '26150cd292e4450ab8e6f799cce7b391bf2f1aef', 'que?', 'pasa', '2009-03-02 13:18:27', '2009-03-02 13:17:00', '2010-02-04 10:51:44', '', '', 1, '2012-10-02 15:59:28', 'm', '127.0.0.1', 'Ondrej', 'Rafaj', 56, 0, 0, ''),
(2, 1, 'jakub.rafaj', 'jakub.rafaj@fuerteint.com', 'aaaaaa', '', '', '2012-10-01 22:18:52', '2012-10-01 22:18:00', '2012-10-01 22:18:52', '', '', 1, '2012-10-01 22:18:00', 'm', '', 'Jakub', 'Rafaj', 56, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_fields`
--

CREATE TABLE IF NOT EXISTS `users_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `note` text NOT NULL,
  `users_fields_groups_id` int(8) unsigned NOT NULL,
  `errmessage` varchar(255) NOT NULL,
  `system_validations` int(8) unsigned NOT NULL DEFAULT '0',
  `sort` int(8) unsigned NOT NULL DEFAULT '0',
  `errtype` int(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `keys` (`users_fields_groups_id`,`sort`,`system_validations`),
  KEY `FK_users_fields_validation` (`system_validations`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `users_fields_groups`
--

CREATE TABLE IF NOT EXISTS `users_fields_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `users_groups_id` int(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `keys` (`users_groups_id`,`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_fields_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `users_friends`
--

CREATE TABLE IF NOT EXISTS `users_friends` (
  `users_id` int(11) unsigned NOT NULL,
  `fiend_id` int(11) unsigned NOT NULL,
  `added` datetime NOT NULL,
  `confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `keys` (`users_id`,`fiend_id`,`added`,`confirmed`),
  KEY `FK_users_friends_friend` (`fiend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_friends`
--


-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `system_websites_id` int(4) DEFAULT NULL,
  `system_language_id` int(3) DEFAULT NULL,
  `emails_templates_id` int(10) unsigned DEFAULT NULL COMMENT 'for in mail link approval',
  PRIMARY KEY (`id`),
  KEY `keys` (`system_websites_id`,`system_language_id`,`emails_templates_id`),
  KEY `FK_users_groups_language` (`system_language_id`),
  KEY `FK_users_groups_verification` (`emails_templates_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`, `system_websites_id`, `system_language_id`, `emails_templates_id`) VALUES
(1, 'Registered', 1, 1, 1),
(2, 'Clients', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_invitations`
--

CREATE TABLE IF NOT EXISTS `users_invitations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(8) unsigned NOT NULL,
  `users_groups_id` int(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`code`,`users_groups_id`),
  KEY `FK_users_invitations_group` (`users_groups_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_invitations`
--


-- --------------------------------------------------------

--
-- Table structure for table `users_messages`
--

CREATE TABLE IF NOT EXISTS `users_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned DEFAULT NULL,
  `from_id` int(11) unsigned DEFAULT NULL,
  `added` datetime NOT NULL,
  `readed` datetime DEFAULT NULL,
  `parentid` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`users_id`,`from_id`,`added`,`readed`,`parentid`),
  KEY `FK_users_messages_from` (`from_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `users_templates`
--

CREATE TABLE IF NOT EXISTS `users_templates` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `temptype` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `pager` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `perpage` int(5) unsigned NOT NULL DEFAULT '20',
  `datasource` smallint(3) unsigned NOT NULL DEFAULT '0',
  `datasource2` smallint(3) unsigned NOT NULL DEFAULT '0',
  `variable` varchar(80) NOT NULL,
  `useedit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `redirect1` varchar(255) DEFAULT NULL,
  `redirect2` varchar(255) DEFAULT NULL,
  `tempstart` text NOT NULL,
  `temp` text NOT NULL,
  `tempend` text NOT NULL,
  `noitem` text NOT NULL,
  `mess1` varchar(255) NOT NULL,
  `mess2` varchar(255) NOT NULL,
  `mess3` varchar(255) NOT NULL,
  `mess4` varchar(255) NOT NULL,
  `mess5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_keys` (`identifier`,`temptype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_templates`
--

INSERT INTO `users_templates` (`id`, `name`, `identifier`, `temptype`, `pager`, `perpage`, `datasource`, `datasource2`, `variable`, `useedit`, `redirect1`, `redirect2`, `tempstart`, `temp`, `tempend`, `noitem`, `mess1`, `mess2`, `mess3`, `mess4`, `mess5`) VALUES
(1, 'full', 'full', 0, 0, 0, 0, 0, '', 1, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(2, 'messlist', 'messlist', 2, 0, 0, 0, 0, '', 0, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(3, 'personalmessages', 'personalmessages', 2, 0, 0, 0, 0, '', 0, NULL, NULL, '', '', '', '', '', '', '', '', ''),
(5, 'Page login', 'page-login', 6, 0, 0, 0, 0, 'mail', 0, '2', '1', '', '<form id="login" action="" method="post">\r\n    <h1><strong>Fuerte International</strong> Enterprise store </h1>\r\n    <p><input type="email" name="login" placeholder="Email" autofocus="autofocus" value="{%AutoName}" /></p>\r\n    <p>\r\n        <input type="password" name="password" placeholder="Password" value="" />\r\n        <a href="#">Forgotten Password?</a>\r\n    </p>\r\n    <p>\r\n        <button name="go" type="submit">Login</button>\r\n    </p>\r\n</form>\r\n', '', '<div>\r\n	<h1>{%Lastname}, {%Firstname}</h1>\r\n	<p>Avatar: {%Avatar}</p>\r\n	<p>Nickname: {%Nickname}</p>\r\n	<p>Email: {%Mail}</p>\r\n	<p>Account created: {%Added}</p>\r\n	<p>Last login: {%Lastlogin}</p>\r\n	<p>Last login from: {%Lastip}</p>\r\n	<p>Country: {%Country}</p>\r\n	<p>Group: {%Group}</p>\r\n	 <p><a href="?logout">Logout</a></p>\r\n</div>', 'Sorry, unrecognized username or password.', 'You have been logged in successfully.', '', 'You don''t have enough permissions for this section.', 'You have been successfuly logged out.'),
(6, 'Login line', 'login-line', 6, 0, 0, 0, 0, 'info', 0, '0', '0', '', '', '', '<p>{%Firstname} {%Lastname}&nbsp;&nbsp;|&nbsp;&nbsp;<a href="{#LINK_1}?logout=1" title="Logout from AppStore">Logout</a></p>', '', '', '', '', 'You have been successfuly logged out.'),
(7, 'Main registration', 'main-registration', 7, 0, 0, 1, 0, 'This nickname already exists.', 0, '33', '0', 'Password confirmation does not match.', '<form action="" method="post" id="registrationForm" class="form registration">\r\n    <h2>Step 1. Tell us about yourself</h2>\r\n    <fieldset>\r\n        <p>\r\n            <label for="firstname">First Name:</label>\r\n            <input type="text" name="firstname" id="firstname" value="{%Firstname}"  />\r\n        </p>\r\n        <p>\r\n            <label for="lastname">Last Name:</label>\r\n            <input type="text" name="lastname" id="lastname" value="{%Lastname}"  />\r\n        </p>\r\n        <p>\r\n            <label for="mail">Email:</label>\r\n            <input type="text" name="mail" id="mail" value="{%Mail}"  />\r\n            <a href="{#LINK_19}" title="Terms and Conditions" class="privacy">We respect your privacy</a> \r\n        </p>\r\n    </fieldset>\r\n    <h2>Step 2. Pick a username and password</h2>\r\n    <fieldset>\r\n        <p>\r\n            <label for="nickname">Username:</label>\r\n            <input type="text" name="nickname" id="nickname" value="{%Nickname}"  />\r\n        </p>\r\n        <p>\r\n            <label for="pass">Password:</label>\r\n            <input type="password" name="pass" id="pass"  />\r\n        </p>\r\n        <p>\r\n            <label for="passver">Confirm Password:</label>\r\n            <input type="password" name="passver" id="passver"  />\r\n        </p>\r\n    </fieldset>\r\n    <input type="hidden" name="register" value="1" />\r\n    <p>\r\n        <button type="reset" name="reset"><span>Clear</span></button>\r\n        <button type="submit" name="submitRegistration"><span>Create my xProgress Account</span></button>\r\n    </p>\r\n</form>\r\n', 'Please try it again.', '', 'Your account had been successfully created.', 'Please check your name.', 'Please check the password.', 'Please check your e-mail.', 'Please check the username.'),
(8, 'edit account', 'edit-account', 7, 0, 0, 0, 0, '', 0, '0', '0', '', '<form action="" method="post" id="registrationForm" class="form registration">\r\n    <h2>Step 1. Tell us about yourself</h2>\r\n    <fieldset>\r\n        <p>\r\n            <label for="firstname">First Name:</label>\r\n            <input type="text" name="firstname" id="firstname" value="{%Firstname}"  />\r\n        </p>\r\n        <p>\r\n            <label for="lastname">Last Name:</label>\r\n            <input type="text" name="lastname" id="lastname" value="{%Lastname}"  />\r\n        </p>\r\n        <p>\r\n            <label for="mail">Email:</label>\r\n            <input type="text" name="mail" id="mail" value="{%Mail}"  />\r\n            <a href="{#LINK_19}" title="Terms and Conditions" class="privacy">We respect your privacy</a> \r\n        </p>\r\n    </fieldset>\r\n    <h2>Step 2. Pick a username and password</h2>\r\n    <fieldset>\r\n        <p>\r\n            <label for="nickname">Username:</label>\r\n            <input type="text" name="nickname" id="nickname" value="{%Nickname}"  />\r\n        </p>\r\n        <p>\r\n            <label for="pass">Password:</label>\r\n            <input type="password" name="pass" id="pass"  />\r\n        </p>\r\n        <p>\r\n            <label for="passver">Confirm Password:</label>\r\n            <input type="password" name="passver" id="passver"  />\r\n        </p>\r\n    </fieldset>\r\n    <input type="hidden" name="register" value="1" />\r\n    <p>\r\n        <button type="reset" name="reset"><span>Clear</span></button>\r\n        <button type="submit" name="submitRegistration"><span>Create my xProgress Account</span></button>\r\n    </p>\r\n</form>\r\n', '', '', 'registeredok', 'checkname', 'checkpass', 'checkmail', 'checknickname'),
(9, 'top-menu', 'top-menu', 0, 0, 0, 0, 0, 'user', 0, '0', '0', '', '<ul class="smallnav">\r\n    <li><a href="{#LINK_34}" title="My Account" class="{#ACTIVE_33}"><span>My account</span></a></li>\r\n    <!--<li><a href="{#LINK_37}" title="Try to ask, we''ll try to answer" class="{#ACTIVE_37}"><span>Little helper</span></a></li>-->\r\n    <li><a href="{#LINK_38}" title="Database of iPhone wallpapers" class="{#ACTIVE_38}"><span>iPhone wallpapers</span></a></li>\r\n    <li><a href="{#LINK_17}" title="Complete navigation on the website" class="{#ACTIVE_17}"><span>Sitemap</span></a></li>\r\n</ul>\r\n', '', '<ul class="smallnav">\r\n    <li><a href="{#LINK_34}" title="Registration to the system" class="{#ACTIVE_34}"><span>Registration</span></a></li>\r\n    <!--<li><a href="{#LINK_37}" title="Try to ask, we''ll try to answer" class="{#ACTIVE_37}"><span>Little helper</span></a></li>-->\r\n    <li><a href="{#LINK_38}" title="Database of iPhone wallpapers" class="{#ACTIVE_38}"><span>iPhone wallpapers</span></a></li>\r\n    <li><a href="{#LINK_17}" title="Complete navigation on the website" class="{#ACTIVE_17}"><span>Sitemap</span></a></li>\r\n</ul>\r\n', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_categories`
--

CREATE TABLE IF NOT EXISTS `youtube_categories` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(8) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keys` (`parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `youtube_categories`
--

INSERT INTO `youtube_categories` (`id`, `parent`, `name`, `description`, `added`, `changed`) VALUES
(1, 0, 'test', '', '2009-03-03 12:10:33', '2009-03-03 12:10:33'),
(3, 0, 'aaaaaa', '', '2009-03-03 12:14:36', '2009-03-03 12:14:36'),
(4, 0, 'bbbbbb', '', '2009-03-03 12:15:09', '2009-03-03 12:15:09'),
(6, 3, 'gggggg', '', '2009-03-03 12:17:40', '2009-03-03 12:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_videos`
--

CREATE TABLE IF NOT EXISTS `youtube_videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `changed` datetime NOT NULL,
  `description` text NOT NULL,
  `code` varchar(45) NOT NULL,
  `youtube_categories_id` int(8) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `keys` (`enabled`,`youtube_categories_id`,`added`,`changed`,`code`),
  FULLTEXT KEY `ft` (`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `youtube_videos`
--

INSERT INTO `youtube_videos` (`id`, `name`, `added`, `changed`, `description`, `code`, `youtube_categories_id`, `enabled`) VALUES
(1, 'aaaaaa', '2009-03-03 12:22:24', '2009-03-05 12:45:56', ':-)', 'estys48567', 6, 1),
(2, 'aaaaaa', '2009-03-03 12:22:33', '2009-03-03 12:22:33', ':-)', 'estys48567', 0, 1);
