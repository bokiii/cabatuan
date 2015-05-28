<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_controller extends CI_Controller {      

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  
		if($this->session->userdata('logged_in') != true) {
			redirect("login");
		}
		
		$this->load->model('curriculum_model');  
	}     
	
	public function index() {
		$data['main_content'] = "student_view";
		$this->load->view('template/content', $data);    
	}      

	
	

}  













