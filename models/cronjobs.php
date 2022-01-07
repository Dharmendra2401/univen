<?php

class jobsmodel extends globalmodel 
{
	function getjobs()
	{
		$sql = "Select j.*,r.admin_approval as recruiter_approved,  r.company_name, r.email, r.firstname, r.lastname From jobs j 
				INNER JOIN recruiter r ON r.id =j.recruiter_id
				where j.delete_flag='N' and r.delete_flag='N' and j.last_date > NOW() ";
		$array=[];
		$sql .= "  order by j.id desc";
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	function getusers($id)
	{
		$sql = "Select u.id From notifications n
				INNER JOIN user u ON (u.id =n.user_id AND n.user='user')
				where u.delete_flag='N' AND n.type='jobs' and n.type_id=$id";
		$array=[];
		$sql .= "  order by j.id desc";
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
}	
?>