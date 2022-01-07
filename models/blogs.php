<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

class blogsmodel extends globalmodel 
{	
	function getuserbykey($email, $key)
	{
		$sql = "SELECT id, email_verified, email, firstname from blog_user where email=? and email_verification_key=? and delete_flag='N' ";   
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
				from blog_user e		
				where e.email=? and e.password=? and e.delete_flag='N' group by e.id";  
		$array = array($email, $password);
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
	
	function getevent($id)
	{
		$sql = "SELECT e.*,eu.firstname,eu.lastname,eu.email
				from events	e,event_user eu
				where e.id=? AND e.delete_flag='N' AND e.event_user_id = eu.id";  
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
		$sql = "SELECT * from blogs where delete_flag='N' AND blog_user_id =? order by id DESC";   
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
	
	function getpublishedblogdata()
	{
		$sql = "SELECT bp.*,bu.firstname,bu.lastname 
		from blogs_published as bp
		INNER JOIN blog_user as bu ON bp.blog_user_id=bu.id
		INNER JOIN blogs bg ON bg.id= bp.id
		where bp.delete_flag='N' AND bg.delete_flag='N' AND bp.approve='Y' AND bp.blog_user_id=bu.id  AND bu.delete_flag='N' order by bp.date_created DESC";   
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getpublishedsingalblogdata($id)
	{
		$sql = "SELECT bp.*,bu.firstname,bu.lastname from blogs_published as bp,blog_user as bu where bp.delete_flag='N' AND bp.approve='Y' AND bp.blog_user_id=bu.id AND bu.admin_approval = 'Y' AND bu.delete_flag='N' AND bp.id = $id";    
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	function getblogcategory()
	{
		$sql = "SELECT * from blog_category where active='Y'";    	
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
		$sql = "SELECT * from blog_user where id =? AND delete_flag = 'N' AND admin_approval = 'Y'";   
		$array = array($id);		
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function getSettings($id)
	{
		$sql = "SELECT eus.*, eu.email, eu.contact_no from blog_user_setting eus
				INNER JOIN blog_user eu ON eu.id =eus.user_id
				where eus.user_id=? ";   	
		$array = array($id);
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}

	function getall($userid, $type)
	{
		
		$sql = " select n.* from blog_notification n
				Inner JOIN blog_user u ON u.id= n.user_id 
				where u.delete_flag='N' AND u.id = $userid " ;  
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
		$sql = " select n.* from blog_notification n
				Inner JOIN blog_user u ON u.id= n.user_id 
				where n.user_id = $userid AND u.delete_flag='N' order by n.id desc" ;
		
		// print_R($sql);  
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
		
	}
	
	function getblog($id)
	{
		$sql = "SELECT e.*,eu.firstname,eu.lastname,eu.email
				from blogs	e,blog_user eu
				where e.id=? AND e.delete_flag='N' AND e.blog_user_id = eu.id";  
		$array = array($id);
// echo json_encode($array);	exit;			

		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
}
	 