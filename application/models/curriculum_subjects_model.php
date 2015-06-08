<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_subjects_model extends CI_Model {       

	function __construct() {
		parent::__construct();
	}   
	
	function delete($id) {
		$this->db->where_in('id', $id);   
		$query = $this->db->delete('curriculum_subjects');    
		if($query) {
			return true; 
		} else {
			return false;
		}
		
	}  
	
	function get_curriculum() {
		$this->db->select('curriculum_subjects.curriculum_id, curriculums.curriculum');  
		$this->db->from('curriculum_subjects');       
		$this->db->join('curriculums', 'curriculums.id = curriculum_subjects.curriculum_id', 'left');		
		$this->db->group_by("curriculum_subjects.curriculum_id");		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_curriculum_subjects_by_curriculum_id($id) {
		$this->db->select("id, subject");     
		$this->db->from('curriculum_subjects');          
		$this->db->where('curriculum_id', $id);		
		$query = $this->db->get();   
		return $query->result();
	}
	
	function get_curriculum_sections_by_curriculum_id($id) {
		$this->db->select("id, section");     
		$this->db->from('curriculum_sections');          
		$this->db->where('curriculum_id', $id);		
		$query = $this->db->get();   
		return $query->result();
	}

	
	private function check_curriculum_id_in_enrolled_students($curriculum_id) {  
		$this->db->where('curriculum_id', $curriculum_id);  
		$this->db->from("enrolled_students");    
		$count = $this->db->count_all_results();  
		return $count;
	}   
	
	private function get_student_enrolled_data_by_curriculum_id($curriculum_id) {  
		$this->db->select("*");  
		$this->db->from("enrolled_students"); 
		$this->db->where("curriculum_id", $curriculum_id);
		$query = $this->db->get();  
		return $query->result();
	}
	
	function insert_curriculum_subject($data, $curriculum_id) {   
		$this->db->trans_start();
		
		$this->db->insert("curriculum_subjects", $data);  
		$subject_id = $this->db->insert_id();  
		
		if($this->check_curriculum_id_in_enrolled_students($curriculum_id) != 0) {  
			$get_student_enrolled_data_by_curriculum_id = $this->get_student_enrolled_data_by_curriculum_id($curriculum_id);
			
			foreach($get_student_enrolled_data_by_curriculum_id as $row) { 
			
				$enrolled_student_id = $row->id;
				$accomplished = $row->accomplished;  
				
				if(!$accomplished) {    
					$this->db->set('subject_id', $subject_id);
					$this->db->set('enrolled_student_id', $enrolled_student_id);  
					$this->db->insert("enrolled_student_subjects");  
					
					$enrolled_student_subject_id = $this->db->insert_id();   
					$this->db->set("enrolled_student_subject_id", $enrolled_student_subject_id) ;
					$this->db->insert("students_subjects_grades");  
				} 
			}
		}
	
		if($this->db->trans_complete()) {
			return true;
		} else {  
			return false;
		}
		
	}   
	
	

	
	
}    













