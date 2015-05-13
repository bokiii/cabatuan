<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

class Curriculum extends Datamapper {

	public $table = 'curriculums';

	public $validation = array(
		'curriculum' => array(
			'label' => 'Curriculum', 
			'rules' => array('required', 'trim', 'unique', 'min_length' => 3)
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}

}