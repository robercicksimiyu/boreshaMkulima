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
	
	The account will be used to allow participation in forums and allow specialist to post their articles
*/
class Accounts extends ExtendedController
{
	private $expiration=null;

	// constructor
	public function __construct(){
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->model('accounts_model','',true);
		// Setting the two hour limit for expiration
		$this->expiration=time()-7200;
	}

	// creating a normal account
	function create_account(){
		$message=null;
		//loading tje captcha helper
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
		$this->form_validation->set_message('is_unique','The email address already exists');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[6]|xss_clean|alpha');
		$this->form_validation->set_rules('identity','Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','password','trim|required|min_length[8]');
		$this->form_validation->set_rules('c_password', 'confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|is_numeric|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('captcha_code',"Captcha Code",'trim|required|callback_captcha_check');
		$group=array("2");
		if($this->form_validation->run()==true){
			$reg=$this->ion_auth->register($this->input->post('username'),$this->input->post('password'),
												$this->input->post('identity'),$this->input->post('phone'),$group);
			if($reg){
				$this->session->set_flashdata('success','Congratulations! please await confirmation');
				redirect('login');
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
					'value'=>$this->form_validation->set_value('password')
					);
				$c_password=array(
					'name'=>'c_password',
					'type'=>'password',
					'value'=>$this->form_validation->set_value('c_password'));

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
				'value'=>$this->form_validation->set_value('password')
				);
			$c_password=array(
				'name'=>'c_password',
				'type'=>'password',
				'value'=>$this->form_validation->set_value('c_password'));

			$message=validation_errors();
		}
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
		$this->db->query($query);
		//rendering the view
		$this->view->render(array(
			'username'=>$username,
			'identity'=>$identity,
			'phone'=>$phone,
			'password'=>$password,
			'c_password'=>$c_password,
			'message'=>json_encode($message),
			'captcha_img'=>$img['image']
			));
	}

	function captcha_check($str){
		// Checking if the captcha exists
		$sql='SELECT COUNT(*) AS  count FROM captcha WHERE word=? AND ip_address=? AND captcha_time>?';
		$binds=array($str,$this->input->ip_address(),$this->expiration);
		$query=$this->db->query($sql,$binds);
		$row=$query->row();
		if($row->count==0){
			$this->form_validation->set_message('captcha_check', 'Submit the word appearing on the image');
			return false;
		}else{
			return true;
		}
	}
	// Login in function
	function login(){
		$message=null;
		$this->form_validation->set_rules('identity', 'Identity', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run()==true){
			$identity=$this->input->post('identity');
			$password=$this->input->post('password');
			$remember=(bool)$this->input->post('remember');

			if($this->ion_auth->login($identity,$password,$remember)){
				if($this->ion_auth->is_admin()){
					redirect('admin/dashboard','refresh');
				}
				if($this->accounts_model->check_editor($this->session->userdata('username'))){
					$this->session->set_userdata(array('role'=>'editor'));
				}
				redirect('discussion','refresh');
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
				$message=$this->ion_auth->errors();
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

			$message=validation_errors();

		}

		$this->view->render(array(
			'password'=>$password,
			'identity'=>$identity,
			'message'=>$message
		));
	}
	//Logging out from the forum
	function logout(){
		$this->ion_auth->logout();
		redirect('/','refresh');
	}
	//Function for profile setup
	function profile_setup(){
		$message=null;
		if(!($this->ion_auth->logged_in())){
			redirect('accounts','refresh');
		}

		$update=$this->ion_auth->update($this->session->userdata('user_id'),array(
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'phone'=>$this->input->post('phone'),
			'location'=>$this->input->post('residence'),
			'interests'=>$this->input->post('interests'),
			'fb_link'=>$this->input->post('fb_link'),
			'twitter_link'=>$this->input->post('twitter_link'),
			));
		
			$this->accounts_model->upload_profile_pic('profile_pic');

			
		
		
		if($update){
			$this->session->set_flashdata('profile_msg','Profile was successfully updated');
			redirect('accounts/account_settings','refresh');
		}
		else{
			redirect('account/account_settings','refresh');
		}
		
	}
	//Personal accounts setting/ Personal profile
	function account_settings(){
		$profile_data=$this->accounts_model->profile($this->session->userdata('username'));
		$this->view->render(array(
			'profile_data'=>$profile_data));
	}
	//Upload new profile picture 
	function upload_profile_picture(){
		
		redirect('profile');
	}
	//Function for changing password
	function forgot_password(){
		$message="null";
		$email=array(
			'name'=>"email",
			'type'=>"email",
			'id'=>"email",
			'placeholder'=>'Email Address'
			);
		$this->form_validation->set_rules('email','Email Address','required|valid_email');
		if($this->form_validation->run()==false){
			$message=validation_errors();
		}
		else{
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if($forgotten){
				$this->session->set_flashdata('success','Check you email for the password');
				redirect('login','refresh');
			}
			else{
				$message="Sorry, no account found with this email</p>";
			}
		}
		$this->view->render(
			array(
				'email'=>$email,
				'message'=>$message));
	}

	public function change_password(){
		$message=null;
		$this->form_validation->set_rules('old','Old Password','required');
		$this->form_validation->set_rules('new','New Password','required|min_legnth[8]|max_length[22]|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm','Confirm new Password','required');

		if(!$this->ion_auth->logged_in()){
			redirect('accounts','refresh');
		}
		
		if($this->form_validation->run()==false){
			$message=validation_errors();
		}
		else{
			$identity=$this->session->userdata('email');
			$change=$this->ion_auth->change_password($identity,
											$this->input->post('old'),
											$this->input->post('new'));

			if($change){
				$message=$this->ion_auth->messages();
				$this->logout();
			}else{
				redirect('accounts','refresh');
			}
			
		}
		$old=array(
			'type'=>'password',
			'name'=>'old',
			'id'=>'old',
			'placeholder'=>'Current Password'
			);
		$new=array(
			'type'=>'password',
			'name'=>'new',
			'id'=>'new',
			'placeholder'=>'New Password'
			);
		$confirm=array(
			'type'=>'password',
			'name'=>'new_confirm',
			'id'=>'new_confirm',
			'placeholder'=>'Confrim Password'
			);
		$this->view->render(array(
			'old'=>$old,
			'new'=>$new,
			'confirm'=>$confirm,
			'message'=>$message
			)
		);
	}
	//Cheking profile for other users
	public function profile($username=null){
		$this->view->render(array(
			'profile_data'=>$this->accounts_model->profile($username),
			'questions_num'=>$this->accounts_model->quest_num($username),
			'answers_num'=>$this->accounts_model->answers_num($username),
			'comments_num'=>$this->accounts_model->comments_num($username)));
	}
	//applying to be an editor of the main blog
	public function apply_editor(){
		if($this->accounts_model->check_editor_application($this->session->userdata('username'))){
			$this->session->set_flashdata('editor_error','Sorry! Apllication failed. Read and condition for further information');
			redirect('/','refresh');
		}
		$message=null;
		$this->form_validation->set_rules('category',"Category",'required');
		$this->form_validation->set_rules('specialization',"Specialization",'required');
		$this->form_validation->set_rules('working_place',"Place of Work",'required');
		$this->form_validation->set_rules('experience',"Experience",'required');
		$this->form_validation->set_rules('about_info','About Information','required');

		if($this->form_validation->run()==true){
			$this->accounts_model->editor_application(array(
				'username'=>$this->session->userdata('username'),
				'category_id'=>$this->input->post('category'),
				'working_place'=>$this->input->post('working_place'),
				'specialization'=>$this->input->post('specialization'),
				'experience'=>$this->input->post('experience'),
				'about_info'=>$this->input->post('about_info')));
			$this->session->set_flashdata('editor_a',"Thank you for applying, please await confirmation. Keep checking");
			redirect('welcome','refresh');
		}
		else{
			$message=validation_errors();
		}

		$this->view->render(array(
			'message'=>$message));
	}
	//Checking question posted by a certain user
	function question_by($username){
		$result=$this->accounts_model->db->limit('5')->get_where('user_questions',array('posted_by'=>$username))->result();
		if($result){
			return $result;			
		}else{
			return $result=null;
		}
	}
	//Checking answers from a given user
	function answer_by($username){
		$result=$this->accounts_model->db->order_by('time_answered','desc')->limit('5')->get_where('discussion_answers',array('username'=>$username))->result();
		if($result){
			return $result;			
		}else{
			return $result=null;
		}
	}
	//Deleting question and its answer
	function delete_question($id){
		$this->accounts_model->db->where('id',$id)->delete('user_questions');
		$this->accounts_model->db->where('question_id',$id)->delete('discussion_answers');
		redirect('profile');
	}

	function successful_reg(){
		$this->view->render();
	}


	function update_profile(){
		
	}
}