<?php
/*
##############################################################
# 															 #
# Code by Ondra Rafaj ... ondrej.rafaj(at)fuerte(dot)cz		 #
# &copy;2007 fuerte.cz										 #
# 															 #
# 															 #
# 															 #
# 															 #
# 															 #
# 															 #
##############################################################

// Using of resize class

require_once('images.class.php');

$new_width = 100;
$new_height = 100;


// new instance of class
$img = new wgImages('image.jpg');

//create image from form
//$img = new wgImages($_FILES['image'], 'upload');

// create image from string
//$img = new wgImages($string, 'string');


// resizing image (constrain proportions)
$img->resize($new_width, $new_height);

// resizing image (use strictly setted params)
//$img->resize($new_width, $new_height, 'strict');


//saving image
$img->save('image.jpg');

// if you want another type of image
//$img->save('image.png', 'png');
//$img->save('image.gif', 'gif');


// clearing the memory
$img->clear();


// check error output
$errors = $img->getErrors();

*/

if (!defined('IMAGEQ')) define('IMAGEQ', 80);

class wgImages {
	
	private $newW = NULL;
	private $newH = NULL;
	private $source = NULL;
	private $image = NULL;
	private $imagepath = NULL;
	private $resampled = false;
	private $block = false;
	private $quality = IMAGEQ;
	private $error = array();
	private $watermark = NULL;
	
	// constructor, seting type of image
	public function __construct($image=NULL, $data='file') {
		if ($image == NULL) return false;
		clearstatcache();
		if ($data=='file') {
			if (is_array($image)) {
				/*if (!empty($image)) {
					$false=0;
					$x=0;
					$this->imagepath = array();
					$this->source = array();
					foreach ($image as $img) {
						if (file_exists($img)) {
							$this->source[] = $this->setImage($img, NULL, true);
//							if ($this->source != false) array_push($this->imagepath, $img);
//							else $false++;
						}
						else $false++;
						$x++;
					}
					if ($x==$false || $x==0) $this->error('noimageinarrayiswalid');
				}
				else $this->error('imagearrayisempty');*/ wgError::add('this functionality does not work yet');
			}
			else {
				if (file_exists($image)) {
					$this->source = $this->setImage($image);
					if ($this->source == false) $this->block = true;
					$this->image = $this->source;
					return;
				}
				else {
					$this->error('imagesourceisnotexist');
					$this->block = true;
					return false;
				}
			}
		}
		elseif ($data=='upload') {
			if (is_uploaded_file($image['tmp_name'])) {
				$this->source = $this->setImage($image['tmp_name'], $image['name']);
				if ($this->source == false) $this->block = true;
				unlink($image['tmp_name']);
			}
			else {
				$this->error('cantuploadfile');
				$this->block = true;
				return false;
			}
		}
		elseif ($data=='string') {
			$code = base64_decode($image);
			$this->source = imagecreatefromstring($code);
		}
		else {
			$this->error('badjobspecification');
			$this->block = true;
			return false;
		}
	}
	
	// create image
	public function create($w, $h, $params=array()) {
		$r = (int) $params[0];
		$g = (int) $params[0];
		$b = (int) $params[0];
		$this->image = imagecreate($w, $h);
		imagecolorallocate($this->image, $r, $g, $b);
	}
	
	// sets quality for jpeg image
	public function setQuality($num) {
		$num = (int) $num;
		if ($num < 1 || $num > 100) {
			$this->quality = 80;
			$this->error('wrongquality');
		}
		else $this->quality = $num;
	}
	
	// sets image to variable
	private function setImage($image, $name=NULL, $array=false) {
		if ($this->block != true) {
			if (!empty($name)) $nameimage = $name;
			else $nameimage = $image;
			$this->imagepath = $image;
			$jpg = array('jpg', 'jpeg');
			$png = array('png');
			$gif = array('gif');
			$extension = $this->getExtension($nameimage);
			if (in_array($extension, $jpg)) return imagecreatefromjpeg($image);
			elseif (in_array($extension, $png)) return imagecreatefrompng($image);
			elseif (in_array($extension, $gif)) return imagecreatefromgif($image);
			else {
				$this->error('wrongfileformat');
				return false;
			}
		}
	}
	
	// set new size of image
	public function resize($width, $height, $how='default') {
		if (!$this->block) {
			if ($how == 'default') {
				$oldW = imagesx($this->source);
				$oldH = imagesy($this->source);
				$thumbW = $width;
				$thumbH = ($oldH*$width)/$oldW;
				if ($thumbH > $height) {
					$thumbW = ($thumbW*$height)/$thumbH;
					$thumbH = $height;
				}
				$this->image = imagecreatetruecolor($thumbW, $thumbH);
				imagecopyresampled($this->image, $this->source, 0, 0, 0, 0, $thumbW, $thumbH, $oldW, $oldH);
				$this->resampled = true;
			}	
			elseif ($how == 'strict') {
				$oldW = imagesx($this->source);
				$oldH = imagesy($this->source);
				$thumbW = $width;
				$thumbH = $height;
				$this->image = imagecreatetruecolor($thumbW, $thumbH);
				imagecopyresampled($this->image, $this->source, 0, 0, 0, 0, $thumbW, $thumbH, $oldW, $oldH);
				$this->resampled = true;
			}	
		}
	}
	
	// set border for selected image
	public function setBorder($image) {
		imagecopyresampled($this->watermark, $image, 0, 0, 0, 0, 50, 50, 100, 100);
		if ($this->resampled == true) {
		
		}
		else {
		
		}
	}
	
	// returns default parameters to image
	public function resetSize() {
		if (!$this->block) $this->image = $this->source;
	}
	
	// save new image
	public function save($destination, $type='jpg', $quality=false) {
		if ($quality) $this->setQuality($quality);
		$dir = dirname($destination);
		if (!is_dir($dir)) $this->mkPath($dir);
		if (!is_dir($dir)) $this->error('pathnotexist');
		if (!$this->resampled) $this->resetSize();
		if (is_file($destination) && !is_writable($destination)) {
			$this->error('imagedestnotwritable');
			$this->block = true;
			return false;
		}
		if (!$this->block) {
			if ($type == 'jpg') @imagejpeg($this->image, $destination, $this->quality);
			elseif ($type == 'png') @imagepng($this->image, $destination);
			elseif ($type == 'gif') @imagegif($this->image, $destination);
		}
		return true;
	}
	
	// create a directory path
	private function mkPath($target) {
		umask(0000);
		if (is_dir($target)||empty($target)) return 1; // best case check first
		if (file_exists($target) && !is_dir($target)) return 0;
		if ($this->mkPath(substr($target,0,strrpos($target,'/'))))	return mkdir($target,0774); // crawl back up & create dir tree
		return 0;
	}
	
	// create a temp image (for preview in page)
	public function output($type='jpg') {
		if (!$this->block) {
			if($type=='jpg') {
				header("Content-Type: image/jpeg");
				echo imagejpeg($this->image);
			}
			elseif ($type=='png') {
				header("Content-Type: image/png");
				echo imagepng($this->image);
			}
			elseif ($type=='gif') {
				header("Content-Type: image/gif");
				echo imagegif($this->image);
			}
			else $this->error('wrongfiletype');
			exit();
		}
	}
	
	// clear cache
	public function clear() {
		if (!$this->block) imagedestroy($this->image);
	}
	
	// check for extension
	private function getExtension($name) {
		$extension = pathinfo($name);
		$extension = strtolower($extension["extension"]);
		return $extension;
	}
	
	// return errors
	public function getErrors() {
		return $this->error;
	}
	
	// write a new error
	private function error($error, $type=0) {
		$this->error[$type][] = $error;
	}
}
?>