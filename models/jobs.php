<?php

class jobsmodel extends globalmodel 
{
	//admin and recruiter list
	function getjobs($user=null, $id=null)
	{
		$sql = "Select j.*, r.admin_approval as recruiter_approved,  r.company_name, r.email, r.firstname, r.lastname, group_concat(pr.name SEPARATOR ', ') as profile_names, r.logo, r.update_date as update1, (select count(id) from job_applications where job_id=j.id) as applied
		From jobs j 
				INNER JOIN recruiter r ON r.id =j.recruiter_id
				LEFT JOIN profiles pr ON pr.id 
				where j.delete_flag='N' and r.delete_flag='N' and FIND_IN_SET (pr.id, j.profile_ids) ";
		if($user!=null && $user!=""){ //view/edit
			$sql .= " AND r.id= ? ";
			$array = array($user);
		}
		if($id!=null){//admin view
			$sql .= " AND j.id= ? ";
			$array[]=$id;
		}
		$sql .= " group by j.id order by j.admin_approval desc , j.id desc ";
		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getjobsCount($filter)
	{
		$c=''; $p='';	$and=[];
		if($filter['cities']!=''){
			$c=explode(",",$filter['cities']);
			$c = implode("%' OR j.location like '%",$c);
			$and[]= "( j.location like '%".$c."%')";
		}
		if($filter['profiles']!=''){
			$p=explode(",",$filter['profiles']);
			$p = implode("\"%' OR j.profiles like '%\"",$p);
			$and[]= "( j.profiles like '%\"".$p."\"%')";
		}
		if($filter['jobtype']!=''){
			$p=explode(",",$filter['jobtype']);
			$p = implode("' OR j.type = '",$p);
			$and[]= "( j.type = '".$p."')";
		}
		$and = implode(" AND ",$and);
		if($and !='')
			$and =" AND $and";
		$sql = "Select COUNT(j.id) as count
			From jobs j 
			INNER JOIN recruiter r ON r.id =j.recruiter_id
			LEFT JOIN job_applications ja ON (ja.job_id=j.id and ja.user_id=23)
			where j.delete_flag='N' and r.delete_flag='N' AND j.title!='' AND j.content!=''  $and 
			";
			
				$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
		
		
	}
	function getjoblocations()
	{
		$sql = "Select GROUP_CONCAT(j.location) as locations, j.id, j.location From jobs j 
				INNER JOIN recruiter r ON r.id =j.recruiter_id
				where j.delete_flag='N' and r.delete_flag='N' AND j.title!='' AND j.content!='' group by j.delete_flag";
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	//used in--user/dashboard, jobs/for-me
	function getActiveJobs($from, $id, $filter)
	{
		$c=''; $p='';	$and=[];
		if($filter['cities']!=''){
			$c=explode(",",$filter['cities']);
			$c = implode("%' OR j.location like '%",$c);
			$and[]= "( j.location like '%".$c."%')";
		}
		if($filter['profiles']!=''){
			$p=explode(",",$filter['profiles']);
			$p = implode("\"%' OR j.profiles like '%\"",$p);
			$and[]= "( j.profiles like '%\"".$p."\"%')";
		}
		if($filter['jobtype']!=''){
			$p=explode(",",$filter['jobtype']);
			$p = implode("' OR j.type = '",$p);
			$and[]= "( j.type = '".$p."')";
		}
		$and = implode(" AND ",$and);
		if($and !='')
			$and =" AND $and";
		
		$sql = "Select j.*,r.admin_approval as recruiter_approved,  r.company_name, r.email, r.firstname, r.lastname , group_concat(pr.name SEPARATOR ', ') as profile_names, ja.job_id as user_job_id, r.logo, r.update_date as update1, r.contact_no
			From jobs j 
			INNER JOIN recruiter r ON r.id =j.recruiter_id
			LEFT JOIN profiles pr ON pr.id 
			LEFT JOIN job_applications ja ON (ja.job_id=j.id and ja.user_id=$id)
			where j.delete_flag='N' and r.delete_flag='N' AND j.title!='' AND j.content!='' and FIND_IN_SET (pr.id, j.profile_ids) $and group by j.id 
			order by j.date_created desc limit $from, ".PAGE_LIMIT;

		$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	//casting calls
	function getCastingCalls($from)
	{
		
		$sql = "Select j.*,r.admin_approval as recruiter_approved,  r.company_name, r.email, r.firstname, r.lastname , group_concat(pr.name SEPARATOR ', ') as profile_names, r.logo, r.update_date as update1
			From jobs j 
			INNER JOIN recruiter r ON r.id =j.recruiter_id
			LEFT JOIN profiles pr ON pr.id 
			where j.delete_flag='N' and r.delete_flag='N' AND j.title!='' AND j.content!='' and FIND_IN_SET (pr.id, j.profile_ids) $and group by j.id 
			order by j.date_created desc";

		$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getsinglejob($userid, $jobid)
	{
		$sql = "Select j.*,r.admin_approval as recruiter_approved,  r.company_name, r.email, r.firstname, r.lastname , group_concat(pr.name SEPARATOR ', ') as profile_names, ja.job_id as user_job_id, r.logo, r.update_date as update1, r.contact_no
			From jobs j 
			INNER JOIN recruiter r ON r.id =j.recruiter_id
			LEFT JOIN profiles pr ON pr.id 
			LEFT JOIN job_applications ja ON (ja.job_id=j.id and ja.user_id=$userid)
			where j.delete_flag='N' and r.delete_flag='N' AND j.title!='' AND j.content!='' and FIND_IN_SET (pr.id, j.profile_ids) AND j.id=$jobid group by j.id ";
		$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	///using profile ids of current job 
	function getsmilierJobs($userid, $jobid, $profiles)
	{
		$prfs=[];
		foreach($profiles as $pr){
		
			$prfs[] =' FIND_IN_SET ('.$pr.', j.profile_ids) ';
		}
		$Prfss= implode(" OR ",$prfs);
		$sql = "Select j.*,r.admin_approval as recruiter_approved,  r.company_name, r.email, r.firstname, r.lastname , group_concat(pr.name SEPARATOR ', ') as profile_names, ja.job_id as user_job_id, r.logo, r.update_date as update1
			From jobs j 
			INNER JOIN recruiter r ON r.id =j.recruiter_id
			LEFT JOIN profiles pr ON pr.id 
			LEFT JOIN job_applications ja ON (ja.job_id=j.id and ja.user_id=$userid)
			where j.delete_flag='N' and r.delete_flag='N' AND j.title!='' AND j.content!='' and FIND_IN_SET (pr.id, j.profile_ids) AND j.id!=$jobid and $Prfss group by j.id limit 5";
		$array=[];
		// print_R($sql);
		// exit;
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getprofiles($ids)
	{
		$sql = "Select GROUP_CONCAT(name separator ', ') as profiles FROM profiles where id IN(".implode(",", json_decode($ids,true)).") group by delete_flag";
		
		$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function appliedusers($recruiter, $jobid)
	{
		$sql = "Select u.id as userid, CONCAT(u.firstname, ' ', u.lastname) as user_name,  ja.*,
				(select GROUP_CONCAT( p.name SEPARATOR ', ') AS profiles 
				FROM user_profiles up 
				INNER JOIN profiles p ON (p.id = up.profile_id AND p.delete_flag='N')
				where  up.user_id= ja.user_id AND up.delete_flag='N' GROUP BY up.user_id) as profile_names	
				FROM job_applications ja
				INNER JOIN user u ON u.id =ja.user_id
				INNER join jobs j ON j.id=ja.job_id				
				where ja.job_id=$jobid and j.recruiter_id =$recruiter and j.delete_flag='N'
				";
		// print_R($sql);exit;
		$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function updatejob($id)
	{
		$sql = "UPDATE  `jobs` SET  `title` = old_title, `content` = old_content, `location` = old_location, `last_date` =  old_last_date,	`admin_approval` =  'Y', `mail_sent` =  'Y' WHERE  `id` = $id ";
		$array = array();
		$dataArr = $this->pdodatabase->query($sql,$array);
		return $dataArr; 
	}
	function getusersbycat($profiles)
	{
	/* dont delete	$sql = "SELECT  up.user_id, u.email,u.firstname, u.lastname FROM `user_profiles` up 
				INNER JOIN user u ON u.id=up.user_id 
				WHERE FIND_IN_SET(up.profile_id,?) and u.delete_flag='N' group by up.user_id ";
		$array = array($profiles); */
		$sql = "SELECT  u.id as user_id, u.email,u.firstname, u.lastname 
				FROM  user u 
				WHERE  u.delete_flag='N' ";
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function add_data($table, $data)
	{
		$add=$this->pdodatabase->insert($table, $data,true); 
	
		if($add==true || $add>0)   return $add; 
		else  return false;
	}
	function updatewhere($table,$data,$where)
	{
		$update=$this->pdodatabase->update($table, $data,$where); 
	
		if($update)   return $update; 
		else  return false;
	}

	//used in admin
	function jobappliedusers( $jobid)
	{
		$sql = "Select u.id as userid, CONCAT(u.firstname, ' ', u.lastname) as user_name,  ja.*,
				(select GROUP_CONCAT( p.name SEPARATOR ', ') AS profiles 
				FROM user_profiles up 
				INNER JOIN profiles p ON (p.id = up.profile_id AND p.delete_flag='N')
				where  up.user_id= ja.user_id AND up.delete_flag='N' GROUP BY up.user_id) as profile_names	
				FROM job_applications ja
				INNER JOIN user u ON u.id =ja.user_id
				INNER join jobs j ON j.id=ja.job_id
				
				where ja.job_id=$jobid and j.delete_flag='N'
				";
		// print_R($sql);exit;
		$array=[];
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}	
		
	
	
}