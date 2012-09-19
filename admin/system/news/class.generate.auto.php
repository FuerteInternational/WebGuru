<?php
/**
 * Auto generate class for module News
 * 
 * @package      WebGuru3
 * @subpackage   modules/news/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        19. February 2009
 */


class autoGenerateNews {
		
	public function __construct() {
		self::generateRss();
	}
	
	public static function generateRss() {
		$rss = NewsRssModel::doSelect();
		foreach ($rss as $feed) {
			$path = wgPaths::getPath().$feed->getFolder();
			$ok = true;
			if (!wgIo::mkdir($path)) { wgError::add(wgLang::get('cantcreatefolder').': '.$path);
				$ok = false;
			}
			if (!is_writable($path)) { wgError::add(wgLang::get('foldernotwritable').': '.$path);
				$ok = false;
			}
			if ($ok) {
				if ($feed->getVersion() == 1) $data = self::generate10($feed);
				else $data = self::generate20($feed);
				$file = ((eregi('/', $feed->getFolder())) ? $path.$feed->getIdentifier().'.php' : $path.'/'.$feed->getIdentifier().'.php');
				wgIo::writeFile($file, $data);
			}
		}
	}
	
	public static function generate10($feed) {
		$data = '<?php 
chdir("'.wgPaths::getAdminPath().'");
include("init/init.basic.php");
?><?php echo \'<?xml version="1.0" encoding="utf-8"?>\'; ?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/">
    <channel rdf:about="http://www.sitepoint.com/rss.php">
        <title><![CDATA['.$feed->getName().']]></title>
        <description><![CDATA['.$feed->getDescription().']]></description>
        <link>'.wgPaths::getPath('url').wgParse::parseVariables(wgPaths::getPath('url')).'</link>
        <items>
            <rdf:Seq>
		        <?php 
		        $arr = NewsItemsModel::getArticlesInCat('.$feed->getNewsCategoriesId().', 20, true);
		        foreach ($arr as $rss) {
		        	$id = $rss->getId();
		        	$cat = $rss->getNewsCategoriesId();
		        	$identifier = valid::safeText($rss->getName());
		        ?>
            	<rdf:li rdf:resource="'.wgPaths::getPath('url').wgParse::parseVariables($feed->getLink()).'"/>
            	<?php } ?>
            </rdf:Seq>
        </items>
    </channel>
	<?php 
	foreach ($arr as $rss) {
       	$id = $rss->getId();
       	$cat = $rss->getNewsCategoriesId();
       	$identifier = valid::safeText($rss->getName());
	?><item rdf:about="'.wgPaths::getPath('url').wgParse::parseVariables($feed->getLink()).'">
        <title><![CDATA[<?php echo $rss->getName(); ?>]]></title>
        <description><![CDATA[<?php echo $rss->getHead(); ?>]]></description>
        <link>'.wgPaths::getPath('url').wgParse::parseVariables($feed->getLink()).'</link>
    </item>
	<?php } ?>
</rdf:RDF>';
		return $data;
	}
	
	public static function generate20($feed) {
		$data = '<?php 
chdir("'.wgPaths::getAdminPath().'");
include("init/init.basic.php");
?><?php echo \'<?xml version="1.0" encoding="utf-8"?>\'; ?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss">
    <channel>
        <title><![CDATA['.$feed->getName().']]></title>
        <link><![CDATA['.wgPaths::getPath('url').']]></link>
        <description><![CDATA['.$feed->getDescription().']]></description>
        <language>'.$feed->getDisplaylanguage().'</language>
        <lastBuildDate>'.date('r').'</lastBuildDate>
        <copyright><![CDATA['.$feed->getCopyright().']]></copyright>
        <docs></docs>
        <ttl>'.$feed->getTtl().'</ttl>
        <image>
            <title></title>
            <url></url>
            <link></link>
        </image>
        <?php 
        $arr = NewsItemsModel::getFrontendItemsByCat('.$feed->getNewsCategoriesId().');
        foreach ($arr as $rss) {
        	$id = $rss->getId();
        	$cat = $rss->getNewsCategoriesId();
        	$identifier = valid::safeText($rss->getName());
        ?><item>
            <title><![CDATA[<?php echo $rss->getName(); ?>]]></title>
            <description><![CDATA[<?php echo $rss->getHead(); ?>]]></description>
            <link>'.wgPaths::getPath('url').wgParse::parseVariables($feed->getLink()).'</link>
            <!--<guid isPermaLink="false">
                http://news.bbc.co.uk/1/hi/business/7900854.stm
            </guid>-->
            <pubDate><?php echo date("r"); ?></pubDate>
            <category><![CDATA['.NewsCategoriesModel::getCatName($feed->getNewsCategoriesId()).']]></category>
            <!--<media:thumbnail width="66" height="49" url="http://newsimg.bbc.co.uk/media/images/45495000/jpg/_45495784_006765524-1.jpg"/>-->
        </item>
<?php
		}
		?></channel>
</rss>';
		return $data;
	}
	
	
	
}
?>