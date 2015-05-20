<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Teacher_subjects_controller extends CI_Controller {

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  
		
		$this->load->model('teacher_subjects_model');   
		$this->load->model('curriculum_subjects_model');
	}        

	public function index() {
		
		$teacher_id = $this->input->get("teacher_id");    
		
		$teacher = new Teacher();   
		$teachers = $teacher->where("id", $teacher_id)->get();     
		
		foreach($teachers as $row) {
			$data['first_name'] = $row->first_name; 
			$data['last_name'] = $row->last_name; 
			$data['middle_name'] = $row->middle_name; 
		}           
		
		$data['curriculum_subjects'] = $this->get_curriculum_subjects($teacher_id);
		$data['teacher_id'] = $teacher_id; 
		$data['main_content'] = "teacher_subject_view";
		$this->load->view('template/content', $data);        
	
	}   
	
	public function add_teacher_subject() {
		
		$subject_ids = $this->input->post('subject_id');     
	
		$teacher_id = $this->input->post('teacher_id');
	
		foreach($subject_ids as $id) {
			
			$teacher_subject = new Teacher_subject();
			
			$teacher_subject->teacher_id = $teacher_id; 
			$teacher_subject->subject_id = $id;
			
			if(!$teacher_subject->save()) {
				$data['status'] = false;   
				$data['errors'] = $teacher_subject->error->string;
			} else {
				$data['status'] = true; 
			}
		
		}
		
		echo json_encode($data);
		
	}

	private function get_curriculum_subjects($teacher_id) {
	
		$data = "";
	
		$get_curriculum = $this->curriculum_subjects_model->get_curriculum();      
	
		foreach($get_curriculum as $row_a) {
			$curriculum_id = $row_a->curriculum_id;    
			$curriculum = $row_a->curriculum;     

			$data .= "
				<div class='form-group'>
					<label for='subject_id' class='control-label'>{$curriculum}</label>
					<select multiple name='subject_id[]' id='subject_id' class='form-control'>
			";
			
			$get_curriculum_subjects_by_curriculum_id = $this->curriculum_subjects_model->get_curriculum_subjects_by_curriculum_id($curriculum_id);                            
			
			foreach($get_curriculum_subjects_by_curriculum_id as $row_b) {
				
				$id = $row_b->id;
				$subject =  $row_b->subject;      
				
				$check_teacher_subject_by_subject_id_and_teacher_id = $this->teacher_subjects_model->check_teacher_subject_by_subject_id_and_teacher_id($id, $teacher_id);
				if($check_teacher_subject_by_subject_id_and_teacher_id != NULL) {
					
					$data .= "
						<option disabled style='color: #DFDFDF;' value='{$id}'>{$subject} - Already Added</option>
					";   
					
				} else {
					$data .= "
						<option value='{$id}'>{$subject}</option>
					";   
				}
			}   
			
			$data .= "
					</select>
				</div>        
			";
			
		}   
		
		return $data;
	
	}   
	
	public function get_teacher_subjects() {   
	
		$data = array();
		
		$teacher_id = $this->input->get('teacher_id');
		$get_teacher_subjects_by_teacher_id = $this->teacher_subjects_model->get_teacher_subjects_by_teacher_id($teacher_id);                                                       
		
		$data['teacher_subjects'] = $get_teacher_subjects_by_teacher_id;
		
		echo json_encode($data);   
		
	}
	
	public function delete_teacher_subject() {
	
		$data = array();  
	
		$teacher_subject_id = $this->input->post('teacher_subject_id');  
		
		if($teacher_subject_id != null) {
			$delete = $this->teacher_subjects_model->delete($teacher_subject_id);
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
	
	
}   

























