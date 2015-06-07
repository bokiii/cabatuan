<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');       

class Enrolled_student extends Datamapper {

	public $table = 'enrolled_students';

	public $validation = array(
		'curriculum_id' => array(
			'label' => 'Curriculum', 
			'rules' => array('required')
		),     
		'section_id' => array(
			'label' => 'Section', 
			'rules' => array('required')
		), 
		'student_id' => array(
			'label' => 'Student', 
			'rules' => array('required')
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}


}