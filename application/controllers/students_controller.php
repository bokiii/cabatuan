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
		$this->load->model('student_account_model');  
		$this->load->model('curriculum_subjects_model');  
		$this->load->model('enrolled_student_model');  
		$this->load->model('verification_model');
	}     
	
	public function index() {
		
		$current_year = date("Y");
		$data['dates'] = array($current_year);  
		
		for($i = 1; $i < 111; $i++) {  
			$down_year =  $current_year - $i;  
			array_push($data['dates'], $down_year);  
		}       
		
		$plus_one_current_year = $current_year + 1;    		
		$current_school_year = $current_year . "-" . $plus_one_current_year;  
		$data['school_years'] = array($current_school_year);       

		for($i = 1; $i < 20; $i++) {  
			$down_current_year =  $current_year - $i;    
			$down_plus_one_current_year = $plus_one_current_year - $i;    
			$down_current_school_year = $down_current_year . "-" . $down_plus_one_current_year;
			array_push($data['school_years'], $down_current_school_year);  
		}       
		
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
	
	public function add_student() {
		
		/*$date_of_birth = $this->input->post("date_of_birth");     
		$remove_dash = str_replace("/", " ", $date_of_birth); 
		$pieces = explode(" ", $remove_dash);
		$valid_date_of_birth = $pieces[2] . "-" .  $pieces[0] . "-" . $pieces[1];*/  

		$month = $this->input->post("month");  
		$day = $this->input->post("day");
		$year = $this->input->post("year");
		
		$valid_date_of_birth = $year . "-" . $month . "-" . $day;
		
		$data = array();
	
		$student = new Student();
		$student->sur_name = $this->input->post('sur_name');     
		$student->first_name = $this->input->post('first_name');   
		$student->middle_name = $this->input->post('middle_name');   		  
		$student->lrn = $this->input->post('lrn');   
		$student->sex = $this->input->post('sex');  
		$student->date_of_birth = $valid_date_of_birth;  
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
		$student->phone_selected = $this->input->post('phone_selected');   
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
		
		$date_of_birth = trim($this->input->post('date_of_birth_update'));   
		
		/*$pos = strpos($date_of_birth, "-");
		if($pos === false) {
			$remove_dash = str_replace("/", " ", $date_of_birth); 
			$pieces = explode(" ", $remove_dash);   
			$valid_date_of_birth = $pieces[2] . "-" .  $pieces[0] . "-" . $pieces[1];  
		
		} else {     
			$valid_date_of_birth = $this->input->post('date_of_birth_update');
		}    */  
		
		$month = $this->input->post("month_update");  
		$day = $this->input->post("day_update");
		$year = $this->input->post("year_update");
		
		$valid_date_of_birth = $year . "-" . $month . "-" . $day;
		
		$data = array();
		
		$id = $this->input->post('update_id');
	
		$student = new Student($id);
		$student->sur_name = $this->input->post('sur_name_update');      
		$student->first_name = $this->input->post('first_name_update');   
		$student->middle_name = $this->input->post('middle_name_update');		
		$student->lrn = $this->input->post('lrn_update');  
		$student->sex = $this->input->post('sex_update');  
		$student->date_of_birth = $valid_date_of_birth;   
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
		$student->phone_selected = $this->input->post('phone_selected_update');
		
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
			$data['phone_selected'] = $row->phone_selected; 			
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

		$data['student_id'] = $student_id;
		
		$get_curriculum_subjects_by_curriculum_id = $this->curriculum_subjects_model->get_curriculum_subjects_by_curriculum_id($curriculum_id);              
		
		$insert_enrolled_student = $this->student_model->insert_enrolled_student($enrolled_student_data, $get_curriculum_subjects_by_curriculum_id);
		
		if($insert_enrolled_student) {
			$data['status'] = true;
		} else {  
			$data['status'] = false;
		} 
		
		echo json_encode($data);
	
	}   
	
	public function list_student_enrolled_academic() {  
	
		$data = array();
		
		$student_id = $this->input->get("student_id");    
		$get_student_enrolled_academic_list_by_student_id = $this->student_model->get_student_enrolled_academic_list_by_student_id($student_id);
	
		$data['list_academics'] = $get_student_enrolled_academic_list_by_student_id;   
		echo json_encode($data);
	
	}
	
	public function delete_student_enrolled_academic() {   

		$enrolled_student_id = $this->input->post("enrolled_student_id");
	
		$data = array();                   
		
		$get_student_id_by_enrolled_student_id = $this->enrolled_student_model->get_student_id_by_enrolled_student_id($enrolled_student_id[0]);                                                         
		foreach($get_student_id_by_enrolled_student_id as $row) {   
			$data["student_id"] = $row->student_id;
		}
	
		$enrolled_student_id = $this->input->post("enrolled_student_id");  
		$delete_student_enrolled_curriculum = $this->enrolled_student_model->delete_student_enrolled_curriculum($enrolled_student_id);
		
		if($delete_student_enrolled_curriculum) {   
			$data['status'] = true;
		} else {  
			$data['status'] = false;
		}   
		
		echo json_encode($data);
	
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
	
	// below is to verify a student in students module 
	public function verify_student_registration() {   
		
		$verificationCode = $this->input->post('code');   

		$getUnverifiedStudentViaCode = $this->verification_model->getUnverifiedStudentViaCode($verificationCode);      

		//$this->debug($getUnverifiedStudentViaCode);		

		if($getUnverifiedStudentViaCode != NULL) {   
		
			foreach($getUnverifiedStudentViaCode as $row) {   
				
				$sur_name = $row->sur_name;
				$first_name = $row->first_name;  
				$middle_name = $row->middle_name; 
				$lrn = $row->lrn; 
				$sex = $row->sex; 
				$date_of_birth = $row->date_of_birth; 
				$place_of_birth = $row->place_of_birth; 
				$age = $row->age; 
				$present_address = $row->present_address; 
				$school_last_attended = $row->school_last_attended;  
				$school_address = $row->school_address; 
				$grade_or_year_level = $row->grade_or_year_level; 
				$school_year = $row->school_year; 
				$tve_specialization = $row->tve_specialization;  
				$father = $row->father;  
				$mother = $row->mother; 
				$person_to_notify = $row->person_to_notify; 
				$address = $row->address;   
				$contact_number = $row->contact_number;   
				$phone_selected = $row->phone_selected; 
			
			}
			
			$data = array();
		
			$student = new Student();
			$student->sur_name = $sur_name;     
			$student->first_name = $first_name;   
			$student->middle_name = $middle_name;   		  
			$student->lrn = $lrn;   
			$student->sex = $sex;  
			$student->date_of_birth = $date_of_birth;  
			$student->place_of_birth = $place_of_birth;   
			$student->age = $age;      
			$student->present_address = $present_address;   
			$student->school_last_attended = $school_last_attended;   
			$student->school_address = $school_address;   
			$student->grade_or_year_level = $grade_or_year_level;   
			$student->school_year = $school_year;   
			$student->tve_specialization = $tve_specialization;  
			$student->father = $father;  
			$student->mother = $mother;   
			$student->person_to_notify = $person_to_notify;   
			$student->address = $address;   
			$student->contact_number = $contact_number;     
			$student->phone_selected = $phone_selected; 
			$student->user_type = "student";  		
		
			if(!$student->save()) {  
				//$errors = $student->error->string;     
				//echo $errors;    
				$data["message"] = "<p>Confirmation failed</p>";   
				$data['status'] = false;
			} else {  
				$deleteIfVerified = $this->verification_model->deleteIfVerified($verificationCode);     
				$data["message"] = "<p>You have succesfully confirmed the student. Check the Unenrolled Students</p>";   
				$data['status'] = true;
			}  
			
		} else {  
			$data["message"] = "<p>This student does not registered or already confirmed</p>";
		}    
		
		
		echo json_encode($data);
		
		
		/*$data['main_content'] = "verified_view";
		$this->load->view('template/content', $data);*/      
		//$this->load->view("verified_view", $data);
		
	}      
	
	
}  



































