<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_account_controller extends CI_Controller {    

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");   
		
		if($this->session->userdata('teacher_logged_in') != true) {
			redirect("login");
		}   
		
		$this->load->model("teacher_subjects_model");    
		$this->load->model("teacher_account_model"); 		
	
	}         
	
	public function index() {  
		
		$teacher_id = $this->session->userdata('teacher_id');   
		
		$teacher = new Teacher();   
		$teachers = $teacher->where("id", $teacher_id)->get();     
		
		foreach($teachers as $row) {
			$data['first_name'] = $row->first_name; 
			$data['last_name'] = $row->last_name; 
			$data['middle_name'] = $row->middle_name; 
		}           
	
		$data['teacher_id'] = $teacher_id; 
		
		$data['main_content'] = "teacher_account_view";
		$this->load->view('template/teacher_content', $data);   
	}         
	
	public function get_teacher_subjects() {   
	
		$data = array();
		
		$teacher_id = $this->session->userdata('teacher_id'); 
		$get_teacher_subjects_by_teacher_id = $this->teacher_subjects_model->get_teacher_subjects_by_teacher_id($teacher_id);                                                       
		
		$data['teacher_subjects'] = $get_teacher_subjects_by_teacher_id;   
		
		echo json_encode($data);   
		
	}
	
	function set_teacher_account() {  
		$data = array();
		
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));     
		$md5_password = md5($password);
		$teacher_id = $this->input->post("teacher_id");   
		
		$teacher_account_data = array(  
			'username' => $username, 
			'password' => $password, 
			'md5_password' => $md5_password, 
			'teacher_id' => $teacher_id
		);   
		
		$set_teacher_account = $this->teacher_account_model->set_teacher_account($teacher_account_data, $teacher_id);                              
		
		if($set_teacher_account) {  
			$data['status'] = true; 
		} else { 
			$data['status'] = false; 
		}  
		
		echo json_encode($data);
		
	}       
	
	function get_teacher_account_data() {  
		$teacher_id = $this->input->get("teacher_id");   
		
		$get_teacher_account_by_teacher_id = $this->teacher_account_model->get_teacher_account_by_teacher_id($teacher_id);   
		
		if($get_teacher_account_by_teacher_id != null) {  
			$data['teacher_account'] = $get_teacher_account_by_teacher_id;  
		} else {  
			$data['teacher_account'] = array( 
				0 => array( 
					"username" => "", 
					"password" => ""
				)
			);  
		}
	
		echo json_encode($data);   
		
	}
	
}   















