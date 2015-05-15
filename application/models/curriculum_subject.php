<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

class Curriculum_subject extends Datamapper {

	public $table = 'curriculum_subjects';

	public $validation = array(
		'subject' => array(
			'label' => 'Subject', 
			'rules' => array('required', 'trim', 'unique', 'min_length' => 3)
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}

}