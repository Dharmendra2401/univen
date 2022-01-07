<?php 

Class ApiProfilesModel extends CI_model {
    

		public function __construct() {
		  parent::__construct(); 
		//  $this->load->database();
		}
	  
		public function getdropsearch($type,$name,$values){
            $cond='Form_Type="Form One" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name Like "'
			.$name.'%" and Name NOT IN ("'.$values.'") ';
            $getlist=$this->db->where($cond)
						->select('Name')->from('dropdown_profile')
						->order_by('Name','asc')
						->get()->result_array();
            return $getlist;
        }
		public function getlang(){
            $cond="type ='Language Known' and Delete_Flag='N' and Form_Type='Form One'";
            $getname=$this->db->select('name')->from('dropdown_profile')->where($cond)->order_by('name','asc')->get()->result_array();
           
            return $getname;

        }
		public function getdroplist($type,$formtype){
            $cond='Form_Type="'.$formtype.'" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N"  ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->result_array();
            return $getlist;
        }
		public function updateeducationdetails($education,$id){
            $countedu=$this->db->select('USER_ID')->from('user_education')->where('USER_ID',$id)->get()->num_rows();
            if($countedu=='0'){
                $education['USER_ID']=$id;
                $this->db->insert('user_education',$education);
                return $this->db->affected_rows();
            }else{
                return $this->db->where('USER_ID',$id)->update('user_education',$education);
            }
            
        }

        public function getprofilepagedetails($id){
            $get=$this->db->select('asp.*,comm.*,proffesion.*,edu.*')->from('applicant_recruiter as asp')->join('communication as comm','comm.USER_ID=asp.USER_ID','INNER')->join('user_profession as proffesion ','proffesion.USER_ID=asp.USER_ID','LEFT')->join('user_education as edu','edu.USER_ID=asp.USER_ID','LEFT')->where('comm.Mobile_No',$id)->get()->row_array();
            return $get;

        }

		public function addprofiles($add){
           
            $this->db->insert('user_profile_temp',$add);
            return  $this->db->affected_rows();
        }
		public function updateproffessional($proff,$id){
            $countpersonal=$this->db->select('USER_ID')->from('user_profession')->where('USER_ID',$id)->get()->num_rows();
            if($countpersonal=='0'){
               $proff['USER_ID']=$id;
               $this->db->insert('user_profession',$proff);
               return $this->db->affected_rows();
            }else{
               return $this->db->where('USER_ID',$id)->update('user_profession',$proff);
            }
            
        }

        public function updatePersonalDetails($comm,$asp,$id){
            $applicantRecruiterStatus=$this->db->where('USER_ID',$id)->update('applicant_recruiter',$asp);
            $communicationStatus=$this->db->where('USER_ID',$id)->update('communication',$comm);
            return ($communicationStatus AND $applicantRecruiterStatus);
        }


}