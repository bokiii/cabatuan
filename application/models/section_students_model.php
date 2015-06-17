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
	
	function get_section_students_by_section_id_school_year_and_subject_id($section_id, $school_year, $subject_id) {    
		
		$this->db->select("concat(students.sur_name,' ',students.first_name, ', ',students.middle_name) as student_name, students_subjects_grades.first_quarter, students_subjects_grades.second_quarter, students_subjects_grades.third_quarter, students_subjects_grades.fourth_quarter, students_subjects_grades.id as student_subject_grade_id, students_subjects_grades.final_grade, students_subjects_grades.remarks", FALSE);                                                        
		$this->db->from("enrolled_students");      
		
		$this->db->join("students", "students.id = enrolled_students.student_id");  
		$this->db->join("enrolled_student_subjects", "enrolled_student_subjects.enrolled_student_id = enrolled_students.id");     
		$this->db->join("students_subjects_grades", "students_subjects_grades.enrolled_student_subject_id = enrolled_student_subjects.id");     
		
		$this->db->where("enrolled_students.section_id", $section_id);  
		$this->db->where("enrolled_students.school_year", $school_year);      
		$this->db->where("enrolled_student_subjects.subject_id", $subject_id);
		
		$query = $this->db->get();  
		return $query->result_array();  
		
	}   
	
	
}    








