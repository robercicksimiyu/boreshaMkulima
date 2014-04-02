<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_Model extends ExtendedModel
{
	

	public function single_article($id){
		$oResult=$this->db->get_where('expert_articles',array('id'=>$id));

		foreach($oResult->result() as $row){
			$sValue[]=$row;
		}
		return $sValue;
	}

}