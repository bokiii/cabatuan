<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {      

	function __construct() {
		parent::__construct();
	}      
	
	function check_admin_username_and_password($username, $password) {
	
		$this->db->where("username", $username);   
		$this->db->where("password", $password);   
		
		$query = $this->db->get("admin_account");   
		return $query->result();
	
	}   
	
	function check_teacher_username_and_password($username, $password) {
		$this->db->where("username", $username);   
		$this->db->where("md5_password", $password);   
		
		$query = $this->db->get("teachers_account");   
		return $query->result();
	}   

	function check_student_username_and_password($username, $password) {   
	
		$this->db->where("username", $username);   
		$this->db->where("md5_password", $password);   
		$query = $this->db->get("students_account");     
		return $query->result();  
		
	}
	
	
}