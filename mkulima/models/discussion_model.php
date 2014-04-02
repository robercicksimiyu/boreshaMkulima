<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discussion_Model extends ExtendedModel
{
	public function __construct(){
		parent::__construct();
		
	}

	public function askQuestion($question){
		$this->db->query('INSERT INTO `user_questions` (posted_by,question)
			VALUES(?,?)',array($this->session->userdata('username'),$question));
		return;
	}

	public function search($quest){
		$this->db->order_by('time_posted','DESC');
		$this->db->select('users.gravator,user_questions.id, posted_by,question,time_posted');
		$this->db->from('user_questions');
		$this->db->like('question',$quest);
		$this->db->join('users','users.username=user_questions.posted_by');
		// $oResult=$this->db->query("SELECT `id`,`posted_by`,`question`,`time_posted` FROM `user_questions` WHERE `question` LIKE '%".$quest."%'");
		$oResult=$this->db->get();
		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValue[]=$row;
			}			
		}else{
			$sValue=null;
		}
		return $sValue;
	}

	public function questions($start,$limit){
		$this->db->limit($start,$limit);
		$this->db->order_by('time_posted','DESC');
		$this->db->select('user_questions.id,username,question,time_posted');
		$this->db->from('user_questions');
		$this->db->join('users','users.username=user_questions.posted_by');
		$oResult=$this->db->get();
		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValues[]=$row;
			}
		}
		else{
				$sValues=null;
		}

		return $sValues;
	}

	public function question_count(){
		$qCount=$this->db->get('user_questions');

		return $qCount->num_rows();
	}

	public function gravator($username){
		$this->db->select('gravator');
		$this->db->limit('1');
		$oResult=$this->db->get_where('users',array('username'=>$username));
		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValue[]=$row;
			}
					
		}
		else{
			$sValue=null;
		}

		return $sValue;
	}

	public function main_question_comment($values=array()){
		$this->db->insert('discussion_answers',$values);
		return;
	}

	public function main_comments($question_id){
		$oResult=$this->db->get_where('discussion_answers',array('question_id'=>$question_id));
		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValue[]=$row;
			}
		}
		else{
			$sValue=null;
		}

		return $sValue;
	}

	public function answer_comment($values=array()){
		$this->db->insert('discussion_answer_comment',$values);
		return;
	}

	public function show_answer_comment($answer_id){
		$oResult=$this->db->get_where('discussion_answer_comment',array('answer_id'=>$answer_id));

		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValue[]=$row;
			}
		}
		else{
			$sValue=null;
		}

		return $sValue;

	}

	public function view_question($question_id){
		$this->db->where(array("user_questions.id"=>$question_id));
		$this->db->select('user_questions.id,username,question,time_posted');
		$this->db->from('user_questions');
		$this->db->join('users','users.username=user_questions.posted_by');
		$oResult=$this->db->get();

		if($oResult->num_rows()){
			foreach ($oResult->result() as $row) {
				$sValue[]=$row;
			}
			return $sValue;
		}
		else{
			return $sValue=null;
		}
		return $sValue;
	}

	public function all_events($limit,$start){
		$this->db->limit($limit,$start);
		$this->db->order_by('time_posted','desc');
		$results=$this->db->get('events');
		if($results->num_rows>0){
			foreach($results->result() as $dat){
				$data[]=$dat;
			}

			return $data;
		}else{
			return $data=array();
		}
	}

	public function counts($table){
		return $this->db->get($table)->num_rows();
	}
	
}