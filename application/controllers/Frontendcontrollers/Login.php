<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
        $this->load->model('Aspirant_model');
        $this->load->model('Employer_model');
		$this->load->library('email');
		$this->Aspirant_model->authfalse();
        $this->Employer_model->authfalse();
		//$this->load->library('upload');
	}
    public function index(){
    $admindet=$this->Main_model->admin_details();
    $admin['admin']=$admindet;
    $tab=$_REQUEST['tabs'];
    $tabs['tabs']=$tab;
    $alldata=array_merge_recursive($admin,$tabs);
    $this->load->view('templates/login.php', $alldata);
    }

    public function loginasp(){
        $aspmobile=$this->input->post('aspmobile');
        if($_REQUEST['aspemails']!=''){
            $aspemail=$_REQUEST['aspemails'];
        }else{
            $aspemail=base64_decode($_REQUEST['aspemail']);
        }
        
        $type='Aspirant';
        $getaspdetails=$this->Main_model->getaspirantdetails($aspmobile,$aspemail);
       
        if($getaspdetails['Mobile_No']!=''){
        //   $getasp=$this->session->userdata('aspirant'); 
          $getasp['Mobile_No']=$getaspdetails['Mobile_No'];
          $getasp['USER_ID']=$getaspdetails['USER_ID'];
          $getasp['E_Mail']=$getaspdetails['E_Mail'];
          $getasp['First_Name']=$getaspdetails['First_Name'];
          $getasp['Last_Name']=$getaspdetails['Last_Name'];
          $getasp['Profile_Pic']=$getaspdetails['Profile_Pic'];
          $type=$getaspdetails['Type'];
          
          $this->session->set_userdata('aspirant',$getasp);
          redirect(base_url().'aspirant/dashboard');
        }else{
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Invalid aspirant please try again.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'login');
        }
        


    }

    public function loginemp(){

        $aspmobile=$this->input->post('empmobile');
        
        if($_REQUEST['empemails']!=''){
            $aspemail=$_REQUEST['empemails'];
        }else{
            $aspemail=base64_decode($_REQUEST['aspemail']);
        }
        $getaspdetails=$this->Main_model->getempirantdetails($aspmobile,$aspemail); 
        if($getaspdetails['Mobile_No']!=''){
        //   $getasp=$this->session->userdata('aspirant'); 
          $getemp['Mobile_No']=$getaspdetails['Mobile_No'];
          $getemp['USER_ID']=$getaspdetails['USER_ID'];
          $getemp['E_Mail']=$getaspdetails['E_Mail'];
          $getemp['First_Name']=$getaspdetails['First_Name'];
          $getemp['Last_Name']=$getaspdetails['Last_Name'];
          $getemp['Profile_Pic']=$getaspdetails['Profile_Pic'];
          
          $type=$getaspdetails['Type'];

          $this->session->set_userdata('employer',$getemp);
          redirect(base_url().'employer/dashboard');
        }else{
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Invalid employer please try again..<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'login');
        }
        


    }

}
?>