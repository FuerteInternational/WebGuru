<?php

chdir('../admin/');
require('./init/init.basic.php');
//error_reporting(0);
$widgets = NULL;
$arr = WspriteItemsModel::getSelfData($_GET['id']);
foreach ($arr as $v) {
	$data = unserialize($v->getW2());
	if ($v->getW1() == 1) {
		include_once(wgPaths::getModulePath('ftp', 'twitter').'libs/class.twitter.php');
		$twitter = new SimpleTwitter($data['twitterName']);
		$d = $twitter->getMyTimeline(1);
		$tw = $d[0];
		if ((bool) $tw->text) { 
			$widgets .= '<li class="WM-twitterFeed">\
    <h2 style="background:url('.$tw->user->profile_image_url.') left center no-repeat;">'.$data['twitterTitle'].'</h2>\
    <div>\
        <span>'.$tw->user->name.': <em> '.date('\a\t H:i \o\n d/m/Y', strtotime($tw->created_at)).'</em></span>\
    </div>\
    <p>'.$tw->text.'</p>\
</li>\\';
		}
		else { 
			$widgets .= '<li class="WM-twitterFeed">\
    <h2 style="background:url('.wgPaths::getPath('url').'assets/sprite/img/twitterAvatar.png) left center no-repeat;">'.$data['twitterTitle'].'</h2>\
    <div>\
        <span>System Error: <em> '.date('\a\t H:i \o\n d/m/Y', time()).'</em></span>\
    </div>\
    <p>We were unable to load the latest post, please come back later.</p>\
</li>\\';
		}
		$tw = NULL;
		
	}
	
	
	if ($v->getW1() == 2) $widgets .= '<li class="WM-didYouKnow">\
    <h2>'.$data['contentTitle'].'</h2>\
    <p>'.$data['contentBody'].' <a href="'.$data['linkURL'].'">'.$data['linkText'].'</a></p>\
</li>\\';
	
	
	if ($v->getW1() == 3) {
		//print_r($data);
		$arr = unserialize($data['content']);
		$c = count($arr);
		if ($c > 0) {
			$r = rand(0, ($c-1));
			$widgets .= '<li class="WM-lifeCoach">\
    <h2>'.$data['multipleItemsTitle'].'</h2>\
    <p>'.$arr[$r].'</p>\
</li>\\';
		}
	}
	
	
	
	
	
	if ($v->getW1() == 4) $widgets .= '<li class="WM-blackButton">\
	<div>\
	    <a href="'.$data['linkButtonURL'].'"><span>'.$data['linkButtonText'].'</span></a>\
	</div>\
</li>\\';
	
	
	if ($v->getW1() == 5) $widgets .= '<li class="WM-Logo">\
    <img src="'.$data['imageLinkURL'].'" alt="'.$data['imageAltText'].'" />\
</li>\\';
	
}
$data = NULL;
$arr = NULL;
$v = NULL;

echo 'document.write(\'<style type="text/css">\
\
#actualWidget #actualWidgetList h2, #actualWidget #actualWidgetList h3, #actualWidget #actualWidgetList p, #actualWidget #actualWidgetList img, #actualWidget #actualWidgetList li, #actualWidget #actualWidgetList ul {\
	padding:0px;\
	margin:0px;\
	border:0px;\
	font-size:16px;\
	list-style:none;\
	text-align:left;\
	font-weight:normal;\
}\
#actualWidget #actualWidgetList strong {\
	font-weight:normal;\
}\
\
#actualWidget #actualWidgetList {\
	border:2px solid #cccccc;\
	-moz-border-radius: 5px;\
	-webkit-border-radius: 5px;\
	margin-top:1em;\
	font-family: "myriad pro", Verdana, sans-serif;\
	color:#626262;\
}\
\
#actualWidget #actualWidgetList {\
	padding:16px;\
}\
\
#actualWidget #actualWidgetList li {\
	padding-bottom:17px;\
	border-bottom:1px solid #cccccc;\
	margin-bottom:27px;\
}\
\
#actualWidget #actualWidgetList h2 {\
	color:#000000;\
	font-size:25px;\
	font-family:Arial, Helvetica, sans-serif;\
	padding-left:45px;\
	line-height:33px;\
	font-weight:normal;\
	margin-bottom:15px;\
}\
\
#actualWidget #actualWidgetList p a {\
	color:#CF0F4A;\
	text-decoration:underline;\
} \
\
#actualWidget #actualWidgetList .WM-blackButton div, #actualWidget #actualWidgetList .WM-blackButton a {\
	margin:0 auto; \
	padding-bottom:0px;\
	border:0px;\
	width:100%;\
}\
\
#actualWidget #actualWidgetList .WM-blackButton {\
	padding-bottom:27px;\
}\
#actualWidget #actualWidgetList .WM-blackButton div {\
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/buttons.jpg) 0px -96px repeat-x #000000;\
	height:32px;\
	text-align:center;\
	float:none;\
	margin:0 auto;\
	padding-bottom:0px;\
	width:100%;\
}\
\
#actualWidget #actualWidgetList .WM-blackButton a {\
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/buttons.jpg) 0px -128px no-repeat;\
	height:32px;\
	display:block;\
	text-decoration:none;\
	color:#ffffff;\
	float:none;\
}\
\
#actualWidget #actualWidgetList .WM-blackButton span {\
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/buttons.jpg) 100% -160px no-repeat;\
	display:block;\
	height:32px;\
	line-height:30px;\
	padding:0 17px;\
	float:none;\
	font-size:15px;\
	text-align:center;\
\
}\
\
#actualWidget #actualWidgetList .WM-twitterFeed h2 {\
	padding:7px 0 7px 63px;\
}\
\
#actualWidget #actualWidgetList .WM-twitterFeed img  {\
	float:left;\
	display:block;\
}\
\
#actualWidget #actualWidgetList .WM-twitterFeed div {\
	float:left;\
	margin-bottom:1em;\
	width:230px;\
}\
\
#actualWidget #actualWidgetList .WM-twitterFeed p {\
	clear:both;\
}\
\
#actualWidget #actualWidgetList .WM-twitterFeed span  {\
	display:block;\
	color:#CF0F4A;\
	font-weight:bold;\
	line-height:15px;\
}\
\
#actualWidget #actualWidgetList .WM-twitterFeed span em {\
	font-size:12px;\
	color:#666666;\
	font-weight:normal;\
}\
\
#actualWidget #actualWidgetList .WM-lifeCoach h2 {\
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/lifeCoach.jpg) center left no-repeat;\
}\
\
#actualWidget #actualWidgetList .WM-didYouKnow h2 {\
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/magnify.jpg) center left no-repeat;\
}\
\
#actualWidget #actualWidgetList li.WM-Logo {\
	text-align:left;\
}\
</style>\
\
<div id="actualWidget">\
    <ul id="actualWidgetList">\
    	'.$widgets.'
    </ul>\
</div>\');';
?>
