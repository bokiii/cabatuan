<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_account_subject_sections_controller extends CI_Controller {        

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
		
		$this->load->model('teacher_subject_sections_model');      
		$this->load->model('curriculum_subjects_model');  
		$this->load->model('teacher_subjects_model');   
		$this->load->model('curriculum_model');    
		$this->load->model('teacher_model');   
	}          
	
	public function index() {
		
		$teacher_subject_id = $this->input->get('teacher_subject_id');     
		
		$get_teacher_subject_curriculumm_id_by_teacher_subject_id = $this->teacher_subjects_model->get_teacher_subject_curriculumm_id_by_teacher_subject_id($teacher_subject_id);
		
		foreach($get_teacher_subject_curriculumm_id_by_teacher_subject_id as $row_a) {
			$curriculum_id = $row_a->curriculum_id;
		}
		
		$get_teacher_subject_data_by_teacher_subject_id = $this->teacher_subject_sections_model->get_teacher_subject_data_by_teacher_subject_id($teacher_subject_id);                  
  
		foreach($get_teacher_subject_data_by_teacher_subject_id as $row){
			$subject_id = $row->subject_id;
			
			$data['first_name'] = $row->first_name;   
			$data['last_name'] = $row->last_name;   
			$data['middle_name'] = $row->middle_name;   
			$data['subject'] = $row->subject;
		}   
		
		$data['teacher_subject_id'] = $teacher_subject_id;
		
		$data['main_content'] = "teacher_account_subject_section_view";
		$this->load->view('template/teacher_content', $data);   
		
	}         
	
	public function get_teacher_subject_section() {  
	
		$data = array();
		
		$teacher_subject_id = $this->input->get('teacher_subject_id');
		$get_teacher_subject_sections_by_teacher_subject_id = $this->teacher_subject_sections_model->get_teacher_subject_sections_by_teacher_subject_id($teacher_subject_id);                                                       
		
		$data['teacher_subject_sections'] = $get_teacher_subject_sections_by_teacher_subject_id;
		
		echo json_encode($data);   
	
	}
	
	
}    
















