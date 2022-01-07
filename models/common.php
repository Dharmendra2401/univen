<?php

class commonmodel extends globalmodel 
{
	
	function updatewhere($table,$data,$where)
	{
		$update=$this->pdodatabase->update($table, $data,$where); 
	
		if($update)   return $update; 
		else  return false;
	}
	
	function add_data($table, $data)
	{
		$add=$this->pdodatabase->insert($table, $data,true); 
	
		if($add==true || $add>0)   return $add; 
		else  return false;
	}
	
	//used in recruiter dashboard
	function profile_counts()
	{
		$sql = "SELECT * from profile_counts   ";   
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	//used in other/supermodel
	function getsupermodels($id=0)
	{
		$str = $id>0 ? ' where id = '.$id :'';
		$sql = "SELECT * FROM  `super_model` $str ORDER BY  `super_model`.`id` DESC  ";
		$array = array();        
		$dataArr = $this->pdodatabase->querydata($sql,$array);
		return $dataArr; 
	}
	
	
}