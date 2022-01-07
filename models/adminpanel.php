<?php

class adminpanelmodel extends globalmodel 
{
	function getuserslist()
	{
		$sql = "select id, institute_name,institute_type, email,email_verified,date_created 
		from user 	where delete_flag='N' order by id desc";   
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
	function adduser($data)
	{
		$add=$this->pdodatabase->insert("user", $data,true); 
	
		if($add==true || $add>0)   return $add; 
		else  return false;
	}
	
	function updatecomments($data,$id)
	{
		$where=array('id'=>$id);  
		$update=$this->pdodatabase->update("comments", $data,$where); 
	
		if($update)   return $update; 
		else  return false;
	}
	
	function checkcredentials($username,$pass)
	{
		$sql = "SELECT * FROM admin WHERE email =? AND password = ? AND delete_flag ='N'";
		$array= array($username, $pass);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
        return $dataArr;
	}
	
	function geteventlist($id) 
	{
		$sql = "SELECT * from events where delete_flag='N' order by id DESC";   		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getbloglist($id) 
	{
		$sql = "SELECT * from blogs where delete_flag='N' order by id DESC";   		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getbookedeventuserlist($id) 
	{
		$sql = "SELECT be.*,ep.event_title from buy_events be,events_published ep where be.event_id = $id order by be.id DESC";   		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function geteventuserslist() 
	{
		$sql = "SELECT * from event_user where delete_flag = 'N' order by id DESC";   		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getbloguserslist() 
	{
		$sql = "SELECT * from blog_user where delete_flag = 'N' order by id DESC";   		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function geteventuserdata($id) 
	{
		$sql = "SELECT * from event_user where delete_flag = 'N' AND id=? ";   	
                $array= array($id);	
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getbloguserdata($id) 
	{
		$sql = "SELECT * from blog_user where delete_flag = 'N' AND id=? ";   	
                $array= array($id);	
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getevent($id)
	{
		$sql = "SELECT * from events where id=$id AND delete_flag='N'";  
		//$array = array($id);
		
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
}