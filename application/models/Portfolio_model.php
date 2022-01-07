<?php
    class Portfolio_model extends CI_Model {
        public function __construct(){
        	$this->load->database();
        }
		public function validMobileLogin($mobile,$email){
			$cond="Mobile_No ='".$mobile."' or E_Mail = '".$email."' ";
            $this->db->select('E_Mail,Mobile_No')
                ->from('communication')
                ->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }	
		}
		
		public function validMobileEmailLogin($mobile){
			$gettest=$this->db->query('SELECT E_Mail,Mobile_No from registration_stg where  Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;	
		}
		public function getLoginUserDetails($mobile,$email){ 
			$cond="Mobile_No ='".$mobile."' or E_Mail = '".$email."' ";
			$gettest= $this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,')
				->from('communication as comm')
				->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')
				->join('applicant_recruiter as asp','comm.USER_ID=asp.USER_ID','INNER')
				->where($cond)
				->get()
				->row_array();
				return $gettest;
            
		}
		public function aspregistration($asp,$keytable,$user_profile,$asp_emp,$comm,$user_temp, $type){
            //echo $profile;die;
			$this->db->insert('registration_stg',$asp);
			$this->db->insert('key_cast_india_users',$keytable);
			$this->db->insert('applicant_recruiter',$asp_emp);
			// $this->db->insert('merchant_user_profile_mapping',array(
            //     'USER_ID'=> $asp_emp['USER_ID'],
            //     'PROFILE_ID'=> $profile,
            //     'TYPE'=> $type
            // ));
            // $this->db->insert('merchant_profile_mapping',array(
            //     'USER_ID'=> $asp_emp['USER_ID'],
            //     'PROFILE_ID'=> $profile
            // ));
			if($user_profile!=''){
				
				$this->db->insert('user_profile_temp',$user_temp);
				$userdata=array();
				$userdata['USER_ID']=$comm['USER_ID'];
				$this->db->insert('user_education',$userdata);
				$this->db->insert('user_profession',$userdata);
			}
			$this->db->insert('communication',$comm);
			return "ok";
		}
		public function getPortfolioID(){
			$getid=$this->db->query('SELECT ID from key_cast_india_users order by ID desc Limit 0,1');
			return $getid->row_array();
			
		}
		public function savePortfolioExecute($data){
			$this->db->insert('portfolio',$data);
			return $this->db->insert_id();
		}
		public function updatePortfolioExecute($data,$USER_ID,$ID){
			$cond=array('USER_ID'=> $USER_ID,'ID'=> $ID);
			$res = $this->db->where($cond)->update('portfolio',$data);
			return $res;
		}
		function getUpcommingBookings($USER_ID){
			$cond=array('USER_ID'=> $USER_ID, 'PORTFOLIO_STATUS'=> 'pending');
			$gettest= $this->db->select('ID ,USER_ID,PORTFOLIO_TYPE,PORTFOLIO_NAME,SHOOT_DATE,SHOOT_TIME,PACKAGE_ID,PHOTOGRAPHER_ID,MAKEUP_ARTIST_ID,COSTUME_DESIGNER_ID,PORTFOLIO_PRICE,STUDIO_LOCATION')
				->from('portfolio')
				->where($cond)
				->get()
				->result_array();
				return $gettest;
        }
		function getPastBookings($USER_ID){
			$cond=array('USER_ID'=> $USER_ID, 'PORTFOLIO_STATUS'=> 'booked');
			$gettest= $this->db->select('ID ,USER_ID,PORTFOLIO_TYPE,PORTFOLIO_NAME,SHOOT_DATE,SHOOT_TIME,PACKAGE_ID,PHOTOGRAPHER_ID,MAKEUP_ARTIST_ID,COSTUME_DESIGNER_ID,PORTFOLIO_PRICE,IMAGES,STUDIO_LOCATION')
				->from('portfolio')
				->where($cond)
				->get()
				->result_array();
				return $gettest;
        }
		function createEventClientExecute($data){
			$this->db->insert('events_client',$data);
			return $this->db->insert_id();
		}
		function myPlansClientExecute($data){
			$this->db->insert('plans_client',$data);
			return $this->db->insert_id();
		}
		
		
}