<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * The Welcome class is used handle the first page of the web application
 *
 * @category      Controller
 * @package       Mkulima
 * @license       BSD License
 * @version       1.0.0.0
 * @since         2014-05-01
 * @author        Robercick Simiyu <robercicksimiyu@gmail.com>
 */

class Welcome extends ExtendedController {
	private $expiration=NULL;
	public function __construct(){
		parent::__construct();
		$this->load->model('publish_model');
		//$this->output->enable_profiler(TRUE);
		$this->expiration=time()-7200;
        $this->message=NULL;
	}

	//Displayig the articles
	public function index($topic=NULL){
        $this->view->setTitle('Welcome|Boresha Mkulima');
		$this->view->render(array(
			'articles'=>$this->publish_model->get_articles($topic)
		));
	}
	// Viewing at a specific article
	public function view_article($id){
		$this->view->render(array(
			'articles'=>$this->publish_model->single_article($id)));
	}
	// Showing the research banner
    public function research(){
    	$this->load->helper('captcha');
    	//captcha configuration
    			$captcha=array(
    				'word'=>'',
    				'img_path'=>'./captcha/',
    				'img_url'=>base_url().'captcha/',
    				'font_path'=>site_url('public/fonts/casual/casual.tff'),
    				'img_width'=>'320',
    				'img_height'=>'70',
    				'expiration'=>'60',
    				);
    			// deleting old captchas
    			$this->db->query("DELETE FROM captcha WHERE captcha_time<".$this->expiration);
    			//validating registeration form
    			//create image captcha
    			$img=create_captcha($captcha);
    			//capture data
    			$data=array(
    				'captcha_time'=>$img['time'],
    				'ip_address'=>$this->input->ip_address(),
    				'word'=>$img['word']
    				);
    			//inserting captcha in the database
    			$query=$this->db->insert_string('captcha',$data);
    	$this->view->render(array(
    		'captcha_img'=>$img['image']
    		));
    }
    // Showing the discussion banner
    public function discussion(){
        $this->load->helper('captcha');
        //captcha configuration
                $captcha=array(
                    'word'=>'',
                    'img_path'=>'./captcha/',
                    'img_url'=>base_url().'captcha/',
                    'font_path'=>site_url('public/fonts/casual/casual.tff'),
                    'img_width'=>'320',
                    'img_height'=>'70',
                    'expiration'=>'60',
                    );
                // deleting old captchas
                $this->db->query("DELETE FROM captcha WHERE captcha_time<".$this->expiration);
                //validating registeration form
                //create image captcha
                $img=create_captcha($captcha);
                //capture data
                $data=array(
                    'captcha_time'=>$img['time'],
                    'ip_address'=>$this->input->ip_address(),
                    'word'=>$img['word']
                    );
                //inserting captcha in the database
                $query=$this->db->insert_string('captcha',$data);
        $this->view->render(array(
            'captcha_img'=>$img['image']
            ));
    	
    }

    function subscribe(){
        $this->message=NULL;
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->form_validation->run()){
            if ($this->controller->ion_auth->logged_in()) {
                $this->discussion->db->insert(array(
                    'username'=>$this->session->userdata('username'),
                   'email'=>$this->session->userdata('email')));
            }else{
                $this->discussion->db->insert(array(
                   'email'=>$this->post->input('email')));
            }            
            $this->session->set_flashdata('subscribe',"successfully subscribed");
            $message="Thank you for the subscription";
            redirect('/');
        }else{
            $this->message=validation_errors();
        }
         $this->view->render(array(
            'message'=>$message));
    }
    

}

