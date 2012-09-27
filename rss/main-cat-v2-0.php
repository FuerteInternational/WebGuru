<?php 
chdir("../admin/");
include("init/init.basic.php");
?><?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss">
    <channel>
        <title><![CDATA[Main cat]]></title>
        <link><![CDATA[http://localhost/appstore.fuerteint.com/]]></link>
        <description><![CDATA[]]></description>
        <language>en</language>
        <lastBuildDate>Thu, 27 Sep 2012 11:45:58 +0000</lastBuildDate>
        <copyright><![CDATA[]]></copyright>
        <docs></docs>
        <ttl>15</ttl>
        <image>
            <title></title>
            <url></url>
            <link></link>
        </image>
        <?php 
        $arr = NewsItemsModel::getFrontendItemsByCat(0);
        foreach ($arr as $rss) {
        	$id = $rss->getId();
        	$cat = $rss->getNewsCategoriesId();
        	$identifier = valid::safeText($rss->getName());
        ?><item>
            <title><![CDATA[<?php echo $rss->getName(); ?>]]></title>
            <description><![CDATA[<?php echo $rss->getHead(); ?>]]></description>
            <link>http://localhost/appstore.fuerteint.com/index.php?pageid=1&amp;news=<?php echo $cat; ?></link>
            <!--<guid isPermaLink="false">
                http://news.bbc.co.uk/1/hi/business/7900854.stm
            </guid>-->
            <pubDate><?php echo date("r"); ?></pubDate>
            <category><![CDATA[]]></category>
            <!--<media:thumbnail width="66" height="49" url="http://newsimg.bbc.co.uk/media/images/45495000/jpg/_45495784_006765524-1.jpg"/>-->
        </item>
<?php
		}
		?></channel>
</rss>