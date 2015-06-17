<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_account_controller extends CI_Controller {    

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");     
		
		if($this->session->userdata('student_logged_in') != true) {
			redirect("login");
		}      
		
		$this->load->model("student_model");   
		$this->load->model("student_account_model");
		
	}          
	
	public function index() {     
		$data['main_content'] = "student_account_view";
		$this->load->view('template/student_content', $data);   
	}   
	
	public function get_student_via_standard_model() {
	
		$student_id = $this->session->userdata("student_id");
		$get_students = $this->student_model->get_student_by_current_student_id($student_id);  
		
		$data['students'] = $get_students;        
		
		for($i = 0; $i < count($data["students"]); $i++) {  
			$student_id = $data['students'][$i]['id'];   
			$check_student_id = $this->student_account_model->check_student_id($student_id);  
			if($check_student_id != 0) {  
				$data['students'][$i]['button_type'] = "info";   
				$data['students'][$i]['button_value'] = "Update Account";   
			} else {  
				$data['students'][$i]['button_type'] = "default";   
				$data['students'][$i]['button_value'] = "Create Account";   
			}
		}
		
		echo json_encode($data);         
		
	}   
	
	public function list_student_enrolled_academic() {  
	
		$data = array();
		
		$student_id = $this->session->userdata("student_id");   
		$get_student_enrolled_academic_list_by_student_id = $this->student_model->get_student_enrolled_academic_list_by_student_id($student_id);
	
		$data['list_academics'] = $get_student_enrolled_academic_list_by_student_id;   
		echo json_encode($data);
	
	}
	
	
	
}      



















