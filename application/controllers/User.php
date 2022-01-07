<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() 
	{
        parent:: __construct();
        
		// $this->load->model('Admin_model');
		$this->load->model('Common_model');
		
	}

	public function staff_user(){
		
		$data["title"] = "Staff User";
		if($_POST){
			if($this->input->post('uid')){
				
				$data = $this->input->post();
				$this->form_validation->set_rules('uid','uid','required');
				$this->form_validation->set_rules('edit_module_name','edit_module_name','required');
				if($this->form_validation->run()==true){
					
					$this->Common_model->_update("backend_module",["Backend_Mod_Name"=>$data["edit_module_name"]],["Back_Mod_ID"=>$data["uid"]]);
					$this-
					$this->session->set_flashdata('success',"Record updated successfully");
					redirect(base_url().'master/modules');

				}
				$this->session->set_flashdata('error','Error! Please fill out the fields and try again');
				redirect(base_url().'master/modules');

			}else{

				
				$data = $this->input->post();
				// print_r($data);exit;
				$this->form_validation->set_rules('add_module_name[]','add_module_name','required');
				if($this->form_validation->run()==true){
					foreach ($data["add_module_name"] as $key => $value) {
						$this->Common_model->_insert("backend_module",["Backend_Mod_Name"=>$value]);
					}
					$this->session->set_flashdata('success',"Record added successfully"); 
					redirect(base_url().'master/modules');

				}
				$this->session->set_flashdata('error','Error! Please fill out the fields and try again');
				redirect(base_url().'master/modules');
			}	
		}

		$data["modules_list"] = $this->Common_model->get_all_data("backend_module");
		$this->load->view('templates/admin/modules',$data);
	}
}