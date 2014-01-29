<?php

class baseController{


	private $supported_hosts = array("FLIPKART");

	public function prettyPrint($data){

		print "<pre>";
		print_r($data);
		print "</pre>";

	}

	public function acquireDbConn(){

		try {
			$link = mysqli_connect("localhost","naman","IAMTHEBEST","scraperpy");

		}catch(Exception $exp){

			throw new Exception("Error in creating DB Link ".$exp,500);
			
		}

		if(!$link){
			throw new Exception("Error in creating DB Link ",500);
		}
		
		

		return $link;
	}


	public function getHost($url){


		$parsed_url = parse_url($url);
		$host_regex = '/www\.+([a-zA-Z]+)\.com/';
		preg_match($host_regex, $parsed_url['host'],$host);
		$host = $host[1];

		return $host;
	}


	public function checkIfValidHost($host){

		return in_array(strtoupper($host),$this->supported_hosts);
	}

}