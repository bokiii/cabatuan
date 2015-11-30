<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verification_model extends CI_Model {     

	public function __construct() {  
		parent::__construct();   
	}  
	
	public function getUnverifiedStudentViaCode($verificationCode) {  
		
		$this->db->where('verification', $verificationCode);  
		$query = $this->db->get("unverified_students");   
		
		return $query->result();     
	}   
	
	public function deleteIfVerified($verificationCode) {   
		$this->db->where('verification', $verificationCode);  
		$query = $this->db->delete("unverified_students");   

		if($query) {  
			return true;
		} else {  
			return false;
		}
	}
 
	
}