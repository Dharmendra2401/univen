<?php
    class Univen_model extends CI_Model {
        public function __construct(){
        	$this->load->database();
        }
        public function validEmailLogin($email,$password){
			$cond="E_Mail ='".$email."' and Password = '".$password."' ";
            $this->db->select('E_Mail,Mobile_No')
                ->from('registration_stg')
                ->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }	
		}
		public function validMobileEmailLogin($email){
			$gettest=$this->db->query('SELECT E_Mail from registration_stg where E_Mail="'.$email.'" ');
			$results = $gettest->num_rows();
			return $results;	
		}
		public function getLoginUserDetails($email){ 
			$cond=" E_Mail = '".$email."' ";
			$gettest= $this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,')
				->from('communication as comm')
				->join('key_univen_users as key','key.ID=comm.USER_ID','INNER')
				->join('applicant_recruiter as asp','comm.USER_ID=asp.USER_ID','INNER')
				->where($cond)
				->get()
				->row_array();
				return $gettest;
		}
		public function getLoginUserDetailsReg($email){ 
			$cond=array('comm.E_Mail'=> $email);
			$gettest= $this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID')
				->from('communication as comm')
				->join('key_univen_users as key','key.ID=comm.USER_ID','INNER')
				->join('applicant_recruiter as asp','comm.USER_ID=asp.USER_ID','INNER')
				->where($cond)
				->get()
				->row_array();
				return $gettest;
		}
		public function resetPassword($email,$data){ 
			$cond=array('E_Mail'=> $email);
			$res = $this->db->where($cond)->update('registration_stg',$data);
			return $res;
		}
		public function aspregistration($asp,$keytable,$asp_emp,$comm){
			$this->db->insert('registration_stg',$asp);
			$this->db->insert('key_univen_users',$keytable);
			$this->db->insert('applicant_recruiter',$asp_emp);
			$this->db->insert('communication',$comm);
			return "ok";
		}
}