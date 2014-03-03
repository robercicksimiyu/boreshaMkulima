<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	********************** CREATE ACCOUNT ********************************

	Description
	----------------------------------------------------------------------
	This class manages users and their details on the website

	Functionalities
	----------------------------------------------------------------------
	These functionalities include
	1. Creating user accounts
	2. Loging in the user
	3. Loging out the user
	4. Activating users account
	5. Deactivating user account
	6. Editinng the user
	7. Resetting forgotten password
	8. Show profile
	9. Show Captcha
	10. Varification

	The account will be used to allow participation in forums and allow specialist to post their articles
*/
class Accounts extends ExtendedController
{
	
	public function __construct(){
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));


	}

	function index(){
		$this->form_validation->set_rules('identity', 'Identity', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run()==true){
			$identity=$this->input->post('identity');
			$password=$this->input->post('password');
			$remember=(bool)$this->input->post('remember');

			if($this->ion_auth->login($identity,$password,$remember)){
				redirect('discussion');
			} else{
				$identity=array(
					'name'=>'identity',
					'type'=>'email',
					'id'=>'identity',
					'value'=>$this->form_validation->set_value('identity')
					);
				$password=array(
					'name'=>'password',
					'type'=>'password',
					);
				$this->message="sorry, please insert the right information";
			}			
		}
		else{
			$identity=array(
				'name'=>'identity',
				'type'=>'email',
				'id'=>'identity',
				'value'=>$this->form_validation->set_value('identity')
				);

			$password=array(
				'name'=>'password',
				'type'=>'password',
				);
		}

		if(isset($this->message)){
			$this->view->render(array(
				'password'=>$password,
				'identity'=>$identity,
				'message'=>$this->message
			));
		}else{
			$this->view->render(array(
				'password'=>$password,
				'identity'=>$identity
			));
		}
	}
	// creating a normal account
	function create_account(){
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('identity','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('c_password', 'confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|is_numeric');
		$group=array("2");
		if($this->form_validation->run()==true){
			$reg=$this->ion_auth->register($this->input->post('username'),$this->input->post('password'),
												$this->input->post('identity'),$this->input->post('phone'),$group);
			if($reg){
				redirect('discussion');

			}else{
				$username=array(
					'name'=>'username',
					'type'=>'text',
					'id'=>'username',
					'value'=>$this->form_validation->set_value('username')
					);

				$phone=array(
					'name'=>'phone',
					'type'=>'text',
					'id'=>'phone',
					'value'=>$this->form_validation->set_value('phone')
					);

				$identity=array(
					'name'=>'identity',
					'type'=>'email',
					'id'=>'identity',
					'value'=>$this->form_validation->set_value('identity')
					);

				$password=array(
					'name'=>'password',
					'type'=>'password',
					);
				$c_password=array(
					'name'=>'c_password',
					'type'=>'password');

				$message=$this->ion_auth->errors();

			}
		}
		else{
			$username=array(
				'name'=>'username',
				'type'=>'text',
				'id'=>'username',
				'value'=>$this->form_validation->set_value('username')
				);

			$phone=array(
				'name'=>'phone',
				'type'=>'text',
				'id'=>'phone',
				'value'=>$this->form_validation->set_value('phone')
				);

			$identity=array(
				'name'=>'identity',
				'type'=>'email',
				'id'=>'identity',
				'value'=>$this->form_validation->set_value('identity')
				);

			$password=array(
				'name'=>'password',
				'type'=>'password',
				);

			$c_password=array(
				'name'=>'c_password',
				'type'=>'password');

			$message=validation_errors();

		}

		$this->view->render(array(
			'username'=>$username,
			'identity'=>$identity,
			'phone'=>$phone,
			'password'=>$password,
			'c_password'=>$c_password,
			'message'=>$message			
			));
	}

	// logging in 
	function login(){
		$this->form_validation->set_rules('identity', 'Identity', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run()==true){
			$identity=$this->input->post('identity');
			$password=$this->input->post('password');
			$remember=(bool)$this->input->post('remember');

			if($this->ion_auth->login($identity,$password,$remember)){
				redirect('discussion');
			} else{
				$identity=array(
					'name'=>'identity',
					'type'=>'email',
					'id'=>'identity',
					'value'=>$this->form_validation->set_value('identity')
					);
				$password=array(
					'name'=>'password',
					'type'=>'password',
					);
				$this->message="sorry, please insert the right information";
			}			
		}
		else{
			$identity=array(
				'name'=>'identity',
				'type'=>'email',
				'id'=>'identity',
				'value'=>$this->form_validation->set_value('identity')
				);

			$password=array(
				'name'=>'password',
				'type'=>'password',
				);
		}

		if(isset($this->message)){
			$this->view->render(array(
				'password'=>$password,
				'identity'=>$identity,
				'message'=>$this->message
			));
		}else{
			$this->view->render(array(
				'password'=>$password,
				'identity'=>$identity
			));
		}

		

	}

	//Logging out from the forum
	function logout(){
		$this->ion_auth->logout();
		redirect('accounts','refresh');
	}

	


	function activate(){

	}

	function profile_setup(){

	}


	function deactivate(){

	}

	function edit_user(){

	}

	function forgot_password(){

	}

	function reset_password(){

	}

	function show_profile(){

	}

	function show_captcha(){

	}

	function verification(){

	}
}