<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends ExtendedController {

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
		
		$this->output->enable_profiler(TRUE);
		
	}
	
	public function index($topic=null)
	{
		// define('CLASSMAP_PATH',APPPATH.'/config/classmap.php');

		$this->view->render(array(
			'articles'=>$this->publish_model->get_articles($topic)
		));
		// echo CLASSMAP_PATH;
	}

	public function view_article($id){
		$this->view->render(array(
			'articles'=>$this->publish_model->single_article($id)));
	}


	
    public function research(){
    	$this->view->render();
    }

    public function discussion(){
    	$this->view->render();
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */