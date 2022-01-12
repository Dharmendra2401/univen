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
		public function saveDataToTable($db,$saveTableData){
		    $this->db->insert($db,$saveTableData);
			return "ok";
		}
		public function getDataFromTable($table,
        $USER_ID){
		    $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $que=$this->db->select('*')->from($table)->where($cond)->get()->result_array();
            return $que;
		}
		public function getTableData(){	

		$this->db->select('*');
		$this->db->from('uni_most_featured as featured');
		$this->db->join('uni_our_plan as plans', 'featured.FEATURED_ID = plans.ID');
		$query = $this->db->get();
		return $query->result_array();
	
		}public function getSelectedColumn($table,$selectedColumn){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)-> where($cond)->get()->result_array();
            return $que;
        }
        public function likeQueryExecuteMore($table,$TRADE_NAME,$selectedColumn){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $que=$this->db->select($selectedColumn)->from($table)->where($cond)->like($TRADE_NAME)->get()->row_array();
            return $que[$selectedColumn];
        }
        public function getLimitedDataFromTable($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->order_by($order, "asc")->get()->result_array();
            return $que;
		}
		public function getRowDataFromTable($table,
        $USER_ID,$selectedData,$cond){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->get()->row_array();
            return $que;
		}
		//----------------- Request recieved start------------------------------//
		public function pendingRequestRecievedCount($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->having('REQUEST_STATUS', 1)->get()->num_rows();
            return $que;
		}
		public function requestRejectedRecievedCount($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->having('REQUEST_STATUS', 2)->get()->num_rows();
            return $que;
		}
		public function requestFailedRecievedCount($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->having('REQUEST_STATUS', 3)->get()->num_rows();
            return $que;
		}
		//----------------- Request recieved end------------------------------//
		//----------------- Request send start------------------------------//
		public function pendingRequestSendCount($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->having('REQUEST_STATUS', 1)->get()->num_rows();
            return $que;
		}
		public function requestRejectedSendCount($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->having('REQUEST_STATUS', 2)->get()->num_rows();
            return $que;
		}
		public function requestFailedSendCount($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->where($cond)->having('REQUEST_STATUS', 3)->get()->num_rows();
            return $que;
		}
	//----------------- Request recieved end------------------------------//
		public function requestRecieved($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->join('uni_proof_identity as uni_proof_identity','uni_request_recieved.REQUESTED_BY=uni_proof_identity.USER_ID','INNER')->join('uni_status as uni_status','uni_request_recieved.REQUEST_STATUS=uni_status.ID','INNER')->where($cond)->get()->result_array();
            return $que;
		}
		public function requestRecievedSend($table,
        $USER_ID,$selectedData,$cond,$order){
            $que=$this->db->select($selectedData)->from($table)->join('uni_proof_identity as uni_proof_identity','uni_request_send.REQUESTED_TO=uni_proof_identity.USER_ID','INNER')->join('uni_status as uni_status','uni_request_send.REQUEST_STATUS=uni_status.ID','INNER')->where($cond)->get()->result_array();
            return $que;
		}
		public function getStateCodeData($table,
        $STATE){
		    $cond=array('STATE' =>$STATE,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $que=$this->db->select('STATECODE')->from($table)->where($cond)->get()->result_array();
            return $que;
	    }
}
