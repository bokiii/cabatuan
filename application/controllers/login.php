<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {   


	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");   
		
		if($this->session->userdata('logged_in') == true) {
			redirect("home");
		}                       
		
		if($this->session->userdata('teacher_logged_in') == true) {
			redirect("teacher_account_controller");
		}      
		
		if($this->session->userdata('student_logged_in') == true) {
			redirect("student_account_controller");
		}      
		
		$this->load->helper('captcha');
		
	}   
	
	public function index() {  
	
		$values = array(
			'word' => '',
			'word_length' => 8,
			'img_path' => './captcha_images/',
			'img_url' =>  base_url() .'captcha_images/',
			'font_path'  => base_url() . 'system/fonts/texb.ttf',
			'img_width' => 180,
			'img_height' => 60,
			'expiration' => 3600
		); 
		
		$data = create_captcha($values);     
		
		$this->session->set_userdata('captcha_word', $data['word']);
		
		$this->load->view('login_view', $data);
	}        


	public function refresh_captcha() {   
		
		$values = array(
			'word' => '',
			'word_length' => 8,
			'img_path' => './captcha_images/',
			'img_url' =>  base_url() .'captcha_images/',
			'font_path'  => base_url() . 'system/fonts/texb.ttf',
			'img_width' => 180,
			'img_height' => 60,
			'expiration' => 3600
		); 
		
		$data = create_captcha($values);     
		
		$this->session->set_userdata('captcha_word', $data['word']);
		
		$jsonDataImage = array(
			'image' => $data['image'] 
		);  
	
		
		echo json_encode($jsonDataImage);
		
	}

	
	public function register_enrollee() {  
	
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
		
		//echo json_encode($data);
		
		$this->debug($data);
	}
	


}