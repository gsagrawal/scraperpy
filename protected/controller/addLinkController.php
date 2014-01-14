<?php

require_once("/protected/view/linkAddedView.php");

//Controller class for the home page requests
class addLinkController extends baseController{

	private $view;
	private $viewData;
	private $contData;
	private $data;

	private function getRequestParams(){
		
		$this->data["url"] = $_REQUEST["inpLink"];
		$this->data["price"] = $_REQUEST["inpPrice"];
		$this->data["email"] = $_REQUEST["inpEmail"];

	}

	public function init($data){		
		$this->data = $data;
		$this->getRequestParams();
		$this->prettyPrint($this->data);
	}
}