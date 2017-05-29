<?php
header('Access-Control-Allow-Origin: *');
date_default_timezone_set("America/Santiago");

class MY_Controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	protected function getJSON($array, $key){
		return ($array && isset($array[$key])) ? $array[$key] : null;
	}
	
	protected function curlPost($url, $body){
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,            $url );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_POST,           1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS,     $body ); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/json')); 

		return curl_exec ($ch);
	}

}
// END MY_Controller class

/* End of file MY_Controller.php */
