<?php

class baseView {

	

	function getCommonHead($params){

		$html  = "<html>";
		$html .= "<head>";
		$html .= "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/reset.css' />";
		$html .= "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/common.css' />";
		$html .= "<script type='text/javascript' src='".config::BASE_URL."/public/js/jquery-1.10.2.min.js'></script>";

		return $html;

	}


	function getPageSpecificHead($params){
		
		$html  = "";
		return $html;

	}

	function getCommonHeadClose($params){

		$html  = "</head>";
		return $html;
	}


	function getCommonBody($params){

		$html  = "<body>";
		return $html;

	}

	function getPageSpecificBody($params){

		$html  = "";
		return $html;

	}

	function getPageSpecificEndScript($params){

		$html = "";

		return $html;
	}

	function getCommonEndScript($params){

		$html = "";

		return $html;

	}

	function getCommonClose($params){

		$html  = "</body>";
		$html .= "</html>";

		return $html;

	}


	public function renderPage($params){

		$html = $this->getCommonHead($params);
		$html .= $this->getPageSpecificHead($params);
		$html .= $this->getCommonHeadClose($params);
		$html .= $this->getCommonBody($params);
		$html .= $this->getPageSpecificBody($params);
		$html .= $this->getPageSpecificEndScript($params);
		$html .= $this->getCommonEndScript($params);
		$html .= $this->getCommonClose($params);

		print $html;

	}



};