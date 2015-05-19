<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');       

class Teacher_subject extends Datamapper {

	public $table = 'teachers_subjects';

	public $validation = array(
		'teacher_id' => array(
			'label' => 'Teacher', 
			'rules' => array('required')
		),     
		'subject_id' => array(
			'label' => 'Subject', 
			'rules' => array('required', 'unique')
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}


}