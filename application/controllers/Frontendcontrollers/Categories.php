<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
		$this->load->library('email');
		//$this->load->library('upload');
		$this->load->view('library/upload.php');
		
		
		
	}

   
    public function index(){
        $admindet=$this->Main_model->admin_details();
        $getprofile=$this->Main_model->getallpro();
        $getcat=$this->Main_model->getcategory();
        $getnarration=$this->Main_model->getsubnarration();
        $getcountall=$this->Main_model->getcatcount();
        
        $admin['admin']=$admindet;
        $getcats['getcats']=$getcat;
        $allprofiles['allprofiles']=$getprofile;
        $getnarrations['getnarrations']=$getnarration;
        $getaprocount['getaprocount']=$getcountall;
        $alldata=array_merge_recursive($allprofiles,$admin,$getcats,$getnarrations,$getaprocount);
        $this->load->view('templates/categories.php',$alldata);


    }

    public function category($cat,$sub){	
        $admindet=$this->Main_model->admin_details();
        $subdetails=$this->Main_model->subcategory($sub);
        $profdetails=$this->Main_model->getprofilsss($subdetails['Id']);
        $admin['admin']=$admindet;
        $subdetail['subdetail']=$subdetails;
        $profdetail['profdetail']=$profdetails;
        $alldata=array_merge_recursive($admin,$subdetail,$profdetail);
        $this->load->view('templates/sub-category.php',$alldata);
    }

    public function pro($cat,$subcat,$profiles){
        $admindet=$this->Main_model->admin_details();
        $prooooo=$this->Main_model->getpro($profiles);
        $subdetails=$this->Main_model->subcategory($subcat);
        $profdetails=$this->Main_model->getprofilsss($subdetails['Id']);
        $admin['admin']=$admindet;
        $profile['profile']=$prooooo;
        $getallpro['getallpro']=$profdetails;
        $alldata=array_merge_recursive($profile,$admin,$getallpro);
        $this->load->view('templates/category_profile.php',$alldata);
    }
}
?>