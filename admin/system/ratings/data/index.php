<?php
chdir('../../../');
require('init/init.basic.php');
wgSystem::setModule('ratings');
wgModules::runModule('ratings');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Multiple Ajax Star Rating Bars</title>

<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>

<link rel="stylesheet" type="text/css" href="css/rating.css" />
</head>

<body>

	
<?php
echo moduleRatings::getRatingBar('This is my name', moduleRatings::getRatingId(1, 'var'),'');
echo moduleRatings::getRatingBar('Another name', moduleRatings::getRatingId(2, 'var'),'');


echo moduleRatings::getRatingBar('This is my name', 'id1','');
echo moduleRatings::getRatingBar('This is my name', '2id',5);
echo moduleRatings::getRatingBar('This is my name', '3xx',6);
echo moduleRatings::getRatingBar('This is my name', '4test',8);
echo moduleRatings::getRatingBar('This is my name', '5560');
echo moduleRatings::getRatingBar('This is my name', '66234','','static');
echo moduleRatings::getRatingBar('This is my name', '66334','');
echo moduleRatings::getRatingBar('This is my name', '63334','');
?>


</body>
</html>