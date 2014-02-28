<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Updates extends ExtendedController
{
	

	function __construct(){
		parent::__construct();
			if(!($this->ion_auth->logged_in())){
			redirect('accounts');
		}
	}

	function index(){
		$this->view->render();
	}

	function postResearch(){
		$this->view->render();

	}

	function downloadResearch(){

	}

	function uploadResearch(){

	}





	
}