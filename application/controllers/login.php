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
		$this->load->library('encrypt');
		
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
		
		$captcha_entered = $this->input->post("captcha_entered");     
		
		$verificationCode = $this->encrypt->encode($this->generateRandomString());     

		$verification = new Verification();  
		
		$verification->sur_name = $this->input->post('sur_name');     
		$verification->first_name = $this->input->post('first_name');   
		$verification->middle_name = $this->input->post('middle_name');   		  
		$verification->lrn = $this->input->post('lrn');   
		$verification->sex = $this->input->post('sex');  
		$verification->date_of_birth = $this->input->post('date_of_birth');  
		$verification->place_of_birth = $this->input->post('place_of_birth');   
		$verification->age = $this->input->post('age');      
		$verification->present_address = $this->input->post('present_address');   
		$verification->school_last_attended = $this->input->post('school_last_attended');   
		$verification->school_address = $this->input->post('school_address');   
		$verification->grade_or_year_level = $this->input->post('grade_or_year_level');   
		$verification->school_year = $this->input->post('school_year');   
		$verification->tve_specialization = $this->input->post('tve_specialization');  
		$verification->father = $this->input->post('father');  
		$verification->mother = $this->input->post('mother');   
		$verification->person_to_notify = $this->input->post('person_to_notify');   
		$verification->address = $this->input->post('address');   
		$verification->contact_number = $this->input->post('contact_number');   
		$verification->verification = $verificationCode;  
		$verification->email_address = $this->input->post('email_address');
		
		if(!$verification->save()) {  
			$data['status'] = false;   
			$data['errors'] = $verification->error->string;
		} else {
			
			if(strcasecmp($captcha_entered, $this->session->userdata('captcha_word')) == 0) {      
				$data['status'] = true;
			} else {   
				$data['errors'] = "<p>Invalid Capctha</p>";  
				$data['status'] = false;
			}
		
		}   
	
		echo json_encode($data);
	}   
	
	private function generateRandomString() {   
		
		$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}  
		
		
		return $randomString;
	}
	


}   


































