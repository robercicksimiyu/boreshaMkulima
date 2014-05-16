<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publish extends ExtendedController {

	/**
	 - Publish controller handles publishing of expert articles
	 - Fetches all the articles published
	 - 
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('publish_model');

		if(!$this->session->userdata('role')){
			redirect('/','refresh');
		}
	}
	public function index()
	{
		$message=null;
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('article','Article Content','required');
		

		if($this->form_validation->run()==true){
			$this->publish_model->post_article(array(
				'author'=>$this->session->userdata('username'),
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post('article'),
				'category_id'=>$this->accounts_model->input_check_category($this->session->userdata('username'))
				));
			redirect('/','refresh');
		}
		else{
			$message=validation_errors();
		}
		
		$this->view->render(array(
			'message'=>$message));
	}
}

