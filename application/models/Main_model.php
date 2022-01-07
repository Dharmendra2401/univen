<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Main_model extends CI_Model {
    public function authfalse(){
   
        $getadmin=$this->session->userdata('admin');
        if(!empty($getadmin)){
        redirect(base_url().'admin/index');
        return false;
        }
        
        
        }

        public function authtrue(){
   
            $getadmin=$this->session->userdata('admin');
            if(empty($getadmin)){
            redirect(base_url().'admin/login');
            return true;
            }
            
            
            }
	

		public function __construct() {
		  parent::__construct(); 
		}
	  
		// Fetch records
		public function getData() {
		  $this->db->select('*');
		  $this->db->from('blogs');
		  $query = $this->db->get();
		  return $query->result_array();
		}
	  
		// Select total records
		public function getrecordCount() {
		  $this->db->select('*');
		  $this->db->from('blogs');
		  $query = $this->db->get();
		  $result = $query->result_array();
		  return $result;
		}

		public function count_all() {
			return $this->db->count_all("blogs");
		}

		public function verifyemail($email){
			$query122 = $this->db->query('SELECT email_verified,email  from recruiter where email="'.$email.'" and email_verified="Y"');
			$query12 = $this->db->query('UPDATE recruiter SET email_verified="Y" where email="'.$email.'" ');
			$results = $query122->num_rows();
			return $results;
		}

		public function checkusers($email,$password) {
		$query = $this->db->query('SELECT * FROM admin where email="'.$email.'"and password="'.$password.'" ');
		return $query->num_rows();
			}

		public function checkadminemail($email,$table,$id){
		$query1 = $this->db->query('SELECT email FROM '.$table.' where email="'.$email.'" ');
		return $query1->num_rows();
		}

		public function sendpass($email,$table,$id){
		$query1 = $this->db->query('SELECT password,email FROM '.$table.' where email="'.$email.'" ');
		$result = $query1->row_array();
		return $result;
		}

		public function addrecuiter($recuiter){
			$this->db->insert('recruiter', $recuiter);
			$lastid=$this->db->insert_id();
			$this->db->query('INSERT into admin_notification (type,type_id)values("recruiter","'.$lastid.'")');
		}

		public function emailverification($email,$table,$mobile){
			$query1 = $this->db->query('SELECT Password,E_Mail FROM '.$table.' where E_Mail="'.$email.'" or Mobile_No="'.$mobile.'" ');
			$result = $query1->num_rows();
			return $result;
		}

		public function contactus($contactus){
			$insert1=$this->db->insert('contact_us',$contactus);
			return $insert1;
		}

		public function slider_content(){
			$slidercontent = $this->db->query('SELECT  id,image,content,status,title FROM  slider_content where status="1" order by id desc');
			$slidercontent = $slidercontent->result_array();
			return $slidercontent;
		}
		public function industriesone(){
			$indus = $this->db->query('SELECT content,id,description,url,title FROM  industries_one where id=1 ');
			$indus = $indus->row_array();
			return $indus;
		}
		public function industriestwo(){
			$indus2 = $this->db->query('SELECT content,id,description,title FROM  industries_two');
			$indus2 = $indus2->result_array();
			return $indus2;
		}
		public function aboutus(){
			$aboutq = $this->db->query('SELECT content,id,image FROM about_us where id=1 ');
			$aboutus = $aboutq->row_array();
			return $aboutus;
		}
		public function admindetails(){
			$aboutq = $this->db->query('SELECT content,id,image FROM about_us where id=1 ');
			$aboutus = $aboutq->row_array();
			return $aboutus;
		}
		public function admin_details(){ 
			$this->db->select('*');
			$this->db->from('banner_image');
			$this->db->from('admin');
			$query = $this->db->get();
			$returnval=$query->row_array();
			return $returnval;
			
		}
	
			public function terms_condition($id){
			$tercon=$this->db->query('SELECT * from terms_condition where id="'.$id.'"');
			$ress=$tercon->row_array();
			return $ress;
		}
		public function allteam(){
			$query=$this->db->query('SELECT * from team where status="Y" ORDER BY id desc');
			$teams=$query->result_array();
			return $teams;
		}
		public function ourwork(){
			$this->db->select('*');
			$this->db->from('ourwork');
			$conditions = array('delete_flag' => 'N', 'status' => 'Y');
			$this->db->where($conditions);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $getalldtat=$query->result_array();
		}
	
		public function recruiter_category(){
			$this->db->select('*');
			$this->db->from('recruiter_category');
			$this->db->where('delete_flag','N');
			$query = $this->db->get();
			return  $getalldtat=$query->result_array();
		}
		public function evntdashboard(){
			$currentdate=date('Y-m-d');
			$eventdas=$this->db->query('SELECT startdate,enddate,event_title,id FROM events where  delete_flag="N" and (startdate<="'.$currentdate.'"  and  enddate>="'.$currentdate.'") order by enddate asc ');
			$getresult = $eventdas->result_array();
			return $getresult;
		}

		public function event_type(){
			$this->db->select('*');
			$this->db->from('event_type');
			$condition=array('active'=>'N','status'=>'Y');
			$this->db->where($condition);
			$queryss = $this->db->get();
			return  $geteventtype=$queryss->result_array();
		}
		public function event_cat(){
			$this->db->select('*');
			$this->db->from('event_category');
			$condition=array('active'=>'N','status'=>'Y');
			$this->db->where($condition);
			$querysss = $this->db->get();
			return  $geteventcat=$querysss->result_array();
		}
		public function getvedio(){
			$this->db->select('*');
			$this->db->from('vedio_content');
			$getvedio=$this->db->get();
			return $contentvedio=$getvedio->row_array();
		}
		
		public function getvptype(){
			$this->db->select('*');
			$this->db->from('vendor_type');
			$this->db->order_by("id", "asc");
			$getv=$this->db->get();
			return $getvv=$getv->result_array();
		}
		public function trincat(){
			$this->db->select('*');
			$this->db->from('train_cat');
			$this->db->order_by("id", "asc");
			$gett=$this->db->get();
			return $gettt=$gett->result_array();
		}

		
		public function getcountry_flag(){
			$this->db->select('*');
			$this->db->from('country_code_name_flag');
			$this->db->order_by("list_countryName", "asc");
			$getcf=$this->db->get();
			return $getallcf=$getcf->result_array();
		}
		
		public function gethired_hire(){
			$this->db->select('*');
			$this->db->from('steps');
			$getstep=$this->db->get();
			return $showstep=$getstep->result_array();
		}
		public function banner(){
			$this->db->select('*');
			$this->db->from('banner_image');
			$banner=$this->db->get();
			return $showban=$banner->row_array();
		}
		public function faq(){
			$cond=array('delete_flag'=>'N','status'=>'Y');
			$this->db->where($cond);
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->order_by("id", "desc");
			$getfaq=$this->db->get();
			return $showfaq=$getfaq->result_array();
		}
		public  function recentemp(){
			$gettest=$this->db->query('SELECT logo,url FROM recentemp where  delete_flag="N" and status="Y" order by id desc');
			//$this->db->from('testimonials');
			
			return $shotwst=$gettest->result_array();

		}
		public  function usercontent(){
			// $this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('usercontent');
			$this->db->order_by("id", "asc");
			$getuser=$this->db->get();
			return $getall=$getuser->result_array();

		}
		
		public function testimonals(){
			
			$gettest=$this->db->query('SELECT fullname,image,content,position FROM testimonials where  delete_flag="N" and status="Y"');
			//$this->db->from('testimonials');
			$this->db->order_by("id", "asc");
			
			return $showrecemp=$gettest->result_array();
		}

		public function aspregistration($asp,$keytable,$user_profile,$asp_emp,$comm){
			$this->db->insert('registration_stg',$asp);
			$this->db->insert('key_cast_india_users',$keytable);
			$this->db->insert('applicant_recruiter',$asp_emp);
			if($user_profile!=''){$this->db->insert('user_profile_mapping',$user_profile);}
			
			$this->db->insert('communication',$comm);

			return "ok";
		}

		public function get_asp_emp_id(){
			$getid=$this->db->query('SELECT ID from key_cast_india_users where Type_ID="Aspirant" OR Type_ID="Employer" order by ID desc Limit 0,1');
			return $showcat=$getid->row_array();
			
		}
		public function get_cat_id($name){
			$getid=$this->db->query('SELECT Category_Id from category WHERE Category_Name="'.$name.'" ');
			$showcat=$getid->row_array();
			return $showcat['Category_Id'];
		}
		public function get_subcat_id($name){
			$getid=$this->db->query('SELECT Sub_Category_ID from sub_category WHERE Sub_Category_Name="'.$name.'" ');
			$showcat=$getid->row_array();
			return $showcat['Sub_Category_ID'];
		}
		public function get_profile_id($name){
			$getid=$this->db->query('SELECT PROFILE_ID from profile WHERE PROFILE_NAME="'.$name.'" ');
			$showcat=$getid->row_array();
			return $showcat['PROFILE_ID'];
		}

	

		public function validmobileloginasp($mobile){
			$condition=array('asp_emp.Applicant_Access'=>"Y",'comm.Mobile_No'=>$mobile);
			$gettest=$this->db->select('asp_emp.Recruiter_Access,asp_emp.Applicant_Access,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp_emp','key.ID=asp_emp.USER_ID','INNER')->where($condition)->get()->num_rows();
			return $gettest; 
		}

		public function validmobileloginemp($mobile){
			$condition=array('asp_emp.Recruiter_Access'=>"Y",'comm.Mobile_No'=>$mobile);
			$gettest=$this->db->select('asp_emp.Recruiter_Access,asp_emp.Applicant_Access,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp_emp','key.ID=asp_emp.USER_ID','INNER')->where($condition)->get()->num_rows();
			return $gettest; 
		}

		public function validemail($email,$mobile){
			$gettest=$this->db->query('SELECT E_Mail,Mobile_No from registration_stg where  E_Mail="'.$email.'" and Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;
		}

		public function validmobile($mobile){
			$gettest=$this->db->query('SELECT E_Mail,Mobile_No from registration_stg where  Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;
		}

		public function emailverify($token){
			$gettest=$this->db->query('Update registration_stg set Email_Verified="Y"  where  Mobile_No="'.$token.'" ');

		}

		public function getallprofiles($iwanttobe){
			$iwanttobeget.='';
			$iwanttobeget.=$iwanttobe['name'];
			$que=$this->db->select('cta.Category_ID,cta.Category_Name as catname,sub.Sub_Category_ID as subcatid,sub.Sub_Category_Name,pro.PROFILE_ID,pro.PROFILE_NAME,map.Category_ID,map.Sub_Category_ID,map.PROFILE_ID')->from('profile_form_mapping as map')->join('sub_category as sub','sub.Sub_Category_ID=map.Sub_Category_ID','INNER')->join('profile as pro','pro.PROFILE_ID=map.PROFILE_ID','INNER')->join('category as cta','cta.Category_ID=map.Category_ID','INNER')->where('pro.PROFILE_NAME  LIKE "%'.$iwanttobeget.'%"')->group_by('pro.PROFILE_ID')->get()->result_array();
			
			return $que;

		}
		public function getseniority(){

			$this->db->select('*');
			$this->db->from('asp_seniority');
			$this->db->order_by("id", "asc");
			$seniorty=$this->db->get();
			return $getall=$seniorty->result_array();
        
		}

		public function getemployercat(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('employer_category');
			$this->db->order_by("id", "desc");
			$empcat=$this->db->get();
			return $getempcat=$empcat->result_array();
		}

		public function addquestion($ques){
			$insert12=$this->db->insert('faq_question_ask',$ques);
			return "ok";
		}
		public function state(){
			$cond="state!= ' ' ";
			$this->db->select('state');
			$this->db->from('states_city_country');
			$this->db->where($cond);
			$this->db->group_by('state'); 
			$this->db->order_by("state", "asc");
			$state=$this->db->get();
			return $getstate=$state->result_array();
		}
		public function getcity($state){
			$this->db->select('city');
			$this->db->from('states_city_country');
			$this->db->where('state',$state);
			$this->db->group_by('city'); 
			$this->db->order_by("city", "asc");
			$city=$this->db->get();
			return $getcity=$city->result_array();
		}
		public function getaspirantdetails($aspmobile,$aspemail){
			// changes here OR to AND condition
			$condition='(comm.E_Mail="'.$aspemail.'" OR comm.Mobile_No="'.$aspmobile.'") and asp.Applicant_Access="Y" ';
			$gettest=$this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp','comm.USER_ID=asp.USER_ID','INNER')->where($condition)->get()->row_array();
			return  $gettest;  
		}
		public function getempirantdetails($aspmobile,$aspemail){
			$condition='(comm.E_Mail="'.$aspemail.'" OR comm.Mobile_No="'.$aspmobile.' ") and asp.Recruiter_Access="Y" ';
			$gettest=$this->db->select('asp.First_Name,asp.Last_Name,comm.Mobile_No,comm.E_Mail,comm.USER_ID,key.ID,key.Type_ID')->from('communication as comm')->join('key_cast_india_users as key','key.ID=comm.USER_ID','INNER')->join('applicant_recruiter as asp','asp.USER_ID=comm.USER_ID','INNER')->where($condition)->get()->row_array();
			
			return  $gettest;  
		}

		public function getallpro(){
			$cond=array('pro.ACTIVE_STATUS'=>'Y','subcontent.type'=>'P');
			$getdata=$this->db->select('subcontent.ID,subcontent.Overview,subcontent.Positions_and_Responsibilities,subcontent.Qualifications,subcontent.How_To_Become,subcontent.ACTIVE_FLAG,subcontent.Short_Image,subcontent.Long_Image,subcontent.RECORD_INSERTED_DTTM,pro.PROFILE_ID,pro.PROFILE_NAME,map.Category_ID,map.Sub_Category_ID,map.PROFILE_ID,cat.Category_ID,cat.Category_Name,sub.Sub_Category_ID,sub.Sub_Category_Name')->from('profile as pro')->join('sub_cat_pofile_narration as subcontent','pro.PROFILE_ID=subcontent.ID','INNER')->join('profile_form_mapping as map','map.PROFILE_ID=pro.PROFILE_ID','LEFT')->join('category as cat','cat.Category_ID=map.Category_ID')->join('sub_category as sub','sub.Sub_Category_ID=map.Sub_Category_ID')->where($cond)->Group_by('map.PROFILE_ID')->order_by('pro.PROFILE_ID','Random')->limit(10,0)->get()->result_array();
			return $getdata;
		}
		public function getpro($name){
			$getpro=str_replace('_', ' ',$name);
			$getdata=$this->db->select('subcontent.ID,subcontent.Overview,subcontent.Positions_and_Responsibilities,subcontent.Qualifications,subcontent.How_To_Become,subcontent.ACTIVE_FLAG,subcontent.Short_Image,subcontent.Long_Image,subcontent.RECORD_INSERTED_DTTM,pro.PROFILE_ID,pro.PROFILE_NAME')->from('profile as pro')->join('sub_cat_pofile_narration as subcontent','pro.PROFILE_ID=subcontent.ID','INNER')->where('pro.PROFILE_NAME',$getpro)->get()->row_array();
			return $getdata;
		}

		public function getcategory(){
			$getcat=$this->db->select('count(*) as countall,submap.Sub_Category_ID,submap.Sub_Category_ID,submap.Category_ID,cat.Category_ID,cat.Category_Name,narration.ID')->from('category as cat')->join('cat_sub_cat_mapping as submap','submap.Category_ID=cat.Category_ID','INNER')->join(' sub_cat_pofile_narration as narration','narration.ID=submap.Sub_Category_ID')->Group_by('cat.Category_ID')->where('cat.ACTIVE_STATUS','Y')->order_by('cat.Category_ID','desc')->get()->result_array();
			return $getcat;
		}

		function get_blog_list()
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->order_by("id", "desc");
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_list_by_category($id)
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->where('blog_category_id',$id);
				$this->db->order_by("id", "desc");
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_limit()
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->order_by("id", "desc");
				$this->db->limit(5);
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_category()
	      {
	        $this->db->select('*');
				$this->db->from('blog_category');
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function get_blog_sliders()
	      {
	        $this->db->select('*');
				$this->db->from('blogs');
				$this->db->order_by("id", "desc");
				$this->db->limit(4);
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
	      function save_blog_comment($data)
		{               
	       $this->db->insert('blog_comments',$data);  
	       return $this->db->insert_id();
		}
		
		function getSearchBlog($searchBlog) {
		    if(empty($searchBlog))
		       return array();

		    $result = $this->db->like('blog_title', $searchBlog)
		             ->get('blogs');

		    return $result->result_array();
		} 
		public function getcatcount(){
			$getcat=$this->db->select('count(*) as countall,submap.Sub_Category_ID,submap.Sub_Category_ID,submap.Category_ID,cat.Category_ID,cat.Category_Name,narration.ID')->from('category as cat')->join('cat_sub_cat_mapping as submap','submap.Category_ID=cat.Category_ID','INNER')->join(' sub_cat_pofile_narration as narration','narration.ID=submap.Sub_Category_ID')->Group_by('cat.Category_ID')->where('cat.ACTIVE_STATUS','Y')->order_by('cat.Category_ID','desc')->get()->num_rows();
			return $getcat;
		}

		public function getsubnarration(){
			$condition='(narration.ACTIVE_FLAG="Y" OR sub.ACTIVE_STATUS="Y") ';
			$getall=$this->db->select('sub_cat.Category_ID,sub_cat.Sub_Category_ID,sub.Sub_Category_ID,sub.Sub_Category_Name,narration.ID,narration.Short_Image')->from('cat_sub_cat_mapping as sub_cat ')->join('sub_cat_pofile_narration as narration',' sub_cat.Sub_Category_ID=narration.ID','INNER')->join('sub_category as sub','sub.Sub_Category_ID=sub_cat.Sub_Category_ID')->where($condition)->get()->result_array();
			return $getall;
		}

		public function subcategory($name){
			$getpro=str_replace('_', ' ',$name);
			$condition=array('sub.Sub_Category_Name'=>$getpro,'narration.Type'=>'S');
			$getsubdetails=$this->db->select('cat.Category_ID,cat.Category_Name,sub.Sub_Category_ID,sub.Sub_Category_Name,narration.Id,narration.Overview,narration.Long_Image,narration.Short_Image,narration.Type,map.Sub_Category_ID,map.Category_ID')->from('sub_category as sub')->join('sub_cat_pofile_narration as narration','narration.Id=sub.Sub_Category_ID','LEFT')->join('cat_sub_cat_mapping as map','map.Sub_Category_ID=sub.Sub_Category_ID','LEFT')->join('category as cat','cat.Category_ID=map.Category_ID')->where($condition)->get()->row_array();
			return $getsubdetails;
		}

		public function getprofilsss($id){
			$condition=array('sub.Sub_Category_Name'=>$getpro,'narration.Type'=>'S');
			$getsubdetails=$this->db->select('pro_map.Sub_Category_ID,pro_map.PROFILE_ID,narration.ID,narration.Long_Image,narration.Short_Image,pro.PROFILE_ID,PROFILE_NAME')->from('profile_form_mapping as pro_map')->join('sub_cat_pofile_narration as narration','narration.ID=pro_map.PROFILE_ID','INNER')->join('profile as pro','pro.PROFILE_ID=pro_map.PROFILE_ID','INNER')->where('pro_map.Sub_Category_ID',$id)->Group_by('pro_map.PROFILE_ID')->get()->result_array();
			return $getsubdetails;
		}
		public function categories(){
			$this->db->select('*');
		  	$this->db->from('category as cat');
		  	$this->db->join('category_description as ct','ct.ID=cat.Category_ID','INNER');
			  $this->db->join('sub_category as sub','sub.Sub_Category_ID=ct.sub_category1','INNER')->GROUP_BY('cat.Category_ID');
		 	$query = $this->db->get();
		  	return $query->result_array();
		}
		public function subcatn($id){
			
			$this->db->select('*');
		  	$this->db->from('category_description');
			$this->db->where('ID',$id);
		 	$query = $this->db->get();
		  	return $query->result_array();
		}
		// public function category_film(){
		// 	$this->db->select('*');
		//   	$this->db->from('category_description cd');
		// 	$this->db->join('category as cat','cat.Category_ID=cd.ID','INNER');
		//  	$this->db->where('Category_Name' , "FILM");
		// 	$query = $this->db->get();
		// 	return $query->result_array();
		// }
		public function subcategory_description($id){
			$this->db->select('*');
		  	$this->db->from('sub_cat_pofile_narration');
		 	$this->db->where('ID' , $id);
			$query = $this->db->get();
			return $query->row();
		}
		public function subcategory_profile($id){
			$this->db->select('*');
		  	$this->db->from('sub_cat_narration');
		 	$this->db->where('Sub_Category_ID' , $id);
			$query = $this->db->get();
			return $query->result_array();
		}
		public function profiles($id){
			$this->db->select('*');
		  	$this->db->from('sub_cat_pofile_narration');
		 	$this->db->where('ID' , $id);
			$query = $this->db->get();
			return $query->row();
		}
		public function getprofilelist(){
			$this->db->select('*');
		  	$this->db->from('profileslider');
			$query = $this->db->get();
			return $query->result_array();
		}
		function populartaglist()
	      {
	        $this->db->select('*');
				$this->db->from('populartags');
				$query = $this->db->get();
			    if($query->num_rows() > 0){
			      return $query->result_array();
			    }else{
			      return 0;
			     }
	      }
}