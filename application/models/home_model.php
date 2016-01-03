<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class Home_model extends CI_Model { 

	function __construct() {
		parent::__construct();
	}   

	public function get_news() {  
		
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get("news"); 
		return $query->result();
	}  
	
	public function delete_news($id) {  
		$this->db->where('id', $id);   
		$query = $this->db->delete('news');    
		if($query) {
			return true; 
		} else {
			return false;
		}
	}  
	
	public function get_news_update_content_by_id($id) {  
		$this->db->where("id", $id);  
		$query = $this->db->get("news");
		
		return $query->result();
	}
	
	


}