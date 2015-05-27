<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');    

class Teacher_model extends CI_model {

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('teachers');    
		if($query) {
			return true; 
		} else {
			return false;
		}
		
	}  
	
	function get_teacher_by_teacher_id($teacher_id) {
		$this->db->where('id', $teacher_id);
		$query = $this->db->get('teachers');   
		return $query->result();
	}

}