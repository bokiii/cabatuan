<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {      

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('students');    
		if($query) {
			return true; 
		} else {
			return false;
		}
	}        
	
	function insert_enrolled_student($data, $object_subject_data) {
		$this->db->trans_start();
		$this->db->insert('enrolled_students', $data);  
		$enrolled_student_id = $this->db->insert_id();
		
		foreach($object_subject_data as $row) {
			$this->db->set("subject_id", $row->id);  
			$this->db->set("enrolled_student_id", $enrolled_student_id);  
			$this->db->set("created", date("Y-m-d H:i:s"));  	 
			$this->db->insert("enrolled_student_subjects");  
			$enrolled_student_subject_id = $this->db->insert_id();   
			
			$this->db->set("enrolled_student_subject_id", $enrolled_student_subject_id) ;
			$this->db->insert("students_subjects_grades");  
		}

		if($this->db->trans_complete()) {
			return true;
		} else {  
			return false;
		}
	}  
	
	function get_students() {
		$this->db->select("students.id, students.sur_name, students.first_name, students.middle_name, students.lrn, students.sex, students.date_of_birth, students.place_of_birth, students.age, students.present_address, students.school_last_attended, students.school_address, students.grade_or_year_level, students.school_year, students.tve_specialization, students.father, students.mother, students.person_to_notify, students.address, students.contact_number, students.user_type, students.created, students.updated,    
			enrolled_students.id as enrolled_student_id
		"); 

		$this->db->from("students");     
		$this->db->join("enrolled_students", "enrolled_students.student_id = students.id", "left");
		//$this->db->group_by("enrolled_students.student_id");  
		$this->db->group_by("students.id");
		$query = $this->db->get();    

		return $query->result_array();
	
	}   
	
	function get_student_enrolled_academic_list_by_student_id($student_id) {  
		$this->db->select("enrolled_students.id, curriculums.curriculum, curriculum_sections.section, enrolled_students.school_year");   
		$this->db->from("enrolled_students");      
		$this->db->join("curriculums", "curriculums.id = enrolled_students.curriculum_id", "left");   
		$this->db->join("curriculum_sections", "curriculum_sections.id = enrolled_students.section_id", "left"); 
		$this->db->where('enrolled_students.student_id', $student_id);  
		$query = $this->db->get(); 
		return $query->result_array();
	} 

}   











































