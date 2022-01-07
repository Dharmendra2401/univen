<?php

class notificationsmodel extends globalmodel 
{
	function getall($data, $user, $type)
	{
		
		$sql = " select n.* from  ".$user."_notification n
				Inner JOIN $user u ON u.id= n.".$user."_id 
				where n.".$user."_id =".$data['id'] ." AND u.delete_flag='N' " ;
		if($type=="unread"){ //view/edit
			$sql .= "and n.read_status = 'N' ";	
		}
			$sql .= "  order by n.id desc";	
		// print_R($sql);
		$array = array();
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
		
	}
	
	
	
	
}