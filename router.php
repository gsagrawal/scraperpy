<?php

class router {


	private $routerReq = array();
	private $reqData;

	function router($pReqData){

		$this->routerReq["GET"] =  array();
		$this->routerReq["POST"] =  array();

		$this->routerReq["GET"]["/"] = "homeController"; 

		if(is_array($this->routerReq[$pReqData["REQUEST_METHOD"]])){
			$this->reqData = $pReqData;
		}else{

				throw new Exception("Page Not Found",404);
		}




	}

	public function getController(){
		if(isset($this->routerReq[$this->reqData["REQUEST_METHOD"]][$this->reqData["REQUEST_URL"]])){
			return $this->routerReq[$this->reqData["REQUEST_METHOD"]][$this->reqData["REQUEST_URL"]];	
		}else{

			throw new Exception("Page Not Found",404);
		}
		

	}

};