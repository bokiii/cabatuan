<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section_students_controller extends CI_Controller {         

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
		
		$this->load->model("section_students_model");
		$this->load->model("teacher_subject_sections_model");
	
	}     
	
	public function index() {  
		$teacher_subject_id = $this->input->get("teacher_subject_id");
		
		$section_id = $this->input->get("section_id");   
		
		$data["section_id"] = $section_id;
		
		$get_teacher_subject_data_by_teacher_subject_id = $this->teacher_subject_sections_model->get_teacher_subject_data_by_teacher_subject_id($teacher_subject_id);               
		foreach($get_teacher_subject_data_by_teacher_subject_id as $row_a) {   
			$data['teacher_name'] = $row_a->last_name . ", " . $row_a->first_name . " " . $row_a->middle_name; 
			$data['subject'] = $row_a->subject;
		}
		
		$get_section_by_section_id = $this->section_students_model->get_section_by_section_id($section_id);   
		foreach($get_section_by_section_id as $row_b) {   
			$data['section'] = $row_b->section;
		}
	
		
		$data['main_content'] = "section_student_view";
		$this->load->view('template/content', $data); 
	}  
	
	public function get_student_enrolled_school_year() {   
		$section_id = $this->input->get("section_id");   
		$get_enrolled_student_school_years_by_section_id = $this->section_students_model->get_enrolled_student_school_years_by_section_id($section_id);                                                                      
		
		$data['school_years'] = $get_enrolled_student_school_years_by_section_id;  
		
		echo json_encode($data);
	
	}
	
	public function get_section_students_by_section_id_and_school_year() {  
		$section_id = $this->input->get("section_id");     
		$school_year = $this->input->get("school_year");         
		
		$get_section_students_by_section_id_and_school_year = $this->section_students_model->get_section_students_by_section_id_and_school_year($section_id, $school_year);
		$data["section_students"] = $get_section_students_by_section_id_and_school_year;  
		
		echo json_encode($data);
		
	}
	


}