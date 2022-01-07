<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Blog_model');
		$this->load->model('Main_model');
		$this->load->library('email');
		
		//$this->load->library('upload');
	}
	public function index()
	{
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$blog_category=$this->Blog_model->get_blog_category();
		$blogs =$this->Blog_model->get_blog_list();
		$blogs_limits =  $this->Blog_model->get_blog_limit();
		$blogs_sliders=$this->Blog_model->get_blog_sliders();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
	    $blog_category['blog_category']=$blog_category;
		$blogs['blogs']=$blogs;
		$blogs_limits['blogs_limits']=$blogs_limits;
		$blogs_sliders['blogs_sliders']=$blogs_sliders;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$blog_category,$blogs,$blogs_limits,$blogs_sliders);
		$this->render_blog('templates/blog/blog',$alldata);
	}
	public function blog_list($id)
	{
	    $admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$blog_category=$this->Blog_model->get_blog_list_by_category($id);
		
		$blogs =$this->Blog_model->get_blog_list();
		$blogs_limits =  $this->Blog_model->get_blog_limit();
		$blogs_sliders=$this->Blog_model->get_blog_sliders();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
	    $blog_category['blog_category']=$blog_category;
		$blogs['blogs']=$blogs;
		$blogs_limits['blogs_limits']=$blogs_limits;
		$blogs_sliders['blogs_sliders']=$blogs_sliders;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$blog_category,$blogs,$blogs_limits,$blogs_sliders);
		
		$this->render_blog('templates/blog/blog_list',$alldata);
	}
	public function blog_details($id)
	{
	    $admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$blog_category=$this->Blog_model->get_blog_category();
		$blogs =$this->Blog_model->get_blog_list();
		$blogs_limits =  $this->Blog_model->get_blog_limit();
		$blogs_sliders=$this->Blog_model->get_blog_sliders();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
	    $blog_category['blog_category']=$blog_category;
		$blogs['blogs']=$blogs;
		$blogs_limits['blogs_limits']=$blogs_limits;
		$blogs_sliders['blogs_sliders']=$blogs_sliders;
		$blog_details['blog_details'] = $this->db->get_where('blogs', array('id'=>$id))->row_array();
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$blog_details,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$blog_category,$blogs,$blogs_limits,$blogs_sliders);
		
	
		$this->render_blog('templates/blog/blog_details',$alldata);
	}
	public function blog_comment(){
		$data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['website'] = $this->input->post('website');
        $data['comment'] = $this->input->post('comment');
        $data['blog_id'] = $this->input->post('blog_id');
        $page_data['save_blog_comment'] = $this->Blog_model->save_blog_comment($data);
        redirect(base_url() . 'blog/index', 'refresh');
	}
	public function search_param(){
      $title = $this->input->post('blog_title');
	  $admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$blog_category=$this->Blog_model->get_blog_category();
		$blogs =$this->Blog_model->get_blog_list();
		$blogs_limits =  $this->Blog_model->get_blog_limit();
		$blogs_sliders=$this->Blog_model->get_blog_sliders();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
	    $blog_category['blog_category']=$blog_category;
		$blogs['blogs']=$blogs;
		$blogs_limits['blogs_limits']=$blogs_limits;
		$blogs_sliders['blogs_sliders']=$blogs_sliders;
		$blog_details['blog_details'] = $this->db->get_where('blogs', array('id'=>$id))->row_array();
		
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$blog_details,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$blog_category,$blogs,$blogs_limits,$blogs_sliders);
		
      $search_param['search_param'] = $this->Blog_model->getSearchBlog($title);
	  $alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$search_param,$blog_details,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$blog_category,$blogs,$blogs_limits,$blogs_sliders);
		
      $this->render_blog('templates/blog/blog',$alldata);
    }
	
}