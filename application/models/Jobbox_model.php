<?php
    class Jobbox_model extends CI_Model {
        public function __construct(){
        $this->load->database();
        }
		function getJobBoxIDExecute($ID){
			$cond=array('job.ID'=> $ID,'job.DELETE_FLAG'=>'N','job.ACTIVE_FLAG'=>'Y');
			$gettest=$this->db->select('job.ID,pro.PROFILE_NAME,seniority.name,project.PROJECT_NAME,jtitle.JOB_TITLE_NAME,job.LOCATION_IDS,TYPE,BUDGET,DURATION_STARTDATE,DURATION_ENDDATE,VALIDITY_STARTDATE,VALIDITY_ENDDATE,JOB_DESCRIPTION,age.AGE_RANGE,expr.EXPERIENCE_RANGE,exp.EXPERTISE,job.LANGUAGES,job.SKILLS,job.SOFTWARES,PORTFOLIO,function.INDUSTRY_NAME,fun_area.AREA_NAME,OTHER_EXPECTATION,POINTS_FOR_TALENT,job.TAGS,AUDITION,status.STATUS_NAME,VIEW_COUNTER')
			->from('jobbox as job')
			->join('profile as pro', 'pro.PROFILE_ID=job.PROFILE_ID', 'INNER')
			->join('asp_seniority as seniority', 'seniority.id=job.SENIORITY_ID', 'INNER')
			->join('project as project', 'project.ID=job.PROJECT_ID', 'INNER')
			->join('job_title as jtitle', 'jtitle.ID=job.JOB_TITLE_ID', 'INNER')
			->join('age_range as age', 'age.ID=job.AGE_RANGE', 'INNER')
			->join('experience as expr', 'expr.ID=job.EXPERIENCE', 'INNER')
			->join('expertise as exp', 'exp.ID=job.EXPERTISE', 'INNER')
			->join('functional_industry as function', 'function.ID=job.FUNCTIONAL_INDUSTRY_ID', 'INNER')
			->join('functional_area as fun_area', 'fun_area.ID=job.FUNCTIONAL_AREA_ID', 'INNER')
			->join('status as status', 'status.ID=job.STATUS', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
        function getJobBoxExecute($USER_ID){
			$cond=array('job.USER_ID'=> $USER_ID,'job.DELETE_FLAG'=>'N','job.ACTIVE_FLAG'=>'Y');
			$gettest=$this->db->select('job.ID,pro.PROFILE_NAME,seniority.name,project.PROJECT_NAME,jtitle.JOB_TITLE_NAME,job.LOCATION_IDS,TYPE,BUDGET,DURATION_STARTDATE,DURATION_ENDDATE,VALIDITY_STARTDATE,VALIDITY_ENDDATE,JOB_DESCRIPTION,age.AGE_RANGE,expr.EXPERIENCE_RANGE,exp.EXPERTISE,job.LANGUAGES,job.SKILLS,job.SOFTWARES,PORTFOLIO,function.INDUSTRY_NAME,fun_area.AREA_NAME,OTHER_EXPECTATION,POINTS_FOR_TALENT,job.TAGS,AUDITION,status.STATUS_NAME,VIEW_COUNTER')
			->from('jobbox as job')
			->join('profile as pro', 'pro.PROFILE_ID=job.PROFILE_ID', 'INNER')
			->join('asp_seniority as seniority', 'seniority.id=job.SENIORITY_ID', 'INNER')
			->join('project as project', 'project.ID=job.PROJECT_ID', 'INNER')
			->join('job_title as jtitle', 'jtitle.ID=job.JOB_TITLE_ID', 'INNER')
			->join('age_range as age', 'age.ID=job.AGE_RANGE', 'INNER')
			->join('experience as expr', 'expr.ID=job.EXPERIENCE', 'INNER')
			->join('expertise as exp', 'exp.ID=job.EXPERTISE', 'INNER')
			->join('functional_industry as function', 'function.ID=job.FUNCTIONAL_INDUSTRY_ID', 'INNER')
			->join('functional_area as fun_area', 'fun_area.ID=job.FUNCTIONAL_AREA_ID', 'INNER')
			->join('status as status', 'status.ID=job.STATUS', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
		function getAllJobBoxExecute(){
			$cond=array('job.DELETE_FLAG'=>'N','job.ACTIVE_FLAG'=>'Y');
			$gettest=$this->db->select('job.ID,pro.PROFILE_NAME,seniority.name,project.PROJECT_NAME,jtitle.JOB_TITLE_NAME,job.LOCATION_IDS,TYPE,BUDGET,DURATION_STARTDATE,DURATION_ENDDATE,VALIDITY_STARTDATE,VALIDITY_ENDDATE,JOB_DESCRIPTION,age.AGE_RANGE,expr.EXPERIENCE_RANGE,exp.EXPERTISE,job.LANGUAGES,job.SKILLS,job.SOFTWARES,PORTFOLIO,function.INDUSTRY_NAME,fun_area.AREA_NAME,OTHER_EXPECTATION,POINTS_FOR_TALENT,job.TAGS,AUDITION,status.STATUS_NAME,VIEW_COUNTER')
			->from('jobbox as job')
			->join('profile as pro', 'pro.PROFILE_ID=job.PROFILE_ID', 'INNER')
			->join('asp_seniority as seniority', 'seniority.id=job.SENIORITY_ID', 'INNER')
			->join('project as project', 'project.ID=job.PROJECT_ID', 'INNER')
			->join('job_title as jtitle', 'jtitle.ID=job.JOB_TITLE_ID', 'INNER')
			->join('age_range as age', 'age.ID=job.AGE_RANGE', 'INNER')
			->join('experience as expr', 'expr.ID=job.EXPERIENCE', 'INNER')
			->join('expertise as exp', 'exp.ID=job.EXPERTISE', 'INNER')
			->join('functional_industry as function', 'function.ID=job.FUNCTIONAL_INDUSTRY_ID', 'INNER')
			->join('functional_area as fun_area', 'fun_area.ID=job.FUNCTIONAL_AREA_ID', 'INNER')
			->join('status as status', 'status.ID=job.STATUS', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
        public function saveJobBoxExecute($jobbox){
			$this->db->insert('jobbox',$jobbox);
			return "ok";
		}
        public function updateJobBoxExecute($jobbox, $USER_ID,$ID){
			$cond=array('USER_ID'=> $USER_ID,'ID' => $ID);
			$res = $this->db->where($cond)->update('jobbox',$jobbox);
			return $res;
		}
        public function deleteJobBoxExecute($jobbox, $USER_ID, $ID){
			$cond=array('USER_ID'=> $USER_ID,'ID' => $ID);
			$res = $this->db->where($cond)->update('jobbox',$jobbox);
			return $res;
		}
		public function likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam){
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select($selectedColumn2)->from($table)->like($selectedColumn,$searchLike)->get()
            ->result_array();
            return $que;
        }
		public function whereQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam){
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select($selectedColumn2)->from($table)->where($selectedColumn,$searchLike)->get()
            ->result_array();
            return $que;
        }
		//--------------- job aspirant mapping api -------------------------
		function getAspirantJobAllExecute($DELETE_FLAG){
			$cond=array('aspjob.DELETE_FLAG'=>'N','aspjob.ACTIVE_STATUS'=>'Y');
			$gettest=$this->db->select('aspjob.ID,jtitle.JOB_TITLE_NAME,REQUEST_PROFILE_UPDATE,invite.INVITE_NAME,reason.REASON,JOB_APPLICANT_STATUS')
			->from('job_aspirant_mapping as aspjob')
			->join('job_title as jtitle', 'jtitle.ID=aspjob.JOB_TITLE_ID', 'INNER')
			->join('send_interview_invite as invite', 'invite.ID=aspjob.INVITATION_STATUS', 'INNER')
			->join('cancel_reason as reason', 'reason.ID=aspjob.CANCEL_REASON', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
		function getAspirantJobBoxExecute($USER_ID,$DELETE_FLAG){
			$cond=array('USER_ID'=> $USER_ID,'aspjob.DELETE_FLAG'=>'N','aspjob.ACTIVE_STATUS'=>'Y');
			$gettest=$this->db->select('aspjob.ID,jtitle.JOB_TITLE_NAME,REQUEST_PROFILE_UPDATE,invite.INVITE_NAME,reason.REASON,JOB_APPLICANT_STATUS')
			->from('job_aspirant_mapping as aspjob')
			->join('job_title as jtitle', 'jtitle.ID=aspjob.JOB_TITLE_ID', 'INNER')
			->join('send_interview_invite as invite', 'invite.ID=aspjob.INVITATION_STATUS', 'INNER')
			->join('cancel_reason as reason', 'reason.ID=aspjob.CANCEL_REASON', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
		public function saveAspirantJobBoxExecute($jobbox){
			$this->db->insert('job_aspirant_mapping',$jobbox);
			return "ok";
		}
		public function updateAspirantJobBoxExecute($jobbox, $USER_ID, $ID){
			 $cond=array('USER_ID'=> $USER_ID,'ID' => $ID);
			$res = $this->db->where($cond)->update('job_aspirant_mapping',$jobbox);
			return $res;
		}
		public function deleteAspirantJobBoxExecute($data, $USER_ID, $ID){
			$cond=array('USER_ID'=> $USER_ID,'ID' => $ID);
			$res = $this->db->where($cond)->update('job_aspirant_mapping',$data);
			return $res;
		}
		public function validData($selectedItems,$table,$columnName, $data){
			$query=$this->db->select($selectedItems)->from($table)->where($columnName, $data)->get();
			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
		public function saveDataToTable($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}
		public function validData1($selectedItems,$table,$columnName,$data){
			$query=$this->db->select($selectedItems)->from($table)->where($columnName, $data)->get()->row_array();
			return $query[$selectedItems];
		}
		function getStatusExecute(){
			$getall=$this->db->select('*')->from('status')->get()->result_array();
			return $getall;
		}
		function getSortByExecute(){
			$con = array('DELETE_FLAG'=>'Y','STATUS'=>'Y');
			$getall=$this->db->select('*')->from('sort_by')->where($con)->get()->result_array();
			return $getall;
		}
		function validatetitle($USER_ID,$JOB_TITLE_ID){
			$cond=array('USER_ID'=> $USER_ID,'JOB_TITLE_ID' => $JOB_TITLE_ID);
			$getall=$this->db->select('*')->from('jobbox')->where($cond)->get();
			if($getall->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
		function getTitleUserId($USER_ID){
			$con = array('USER_ID'=> $USER_ID);
			$getall=$this->db->select('JOB_TITLE_ID')->from('jobbox')->where($con)->get()->row_array();
			return $getall['JOB_TITLE_ID'];
		}
		function validatetitleasp($USER_ID,$JOB_TITLE_ID){
			$cond=array('USER_ID'=> $USER_ID,'JOB_TITLE_ID' => $JOB_TITLE_ID);
			$getall=$this->db->select('*')->from('job_aspirant_mapping')->where($cond)->get();
			if($getall->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}
		public function validData2($selectedItems,$table,$columnName,$data){
			$query=$this->db->select($selectedItems)->from($table)->where($columnName, $data)->get();
			if($query->num_rows() > 0){
				$query_data=$this->db->select($selectedItems)->from($table)->where($columnName, $data)->get()->row_array();
				return $query_data[$selectedItems];
			}else{
				$data1 = array(
					$columnName => $data,
				);
				$this->db->insert($table,$data1);
				return $this->db->insert_id();
			}
		}
		public function validData3($selectedItems,$table,$columnName,$data){
				$query_data=$this->db->select($selectedItems)->from($table)->where_in($columnName, $data)->get()->row_array();
				return $query_data[$selectedItems];
		}
		public function getStatusByName($status){
			$query=$this->db->select('*')->from('status')->where('STATUS_NAME', $status)->get()->row_array();
			return $query['ID'];
		}
      	public function updateStatusJobBoxExecute($jobbox,$USER_ID,$ID){
			$cond=array('USER_ID'=> $USER_ID,'ID' => $ID);
			$res = $this->db->where($cond)->update('jobbox',$jobbox);
			return $res;
		}
		public function getJobsByStatus($USER_ID,$statusid){
			$cond=array('job.USER_ID'=> $USER_ID,'job.STATUS'=>$statusid,'job.DELETE_FLAG'=>'N','job.ACTIVE_FLAG'=>'Y');
			$gettest=$this->db->select('job.ID,pro.PROFILE_NAME,seniority.name,project.PROJECT_NAME,jtitle.JOB_TITLE_NAME,job.LOCATION_IDS,TYPE,BUDGET,DURATION_STARTDATE,DURATION_ENDDATE,VALIDITY_STARTDATE,VALIDITY_ENDDATE,JOB_DESCRIPTION,age.AGE_RANGE,expr.EXPERIENCE_RANGE,exp.EXPERTISE,job.LANGUAGES,job.SKILLS,job.SOFTWARES,PORTFOLIO,function.INDUSTRY_NAME,fun_area.AREA_NAME,OTHER_EXPECTATION,POINTS_FOR_TALENT,job.TAGS,AUDITION,status.STATUS_NAME,VIEW_COUNTER')
			->from('jobbox as job')
			->join('profile as pro', 'pro.PROFILE_ID=job.PROFILE_ID', 'INNER')
			->join('asp_seniority as seniority', 'seniority.id=job.SENIORITY_ID', 'INNER')
			->join('project as project', 'project.ID=job.PROJECT_ID', 'INNER')
			->join('job_title as jtitle', 'jtitle.ID=job.JOB_TITLE_ID', 'INNER')
			->join('age_range as age', 'age.ID=job.AGE_RANGE', 'INNER')
			->join('experience as expr', 'expr.ID=job.EXPERIENCE', 'INNER')
			->join('expertise as exp', 'exp.ID=job.EXPERTISE', 'INNER')
			->join('functional_industry as function', 'function.ID=job.FUNCTIONAL_INDUSTRY_ID', 'INNER')
			->join('functional_area as fun_area', 'fun_area.ID=job.FUNCTIONAL_AREA_ID', 'INNER')
			->join('status as status', 'status.ID=job.STATUS', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
		public function getaspirantDetailExecute($USER_ID,$ID){
			$cond=array('aspjob.USER_ID'=> $USER_ID,'aspjob.ID'=>$ID);
			$gettest=$this->db->select('app.Gender,app.Date_Of_Birth,comm.Permanent_Address,comm.City,comm.Pin_Code,comm.Country,comm.Mobile_No,comm.E_Mail,app.Hobbies,edu.Highest_Education,edu.Specialization,edu.Year_of_Passing,edu.Othr_Certificates,edu.Language_Known,edu.Softwares,edu.Othr_Compt_Achievements,proff.Working_Status,proff.Association_Name,proff.License_No,proff.Job_Title,proff.Job_Locality,proff.Certificate,proff.Current_Pay,proff.Notice_Period,proff.Yrs_of_Exp,proff.Present_Job_Roles,proff.Job_Desc,proff.Current_Working_Status,proff.Clients_wrk_with,proff.Project_Done,proff.Project_Type')
			->from('job_aspirant_mapping as aspjob')
			->join('applicant_recruiter as app', 'app.USER_ID=aspjob.USER_ID', 'INNER')
			->join('communication as comm', 'comm.USER_ID=aspjob.USER_ID', 'INNER')
			->join('user_education as edu', 'edu.USER_ID=aspjob.USER_ID', 'INNER')
			->join('user_profession as proff', 'proff.USER_ID=aspjob.USER_ID', 'INNER')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
		public function getaspirantProfileDetails($USER_ID,$Profile_Id){
			$cond=array('temp.USER_ID'=> $USER_ID,'temp.Profile_Id'=>$Profile_Id);
			$gettest=$this->db->select('temp.User_From_Val')
			->from('user_profile_temp as temp')
			->where($cond)
			->get()
			->result_array();
			return $gettest;
		}
}