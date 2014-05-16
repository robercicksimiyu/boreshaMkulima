<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Research extends ExtendedController
{
	function __construct(){
		parent::__construct();
			if(!($this->ion_auth->logged_in())){
				redirect('research_center');
			}

			$this->load->model('research_model','',true);
	}
	// Home page for reach with research posted
	function index(){
		$this->view->render(array(
			'research'=>$this->research_model->db->get('research')->result()));
	}
	// Post a new research
	function research_start(){
		$message=null;
		$this->form_validation->set_rules('title','Research Title','trim|required');
		$this->form_validation->set_rules('research','Research Content','trim|required');

		if($this->form_validation->run()==true){
			$this->research_model->db->insert('research',array(
				'topic'=>$this->input->post('title'),
				'reseacher'=>$this->session->userdata('username'),
				'excerpt'=>$this->input->post('research'),
				'content'=>$this->input->post('research'),
				'tags'=>$this->input->post('tags'),
				'status'=>0,			
				));
			redirect('research');
		}else{
			$message=validation_errors();
		}
		$this->view->render(array(
			'message'=>$message));
	}
	//View a give research
	function view_research($id){
		$this->view->render(array(
			'research'=>$this->research_model->db->get_where('research',array('id'=>$id))->result()
			));
	}
	// Handling edited research
	function edit_research($id){
		$this->form_validation->set_rules('title','Topic','trim|required');
		$this->form_validation->set_rules('research','Research','trim|required');
		if($this->form_validation->run()==true){
			if($this->uri->segment(4)!=$this->session->userdata('username')){
				redirect('research/view_research/'.$id,'refresh');
			}
			$this->research_model->db->update('research',array('topic'=>$this->input->post('title'),'content'=>$this->input->post('research')),array('id'=>$id));
			redirect('research/view_research/'.$id,'refresh');
		}
		$this->view->render(array(
			'research'=>$this->research_model->db->get_where('research',array('id'=>$id))->result()
			));
	}
	// Editor for posting research
	function postResearch(){
		$this->view->render();

	}
}