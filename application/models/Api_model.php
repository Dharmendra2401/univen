<?php

    class Api_model extends CI_Model {
        
        public function __construct(){
        $this->load->database();
        }
       
		public function validmobile($mobile){
			$gettest=$this->db->query('SELECT E_Mail,Mobile_No from registration_stg where  Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;
		}

		public function duplicateemailcheck($email){
			$gettest=$this->db->query('SELECT E_Mail from registration_stg where  E_Mail="'.$email.'"');
			$results = $gettest->num_rows();
			return $results;
		}
		
	public function getadditionaldetails($id,$type){
				if($type=='Aspirant'){
					$this->db->select('det.Profile_Pic,det.Date_Of_Birth,det.Gender,det.Middle_Name,comm.Pin_Code')->from('applicant_recruiter as det')->join('communication as comm','comm.USER_ID=det.USER_ID','Inner');
					$query=$this->db->where('det.USER_ID', $id)->get();
				}else{
					$this->db->select('det.Profile_Pic,det.Budget_Of_Project,empdet.PROFILE_ID,empdet.BRAND_NAME,,empdet.BUSINESS_INFORMATION,empdet.CATEGORY_ID')->from('applicant_recruiter as det')->join('employer_user_profile_mapping as empdet','det.USER_ID= empdet.USER_ID','Inner');
					$query=$this->db->where('det.USER_ID', $id)->get();
				}
				
				return $returnval=$query->row_array();
				//return $returnval;
			}
		
		public function validMobileLogin($mobile,$type,$email){
			$orcondition="(comm.E_Mail='$email' OR comm.Mobile_No='$mobile')";
			if($type==EMPLOYER){
				$condition=array('asp_emp.Recruiter_Access'=>"Y");
				$condition=array('asp_emp.Recruiter_Access'=>"Y",'comm.Mobile_No'=>$mobile);
				$gettest=$this->db->select('asp_emp.Recruiter_Access,asp_emp.Applicant_Access,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp_emp','key.ID=asp_emp.USER_ID','INNER')->where($condition)->where($orcondition)->get()->num_rows();
				return $gettest; 
			}
			if($type==ASPIRANT){
				$condition=array('asp.Applicant_Access'=>"Y");
				$gettest=$this->db->select('asp.Recruiter_Access,asp.Applicant_Access,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp','key.ID=asp.USER_ID','INNER')->where($condition)->where($orcondition)->get()->num_rows();
				return $gettest; 
			}
			
		}
		public function getLoginUserDetails($mobile,$type,$email){
				$orcondition="(comm.E_Mail='$email' OR comm.Mobile_No='$mobile')";
				$condition =($type==EMPLOYER)?'Recruiter_Access="Y" ':'Applicant_Access="Y" ';
				$gettest=$this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,asp.Profile_Pic,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp','comm.USER_ID=asp.USER_ID','INNER')->where($condition)->where($orcondition)->get()->row_array();
				return  $gettest;  

		}
		
		public function validemail($email,$mobile){
			$gettest=$this->db->query('SELECT E_Mail,Mobile_No from registration_stg where  E_Mail="'.$email.'" and Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;
		}

		public function getseniority(){

			$this->db->select('*');
			$this->db->from('asp_seniority');
			$this->db->order_by("id", "asc");
			$seniorty=$this->db->get();
			return $seniorty->result_array();
        
		}

		public function getemployercat(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('employer_category');
			$this->db->order_by("id", "desc");
			$empcat=$this->db->get();
			return $empcat->result_array();
		}

		public function getallprofiles($iwanttobe){
			$iwanttobeget.='';
			$iwanttobeget.=$iwanttobe['name'];
			$que=$this->db->select('cta.Category_ID,cta.Category_Name as catname,sub.Sub_Category_ID as subcatid,sub.Sub_Category_Name,pro.PROFILE_ID,pro.PROFILE_NAME,map.Category_ID,map.Sub_Category_ID,map.PROFILE_ID')->from('profile_form_mapping as map')->join('sub_category as sub','sub.Sub_Category_ID=map.Sub_Category_ID','INNER')->join('profile as pro','pro.PROFILE_ID=map.PROFILE_ID','INNER')->join('category as cta','cta.Category_ID=map.Category_ID','INNER')->where('pro.PROFILE_NAME  LIKE "%'.$iwanttobeget.'%"')->group_by('pro.PROFILE_ID')->get()->result_array();
			
			return $que;

		}
		
		public function get_asp_emp_id(){
			$getid=$this->db->query('SELECT ID from key_cast_india_users where Type_ID="Aspirant" OR Type_ID="Employer" order by ID desc Limit 0,1');
			return $getid->row_array();
			
		}

		public function get_cat_id($name){
			$getid=$this->db->query('SELECT Category_Id from category WHERE Category_Name="'.$name.'" ');
			$showcat=$getid->row_array();
			return $showcat['Category_Id'];
		}

		public function get_subcat_id($name){
			$getid=$this->db->query('SELECT Sub_Category_ID from sub_category WHERE Sub_Category_Name="'.$name.'" ');
			$showcat=$getid->row_array();
			return $showcat['Sub_Category_ID'];
		}

		public function get_profile_id($name){
			$getid=$this->db->query('SELECT PROFILE_ID from profile WHERE PROFILE_NAME="'.$name.'" ');
			$showcat=$getid->row_array();
			return $showcat['PROFILE_ID'];
		}

		public function aspregistration($asp,$keytable,$user_profile,$asp_emp,$comm,$user_temp){
			
			$this->db->insert('registration_stg',$asp);
			$this->db->insert('key_cast_india_users',$keytable);
			$this->db->insert('applicant_recruiter',$asp_emp);
			$this->db->insert('employer_user_profile_mapping',array('USER_ID'=> $asp_emp['USER_ID']));
			if($user_profile!=''){
				$this->db->insert('user_profile_mapping',$user_profile);
				$this->db->insert('user_profile_temp',$user_temp);
				$userdata=array();
				$userdata['USER_ID']=$comm['USER_ID'];
				$this->db->insert('user_education',$userdata);
				$this->db->insert('user_profession',$userdata);
			}
			
			$this->db->insert('communication',$comm);

			return "ok";
		}


		public function state(){
			$cond="state!= ' ' ";
			$this->db->select('state');
			$this->db->from('states_city_country');
			$this->db->where($cond);
			$this->db->group_by('state'); 
			$this->db->order_by("state", "asc");
			$state=$this->db->get();
			return $state->result_array();
		}

		function getCategory($searchParam) {
		    if(empty($searchParam))
		       return array();
			$cond="ACTIVE_STATUS= 'Y'";
		    $result =  $this->db
							->select('Category_ID,Category_Name')
							->from('category')
							->where($cond)
							->like('Category_Name',$searchParam)
		             		->get()
							->result_array();
		    return $result;
		} 
		
		function getProfile($searchParam,$notvalid) {
			
			 
		    if(empty($searchParam))
		       return array();
			$cond="ACTIVE_STATUS= 'Y' and PROFILE_ID NOT IN ($notvalid)";
		    $result =  $this->db
							->select('PROFILE_ID,PROFILE_NAME')
							->from('profile')
							->where($cond)
							->like('PROFILE_NAME',$searchParam)
		             		->get()
							->result_array();
		    return $result;
		} 



		function getSizeOfProjectBudget($searchParam) {
		    if(empty($searchParam))
		       return array();
			$cond="ACTIVE_STATUS= 'Y'";
		    $result =  $this->db
							->select('BUDGET_ID,BUDGET')
							->from('employer_size_of_projectbudget')
							->where($cond)
							->like('BUDGET', $searchParam)
		             		->get()
							->result_array();
		    return $result;
		} 


		public function faq(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->order_by("id", "desc");
			$getfaq=$this->db->get();
			return $getfaq->result_array();
		}


		public function getGeoCode($pincode){
            $getcity=$this->db->select('city,state,country')
			->from('states_city_country')
			->where('pincode',$pincode)
			->order_by('city','asc')
			->GROUP_BY('city,state,country')
			->get()->result_array();
            return  $getcity;
        }
		public function getStateByCity($city){
            $getcity=$this->db->select('city,state')
			->from('states_city_country')
			->where('city',$city)
			->order_by('city','asc')
			->GROUP_BY('city')
			->get()->result_array();
            return  $getcity;
        }



		public function updatepersonal($comm,$asp,$id,$user_profile){
			$applicantRecruiterStatus=$this->db->where('USER_ID',$id)->update('applicant_recruiter',$asp);
            if ($user_profile!='') {
                $empuserprofilemapstatus=$this->db->where('USER_ID', $id)->update('employer_user_profile_mapping', $user_profile);
				return ( $empuserprofilemapstatus AND $applicantRecruiterStatus);
            }else{
				$communicationStatus=$this->db->where('USER_ID', $id)->update('communication', $comm);
				return ($communicationStatus AND $applicantRecruiterStatus);
        }
			}
			
		public function admin_details(){ 
			$this->db->select('*');
			$this->db->from('banner_image');
			$this->db->from('admin');
			$query = $this->db->get();
			$returnval=$query->row_array();
			return $returnval;
			
		}
		public function gethired_hire(){
			$this->db->select('*');
			$this->db->from('steps');
			$getstep=$this->db->get();
			return$getstep->result_array();
		}
		public function banner(){
			$this->db->select('*');
			$this->db->from('banner_image');
			$banner=$this->db->get();
			return $banner->row_array();
		}
		public function searchCompanyName($mobile){
			
			$cond=array('Recruiter_Access'=>'Y',
						'ACTIVE_STATUS'=> 'Y',
						'USER_ID'=> $mobile,'Recruiter_Represents'=>'Company');
			$this->db->where($cond)
				->select('Company_Name')
				->from('applicant_recruiter');
				
			return $this->db->get()->row();
		}
		public  function recentemp(){
			$gettest=$this->db->query('SELECT logo,url FROM recentemp where  delete_flag="N" and status="Y" order by id desc');
			return $gettest->result_array();

		}
		public  function usercontent(){
			$this->db->select('*');
			$this->db->from('usercontent');
			$this->db->order_by("id", "asc");
			$getuser=$this->db->get();
			return $getuser->result_array();

		}
		
		public function testimonals(){
			$gettest=$this->db->query('SELECT fullname,image,content,position FROM testimonials where  delete_flag="N" and status="Y"');
			$this->db->order_by("id", "asc");
			return $gettest->result_array();
		}

		public function getvideo(){
			$this->db->select('*');
			$this->db->from('vedio_content');
			$getvideo=$this->db->get();
			return $getvideo->row_array();
		}

		public function getUserId($userid){
			$cond=array('USER_ID'=> $userid); 
			return $this->db->where($cond)
				->select('Mobile_No')
				->from('communication ')
				->get()->row_array();
		}
		public function getEmployeVerificationDetails($type,$userid){
			// $cond=array('Mobile_No'=> $mobile);
			// $mob = $this->db->where($cond)
			// 	->select('USER_ID')
			// 	->from('communication ')
			// 	->get()->row_array();
			// 	$userid= $mob['USER_ID'];
			$condition="(key.Type_ID='$type' AND key.ID='$userid')";
			$gettest=$this->db->select('recruiter.First_Name,recruiter.Last_Name,comm.Mobile_No,comm.E_Mail,map.BRAND_NAME,recruiter.Website,reg.Address,comm.City,comm.State,comm.Country,map.CATEGORY_ID,map.PROFILE_ID,recruiter.Budget_Of_Project,recruiter.Referral_Code,recruiter.Profile_Pic,recruiter.Company_Name,map.BUSINESS_INFORMATION')
			->from('key_cast_india_users as key')
			->join('communication as comm', 'comm.USER_ID=key.ID', 'INNER')
			->join('applicant_recruiter as recruiter','recruiter.USER_ID=comm.USER_ID','INNER')
			->join('employer_user_profile_mapping as map','map.USER_ID=comm.USER_ID','INNER')
			->join('registration_stg as reg','reg.Mobile_No=comm.Mobile_No','INNER')
			->where($condition)
			->get()
			->row_array();
			return $gettest;
		}
		public function updatepAppliRecuiter($id,$rec){
			$rec = $this->db->where('USER_ID',$id)->update('applicant_recruiter',$rec);
			return $rec;
		}
		public function updatepCommunication($comm, $id){
			$comm = $this->db->where('USER_ID',$id)->update('communication',$comm);
			return $comm;
		}
		public function updatepEmpUserProMapping($emp, $id){
			$emp = $this->db->where('USER_ID',$id)->update('employer_user_profile_mapping',$emp);
			return $emp;
		}
		public function updatepRegStag($emp, $type,$mobile){
			$condition="(TYPE_OF_REGISTRATION='$type' AND Mobile_No='$mobile')";
			 $this->db->where($condition)->update('registration_stg', $emp);    
		}
		public function getindivisualVerification($type,$userid){
			$cond=array('Mobile_No'=> $mobile);
			// $mob = $this->db->where($cond)
			// 	->select('USER_ID')
			// 	->from('communication ')
			// 	->get()->row_array();
			// 	$userid= $mob['USER_ID'];
			$condition="(TYPE='$type' AND USER_ID='$userid')";
			$gettest=$this->db->select('FIRST_NAME,LAST_NAME,DOC_NUMBER,DOB,ADDRESS')
			->from('indivisual')
			->where($condition)
			->get()
			->row_array();
			return $gettest;
		}
		public function getpartnershipFirmVerification($type,$userid){
			$cond=array('Mobile_No'=> $mobile);
			$condition="(key.Type_ID='$type' AND key.ID='$userid')";
			$gettest=$this->db->select('map.PARTNERSHIP,comm.E_Mail,map.PARTNER,map.REGISTERED_ADDRESS')
			->from('key_cast_india_users as key')
			->join('communication as comm', 'comm.USER_ID=key.ID', 'INNER')
			->join('applicant_recruiter as recruiter','recruiter.USER_ID=key.ID','INNER')
			->join('partnership as map','map.USER_ID=comm.USER_ID','INNER')
			->join('registration_stg as reg','reg.Mobile_No=comm.Mobile_No','INNER')
			->where($condition)
			->get()
			->row_array();
			return $gettest;
		}
		public function getCompanyVerification($type,$userid){
			$cond=array('Mobile_No'=> $mobile);
			$condition="(key.Type_ID='$type' AND key.ID='$userid')";
			$gettest=$this->db->select('recruiter.Company_Name,comm.E_Mail,map.PARTNERS,map.DATE_OF_INCORPORATION,map.CIN,map.REGISTERED_ADDRESS')
			->from('key_cast_india_users as key')
			->join('communication as comm', 'comm.USER_ID=key.ID', 'INNER')
			->join('applicant_recruiter as recruiter','recruiter.USER_ID=key.ID','INNER')
			->join('company as map','map.USER_ID=comm.USER_ID','INNER')
			->join('registration_stg as reg','reg.Mobile_No=comm.Mobile_No','INNER')
			->where($condition)
			->get()
			->row_array();
			return $gettest;
		}
		public function getindivisualVerificationUser_id($userid){
			$cond=array('USER_ID'=> $userid); 
			return $this->db->where($cond)
				->select('USER_ID')
				->from('indivisual ')
				->get()->row();
			
		}
		public function updateIndivisual($id,$ind){
			$ind = $this->db->where('USER_ID',$id)->update('indivisual',$ind);
			return $ind;
		}
		public function insertIndivisual($ind){
			$this->db->insert('indivisual',$ind);
			return "ok";
		}
		//------------company --------------------------
		public function getCompanyVerificationUser_id($userid){
			$cond=array('USER_ID'=> $userid); 
			return $this->db->where($cond)
				->select('USER_ID')
				->from('company ')
				->get()->row();
			
		}
		public function updateCompany($id,$company){
		$company = $this->db->where('USER_ID',$id)->update('company',$company);
			return $company;
			
		}
		public function insertCompany($company){
			$this->db->insert('company',$company);
			return "ok";
		}
		//------------partnership --------------------------
		public function getPartnershipVerificationUser_id($userid){
			$cond=array('USER_ID'=> $userid); 
			return $this->db->where($cond)
				->select('USER_ID')
				->from('partnership ')
				->get()->row();
		}
		public function updatePartnership($id,$partnership){
			$partnership = $this->db->where('USER_ID',$id)->update('partnership',$partnership);
			return $partnership;
		}
		public function insertPartnership($partnership){
			$this->db->insert('partnership',$partnership);
			return "ok";
		}

}