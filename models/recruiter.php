<?php

class recruitermodel extends globalmodel 
{

	function getuserslist($id=null)
	{
		$sql="Select r.*, rc.name From recruiter  r
			INNER JOIN recruiter_category rc ON rc.id= r.category
			where r.delete_flag='N' ";
		
		if($id!=null){
			$sql .=" and r.id=$id";		
			$array = array($id);
		}
		else{
			$sql .= " order by r.id desc";   
		}
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
	function getuserbykey($email, $key)
	{
		$sql = "SELECT id, email_verified, email, firstname from recruiter where email=? and email_verification_key=? and delete_flag='N' ";   
		$array = array($email, $key);        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function otherdetails($id)
	{
		
		$sql = "select count(j.id) as jobs, count(ua.id) as applications from jobs j 
				LEFT join job_applications ua ON ua.job_id= j.id 
				where  j.delete_flag='N' AND j.recruiter_id=$id ";  
				// echo $sql;
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function lastApplicationCount($id)
	{
		$sql = "select count(ua.id) as applications from job_applications ua 
			INNER JOIN jobs j ON ua.job_id= j.id 
			where j.delete_flag='N' AND j.recruiter_id=$id AND date(ua.date_created) between 
			DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() ";   
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getRceCategory()
	{
		$sql = "SELECT * from recruiter_category where  delete_flag='N' ";   
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function updatewhere($table,$data,$where)
	{
		$update=$this->pdodatabase->update($table, $data,$where); 
	
		if($update)   return $update; 
		else  return false;
	}
	function checkforunique($value, $name)
	{
		$sql = "SELECT id, email,password  from recruiter where $name=? and delete_flag='N'";   	
		$array = array($value);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getSettings($id)
	{
		$sql = "SELECT rs.*, r.email, r.contact_no from recruiter_setting rs
				INNER JOIN recruiter r ON r.id =rs.recruiter_id
				where rs.recruiter_id=? ";   	
		$array = array($id);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getlogindata($email, $password)
	{
		$sql = "SELECT r.id, r.email, r.email_verified, r.firstname, r.lastname, r.company_name
				from recruiter r 				
				where r.email=? and r.password=? and r.delete_flag='N' group by r.id";  
		$array = array($email, $password);
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
	function getusers($limit, $filter)
	{
		$c=''; $p='';	$and=[];
		if($filter['cities']!=''){
			$c=explode(",",$filter['cities']);
			$c = implode("%' OR u.t_city like '%",$c);
			$and[]= "( u.t_city like '%".$c."%')";
		}
		if($filter['cities']!=''){
			$c=explode(",",$filter['cities']);
			$c = implode("%' OR u.p_city like '%",$c);
			$and[]= "( u.p_city like '%".$c."%')";
		}
		if($filter['profiles']!=''){
			$p=explode(",",$filter['profiles']);
			$p = implode(", u.profile_ids) OR FIND_IN_SET( ",$p);
			$and[]= "( FIND_IN_SET(".$p.", u.profile_ids) )";
		}
		$and = implode(" AND ",$and);
		if($and !='')
			$and =" AND $and";
		
		$sql = "SELECT u.firstname, u.lastname, u.id , u.profile_pic, u.profile_names
		FROM user_details u 
		WHERE 1 $and order by rand() limit $limit, ".LIST_LIMIT;  
		// echo $sql;
		// exit;
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getusersCount( $filter)
	{
		$c=''; $p='';	$and=[];
		if($filter['cities']!=''){
			$c=explode(",",$filter['cities']);
			$c = implode("%' OR u.t_city like '%",$c);
			$and[]= "( u.t_city like '%".$c."%')";
		}
		if($filter['cities']!=''){
			$c=explode(",",$filter['cities']);
			$c = implode("%' OR u.p_city like '%",$c);
			$and[]= "( u.p_city like '%".$c."%')";
		}
		if($filter['profiles']!=''){
			$p=explode(",",$filter['profiles']);
			$p = implode(", profile_ids) OR FIND_IN_SET( ",$p);
			$and[]= "( FIND_IN_SET(".$p.", u.profile_ids) )";
		}
		$and = implode(" AND ",$and);
		if($and !='')
			$and =" AND $and";
		
		$sql = "SELECT count(u.id) as count	FROM user_details u WHERE 1 $and ";
		
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getuserlocations()
	{
		$sql = "Select GROUP_CONCAT(IF(d.t_city='','Other',d.t_city)) as t_city, GROUP_CONCAT(IF(d.p_city='', 'Unkown', d.p_city)) as p_city FROM details d 
				INNER JOIN user u ON u.id= d.user_id
				WHERE u.delete_flag='N' group by u.delete_flag";  
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
}
	
	