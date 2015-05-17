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
		
		$this->load->model('teacher_model');
	}      
	
	public function index() {
		$data['main_content'] = "teacher_view";
		$this->load->view('template/content', $data);    
	}      
	
	public function get_teacher() {
	
		$data = array();
	
		$teacher = new Teacher();
		$teachers = $teacher->get();     
		
		$data['teachers'] = $teacher->all_to_array();  
		
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
	
	
	
}