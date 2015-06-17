<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_controller extends CI_Controller {    

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");     
		
		$this->load->model("auth_model");
		
	}          
	
	public function index() {
	
		$this->session->sess_destroy();    
		redirect('login');
		
	}
	
	public function process_auth() {
	
		$username = trim($this->input->post("username"));    
		$password = trim($this->input->post("password"));
		$md5_password = md5($password);    
		
		// lets check first for the admin account    
		$check_admin_username_and_password = $this->auth_model->check_admin_username_and_password($username, $md5_password);                                          
		$check_teacher_username_and_password = $this->auth_model->check_teacher_username_and_password($username, $md5_password);
		$check_student_username_and_password = $this->auth_model->check_student_username_and_password($username, $md5_password);
		
		if($check_admin_username_and_password != NULL) {
			$account_data = array(
				'username' => $username, 
				'logged_in' => TRUE
			);   
		
			$this->session->set_userdata($account_data);  
			$data['redirect'] = base_url() . "index.php/home_controller";
			$data['status'] = true;
			
		} elseif ($check_teacher_username_and_password != NULL) {   
			foreach($check_teacher_username_and_password as $row_a) {  
				$account_data = array(   
					'id' => $row_a->id, 
					'username' => $row_a->username,  
					'password' => $row_a->password, 
					'teacher_id' => $row_a->teacher_id, 
					'teacher_logged_in' => TRUE
				);
			}   
			
			$this->session->set_userdata($account_data);  
			$data['redirect'] = base_url() . "index.php/teacher_account_controller";
			$data['status'] = true;
		
		} elseif ($check_student_username_and_password != NULL) {  
		
			foreach($check_student_username_and_password as $row_a) {  
				$account_data = array(   
					'id' => $row_a->id, 
					'username' => $row_a->username,  
					'password' => $row_a->password, 
					'student_id' => $row_a->student_id, 
					'student_logged_in' => TRUE
				);
			}      
			
			$this->session->set_userdata($account_data);  
			$data['redirect'] = base_url() . "index.php/student_account_controller";
			$data['status'] = true;
		
		} else {
			$data['status'] = false;
		}
		
		echo json_encode($data);   
		
	}


}   





























