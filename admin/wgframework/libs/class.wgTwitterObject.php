<?php
class wgTwitterObject {
	
	public $data = array();
	public $user = array();
	
	public static function getTestResults() {
		$tw = new wgTwitterObject();
		$tw->user['screen_name'] = 'WebGuru3 CMS';
		$tw->user['name'] = 'WebGuru';
		$tw->user['profile_image_url'] = '';
		$tw->data['created_at'] = date('Y-m-d H:i:s');
		$tw->data['text'] = 'WGError: No connection';
		$tw->data['id'] = '0';
		return $tw;
	}
	
	
	public function getUsername() {
		if (isset($this->user['screen_name'])) return $this->user['screen_name'];
	}
	
	public function getFullname() {
		if (isset($this->user['name'])) return $this->user['name'];
	}
	
	public function getImage() {
		if (isset($this->user['profile_image_url'])) return $this->user['profile_image_url'];
	}
	
	public function getDate() {
		if (isset($this->data['created_at'])) return $this->data['created_at'];
	}
	
	public function getText() {
		if (isset($this->data['text'])) return wgHtml::parseUrlsToLinks($this->data['text']);
	}

	public function getId() {
		if (isset($this->data['id'])) return $this->data['id'];
	}
}

?>