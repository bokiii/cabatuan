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
		$this->load->model("enrolled_student_model");
		
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
	
	public function list_student_enrolled_academic_revised() {   
	
		$data = array();
		
		$student_id = $this->session->userdata("student_id");   
		$get_student_enrolled_academic_list_by_student_id = $this->student_model->get_student_enrolled_academic_list_by_student_id_revised($student_id);
	
		$data['list_academics'] = $get_student_enrolled_academic_list_by_student_id;   
		
		for($i = 0; $i < count($data['list_academics']); $i++) { 
			
			
			$data['list_academics'][$i]['subjects_and_grades'] = array();  
			
			$get_student_academic_data_by_enrolled_student_id = $this->enrolled_student_model->get_student_academic_data_by_enrolled_student_id($data['list_academics'][$i]['id']);
			
			array_push($data['list_academics'][$i]['subjects_and_grades'], $get_student_academic_data_by_enrolled_student_id);
			
		}   
		
		echo json_encode($data);  
		
	}
	
	
	public function get_student_academic_full_list() { 
		
		
		$get_student_by_current_student_id = $this->student_model->get_student_by_current_student_id($this->session->userdata("student_id"));
		
		foreach($get_student_by_current_student_id as $row) { 
			$data['first_name'] = $row['first_name'];    
			$data['last_name'] = $row['sur_name'];  
			$data['middle_name'] = $row['middle_name'];
		}     
		
		$data['main_content'] = "get_student_full_academic_full_list_view";
		$this->load->view('template/student_content', $data);   
	}
	
	
	
	function set_student_account() {  
		$data = array();
		
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));     
		$md5_password = md5($password);
		$student_id = $this->input->post("student_id");   
		
		$student_account_data = array(  
			'username' => $username, 
			'password' => $password, 
			'md5_password' => $md5_password, 
			'student_id' => $student_id
		);   
		
		$set_student_account = $this->student_account_model->set_student_account($student_account_data, $student_id);                              
		
		if($set_student_account) {  
			$data['status'] = true; 
		} else { 
			$data['status'] = false; 
		}  
		
		echo json_encode($data); 
		
	}       
	
	function get_student_account_data() {  
		
		$student_id = $this->input->get("student_id");   
		
		$get_student_account_by_student_id = $this->student_account_model->get_student_account_by_student_id($student_id);   
		
		if($get_student_account_by_student_id != null) {  
			$data['student_account'] = $get_student_account_by_student_id;  
		} else {  
			$data['student_account'] = array( 
				0 => array( 
					"username" => "", 
					"password" => ""
				)
			);  
		}
	
		echo json_encode($data);   
		
	}
	
}      



















