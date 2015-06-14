<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_account_model extends CI_Model {    

	function __construct() {
		parent::__construct();
	}   
	
	function check_teacher_id($teacher_id) {    
		$this->db->where('teacher_id', $teacher_id);  
		$this->db->from("teachers_account");    
		$count = $this->db->count_all_results();  
		return $count;
	}
	
	
	function set_teacher_account($teacher_account_data, $teacher_id) {  
		
		if($this->check_teacher_id($teacher_id) == 0) {    
			$query = $this->db->insert('teachers_account', $teacher_account_data);  
		} else {  
			$this->db->where("teacher_id", $teacher_id);  
			$query = $this->db->update("teachers_account", $teacher_account_data);  
		}    
		
		if($query) {  
			return true;
		} else {  
			return false;
		}
	}  
	
	function get_teacher_account_by_teacher_id($teacher_id) {  
		$this->db->where('teacher_id', $teacher_id);  	
		$query = $this->db->get("teachers_account"); 
		return $query->result_array();
	}  
	
	
	
	
}   















