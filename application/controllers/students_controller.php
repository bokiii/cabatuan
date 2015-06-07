<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_controller extends CI_Controller {      

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
		
		$this->load->model('student_model');  
		$this->load->model('curriculum_subjects_model');
	}     
	
	public function index() {
		$data['main_content'] = "student_view";
		$this->load->view('template/content', $data);    
	}            
	
	public function get_student() { 
	
		$data = array();
	
		$student = new Student(); 
		$students = $student->get();     
		
		$data['students'] = $students->all_to_array();  
		
		echo json_encode($data);     

	}   
	
	public function get_student_via_standard_model() {
	
		$get_students = $this->student_model->get_students();  
		
		$data['students'] = $get_students;     
		
		echo json_encode($data);      
		
	}
	
	public function add_student() {
		
		$data = array();
	
		$student = new Student();
		$student->sur_name = $this->input->post('sur_name');     
		$student->first_name = $this->input->post('first_name');   
		$student->middle_name = $this->input->post('middle_name');   		  
		$student->lrn = $this->input->post('lrn');   
		$student->sex = $this->input->post('sex');  
		$student->date_of_birth = $this->input->post('date_of_birth');  
		$student->place_of_birth = $this->input->post('place_of_birth');   
		$student->age = $this->input->post('age');      
		$student->present_address = $this->input->post('present_address');   
		$student->school_last_attended = $this->input->post('school_last_attended');   
		$student->school_address = $this->input->post('school_address');   
		$student->grade_or_year_level = $this->input->post('grade_or_year_level');   
		$student->school_year = $this->input->post('school_year');   
		$student->tve_specialization = $this->input->post('tve_specialization');  
		$student->father = $this->input->post('father');  
		$student->mother = $this->input->post('mother');   
		$student->person_to_notify = $this->input->post('person_to_notify');   
		$student->address = $this->input->post('address');   
		$student->contact_number = $this->input->post('contact_number');   
		$student->user_type = "student";  		
	
		if(!$student->save()) {  
			$data['status'] = false;   
			$data['errors'] = $student->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
	
	}

	public function delete_student() {  
		
		$data = array();  
	
		$student_id = $this->input->post('student_id');  
		if($student_id != null) {
			$delete = $this->student_model->delete($student_id);
			if($delete) {
				$data['status'] = true;
			} else {
				$data['status'] = false;
			}   
		} else {
			$data['status'] = false;
		}
	
		echo json_encode($data);
	
	}   
	
	public function update_student() {
		
		$data = array();
		
		$id = $this->input->post('update_id');
	
		$student = new Student($id);
		$student->sur_name = $this->input->post('sur_name_update');      
		$student->first_name = $this->input->post('first_name_update');   
		$student->middle_name = $this->input->post('middle_name_update');		
		$student->lrn = $this->input->post('lrn_update');  
		$student->sex = $this->input->post('sex_update');  
		$student->date_of_birth = $this->input->post('date_of_birth_update');   
		$student->place_of_birth = $this->input->post('place_of_birth_update');  
		$student->age = $this->input->post('age_update');   
		$student->present_address = $this->input->post('present_address_update');   
		$student->school_last_attended = $this->input->post('school_last_attended_update');   
		$student->school_address = $this->input->post('school_address_update');   
		$student->grade_or_year_level = $this->input->post('grade_or_year_level_update');   
		$student->school_year = $this->input->post('school_year_update');   
		$student->tve_specialization = $this->input->post('tve_specialization_update');   
		$student->father = $this->input->post('father_update');   
		$student->mother = $this->input->post('mother_update');      
		$student->person_to_notify = $this->input->post('person_to_notify_update');   
		$student->address = $this->input->post('address_update');   
		$student->contact_number = $this->input->post('contact_number_update');
		
		if(!$student->save()) {  
			$data['status'] = false;   
			$data['errors'] = $student->error->string;
		} else {
			$data['status'] = true;   
		}  
		
		echo json_encode($data); 

	}              
	
	public function get_student_update_content_by_id() {
		
		$data = array();
		$id = $this->input->get('id');  
		
		$student = new Student(); 
		$students = $student->where('id', $id)->get();        
	
		foreach($student as $row) {
			$data['id'] = $row->id;   
			$data['sur_name'] = $row->sur_name;   
			$data['first_name'] = $row->first_name;  
			$data['middle_name'] = $row->middle_name;  
			$data['lrn'] = $row->lrn;  
			$data['sex'] = $row->sex;  
			$data['date_of_birth'] = $row->date_of_birth;   
			$data['place_of_birth'] = $row->place_of_birth;  
			$data['age'] = $row->age;  
			$data['present_address'] = $row->present_address;   
			$data['school_last_attended'] = $row->school_last_attended;  
			$data['school_address'] = $row->school_address;  
			$data['grade_or_year_level'] = $row->grade_or_year_level;  
			$data['school_year'] = $row->school_year;  
			$data['tve_specialization'] = $row->tve_specialization;  
			$data['father'] = $row->father;  
			$data['mother'] = $row->mother;  
			$data['person_to_notify'] = $row->person_to_notify;   
			$data['address'] = $row->address;   
			$data['contact_number'] = $row->contact_number;   
			$data['user_type'] = $row->user_type;
		}   
		
		echo json_encode($data);
	}

	public function get_curriculum_sections_by_curriculum_id() {
	
		$curriculum_id = $this->input->get("curriculum_id");   
		$curriculum_section = new Curriculum_section(); 
		$curriculum_sections = $curriculum_section->where('curriculum_id', $curriculum_id)->get();       

		$data['curriculum_sections'] = $curriculum_sections->all_to_array();   
		
		echo json_encode($data);
	
	}
	
	public function enroll_student() {
	
		$data = array(); 
		
		$curriculum_id = $this->input->post("curriculum_selection");  
		$section_id = $this->input->post('section_selection');    
		$school_year = trim($this->input->post("school_year"));
		$student_id = $this->input->post('student_id_selection');  
		
		$enrolled_student_data = array(  
			"curriculum_id" => $curriculum_id,
			"section_id" => $section_id, 
			"student_id" => $student_id, 
			"school_year" => $school_year,
			"current" => true, 
			"accomplished" => false,
			"created" => date("Y-m-d H:i:s")
		);       
		
		$get_curriculum_subjects_by_curriculum_id = $this->curriculum_subjects_model->get_curriculum_subjects_by_curriculum_id($curriculum_id);              
		
		$insert_enrolled_student = $this->student_model->insert_enrolled_student($enrolled_student_data, $get_curriculum_subjects_by_curriculum_id);
		
		if($insert_enrolled_student) {
			$data['status'] = true;
		} else {  
			$data['status'] = false;
		} 
		
		echo json_encode($data);
	
	}   
	
}  















