<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discussion_Model extends ExtendedModel
{
	public function __construct(){
		parent::__construct();
		
	}

	public function askQuestion($question){
		$this->db->query('INSERT INTO `user_questions` (username,question)
			VALUES(?,?)',array($this->session->userdata('username'),$question));
	}

	public function search($quest){
		$oResult=$this->db->query("SELECT `id`,`question` FROM `user_questions` WHERE `question` LIKE '%".$quest."%'");
		if($oResult->num_rows()){
			foreach($oResult->result() as $row){
				$sValue[]=$row;
			}			
		}else{
			$sValue=null;
		}
		return $sValue;
	}

	
}