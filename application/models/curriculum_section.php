<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

class Curriculum_section extends Datamapper {

	public $table = 'curriculum_sections';

	public $validation = array(
		'section' => array(
			'label' => 'Section', 
			'rules' => array('required', 'trim', 'unique', 'min_length' => 3)
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}

}