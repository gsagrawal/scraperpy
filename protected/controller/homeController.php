<?php

require_once("/protected/view/homeView.php");


//Controller class for the requests
class homeController {

	private $view;
	private $viewData;
	private $data;


	public function init($data){
		$this->data = $data;
		$this->view  = new homeView();
		$this->view->init($this->viewData);
	}
}