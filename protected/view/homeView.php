<?php

require_once("baseView.php");

class homeView extends baseView{

	private $html = "";

	public function init($data){

		$this->renderPage($data);
	}

	function getPageSpecificHead($params){

		$html = "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/home.css' />";

		return $html;
	}

	function getPageSpecificBody($params){

		$html  = "<div class='container'>";
		$html .= "<div class='page-header'>";
		$html .= "<div class='head-links'>";
		$html .= "<a href='".config::BASE_URL."/aboutus'>ABOUT</a>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "<div class='page-body'>";
		$html .= "<div class='head-text'>";
		$html .= "<h1>Get Notified on Lowest Price</h1>";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<form id='frmInpLink' action='".config::BASE_URL."/addLink' method='POST'>";
		$html .= "<div>";
		$html .= "<input type='url' id='inpLink' name='inpLink' required placeholder='Enter a link'/>";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<input type='number' id='inpTarget' name='inpTarget' required placeholder='Enter your target Price' />";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<input type='email' id='inpEmail' name='inpEmail' required placeholder='Enter your Email to get notified.'/>";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<input class='btnSubmit' type='submit' value='Notify me'>";
		$html .= "</div>";
		$html .= "</form>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "</div>";

		return $html;

	}
};