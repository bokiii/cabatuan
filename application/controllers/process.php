<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {  

	public function debug($data) {
		echo "<pre>";  
			print_r($data);
		echo "</pre>";
	}
	
	public function __construct() {
		parent::__construct();  
		date_default_timezone_set("Asia/Manila");  if($this->session->userdata('logged_in') != true) {
			redirect("login");
		}
		
	}     
	
	
	public function register_enrollee() {
	
		$this->debug($this->input->post());
	}
	
	

 }