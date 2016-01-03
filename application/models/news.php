<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

class News extends Datamapper {

	public $table = 'news';

	public $validation = array(
		'news' => array(
			'label' => 'News', 
			'rules' => array('required', 'trim')
		)
	);

	public function __construct($id = null) {
		parent::__construct($id);
	}

}   




























