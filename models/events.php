<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

class eventsmodel extends globalmodel 
{	
	function getuserbykey($email, $key)
	{
		$sql = "SELECT id, email_verified, email, firstname from event_user where email=? and email_verification_key=? and delete_flag='N' ";   
		$array = array($email, $key); 
		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function checkforunique($table,$value, $name)
	{
		$sql = "SELECT id, email,password  from $table where $name=? and delete_flag='N'";   	
		$array = array($value);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
	
	function checkforuniqueuser($table,$value, $name)
	{
		$sql = "SELECT id  from $table where $name=?";   	
		$array = array($value);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getlogindata($email, $password)
	{
		
		$sql = "SELECT e.id, e.email, e.email_verified, e.firstname, e.lastname, e.company_name
				from event_user e		
				where e.email=? and e.password=? and e.delete_flag='N' group by e.id";  
		$array = array($email, $password);
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
	
	function getevent($id)
	{
		$sql = "SELECT e.*,eu.firstname,eu.lastname,eu.email,et.name as event_type_name
				from events	e,event_user eu,event_type et
				where e.id=? AND e.delete_flag='N' AND e.event_user_id = eu.id AND e.event_type_id=et.id AND et.active = 'Y'";  
		$array = array($id);
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getpublishevent($id)
	{
		$sql = "SELECT e.*,eu.firstname,eu.lastname,eu.email
				from events_published	e,event_user eu
				where e.id=? AND e.delete_flag='N' AND e.event_user_id = eu.id";  
		$array = array($id);
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getalleventdata($id) 
	{
		$sql = "SELECT * from events where delete_flag='N' AND event_user_id =? order by id DESC";   
		$array = array($id);		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getadmindata() 
	{
		$sql = "SELECT * from admin where delete_flag='N'";   	
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getpublishedeventdata()
	{
		$sql = "SELECT ep.*,et.name as event_type_name from events_published ep
			INNER JOIN events e ON e.id=ep.id			
			INNER JOIN event_type et ON et.id=ep.event_type_id			
			where ep.delete_flag='N' AND e.delete_flag='N' AND ep.active_flag='Y' AND ep.approve='Y' AND et.active='Y' order by ep.id desc";   
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	  
	function geteventcategory()
	{
		$sql = "SELECT * from event_category where active='Y'";    	
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function geteventtype()
	{
		$sql = "SELECT * from event_type where active='Y'";    	
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function getbookedeventuserlist($id) 
	{
		$sql = "SELECT be.* from buy_events be where be.event_id = $id order by be.id DESC";   		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getEventUserData($id) 
	{
		$sql = "SELECT * from event_user where id =? AND delete_flag = 'N' AND admin_approval = 'Y'";   
		$array = array($id);		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function getSettings($id)
	{
		$sql = "SELECT eus.*, eu.email, eu.contact_no from events_user_setting eus
				INNER JOIN event_user eu ON eu.id =eus.user_id
				where eus.user_id=? ";   	
		$array = array($id);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function getall($userid, $type)
	{ 
		
		$sql = " select n.* from events_notification n
				Inner JOIN event_user u ON u.id= n.user_id 
				where u.delete_flag='N' AND u.id=$userid " ;
		if($type=="unread"){ //view/edit
			$sql .= "and n.read_status = 'N' ";	 
		}
			$sql .= "  order by n.id desc";	
		// print_R($sql);
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
		
	}

	function getallnotifications($userid)
	{
		
		$sql = " select n.* from events_notification n
				Inner JOIN event_user u ON u.id= n.user_id 
				where n.user_id = $userid AND u.delete_flag='N' order by n.id desc" ;
		
		// print_R($sql);  
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
		
	}
	
}
	 