<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_grade_model extends CI_Model {        

	function __construct() {
		parent::__construct();   
	}      
	
	function update_student_grade_by_id($subject_grade_data, $id) {  
		
		$this->db->where("id", $id); 
		$query = $this->db->update("students_subjects_grades", $subject_grade_data);  
		if($query) {  
			return true;
		} else {  
			return false;
		}
		
	}

}