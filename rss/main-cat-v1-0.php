<?php 
chdir("../admin/");
include("init/init.basic.php");
?><?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/">
    <channel rdf:about="http://www.sitepoint.com/rss.php">
        <title><![CDATA[Main cat]]></title>
        <description><![CDATA[]]></description>
        <link>http://localhost/appstore.fuerteint.com/http://localhost/appstore.fuerteint.com/</link>
        <items>
            <rdf:Seq>
		        <?php 
		        $arr = NewsItemsModel::getArticlesInCat(0, 20, true);
		        foreach ($arr as $rss) {
		        	$id = $rss->getId();
		        	$cat = $rss->getNewsCategoriesId();
		        	$identifier = valid::safeText($rss->getName());
		        ?>
            	<rdf:li rdf:resource="http://localhost/appstore.fuerteint.com/index.php?pageid=1&amp;news=<?php echo $cat; ?>"/>
            	<?php } ?>
            </rdf:Seq>
        </items>
    </channel>
	<?php 
	foreach ($arr as $rss) {
       	$id = $rss->getId();
       	$cat = $rss->getNewsCategoriesId();
       	$identifier = valid::safeText($rss->getName());
	?><item rdf:about="http://localhost/appstore.fuerteint.com/index.php?pageid=1&amp;news=<?php echo $cat; ?>">
        <title><![CDATA[<?php echo $rss->getName(); ?>]]></title>
        <description><![CDATA[<?php echo $rss->getHead(); ?>]]></description>
        <link>http://localhost/appstore.fuerteint.com/index.php?pageid=1&amp;news=<?php echo $cat; ?></link>
    </item>
	<?php } ?>
</rdf:RDF>