<?php


class Dashboard extends ExtendedController
{
	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->is_admin()){
			redirect('/','refresh');
		}
		$this->load->model('admin_model');
		$this->load->library('pagination');
	}

	function index(){
		//print_r($this->admin_model->get('users'));
		$users_number=$this->discussion_model->db->count_all('users');
		$config['base_url']=site_url('admin/dashboard/index');
		$config['total_rows']=$users_number;
		$config['per_page']=5;
		$config['num_links']=$users_number/5;
		$config['uri_segment']=4;
		$config['full_tag_open']="<ul class='pagination pagination-lg'>";
		$config['full_tag_close']="</ul>";
		$config['cur_tag_open']="<li class='active'><a href='#'>";
		$config['cur_tag_close']="</a></li>";
		$config['num_tag_open']="<li>";
		$config['num_tag_close']="</li>";
		$config['last_tag_open']="<li class='next'>";
		$config['last_tag_close']="</li>";
		$config['next_link']="Newer &rarr;";
		$config['next_tag_open']="<li>";
		$config['next_tag_close']="</li>";
		$config['prev_link']="&larr; Older";
		$config['prev_tag_open']="<li>";
		$config['prev_config_close']="</li>";

		$this->pagination->initialize($config);

		$page=($this->uri->segment(4))?$this->uri->segment(4):0;
		
		
		$this->view->render(array(
			'users'=>$this->admin_model->get('users',$config['per_page'],$page)
		 	));
	}

	public function authors(){
		$authors_number=$this->discussion_model->db->count_all('editors');
		$config['base_url']=site_url('admin/dashboard/authors');
		$config['total_rows']=$authors_number;
		$config['per_page']=5;
		$config['num_links']=$authors_number/5;
		$config['uri_segment']=4;
		$config['full_tag_open']="<ul class='pagination pagination-lg'>";
		$config['full_tag_close']="</ul>";
		$config['cur_tag_open']="<li class='active'><a href='#'>";
		$config['cur_tag_close']="</a></li>";
		$config['num_tag_open']="<li>";
		$config['num_tag_close']="</li>";
		$config['last_tag_open']="<li class='next'>";
		$config['last_tag_close']="</li>";
		$config['next_link']="Newer &rarr;";
		$config['next_tag_open']="<li>";
		$config['next_tag_close']="</li>";
		$config['prev_link']="&larr; Older";
		$config['prev_tag_open']="<li>";
		$config['prev_config_close']="</li>";

		$this->pagination->initialize($config);

		$page=($this->uri->segment(4))?$this->uri->segment(4):0;
		
		
		$this->view->render(array(
			'authors'=>$this->admin_model->get('editors',$config['per_page'],$page)
		 	));
	}

	public function activate($id){
		$this->ion_auth->update($id,array('active'=>1,));
		redirect('admin/dashboard','refresh');
	}

	public function delete_user($id){
		$this->ion_auth->delete_user($id);
		redirect('admin/dashboard','refresh');
	}

	public function block($id){
		$this->ion_auth->update($id,array('active'=>0,));
		redirect('admin/dashboard','refresh');
	}

	public function approve_author($id){
		$this->admin_model->approve_author($id);
		redirect('admin/dashboard/authors','refresh');
	}

	public function block_author($id){
		$this->admin_model->db->update('editors',array('activate'=>0),array('id'=>$id));
		redirect('admin/dashboard/authors','refresh');
	}

	public function delete_author($id){
		$this->admin_model->db->delete('editors',array('id'=>$id));
		redirect('admin/dashboard/authors','refresh');
	}
}

?>