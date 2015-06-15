<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_account_model extends CI_Model {    

	function __construct() {
		parent::__construct();
	}   
	
	function check_student_id($student_id) {    
		$this->db->where('student_id', $student_id);  
		$this->db->from("students_account");    
		$count = $this->db->count_all_results();  
		return $count;
	}
	
	
	function set_student_account($student_account_data, $student_id) {  
		
		if($this->check_student_id($student_id) == 0) {    
			$query = $this->db->insert('students_account', $student_account_data);  
		} else {  
			$this->db->where("student_id", $student_id);  
			$query = $this->db->update("students_account", $student_account_data);  
		}    
		
		if($query) {  
			return true;
		} else {  
			return false;
		}
	}  
	
	function get_student_account_by_student_id($student_id) {  
		$this->db->where('student_id', $student_id);  	
		$query = $this->db->get("students_account"); 
		return $query->result_array();
	}  
	
	
	
	
}   















