<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_sections_controller extends CI_Controller {        

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
		
		$this->load->model('curriculum_sections_model');
	}          
	
	
	public function index() {
		
		$curriculum_id = $this->input->get('curriculum_id');  
		
		$curriculum = new Curriculum(); 
		$curriculums = $curriculum->where("id", $curriculum_id)->get();        
		
		foreach($curriculums as $row){
			$data['curriculum'] = $row->curriculum;
		}
		
		$data['curriculum_id'] = $curriculum_id;
		$data['main_content'] = "curriculum_section_view";
		$this->load->view('template/content', $data);          
		
		
	}     
	
	public function get_curriculum_section() {
	
		$data = array();  
		
		$curriculum_id = $this->input->get('curriculum_id');
	
		$curriculum_section = new Curriculum_section(); 
		$curriculum_sections = $curriculum_section->where("curriculum_id", $curriculum_id)->get();     
		
		$data['curriculum_sections'] = $curriculum_sections->all_to_array();  
		
		echo json_encode($data);
	
	}
	
	public function add_curriculum_section() {
		
		$data = array();
	
		$curriculum_section = new Curriculum_section(); 
		$curriculum_section->section = $this->input->post('section');     
		$curriculum_section->curriculum_id = $this->input->post('curriculum_id');    		
		
		
		if(!$curriculum_section->save()) {  
			$data['status'] = false;   
			$data['errors'] = $curriculum_section->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
	
	}
	
	public function delete_curriculum_section() {
	
		$data = array();  
	
		$curriculum_section_id = $this->input->post('curriculum_section_id');  
		
		if($curriculum_section_id != null) {
			$delete = $this->curriculum_sections_model->delete($curriculum_section_id);
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
	
	public function get_curriculum_section_update_content_by_id() {
	
		$data = array();
		$id = $this->input->get('id');  
		
		$curriculum_section = new Curriculum_section(); 
		$curriculum_sections = $curriculum_section->where('id', $id)->get();     
		
		foreach($curriculum_sections as $row) {
			$data['id'] = $row->id;   
			$data['section'] = $row->section;
		}
	
		echo json_encode($data);
		
	
	}
	
	public function update_curriculum_section() {
	
		$data = array();
		
		$id = $this->input->post('update_id');
	
		$curriculum_section = new Curriculum_section($id); 
		$curriculum_section->section = $this->input->post('section_update');   
		
		if(!$curriculum_section->save()) {  
			$data['status'] = false;   
			$data['errors'] = $curriculum_section->error->string;
		} else {
			$data['status'] = true;   
		}  
		
		echo json_encode($data); 
	
	}
	
}     




















