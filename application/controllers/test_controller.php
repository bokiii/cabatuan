<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_controller extends CI_Controller {     

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
		$data['main_content'] = "test_view";
		$this->load->view('template/content', $data);    
	}   
	
	public function get_sample_data() {
		
		$data['sample_content'] = "  
			<div class='jumbotron'>
				<h1>Hello, world!</h1>
				<p>...</p>
				<p><a class='btn btn-primary btn-lg' href='#' role='button'>Learn more</a></p>
			</div>
		";   
		
		echo json_encode($data);
		
	}

	
}