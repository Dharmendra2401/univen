<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

class usersmodel extends globalmodel 
{
	function getuserslist()
	{
		$sql = "select id, CONCAT(u.firstname, ' ', u.lastname) as name, u.email, u.contact_no, u.email_verified, u.mobile_verified, u.date_created
		from user u	where delete_flag='N' order by id desc";   
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getModellingdetails($id)
	{
		$sql = "select m.*, GROUP_CONCAT(mf.name SEPARATOR ', ') as fields
		from modelling m 
		INNER JOIN modelling_fields mf
		where  m.user_id=$id group by m.user_id";   
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function updateuser($data,$id)
	{
		$where =array("id"=>$id);
		$array = array();        
		$dataArr = $this->pdodatabase->update("user",$data,$where);
		return $dataArr; 
	}
	
	
	
	
}
	