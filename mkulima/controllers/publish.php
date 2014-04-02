<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publish extends ExtendedController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
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

	
	public function publish_article(){


	}


	public function demo()
    {

        /*
         * Uncomment this to create the table
        $this->load->model('Test_model', '', true);
        $oModel = new Test_model();
        $oModel->createTable();
        */

        $this->view->render();
    }

    public function urldemo() {
        $aUrlParams = $this->uri->uri_to_assoc(3);
        if (!isset($aUrlParams['param'])) {
            $aUrlParams['param'] = 1;
        }

        $this->load->model('Test_model', '', true);

        $this->view->render(array(
            'databaseData' => $this->Test_model->getValue($aUrlParams['param']),
            'id' => $aUrlParams['param']
        ));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */