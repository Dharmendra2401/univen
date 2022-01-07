<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Recruiter_model extends CI_Model {

    public function authfalse(){
   
        $getrecruiter=$this->session->userdata('recruiter');
        if(!empty($getrecruiter)){
            redirect(base_url().'recruiter/index');
            return false;
        }
        }

        public function authtrue(){
            $getrecruiter=$this->session->userdata('recruiter');
            if(empty($getrecruiter)){
                redirect(base_url().'recruiter/login');
                return true;
            }
        }

        public function delete($id,$table){
            if($table=='events'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}


        }


        public function checkcrediential($email,$password){
            //$passwordss=$this->encrypt->decode($password);
            $querry=$this->db->query('SELECT id,email,password from recruiter where email="'.$email.'" and password like binary "'.$password.'" and email_verified="Y" ');
            $querrry=$querry->row_array();
            return  $querrry;

        }
    
        public function profile(){
            $query=$this->db->query('SELECT * from profiles where delete_flag="N"');
            $resultt=$query->result_array();
            return $resultt;
        }

        public function jobcount(){
            $query=$this->db->query('SELECT profile_ids from jobs');
            $resultjob=$query->result_array();
            return $resultjob;
           
        } 



        public function getrecruiterprofile(){
            $getrecruiter=$this->session->userdata('recruiter');
            $query=$this->db->query('SELECT * from recruiter where id="'.$getrecruiter['recid'].'"');
            $recruiter=$query->row_array();
            return $recruiter;
           
        }

        public function jobs_list(){
            $getrecruiter=$this->session->userdata('recruiter');
            $query=$this->db->query('SELECT j.*,count(ja.job_id) as app_count FROM jobs as j LEFT join job_applications as ja ON j.id=ja.job_id GROUP BY 1 HAVING j.recruiter_id="'.$getrecruiter['recid'].'"');
            $resultjob=$query->result_array();
            // $getarray=$resultt+$resultjob;
            return $resultjob;
        }

        public function alljobs(){
            $getrecruiter=$this->session->userdata('recruiter');
            $alljobs=$this->db->query('select * from jobs where recruiter_id="'.$getrecruiter['recid'].'" ');
            return $getrec=$alljobs->result_array();
        }

        public function addjob($job){
            $addjob=$this->db->insert('jobs',$job);
            $insert_id = $this->db->insert_id();
            $addnotification=$this->db->query('INSERT into admin_notification (type_id,type)values("'.$insert_id.'","job") ');
            return $addjob;
        }

        public function jobs_details($id){
            //$update=$this->db->query('UPDATE admin_notification set status="Y" where type_id="'.$id.'"  ');
            $details = $this->db->query('SELECT job.title,job.date_created,job.date_updated,job.old_type,job.profile_ids,job.id,job.recruiter_id,job.profile_ids,job.old_title,job.old_content,job.location,job.old_location,job.date_created,job.admin_approval,job.delete_flag,job.update_by,rec.firstname,rec.lastname,rec.company_name FROM recruiter as rec INNER JOIN jobs as job where job.recruiter_id=rec.id and job.delete_flag="N" and job.id="'.$id.'"  ');
            $query=$this->db->query('Update recruiter_notification set read_status="Y" where type_id="'.$id.'"');
            $detail = $details->row_array();
            return $detail;
        }

        public function city(){
            $query=$this->db->query('SELECT * from states_city_country where city!="" GROUP BY city ');
            $city=$query->result_array();
            return $city;

        }

        public function getapp(){
            $app=$this->db->query('SELECT id from user where delete_flag="N" ');
            $getapp=$app->result_array();
            return $getapp;

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

        public function load_all_jobs($rowno,$rowperpage){
            $getall=$this->db->query('SELECT pro.user_id,pro.profile_id,us.id,us.firstname,us.lastname,det.profile_pic from details as det RIGHT JOIN user as us on us.id=det.user_id RIGHT JOIN user_profiles as pro on pro.user_id=us.id where us.delete_flag="N" and pro.profile_id!="" GROUP BY det.user_id  ');
            $this->db->limit($rowperpage, $rowno); 
            $getalljobs=$getall->result_array();
            return $getalljobs;
        }

      // Fetch records
	public function getData($rowno,$rowperpage) {
        
        $getall=$this->db->query('SELECT pro.user_id,pro.profile_id,us.id,us.firstname,us.lastname,det.profile_pic from details as det RIGHT JOIN user as us on us.id=det.user_id RIGHT JOIN user_profiles as pro on pro.user_id=us.id where us.delete_flag="N" and pro.profile_id!="" GROUP BY det.user_id  limit '.$rowperpage.','.$rowno);
        $getalljobs=$getall->result_array();
        return $getalljobs;
	}

	// Select total records
    public function getrecordCount($search) {
        $stat="";
            if($search['profile']!=''){
                $stat.='and pro.profile_id IN('.$search['profile'].')';
            }
            if($search['city']!=''){
                $stat.='and '.$search['city'];
            }
        $getall=$this->db->query('SELECT pro.user_id,pro.profile_id,us.id,us.firstname,us.lastname,det.profile_pic from details as det RIGHT JOIN user as us on us.id=det.user_id RIGHT JOIN user_profiles as pro on pro.user_id=us.id where us.delete_flag="N" and pro.profile_id!="" '.$stat.' GROUP BY det.user_id  ');
      	$result = $getall->num_rows();
      	return $result;
    }


        public function count_all_jobs(){
            $getall=$this->db->query('SELECT pro.user_id,pro.profile_id,us.id,us.firstname,us.lastname,det.profile_pic from details as det RIGHT JOIN user as us on us.id=det.user_id RIGHT JOIN user_profiles as pro on pro.user_id=us.id where us.delete_flag="N" and pro.profile_id!="" GROUP BY det.user_id  ');
            $getalljobs=$getall->num_rows();
            return $getalljobs;
        }

        public function load_all_profile(){
            $querry123=$this->db->query('SELECT * from profiles where delete_flag="N" ');
            $getallprofile=$querry123->result_array();
            return $getallprofile;
        }

        public function search_all_jobs($rowno,$rowperpage,$search){
            $stat="";
            if($search['profile']!=''){
                $stat.='and pro.profile_id IN('.$search['profile'].')';
            }
            if($search['city']!=''){
                $stat.='and '.$search['city'];
            }
           
            $getall=$this->db->query('SELECT pro.user_id,pro.profile_id,us.id,us.firstname,us.lastname,det.profile_pic,det.t_city from details as det RIGHT JOIN user as us on us.id=det.user_id RIGHT JOIN user_profiles as pro on pro.user_id=us.id where us.delete_flag="N" and pro.profile_id!="" '.$stat.' GROUP BY det.user_id limit '.$rowperpage.','.$rowno);
            $getalljobs=$getall->result_array();
            return $getalljobs;
            
        }

        function view_applicant_details($id){
            
            $appdetails=$this->db->query('SELECT emp.occupation,emp.capacity,emp.industry,us.id,ed.highest_qualification,ed.final_year,ed.percentage,ed.university,ed.other, us.firstname,us.lastname,us.email,us.display_name,us.contact_no,det.profile_pic,det.t_city,det.marital_status,det.tele_number from details as det LEFT JOIN user as us on us.id=det.user_id LEFT JOIN educational as ed on ed.user_id=us.id LEFT JOIN employment as emp on emp.user_id=us.id  where us.id="'.$id.'"');
            $getappdetails=$appdetails->row_array();
            return $getappdetails;
        }

        function user_profile($id){
            $getpro=$this->db->query('SELECT pro.name,us.profile_id FROM  user_profiles as us RIGHT JOIN profiles as pro on us.profile_id=pro.id where user_id  IN ('.$id.') and pro.delete_flag="N"');
            $getprofile=$getpro->result_array();
            return $getprofile;
        }

        function profiless(){
            $getrecruiter=$this->session->userdata('recruiter');
            $getrec=$this->db->query('SELECT rec.*,recset.* from  recruiter as rec LEFT JOIN recruiter_setting as recset on rec.id=recset.recruiter_id where rec.id="'.$getrecruiter['recid'].'"');
            $getresults=$getrec->row_array();
            return $getresults;
        }

        function rec_cat(){
            $cat=$this->db->query('SELECT * FROM recruiter_category where delete_flag="N"');
            $getcat=$cat->result_array();
            return  $getcat;
        }

        function company_type(){
            $ctype=$this->db->query('SELECT * FROM type_company where delete_flag="N"');
            $getctype=$ctype->result_array();
            return  $getctype;
        }

        public function updaterec($rec){
            $getrecruiter=$this->session->userdata('recruiter');
            $this->db->where('id',$getrecruiter['recid']);
            $getout=$this->db->update('recruiter',$rec);
            return $getout;
        }
       
        public function checkpassword($id,$password){
            $querry=$this->db->query('SELECT id,email,password from recruiter where password="'.$password.'" and id="'.$id.'"');
            $querrry=$querry->num_rows();
            return  $querrry;

        }

        public function updaterecpass($passw){
            $getrecruiter=$this->session->userdata('recruiter');
            $this->db->where('id',$getrecruiter['recid']);
            $getoutt=$this->db->update('recruiter',$passw);
            return $getoutt;
        }
        public function updatesettings($sendupdates){
            $getrecruiter=$this->session->userdata('recruiter');
            $sendupdates['recruiter_id']=$getrecruiter['recid'];
            $getcount=$this->db->query('SELECT recruiter_id from recruiter_setting where recruiter_id="'.$getrecruiter['recid'].'"');
            $countsssss=$getcount->num_rows();
            
            if($countsssss==0){
                $addjob=$this->db->insert('recruiter_setting',$sendupdates);
                echo "true";
            }
            else if($countsssss==1){
                $this->db->where('recruiter_id',$sendupdates['recruiter_id']);
                $insert=$this->db->update('recruiter_setting',$sendupdates);
                echo "true";

            }else{
                echo "false";
            }


        }


        public function update($jobs){
            $this->db->where('id',$jobs['id']);
            $this->db->update('jobs',$jobs);
        }


        public function getsettings(){
            $getrecruiter=$this->session->userdata('recruiter');
            $sendupdates['recruiter_id']=$getrecruiter['recid'];
            $this->db->where('recruiter_id',$sendupdates['recruiter_id']);
            $query=$this->db->select('user_setting');
            return $query;
        }

        public function notification(){
            $getrecruiter=$this->session->userdata('recruiter');
            $recid=$getrecruiter['recid'];
            $query=$this->db->query('select *,count(session_id) as alljobs from recruiter_notification where session_id="'.$recid.'" and read_status="N" group by id order by date desc');
            return $getalldata= $query->result_array();
            return $getalldata;
        }
        public function countnotification(){
            $getrecruiter=$this->session->userdata('recruiter');
            $recid=$getrecruiter['recid'];
            $query=$this->db->query('select *,count(session_id) as alljobs from recruiter_notification where session_id="'.$recid.'" and read_status="N" group by id order by date desc');
            return $getalldata= $query->num_rows();
        }

        public function evntdashboard(){
            $currentdate=date('Y-m-d');
            $eventdas=$this->db->query('SELECT startdate,enddate,event_title,id FROM events where  delete_flag="N" and (startdate<="'.$currentdate.'"  and  enddate>="'.$currentdate.'") order by enddate asc ');
            $getresult = $eventdas->result_array();
            return $getresult;
        }


        public function events(){
            $artist = $this->db->query('SELECT * FROM  event_category where active="N" order by id desc');
            $artist = $artist->result_array();
            return $artist;
        }

        public function view_events(){
            $getrecruiter=$this->session->userdata('recruiter');
            $recid=$getrecruiter['recid'];
            $eventslist= $this->db->query('SELECT * FROM  events where delete_flag="N" and added_by="recruiter" and added_id="'.$recid.'" order by id desc');
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
            $this->db->query('Update recruiter_notification set read_status="Y" where type_id="'.$id.'"  ');
            return $query122;
        }

        public function catagory(){
            $query122=$this->db->query('SELECT * FROM event_category order by id desc');
            return $guer=$query122->result_array();
        }

        public function sub_catagory(){
            $query122=$this->db->query('SELECT * FROM event_type order by id desc');
            return $guer=$query122->result_array();
        }

        public function addevents($data){
            $getrecruiter=$this->session->userdata('recruiter');
            $data['added_id']=$getrecruiter['recid'];
            $data['added_by']="recruiter";
            $this->db->insert('events',$data);
            $insert_id = $this->db->insert_id();
            $this->db->query('insert into admin_notification (status,date,type,session_id,type_id)values("N","'.$data['date_created'].'","event","'.$data['added_id'].'","'.$insert_id.'")');
            
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

}