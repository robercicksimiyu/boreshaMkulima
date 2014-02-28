<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Discussion extends ExtendedController
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

	function askQuestion(){
		$this->view->render();

	}

	function answerQuestion(){

	}

	function stopConversation(){

	}



	
}