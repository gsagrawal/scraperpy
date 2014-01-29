<?php

require_once("/protected/view/linkAddedView.php");
require_once("/protected/model/tblLinkModel.php");
require_once("/protected/model/tblContactModel.php");

//Controller class for the home page requests
class addLinkController extends baseController{

	private $view;
	private $viewData;
	private $contData;
	private $data;
	private $model;
	private $dbConn;

	private function getRequestParams(){
		
		$this->data["url"] = $_REQUEST["inpLink"];
		$this->data["price"] = $_REQUEST["inpTarget"];
		$this->data["email"] = $_REQUEST["inpEmail"];
		
	}


	private function tryToAddLink($url,$host){

		$linkId = 0;	
		$tblLinkModel = new tblLinkModel($this->dbConn);	
		$linkId = $tblLinkModel->addLink($url,$host);
		$tblContactModel = new tblContactModel($this->dbConn);
		$tblContactModel->addTargetEmail($this->data["email"],$this->data["price"],$linkId);
	}

	public function init($data){		
		$this->data = $data;
		$this->getRequestParams();
		$this->prettyPrint($this->data);
		$host = $this->getHost($this->data["url"]);
		$is_valid_host = $this->checkIfValidHost($host);

		if($is_valid_host){
			$this->dbConn = $this->acquireDbConn();
			$this->tryToAddLink($this->data["url"],$host);
		}else{

			throw "Host not valid";
		}

	}

}