<?php
require_once("config.php");
require_once("/protected/controller/homeController.php");

class scraperApp{

	private $req_method;
	private $req_url;	

	private function setRequestParams(){

		$this->req_method = $_SERVER["REQUEST_METHOD"];
		$this->req_url = str_replace(config::BASE_URL,"",$_SERVER['REQUEST_URI']);

	}

	public function init(){

		$this->setRequestParams();

		try{
			$ab = "homeController";
			$cont = new $ab();
			$contData->req_method = $this->req_method;
			$contData->req_url = $this->req_url;
			$cont->init($contData);

		}catch(Exception $exp){

			print "some error occoured";

		}


	}


}


$app = new scraperApp();

$app->init();