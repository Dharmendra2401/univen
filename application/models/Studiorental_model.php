<?php
    class Studiorental_model extends CI_Model {
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
		function getProfileId($user_id){
			$cond=array('USER_ID'=> $user_id);
			$gettest= $this->db->select('PROFILE_ID')
				->from('merchant_user_profile_mapping')
				->where($cond)
				->get()
				->row_array();
				return $gettest['PROFILE_ID'];
		}
		function getformtemp($data){
			$cond=array('PROFILE_ID'=> $data);
			$gettest= $this->db->select('form_templates')
				->from('studio_rentals_profile')
				->where($cond)
				->get()
				->row_array();
				return $gettest['form_templates'];
		}
		function getProfileName($data){
			$cond=array('PROFILE_ID'=> $data);
			$gettest= $this->db->select('PROFILE_NAME')
				->from('studio_rentals_profile')
				->where($cond)
				->get()
				->row_array();
				return $gettest['PROFILE_NAME'];
		}
		public function validemail($email){
			$cond=array('E_Mail'=>$email);
            $this->db->select('E_Mail')->from('communication')->where($cond);
			return $query = $this->db->get()->num_rows();
            
		}
		public function validMobileEmailLogin($mobile,$email){
			$gettest=$this->db->query('SELECT E_Mail,Mobile_No from registration_stg where  Mobile_No="'.$mobile.'" or E_Mail="'.$email.'" ');
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
		public function getLoginUserDetailsReg($mobile){ 
			$cond=array('comm.Mobile_No'=> $mobile);
			$gettest= $this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,merchant.PROFILE_ID,')
				->from('communication as comm')
				->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')
				->join('applicant_recruiter as asp','comm.USER_ID=asp.USER_ID','INNER')
				->join('merchant_user_profile_mapping as merchant','merchant.USER_ID=asp.USER_ID','INNER')
				->where($cond)
				->get()
				->row_array();
				return $gettest;
		}
		public function aspregistration($asp,$keytable,$user_profile,$asp_emp,$comm,$user_temp, $type, $profile){
            //echo $profile;die;
			$this->db->insert('registration_stg',$asp);
			$this->db->insert('key_cast_india_users',$keytable);
			$this->db->insert('applicant_recruiter',$asp_emp);
			$this->db->insert('merchant_user_profile_mapping',array(
                'USER_ID'=> $asp_emp['USER_ID'],
                'PROFILE_ID'=> $profile,
                'TYPE'=> $type
            ));
            $this->db->insert('merchant_profile_mapping',array(
                'USER_ID'=> $asp_emp['USER_ID'],
                'PROFILE_ID'=> $profile
            ));
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
        function getProfileList(){
            $cond=array('ACTIVE_FLAG' => 'Y','DELETE_FLAG' => 'N');
            $this->db->select('ID ,NAME')
                ->from('merchant_profile')
                ->where($cond);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return 0;
            }
        }
        function getProjectList(){
            $cond=array('STATUS' => 'Y');
            $this->db->select('ID ,NAME')
                ->from('portfolio_type')
                ->where($cond);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return 0;
            }
        }
		public function saveStudiorentalExecute($data){
            $this->db->insert('studio_rentals',$data);
			return $this->db->insert_id();
		}
		public function updateStudiorentalExecute($data,$USER_ID){
			$cond=array('USER_ID'=> $USER_ID);
			$res = $this->db->where($cond)->update('studio_rentals',$data);
			return $res;
		}
        public function validateUSER_ID($USER_ID){
			$gettest=$this->db->query('SELECT * from studio_rentals where  USER_ID="'.$USER_ID.'" ');
			$results = $gettest->num_rows();
			return $results;	
		}
        public function updateStudiorentalProfileExecute($data,$USER_ID){
			$cond=array('USER_ID'=> $USER_ID);
		    $res = $this->db->set('PROFILE_ID', $data)->where($cond)->update('merchant_user_profile_mapping');
			return $res;
		}
        public function updateStudiorentalProfileMappingExecute($data,$USER_ID){
            
			$cond=array('USER_ID'=> $USER_ID);
			$res =$this->db->set('PROFILE_ID', $data)->where($cond)->update('merchant_profile_mapping');
			return $res;
		}
		public function getValidateRental($USER_ID){ 
			$cond=array('rentals.USER_ID'=> $USER_ID);
			$gettest= $this->db->select('map.PROFILE_ID,rentals.PROJECT_TYPE,rentals.EXPERTISE,rentals.WORK_LOCATION,rentals.ABOUT_ME,rentals.IMAGES,rentals.PAY_PER_SIFT,rentals.CLIENT,rentals.EXPERIENCE,rentals.RENT,rentals.STUDIO_SIZE,rentals.INVENTRY_TYPE')
				->from('studio_rentals as rentals')
				->join('merchant_user_profile_mapping as map','map.USER_ID=rentals.USER_ID','INNER')
				->where($cond)
				->get()
				->row_array();
				return $gettest;
		}
	    public function likeQueryLocation($table,$selectedColumn,$searchParam){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('ID,postoffice,city,state,'.$selectedColumn)->from($table)->where($cond)->like($selectedColumn,$searchLike)->group_by($selectedColumn)->get()->result_array();
            
            return $que;
        }
		public function likeQueryExecute($table,$selectedColumn,$searchParam){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)->where($cond)->like($selectedColumn,$searchLike)->group_by($selectedColumn)->get()->result_array();
            return $que;
        }
        public function likeQueryProfile($table,$selectedColumn,$searchParam,$FORM_TYPE){
			$cond="FORM_TYPE ='".$FORM_TYPE."' or FORM_TYPE = 'both' ";
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('PROFILE_ID,'.$selectedColumn)->from($table)->where($cond)
			->like($selectedColumn,$searchLike)->group_by('PROFILE_ID')->get()->result_array();
            return $que;
        }
		// public function likeQueryExecute($table,$selectedColumn,$searchParam,$FORM_TYPE){
		// 	$cond="FORM_TYPE ='".$FORM_TYPE."' or FORM_TYPE = 'both' ";
        //     $searchLike.='';
        //     $searchLike.=$searchParam;
        //     $que=$this->db->select('PROFILE_ID,'.$selectedColumn)->from($table)->where($cond)->like($selectedColumn,$searchLike)->group_by($selectedColumn)->get()->result_array();
        //     return $que;
        // }
		public function likeQueryExecuteMore($table,$selectedColumn,$searchParam,$profile){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y','PROFILE_ID'=>$profile);
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)->where($cond)->like($selectedColumn,$searchLike)->group_by($selectedColumn)->get()->result_array();
            return $que;
        }
        public function saveDataToTable($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}
		public function validData1($selectedItems,$table,$columnName,$data){
			$query=$this->db->select($selectedItems)->from($table)->where($columnName, $data)->get()->row_array();
			return $query[$selectedItems];
		}
		public function getIDByIfValueExist($table,$columnName,$data){
			$query=$this->db->select('ID')->from($table)->where($columnName, $data)->get();
			if($query->num_rows() > 0){
				$query_data=$this->db->select('ID')->from($table)->where($columnName, $data)->get()->row_array();
				return $query_data['ID'];
			}
		}
		public function getIDByIfValueInsert($table,$columnName,$data,$PROFILE_ID){
			$keywithvalue = array(
				$columnName => $data,
				"PROFILE_ID"=>$PROFILE_ID
			);
			$this->db->insert($table,$keywithvalue);
			return $this->db->insert_id();
		}
		public function getIDByIfValueInsertExpertise($table,$columnName,$data){
			$keywithvalue = array(
				$columnName => $data
			);
			$this->db->insert($table,$keywithvalue);
			return $this->db->insert_id();
		}
		function getProfileNameByID($PROFILE_ID){
			$cond=array('PROFILE_ID'=> $PROFILE_ID);
			$gettest= $this->db->select('PROFILE_NAME')
				->from('studio_rentals_profile')
				->where($cond)
				->get()
				->row_array();
				return $gettest['PROFILE_NAME'];
		}
		function getFormByID($PROFILE_ID){
			$cond=array('PROFILE_ID'=> $PROFILE_ID);
			$gettest= $this->db->select('FORM_TEMPLATES')
				->from('studio_rentals_profile')
				->where($cond)
				->get()
				->row_array();
				return $gettest['FORM_TEMPLATES'];
		}
		public function ProjectExistOrNot($PROJECT_TYPE,$PROFILE_ID){
			$cond="PROJECT_NAME ='".$PROJECT_TYPE."' and PROFILE_ID = '".$PROFILE_ID."' ";
            $this->db->select('*')
                ->from('project_type_studio_rentals')
                ->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }	
		}
		public function ExpertiseExistOrNot($EXPERTISE){
			$cond=array('EXPERTISE'=> $EXPERTISE);
            $this->db->select('*')
                ->from('expertise')
                ->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }	
		}
		public function ClientExistOrNot($CLIENT){
			$cond=array('CLIENT'=> $CLIENT);
            $this->db->select('*')
                ->from('studio_rentals_client')
                ->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }	
		}
		public function InventryExistOrNot($INVENTRY){
			$cond=array('INVENTRY_NAME'=> $INVENTRY);
            $this->db->select('*')
                ->from('inventry_type')
                ->where($cond);
			$query = $this->db->get();
            if($query->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }	
		}
		public function getSelectedColumn($table,$selectedColumn){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)-> where($cond)->get()->result_array();
            return $que;
        }
         public function getSelectedColumnWithCondition($table,$selectedColumn,$condition){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)->where($cond)->where($condition)->get()->result_array();
            return $que;
        }
// 		function getCardDetailList($searchParam){
//             $cond=array('ACTIVE_FLAG' => 'Y','DELETE_FLAG' => 'N');
//             if($searchParam!=""){
//                 $this->db->select('ID ,STUDIO_SPACE_NAME,IMAGES_VIDEOS,DIMENSIONS,RATE,STUDIO_SPACE_LOCATION')
//                 ->from('studio_space')
//                 ->where($cond)->group_start()->like('STUDIO_SPACE_NAME',$searchParam)->or_like('PINCODE',$searchParam)->or_like('STUDIO_SPACE_LOCATION',$searchParam)->group_end();
//                 $query = $this->db->get();
//             }
//             else{
//                 $this->db->select('ID ,STUDIO_SPACE_NAME,IMAGES_VIDEOS,DIMENSIONS,RATE,STUDIO_SPACE_LOCATION')
//                 ->from('studio_space')
//                 ->where($cond);
//                 $query = $this->db->get();
//             }
//             if($query->num_rows() > 0){
//                 return $query->result_array();
//             }else{
//                 return 0;
//             }
//         }
        public function getAllNameValue($selectedItems,$table,$data){
            if (!empty($data)) {
				$con = array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
                $selectedItems='GROUP_CONCAT('.$selectedItems.')';
                $query_data=$this->db->select($selectedItems)->from($table)->where($con)->where_in('ID', $data, false)->get()->row_array();   
            }
			return $query_data[$selectedItems]??"";
		}
		public function getCityStateByPincode($selectedItems,$table,$data){
            if (!empty($data)) {
				$con = array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
                $query_data=$this->db->select($selectedItems)->from($table)->where($con)->where_in('pincode', $data, false)->get()->row_array();   
            }
			return $query_data[$selectedItems]??"";
        }
        function getStudioSpaceDetailList($id){
            $cond=array('studio_space.ACTIVE_FLAG' => 'Y','studio_space.DELETE_FLAG' => 'N','studio_space.ID'=>$id);
            $this->db->select('studio_space.ID,studio_space.STUDIO_SPACE_NAME,studio_space.STUDIO_SPACE_LOCATION,studio_space.DETAILS,Studio_Space_type.TYPE_NAME as STUDIO_OR_SPACE_NAME,studio_space.DIMENSIONS,studio_space.PARKING_DETAILS,studio_space.RATE,studio_space.DEPOSIT,studio_space.RULES_BY_THE_HOST,studio_space.CLEANING,studio_space.PROPS,studio_space.EQUIPMENT,studio_space.OTHERS,studio_space.IMAGES_VIDEOS,studio_space.AMENITIES_IDS,studio_space.FEATURES_IDS,studio_space.AVALIABLE_DAYS_IDS,Parking.TYPE_NAME as PARKING,SDevices.TYPE_NAME as SURVEILANCE_DEVICES,StartTime.TIMING_NAME as START_TIME,EndTime.TIMING_NAME as END_TIME,Assistance.ASSISTANCE_NAME,studio_space.TYPE_IDS,communication.E_Mail,communication.Mobile_No,applicant_recruiter.First_Name,applicant_recruiter.Last_Name,studio_rentals.PROJECT_TYPE,studio_rentals.CLIENT,studio_rentals.EXPERTISE,studio_rentals.EXPERIENCE,,studio_rentals.ABOUT_ME,studio_rentals.WORK_LOCATION')
            ->from('studio_space')
            ->where($cond)
            ->join('studio_form_yes_no as Parking','Parking.ID=studio_space.PARKING_ID','INNER')
            ->join('studio_form_yes_no as SDevices','SDevices.ID=studio_space.SURVEILANCE_DEVICES_ID','INNER')
            ->join('studio_form_time as StartTime','StartTime.ID=studio_space.AVAILABLE_START_TIME','INNER')
            ->join('studio_form_time as EndTime','EndTime.ID=studio_space.AVAILABLE_END_TIME','INNER')
            ->join('studio_form_assistance as Assistance','Assistance.ID=studio_space.ASSISTANCE_ID')
             ->join('studio_space_form_type as Studio_Space_type','Studio_Space_type.ID=studio_space.STUDIO_OR_SPACE_ID')
             ->join('communication','communication.USER_ID=studio_space.USER_ID')
             ->join('applicant_recruiter','applicant_recruiter.USER_ID=studio_space.USER_ID')
             ->join('studio_rentals','studio_rentals.USER_ID=studio_space.USER_ID')
            ->group_by('ID');
            $query = $this->db->get();
            return $query->row_array();
        }
        public function likeQueryExecuteUserId($table,$selectedColumn,$userid,$searchParam){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select($selectedColumn)->from($table)
            ->where($cond)->where('	USER_ID',$userid)->like($selectedColumn,$searchLike)->group_by($selectedColumn)->get()->result_array();
            return $que;
        }
        public function likeQueryExecuteUserIdExact($table,$selectedColumn,$userid,$searchParam,$likeCol,$tJ1,$tJ2,$tJ3,$tJ1Col,$tJ2Col,$tJ3Col){
			$cond=array($table.'.DELETE_FLAG'=>'N',$table.'.ACTIVE_FLAG'=>'Y');
            $que=$this->db->select($selectedColumn)->from($table)
            ->join($tJ1,$tJ1.'.'.'ID='.$table.'.'.$tJ1Col,'left')
            ->join($tJ2,$tJ2.'.'.'ID='.$table.'.'.$tJ2Col,'left')
            ->join($tJ3,$tJ3.'.'.'ID='.$table.'.'.$tJ3Col,'left')
            ->where($cond)->where('USER_ID',$userid)->like($likeCol,$searchParam)->group_by($table.'.'.'ID')->get()->result_array();
            return $que;
        }
        public function checkDuplicateValueTwoParam($t1,$desireCond){
            $cond=array($t1.'.DELETE_FLAG'=>'N',$t1.'.ACTIVE_FLAG'=>'Y');
            $result=$this->db->select('ID')->from($t1)
            ->where($cond)->where($desireCond)->group_by('ID')->get()->row_array();
			return $result['ID'];	
		}
		
		public function UpdateTableExecute($t1,$data,$ID){
			$cond=array('ID' => $ID);
			$this->db->where($cond)->update($t1,$data);
			return $this->db->affected_rows();
		}
		public function getCardDetailList($searchParam,$StudioOrSpaceId,$TypeIds,$AmenitiesIds,$byBudgetMin,$byBudgetMax){
		   
	    $sql = "SELECT `ID`, `STUDIO_SPACE_NAME`, `IMAGES_VIDEOS`,`DIMENSIONS`,`RATE`, `STUDIO_SPACE_LOCATION` FROM `studio_space` WHERE `ACTIVE_FLAG` = 'Y' AND `DELETE_FLAG` = 'N'";
	    $sql.= $StudioOrSpaceId!=""?"AND (`STUDIO_OR_SPACE_ID`=$StudioOrSpaceId)":"";
	    $sql.= $searchParam!=""?"AND (`STUDIO_SPACE_NAME` LIKE '%".$searchParam."%' ESCAPE '!' OR `PINCODE` LIKE '%".$searchParam."%' ESCAPE '!'OR `STUDIO_SPACE_LOCATION` LIKE '%".$searchParam."%' ESCAPE '!')":"";
	    $sql.= $TypeIds!=""? "AND `TYPE_IDS` REGEXP \"(^|,)($TypeIds)(,|$)\"":"";
	    $sql.= $AmenitiesIds!=""? "AND `AMENITIES_IDS` REGEXP \"(^|,)($AmenitiesIds)(,|$)\"":"";
	    $sql.= $byBudgetMin!=""? "AND RATE >=$byBudgetMin":"";
	    $sql.= $byBudgetMax!=""?  " AND RATE <=$byBudgetMax":"";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getArtistProfile($FORM_TYPE){
            $sql = "
            SELECT `PROFILE_ID`,`PROFILE_NAME` FROM studio_rentals_profile
            WHERE `FORM_TYPE` = '$FORM_TYPE' OR `FORM_TYPE` = 'both' AND `PROFILE_TYPE` = 'Artists'
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function getUserIdByName($search){
        	$sql = "
            SELECT `USER_ID` FROM applicant_recruiter
            WHERE `First_Name` LIKE '%$search%' or `Last_Name` LIKE '%$search%'
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function getProfileIdByName($search){
        	$sql = "
            SELECT `PROFILE_ID` FROM studio_rentals_profile
            WHERE `PROFILE_NAME` LIKE '%$search%'
        ";
        $query = $this->db->query($sql)->row_array();
        return $query['PROFILE_ID'];
    }
    public function getCityName(){
        $sql = "
           SELECT `studio_rentals`.`ID`,  
            `states_city`.`city` FROM studio_rentals
           RIGHT JOIN `states_city_country` as `states_city` ON `states_city`.`pincode` = `studio_rentals`.`WORK_LOCATION`";
           $query = $this->db->query($sql);
        return $query->result_array();
             
    }
    
	 public function filterArtist($search,$username,$profileid,$allProfilename,$PROFILE,$SORT_BY){
	     //print_r($allProfile);die;
	     $allProfile='';
	     foreach($allProfilename as $data1){
	        $allProfile.=$data1['PROFILE_ID'].",";
	    }
	    $get1=rtrim($allProfile,',');
	    //print_r($get1);die;
	    $allname='';
	    foreach($username as $data){
	        $allname.=$data['USER_ID'].",";
	    }
	    $get=rtrim($allname,',');
	    $cond='';
	    if($SORT_BY =="experience" && $PROFILE!=''){
	        $sql = "
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`, 
             `studio_rentals`.`PAY_PER_SIFT`, `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
             LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
           LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
             WHERE `studio_rentals`.`PROFILE_ID` LIKE '%$PROFILE%' and `studio_rentals`.`EXPERIENCE` order by `studio_rentals`.`EXPERIENCE` asc";
	    }elseif($SORT_BY =="experience"){
	         $sql = "
           SELECT `studio_rentals`.`ID`,  `studio_rentals`.`IMAGES`, 
         `studio_rentals`.`PAY_PER_SIFT`, ``pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
             LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
             LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
        WHERE `studio_rentals`.`EXPERIENCE` order by `studio_rentals`.`EXPERIENCE` asc";
	    }elseif($SORT_BY =="price" && $PROFILE!=''){
	         $sql = "
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`, 
         `studio_rentals`.`PAY_PER_SIFT` , `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
             LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
             LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
        WHERE `studio_rentals`.`PROFILE_ID` LIKE '%$PROFILE%' and `studio_rentals`.`PAY_PER_SIFT` order by `studio_rentals`.`PAY_PER_SIFT` asc";
	    }elseif($SORT_BY =="price"){
	         $sql = "
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`, 
         `studio_rentals`.`PAY_PER_SIFT` , `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
             LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
             LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
        WHERE `studio_rentals`.`PAY_PER_SIFT` order by `studio_rentals`.`PAY_PER_SIFT` asc";
	    }elseif($search == '' && $PROFILE ==''){
	        $sql = "
             SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`,   `studio_rentals`.`PAY_PER_SIFT` , `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
             LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
             LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
            WHERE `studio_rentals`.`PROFILE_ID` IN ($get1) ";  
	     }elseif($PROFILE!=''){
	         $sql = "
            SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`,   `studio_rentals`.`PAY_PER_SIFT`, `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
             LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
             LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
            WHERE `studio_rentals`.`PROFILE_ID` LIKE '%$PROFILE%'  ";
	     }else{
             if($allname!='' && $allProfile!=''){
	             $sql = "
                 SELECT `studio_rentals`.`ID`,  `studio_rentals`.`IMAGES`,  `studio_rentals`.`PAY_PER_SIFT` , `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
                LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
                LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
                WHERE `studio_rentals`.`PROFILE_ID` LIKE '%$search%' OR `WORK_LOCATION` LIKE '%$search%' OR `studio_rentals`.`USER_ID` IN($get) ";
    	     }elseif($profileid!='')
    	     {
        	    $sql = "
                SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`,  `studio_rentals`.`PAY_PER_SIFT` , `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
                LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
                LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
                WHERE `studio_rentals`.`PROFILE_ID`= $profileid OR `WORK_LOCATION` LIKE '%$search%'  ";
    	         
    	     }elseif($search!=''){
    	        $sql = "
                SELECT `studio_rentals`.`ID`, `studio_rentals`.`IMAGES`,  `studio_rentals`.`PAY_PER_SIFT` , `pro`.`PROFILE_NAME`, `asp`.`First_Name`, `asp`.`Last_Name` FROM studio_rentals
                    LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
                    LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
                    WHERE `WORK_LOCATION` LIKE '%$search%'  ";
    	     }
	     }
        $query = $this->db->query($sql);
        return $query->result_array();
        }
    	public function getExistingProjectDetail($t,$userId,$projectName,$selectedColumn,$t2,$t3,$t4){
	        $cond=array($t.'.DELETE_FLAG'=>'N',$t.'.ACTIVE_FLAG'=>'Y');
            $que=$this->db->select($selectedColumn)->from($t)
            ->where($cond)->where($t.'.USER_ID',$userId)->where($t.'.PROJECT_NAME',$projectName)
            ->join($t2,$t2.'.'.'ID='.$t.'.'.'PROJECT_TYPE','left')
            ->join($t3,$t3.'.'.'ID='.$t.'.'.'START_TIME','left')
            ->join($t4,$t4.'.'.'ID='.$t.'.'.'END_TIME','left')
            ->get()->result_array();
            return $que;
	}
	public function getSpaceNameList($table,$selectedColumn,$userid,$searchParam){
			$cond=array('DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('ID,STUDIO_SPACE_NAME,STUDIO_SPACE_LOCATION')->from($table)
            ->where($cond)->where('	USER_ID',$userid)->like($selectedColumn,$searchLike)->group_by($selectedColumn)->get()->result_array();
            return $que;
        }
    public function getCategoryEquipmentList($table,$selectedColumn,$searchParam){
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)->like($selectedColumn,$searchLike)->order_by("ID", "asc")->group_by($selectedColumn)->get()->result_array();
            return $que;
    }
    public function getCategoryEquipmentTypeList($table,$selectedColumn,$searchParam){
            $searchLike.='';
            $searchLike.=$searchParam;
            $que=$this->db->select('ID,'.$selectedColumn)->from($table)->where('	EQUIP_CATEGORY_ID',$searchParam)->order_by("ID", "asc")->group_by($selectedColumn)->get()->result_array();
            return $que;
    }
    function allCategoryEquipmentList(){
		$gettest= $this->db->select('ID,EQUIP_CATEGORY_NAME')
			->from('studio_equip_category')
			->get()
			->result_array();
			return $gettest;
	}
	function allCategoryPropsList(){
		$gettest= $this->db->select('ID,PROP_CATEGORY_NAME')
			->from('studio_prop_category')
			->get()
			->result_array();
			return $gettest;
	}
	 public function getEqupBrandList(){
	     $sql = "SELECT ID,COUNT(PRODUCT_NAME), BRAND
                FROM studio_inventory_equipments
                GROUP BY BRAND
                HAVING COUNT(PRODUCT_NAME)
                ORDER BY COUNT(PRODUCT_NAME) DESC
                LIMIT 4";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	 public function getWorkLocationByUSER_ID($USER_ID){
	     $sql = "SELECT rentals.WORK_LOCATION
                FROM studio_rentals as rentals
                where USER_ID = '$USER_ID'";
	    $query = $this->db->query($sql);
	    return $query->row_array();
	 }
	 public function getCity($WORK_LOCATION){
	     $sql = "SELECT city FROM `states_city_country` 
	     WHERE pincode = $WORK_LOCATION"  ;
	    $query = $this->db->query($sql);
	    return $query->row_array();
	 }
	  public function getEqupAreaList($city){
	     
	      $sql = "SELECT invent.USER_ID,invent.PINCODE,states.postoffice FROM `states_city_country` as `states`
	     INNER JOIN `studio_inventory_equipments` as `invent` ON `invent`.`PINCODE` = `states`.`pincode`  WHERE states.city ='$city'
	     GROUP BY invent.PINCODE"  ;
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	  public function getEqupSellerList(){
	     $sql = "SELECT invent.USER_ID,asp.First_Name,asp.Last_Name,COUNT(invent.USER_ID)
                FROM studio_inventory_equipments as invent
                LEFT JOIN `applicant_recruiter` as `asp` ON `invent`.`USER_ID` = `asp`.`USER_ID`
                GROUP BY invent.USER_ID
                HAVING COUNT(invent.USER_ID)
                ORDER BY COUNT(invent.USER_ID) 
                LIMIT 4";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	 public function getEqupSellerListAlphaOrder1(){
	     $sql = "SELECT asp.First_Name FROM applicant_recruiter as asp 
	     where asp.First_Name REGEXP '^[A-Za-z]+$' 
	     ORDER BY asp.First_Name ASC
	     ";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	 public function getEqupSellerListAlphaOrder(){
	     $sql = "SELECT invent.USER_ID,`asp`.`First_Name`,asp.Last_Name FROM `studio_inventory_equipments` as `invent`
			LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `invent`.`USER_ID`
            ORDER BY asp.First_Name,asp.Last_Name ASC
            LIMIT 4
	     ";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	  public function getEqupSpaceSellerList(){
	     $sql = "SELECT invent.USER_ID,asp.First_Name,asp.Last_Name
                FROM studio_inventory_equipments as invent
                INNER JOIN `studio_space` as `space` ON `space`.`USER_ID` = `invent`.`USER_ID`
                LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `invent`.`USER_ID`
                GROUP BY invent.USER_ID
                HAVING COUNT(invent.USER_ID)
                ORDER BY COUNT(invent.USER_ID) DESC
                 LIMIT 4";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	 function getArtistDetailList($id){
            $cond=array('studio_rentals.ACTIVE_FLAG' => 'Y','studio_rentals.DELETE_FLAG' => 'N','studio_rentals.ID'=>$id);
            $this->db->select('studio_rentals.ID,studio_rentals.PROJECT_TYPE,studio_rentals.EXPERTISE,studio_rentals.WORK_LOCATION,studio_rentals.ABOUT_ME,studio_rentals.IMAGES,studio_rentals.PAY_PER_SIFT,studio_rentals.CLIENT,studio_rentals.EXPERIENCE,applicant_recruiter.First_Name,applicant_recruiter.Last_Name')
            ->from('studio_rentals')
            ->where($cond)
            ->join('applicant_recruiter','applicant_recruiter.USER_ID=studio_rentals.USER_ID')
            ->group_by('ID');
            $query = $this->db->get();
            return $query->row_array();
    }
	public function filterEqupInventory($TYPE_ID,$BRAND,$MINPRICE,$MAXPRICE,$USER_ID,$PINCODE){
	    $sql = "SELECT `ID`, `PRODUCT_NAME`,`1_DAY_COST`, `IMAGES_VIDEOS` FROM `studio_inventory_equipments` WHERE `ACTIVE_FLAG` = 'Y' AND `DELETE_FLAG` = 'N' ";
	    if($TYPE_ID!=''){
	        $sql.= $TYPE_ID!=""?"AND (`TYPE_ID` LIKE '%".$TYPE_ID."%' ESCAPE '!')":" ";
	    }
	    if($BRAND!=''){
	        $sql.= $BRAND!=""?" AND (`BRAND`= '$BRAND')":" ";
	    }
	    if($MINPRICE!='' && $MAXPRICE!=''){
	        $sql.= $MINPRICE!=""? "AND 1_DAY_COST >=$MINPRICE":"";
	        $sql.= $MAXPRICE!=""?  " AND 1_DAY_COST <=$MAXPRICE":"";
	    }
	    if($USER_ID!=''){
	        $sql.= $USER_ID!=""?" AND (`USER_ID`= '$USER_ID')":" ";
	    }
	    if($PINCODE!=''){
	        $sql.= $PINCODE!=""?" AND (`PINCODE`= '$PINCODE')":" ";
	    }
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	public function getPropAreaList($city){
	     
	      $sql = "SELECT props.USER_ID,props.PINCODE,states.postoffice FROM `states_city_country` as `states`
	     INNER JOIN `studio_inventory_props` as `props` ON `props`.`PINCODE` = `states`.`pincode`  WHERE states.city ='$city'
	     GROUP BY props.PINCODE"  ;
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	public function getPropSellerList(){
	     $sql = "SELECT props.USER_ID,asp.First_Name,asp.Last_Name,COUNT(props.USER_ID)
                FROM studio_inventory_props as props
                LEFT JOIN `applicant_recruiter` as `asp` ON `props`.`USER_ID` = `asp`.`USER_ID`
                GROUP BY props.USER_ID
                HAVING COUNT(props.USER_ID)
                ORDER BY COUNT(props.USER_ID) 
                LIMIT 4";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	 public function getPropSellerListAlphaOrder(){
	     $sql = "SELECT props.USER_ID,`asp`.`First_Name`,asp.Last_Name FROM `studio_inventory_props` as `props`
			LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `props`.`USER_ID`
            ORDER BY asp.First_Name,asp.Last_Name ASC
            LIMIT 4
	     ";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	  public function getPropSpaceSellerList(){
	     $sql = "SELECT props.USER_ID,asp.First_Name,asp.Last_Name
                FROM studio_inventory_props as props
                INNER JOIN `studio_space` as `space` ON `space`.`USER_ID` = `props`.`USER_ID`
                LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `props`.`USER_ID`
                GROUP BY props.USER_ID
                HAVING COUNT(props.USER_ID)
                ORDER BY COUNT(props.USER_ID) DESC
                 LIMIT 4";
	    $query = $this->db->query($sql);
	    return $query->result_array();
	 }
	public function filterPropInventory($TYPE_ID,$BRAND,$MINPRICE,$MAXPRICE,$USER_ID,$PINCODE){
	    $sql = "SELECT `ID`, `PRODUCT_NAME`,`1_DAY_COST`, `IMAGES_VIDEOS` FROM `studio_inventory_props` WHERE `ACTIVE_FLAG` = 'Y' AND `DELETE_FLAG` = 'N'";
	    if($MINPRICE!='' && $MAXPRICE!=''){
	        $sql.= $MINPRICE!=""? "AND 1_DAY_COST >=$MINPRICE":"";
	        $sql.= $MAXPRICE!=""?  " AND 1_DAY_COST <=$MAXPRICE":"";
	    }
	    if($USER_ID!=''){
	        $sql.= $USER_ID!=""?" AND (`USER_ID`= '$USER_ID')":" ";
	    }
	    if($PINCODE!=''){
	        $sql.= $PINCODE!=""?" AND (`PINCODE`= '$PINCODE')":" ";
	    }
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
        
}