<?php

class homeView{

	private $html = "";

	public function init($data){

		$this->html = "<html>";
		$this->html .= "<head>";
		$this->html .= "</head>";
		$this->html .= "<body>";
		$this->html .= "Scrpaer";
		$this->html .= "</body>";
		$this->html .= "</html>";

		print $this->html;
	}
};