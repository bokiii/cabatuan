<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');     

class Teachers_controller extends CI_Controller {

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
		
		$this->load->model('teacher_model');   
		$this->load->model('teacher_account_model');
	}      
	
	public function index() {
		$data['main_content'] = "teacher_view";
		$this->load->view('template/content', $data);    
	}      
	
	public function get_teacher() {
	
		$data = array();
	
		/*$teacher = new Teacher();
		$teachers = $teacher->get();     
		$data['teachers'] = $teacher->all_to_array();*/   
		
		$get_teachers = $this->teacher_model->get_teachers();    
		
		$data['teachers'] = $get_teachers;   
		
		for($i = 0; $i < count($data["teachers"]); $i++) {  
			$teacher_id = $data['teachers'][$i]['id'];   
			$check_teacher_id = $this->teacher_account_model->check_teacher_id($teacher_id);  
			if($check_teacher_id != 0) {  
				$data['teachers'][$i]['button_type'] = "info";   
				$data['teachers'][$i]['button_value'] = "Update Account";   
			} else {  
				$data['teachers'][$i]['button_type'] = "default";   
				$data['teachers'][$i]['button_value'] = "Create Account";   
			}
		}
	
		echo json_encode($data);
	
	}
  
	public function add_teacher() {   
		
		$data = array();
	
		$teacher = new Teacher();
		$teacher->first_name = $this->input->post('first_name');      
		$teacher->last_name = $this->input->post('last_name');   
		$teacher->middle_name = $this->input->post('middle_name');   
		$teacher->address = $this->input->post('address');   
		$teacher->civilstatus = $this->input->post('civilstatus');   
		$teacher->religion = $this->input->post('religion'); 
		$teacher->birth_date = $this->input->post('birth_date');   
		$teacher->user_type = "teacher";
		
		if(!$teacher->save()) {  
			$data['status'] = false;   
			$data['errors'] = $teacher->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
	}   

	public function delete_teacher() {  
		
		$data = array();  
	
		$teacher_id = $this->input->post('teacher_id');  
		
		if($teacher_id != null) {
			$delete = $this->teacher_model->delete($teacher_id);
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

	public function update_teacher() {
		
		$data = array();
		
		$id = $this->input->post('update_id');
	
		$teacher = new Teacher($id);
		
		$teacher->first_name = $this->input->post('first_name_update');      
		$teacher->last_name = $this->input->post('last_name_update');   
		$teacher->middle_name = $this->input->post('middle_name_update');  
		$teacher->address = $this->input->post('address_update');  
		$teacher->civilstatus = $this->input->post('civilstatus_update');   
		$teacher->religion = $this->input->post('religion_update'); 
		$teacher->birth_date = $this->input->post('birth_date_update');
		
		if(!$teacher->save()) {  
			$data['status'] = false;   
			$data['errors'] = $teacher->error->string;
		} else {
			$data['status'] = true;   
		}  
		
		echo json_encode($data); 
	
	}
	
	public function get_teacher_update_content_by_id() {
		
		$data = array();
		$id = $this->input->get('id');  
		
		$teacher = new Teacher(); 
		$teachers = $teacher->where('id', $id)->get();     
		
		foreach($teachers as $row) {
			$data['id'] = $row->id;   
			$data['first_name'] = $row->first_name;    
			$data['last_name'] = $row->last_name; 
			$data['middle_name'] = $row->middle_name;   
			$data['address'] = $row->address;      
			$data['civilstatus'] = $row->civilstatus;     
			$data['religion'] = $row->religion;     
			$data['birth_date'] = $row->birth_date;   
			$data['user_type'] = $row->user_type; 
		}
	
		echo json_encode($data);
	}
	
	function set_teacher_account() {  
		$data = array();
		
		$username = trim($this->input->post("username"));
		$password = trim($this->input->post("password"));     
		$md5_password = md5($password);
		$teacher_id = $this->input->post("teacher_id");   
		
		$teacher_account_data = array(  
			'username' => $username, 
			'password' => $password, 
			'md5_password' => $md5_password, 
			'teacher_id' => $teacher_id
		);   
		
		$set_teacher_account = $this->teacher_account_model->set_teacher_account($teacher_account_data, $teacher_id);                              
		
		if($set_teacher_account) {  
			$data['status'] = true; 
		} else { 
			$data['status'] = false; 
		}  
		
		echo json_encode($data);
		
	}       
	
	function get_teacher_account_data() {  
		$teacher_id = $this->input->get("teacher_id");   
		
		$get_teacher_account_by_teacher_id = $this->teacher_account_model->get_teacher_account_by_teacher_id($teacher_id);   
		
		if($get_teacher_account_by_teacher_id != null) {  
			$data['teacher_account'] = $get_teacher_account_by_teacher_id;  
		} else {  
			$data['teacher_account'] = array( 
				0 => array( 
					"username" => "", 
					"password" => ""
				)
			);  
		}
	
		echo json_encode($data);   
		
	}
	


}   

















