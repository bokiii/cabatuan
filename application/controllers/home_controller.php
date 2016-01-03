<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_controller extends CI_Controller { 
	
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
		
		$this->load->model("home_model");  
		
	}   
	
	public function index() {
		
		$data['main_content'] = "home_view";
		$this->load->view('template/content', $data);
	
	}       
	
	function bootstrap() {
		$this->load->view('bootstrap_view');
	}   
	
	public function add_news() {   
	
		$news = $this->input->post("news");   

		$data = array();  
		
		$new = new News();  
		$new->news = $news;  
		
		if(!$new->save()) {  
			$data['status'] = false;   
			$data['errors'] = $new->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
	
	}
	
	public function get_news() { 
		$get_news = $this->home_model->get_news();   
		$data['news'] = $get_news;  
		echo json_encode($data);    	
	}     
	
	public function delete_latest_news() { 
		
		$id = $this->input->get('id');  

		$delete_news = $this->home_model->delete_news($id);  
		if($delete_news) { 
			$data['status'] = true;
		} else { 
			$data['status'] = false;
		}   
		
		echo json_encode($data);
		
		
	}
	
	public function get_news_update_content_by_id() { 
		$id = $this->input->get("id"); 
		$get_news_update_content_by_id = $this->home_model->get_news_update_content_by_id($id);  
		$data['news'] = $get_news_update_content_by_id; 
		
		echo json_encode($data);  
	}   
	
	
	public function update_news() { 
	
		$news = $this->input->post("news_update");  
		$id = $this->input->post("news_id"); 
		
		$new = new News($id);  
		$new->news = $news;   

		if(!$new->save()) {  
			$data['status'] = false;   
			$data['errors'] = $new->error->string;
		} else {
			$data['status'] = true;
		}  
		
		echo json_encode($data);
		
	}
	
	
}      























