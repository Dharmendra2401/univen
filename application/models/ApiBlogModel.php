<?php 

Class ApiBlogModel extends CI_model {
    

		public function __construct() {
		  parent::__construct();
		  $this->load->library('upload');
		}
		function getBlogList($id)
		{
		  $cond=array('blogs.active_status' => 'Y','blog_category.active' => 'Y','blogs.delete_flag' => 'N','blog_comments.delete_flag' => 'N');
			  if(!empty($id)){
				  $this->db->where('blog_category_id',$id);
			  };

	  			$this->db->select('blogs.*, COUNT(blog_comments.id) as num_comments')
			  ->from('blogs')
			  ->join('blog_comments', 'blog_comments.blog_id = blogs.id','left')
			  ->join('blog_category', 'blog_category.id = blogs.blog_category_id','left')
			  ->group_start()
			  ->where($cond)
			  ->group_end()
			  ->or_where('blog_comments.delete_flag', null)
			  ->order_by('blogs.id', 'desc')
			  ->group_by('blogs.id');
			  $query = $this->db->get();
			  if($query->num_rows() > 0){
				return $query->result_array();
			  }else{
				return 0;
			   }
		}
	    
		     
		  function getAllBlogCategory()
	      {
			$cond=array('active' => 'Y', 'delete_flag' => 'N');
			   $this->db->select('id,name')
					->from('blog_category')
					->where($cond);
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function getCategoryName($category_name)
	      {
	            $query=$this->db->select('name')->from('blog_category')->where('id', $category_name)->get()->row_array();
			    return $query['name'];
	      }
	     
    function getCategoryList(){
		$cond=array('ACTIVE_STATUS' => 'Y');
		$this->db->select('*')
			->from('category')
			->where($cond);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return 0;
		}
	}

	      function saveBlogComment($data)
		{               
	       $this->db->insert('blog_comments',$data);  
	       return $this->db->insert_id();
		}
		
		function getSearchBlog($searchBlog) {
			$cond=array('blogs.active_status' => 'Y','blog_category.active' => 'Y','blogs.delete_flag' => 'N','blog_comments.delete_flag' => 'N');
		    if(empty($searchBlog))
		       return array();

			   $this->db->select('blogs.*, COUNT(blog_comments.id) as num_comments')
			   ->from('blogs')
			   ->group_start()
			   ->like('blogs.blog_title', $searchBlog)
			   ->or_like('blogs.description',$searchBlog)
			   ->or_like('blogs.short_desc',$searchBlog)
			   ->group_end()
			   ->where($cond)
			   ->or_where('blog_comments.delete_flag', null)
			   ->order_by('blogs.id', 'desc')
			   ->join('blog_comments', 'blog_comments.blog_id = blogs.id')
			   ->join('blog_category', 'blog_category.id = blogs.blog_category_id','left')
			   ->group_by('blogs.id');
			   $query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
			  }else{
				return 0;
			   }
		} 
	function getBlogDetail($id)
        {
			$cond=array('blogs.active_status' => 'Y','id'=>$id, 'delete_flag' => 'N');
			return $this->db
                ->get_where('blogs', $cond)
                ->row_array();
				
        }

         function getBlogCommentByBlogId($searchParam)
        { 			$cond=array('blog_comments.blog_id' => $searchParam,'blog_comments.delete_flag' => 'N');

			   return $this->db->select('blog_comments.id,
			   							blog_comments.blog_id,
										asp_emp.Profile_Pic,
										asp_emp.First_Name,
										asp_emp.Middle_Name,
										asp_emp.Last_Name,
										blog_comments.email,
										asp_emp.Website,
										blog_comments.comment,
										blog_comments.created_at')
							->from('blog_comments')
							->join('communication as comm','blog_comments.email=comm.E_Mail','left')
							->join('applicant_recruiter as asp_emp','comm.USER_ID=asp_emp.USER_ID','left')
							->where($cond)->Group_by('blog_comments.created_at','asc')->get()
							->result_array();
				
        }
        function nextblog($id){
			$cond=array("delete_flag"=>"N","active_status"=>'Y');
			$this->db->select('blog_title,id');
			$this->db->from('blogs');
			// $this->db->order_by("id", "desc");
			$this->db->where($cond);
			$this->db->where("id>",$id);
			$this->db->limit(1);
			$query = $this->db->get()->row_array();
			return $query;
		}
		function priviousblog($id){
			$actualid=$id-1;
			$cond=array("delete_flag"=>"N","active_status"=>'Y');
			$this->db->select('blog_title,id');
			$this->db->from('blogs');
			$this->db->order_by("id", "desc");
			$this->db->where($cond);
			$this->db->where("id<",$id);
			//$this->db->limit(1);
			$query = $this->db->get()->row_array();
			return $query;
		}
		public function writeBlogExecute($userdata){
		$this->db->insert('blogs',$userdata);  
		return "ok";
	}
	public function updateBlogExecute($userdata, $ID){
		$cond=array('id' => $ID);
	   	$res = $this->db->where($cond)->update('blogs',$userdata);
	   	return $res;
   }
   function checkIfUserExistInBlogOrNot($USER_ID){
        $cond=array('USER_ID'=> $USER_ID);
		$this->db->select('*')->from('blogs')->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }
   }
   function getblogDetailsByUserIdExecute($USER_ID){
	$cond=array('blogs.active_status' => 'Y','USER_ID'=>$USER_ID, 'delete_flag' => 'N');
	return $this->db
		->get_where('blogs', $cond)
		->result_array();
   }
   function getblogDetailsBySpecificData($id){
	$cond=array('active_status' => 'Y','id'=>$id, 'delete_flag' => 'N');
	return $this->db->select('id,USER_ID,blog_category_id,blog_title,
			description,short_desc,blog_images,date_created,date_updated')
		->from('blogs')
		->where($cond)->get()
		->result_array();
	}
	public function writeBlogDraftExecute($userdata){
		$this->db->insert('save_as_draft_blogs',$userdata);  
		return "ok";
	}
	public function updateBlogDraftExecute($userdata, $ID){
		$cond=array('id' => $ID);
		$res = $this->db->where($cond)->update('save_as_draft_blogs',$userdata);
		return $res;
	}
	function getDraftDetailsExecute($ID){
		$cond=array('active_status' => 'Y','id'=>$ID, 'delete_flag' => 'N');
		return $this->db->select('*')
		->from('save_as_draft_blogs')
		->where($cond)->get()
		->result_array();
	}
	function getDraftListExecute($USER_ID){
		$cond=array('active_status' => 'Y','USER_ID'=>$USER_ID, 'delete_flag' => 'N');
		return $this->db->select('*')
		->from('save_as_draft_blogs')
		->where($cond)->get()
		->result_array();
	}
	function empAspSearchParam($searchBlog,$USER_ID) {
		$cond=array('blogs.active_status' => 'Y','blogs.delete_flag' => 'N','blogs.USER_ID' => $USER_ID);
		if(!empty($searchBlog)){
		   $this->db->select('blogs.*')
		   ->from('blogs')
		   ->group_start()
		   ->like('blogs.blog_title', $searchBlog)
		   ->or_like('blogs.description',$searchBlog)
		   ->or_like('blogs.short_desc',$searchBlog)
		   ->group_end()
		   ->where($cond)
		   ->order_by('blogs.id', 'desc');
		   $query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
		  	}else{
				return 0;
		   	}
		} 
		if(empty($searchBlog)){
			$this->db->select('blogs.*')
		   ->from('blogs')
		   ->where($cond)
		   ->order_by('blogs.id', 'desc');
		   $query = $this->db->get();
			if($query->num_rows() > 0){
				return $query->result_array();
		  	}else{
				return 0;
		   	}
		}
	}
	public function updateStatusblogDisable($active_status,$ID){
			$cond=array('id' => $ID);
			$res = $this->db->where($cond)->update('blogs',$active_status);
			return $res;
	}
	public function getblogDisableStatus($ID){
		$cond=array('id'=>$ID);
		$gettest= $this->db->select('active_status')
		->from('blogs')
		->where($cond)->get()
		->row_array();
		return $gettest['active_status'];
	}
}