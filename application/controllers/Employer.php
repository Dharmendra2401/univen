<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {
public function __construct() 
{
parent:: __construct();
$this->load->helper('url','form');
$this->load->library("pagination");
$this->load->model('Employer_model');
$this->load->model('Main_model');
$this->load->library('email');
$this->Employer_model->authtrue();

//$this->load->library('upload');
}



public function dashboard(){
    
$admindet=$this->Main_model->admin_details();
$admin['admin']=$admindet;
$getempuser=$this->session->userdata('employer');
$getempusers['getempusers']=$getempuser;
$alldata=array_merge_recursive($admin,$getempusers);

$this->load->view('templates/employer/index',$alldata);
}

public function logout(){
$this->session->unset_userdata('employer');
$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
Logout Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'login');
}

}