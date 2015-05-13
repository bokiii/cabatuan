<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_controller extends CI_Controller {   

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  
		
		$this->load->model('curriculum_model');
	}   
	
	public function index() {
		$data['main_content'] = "curriculum_view";
		$this->load->view('template/content', $data);    
	}         
	
	public function get_curriculum() {
	
		$data = array();
	
		$curriculum = new Curriculum(); 
		$curriculums = $curriculum->get();     
		
		$data['curriculums'] = $curriculums->all_to_array();  
		
		echo json_encode($data);
	
	}
	
	public function add_curriculum() {   
		
		$data = array();
	
		$curriculum = new Curriculum();
		$curriculum->curriculum = $this->input->post('curriculum');   
		
		if(!$curriculum->save()) {  
			$data['status'] = false;   
			$data['errors'] = $curriculum->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
	}   
	
	public function delete_curriculum() {  
		
		$data = array();  
	
		$curriculum_year_id = $this->input->post('curriculum_year_id');  
		if($curriculum_year_id != null) {
			$delete = $this->curriculum_model->delete($curriculum_year_id);
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
	
	public function update_curriculum() {
		
		$data = array();
		
		$id = $this->input->post('update_id');
	
		$curriculum = new Curriculum($id);
		$curriculum->curriculum = $this->input->post('curriculum_update');   
		
		if(!$curriculum->save()) {  
			$data['status'] = false;   
			$data['errors'] = $curriculum->error->string;
		} else {
			$data['status'] = true;   
		}  
		
		echo json_encode($data); 
	
	
	}
	
	public function get_curriculum_update_content_by_id() {
		
		$data = array();
		$id = $this->input->get('id');  
		
		$curriculum = new Curriculum(); 
		$curriculums = $curriculum->where('id', $id)->get();     
		
		foreach($curriculums as $row) {
			$data['id'] = $row->id;   
			$data['curriculum'] = $row->curriculum;
		}
	
		echo json_encode($data);
	}
	
}    






