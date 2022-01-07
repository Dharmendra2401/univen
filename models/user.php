<?php

class usermodel extends globalmodel 
{
	function getprofiles()
	{
		$sql = "Select * From profiles where delete_flag='N' order by name asc";   
		$array = array();

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getUserprofiles($id)
	{
		$sql = "Select group_concat(profile_id) as old_profiles From user_profiles where user_id=$id and delete_flag='Y' group by user_id";   
		$array = array();

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function userprofiles($id)
	{
		$sql = "Select group_concat(pr.name) as profile_names 
				From user_profiles up 
				INNER JOIN profiles pr ON pr.id =up.profile_id
				where up.user_id=$id and up.delete_flag='N' group by up.user_id";   
		$array = array();

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getlogindata($email, $password)
	{
		$sql = "SELECT u.id, u.email, u.email_verified, u.firstname, u.lastname, GROUP_CONCAT(up.profile_id) as profiles 
				from user u 
				INNER JOIN user_profiles up On (up.user_id = u.id and up.delete_flag='N')
				where u.email=? and u.password=? and u.delete_flag='N' group by u.id";   
		$array = array($email, $password);

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function checkforunique($value, $name)
	{
		$sql = "SELECT id ,password from user where $name=? and delete_flag='N'";   
		
		$array = array($value);

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function getuserbykey($email, $key)
	{
		$sql = "SELECT id, email_verified, new_email, email, email_verification_key from user where email=?  and delete_flag='N' ";   
		$array = array($email);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function adduser($data)
	{
		$add=$this->pdodatabase->insert("user", $data,true); 
	
		if($add==true || $add>0)   return $add; 
		else  return false;
	}
	function addprofile($data)
	{
		$add=$this->pdodatabase->insert("user_profiles", $data,true); 
	
		if($add==true || $add>0)   return $add; 
		else  return false;
	}
	function randomcodecheck($code)
	{
		$sql = "SELECT id FROM `user` WHERE `email_verification_key` = '".$code."' and delete_flag='N'";
		$verification_code = $this->database->querydata($sql);
        return $verification_code;  
	}
	function randomcoderesetcheck($code)
	{
		$sql = "SELECT id,email FROM `user` WHERE `reset_code` = '".$code."' and delete_flag='N'";
		$verification_code = $this->database->querydata($sql);
        return $verification_code;  
	}
	function checkforRegistration_number($registration_number)
	{
		$sql = "SELECT id, registration_number FROM user where registration_number = ? and delete_flag='N'";
		$array = array($registration_number);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
        return $dataArr;
	}
	function checkforName($unique_name)
	{
		$sql = "SELECT id, username FROM user where email = ? and delete_flag='N'";
		$array = array($unique_name);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
        return $dataArr;
	}
	function checkforuniqemail($email)
	{
		$sql = "SELECT id, email, email_verification_key FROM user where email = ? and delete_flag='N' ";
		$array = array($email);
		$dataArr = $this->pdodatabase->querydata($sql, $array);
        return $dataArr;
	}
	
	function checkforuniqcontact($contactno)
	{
		$sql = "SELECT id, `contact_no` FROM `user` WHERE `contact_no` = '".$contactno."' and delete_flag='N'";
		$dataArr = $this->database->querydata($sql);
        return $dataArr;
	}
	function updatedetails($table,$data,$id)
	{
		$where=array('id'=>$id);  
		$update=$this->pdodatabase->update($table, $data,$where); 
	
		if($update)   return $update; 
		else  return false;
	}
	function updatewhere($table,$data,$where)
	{
		$update=$this->pdodatabase->update($table, $data,$where); 
	
		if($update)   return $update; 
		else  return false;
	}
	////////////////
	function add($table, $data)
	{
		$add=$this->pdodatabase->insert($table, $data,true); 
	
		if($add==true || $add>0)   return $add; 
		else  return false;
	}
	function getdetails($id, $table)
	{
		$sql = "SELECT a.*,  u.firstname, u.lastname, u.contact_no, u.email FROM $table a 
				LEFT JOIN user u ON u.id= a.user_id
				WHERE a.`user_id` = ? ";
		$dataArr = $this->pdodatabase->querydata($sql, array($id));
        return $dataArr;
	}
	function getgeneraldetails($id, $table)
	{
		$sql = "SELECT a . * , u.firstname, u.lastname, u.contact_no, u.email
				FROM user u
				LEFT JOIN details a ON a.user_id = u.id
				WHERE u.id =? and u.delete_flag='N'";
		$dataArr = $this->pdodatabase->querydata($sql, array($id));
        return $dataArr;
	}
	function getuserdetails($id)
	{
		$sql = "SELECT u.id, u.firstname, u.lastname, u.contact_no, u.email,  u.email_verified, u.admin_approval, u.date_created , GROUP_CONCAT( p.name SEPARATOR ', ') AS profiles, GROUP_CONCAT( up.profile_id SEPARATOR ', ') AS profile_ids, ud.t_address, ud.t_pincode, ud.t_city, ud.t_state, ud.profile_pic, ud.banner_pic, ud.t_country, ud.date_of_birth , edu.highest_qualification, edu.final_year, edu.percentage, edu.university, emp.occupation, ud.date_updated
				FROM user u 
				LEFT JOIN details ud ON ud.user_id = u.id
				LEFT JOIN educational edu ON edu.user_id = u.id
				LEFT JOIN employment emp ON emp.user_id = u.id
				LEFT JOIN user_profiles up ON up.user_id= u.id AND up.delete_flag='N'
				LEFT JOIN profiles p ON (p.id = up.profile_id AND p.delete_flag='N')
				WHERE u.`id` = ? and u.delete_flag='N' GROUP BY u.id";
				
		$dataArr = $this->pdodatabase->querydata($sql, array($id));
        return $dataArr;
	}
	function getdata($table,$id)
	{
		$sql = "SELECT m.*	FROM $table m 	WHERE m.`user_id` = ? ";
				
		$dataArr = $this->pdodatabase->querydata($sql, array($id));
        return $dataArr;
	}
	function getalllusers()
	{
		$sql = "SELECT id, email_verification_key FROM user	";
				
		$dataArr = $this->pdodatabase->querydata($sql, array());
        return $dataArr;
	}
	
	//used in setting----fro user
	function deleteprofiles($id)
	{
		$sql = "Delete from user_profiles WHERE `user_id` = ? ";
				
		$dataArr = $this->pdodatabase->query($sql, array($id));
        return $dataArr;
	}
	
	
	
	
	
}	

 ?>