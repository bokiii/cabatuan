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
			redirect("home_controller", 'refresh');
		}                       
		
		if($this->session->userdata('teacher_logged_in') == true) {
			redirect("teacher_account_controller");
		}      
		
		if($this->session->userdata('student_logged_in') == true) {
			redirect("student_account_controller");
		}      
		
		$this->load->helper('captcha');  
		$this->load->library('encrypt');    
		
		$this->load->model("verification_model");
		$this->load->model("home_model");
		
	}   
	
	public function index() {  
	
		$data = array();
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
	
		//$this->debug($this->input->post());   
		
		/*$date_of_birth = $this->input->post("date_of_birth");     
		$remove_dash = str_replace("/", " ", $date_of_birth); 
		$pieces = explode(" ", $remove_dash);
		$valid_date_of_birth = $pieces[2] . "-" .  $pieces[0] . "-" . $pieces[1];  */   
		
		
		$month = $this->input->post("month");  
		$day = $this->input->post("day");
		$year = $this->input->post("year");
		
		$valid_date_of_birth = $year . "-" . $month . "-" . $day;
	
		
		$data = array();  
		$verificationCode = $this->generateRandomString();     

		$verification = new Verification();  
		$verification->sur_name = $this->input->post('sur_name');     
		$verification->first_name = $this->input->post('first_name');   
		$verification->middle_name = $this->input->post('middle_name');   		  
		$verification->lrn = $this->input->post('lrn');   
		$verification->sex = $this->input->post('sex');  
		$verification->date_of_birth = $valid_date_of_birth;  
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
		$verification->phone_selected = $this->input->post('phone_selected');
		
		if(!$verification->save()) {  
			$data['status'] = false;   
			$data['errors'] = $verification->error->string;
		} else {  
			$data['status'] = true;  
			$data["confirmation_code"] = $verificationCode;
		}     
	
		echo json_encode($data);  
		
	}   
	
	private function generateRandomString() {   
		
		$length = 10;
		$characters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}  
		
		
		return $randomString;
	}
	
	private function verification_send($email, $verification_code) {   
	
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'bitmasters.tech@gmail.com'; //change this
		$config['smtp_pass'] = 'bitmasters@*05'; //change this
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
	
		$verify_url =  base_url() . "index.php/login/verify_student_registration?code=" . $verification_code;
		
		$verify_message = "
			<p>Click the below link to confirm the registration</p>  
			<p><a href='{$verify_url}'>{$verify_url}</a></p>
		";  
		
		$this->load->library('email');  
		$this->email->initialize($config);

		$this->email->from('bitmasters.tech@gmail.com', 'CNCHS Registration');
		$this->email->to($email); 
		
		$this->email->subject('Registration');
		$this->email->message($verify_message);

		if($this->email->send()) {  
			return true;
		} else {  
			return false;
		}

		//echo $this->email->print_debugger();  
		
	}
	
	public function verify_student_registration() {   
		
		$verificationCode = $this->input->get('code');   

		$getUnverifiedStudentViaCode = $this->verification_model->getUnverifiedStudentViaCode($verificationCode);     

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
			$student->user_type = "student";  		
		
			if(!$student->save()) {  
				$errors = $student->error->string;     
				echo $errors;    
			} else {  
				$deleteIfVerified = $this->verification_model->deleteIfVerified($verificationCode);     
				$data["message"] = "<p>You have succesfully verified..</p>";   
				
			}  
			
		} else {  
			$data["message"] = "<p>You are already verified..</p>";
		}   
		
		
		/*$data['main_content'] = "verified_view";
		$this->load->view('template/content', $data);*/      
		
		$this->load->view("verified_view", $data);
		
	}        
	
	public function get_news() { 
		$get_news = $this->home_model->get_news();   
		$data['news'] = $get_news;  
		echo json_encode($data);    	
	}   
	
	
	public function test() {  
		$data['main_content'] = "test_view";
		$this->load->view('template/content', $data);
	}
	
	
}     




















































