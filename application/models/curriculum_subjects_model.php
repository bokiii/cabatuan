<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_subjects_model extends CI_Model {       

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('curriculum_subjects');    
		if($query) {
			return true; 
		} else {
			return false;
		}
		
	}  
	
	function get_curriculum() {
		$this->db->select('curriculum_subjects.curriculum_id, curriculums.curriculum');  
		$this->db->from('curriculum_subjects');       
		$this->db->join('curriculums', 'curriculums.id = curriculum_subjects.curriculum_id', 'left');		
		$this->db->group_by("curriculum_subjects.curriculum_id");		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_curriculum_subjects_by_curriculum_id($id) {
		$this->db->select("id, subject");     
		$this->db->from('curriculum_subjects');          
		$this->db->where('curriculum_id', $id);		
		$query = $this->db->get();   
		return $query->result();
	}
	
	function get_curriculum_sections_by_curriculum_id($id) {
		$this->db->select("id, section");     
		$this->db->from('curriculum_sections');          
		$this->db->where('curriculum_id', $id);		
		$query = $this->db->get();   
		return $query->result();
	}

}    













