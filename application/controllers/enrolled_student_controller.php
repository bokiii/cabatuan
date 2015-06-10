<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   

class Enrolled_student_controller extends CI_Controller {    

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  
		if($this->session->userdata('logged_in') != true) {
			redirect("login"); 
		}  
		
		$this->load->model("enrolled_student_model");   
	}    
	
	public function index() {  
		$enrolled_student_id = $this->input->get("enrolled_student_id");   
		
		$get_student_personal_data_by_enrolled_student_id = $this->enrolled_student_model->get_student_personal_data_by_enrolled_student_id($enrolled_student_id);                              
		foreach($get_student_personal_data_by_enrolled_student_id as $row) {
			$data["student_name"] = $row->student_name;
			$data["curriculum"] = $row->curriculum;   
			$data["section"] = $row->section;  
			$data["school_year"] = $row->school_year;
		}
		
		$data['main_content'] = "enrolled_student_view";
		$this->load->view('template/content', $data);    
	}   
	
	public function get_student_academic_data() {   
		$enrolled_student_id = $this->input->get("enrolled_student_id");   
		$get_student_academic_data_by_enrolled_student_id = $this->enrolled_student_model->get_student_academic_data_by_enrolled_student_id($enrolled_student_id);                            
	
		$data['academic_datas'] = $get_student_academic_data_by_enrolled_student_id; 
		echo json_encode($data);
	}

	
}   


































