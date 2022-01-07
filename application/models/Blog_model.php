<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Blog_model extends CI_Model {
    

		public function __construct() {
		  parent::__construct(); 
		}
	  

		function get_blog_list()
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->order_by("id", "desc");
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_list_by_category($id)
	      {
	        	$this->db->select('*');
				$this->db->from('blogs');
				$this->db->where('blog_category_id',$id);
				$this->db->order_by("id", "desc");
				return $query = $this->db->get()->result_array();
			    
	      }
	      function get_blog_limit()
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->order_by("id", "desc");
				$this->db->limit(5);
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_category()
	      {
	        $this->db->select('*');
				$this->db->from('blog_category');
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_sliders()
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->order_by("id", "desc");
				$this->db->limit(5);
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function save_blog_comment($data)
		{               
	       $this->db->insert('blog_comments',$data);  
	       return $this->db->insert_id();
		}
		
		function getSearchBlog($searchBlog) {
		    if(empty($searchBlog))
		       return array();

		    $result = $this->db->like('blog_title', $searchBlog)
		             ->get('blogs');

		    return $result->result_array();
		} 
		
}