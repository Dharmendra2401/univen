<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->model('Recruiter_model');
        $this->load->view('library/upload.php');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->library('pagination');
        $this->load->library('encryption');
       
   
       
      }

      
	function thumb($width,$height,$imageurl2,$name)
	{
        
		$config['upload_path']          = $imageurl2;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		//$config['max_size']      = 200;
		$config['width'] = $width;
		$config['height'] =$height;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);	
	}

      public function load_table(){
		$loadpage=$_REQUEST['loadpage'];
        $model=$_REQUEST['model'];
		$row=$this->Recruiter_model->$model();
        $row['row']=$row;
		//$mergedata=array_merge_recursive($notify,$row);
		$this->load->view('templates/recruiter/'.$loadpage,$row);
    }
    public function load_tablejobs(){
		$loadpage=$_REQUEST['loadpage'];
        $model=$_REQUEST['model'];
        $row=$this->Recruiter_model->$model();
        $pro=$this->Recruiter_model->profile();
        $row['row']=$row;
        $profiles['prof']=$pro;
		$mergedata=array_merge_recursive($row,$profiles);
		$this->load->view('templates/recruiter/'.$loadpage,$mergedata);
    }
 
   

    public function load_tabletwo(){

		$loadpage=$_REQUEST['loadpage'];
        $model=$_REQUEST['model'];
        $search=array();
        $search['city']=$_REQUEST['city'];
        $search['profile']=$_REQUEST['profile'];
        $ctytget='';
        foreach( $search['city'] as $ctytwo){
            $ctytget.=" det.t_city LIKE '%".$ctytwo."%' OR ";
        }
        $ctytprofile='';
        foreach( $search['profile'] as $profiletwo){
            $profget.=$profiletwo.',';
        }
         $search['profile']=rtrim($profget,',');
         $search['city']=rtrim($ctytget,' OR ');
        if(($search['profile']!='')|| ($search['city']!='')){
            $row=$this->Recruiter_model->search_all_jobs($search);
        }
        else{
            $row=$this->Recruiter_model->load_all_jobs();
        }
		$row['row']=$row;
		//$mergedata=array_merge_recursive($notify,$row);
		$this->load->view('templates/recruiter/load_all_jobs.php',$row);
	}

    public function logout(){
        $this->session->unset_userdata('recruiter');
		$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Logout Successfull!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/login');
      }

    public  function login(){
        $this->Recruiter_model->authfalse();
        if($this->input->post('submit')){
            $password = md5($this->input->post('password'));
            $email=$this->input->post('email');
            $check=$this->Recruiter_model->checkcrediential($email,$password);
            if($check!=''){
                $sessArray['recid']= $check['id'];
                $sessArray['recemail']= $check['email'];
                $this->session->set_userdata('recruiter',$sessArray);
                redirect(base_url().'recruiter/index');
            }else{
                $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Invalid email and password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/login');
            }
        }
        $this->load->view('templates/recruiter/login.php');
    }

    public function index(){
        $this->Recruiter_model->authtrue();
        $rows=$this->Recruiter_model->profile();
        $count=$this->Recruiter_model->jobcount();
        $getrec=$this->Recruiter_model->getrecruiterprofile();
        $allapp=$this->Recruiter_model->getapp();
        $getevent=$this->Recruiter_model->evntdashboard();
        
        $row['row']=$rows;
        $countt['countt']=$count;
        $getrecc['getrecc']= $getrec;
        $allappp['allappp']=$allapp;
        $geteventt['geteventt']=$getevent;
        $rowss=array_merge_recursive($row,$countt,$getrecc,$allappp,$geteventt);
        $this->load->view('templates/recruiter/dashboard.php',$rowss);
    }

    public function job_list(){
        $this->Recruiter_model->authtrue();
        $rows=$this->Recruiter_model->jobs_list();
        $profile=$this->Recruiter_model->profile();
        $city=$this->Recruiter_model->city();
        $profiles['profiles']=$profile;
        $row=array();
        $row['row']=$rows;
        $cityy['cityy']=$city;
        $getdata=array_merge_recursive($row,$profiles,$cityy);
        
           
           

    

        if($this->input->post('add')){
            trim($this->form_validation->set_rules('profile[]','profile','required'));
            trim($this->form_validation->set_rules('jobtype','jobtype','required'));
            trim($this->form_validation->set_rules('title','title','required'));
            trim($this->form_validation->set_rules('city[]','city','required'));
            
            trim($this->form_validation->set_rules('lastdate','lastdate','required'));
            trim($this->form_validation->set_rules('desc','desc','required'));

            if($this->form_validation->run()==true){
            $getrecruiter=$this->session->userdata('recruiter');
                $job=array();
                $job['type']=trim($this->input->post('jobtype'));
                $job['old_title']=trim($this->input->post('title'));
                $job['title']=trim($this->input->post('title'));
                $job['last_date']=trim($this->input->post('lastdate'));
                $job['content']=trim($this->input->post('desc'));
                $job['old_content']=trim($this->input->post('desc'));
                $profiles=$_POST['profile'];
                $getprofile='';
                if($profiles!=''){
                    foreach ($_POST['profile'] as $prof){
                      $getprofile.=$prof.',';
                }}
                $cityies=$_POST['city'];;
                $getcity='';
                if($cityies!=''){
                    foreach ($_POST['city'] as $tar_value){
                      $getcity.=$tar_value.',';
                }}
                
                $job['profile_ids']=rtrim($getprofile,',');
                $job['location']= rtrim($getcity,',');
                
                $job['recruiter_id']=$getrecruiter['recid'];
                $job['date_created']=date('Y-m-d h:i:s');
                $this->Recruiter_model->addjob($job);
                $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record successfully added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/job_list');

            } 
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/job_list');

        }

        
        if($this->input->post('update')){

            trim($this->form_validation->set_rules('uprofile[]','profile','required'));
            trim($this->form_validation->set_rules('utype','jobtype','required'));
            trim($this->form_validation->set_rules('utitle','title','required'));
            trim($this->form_validation->set_rules('ucity[]','city','required'));
            trim($this->form_validation->set_rules('uid','uid','required'));
            trim($this->form_validation->set_rules('ulastdate','lastdate','required'));
            trim($this->form_validation->set_rules('ucontents','description','required'));
            if($this->form_validation->run()==true){
                $getrecruiter=$this->session->userdata('recruiter');
                $jobs=array();
                $jobs['id']=trim($this->input->post('uid'));
                $jobs['type']=trim($this->input->post('utype'));
                $jobs['old_title']=trim($this->input->post('utitle'));
                $jobs['title']=trim($this->input->post('utitle'));
                $jobs['last_date']=trim($this->input->post('ulastdate'));
                $jobs['content']=trim($this->input->post('ucontents'));
                $jobs['old_content']=trim($this->input->post('ucontents'));
                $jobs['update_by']=$getrecruiter['recid'];
                $jobs['date_updated']=date('Y-m-d h:i:m');
               
                $pro=$_POST['uprofile'];
                $getprofile='';
                if($pro!=''){
                    foreach ($_POST['uprofile'] as $prof){
                      $getprofile.=$prof.',';
                }}
                $ucityies=$_POST['ucity'];;
                $getcity='';
                if($ucityies!=''){
                    foreach ($_POST['ucity'] as $tar_value){
                      $getcity.=$tar_value.',';
                }}
                
                $jobs['profile_ids']=rtrim($getprofile,',');
                $jobs['location']= rtrim($getcity,',');
                $jobs['date_created']=date('Y-m-d h:i:s');
                $this->Recruiter_model->update($jobs);
                $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record successfully added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/job_list');

            } $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/job_list');
            

        }

        $this->load->view('templates/recruiter/job_list.php',$getdata);

    }

    function view_job(){
        $this->Recruiter_model->authtrue();
        $id=base64_decode($_REQUEST['token']);
        $getdetails=$this->Recruiter_model->jobs_details($id);
        $getprofile=$this->Recruiter_model->getprofile($getdetails['profile_ids']);
        $getapp=$this->Recruiter_model->applicant($getdetails['id']);
        $getp['getp']=$getprofile;
        $profile['profile']=$getdetails;
        $getappp['getappp']=$getapp;
        $getall=array_merge_recursive($getp,$profile,$getappp);
        $this->load->view('templates/recruiter/view_job.php',$getall);

    }

    function search_talent(){
        $this->Recruiter_model->authtrue();
        $name=array();
        $getprofile=$this->Recruiter_model->load_all_profile();
        $getcity=$this->Recruiter_model->city();
        $name['name']=base64_decode($_REQUEST['name']);
        $getprofiles['getprofiles']=$getprofile;
        $city['city']=$getcity;
        $getall=array_merge_recursive($getprofiles,$city,$name);
        $this->load->view('templates/recruiter/search_talent.php',$getall);
    }

    public function view_app_detail(){
        $this->Recruiter_model->authtrue();
        $id=base64_decode($_REQUEST['token']);
        $row=$this->Recruiter_model->view_applicant_details($id);
        $pro=$this->Recruiter_model->user_profile($id);
        $rows['rows']=$row;
        $profiles['profiles']=$pro;
        $getall=array_merge_recursive($rows,$profiles);
        $this->load->view('templates/recruiter/view_app_detail.php',$getall);
        
    }

    public function profile(){
    $this->Recruiter_model->authtrue();
    
    $getdetail=$this->Recruiter_model->profiless();
    $getcat=$this->Recruiter_model->rec_cat();
    $company=$this->Recruiter_model->company_type();
    
    $row['row']=$getdetail;
    $cat['cat']=$getcat;
    $comp['comp']=$company;
    $getall=array_merge_recursive($row,$cat,$comp);
    $this->load->view('templates/recruiter/profile.php',$getall);
    if($this->input->post('updateprofile')){

            trim($this->form_validation->set_rules('iam','iam','required'));
            trim($this->form_validation->set_rules('company','company','required'));
            trim($this->form_validation->set_rules('firstname','firstname','required'));
            trim($this->form_validation->set_rules('lastname','lastname','required'));
            trim($this->form_validation->set_rules('pemail','pemail','required'));
            trim($this->form_validation->set_rules('mobile','mobile','required'));
            trim($this->form_validation->set_rules('companyname','companyname','required'));
            trim($this->form_validation->set_rules('regno','regno','required'));
            trim($this->form_validation->set_rules('gstno','gstno','required'));
            trim($this->form_validation->set_rules('address','address','required'));

            $oldimage=$this->input->post('oldimage');
            if($this->form_validation->run()==true){
                
                $image=$_FILES["companylogo"]["name"];
                if($image!=''){
                $ext=explode(".",$_FILES["companylogo"]["name"]);
                $newext=str_replace(" ","",sha1($_FILES["companylogo"]["name"].time()).".".$ext[sizeof($ext)-1]);
                $urlimage="./uploads/recruiter/logo/".$newext;
                move_uploaded_file($_FILES["companylogo"]["tmp_name"],$urlimage);
                //unlink($urlimage);
                $thumb_path= $urlimage;
                $max_dim = 300;
                createResized($urlimage, $thumb_path, $max_dim);
                unlink('./uploads/recruiter/logo/'.$oldimage);	
                }else{
                    $newext=$oldimage;
                }
               $rec=array();
               $rec['category']=trim($this->input->post('iam'));
               $rec['company']=trim($this->input->post('company'));
               $rec['firstname']=trim($this->input->post('firstname'));
               $rec['lastname']=trim($this->input->post('lastname'));
               $rec['contact_no']=$this->input->post('mobile');
               $rec['company_name']=trim($this->input->post('companyname'));
               $oldimagestwo=$this->input->post('oldimagestwo');
               $olreg=$this->input->post('doc1');
               $oldpan=$this->input->post('doc2');
               $oldgst=$this->input->post('doc3');
               
               $allimages=$_POST['allimages'];
               $idproof=$_POST['idproof'];
               $regdoc=$_FILES["idfile1"]["name"];
               $pandoc=$_FILES["idfile2"]["name"];
               $adhardoc=$_FILES["idfile3"]["name"];
               $gstdoc=$_FILES["idfile4"]["name"];
              

                  
                
                            $file_nameeee=$_FILES["idfile1"]["name"];
                            $file_tmpssss=$_FILES["idfile1"]["tmp_name"];
                            if($file_nameeee!=''){
                             
                            $ext=explode(".",$file_nameeee);
                            $newextt=str_replace(" ","",sha1($file_nameeee.time()).".".$ext[sizeof($ext)-1]);
                            $urlimageee="./uploads/recruiter/idproof/".$newextt;
                            
                            move_uploaded_file($file_tmpssss,$urlimageee);
                            $thumb_pathh= $urlimageee;
                            $max_dimm = 500;
                            createResized($urlimageee, $thumb_pathh, $max_dimm);
                            $regimage= $newextt; 
                            unlink('./uploads/recruiter/idproof/'.$olreg);
                            }else{
                            $regimage=$olreg;
                            }
                            
                            $file_names=$_FILES["idfile2"]["name"];
                            $file_tmpp=$_FILES["idfile2"]["tmp_name"];
                            if($file_names!=''){
                            $ext=explode(".",$file_names);
                            $newexttt=str_replace(" ","",sha1($file_names.time()).".".$ext[sizeof($ext)-1]);
                            $urlimages="./uploads/recruiter/idproof/".$newexttt;
                            move_uploaded_file($file_tmpp,$urlimages);
                            
                            $max_dimm = 500;
                            createResized($urlimages, $urlimages, $max_dimm);
                            $panimage= $newexttt; 
                           
                            unlink('./uploads/recruiter/idproof/'.$oldpan);
                            }else{
                            $panimage=$oldpan;
                            }
                            

                            $file_namess=$_FILES["idfile3"]["name"];
                            $file_tmppp=$_FILES["idfile3"]["tmp_name"];
                            if($file_namess!=''){
                            $ext=explode(".",$file_namess);
                            $newextttt=str_replace(" ","",sha1($file_namess.time()).".".$ext[sizeof($ext)-1]);
                            $urlimagess="./uploads/recruiter/idproof/".$newextttt;
                            move_uploaded_file($file_tmppp,$urlimagess);
                            $max_dimm = 500;
                            createResized($urlimagess, $urlimagess, $max_dimm);
                            $gstimage= $newextttt; 
                            unlink('./uploads/recruiter/idproof/'.$oldgst);
                            }else{
                            $gstimage=$oldgst;
                            }
                            $getfilenamess=$regimage.','.$panimage.','.$gstimage;
                            
                            
               $rec['pan']=trim($this->input->post('panno'));
               $rec['gst']=trim($this->input->post('gstno'));
               $rec['address']=trim($this->input->post('address'));
               $rec['purpose']=trim($this->input->post('Purpose'));
               $rec['other']=trim($this->input->post('otherdetail'));
               $rec['registration_no']=trim($this->input->post('regno'));
               $rec['id_proof_image']=rtrim($getfilenamess);
               $rec['id_proof']=rtrim($getallid,',');
               $rec['company_logo']=$newext;
               $this->Recruiter_model->updaterec($rec);
               $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Profile updtated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/profile');


            }else{
                $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/profile');

            }


        
    }
    if($this->input->post('passupdate')){
        $getrecruiter=$this->session->userdata('recruiter');
        trim($this->form_validation->set_rules('oldpassword','oldpassword','required'));
        trim($this->form_validation->set_rules('newpassword','newpassword','required'));
        trim($this->form_validation->set_rules('confirmpassword','confirmpassword','required'));
        if($this->form_validation->run()==true){
            $newpassword=trim($this->input->post('newpassword'));
            $cpassword=trim($this->input->post('confirmpassword'));
            if($newpassword==$cpassword){
                $passw=array();
                $passw['password']=md5($cpassword);
                $this->Recruiter_model->updaterecpass($passw);
               $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Profile updtated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/profile');

            }

        }
        
        
    }
    

    }

    public function chekpass(){
        $getrecruiter=$this->session->userdata('recruiter');
        $id=$getrecruiter['recid'];
        $password=md5($_REQUEST['password']);
        $query=$this->Recruiter_model->checkpassword($id,$password);
       if($query==1){
           echo "true";
       }else{
        echo "false";
       }

    }

    public function updatesettings(){
       
        $sendupdates=array();
        if($_REQUEST['sendemail']=='Y'){$sendupdates['send_new_message']=$_REQUEST['sendemail'];}
        else{$sendupdates['send_new_message']='N';}
        if($_REQUEST['statistics']=='Y'){$sendupdates['weekly_statistics']=$_REQUEST['statistics'];}
        else{$sendupdates['weekly_statistics']='N';}
        if($_REQUEST['profilesettings']=='Y'){$sendupdates['hide_profile']=$_REQUEST['profilesettings'];}
        else{$sendupdates['hide_profile']='N';}
        if($_REQUEST['jobsettings']=='Y'){$sendupdates['application_mail']=$_REQUEST['jobsettings'];}
        else {$sendupdates['application_mail']='N';}
        $this->Recruiter_model->updatesettings($sendupdates);
    }

    public function top_head(){
        $getdetails=$this->Recruiter_model->profiless();
        $det['det']=$getdetails;
        echo json_encode($det);
    }

    public function getsettings(){
        $getupdates=$this->Recruiter_model->getsettings();
        $messdata['messdata']=$getupdates;
        echo json_encode($messdata);
    }

    // Read cookie
	
    public function getPaginationposition(){
        $pageno = 0;
		if($this->input->cookie('pageno') != null){
            //$pageno =$this->input->cookie('pageno');
            $pageno =$this->input->post('pageno');
		}
		echo $pageno;
	}
	public function loadRecords($rowno=0){
        // Row per page
        $search=array();
        $search['city']=$_REQUEST['city'];
        $search['profile']=$_REQUEST['profile'];
        $ctytget='';
        foreach( $search['city'] as $ctytwo){
        $ctytget.=" det.t_city LIKE '%".$ctytwo."%' OR ";
        }
        $ctytprofile='';
        foreach( $search['profile'] as $profiletwo){
            $profget.=$profiletwo.',';
        }
        $search['profile']=rtrim($profget,',');
        $search['city']=rtrim($ctytget,' OR ');
		$rowperpage = 12;
		// Set cookie
      	$cookie= array('name'   => 'pageno','value'  => $rowno,'expire' => 7200);
		// Row position
		if($rowno!= 0){
			$rowno = ($rowno-1) * $rowperpage;
		}
          // All records count
      	$allcount = $this->Recruiter_model->getrecordCount($search);
      	$config['base_url'] =base_url().'recruiter/loadRecords';
      	$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
        $data['row'] = $rowno;
        $data['rowperpage']=$rowperpage;
        echo json_encode($data);
        
        
        // print_r($data);
		
	}
    
    public function getalljobs(){
        $allcount='';
        $rowperpage=$_REQUEST['rowperpage'];
        $rowno=$_REQUEST['rowno'];
        $search=array();
        $search['city']=$_REQUEST['city'];
        $search['profile']=$_REQUEST['profile'];
        $ctytget='';
        foreach( $search['city'] as $ctytwo){
            $ctytget.=" det.t_city LIKE '%".$ctytwo."%' OR ";
        }
        $ctytprofile='';
        foreach( $search['profile'] as $profiletwo){
            $profget.=$profiletwo.',';
        }
        $search['profile']=rtrim($profget,',');
        $search['city']=rtrim($ctytget,' OR ');
        $users_record = $this->Recruiter_model->search_all_jobs($rowperpage,$rowno,$search);
        $allcount.=$this->Recruiter_model->getrecordCount($search);
        $users['users']=$users_record;
        $counts['counts']=$allcount;
        $getall=array_merge_recursive($counts,$users);
        $this->load->view('templates/recruiter/load_all_jobs.php',$getall);
    }

    function loadnotication(){
        $getalldata=$this->Recruiter_model->notification();
        $getalljbs=$this->Recruiter_model->alljobs();
        $conts=$this->Recruiter_model->countnotification();
        $rec=$this->Recruiter_model->view_events();
        $recc['recc']=$rec;
        $job['jobss']=$getalljbs;
        $getalls['getsall']= $getalldata;
        $contss['alcounts']=$conts;
        $getall=array_merge_recursive($job,$getalls,$contss,$recc);
        $this->load->view('templates/recruiter/notify.php',$getall);
    }
    

    function events(){
		$this->Recruiter_model->authtrue();
		$row=$this->Recruiter_model->events();
		$row['row']=$row;
	

		if($this->input->post('add')){
			trim($this->form_validation->set_rules('event','event','required'));
			if($this->form_validation->run()==true){
				$events=array();
				$events['name']=trim($this->input->post('event'));
				$events['date_created']=date('Y-m-d h:i:s');
				$this->Admin_model->addevent($events);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/events');
			}else{

				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/events');


			}
			

		}

		if($this->input->post('update')){
			trim($this->form_validation->set_rules('uevent','uevent','required'));
			//trim($this->form_validation->set_rules('uevent','uevent','required'));
			if($this->form_validation->run()==true){
				$events=array();
				$events['name']=trim($this->input->post('uevent'));
				$events['id']=$this->input->post('uid');
				
				//$events['date_created']=date('Y-m-d h:i:s');
				$this->Admin_model->updateevent($events);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/events');
			}else{

				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/events');


			}
			

		}

		$this->load->view('templates/recruiter/events.php',$row);
	}


    public function delete(){
		$id=$_POST['id'];
		$table=$_POST['table'];
		$getrespons=$this->Recruiter_model->delete($id,$table);
		echo $getrespons;
		exit();

	}
	function view_events(){
		//$id=base64_decode($_REQUEST['token']);
		$this->Recruiter_model->authtrue();
		$row=$this->Recruiter_model->view_events();
		$row['row']=$row;
		$this->load->view('templates/recruiter/view_event.php',$row);
	}

	function detail_events(){
		$this->Recruiter_model->authtrue();
		$id=base64_decode($_REQUEST['token']);
		$evntsdwtails=$this->Recruiter_model->details_events($id);
		$eventsusers=$this->Recruiter_model->eventusers($id);
		$getcatagories2=$this->Recruiter_model->getcatagories($evntsdwtails['event_category_id']);
		$getcatagories['getcatagories1']=$getcatagories2;
		$evntsdwtails['evntsdwtails']=$evntsdwtails;
		$eventsuser['eventsuser']=$eventsusers;
		$evntsdetailssss=array_merge_recursive($evntsdwtails,$eventsuser,$getcatagories);
		$this->load->view('templates/recruiter/detail_events.php',$evntsdetailssss);
    }
    public function add_events(){
        $getcat=$this->Recruiter_model->catagory();
        $subcat=$this->Recruiter_model->sub_catagory();
        $city=$this->Recruiter_model->city();
        $suball['suball']=$subcat;
        $allcat['allcat']=$getcat;
        $ccity['ccity']=$city;
        $allvall=array_merge_recursive($allcat,$suball,$ccity);
        $this->load->view('templates/recruiter/add_event.php',$allvall);
        if($this->input->post('add')){
            trim($this->form_validation->set_rules('title','title','trim|required'));
            trim($this->form_validation->set_rules('catagory[]','catagory','trim|required'));
            trim($this->form_validation->set_rules('sub_cat','sub_cat','trim|required'));
            trim($this->form_validation->set_rules('type','type','trim|required'));
            trim($this->form_validation->set_rules('startdate','startdate','trim|required'));
            trim($this->form_validation->set_rules('address','address','trim|required'));
            //trim($this->form_validation->set_rules('image[]','image','required'));
            trim($this->form_validation->set_rules('description','description','trim|required'));
            trim($this->form_validation->set_rules('termcond','termcond','trim|required'));
            trim($this->form_validation->set_rules('sub_cat','sub_cat','trim|required'));
            trim($this->form_validation->set_rules('addcity','location','trim|required'));
            
            if (empty($_FILES['image']['name']))
            {
                $this->form_validation->set_rules('image[]', 'image', 'required');
            }
            if (empty($_FILES['bimage']['name']))
            {
                $this->form_validation->set_rules('bimage', 'bimage', 'required');
            }
            
			if($this->form_validation->run()==true){
                $data=array();
                $data['event_title']=trim($this->input->post('title'));
                $getcat=$_POST['catagory'];
               
                $allcats.='';
                if($getcat!=''){
                    foreach($getcat as $cats){
                        $allcats.=$cats.',';
                    }
                }
                $gimage="";
                foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
                    $file_name=$_FILES["image"]["name"][$key];
                    $file_tmp=$_FILES["image"]["tmp_name"][$key];
                        if($file_name!='')
                        {
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        $gimage.=$newFileName.',';
                        $url="./uploads/events/".$newFileName;
                        move_uploaded_file($file_tmp,$url);
                        $max_dimm = 500;
                        createResized($url, $url, $max_dimm);
                        }
                }
               
                if( ($_FILES['bimage']['name']!='') )
                { 
                        $sizex =1920;
                        $sizey =400;
                        $ext=explode(".",$_FILES["bimage"]["name"]);
                        $url="./uploads/events/bimage/". str_replace(" ","",sha1($_FILES["bimage"]["name"].time()).".".$ext[sizeof($ext)-1]);
                        $url2=str_replace(" ","",sha1($_FILES["bimage"]["name"].time()).".".$ext[sizeof($ext)-1]);
                        move_uploaded_file($_FILES["bimage"]["tmp_name"],$url);
                        $x=$sizex;
                        $y=$sizey;
                        $image=imagename($url2,$x,$y);
                        imagemulitple($url,$x,$y);
                        unlink($url);
                }
               
                
                $data['event_category_id']=rtrim($allcats,',');
                $data['event_type_id']=trim($this->input->post('sub_cat'));
                $data['event_type']=trim($this->input->post('type'));
                $data['event_price']=trim($this->input->post('price'));
                $data['startdate']=trim($this->input->post('startdate'));
                $data['enddate']=trim($this->input->post('enddate'));
                $data['address']=trim($this->input->post('address'));
                $data['termsandconditions']=trim($this->input->post('termcond'));
                $data['description']=trim($this->input->post('description'));
                $data['location']=trim($this->input->post('addcity'));
                $data['gallary_images']=rtrim($gimage,',');
                $data['event_image']=$image;
                $data['date_created']=date('Y-m-d h:i:s');
                $this->Recruiter_model->addevents($data);
                $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record successfully added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/view_events');
                   
        }
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'recruiter/add_events');

        }
    }

}