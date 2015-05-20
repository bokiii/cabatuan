<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_sections_model extends CI_Model {       

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('curriculum_sections');    
		if($query) {
			return true; 
		} else {
			return false;
		}
	}     
	
	
}