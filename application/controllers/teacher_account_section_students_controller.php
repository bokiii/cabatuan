<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_account_section_students_controller extends CI_Controller {  

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
		
		$this->load->model("section_students_model");
		$this->load->model("teacher_subject_sections_model");  
		$this->load->model("student_grade_model");
	}         

	public function index() {  
		$teacher_subject_id = $this->input->get("teacher_subject_id");
		
		$section_id = $this->input->get("section_id");   
		
		$data["section_id"] = $section_id;
		
		$get_teacher_subject_data_by_teacher_subject_id = $this->teacher_subject_sections_model->get_teacher_subject_data_by_teacher_subject_id($teacher_subject_id);               
		foreach($get_teacher_subject_data_by_teacher_subject_id as $row_a) {   
			$data['subject_id'] = $row_a->subject_id;
			$data['teacher_name'] = $row_a->last_name . ", " . $row_a->first_name . " " . $row_a->middle_name; 
			$data['subject'] = $row_a->subject;
		}
		
		$get_section_by_section_id = $this->section_students_model->get_section_by_section_id($section_id);   
		foreach($get_section_by_section_id as $row_b) {   
			$data['section'] = $row_b->section;
		}
	
		
		$data['main_content'] = "teacher_account_section_student_view";
		$this->load->view('template/teacher_content', $data);      
		
	}  
	
	
	
	public function get_student_enrolled_school_year() {   
		$section_id = $this->input->get("section_id");   
		$get_enrolled_student_school_years_by_section_id = $this->section_students_model->get_enrolled_student_school_years_by_section_id($section_id);                                                                      
		
		$data['school_years'] = $get_enrolled_student_school_years_by_section_id;  
		
		echo json_encode($data);
	
	}
	
	public function get_section_students_by_section_id_school_year_and_subject_id() {   
	
		$section_id = $this->input->get("section_id");     
		$school_year = $this->input->get("school_year");        
		$subject_id = $this->input->get("subject_id"); 		
		
		$get_section_students_by_section_id_school_year_and_subject_id = $this->section_students_model->get_section_students_by_section_id_school_year_and_subject_id($section_id, $school_year, $subject_id);
		$data["section_students"] = $get_section_students_by_section_id_school_year_and_subject_id;  
		
		echo json_encode($data);
	
	}   
	
	public function update_subject_grade() {   
		//$this->debug($this->input->get());     
		
		$data = array();
		
		$student_subject_grade_id = $this->input->get("student_subject_grade_id");       
		
		$subject_grade_data = array(   
			"first_quarter" => trim($this->input->get("first_quarter")), 
			"second_quarter" => trim($this->input->get("second_quarter")), 
			"third_quarter" => trim($this->input->get("third_quarter")), 
			"fourth_quarter" => trim($this->input->get("fourth_quarter")), 
			"final_grade" => trim($this->input->get("final_grade")), 
			"remarks" => trim($this->input->get("remarks"))
		);    
		
		$update_student_grade_by_id = $this->student_grade_model->update_student_grade_by_id($subject_grade_data, $student_subject_grade_id);
		if($update_student_grade_by_id) {  
			$data["status"] = true;
		} else {  
			$data["status"] = false;
		}
		
		echo json_encode($data);
	}
	
	
}    




























