<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enrolled_student_model extends CI_Model {   

	function __construct() {
		parent::__construct();
	}   
	
	function get_student_personal_data_by_enrolled_student_id($enrolled_student_id) {
		$this->db->select("concat(students.sur_name,' ',students.first_name, ', ',students.middle_name) as student_name, curriculums.curriculum, curriculum_sections.section", FALSE);                            
		$this->db->from("enrolled_students");  
		$this->db->join("students", "students.id = enrolled_students.student_id");   
		$this->db->join("curriculums", "curriculums.id = enrolled_students.curriculum_id");
		$this->db->join("curriculum_sections", "curriculum_sections.id = enrolled_students.section_id");
		$this->db->where("enrolled_students.id", $enrolled_student_id);  
		
		$query = $this->db->get(); 
		return $query->result();
	}  
	
	function get_student_academic_data_by_enrolled_student_id($enrolled_student_id) {
		$this->db->select("curriculum_subjects.subject, 
			students_subjects_grades.first_quarter, students_subjects_grades.second_quarter, students_subjects_grades.third_quarter, students_subjects_grades.fourth_quarter, students_subjects_grades.final_grade, students_subjects_grades.remarks                                              
		");
		$this->db->from("enrolled_student_subjects");       
		$this->db->join("curriculum_subjects", "curriculum_subjects.id = enrolled_student_subjects.subject_id");
		$this->db->join("students_subjects_grades", "students_subjects_grades.enrolled_student_subject_id = enrolled_student_subjects.id");  
		$this->db->where("enrolled_student_subjects.enrolled_student_id", $enrolled_student_id); 
		$query = $this->db->get();
		return $query->result_array();
	}


}   




























