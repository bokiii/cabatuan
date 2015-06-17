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
	
	
	
}   















