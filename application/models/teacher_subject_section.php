<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');       

class Teacher_subject_section extends Datamapper {

	public $table = 'teachers_subjects_sections';

	public $validation = array(
		'teacher_subject_id' => array(
			'label' => 'Teacher Subject', 
			'rules' => array('required')
		),     
		'section_id' => array(
			'label' => 'Section is required', 
			'rules' => array('required')
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}



}