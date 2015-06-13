<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section_students_model extends CI_Model {      

	function __construct() {
		parent::__construct();   
	}      
	
	function get_enrolled_student_school_years_by_section_id($section_id) {  
		$this->db->select("enrolled_students.school_year");   
		$this->db->from("enrolled_students");
		$this->db->where("enrolled_students.section_id", $section_id);   
		$this->db->group_by("enrolled_students.school_year");
		$query = $this->db->get();
		return $query->result_array();
	}     
	
	function get_section_by_section_id($section_id) {   
		$this->db->select("section");   
		$this->db->from("curriculum_sections");     
		$this->db->where("id", $section_id);
		$query = $this->db->get();  
		
		return $query->result();
	}  
	
	function get_section_students_by_section_id_and_school_year($section_id, $school_year) {    
		$this->db->select("concat(students.sur_name,' ',students.first_name, ', ',students.middle_name) as student_name", FALSE); 
		$this->db->from("enrolled_students");      
		$this->db->join("students", "students.id = enrolled_students.student_id");
		$this->db->where("enrolled_students.section_id", $section_id);  
		$this->db->where("enrolled_students.school_year", $school_year);   
		$query = $this->db->get();  
		
		return $query->result_array();
	
	}
	
	
	
	
}