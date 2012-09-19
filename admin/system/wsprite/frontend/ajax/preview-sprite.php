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
			$widgets .= '<li class="WM-twitterFeed">
    <h2 style="background:url('.$tw->user->profile_image_url.') left center no-repeat;">'.$data['twitterTitle'].'</h2>
    <div>
        <span>'.$tw->user->name.': <em> '.date('\a\t H:i \o\n d/m/Y', strtotime($tw->created_at)).'</em></span>
    </div>
    <p>'.$tw->text.'</p>
</li>';
		}
		else { 
			$widgets .= '<li class="WM-twitterFeed">
    <h2 style="background:url('.wgPaths::getPath('url').'assets/sprite/img/twitterAvatar.png) left center no-repeat;">'.$data['twitterTitle'].'</h2>
    <div>
        <span>System Error: <em> '.date('\a\t H:i \o\n d/m/Y', time()).'</em></span>
    </div>
    <p>We were unable to load the latest post, please come back later.</p>
</li>';
		}
		$tw = NULL;
		
	}
	
	
	if ($v->getW1() == 2) $widgets .= '<li class="WM-didYouKnow">
    <h2>'.$data['contentTitle'].'</h2>
    <p>'.$data['contentBody'].' <a href="'.$data['linkURL'].'">'.$data['linkText'].'</a></p>
</li>';
	
	
	if ($v->getW1() == 3) {
		//print_r($data);
		$arr = unserialize($data['content']);
		$c = count($arr);
		if ($c > 0) {
			$r = rand(0, ($c-1));
			$widgets .= '<li class="WM-lifeCoach">
    <h2>'.$data['multipleItemsTitle'].'</h2>
    <p>'.$arr[$r].'</p>
</li>';
		}
	}
	
	
	
	
	
	if ($v->getW1() == 4) $widgets .= '<li class="WM-blackButton WM-centerBB">
    <a href="'.$data['linkButtonURL'].'"><span>'.$data['linkButtonText'].'</span></a>
</li>';
	
	
	if ($v->getW1() == 5) $widgets .= '<li class="wm-Logo">
    <img src="'.$data['imageLinkURL'].'" alt="'.$data['imageAltText'].'" />
</li>';
	
}
$data = NULL;
$arr = NULL;
$v = NULL;

if (empty($widgets)) $widgets = '';

echo '<style type="text/css">

#actualWidget *, #actualWidget h2, #actualWidget h3, #actualWidget p, #actualWidget img, #actualWidget li, #actualWidget ul {
	padding:0px;
	margin:0px;
	border:0px;
	font-size:100%;
	list-style:none;
}

#actualWidget {
	border:2px solid #cccccc;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	margin-top:1em;
	font-family: "myriad pro", Verdana, sans-serif;
	color:#626262;
	width: 266px;
}

#actualWidget #actualWidgetList {
	padding:16px;
}

#actualWidget #actualWidgetList li {
	padding-bottom:17px;
	border-bottom:1px solid #cccccc;
	margin-bottom:27px;
}

#actualWidget #actualWidgetList .wm-Logo {
	padding-bottom:0px;
	border-bottom:0px;
}

#actualWidget h2 {
	color:#000000;
	font-size:1.56em;
	font-family:Arial, Helvetica, sans-serif;
	padding-left:45px;
	line-height:33px;
	font-weight:normal;
	margin-bottom:15px;
}

#actualWidget p a {
	color:#CF0F4A;
	text-decoration:underline;
} 

#actualWidget .WM-blackButton, #actualWidget .WM-blackButton a {
	width:150px;
	margin:0 auto; 
	padding-bottom:0px;
	border:0px;
}

#actualWidget #actualWidgetList .WM-blackButton {
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/buttons.jpg) 0px -96px repeat-x #000000;
	height:32px;
	text-align:center;
	float:none;
	margin:0 auto;
	padding:0px;
	width:175px;
}

#actualWidget .WM-blackButton a {
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/buttons.jpg) 0px -128px no-repeat;
	height:32px;
	display:block;
	text-decoration:none;
	color:#ffffff;
	float:none;
	width:175px;
}

#actualWidget .WM-blackButton span {
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/buttons.jpg) 100% -160px no-repeat;
	display:block;
	height:32px;
	line-height:2em;
	padding:0 17px;
	float:none;

}

#actualWidget .WM-twitterFeed h2 {
	padding:7px 0 7px 63px;
}

#actualWidget .WM-twitterFeed img  {
	float:left;
	display:block;
}

#actualWidget .WM-twitterFeed div {
	float:left;
	margin-bottom:1em;
	width:230px;
}

#actualWidget .WM-twitterFeed p {
	clear:both;
}

#actualWidget .WM-twitterFeed span  {
	display:block;
	color:#CF0F4A;
	font-weight:bold;
	line-height:15px;
}

#actualWidget .WM-twitterFeed span em {
	font-size:0.75em;
	color:#666666;
	font-weight:normal;
}

#actualWidget .WM-lifeCoach h2 {
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/lifeCoach.jpg) center left no-repeat;
}

#actualWidget .WM-didYouKnow h2 {
	background:url(http://work.stage-fiftyfootsquid.com/sprite/assets/sprite/img/magnify.jpg) center left no-repeat;
}
</style>

<div id="actualWidget">
    <ul id="actualWidgetList">
    	'.$widgets.'
    </ul>
</div>';
?>
