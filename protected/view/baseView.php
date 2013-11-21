<?php

class baseView {

	

	function getCommonHead($params){

		$html  = "<html>";
		$html .= "<head>";

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

	function getPageSpecificHtml($params){

		$html  = "<body>";
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
		$html .= $this->getPageSpecificHtml($params);
		$html .= $this->getPageSpecificEndScript($params);
		$html .= $this->getCommonEndScript($params);
		$html .= $this->getCommonClose($params);

	}



};