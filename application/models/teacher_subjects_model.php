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

}  














