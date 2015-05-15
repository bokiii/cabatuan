<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_subjects_controller extends CI_Controller {     

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  
		
		$this->load->model('curriculum_subjects_model');
	}     
	
	public function index() {
		
		$curriculum_id = $this->input->get('curriculum_id');  
		
		$curriculum = new Curriculum(); 
		$curriculums = $curriculum->where("id", $curriculum_id)->get();        
		
		foreach($curriculums as $row){
			$data['curriculum'] = $row->curriculum;
		}
		
		$data['curriculum_id'] = $curriculum_id;
		$data['main_content'] = "curriculum_subject_view";
		$this->load->view('template/content', $data);        
	}     
	
	public function get_curriculum_subject() {
	
		$data = array();  
		
		$curriculum_id = $this->input->get('curriculum_id');
	
		$curriculum_subject = new Curriculum_subject(); 
		$curriculum_subjects = $curriculum_subject->where("curriculum_id", $curriculum_id)->get();     
		
		$data['curriculum_subjects'] = $curriculum_subjects->all_to_array();  
		
		echo json_encode($data);
	
	}
	
	public function add_curriculum_subject() {   
		
		$data = array();
	
		$curriculum_subject = new Curriculum_subject(); 
		$curriculum_subject->subject = $this->input->post('subject');     
		$curriculum_subject->curriculum_id = $this->input->post('curriculum_id');    		
		
		
		if(!$curriculum_subject->save()) {  
			$data['status'] = false;   
			$data['errors'] = $curriculum_subject->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
	}   
	
	public function delete_curriculum_subject() {  
		
		$data = array();  
	
		$curriculum_subject_id = $this->input->post('curriculum_subject_id');  
		
		if($curriculum_subject_id != null) {
			$delete = $this->curriculum_subjects_model->delete($curriculum_subject_id);
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
	
	public function update_curriculum_subject() {
		
		$data = array();
		
		$id = $this->input->post('update_id');
	
		$curriculum_subject = new Curriculum_subject($id); 
		$curriculum_subject->subject = $this->input->post('subject_update');   
		
		if(!$curriculum_subject->save()) {  
			$data['status'] = false;   
			$data['errors'] = $curriculum_subject->error->string;
		} else {
			$data['status'] = true;   
		}  
		
		echo json_encode($data); 
	
	
	}
	
	public function get_curriculum_subject_update_content_by_id() {
		
		$data = array();
		$id = $this->input->get('id');  
		
		$curriculum_subject = new Curriculum_subject(); 
		$curriculum_subjects = $curriculum_subject->where('id', $id)->get();     
		
		foreach($curriculum_subjects as $row) {
			$data['id'] = $row->id;   
			$data['subject'] = $row->subject;
		}
	
		echo json_encode($data);
	}
	
	

}   














