<?php

class tblContactModel{

	
	private $dbConn;


	function tblContactModel($dbConn){

		$this->dbConn = $dbConn;
	}

	public function getContactsByLinkId($linkId){

		$query = "Select * from tblcontact where linkid=".$linkId." and delete_flag=0";
		$result = $this->dbConn->query($query);
		//Returns 0 if query fails
		return $result;
			
		
	}

	public function addTargetEmail($email,$price,$linkId){

		$query = "INSERT into tblcontact(email,linkid,target) 
				  values ('".$email."',
			  			   ".$linkId.",
				           ".$price."
				          );";
		$this->dbConn->query($query);
		//Returns 0 if query fails
		return $this->dbConn->insert_id;
			
		
	}

}