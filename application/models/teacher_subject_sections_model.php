<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_subject_sections_model extends CI_Model {      

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('teachers_subjects_sections');    
		if($query) {
			return true; 
		} else {
			return false;
		}
	}       
	
	function get_teacher_subject_data_by_teacher_subject_id($id) { 
	
		$this->db->select("teachers_subjects.subject_id, teachers.first_name, teachers.last_name, teachers.middle_name, curriculum_subjects.subject");
		$this->db->from("teachers_subjects");   
		$this->db->join("teachers", "teachers.id = teachers_subjects.teacher_id", "left");   
		$this->db->join('curriculum_subjects', 'curriculum_subjects.id = teachers_subjects.subject_id', "left");
		$this->db->where('teachers_subjects.id', $id);    
		
		$query = $this->db->get();   
		return $query->result();
	
	}  
	
	function get_teacher_subject_sections_by_teacher_subject_id($teacher_subject_id) {
	
		$this->db->select("teachers_subjects_sections.id, curriculum_sections.section, curriculums.curriculum");
		$this->db->from('teachers_subjects_sections');     
		$this->db->join("curriculum_sections", "curriculum_sections.id = teachers_subjects_sections.section_id");
		$this->db->join("curriculums", "curriculums.id = curriculum_sections.curriculum_id");
		
		$this->db->where('teachers_subjects_sections.teacher_subject_id', $teacher_subject_id);  
		$query = $this->db->get();  
		return $query->result();
	
	}
	
	function check_teacher_subject_section_by_section_id_and_subject_id($id, $subject_id) {
		$this->db->select('*');  
		$this->db->from("teachers_subjects_sections");      
		$this->db->join("teachers_subjects", "teachers_subjects.id = teachers_subjects_sections.teacher_subject_id");
		$this->db->where("teachers_subjects_sections.section_id", $id);   
		$this->db->where("teachers_subjects.subject_id", $subject_id);
		$query = $this->db->get();   
		return $query->result();
	}

	
	
}     

























