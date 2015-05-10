<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_controller extends CI_Controller {   

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");
	}   
	
	public function index() {
		
		$data['main_content'] = "curriculum_view";
		$this->load->view('template/content', $data);    
	
	}         
	
	
	
	public function add_curriculum() { 
		$this->debug($this->input->post());
	}


}