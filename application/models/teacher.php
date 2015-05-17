<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

class Teacher extends Datamapper {

	public $table = 'teachers';

	public $validation = array(
		'first_name' => array(
			'label' => 'First Name', 
			'rules' => array('required', 'trim')
		),   
		'last_name' => array(
			'label' => 'Last Name', 
			'rules' => array('required', 'trim')
		),   
		'middle_name' => array(
			'label' => 'Middle Name', 
			'rules' => array('required', 'trim')
		),   
		'address' => array(
			'label' => 'Address', 
			'rules' => array('required', 'trim')
		),   
		'civilstatus' => array(
			'label' => 'Civil Status', 
			'rules' => array('required', 'trim')
		),  
		'religion' => array(
			'label' => 'Religion', 
			'rules' => array('required', 'trim')
		),    
		'birth_date' => array(
			'label' => 'Birth Date', 
			'rules' => array('required', 'trim')
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}

}   








