<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Discussion extends ExtendedController
{
	

	function __construct(){
		parent::__construct();
		if(!($this->ion_auth->logged_in())){
			redirect('discussion_forum');
		}
		$this->load->model('discussion_model');
		$this->load->library('pagination');
		// $this->output->enable_profiler(TRUE);

	}

	function index(){
		$questions_number=$this->discussion_model->question_count();
		$config['base_url']=site_url('discussion/index');
		$config['total_rows']=$questions_number;
		$config['per_page']=5;
		$config['num_links']=$questions_number/8;
		$config['uri_segment']=3;
		$config['full_tag_open']="<ul class='pagination pagination-lg'>";
		$config['full_tag_close']="</ul>";
		$config['cur_tag_open']="<li class='active'><a href='#'>";
		$config['cur_tag_close']="</a></li>";
		$config['num_tag_open']="<li>";
		$config['num_tag_close']="</li>";
		$config['last_tag_open']="<li class='next'>";
		$config['last_tag_close']="</li>";
		$config['next_link']="Older &rarr;";
		$config['next_tag_open']="<li>";
		$config['next_tag_close']="</li>";
		$config['prev_link']="&larr; Newer";
		$config['prev_tag_open']="<li>";
		$config['prev_config_close']="</li>";

		$this->pagination->initialize($config);

		$page=($this->uri->segment(3))?$this->uri->segment(3):0;

		$result=$this->discussion_model->questions($config['per_page'],$page);

		$this->view->render(array(
			'questions'=>$result,
			'question_number'=>$questions_number));
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
			echo json_encode($result);
			return;			
		}
		$this->view->render(array(
			'results'=>$result));
	}

 

	function gravator($username){
		$gravator=$this->discussion_model->gravator($username);
		foreach ($gravator as $row){
			return $row->gravator;
			
		}
		
	}

	function main_question_comment(){
		$this->form_validation->set_rules('main_post_comment',"Comment",'required');
		if($this->form_validation->run()==true){
			$this->discussion_model->main_question_comment(array(
				'question_id'=>$this->input->post('question_id'),
				'answer'=>$this->input->post('main_post_comment'),
				'username'=>$this->session->userdata('username'))
			);
			redirect('discussion/view_question/'.$this->input->post('question_id'),'refresh');
		}
		else{
			redirect('discussion','refresh');
		}
	}
	

	function answer_comment(){
		$this->form_validation->set_rules('answer_comment',"Comment",'required');
		if($this->form_validation->run()==true){
			$this->discussion_model->answer_comment(array(
				'answer_id'=>$this->input->post('answer_id'),
				'username'=>$this->session->userdata('username'),
				'comment'=>$this->input->post('answer_comment'))
			);
			redirect('discussion/view_question/'.$this->input->post('question_id'),'refresh');
		}
		else{
			// redirect('discussion','refresh');
		}
	}


	function view_question($question_id){
		$question=$this->discussion_model->view_question($question_id);
		// var_dump($question);
		// foreach ($question as $key) {
		// 	echo $key->posted_by;
		// }
		// // $key->posted_by;
		// exit;

		$this->view->render(array(
			'questions'=>$question));
		
	}

	
}