<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_model extends CI_Model {    

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('curriculums');    
		if($query) {
			return true; 
		} else {
			return false;
		}
		
	}   
	
	function get_curriculum_by_id($id) {
		$this->db->select('curriculum');   
		$this->db->from('curriculums');   
		$this->db->where('id', $id);  
		$query = $this->db->get();  
		return $query->result();
	}

}