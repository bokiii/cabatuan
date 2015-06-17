<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {   


	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");   
		
		if($this->session->userdata('logged_in') == true) {
			redirect("home");
		}                       
		
		if($this->session->userdata('teacher_logged_in') == true) {
			redirect("teacher_account_controller");
		}      
		
		if($this->session->userdata('student_logged_in') == true) {
			redirect("student_account_controller");
		}   
		
		
		
	}   
	
	public function index() {
		
		$this->load->view('login_view');
		
	}       
	
	public function register_enrollee() {
	
		$this->debug($this->input->post());
	}
	


}