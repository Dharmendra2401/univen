<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


    public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
        $this->load->model('Aspirant_model');
		$this->load->library('email');
		$this->Aspirant_model->authfalse();
		//$this->load->library('upload');
	}


    public function index(){
        $admindet=$this->Main_model->admin_details();
        $admin['admin']=$admindet;
        $tab=$_REQUEST['tabs'];
        $tabs['tabs']=$tab;
        $alldata=array_merge_recursive($admin,$tabs);
    $this->load->view('templates/registration.php',$alldata);
    }


    public function emailbody($sendfrom,$to,$subject,$message){
		$this->load->view('mailactive/index');	
		sendmails($sendfrom,$to,$message,$subject);	
	}

    
    public function aspmobile(){
        
        $aspdetails=array();
        $aspdetails['aspfirstname']=base64_decode(trim($_REQUEST['aspfirstname']));
        $aspdetails['asplastname']=base64_decode(trim($_REQUEST['asplastname']));
        $aspdetails['aspemail']=base64_decode(trim($_REQUEST['aspemail']));
        $aspdetails['aspmobile']=base64_decode(trim($_REQUEST['aspmobile']));
        $getdetails['getdetails']=$aspdetails;
        $getvalidateemail=$this->Main_model->validemail($aspdetails['aspemail'],$_REQUEST['aspmobile']);
        $seniority=$this->Main_model->getseniority();
        $getsen['getsen']= $seniority;
       
       if($getvalidateemail>0){
        $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
       };
      
       
        $getall=array_merge_recursive($getdetails,$getsen);
        $this->load->view('templates/aspmobile.php',$getall );
    }


    public function empmobile(){

        $aspdetails=array();
        $aspdetails['aspfirstname']=base64_decode(trim($_REQUEST['aspfirstname']));
        $aspdetails['asplastname']=base64_decode(trim($_REQUEST['asplastname']));
        $aspdetails['aspemail']=base64_decode(trim($_REQUEST['aspemail']));
        $aspdetails['aspmobile']=base64_decode(trim($_REQUEST['aspmobile']));
        $getdetails['getdetails']=$aspdetails;
        $getstate=$this->Main_model->state();
        $getvalidateemail=$this->Main_model->validemail($aspdetails['aspemail'],$_REQUEST['aspmobile']);
        $empcat=$this->Main_model->getemployercat();
        $getempcat['getempcat']= $empcat;
        $getstates['getstates']=$getstate;
    
       if($getvalidateemail>0){
        $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
       };
      

        $getall=array_merge_recursive($getdetails,$getempcat,$getstates);
        $this->load->view('templates/empmobile.php',$getall );

    }

    public function asp_emp_id(){
		$getcat=$this->Main_model->get_asp_emp_id();
		$str = ltrim($getcat['ID'], '');
		$dge=str_pad(intval($str) + 1, strlen($str), '0', STR_PAD_LEFT);
		if($getcat['ID']==''){$uniqid =$prefix."400001";}else{
			$uniqid =$prefix.$dge;
		}
		return $uniqid;
	}

    public function adduserasp(){
        $getvalidateemail=$this->Main_model->validemail($_REQUEST['aspemail'],$_REQUEST['aspmobile']);
        if($getvalidateemail>0){
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
           };
        if($this->input->post('submit')){
           
            trim($this->form_validation->set_rules('aspfirst','aspfirst','required'));
            trim($this->form_validation->set_rules('asplast','asplast','required'));
            trim($this->form_validation->set_rules('aspmobile','aspmobile','required'));
            trim($this->form_validation->set_rules('aspemail','aspemail','required'));
            trim($this->form_validation->set_rules('seniorityyy','seniorityyy','required'));
            trim($this->form_validation->set_rules('profileid','profileid','required'));
            trim($this->form_validation->set_rules('subcatid','subcatid','required'));
            trim($this->form_validation->set_rules('catid','catid','required'));
            trim($this->form_validation->set_rules('displayname','displayname','required'));
            

            
            if($this->form_validation->run()==true){
            $asp=array();
            $keytable=array();
            $user_profile=array();
            $asp_emp=array();
            $comm=array();
            $user_temp=array();

            $asp['First_Name']=trim($_REQUEST['aspfirst']);
            $asp['Last_Name'] =trim($_REQUEST['asplast']);
            $asp['Mobile_No']=trim($_REQUEST['aspmobile']);
            $asp['E_Mail']=trim($_REQUEST['aspemail']);
            $asp['Seniority']=trim($this->input->post('seniorityyy'));
            $asp['Display_Name']=trim($this->input->post('displayname'));
            $asp['Referral_Code']=trim($this->input->post('refrencecode'));
            $asp['Primary_Profile_Name']=trim($this->input->post('profileid'));
            $asp['Record_Inserted_Dttm']=date('Y-m-d H:s:i');
            $asp['Category_Name']=trim($this->input->post('catid'));
            $asp['Sub_Category_Name']=trim($this->input->post('subcatid'));
            $asp['TYPE_OF_REGISTRATION']='Aspirant';


            $keytable['ID']=$this->asp_emp_id();
            $keytable['Source_Key']=trim($_REQUEST['aspemail']);
            $keytable['Type_ID']='Aspirant';
            $keytable['RECORD_INSERTED_DTTM']=date('Y-m-d H:s:i');
           
            $asp_emp['USER_ID']=$this->asp_emp_id();
            $asp_emp['First_Name']=trim($_REQUEST['aspfirst']);
            $asp_emp['Last_Name']=trim($_REQUEST['asplast']);
            $asp_emp['Display_Name']=trim($_REQUEST['displayname']);
            $asp_emp['Seniority']=trim($_REQUEST['seniorityyy']);
            $asp_emp['Applicant_Access'] ='Y';
            $asp_emp['Recruiter_Access']='N';
            $asp_emp['RECORD_INSERTED_DTTM']=date('Y-m-d H:s:i');
            $asp_emp['ACTIVE_STATUS']='Y';
            $asp_emp['Referral_Code']=trim($this->input->post('refrencecode'));;
            
            

            $user_profile['USER_ID']=$this->asp_emp_id();
            $user_profile['Category_ID']=$this->Main_model->get_cat_id($asp['Category_Name']);
            $user_profile['Sub_Category_ID']=$this->Main_model->get_subcat_id($asp['Sub_Category_Name']);
            $user_profile['PROFILE_ID']=$this->Main_model->get_profile_id($asp['Primary_Profile_Name']);
            $user_profile['PROFILE_TYPE']='P';
            

            $comm['USER_ID']=$this->asp_emp_id();
            $comm['Mobile_No']=trim($_REQUEST['aspmobile']);
            $comm['E_Mail']=trim($_REQUEST['aspemail']);
            $comm['RECORD_INSERTED_DTTM']=date('Y-m-d H:s:i');
            $comm['ACTIVE_STATUS']='N';
           
            $user_temp['Profile_Id']=$this->input->post('profileidd');
            $user_temp['USER_ID']=$this->asp_emp_id();
            $user_temp['Is_Primary']='P';
           
            
            $getvalue=$this->Main_model->aspregistration($asp,$keytable,$user_profile,$asp_emp,$comm,$user_temp); 
            $subject='Successfully Registered With '.WEBSITE_NAME.' As Aspirant ';
            $mess='';
            $mess.='<p>Dear '.$asp['First_Name'].' '.$asp['Last_Name'].'</p>';
            $mess.='<p>You are successfully registered with CastIndia as a <strong>Aspirant</strong>. Please click <a href='.base_url().'home/emailverify?token='.base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
            $mess.='<p>Regards,<br> <strong>Team '.WEBSITE_NAME.'</strong> </p>';
            $message=$mess;
            $this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
            $getasp['Mobile_No']=trim($_REQUEST['aspmobile']);
            $getasp['USER_ID']=$comm['USER_ID'];
            $getasp['E_Mail']=trim($_REQUEST['aspemail']);
            $getasp['First_Name']=trim($_REQUEST['aspfirst']);
            $getasp['Last_Name']=trim($_REQUEST['asplast']);
            $this->session->set_userdata('aspirant',$getasp);
            redirect(base_url().'aspirant/dashboard');
            // $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully registered as  Aspirant, please verify link send in your email !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
    
            }
            $this->session->set_flashdata('error','<div class="alert alert-error alert-dismissible show" role="alert"> Sorry! Please fill out the details and try again!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
            }
    }

    
    public function adduseremp(){
       $getvalidateemail=$this->Main_model->validemail($_REQUEST['empemail'],$_REQUEST['empmobile']);
        if($getvalidateemail>0){
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
           };
		trim($this->form_validation->set_rules('empfirst','empfirst','required'));
		trim($this->form_validation->set_rules('emplast','emplast','required'));
		trim($this->form_validation->set_rules('empemail','empemail','required'));
        trim($this->form_validation->set_rules('empmobile','empmobile','required'));
        trim($this->form_validation->set_rules('empcat','empcat','required'));
        trim($this->form_validation->set_rules('address','address','required'));
        trim($this->form_validation->set_rules('state','state','required'));
        trim($this->form_validation->set_rules('city','city','required'));
        

		if($this->form_validation->run()==true){
		$asp=array();
        $keytable=array();
        $asp_emp=array();
        $user_profile=array();
        $comm=array();

		$asp['First_Name']=trim($_REQUEST['empfirst']);
		$asp['Last_Name'] =trim($_REQUEST['emplast']);
		$asp['Mobile_No']=trim($_REQUEST['empmobile']);
		$asp['E_Mail']=trim($_REQUEST['empemail']);
        $asp['Represents']=trim($_REQUEST['empcat']);
        $asp['Address']=trim($_REQUEST['address']);
        $asp['State']=trim($_REQUEST['state']);
        $asp['City']=trim($_REQUEST['city']);
        $asp['Company_Name']=trim($_REQUEST['companyfirm']);
        $asp['Website']=trim($_REQUEST['website']);
		$asp['Record_Inserted_Dttm']=date('Y-m-d H:s:i');
		$asp['TYPE_OF_REGISTRATION']='Employer';
        $asp['Referral_Code']=trim($_REQUEST['refrencecode']);


        $keytable['ID']=$this->asp_emp_id();
        $keytable['Source_Key']=trim($_REQUEST['empemail']);
        $keytable['Type_ID']='Employer';
        $keytable['RECORD_INSERTED_DTTM']=date('Y-m-d H:s:i');
       
        $asp_emp['USER_ID']=$this->asp_emp_id();
        $asp_emp['First_Name']=trim($_REQUEST['empfirst']);
        $asp_emp['Last_Name']=trim($_REQUEST['emplast']);
        $asp_emp['Recruiter_Represents']=trim($_REQUEST['empcat']);
        $asp_emp['Company_Name']=trim($_REQUEST['companyfirm']);
        $asp_emp['Website']=trim($_REQUEST['website']);
        $asp_emp['Applicant_Access'] ='N';
        $asp_emp['Recruiter_Access']='Y';
        $asp_emp['RECORD_INSERTED_DTTM']=date('Y-m-d H:s:i');
        $asp_emp['ACTIVE_STATUS']='Y';
        $asp_emp['Referral_Code']=trim($this->input->post('refrencecode'));
        

        $comm['USER_ID']=$this->asp_emp_id();
        $comm['Mobile_No']=trim($_REQUEST['empmobile']);
        $comm['E_Mail']=trim($_REQUEST['empemail']);
        $comm['State']=trim($_REQUEST['state']);
        $comm['City']=trim($_REQUEST['city']);
        $comm['Permanent_Address']=trim($_REQUEST['address']);
        $comm['RECORD_INSERTED_DTTM']=date('Y-m-d H:s:i');
        $comm['ACTIVE_STATUS']='N';
       


		$getvalue=$this->Main_model->aspregistration($asp,$keytable,'',$asp_emp,$comm,'');

        
		
		$subject='Successfully Registered With '.WEBSITE_NAME.' As Employer ';
		$mess='';
		$mess.='<p>Dear '.$asp['First_Name'].' '.$asp['Last_Name'].'</p>';
		$mess.='<p>You are successfully registered with CastIndia as a <strong>Employer</strong>. Please click <a href='.base_url().'home/emailverify?token='.base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
        $mess.='<p>Regards,<br> <strong>Team '.WEBSITE_NAME.'</strong> </p>';
		$message=$mess;
		$this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
		$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully registered as  Employer, please verify link send in your email !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'login');

		}
        $this->session->set_flashdata('error','<div class="alert alert-error alert-dismissible show" role="alert"> Sorry! Please fill out the details and try again!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');

		}

	public function getprofiles(){
        $iwanttobe=array();
        $iwanttobe['name']=trim($_REQUEST['iwanttobe']);
        $getallprof=$this->Main_model->getallprofiles($iwanttobe);
        $rowss['rowss']=$getallprof;
        $this->load->view('templates/getprofiles.php',$rowss);
    }
    

    public function getcity(){
       $state=trim($_REQUEST['state']);
       $getcity=$this->Main_model->getcity($state);
       $citys='';

       $citys.='<div class="form-group select" id="citytop">';
       $citys.='<label class="form-label heading-title" for="mobile">City</label>';
       $citys.='<select class="form-input form-control"   name="city" id="city" onchange="return getcity(this.value);">';
       $citys.='<option style="display:none;"></option>';
       foreach($getcity as $city){
           $citys.='<option>'.$city['city'].'</option>';

       }
       $citys.='</select>';
       $citys.='</div>';
       echo $citys;

    }


    public function getcitytwo(){
        $state=trim($_REQUEST['state']);
        $getcity=$this->Main_model->getcity($state);
        $citys='';
        $citys.='<div class="form-group select" id="citytop">';
        $citys.='<label class="form-label heading-title" for="city">City <span class="required">*</span></label>';
        $citys.='<select class="form-input form-control "   name="city" id="city" onchange="return cityes(this.value);">';
        $citys.='<option style="display:none;"></option>';
        foreach($getcity as $city){
            $citys.='<option>'.$city['city'].'</option>';
 
        }
        $citys.='</select>';
        $citys.='</div>';
        echo $citys;
 
     }
   

}
?>