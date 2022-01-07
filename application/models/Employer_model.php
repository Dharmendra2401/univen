<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Employer_model extends CI_Model {
    public function authfalse(){
   
        $getadmin=$this->session->userdata('employer');
        if(!empty($getadmin)){
        redirect(base_url().'employer/dashboard');
        return false;
        }
        
        
        }

        public function authtrue(){
   
            $getadmin=$this->session->userdata('employer');
            if(empty($getadmin)){
            redirect(base_url().'login');
            return true;
            }
            
            
            }


}

   