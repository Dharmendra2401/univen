<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommingSoon extends CI_Controller {
    public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
		$this->load->library('email');
		
		//$this->load->library('upload');
	}
    public function commingsoon(){
        $admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
        $this->load->view('templates/comming_soon',$alldata);
    }
}