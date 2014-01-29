<?php

require_once("baseController.php");
require_once("../model/tblLinkModel.php");
require_once("../model/tblContactModel.php");



class scrapeLinksController extends baseController{
	
	private $linksData;
	private $dbConn;
	private $linkIdForDeletions = array();
	private $contactIdForDeletions = array();


	private function getAllLinksData(){

		$linkModel = new tblLinkModel($this->dbConn);

		$this->linksData = $linkModel->getAllLinks();

		while($row = $this->linksData->fetch_object()){

			$price = $this->getPriceOfLink($row->url,$row->host);
			
			$this->comparePriceAndSendMail($row->id,$price);


		}

	}

	private function getPriceOfLink($url,$host){

		switch (strtoupper($host)) {
			case 'FLIPKART':
				# code...
					return $this->getFlipkartLinkPrice($url);
				break;
			
			default:
				# code...
				break;
		}

	}

	private function getFlipkartLinkPrice($url){

		$htmldata = file_get_contents($url);
		$regex = '/<span class=\"[a-zA-z\- ]+pprice [a-zA-z\- ]+\">[A-Za-z\. ]+([\d]+)<\/span>/';
		preg_match($regex,$htmldata,$match);
		return $match[1];

		
	}

	private function comparePriceAndSendMail($linkId,$curr_price){

		$contactModel = new tblContactModel($this->dbConn);
		$contacts = $contactModel->getContactsByLinkId($linkId);

		while($row=$contacts->fetch_object()){

			if($curr_price < $row->target){

				$this->sendMailToContact($row->email,$row->target,$curr_price);
				//Mark this contact for deletion
				array_push($this->contactIdForDeletions,$row->id);

			}
		}


	}

	private function sendMailToContact($mailId,$targetPrice,$curr_price){

		mail($mailId,"Price at your level"," target price ".$targetPrice." current price ".$curr_price);
		print "Sending mail to ".$mailId." target price ".$targetPrice." current price ".$curr_price;
	}


	public function init(){
		

		$this->dbConn = $this->acquireDbConn();

		$this->getAllLinksData();

		/*$data = file_get_contents('http://www.flipkart.com/riverstone-full-sleeve-solid-sweatshirt/p/itmdpnkzbfcyhmwk');
		$regex = '/<span class=\"[a-zA-z\- ]+pprice [a-zA-z\- ]+\">[A-Za-z\. ]+([\d]+)<\/span>/';
		preg_match($regex,$data,$match);
		print $match[1];*/
	}

}


$slc = new scrapeLinksController();
$slc->init();