<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Admin_model extends CI_Model {
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
	
		


		 public function additionaldetailemploye_two(){
			$cond=array('Type'=>'Additional Details For Employers2','Delete_Flag'=>'N','Form_Type'=>'Form Two');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function __construct() {
		  parent::__construct(); 
		}

		public function notifications($id,$table,$getricid,$getuser){
			$currentdate=date('Y-m-d h:i:s');
			if($getuser=='recruiter'){
			$que=$this->db->query('select type_id from recruiter_notification where type_id="'.$id.'" and type="'.$table.'"');$counts=$que->num_rows();
			if($counts==0){
			$this->db->query('insert into recruiter_notification (type,type_id,session_id,date)values("'.$table.'","'.$id.'","'.$getricid.'","'.$currentdate.'")');
			}else{
			$this->db->query('update recruiter_notification set read_status="N",date="'.$currentdate.'" where type_id="'.$id.'"');
			}
			}
			
		}
		
		public function delete($id,$table){

			if($table=='artist'){
				$select=$this->db->query('SELECT image FROM artist where id="'.$id.'" ');
				$this->db->where('id', $id);
				$result = $select->row_array();
				unlink('uploads/artist/'.$result['image']);
				$this->db->delete($table);
				$ok='ok';
				return $ok;

			}
			

			

			if($table=='dropdown_profile'){
				$this->db->where('Id', $id);
				$condi=array('Delete_Flag'=>'Y','RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='hobbies'){
				$this->db->where('Id', $id);
				$condi=array('Delete_Flag'=>'Y','RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			if($table=='interest'){
				$this->db->where('Id', $id);
				$condi=array('Delete_Flag'=>'Y','RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			if($table=='recentemp'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}
			

			

			if($table=='faq_question_ask'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}

			

			if($table=='employer_category'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}

			
			if($table=='blogs'){
				$select=$this->db->query('SELECT * FROM blogs where id="'.$id.'" ');
				$this->db->where('id', $id);
				$result = $select->row_array();
				unlink('images/blog/'.$result['blog_images']);
				$this->db->delete($table);
				$ok='ok';
				return $ok;

			}
			if($table=='slider_content'){
				$select=$this->db->query('SELECT image FROM slider_content where id="'.$id.'" ');
				$this->db->where('id', $id);
				$result = $select->row_array();
				unlink('uploads/slider_content/'.$result['image']);
				$this->db->delete($table);
				$ok='ok';
				return $ok;

			}
			if($table=='team'){
				$select=$this->db->query('SELECT image FROM team where id="'.$id.'" ');
				$this->db->where('id', $id);
				$result = $select->row_array();
				unlink('uploads/team/'.$result['image']);
				$this->db->delete($table);
				$ok='ok';
				return $ok;

			}
			if($table=='recruiter'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}
			if($table=='faq'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}
			

			if($table=='jobs'){
				$this->notifications($id,"job",$getricid);
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}
			if($table=='testimonials'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}
			if($table=='ourwork'){
				$this->db->where('id', $id);
				$this->db->delete($table);
				$ok='ok';
				return $ok;
			}
			if($table=='sub_cat_pofile_narration'){
				$this->db->where('ID', $id);
				$this->db->delete($table);
				$ok='ok';
				return $ok;
			}
			if($table=='sub_cat_narration'){
				$this->db->where('ID', $id);
				$this->db->delete($table);
				$ok='ok';
				return $ok;
			}
			if($table=='category_description'){
				$this->db->where('sub_category1', $id);
				$this->db->delete($table);
				$ok='ok';
				return $ok;
			}
			if($table=='blog_category'){
				$table1 = 'blogs';
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$u = $this->db->query('UPDATE '.$table1.' SET delete_flag="Y" where blog_category_id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}
			if($table=='user'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}
			if($table=='sub_cat_narration'){
				$this->db->where('ID', $id);
				$this->db->delete($table);
				$ok='ok';
				return $ok;
			}
			if($table=='profileslider'){
				$this->db->where('ID', $id);
				$this->db->delete($table);
				$ok='ok';
				return $ok;
			}
			
		}

		

		public function update($id,$table,$status){
			if($table=='sub_cat_pofile_narration'){
				$this->db->where('ID', $id);
				$condi=array('ACTIVE_FLAG'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				
				$ok='ok';
				return $ok;

			}

			if($table=='dropdown_profile'){
				$this->db->where('ID', $id);
				$condi=array('ACTIVE_STATUS'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='category'){
				$this->db->where('Category_Id', $id);
				$condi=array('ACTIVE_STATUS'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				
				$ok='ok';
				return $ok;

			}

			
			if($table=='profile'){
				$this->db->where('PROFILE_ID', $id);
				$condi=array('ACTIVE_STATUS'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='hobbies'){
				$this->db->where('Id', $id);
				$condi=array('ACTIVE_STATUS'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='interest'){
				$this->db->where('Id', $id);
				$condi=array('ACTIVE_STATUS'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='sub_category'){
				$this->db->where('Sub_Category_ID', $id);
				$condi=array('ACTIVE_STATUS'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='profile_form_mapping'){
				$this->db->where('id', $id);
				$condi=array('ACTIVE_FLAG_PROFILE_FORM'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			

			if($table=='sub_category_basic_form'){
				$this->db->where('id', $id);
				$condi=array('ACTIVE_FLAG_SUB_CAT_FORM'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='employer_category'){
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			
			if($table=='category_basic_form'){
				
				$this->db->where('id',$id);
				$condi=array('ACTIVE_FLAG_CATEGORY_FORM'=>$status,'RECORD_UPDATED_DTTM'=>date('Y-m-d H:i:s'));
				$this->db->set($condi);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			
			if($table=='faq'){
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			if($table=='testimonials'){
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			
			if($table=='recentemp'){
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='team'){

				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='user'){
				
				$this->db->where('id', $id);
				$this->db->set('admin_approval', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='slider_content'){
				
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			if($table=='blog_category'){
				$this->db->where('id', $id);
				$this->db->set('active', $status);
				if($status == 'N'){
					$table1 = 'blogs';
					$u = $this->db->query('UPDATE '.$table1.' SET delete_flag="Y" where blog_category_id="'.$id.'" ');
				}else{
					$table1 = 'blogs';
					$u = $this->db->query('UPDATE '.$table1.' SET delete_flag="N" where blog_category_id="'.$id.'" ');
				}
				$this->db->update($table);
				$ok='ok';
				return $ok;
			}
				
		}
		// Fetch records
		public function getData() {
		  $this->db->select('*');
		  $this->db->from('blogs');
		  $query = $this->db->get();
		  return $query->result_array();
		}
		public function update_blog($id,$status) {
			$this->db->set($status);
			$this->db->where('id', $id);
			$this->db->update('blogs');
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



		public function checkusers($email,$password) {
			$query = $this->db->query('SELECT * FROM admin where email="'.$email.'"and password="'.$password.'"  ');
			return $query->row_array();
		}
		public function association(){
			$cond=array('Type'=>'Association Name','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}

		public function checkadminemail($email,$table,$id){
		    $query1 = $this->db->query('SELECT email FROM '.$table.' where email="'.$email.'" ');
		    return $query1->num_rows();
		}
		public function checkpassword($password,$table,$id){
		    $query1 = $this->db->query('SELECT password FROM '.$table.' where password="'.$password.'" and id="'.$id.'" ');
		    return $query1->num_rows();
		}

		public function sendpass($email,$table,$id){
			$query1 = $this->db->query('SELECT password,email FROM '.$table.' where email="'.$email.'" ');
			$result = $query1->row_array();
			return $result;
		}

		public function aboutus(){
				$aboutq = $this->db->query('SELECT content,id,image FROM about_us where id=1 ');
				$aboutus = $aboutq->row_array();
				return $aboutus;
		}

		public function updateaboutus($about){
			$this->db->where('id', 1);
			$this->db->update('about_us', $about);
			
		}

		public function industriesone(){
			$indus = $this->db->query('SELECT content,id,description,url,title FROM  industries_one where id=1 ');
			$indus = $indus->row_array();
			return $indus;
		}

		public function updateindustrieone($industries){
			$this->db->where('id', 1);
			$this->db->update('industries_one', $industries);

		}

		public function industriestwo(){
			$indus2 = $this->db->query('SELECT content,id,description,title FROM  industries_two');
			$indus2 = $indus2->result_array();
			return $indus2;
		}

		public function updateindtwo($industwo){
			$this->db->where('id', $industwo['id']);
			$this->db->update('industries_two', $industwo);
		}

		public function artist(){
			$artist = $this->db->query('SELECT id,image,name,position,status FROM  artist');
			$artist = $artist->result_array();
			return $artist;
		}

		public function addartist($artist){
			//$this->db->where('id', $industwo['id']);
			$this->db->insert('artist', $artist);
		}

		public function updateartist($updateartist){
			$this->db->where('id', $updateartist['id']);
			$this->db->update('artist', $updateartist);
		}

		public function slider_content(){
			$slidercontent = $this->db->query('SELECT id,image,content,status,title FROM  slider_content order by id desc');
			$slidercontent = $slidercontent->result_array();
			return $slidercontent;
		}

		public function addslidercontent($slidercontent){
			$this->db->insert('slider_content', $slidercontent);

		}

		public function updateslidercontent($updateslidercontent){
			$this->db->where('id', $updateslidercontent['id']);
			$this->db->update('slider_content', $updateslidercontent);

		}

		
		

		public function emailinsert($email){
			$mailtrack=$this->db->insert('mailtrack', $email);
			return $mailtrack;
		}

		public function requirterjobs(){
			$query1 = $this->db->query('SELECT job.id,job.recruiter_id,job.profile_ids,job.old_title,job.title,job.old_content,job.location,job.old_location,job.date_created,job.admin_approval,job.delete_flag,job.update_by,rec.firstname,rec.lastname,rec.company_name FROM recruiter as rec INNER JOIN jobs as job where job.recruiter_id=rec.id and job.delete_flag="N" order by job.id desc ');
			$result = $query1->result_array();
			return $result;
		}

		public function jobs_details($id){
			$update=$this->db->query('UPDATE admin_notification set status="Y" where type_id="'.$id.'"  ');
			$details = $this->db->query('SELECT job.date_created,job.date_updated,job.old_type,job.profile_ids,job.id,job.recruiter_id,job.profile_ids,job.old_title,job.old_content,job.location,job.old_location,job.date_created,job.admin_approval,job.delete_flag,job.update_by,rec.firstname,rec.lastname,rec.company_name FROM recruiter as rec INNER JOIN jobs as job where job.recruiter_id=rec.id and job.delete_flag="N" and job.id="'.$id.'" and job.delete_flag="N" ');
			$detail = $details->row_array();
			return $detail;
		}

		public function getprofile($idprofile){
			$profile = $this->db->query('SELECT name FROM  profiles where id  IN ('.$idprofile.') and delete_flag="N"');
			//$this->db->order_by('Category', 'asc')
			$profil = $profile->result_array();
			return $profil;
		}

		public function applicant($id){
			$query1 = $this->db->query('SELECT app.date_created,app.id,app.user_id,app.job_id,app.date_created,users.id,users.firstname,users.lastname,users.delete_flag,users.email,users.contact_no FROM user as users INNER JOIN job_applications as app on app.user_id=users.id where app.job_id="'.$id.'"  ');
			$result = $query1->result_array();
			$result2 = $query1->num_rows();
			return $result;
		}

		public function events(){
			$artist = $this->db->query('SELECT * FROM  event_category where active="N" order by id desc');
			$artist = $artist->result_array();
			return $artist;

		}

		public function view_events(){
			
			$eventslist= $this->db->query('SELECT evnt.*,rec.firstname as recfirstname,rec.lastname as reclastname,rec.id as recid,adm.firstname as admfirstname,adm.lastname as admlastname,adm.id as admid FROM  events as evnt LEFT JOIN recruiter as rec on(evnt.added_id=rec.id and evnt.added_by="recruiter") LEFT JOIN admin as adm on(adm.id=evnt.added_id and evnt.added_by="admin")  where evnt.delete_flag="N"  order by evnt.id desc');
			$eventslistted = $eventslist->result_array();
			return $eventslistted;
		}
		
		public function addevent($events){
			$event=$this->db->insert('event_category', $events);
			return $event;
		}

		public function updateevent($events){
			$this->db->where('id', $events['id']);
			$events=$this->db->update('event_category', $events);
			return $events;
		}
		
		public function details_events($id){
			$query12=$this->db->query('SELECT * FROM events where id="'.$id.'"  ');
			$query122 = $query12->row_array();
			$this->db->where('type_id', $id);
			$this->db->query('update admin_notification  set status="Y" where type_id="'.$id.'" and type="event"  ');
			return $query122;
		}

		public function eventusers($id){
			$query122=$this->db->query('SELECT * FROM buy_events where event_id="'.$id.'"  ');
			$query1223 = $query122->result_array();
			return $query1223;
		}

		public function getcatagories($id){
			//echo 'SELECT name FROM event_category where id IN ('.$id.')  ';
			$query122=$this->db->query('SELECT name FROM event_category where id IN ('.$id.')  ');
			$query1223 = $query122->result_array();
			return $query1223;
		}

		public function blog_catagories(){
			$blog_catagories= $this->db->query('SELECT * FROM  blog_category where delete_flag="N"  order by id desc');
			$blogs = $blog_catagories->result_array();
			return $blogs;


		}

		public function addblogs($blogs){
			$blogsss=$this->db->insert('blog_category', $blogs);
			return $blogsss;
		}
		public function save_blog($blogs){
			$blogsss=$this->db->insert('blogs', $blogs);
			return $blogsss;
		}
		public function uaddblogs($ublogs){
			$this->db->where('id', $ublogs['id']);
			$ublogss=$this->db->update('blog_category', $ublogs);
			return $ublogss;
		}

		public function blog_list(){
			$blog_catagories= $this->db->query('SELECT * FROM  blogs where delete_flag="N" order by id desc');
			$blogs = $blog_catagories->result_array();
			return $blogs;
		}

		public function detail_blog($id){
			$blog_catagories= $this->db->query('SELECT * FROM  blogs where id="'.$id.'" and delete_flag="N" order by id desc');
			$blogs = $blog_catagories->row_array();
			return $blogs;

		}

		public function getcatagoriesblog($id){
			
			$query122=$this->db->query('SELECT name FROM blog_category where id IN ('.$id.')  ');
			$query1223 = $query122->result_array();
			return $query1223;

		}

		public function applicant_list(){
			
				//$indus2=$this->db->select('app.id, app.firstname,app.lastname,app.email,app.display_name,app.contact_no,app.email_verified,app.mobile_verified,app.date_created,app.delete_flag,app.update_by,app.update_date,app.admin_approval, detail.user_id, detail.salutation, detail.profile_pic, detail.banner_pic, detail.p_address, detail.p_city, detail.p_state, detail.p_pincode, detail.date_created , detail.p_country , detail.tele_number, detail.tele_number, detail.t_address, detail.t_city,detail.t_country,detail.t_state,detail.t_pincode,detail.father_name,detail.mother_name,detail.mother_name,detail.date_of_birth,detail.status,detail.marital_status,detail.kin_details,detail.kin_city,detail.kin_pincode,detail.kin_state,detail.kin_country,detail.date_updated')->from('user as app')->join('details as detail', 'app.id = detail.user_id', 'join')->order_by("app.id", "desc")->get();

			$indus2 = $this->db->query('SELECT * FROM  user where delete_flag="N" order by id desc');
			$app = $indus2->result_array();
			return $app;

		}

		public function app_details($id){
			//echo 'SELECT app.id, app.firstname,app.lastname,app.email,app.display_name,app.contact_no,app.email_verified,app.mobile_verified,app.date_created,app.delete_flag,app.update_by,app.update_date,app.admin_approval, detail.user_id, detail.salutation, detail.profile_pic, detail.banner_pic, detail.p_address, detail.p_city, detail.p_state, detail.p_pincode, detail.date_created , detail.p_country , detail.tele_number, detail.tele_number, detail.t_address, detail.t_city,detail.t_country,detail.t_state,detail.t_pincode,detail.father_name,detail.mother_name,detail.mother_name,detail.date_of_birth,detail.status,detail.marital_status,detail.kin_details,detail.kin_city,detail.kin_pincode,detail.kin_state,detail.kin_country,detail.date_updated,edu.user_id,edu.highest_qualification,edu.final_year,edu.percentage,edu.university,edu.other,edu.date_created,edu.date_updated,emp.user_id,emp.occupation,emp.start,emp.employer_details,emp.employment,emp.position,emp.income,emp.industry,emp.capacity from user as app  LEFT JOIN details as detail on app.id = detail.user_id LEFT JOIN educational as edu on  app.id = edu.user_id  LEFT JOIN employment as emp on app.id = emp.user_id where app.id="'.$id.'" ';
			

			$appdetail=$this->db->select('app.id, app.firstname,app.lastname,app.email,app.display_name,app.contact_no,app.email_verified,app.mobile_verified,app.date_created,app.delete_flag,app.update_by,app.update_date,app.admin_approval, detail.user_id, detail.salutation, detail.profile_pic, detail.banner_pic, detail.p_address, detail.p_city, detail.p_state, detail.p_pincode , detail.p_country , detail.tele_number, detail.tele_number, detail.t_address, detail.t_city,detail.t_country,detail.t_state,detail.t_pincode,detail.father_name,detail.mother_name,detail.mother_name,detail.date_of_birth,detail.status,detail.marital_status,detail.kin_details,detail.kin_city,detail.kin_pincode,detail.kin_state,detail.kin_country,edu.user_id,edu.highest_qualification,edu.final_year,edu.percentage,edu.university,edu.other,emp.user_id,emp.occupation,emp.start,emp.employer_details,emp.employment,emp.position,emp.income,emp.industry,emp.capacity')->from('user as app')->join('details as detail', 'app.id = detail.user_id', 'left')->join('educational as edu', 'app.id = edu.user_id', 'left')->join('employment as emp', 'app.id = emp.user_id', 'left')->where("app.id",$id)->get();
			$getappp = $appdetail->row_array();
			//print_r($getappp);
			return $getappp;
		}

		public function admin_details(){ 
			$getadmin=$this->session->userdata('admin');
			$detail=$this->db->query('SELECT * from admin where id="'.$getadmin['idadmin'].'"');
			$returnval=$detail->row_array();
			return $returnval;
			}
			public function update_details($admupdate){
			$getadmin=$this->session->userdata('admin');
				$this->db->where('id',$getadmin['idadmin']);
				$updates=$this->db->update('admin',$admupdate);
			}



// 			public function countrecruiter(){
// 			$this->db->where('delete_flag', 'N');
// 				$this->db->from('recruiter');
// 				$result=$this->db->count_all_results();
// 				return $result;
// 			}
// 			public function countapplicant(){
// 			$this->db->where('delete_flag', 'N');
// 			$this->db->from('user');
// 			$result1=$this->db->count_all_results();
// 			return $result1;
// 		}
// 		public function countevent(){
// 			$this->db->where('delete_flag', 'N');
// 			$this->db->from('events');
// 			$result1=$this->db->count_all_results();
// 			return $result1;
// 		}
			
			public function countapplicant(){
			$this->db->where('delete_flag', 'N');
			$this->db->from('user');
			$result1=$this->db->count_all_results();
			return $result1;
		}
		public function countevent(){
			$this->db->where('delete_flag', 'N');
			$this->db->from('events');
			$result1=$this->db->count_all_results();
			return $result1;
		}
		public function countblog(){
			$this->db->where('delete_flag', 'N');
			$this->db->from('blogs');
			$result1=$this->db->count_all_results();
			return $result1;
		}
// 		public function countjob(){
// 			$this->db->where('delete_flag', 'N');
// 			$this->db->from('jobs');
// 			$result12=$this->db->count_all_results();
// 			return $result12;
// 		}

// 		public function evntdashboard(){
// 			$currentdate=date('Y-m-d');
// 			$eventdas=$this->db->query('SELECT startdate,enddate,event_title,id FROM events where  delete_flag="N" and (startdate<="'.$currentdate.'"  and  enddate>="'.$currentdate.'") order by enddate asc ');
// 			$getresult = $eventdas->result_array();
// 			return $getresult;
// 		}

		public function contactus(){
				$contactuss=$this->db->query('SELECT * from contact_us order by id desc');
				$getresulttt=$contactuss->result_array();
				return $getresulttt;
		}

		public function adminnotification(){
			$getnotify=$this->db->query('SELECT * from admin_notification where status="N" order by id desc');
			$not=$getnotify->result_array();
			//print_r($getnotifys);
			return $not;
			
		}

		
		public function adminnotifycount(){
			$this->db->where('status', 'N');
			$this->db->from('admin_notification');
			$nott=$this->db->count_all_results();
			return $nott;
		}

		public function super_model(){
			$contactuss=$this->db->query('SELECT * from super_model order by id desc');
			$getresulttt=$contactuss->result_array();
			return $getresulttt;

		}

		public function terms_condition($id){
			$tercon=$this->db->query('SELECT * from terms_condition where id="'.$id.'"');
			$ress=$tercon->row_array();
			return $ress;
		}

		public function updatetermcon($termscon,$id){
			$this->db->where('id',$id);
			$termscon=$this->db->update(terms_condition,$termscon);
			return $termscon;

		}

		public function sub_catagory(){
			$query122=$this->db->query('SELECT * FROM event_type order by id desc');
			return $guer=$query122->result_array();
		}
		public function city(){
			$query=$this->db->query('SELECT * from states_city_country where city!="" GROUP BY city ');
			$city=$query->result_array();
			return $city;

		}
		public function addevents($data){
			$getadmin=$this->session->userdata('admin');
			$data['added_id']=$getadmin['idadmin'];
			$data['added_by']="admin";
			$this->db->insert('events',$data);
		}
		public function addteam($team){
			$this->db->insert('team',$team);
		}
		public function allteam(){
			$query=$this->db->query('SELECT * from team ORDER BY Id desc');
			$teams=$query->result_array();
			return $teams;
		}

		public function uteam($uteam,$idd){
			$this->db->where('id', $idd);
			$this->db->update('team',$uteam);

		}
		public function ourwork(){
		  $this->db->select('*');
		  $this->db->from('ourwork');
		  $this->db->where('delete_flag','N');
		  $this->db->order_by("id", "desc");
		  $query = $this->db->get();
		  return $getalldtat=$query->result_array();
		}
		public function addwork($ourwork){
			$this->db->insert('ourwork',$ourwork);
		}
		public function updatework($id,$updatework){
			$this->db->where('id', $id);
			$this->db->update('ourwork',$updatework);
		}
		public function updatebannerss($banner){
			
			$this->db->where('id', 1);
			$this->db->update('banner_image',$banner);
		}
		public function getbanner(){
			$this->db->select('*');
			$this->db->from('banner_image');
			$getbanner=$this->db->get();
			return $allbanner=$getbanner->row_array();
		}
		public function getvedio(){
			$this->db->select('*');
			$this->db->from('vedio_content');
			$getvedio=$this->db->get();
			return $contentvedio=$getvedio->row_array();
		}
		public function upvedios($veddata){
			$this->db->where('id', 1);
			$this->db->update('vedio_content',$veddata);
		}

		public function gethired_hire(){
			$this->db->select('*');
			$this->db->from('steps');
			$getstep=$this->db->get();
			return $showstep=$getstep->result_array();
		}

		public function updatehired_hire($steps,$stepid){
			$this->db->where('id', $stepid);
			$this->db->update('steps',$steps);
		}

		public function faq(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->order_by("id", "desc");
			$getfaq=$this->db->get();
			return $showfaq=$getfaq->result_array();
		}

		public function addfaq($faq){
			$this->db->insert('faq',$faq);
		}

		public function updatefaq($faq,$faqid){
			$this->db->where('id',$faqid);
			$this->db->update('faq',$faq);
		}

		public  function recentemp(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('recentemp');
			$this->db->order_by("id", "desc");
			$getrecemp=$this->db->get();
			return $showrecemp=$getrecemp->result_array();

		}
	public function validdroptwo($name,$type){
			$cond=array('Type'=>$type,'Name'=>$name,'Delete_Flag'=>'N','Form_type'=>'Form Two');
			$getname=$this->db->select('Name')->from('dropdown_profile')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function uprecentemp($recentempid,$recentemp){
			$this->db->where('id', $recentempid);
			$this->db->update('recentemp',$recentemp);
		}

		public  function usercontent(){
			// $this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('usercontent');
			$this->db->order_by("id", "asc");
			$getrecemp=$this->db->get();
			return $showrecemp=$getrecemp->result_array();

		}
		public function updateuser($userid,$userdata){
			$this->db->where('id', $userid);
			$this->db->update('usercontent',$userdata);
		}

		public function testimonals(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('testimonials');
			$this->db->order_by("id", "asc");
			$getrecemp=$this->db->get();
			return $showrecemp=$getrecemp->result_array();
		}
		public function addtest($test){
			$this->db->insert('testimonials',$test);
		}

		public function updatetest($id,$utest){
			$this->db->where('id', $id);
			$this->db->update('testimonials',$utest);
		}
		public function addrecemp($recentemp){
			$this->db->insert('recentemp',$recentemp);
		}

		public function aspcat(){
			$this->db->select('*');
			$this->db->from('category');
			$this->db->order_by("Category_Id", "desc");
			$getcat=$this->db->get();
			return $showcat=$getcat->result_array();
		}
		

		
		

		public function aspsubcat1(){
			
			$this->db->select('*');
			$this->db->from('sub_category');
			$appdetail=$this->db->order_by('Sub_Category_ID','desc')->get();
			return $showcat=$appdetail->result_array();
		}
		public function aspsubcat(){
		    $getdata=$this->db->select('*')
			->from('sub_category as sub')
			->join('cat_sub_cat_mapping as cscm','sub.Sub_Category_ID=cscm.	Sub_Category_ID','Inner')
			->join('sub_category as subcat','subcat.Sub_Category_ID=cscm.Sub_Category_ID','Inner')
			->join('category as cat','cat.Category_ID=cscm.Category_ID','Inner')
			->get()
			->result_array();
			return $getdata;
		}
		
	
		 
		public function getsubcatform($catid){
			
			$this->db->where('Sub_Category_ID',$catid);
			$this->db->select('*');
			$this->db->from('sub_category_basic_form');
			$query=$this->db->get();
			return $getform=$query->result_array();

		}

		public function getcatform($catid){
			$this->db->where('Category_ID',$catid);
			$this->db->select('*');
			$this->db->from('category_basic_form');
			$query=$this->db->get();
			return $getform=$query->result_array();

		}
		
			public function getallprofile(){
			//$getdata=$this->db->select('pro.PROFILE_NAME as profiles,pro.PROFILE_ID,temp.Profile_Name as temppro')
			$getdata=$this->db->select('pro.PROFILE_NAME,pro.ACTIVE_STATUS,pro.PROFILE_ID,cat.Category_Name,subcat.Sub_Category_Name')
			->from('profile as pro')
			->join('profile_form_mapping as pmap','pro.PROFILE_ID=pmap.PROFILE_ID','Inner')
			->join('sub_category as subcat','subcat.Sub_Category_ID=pmap.Sub_Category_ID','Inner')
			->join('category as cat','cat.Category_ID=pmap.Category_ID','Inner')
			->get()
			->result_array();
			return $getdata;
		}
		
		
		public function aspprofile(){
			$this->db->where('Category_ID',$catid);
			$this->db->select('*');
			$this->db->from('category_basic_form');
			$query=$this->db->get();
			return $getform=$query->result_array();
		}
		public function empprofile(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('employer_category');
			$this->db->order_by("id", "desc");
			$getcat=$this->db->get();
			return $showcat=$getcat->result_array();
		}

		public function addempcat($cat){
			$this->db->insert('employer_category',$cat);
		}

		
		public function updatemcat($cat,$uid){
			$this->db->where('id', $uid);
			$this->db->update('employer_category',$cat);
		}
        public function getvalidatep($cat,$subcat,$profile){
			$cond='';
			$cond.=' pro.ACTIVE_STATUS="Y" ';
			if($cat!=''){$cond.='and  cat.Category_Name="'.$cat.'" ';}
			if($subcat!=''){$cond.='and subcat.Sub_Category_Name = "'.$subcat.'" ';}
			if($profile!=''){$cond.='and pro.PROFILE_NAME="'.$profile.'"   ';}
			
			$getdata=$this->db->select('pro.PROFILE_NAME,pro.ACTIVE_STATUS,pro.PROFILE_ID,cat.Category_Name,subcat.Sub_Category_Name')
			->from('profile as pro')
			->join('profile_form_mapping as pmap','pro.PROFILE_ID=pmap.PROFILE_ID','INNER')
			->join('sub_category as subcat','subcat.Sub_Category_ID=pmap.Sub_Category_ID','INNER')
			->join('category as cat','cat.Category_ID=pmap.Category_ID','INNER')
			->where($cond)
			->get()
			->num_rows();
			
			return $getdata;
			
		}
		public function getvalidats($cat,$subcat){
			
			$cond='';
			$cond.=' cat.ACTIVE_STATUS="Y" ';
			if($cat!=''){$cond.='and  cat.Category_Name="'.$cat.'" ';}
			if($subcat!=''){$cond.='and subcat.Sub_Category_Name = "'.$subcat.'" ';}
			$getdata=$this->db->select('cat.Category_Name,subcat.Sub_Category_Name')
			->from('category as cat')
			->join('cat_sub_cat_mapping as map','map.Category_ID=cat.Category_ID','INNER')
			->join('sub_category as subcat','subcat.Sub_Category_ID=map.Sub_Category_ID','INNER')
			->where($cond)
			->get()
			->num_rows();
			return $getdata;
			echo $getdata;exit();
		}
		public function faqquery(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('faq_question_ask');
			$this->db->order_by("id", "desc");
			$getcat=$this->db->get();
			return $showcat=$getcat->result_array();
		}

		public function emailsend($email,$uid){
			$this->db->where('id', $uid);
			$this->db->update('faq_question_ask',$email);
		}

		public function getcat_id($tablename){
			$getid=$this->db->query('SELECT Category_Id from '.$tablename.' order by Category_Id desc Limit 0,1');
			return $showcat=$getid->row_array();
			
		}
		public function getsubcat_id($tablename){
			$getid=$this->db->query('SELECT Sub_Category_ID from '.$tablename.' order by Sub_Category_ID desc Limit 0,1');
			return $showcat=$getid->row_array();
			
		}

		public function addcat($cat){
			$this->db->insert('category',$cat);
		}
		public function addcatform($cat){
			$this->db->insert('category_basic_form',$cat);
		}
		
		public function getlastid($name){
			$this->db->where('Category_Name',$name);
			$this->db->select('Category_Id');
			$this->db->from('category');
			$this->db->order_by("Category_Id", "desc");
			$this->db->limit(1, 0);
			$getcat=$this->db->get();
			return $showcat=$getcat->row_array();
			
		}
		public function getcat(){
			
		}
		public function getprofileid($name){
			$this->db->where('PROFILE_NAME',$name);
			$this->db->select('PROFILE_ID');
			$this->db->from('profile');
			$getcat=$this->db->get();
			$showcat=$getcat->row_array();
			return $showcat['PROFILE_ID'];
		}

		public function checkcatname($name,$form){
			$que=$this->db->select("Category_Name")->from('category')->where('Category_Name',$name)->get()->num_rows();
			
			$condition=array('catform.Category_form'=>$form,'cta.Category_Name'=>$name);
			$quetwo=$this->db->select("catform.Category_form,cta.Category_ID,cta.Category_Name")->from('category as cta')->join('category_basic_form as catform','catform.Category_ID=cta.Category_ID','INNER')->where($condition)->get()->num_rows();
			//$que=$this->db->query("SELECT Category_Name from category where Category_Name='".$name."' ");
			$allques=array();
			$allques['name']=$que;
			$allques['formname']=$quetwo;
			return $allques;
		}

		public function checksubcatname($name,$fromname){
			//$que=$this->db->query("SELECT Sub_Category_Name from sub_category where Sub_Category_Name='".$name."' ");
			$quee=$this->db->select('Sub_Category_Name')->from('sub_category')->where('Sub_Category_Name',$name)->get()->num_rows();
			$condition=array('subform.Sub_Category_form'=>$fromname,'sub.Sub_Category_Name'=>$name);
			$formname=$this->db->select('subform.Sub_Category_form,subform.Sub_Category_ID,sub.Sub_Category_ID')->from('sub_category_basic_form as subform')->join('sub_category as sub','subform.Sub_Category_ID=sub.Sub_Category_ID')->where($condition)->get()->num_rows();
			$queries=array();
			$queries['quee']=$quee;
			$queries['formname']=$formname;
			return $queries;
		}

			

		public function getcatname($name){
			$this->db->where('Category_Id',$name);
			$this->db->select('Category_Name');
			$this->db->from('category');
			$getcat=$this->db->get();
			$showcat=$getcat->row_array();
			return $getname=$showcat['Category_Name'];
		}
			
		public function addsubcat($addsubcat){
			$this->db->insert('sub_category',$addsubcat);
		}

		public function addsubcatmapping($map){
			$this->db->insert('cat_sub_cat_mapping',$map);
		}
		public function getsubcatid($name){
			$this->db->where('Sub_Category_Name',$name);
			$this->db->select('Sub_Category_ID');
			$this->db->from('sub_category');
			$getcat=$this->db->get();
			$showcat=$getcat->row_array();
			return $getname=$showcat['Sub_Category_ID'];
		}

		public function addsubcatform($catforms){
			$this->db->insert('sub_category_basic_form',$catforms);
		}
		public function getsubcatname($name){
			
			$this->db->where('Sub_Category_ID',$name);
			$this->db->select('Sub_Category_Name');
			$this->db->from(' sub_category');
			$getcat=$this->db->get();
			$showcat=$getcat->row_array();
			return $getname=$showcat['Sub_Category_Name'];
		}

		public function checkprofile($name,$formname){
			$profile=array();
			$que=$this->db->select("PROFILE_NAME")->from('profile')->where('PROFILE_NAME',$name)->get()->num_rows();
			$condition=array('profile.PROFILE_NAME'=>$name,'profform.Profile_Form'=>$formname);
			$formname=$this->db->select('profile.PROFILE_ID,profile.PROFILE_NAME,profform.PROFILE_ID,profform.Profile_Form')->from('profile as profile')->join('profile_form_mapping as profform','profile.PROFILE_ID=profform.PROFILE_ID')->where($condition)->get()->num_rows();
			$profile['formname']=$formname;
			$profile['queone']=$que;
			return $profile;
		}
			
		public function addkeycat($key){
			$this->db->insert('key_category',$key);
		}
		public function addkeyprofile($key){
			$this->db->insert('key_profile',$key);
		}

		

		public function addprofile($cat){
			$this->db->insert('profile',$cat);
		}
		public function getprofile_id(){
			$this->db->select('PROFILE_ID');
			$this->db->from('profile');
			$this->db->order_by("PROFILE_ID", "desc");
			$this->db->limit(1, 0);
			$getcat=$this->db->get();
			return $showcat=$getcat->row_array();
			echo $showcat;

		}

		public function addprofform($proform){
			$this->db->insert('profile_form_mapping',$proform);
		}

		public function getprofileform($id){
			$query=$this->db->where('PROFILE_ID',$id)->select('*')->from('profile_form_mapping')->order_by("PROFILE_ID", "desc")->get();$getalldata=$query->result_array();
			return $getalldata;

		}
		public function getprofilename($id){
			$query=$this->db->where('PROFILE_ID',$id)->select('PROFILE_NAME')->from('profile')->order_by("PROFILE_ID", "desc")->get();$getalldata=$query->row_array();
			return $getalldata['PROFILE_NAME'];

		}
		public function subcontent(){
			$cond=array('sub.ACTIVE_STATUS'=>'Y','subcontent.type'=>'S');
			$getdata=$this->db->select('subcontent.ID,subcontent.Overview,subcontent.ACTIVE_FLAG,subcontent.Short_Image,subcontent.Long_Image,subcontent.RECORD_INSERTED_DTTM,subcontent.Text_On_Image,sub.Sub_Category_ID,sub.Sub_Category_Name,map.Category_ID,map.Sub_Category_ID,cat.Category_ID,cat.Category_Name')->from('sub_category as sub')->join('sub_cat_pofile_narration as subcontent','sub.Sub_Category_ID=subcontent.ID','INNER')->join('cat_sub_cat_mapping as map','map.Sub_Category_ID=sub.Sub_Category_ID','INNER')->join('category as cat','cat.Category_ID=map.Category_ID','INNER')->where($cond)->Group_by('map.Sub_Category_ID')->order_by('sub.Sub_Category_ID','desc')->get()->result_array();
			return $getdata;
			
		}
		public function subcatprofilecontent(){
			$this->db->select('*');
		  $this->db->from('sub_cat_narration');
		  $query = $this->db->get();
		  return $query->result_array();
		}
		public function catcontent(){
			$cond=array('cat.ACTIVE_STATUS'=>'Y','catcontent.type'=>'S');
			$getdata=$this->db->select('catcontent.ID,catcontent.sub_category1,catcontent.Image1,catcontent.ACTIVE_FLAG,catcontent.RECORD_INSERTED_DTTM,cat.Category_ID,
			cat.Category_Name')
			->from('category as cat')
			->join('category_description as catcontent','cat.Category_ID=catcontent.ID','INNER')
			->where($cond)->Group_by('catcontent.sub_category1')
			->order_by('cat.Category_ID','desc')->get()->result_array();
			return $getdata;
		}

		public function selectcat(){
			$getdata=$this->db->select('cat.Category_ID,cat.Category_Name,catcontent.ID')->from('category as cat')->join('category_description as catcontent','cat.Category_ID=catcontent.ID','LEFT')->get()->result_array();
			return $getdata;
		}
		public function selectcatt($name){
			$namess="Category_Name LIKE '%".$name."%'";
			$getdata=$this->db->select('Category_ID,Category_Name')->from('category')->where($namess)->get()->result_array();
			return $getdata;
		}
		public function selectsubcatt($name){
			$namess="Sub_Category_Name LIKE '%".$name."%'";
			$getdata=$this->db->select('Sub_Category_ID,Sub_Category_Name')->from('sub_category')->where($namess)->get()->result_array();
			return $getdata;
		}
		
		public function selectsubcat(){
			
			$getdata=$this->db->select('sub.Sub_Category_ID,sub.Sub_Category_Name,subcontent.ID')->from('sub_category as sub')->join('sub_cat_pofile_narration as subcontent','sub.Sub_Category_ID=subcontent.ID','LEFT')->get()->result_array();
			return $getdata;
		}
		public function addsubnarration($val){
			$this->db->insert('sub_cat_pofile_narration',$val);
		}
		public function addsubnarrationprofile($val){
			$this->db->insert('sub_cat_narration',$val);
		}
		public function updatesubnarrationprofile($id,$utest){
			$this->db->where('ID',$id);
			$this->db->update('sub_cat_narration',$utest);
		}
		public function addnarration($val){
			$this->db->insert('category_description',$val);
		}
		public function updatenarration($id,$utest){
			$this->db->where('ID',$id);
			$this->db->update('sub_cat_pofile_narration',$utest);
		}
		public function updatecatnarration($id,$utest){
			$this->db->where('sub_category1',$id);
			$this->db->update('category_description',$utest);
		}
		public function selectprofile(){
			$getdata=$this->db->select('*')->from('profile')->get()->result_array();
			return $getdata;
		}
		public function selectsubcatall($id){
			
		}

		public function subcontenttwo(){
			
			$cond=array('pro.ACTIVE_STATUS'=>'Y','subcontent.type'=>'P');
			$getdata=$this->db->select('pro.PROFILE_NAME,sub.Sub_Category_Name,sub.Sub_Category_ID,cat.Category_Name,map.PROFILE_ID,map.Category_ID,map.Sub_Category_ID,subcontent.ID,subcontent.Overview,subcontent.Positions_and_Responsibilities,subcontent.Qualifications,subcontent.How_To_Become,subcontent.ACTIVE_FLAG,subcontent.Short_Image,subcontent.Mid_Image,subcontent.Long_Image,subcontent.RECORD_INSERTED_DTTM,pro.PROFILE_ID,pro.PROFILE_NAME')->from('profile as pro')->join('sub_cat_pofile_narration as subcontent','pro.PROFILE_ID=subcontent.ID','INNER')->join('profile_form_mapping as map','map.PROFILE_ID=pro.PROFILE_ID','INNER')->join('category as cat','cat.Category_ID=map.Category_ID')->join('sub_category as sub','map.Sub_Category_ID=sub.Sub_Category_ID','INNER')->where($cond)->Group_by('map.PROFILE_ID')->order_by('pro.PROFILE_ID','desc')->get()->result_array();
			
			return $getdata;
		}
		
		public function language_known(){
			$cond=array('Type'=>'Language Known','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
			public function softwares(){
			$cond=array('Type'=>'Softwares','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
			public function previous_present_job_roles(){
			$cond=array('Type'=>'Previous Present Job Roles','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		
		public function functional_area(){
			$cond=array('Type'=>'Functional Area','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		
		public function functional_interest(){
			$cond=array('Type'=>'Functional Interest','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		
		public function skills(){
			$cond=array('Type'=>'Skill','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		
		public function google_certificate(){
			$cond=array('Type'=>'Google Certificate','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		
		public function client_work_with(){
			$cond=array('Type'=>'Clients Worked With','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}

public function other_ceritificate_courses(){
			$cond=array('Type'=>'Other Ceritificate Courses','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function hobbies(){
		$cond=array('Type'=>'Hobby','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;

		}
		public function specialization(){
			$cond=array('Type'=>'Specialization','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}


		public function addhobby($hobby){
			$this->db->insert('hobbies',$hobby);
		}
		public function updatehobby($hobby,$id){
			$this->db->where('Id',$id)->update('hobbies',$hobby);
		}

		public function validhobby($name){
			$cond=array('Hobby_Name'=>$name,'Delete_Flag'=>'N');
			$getname=$this->db->select('Hobby_Name')->from('hobbies')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function validinterest($name){
			$cond=array('Hobby_Name'=>$name,'Delete_Flag'=>'N');
			$getname=$this->db->select('Interest_Name')->from('interest')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function interest(){
		$cond=array('Type'=>'Interests','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function addinterest($add){
			$this->db->insert('interest',$add);
		}
		public function updateinterest($hobby,$id){
			$this->db->where('Id',$id)->update('interest',$hobby);
		}

		public function haircolor(){
			$cond=array('Type'=>'Hair Color','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}

		public function adddrop($haircolor){
			$this->db->insert('dropdown_profile',$haircolor);
		}

		public function validdrop($name,$type){
			$cond=array('Type'=>$type,'Name'=>$name,'Delete_Flag'=>'N','Form_type'=>'Form One');
			$getname=$this->db->select('Name')->from('dropdown_profile')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function addcategory($category){
			$this->db->insert('category',$category);
		}
		
		public function updatecatform($id,$catforms,$data){
			$this->db->where('Category_ID',$id)->update('category_basic_form',$catforms);
			$this->db->where('Category_ID',$id)->update('category',$data);
			
			
		}
		public function validcategory($name){
			$cond=array('Category_Name'=>$name);
			$getname=$this->db->select('Category_Name')->from('category')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function validprofile($name){
			$cond=array('PROFILE_NAME'=>$name);
			$getname=$this->db->select('PROFILE_NAME')->from('profile')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function updatedrop($haircolor,$id){
			$this->db->where('Id',$id)->update('dropdown_profile',$haircolor);
		}
		public function validsubcategory($name){
			$cond=array('Sub_Category_Name'=>$name);
			$getname=$this->db->select('Sub_Category_Name')->from('sub_category')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function addsubcategory($subcategory){
			$this->db->insert('sub_category',$subcategory);
		}
		public function complexion(){
			$cond=array('Type'=>'Complextion','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function eyecolor(){
			$cond=array('Type'=>'Eye Color','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function bodytype(){
			$cond=array('Type'=>'Body Type','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function bodyshape(){
			$cond=array('Type'=>'Body Shape','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function choiceofindustry(){
			$cond=array('Type'=>'Choice Of Industry','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}

		public function additionaldetailemploye(){
			$cond=array('Type'=>'Additional Details For Employers','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function preferred_platform(){
			$cond=array('Type'=>'Preferred Platform','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
			
		}

		public function preferred_genre(){
			$cond=array('Type'=>'Preferred Genre','Delete_Flag'=>'N','Form_Type'=>'Form Two');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		
		public function profileassigned(){
			
			$getall=$this->db->select('temp.HTML_Sample_Form,temp.ID,temp.Profile_Name,pro.PROFILE_Name as proname,pro.PROFILE_ID')->from('profile_temp as temp')->join('profile as pro','temp.Profile_Name=pro.PROFILE_ID','INNER')->get()->result_array();
			return $getall;
		}
		public function addprofilesss($profile){
			$this->db->insert('profile_temp',$profile);
			
		}
		function gettempid(){
			$getdata=$this->db->select('Profile_Name')->from('profile_temp')->get();
			return $showname=$getdata->result_array();
		}
		public function validprofilesss($proname){
			$cond=array('Hobby_Name'=>$name,'Delete_Flag'=>'N');
			$getname=$this->db->select('Profile_Name')->from('profile_temp')->where('Profile_Name',$proname)->get()->num_rows();
			return $getname;
		}
		public function updateprofilesss($profile,$id){
			$this->db->where('ID',$id)->update('profile_temp',$profile);
		}
		

		public function selectprofileform(){
		$getdata=$this->db->select('pro.PROFILE_NAME as profiles,pro.PROFILE_ID,temp.Profile_Name as temppro')->from('profile as pro')->join('profile_temp as temp','pro.PROFILE_NAME=temp.Profile_Name','LEFT')->Group_by('pro.PROFILE_NAME')->get()->result_array();
			return $getdata;
		}
		public function highesteducation(){
			$cond=array('Type'=>'Highest Education','Delete_Flag'=>'N','Form_Type'=>'Form One');
			$getall=$this->db->select('*')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
			return $getall;
		}
		public function profileSlider(){
			$getdata=$this->db->select('*')->from('profileslider')->get()->result_array();
			return $getdata;
		}
		public function addprofileslider($val){
			$this->db->insert('profileslider',$val);
		}
		public function validprofilebyid($id){
			$cond=array('ID'=>$id);
			$getname=$this->db->select('*')->from('profileslider')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function populartags(){
			$getdata=$this->db->select('*')->from('populartags')->get()->result_array();
			return $getdata;
		}
		public function addPopularTags($val){
			$this->db->insert('populartags',$val);
		}
		public function validpopulartagsbyid($id){
			$cond=array('ID'=>$id);
			$getname=$this->db->select('*')->from('populartags')->where($cond)->get()->num_rows();
			return $getname;
		}
		//get subcategory on the basis of category ID 
		public function getAllSubCategory($category_id){
			$subcat=$this->db->select('sub_category.Sub_Category_ID,Sub_Category_Name')
			->from('cat_sub_cat_mapping')
			->join('sub_category','sub_category.Sub_Category_ID = cat_sub_cat_mapping.Sub_Category_ID' )
			->where('Category_ID',$category_id)
			->get()->result_array();
			
			return $subcat;
		}
		//get profile on the basis of subcategory ID 
		public function getProfileData($sub_category_id){
			$profile=$this->db->select('profile.PROFILE_ID,profile.PROFILE_NAME')
			->from('profile_form_mapping')
			->join('profile','profile.PROFILE_ID = profile_form_mapping.PROFILE_ID' ,'inner')
			->where('Sub_Category_ID',$sub_category_id)
			->get()->result_array();
			
			return $profile;
		}
		// to validate category narration
		public function validcategorynarration($name){
			
			$cond=array('sub_category1'=>$name);
			$getname=$this->db->select('*')->from('category_description')->where($cond)->get()->num_rows();
			return $getname;
		}
		public function validateprofilenarration($id){
			$cond=array('ID'=>$id);
			$getname=$this->db->select('*')->from('sub_cat_pofile_narration')->where($cond)->get()->num_rows();
			return $getname;
		}
		
}