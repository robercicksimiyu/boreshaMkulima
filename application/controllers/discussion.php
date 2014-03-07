<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Discussion extends ExtendedController
{
	

	function __construct(){
		parent::__construct();
		if(!($this->ion_auth->logged_in())){
			redirect('accounts');
		}
		$this->load->model('discussion_model');

	}

	function index(){

		$this->view->render();
	}

	function askQuestion(){
		$message=null;

		$this->form_validation->set_rules('search');
		if($this->form_validation->run()==true){
			$this->discussion_model->askQuestion($this->input->post('ask_question'));
			redirect('discussion');
		}

		$this->view->render();

	}

	function answerQuestion(){

	}

	function stopConversation(){

	}

	function search(){
		$result=null;
		$this->form_validation->set_rules('search', 'Search','required');
		if($this->form_validation->run()==true){
			$result=$this->discussion_model->search($this->input->post('search'));			
		}
		$this->view->render(array(
			'results'=>$result));
	}



	
}