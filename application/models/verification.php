<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

class Verification extends Datamapper {

	public $table = 'unverified_students';

	public $validation = array(
		'sur_name' => array(
			'label' => 'Sur Name', 
			'rules' => array('required', 'trim')
		), 
		'first_name' => array(
			'label' => 'First Name', 
			'rules' => array('required', 'trim')
		), 
		'middle_name' => array(
			'label' => 'Middle Name', 
			'rules' => array('required', 'trim')
		), 
		'lrn' => array(
			'label' => 'LRN', 
			'rules' => array('required', 'trim')
		), 
		'sex' => array(
			'label' => 'Sex', 
			'rules' => array('required', 'trim')
		), 
		'date_of_birth' => array(
			'label' => 'Date of Birth', 
			'rules' => array('required', 'trim', 'valid_date')
		), 
		'place_of_birth' => array(
			'label' => 'Place of Birth', 
			'rules' => array('required', 'trim')
		), 
		'age' => array(
			'label' => 'Age', 
			'rules' => array('required', 'trim', 'is_natural_no_zero')
		), 
		'present_address' => array(
			'label' => 'Present Address', 
			'rules' => array('required', 'trim')
		), 
		'school_last_attended' => array(
			'label' => 'School Last Attended', 
			'rules' => array('required', 'trim')
		), 
		'school_address' => array(
			'label' => 'School Address', 
			'rules' => array('required', 'trim')
		), 
		'grade_or_year_level' => array(
			'label' => 'Grade/Year Level', 
			'rules' => array('required', 'trim')
		), 
		'school_year' => array(
			'label' => 'School Year', 
			'rules' => array('required', 'trim')
		), 
		'tve_specialization' => array(
			'label' => 'TVE Specialization', 
			'rules' => array('required', 'trim')
		), 
		'father' => array(
			'label' => 'Father', 
			'rules' => array('required', 'trim')
		), 
		'mother' => array(
			'label' => 'Mother', 
			'rules' => array('required', 'trim')
		), 
		'person_to_notify' => array(
			'label' => 'Person to Notify', 
			'rules' => array('required', 'trim')
		), 
		'address' => array(
			'label' => 'Address', 
			'rules' => array('required', 'trim')
		), 
		'contact_number' => array(
			'label' => 'Contact Number', 
			'rules' => array('required', 'trim')
		),   
		'verification' => array(
			'label' => 'Verification Code', 
			'rules' => array('required', 'trim')
		),  
		'phone_selected' => array(
			'label' => 'Phone Selected', 
			'rules' => array('required', 'trim')
		)
		
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}

}   




























