<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Research_Model extends ExtendedModel
{
	public function __construct(){
		parent::__construct();
	}
	public function get($table="users",$start,$limit){
		$this->db->limit($start,$limit);
		$result=$this->db->get($table);
		if($result->num_rows()){
			foreach($result->result() as $row){
				$value[]=$row;
			}			
		}else{
			$value=null;
		}		
		return $value;
			
	}

	public function approve_author($id){
		$this->db->where('id',$id);
		$this->db->update('editors',array('activate'=>1));
	}

	public function post_research($data){
		$this->db->insert('research',$data);
	}

	
	
}