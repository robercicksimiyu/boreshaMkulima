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
	public function profile($id){
		$oResult=$this->db->query('SELECT username, email, first_name, created_on,last_login,last_name,location,interests,phone,gravator FROM `users` WHERE id=?',array($id));
		if($oResult->num_rows()){
			foreach($oResult->row() as $row){
				$sValue[]=$row;
			}			
		} else{
			$sValue=null;
		}
		return $sValue;
	}	
}