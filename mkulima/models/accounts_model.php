<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts_Model extends ExtendedModel
{
	public function __construct(){
		parent::__construct();
		
	}

	public function getValue($iInput)
	{
	    $oResult = $this->db->query('SELECT `value` FROM `test_table` WHERE id = ?', array($iInput));
	    if ($oResult->num_rows()) {
	        $sValue = $oResult->row()->value;
	    } else {
	        $sValue = 'NO VALUE!';
	    }
	    return $sValue;
	}

	// getting profile details
	public function account_setting($username){
		$this->db->limit('1');
		$oResult=$this->db->get_where('users',array('username'=>$username));
		// $sql=$this->db->query('SELECT username, email, first_name, created_on,last_login,last_name,location,interests,phone,gravator,fb_link,twitter_link FROM `users` WHERE id=? LIMIT 1',array($id));
		// $oResult=$this->db->query($sql,array($this->sesssion->userdata('id')));
		if($oResult->num_rows()){
			foreach($oResult->row() as $row){
				$sValue[]=$row;
			}			
		} else{
			$sValue=null;
		}
		return $sValue;
	}

	public function profile($username){
		$oResult=$this->db->query('SELECT username, email, first_name, created_on,last_login,last_name,location,interests,phone,gravator,fb_link,twitter_link  FROM `users` WHERE username=?',array($username));
		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValue[]=$row;
			}			
		} else{
			$sValue=null;
		}
		return $sValue;
	}	

	public function editor_application($values=array()){
		$this->db->insert('editors',$values);
		return;
	}

	public function check_editor($username){
		$editorApproved=$this->db->get_where('editors',array('username'=>$username,'activate'=>1));

		if($editorApproved->num_rows()){
			return true;
		}
		else{
			return false;
		}
	}

	public function check_category($username){
		$editorCategory=$this->db->get_where('editors',array('username'=>$username));
		foreach($editorCategory->result() as $row){
			return $this->find_category($row->category_id);
		}		
	}

	public function input_check_category($username){
		$editorCategory=$this->db->get_where('editors',array('username'=>$username));
		foreach($editorCategory->result() as $row){
			return $row->category_id;
		}		
	}

	public function check_editor_application($username){
		$editorApproved=$this->db->get_where('editors',array('username'=>$username,'activate'=>1));

		if($editorApproved->num_rows()){
			return true;
		}
		else{
			return false;
		}
	}

	public function find_category($cat_id){
		$cat_name=$this->db->get_where('category',array('id'=>$cat_id));
		foreach($cat_name->result() as $row){
			return $row->category_name;
		}

	}

	public function quest_num($username){
		return $this->db->get_where('user_questions',array('posted_by'=>$username))->num_rows();
	}

	public function answers_num($username){
		return $this->db->get_where('discussion_answers',array('username'=>$username))->num_rows();
	}

	public function comments_num($username){
		return $this->db->get_where('discussion_answer_comment',array('username'=>$username))->num_rows();
	}

	public function upload_profile_pic($field_name){
		$username=$this->session->userdata('username');
		$gallery_path='./public/img/account_pics/';
		$config=array(
			'allowed_types'=>'gif|jpeg|jpg|png',
			'upload_path'=>$gallery_path);
		$this->load->library('upload',$config);

		if($this->upload->do_upload($field_name)){
			$pic=NULL;
			$prev_pics=$this->db->select('gravator')->get_where('users',array('username'=>$username));
			foreach($prev_pics->result() as $row){
				$pic=$row->gravator;
			}
			
							
			if(file_exists($pic)){
				chmod('./public/img/account_pics/'.$pic, 0777);
				unlink('./public/img/account_pics/'.$pic);
			}
			$upload_data=$this->upload->data();
			$this->db->where(array('username'=>$username));
			$this->db->update('users',array('gravator'=>$upload_data['file_name']));	

			$config=array(
				'source_image'=>$upload_data['full_path'],
				'new_image'=>$gallery_path.'thumbs/',
				'maintain_ratio'=>true,
				'width'=>85,
				'height'=>85
				);
			$this->load->library('image_lib',$config);	
			$this->image_lib->resize();
			return true;
		}else{
			return false;
			// echo "file din't upload". $this->upload->display_errors();
			// var_dump($config);
			// echo "<img src='".IMG."account_pics/mrembo.png' alt=''>";
			// exit;
		}
		
	}



}