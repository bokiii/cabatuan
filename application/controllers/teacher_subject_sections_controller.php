<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_subject_sections_controller extends CI_Controller {      

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  
		
		$this->load->model('teacher_subject_sections_model');      
		$this->load->model('curriculum_subjects_model');
	}   

	public function index() {
		
		$teacher_subject_id = $this->input->get('teacher_subject_id');  
		
		$get_teacher_subject_data_by_teacher_subject_id = $this->teacher_subject_sections_model->get_teacher_subject_data_by_teacher_subject_id($teacher_subject_id);                  
  
		foreach($get_teacher_subject_data_by_teacher_subject_id as $row){
			$data['first_name'] = $row->first_name;   
			$data['last_name'] = $row->last_name;   
			$data['middle_name'] = $row->middle_name;   
			$data['subject'] = $row->subject;
		}   
		
		$data['curriculum_sections'] = $this->get_curriculum_sections($teacher_subject_id);
		$data['teacher_subject_id'] = $teacher_subject_id;
		$data['main_content'] = "teacher_subject_section_view";
		$this->load->view('template/content', $data); 
	}     
	
	private function get_curriculum_sections($teacher_subject_id) {
	
		$data = "";
	
		$get_curriculum = $this->curriculum_subjects_model->get_curriculum();      
	
		foreach($get_curriculum as $row_a) {
			$curriculum_id = $row_a->curriculum_id;    
			$curriculum = $row_a->curriculum;     

			$data .= "
				<div class='form-group'>
					<label for='section_id' class='control-label'>{$curriculum}</label>
					<select multiple name='section_id[]' id='section_id' class='form-control'>
			";
			
			$get_curriculum_sections_by_curriculum_id = $this->curriculum_subjects_model->get_curriculum_sections_by_curriculum_id($curriculum_id);                             
			foreach($get_curriculum_sections_by_curriculum_id as $row_b) {
				$id = $row_b->id;   
				$section = $row_b->section;    
				
				$check_teacher_subject_section_by_section_id_and_teacher_subject_id = $this->teacher_subject_sections_model->check_teacher_subject_section_by_section_id_and_teacher_subject_id($id, $teacher_subject_id);
				if($check_teacher_subject_section_by_section_id_and_teacher_subject_id != NULL) {
					$data .= "   
						<option disabled style='color: #DFDFDF;' value='{$id}'>{$section} - Already Added</option>
					";
				} else {
					$data .= "   
					<option value='{$id}'>{$section}</option>
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
	
	public function add_teacher_subject_section() {   
		
		$section_ids = $this->input->post('section_id');     
	
		$teacher_subject_id = $this->input->post('teacher_subject_id');
	
		foreach($section_ids as $id) {
			
			$teacher_subject_section = new Teacher_subject_section();
			
			$teacher_subject_section->teacher_subject_id = $teacher_subject_id; 
			$teacher_subject_section->section_id = $id;
			
			if(!$teacher_subject_section->save()) {
				$data['status'] = false;   
				$data['errors'] = $teacher_subject_section->error->string;
			} else {
				$data['status'] = true; 
			}
		
		}
		
		echo json_encode($data);
	
	}
	
	public function get_teacher_subject_section() {  
	
		$data = array();
		
		$teacher_subject_id = $this->input->get('teacher_subject_id');
		$get_teacher_subject_sections_by_teacher_subject_id = $this->teacher_subject_sections_model->get_teacher_subject_sections_by_teacher_subject_id($teacher_subject_id);                                                       
		
		$data['teacher_subject_sections'] = $get_teacher_subject_sections_by_teacher_subject_id;
		
		echo json_encode($data);   
	
	}
	
	public function delete_teacher_subject_section() {
	
		$data = array();  
	
		$teacher_subject_section_id = $this->input->post('teacher_subject_section_id');  
		
		if($teacher_subject_section_id != null) {
			$delete = $this->teacher_subject_sections_model->delete($teacher_subject_section_id);
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