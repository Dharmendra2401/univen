<?php
    class StudiorentalArtist_model extends CI_Model {
        public function __construct(){
        	$this->load->database();
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
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`,
            `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
             WHERE `PROFILE_ID` LIKE '%$PROFILE%' and `studio_rentals`.`EXPERIENCE` order by `studio_rentals`.`EXPERIENCE` asc";
	    }elseif($SORT_BY =="experience"){
	         $sql = "
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`,
        `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
        WHERE `studio_rentals`.`EXPERIENCE` order by `studio_rentals`.`EXPERIENCE` asc";
	    }elseif($SORT_BY =="price" && $PROFILE!=''){
	         $sql = "
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`,
        `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
        WHERE `PROFILE_ID` LIKE '%$PROFILE%' and `studio_rentals`.`PAY_PER_SIFT` order by `studio_rentals`.`PAY_PER_SIFT` asc";
	    }elseif($SORT_BY =="price"){
	         $sql = "
           SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`,
        `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
        WHERE `studio_rentals`.`PAY_PER_SIFT` order by `studio_rentals`.`PAY_PER_SIFT` asc";
	    }elseif($search == '' && $PROFILE ==''){
	        $sql = "
             SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`, `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
             LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
            WHERE `studio_rentals`.`PROFILE_ID` IN ($get1) ";  
	     }elseif($PROFILE!=''){
	         $sql = "
            SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`, `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
            WHERE `PROFILE_ID` LIKE '%$PROFILE%'  ";
	     }else{
             if($allname!='' && $allProfile!=''){
	             $sql = "
                 SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`, `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
                LEFT JOIN `applicant_recruiter` as `asp` ON `asp`.`USER_ID` = `studio_rentals`.`USER_ID`
                WHERE `PROFILE_ID` LIKE '%$search%' OR `WORK_LOCATION` LIKE '%$search%' OR `studio_rentals`.`USER_ID` IN($get) ";
    	         
    	     }elseif($profileid!='')
    	     {
        	    $sql = "
                SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`, `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
                LEFT JOIN `studio_rentals_profile` as `pro` ON `pro`.`PROFILE_ID` = `studio_rentals`.`PROFILE_ID`
                WHERE `studio_rentals`.`PROFILE_ID`= $profileid OR `WORK_LOCATION` LIKE '%$search%'  ";
    	         
    	     }elseif($search!=''){
    	        $sql = "
                SELECT `studio_rentals`.`ID`, `studio_rentals`.`PROFILE_ID`, `studio_rentals`.`IMAGES`, `studio_rentals`.`USER_ID`, `studio_rentals`.`WORK_LOCATION`, `studio_rentals`.`PAY_PER_SIFT` FROM studio_rentals
                WHERE `WORK_LOCATION` LIKE '%$search%'  ";
    	     }
	     }
        $query = $this->db->query($sql);
        return $query->result_array();
    }
        
}