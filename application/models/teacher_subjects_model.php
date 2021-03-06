<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');     

class Teacher_subjects_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('teachers_subjects');    
		if($query) {
			return true; 
		} else {
			return false;
		}
	}         
	
	function get_teacher_subjects_by_teacher_id($teacher_id) {
		
		$this->db->select("teachers_subjects.id, curriculum_subjects.subject, curriculums.curriculum");
		$this->db->from('teachers_subjects');     
		$this->db->join('curriculum_subjects', 'curriculum_subjects.id = teachers_subjects.subject_id', 'left');                           
		$this->db->join('curriculums', 'curriculums.id = curriculum_subjects.curriculum_id', 'left');
		$this->db->where('teachers_subjects.teacher_id', $teacher_id);
		$query = $this->db->get();   
		
		return $query->result_array();  
		
	}

	function check_teacher_subject_by_subject_id_and_teacher_id($id, $teacher_id) {
	
		$this->db->where('subject_id', $id);      
		$this->db->where('teacher_id', $teacher_id);
		$query = $this->db->get('teachers_subjects');   
		
		return $query->result();
	
	}
	
	function get_teacher_subject_curriculumm_id_by_teacher_subject_id($teacher_subject_id) {
	
		$this->db->select('curriculum_subjects.curriculum_id');   
		$this->db->from('teachers_subjects');     
		$this->db->join('curriculum_subjects', 'curriculum_subjects.id = teachers_subjects.subject_id');
		$this->db->where('teachers_subjects.id', $teacher_subject_id);   
		$query = $this->db->get();  
		
		return $query->result();
	
	}
	
	

}








