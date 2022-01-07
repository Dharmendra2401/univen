<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspirant extends CI_Controller {
public function __construct() 
{
parent:: __construct();
$this->load->helper('url','form');
$this->load->model('Aspirant_model');
$this->load->model('Main_model');
$this->load->library('email');
$this->Aspirant_model->authtrue();
$this->load->view('library/upload.php');
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


function thumb($width,$height,$imageurl2,$name,$temp)
{
    $sizex =$width;
    $sizey =$height;
    $ext=explode(".",$name);
    $url=$imageurl2."/". str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
    $url2=str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
    move_uploaded_file($temp,$url);
    $x=$sizex;
    $y=$sizey;
    $image=imagename($url2,$x,$y);
    imagemulitple($url,$x,$y);
    unlink($url);
    $getimagename=$image;
    return $getimagename;
}

public function emailbody($sendfrom,$to,$subject,$message){
    $this->load->view('mailactive/index');	
    sendmails($sendfrom,$to,$message,$subject);	
}

function deletepro(){
    $deltepro=$this->Aspirant_model->deletepro();
    echo $deltepro;
}
function emailverfied(){
    $this->Aspirant_model->emailverfied();
}

function sendemailverfify(){
    $asp=$this->session->userdata('aspirant');
           
            $subject='Email Verification for '.WEBSITE_NAME.' As Aspirant ';
            $mess='';
            $mess.='<p>Dear '.$asp['First_Name'].' '.$asp['Last_Name'].'</p>';
            $mess.='<p>You are successfully registered as <strong>Aspirant</strong>. Please click <a href='.base_url().'home/emailverify?token='.base64_encode($asp['Mobile_No']).'>here</a> to verify your email</p>';
            $mess.='<p>Regards,<br> <strong>Team '.WEBSITE_NAME.'</strong> </p>';
            $message=$mess;
            $this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
}

function getcerticates(){
    $getname=$_REQUEST['name'];
    $name=$this->Aspirant_model->getcerticates($getname);
    $getcount=$this->Aspirant_model->getcountcertificate($getname);
    $count['count']=$getcount;
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($count,$getcert);
    $this->load->view('templates/aspirant/ajaxpages/getcertificates',$alldata);
}

function getjoblocality(){
    $getname=$_REQUEST['name'];
    $name=$this->Aspirant_model->getjoblocality($getname);
    // $getcount=$this->Aspirant_model->getcountjoblocality($getname);
    $count['count']=$getcount;
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($count,$getcert);
    $this->load->view('templates/aspirant/ajaxpages/getjoblocality',$alldata);
}

function addcertificate(){
    
    $getaspuser=$this->session->userdata('aspirant');
    $add=array();
    $add['Certificate_Name']=trim($_REQUEST['getname']);
    $add['USER_ID']=$getaspuser['USER_ID'];
    $add['RECORD_INSERTED_DTTM']=date('Y-m-d H:i:s');
    $this->Aspirant_model->addcertificate($add);

}
function adddropdown(){
    $getaspuser=$this->session->userdata('aspirant');
    $add=array();
    $add['Name']=trim(ucwords($_REQUEST['getname']));
    $add['Type']=trim($_REQUEST['type']);
    $add['RECORD_INSERTED_DTTM']=date('Y-m-d H:i:s');
    $this->Aspirant_model->adddropdown($add);

}





public function addassociationname(){
    $getaspuser=$this->session->userdata('aspirant');
    $add=array();
    $add['Association_Name']=trim($_REQUEST['getname']);
    $add['USER_ID']=$getaspuser['USER_ID'];
    $add['RECORD_INSERTED_DTTM']=date('Y-m-d H:i:s');
    $this->Aspirant_model->addassociate($add);

}

public function getcity(){
    $getname=$_REQUEST['name'];
    $name=$this->Aspirant_model->getcity($getname);
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getcity',$alldata);

}


public function gethighesteduu(){
    $getname=$_REQUEST['name'];
    $name=$this->Aspirant_model->gethighesteduu($getname);
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/gethighesteduu',$alldata);

}
public function getspecialization(){
    $getname=$_REQUEST['name'];
    $name=$this->Aspirant_model->getspecialization($getname);
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getspecialization',$alldata);

}
public function getcertificateone(){
    $getname=$_REQUEST['name'];
    $name=$this->Aspirant_model->getcertificateone($getname);
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/other_ceritificate_courses',$alldata);

}
public function getsoftwares(){


    $this->Aspirant_model->authtrue();
    $getname=$_REQUEST['name'];
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$choice=$this->Aspirant_model->getdropsearch('Softwares',$getname,$getval);
    $counts=$choice=$this->Aspirant_model->getdropcountone('Softwares',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getsoftwares',$alldata); 
}

public function getsoftwaress(){


    $this->Aspirant_model->authtrue();
    $getname=$_REQUEST['name'];
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$choice=$this->Aspirant_model->getdropsearch('Softwares',$getname,$getval);
    $counts=$choice=$this->Aspirant_model->getdropcountone('Softwares',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getsoftwaress',$alldata); 
}

public function getsoftwarestwo(){

    $this->Aspirant_model->authtrue();
    $getname=$_REQUEST['name'];
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$choice=$this->Aspirant_model->getdropsearch('Softwares',$getname,$getval);
    $counts=$choice=$this->Aspirant_model->getdropcountone('Softwares',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getsoftwarestwo',$alldata); 
}

function getfunctionalarea(){
    $this->Aspirant_model->authtrue();
    $getname=$_REQUEST['name'];
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$choice=$this->Aspirant_model->getdropsearch('Functional Area',$getname,$getval);
    $counts=$choice=$this->Aspirant_model->getdropcountone('Functional Area',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getfunctionalarea',$alldata); 
}

function getfunctionalintreset(){
    $this->Aspirant_model->authtrue();
    $getname=$_REQUEST['name'];
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$choice=$this->Aspirant_model->getdropsearch('Functional Interest',$getname,$getval);
    $counts=$choice=$this->Aspirant_model->getdropcountone('Functional Interest',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getfunctionalintreset',$alldata); 
}

function getskills(){
    $this->Aspirant_model->authtrue();
    $getname=$_REQUEST['name'];
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$choice=$this->Aspirant_model->getdropsearch('Skill',$getname,$getval);
    $counts=$choice=$this->Aspirant_model->getdropcountone('Skill',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getskill',$alldata); 
}

public function getchoice(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Choice Of Industry',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getchoice',$alldata);

}

public function getchoicethree(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Choice Of Industry',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Choice Of Industry',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getchoicethree',$alldata);
}



public function getadditionaldetails(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Additional Details For Employers',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getadditionalempdetails',$alldata);
}


public function getprofileone(){
        
    $getname=$_REQUEST['name'];
    $getid=$_REQUEST['id'];
    $getaspuser=$this->session->userdata('aspirant');
    $name=$this->Aspirant_model->getprofileone($getname,$getid,$getaspuser['USER_ID']);
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getsoftwares',$alldata);
}

function gethaircolor(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Hair Color',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/gethaircolor',$alldata);
}

function geteyecolor(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Eye Color',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/geteyecolor',$alldata);
}

function getcomplextion(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Complextion',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getcomplextion',$alldata);
}

function getbodytype(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Body Type',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getbodytype',$alldata);
}

function getbodyshape(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearch('Body Shape',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getbodyshape',$alldata);
}
function getpreferdgere(){
    $getname=$_REQUEST['name'];
    $name=$choice=$this->Aspirant_model->getdropsearchtwo('Preferred Genre',$getname,'');
    $getcert['getcert']=$name;
    $alldata=array_merge_recursive($getcert);
    $this->load->view('templates/aspirant/ajaxpages/getpreferdgere',$alldata);
}




function getlanguages(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Language Known',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Language Known',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getlanguages',$alldata);
}

function educertificate(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Other Ceritificate Courses',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Other Ceritificate Courses',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/educertificate',$alldata);
}

function getpreviouspresentjob(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Previous Present Job Roles',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Previous Present Job Roles',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getpreviouspresentjob',$alldata);
}

function getprocertificate(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Google Certificate',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Google Certificate',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getprocertificate',$alldata);
}


public function getassociatename(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Association Name',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Association Name',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getassociative',$alldata);
}

function getclientworkwith(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Clients Worked With',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Clients Worked With',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getclientworkwith',$alldata);

}

function getinterests(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Interests',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Interests',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getinterests',$alldata);

}

function gethobbies(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Hobby',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Hobby',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/gethobby',$alldata);

}

function getprefworkplat(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Preferred Platform',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Preferred Platform',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getprefworkplate',$alldata);

}


function getaddetailss(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Additional Details For Employers',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Additional Details For Employers',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getempdetails',$alldata);

}

function getchoiceone(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Choice Of Industry',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Choice Of Industry',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getchoiceone',$alldata);

}

function getchoicetwo(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearchtwo('Choice Of Industry',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountwo('Choice Of Industry',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getchoicetwo',$alldata);
}


function getexpertises(){
    $this->Aspirant_model->authtrue();
    $getname=trim($_REQUEST['name']);
    $getc=$_REQUEST['counts'];
    $values=$_REQUEST['values'];
    $getval=Implode('","',$values);
    $name=$this->Aspirant_model->getdropsearch('Expertise',$getname,$getval);
    $counts=$this->Aspirant_model->getdropcountone('Expertise',$getname);
    $getcert['getcert']=$name;
    $countss['countss']=$counts;
    $getcc['getcc']=$getc;
    $alldata=array_merge_recursive($getcert,$countss,$getcc);
    $this->load->view('templates/aspirant/ajaxpages/getexpertise',$alldata);
}


public function getallpro(){
    $getaspuser=$this->session->userdata('aspirant');
    $getid=$getaspuser['USER_ID'];
    $getpro=$this->Aspirant_model->getallpro($getaspuser['USER_ID']);
    $alldata=array_merge_recursive($getid);
    $this->load->view('templates/aspirant/ajaxpages/getsoftwares',$alldata);
}



public function profiles(){
$type=$_REQUEST['type'];
$admindet=$this->Main_model->admin_details();
$lang=$this->Aspirant_model->getlang();
$getsen=$this->Main_model->getseniority();
$certificate=$this->Aspirant_model->getdroplist('Other Ceritificate Courses','Form One');

$ppjr=$this->Aspirant_model->getdroplist('Previous Present Job Roles','Form One');
$googlecertificate=$this->Aspirant_model->getdroplist('Google Certificate','Form One');



$getcity="";
$getstate=$this->Main_model->state();
$admin['admin']=$admindet;
$getlang['getlang']=$lang;
$getsenn['getsenn']=$getsen;
$certificatee['certificatee']=$certificate;
$getaspuser=$this->session->userdata('aspirant');
$getpersonaldetails=$this->Aspirant_model->getpersonaldetails($getaspuser['USER_ID']);



$getaspusers['getaspusers']=$getaspuser;
$getstates['getstates']=$getstate;
$getalldet['getalldet']=$getpersonaldetails;

$types['types']=$type;
$getcitys['getcitys']=$getcity;
$ppjrr['ppjrr']=$ppjr;
$gc['gc']=$googlecertificate;

$alldata=array_merge_recursive($admin,$getaspusers,$getstates,$getalldet,$types,$getcitys,$getlang,$getsenn,$certificatee,$ppjrr,$gc);

if($this->input->post('personaldetailbutton')){
    trim($this->form_validation->set_rules('firstname','firstname','required'));
   
    trim($this->form_validation->set_rules('lastname','lastname','required')); 
    trim($this->form_validation->set_rules('displayname','displayname','required'));
    trim($this->form_validation->set_rules('dob','dob','required'));
    trim($this->form_validation->set_rules('pincode','pincode','required'));
    trim($this->form_validation->set_rules('country','country','required'));
    if($this->form_validation->run()==true){
        $comm=array();
        $asp=array();
        $asp['First_Name']=$this->input->post('firstname');
        $asp['Last_Name']=$this->input->post('lastname');
        $asp['Display_Name']=$this->input->post('displayname');
        $asp['Date_Of_Birth']=$this->input->post('dob');
        $asp['Gender']=$this->input->post('gender');
        $appint=$this->input->post('selectinterest');
        $getint='';
        foreach($appint as $int){
           if($int!=''){$getint.=$int.',';}
        }
        $asp['Applicant_Interests']=rtrim($getint,',');
        $allhobbie=$this->input->post('selecthobby');
        $hobby='';
        foreach($allhobbie as $hob){
            $hobby.=$hob.',';
        }
        $asp['Hobbies']=rtrim($hobby,',');
        $identity=$this->input->post('identity');
        $identitynumber=$this->input->post('identitynumber');
        $width='';
        $height='';
        $imageurl2='./uploads/document';
        $name=$_FILES["doc"]["name"];
        $temp=$_FILES["doc"]["tmp_name"];
        $oldimage=$this->input->post('oldimage');
        if($name!=''){$imagename=$this->thumb($width,$height,$imageurl2,$name,$temp); unlink($imageurl2.'/'.$oldimage);}else{
            $imagename=$oldimage;
        }
        $asp['Identity_Proof']=$identity.','.$identitynumber.','.$imagename;
        $asp['RECORD_UPDATED_DTTM']=date('Y-m-d H:s:i');
        $comm['City']=$this->input->post('city');
        $comm['State']=$this->input->post('state');
        $comm['Country']=$this->input->post('country');
        $comm['Alt_Mobile_No']=$this->input->post('altmobileno');
        $comm['Pin_Code']=$this->input->post('pincode');
        $comm['Permanent_Address']=$this->input->post('address');
		$comm['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
        $this->Aspirant_model->updatepersonal($comm,$asp,$getaspuser['USER_ID']);
        $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully updated your personal details !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/profiles?type=Professional');
    }
    $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Error! Please try again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/profiles?type=Personal');
   
}


if($this->input->post('educationaldetails')){
    $education=array();
    $education['Highest_Education']=$this->input->post('selecthighestedu');
    $education['Specialization']=$this->input->post('selectspecialization');
    $education['Year_of_Passing']=$this->input->post('yearofpassing');
    // $education['Othr_Certificates']=$this->input->post('selectcertificateone');
    $langg=$_REQUEST['langusgaess'];
    $getlang='';
    foreach($langg as $alllang){
        if($alllang!=''){
         $getlang.=$alllang.' - ';
        }
    }
    $certificate=$this->input->post('selectcertificateone');
    $allcert='';
    foreach ($certificate as $getcert) {
        if($getcert!=''){$allcert.=$getcert.', ';}
    }
    $education['Othr_Certificates']=rtrim($allcert,', ');
    $education['Language_Known']=rtrim($getlang,' - ');
    $softwaress=$this->input->post('selectsoftwaress');
    $getsoftware='';
    foreach ($softwaress as $soft) {
        if($soft!=''){$getsoftware.=$soft.', ';}
    }
    $education['Softwares']=rtrim($getsoftware,', ');
    $education['Othr_Compt_Achievements']=$this->input->post('competitiveachievements');
	$education['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
    $this->Aspirant_model->updateeducationdetails($education,$getaspuser['USER_ID']);
    $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully updated your educational details !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/profiles?type=Profile_details');
    
}

if($this->input->post('addprofiles')){
    trim($this->form_validation->set_rules('profileid','profileid','required'));
    trim($this->form_validation->set_rules('expirence','expirence','required')); 

    if($this->form_validation->run()==true){
        $profileadd=array();
        $profileadd['Profile_Id']=$this->input->post('profileid');
        $profileadd['USER_ID']=$getaspuser['USER_ID'];
        $profileadd['Is_Primary']='S';
        $this->Aspirant_model->addprofiles($profileadd);
        $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully added your profile !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/profiles');
        
    }
    $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Error! Please try again later. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/profiles');

}

if($this->input->post('professionalbutton')){
    
    $proff=array();
    $proff['Association_Name']=$this->input->post('selectassociatename');
    $proff['Functional_Industry']=$this->input->post('selectfunctionalintreset');
    $proff['Job_Title']=$this->input->post('jobtitle');
    $proff['Job_Desc']=$this->input->post('jobdescription');
    $proff['Job_Locality']=$this->input->post('selectjoblocality');
    $proff['License_No']=$this->input->post('licensenumber');
    $certificate=$this->input->post('selectprocertificate');
    $ppr=$this->input->post('presentjobroles');
    $functionalarea=$this->input->post('selectfunctionalarea');
    $expertise=$this->input->post('selectexpert');
    $clientworkwith=$this->input->post('selectclientworkwith');
    $skills=$this->input->post('skills');

    $allclient='';
    $getfuncta='';
    $allcert='';
    $allppr='';
    $allskill='';
    $allexpertise='';
    foreach ($certificate as $getcert) {
     if($getcert!=''){$allcert.=$getcert.', ';}
    }
    foreach($ppr as $pp){
       if($pp!=''){$allppr.=$pp.', ';}
    }
    foreach ($functionalarea as $funcarea){
        if($funcarea!=''){$getfuncta.=$funcarea.', ';}
    }
    foreach ($skills as $skill){
        if($skill!=''){$allskill.=$skill.', ';}
    }
    foreach ($expertise as $expertises){
        if($expertises!=''){$allexpertise.=$expertises.', ';}
    }
    foreach($clientworkwith as $client){

        if($client!=''){$allclient.=$client.' - ';}

    }
    $proff['Clients_wrk_with']=rtrim($allclient,' - ');
    $proff['Expertise']=rtrim($allexpertise,', ');
    $proff['Skills']=rtrim($allskill,', ');
    $proff['Functional_Area']=rtrim($getfuncta,', ');
    $proff['Certificate']=rtrim($allcert,', ');
    $proff['Working_Status']=$this->input->post('status');
    $proff['Current_Working_Status']=$this->input->post('wstatus');
    $proff['Current_Pay']=$this->input->post('currentpay');
    $proff['Notice_Period']=$this->input->post('noticeperiod');
    $proff['Yrs_of_Exp']=$this->input->post('yearofexpirence');
    $proff['Present_Job_Roles']=rtrim($allppr,', ');
    // $proff['Clients_wrk_with']=$this->input->post('clientsworkwith');
    $proff['Project_Type']=$this->input->post('projecttype');
    $proff['Project_Done']=$this->input->post('projectdone');
	$proff['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
    $this->Aspirant_model->updateproffessional($proff,$getaspuser['USER_ID']);
    $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully updated your professional details !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/profiles?type=Educational');

}
    


$this->load->view('templates/aspirant/profiles',$alldata);
}

public function dashboard(){
    $this->load->view('templates/aspirant/index');
    if($this->input->post('updatedetails')){
        
        $cropped_image = $_POST['image'];
       list($type, $cropped_image) = explode(';', $cropped_image);
       list(, $cropped_image) = explode(',', $cropped_image);
       $cropped_image = base64_decode($cropped_image);

       trim($this->form_validation->set_rules('dobs','dobs','required'));
       trim($this->form_validation->set_rules('middlenames','middlenames','required')); 
       trim($this->form_validation->set_rules('genders','genders','required'));
       trim($this->form_validation->set_rules('pincodes','pincodes','required')); 

       if(($this->form_validation->run()==true)&&($cropped_image!='')){
        $comm=array();
        $asp=array();
        $imageurl2='uploads/profile/';
        $name = date('ymdgis').'.png';
        $ext=explode(".",$name);
        $url=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
        file_put_contents($imageurl2.''.$url, $cropped_image);
        $getaspuser=$this->session->userdata('aspirant');
        $idd=$getaspuser['USER_ID'];
        $comm['Pin_Code']=$this->input->post('pincodes');
        $asp['Profile_Pic']=$url;
        $date= $_REQUEST['dobs'];
        $cdate = str_replace('/', '-', $date);
        $asp['Date_Of_Birth']=date('Y-m-d',strtotime($cdate));
        $asp['Gender']=$this->input->post('genders');
        $asp['Middle_Name']=$this->input->post('middlenames');
        $this->Aspirant_model->updatepersonal($comm,$asp,$idd);
        $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully updated your additional details !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'aspirant/dashboard');
       

       }
      
    }
}



function getpopup(){
    $getaspuser=$this->session->userdata('aspirant');
    $getpop=$this->Aspirant_model->getpopupadddetails($getaspuser['USER_ID']);
    echo $getpop;
}


public function updateprofileone(){

    $setprimary=trim($this->input->post('setprimary'));
    $profileidd=trim($this->input->post('profileidd'));
   
    $shift=trim($this->input->post('shift'));
    $preferd=$this->input->post('preferd');
    $getpree='';
    foreach ($preferd as $preferdd) {
       $getpree.=trim($preferdd).', ';
    }
    $allpre=rtrim($getpree,', ');
    $haircolor=trim($this->input->post('haircolor'));
    $complextion=trim($this->input->post('complextion'));
    $eyecolor=trim($this->input->post('eyecolor'));
    $weight=trim($this->input->post('weight'));
    $height=trim($this->input->post('height'));
    $bodytype=trim($this->input->post('bodytype'));
    $bodyshape=trim($this->input->post('bodyshape'));
    $adddetails=$this->input->post('getadditionaldetails');
    $getemps='';
    foreach ($adddetails as $emps) { if($emps!=''){$getemps.=trim($emps).', ';}}
    $allemps=rtrim($getemps,', ');
    $choice=$this->input->post('choiceindustry');
    $getchoice='';
    foreach ($choice as $choices) {if($choices!=''){$getchoice.=trim($choices).', ';}}
    $allchoice=rtrim($getchoice,', ');
    $headline=trim($this->input->post('headline'));
    $aboutyourself=trim($this->input->post('aboutyourself'));
    $youtubelink=trim($this->input->post('youtubelink'));
    $facebooklink=trim($this->input->post('facebooklink'));
    $instalink=trim($this->input->post('instalink'));
    $twitterlink=trim($this->input->post('twitterlink'));
    $linkedinlink=trim($this->input->post('linkedinlink'));
    $behancelink=trim($this->input->post('behancelink'));
    $googlepluslink=trim($this->input->post('googlepluslink'));
    $dribbblelink=trim($this->input->post('dribbblelink'));
    if($setprimary==''){$setprimary='S';}else{$setprimary='P';}
    $trims=array();
    
    $trims['User_From_Val']=$setprimary.' - '.$shift.' - '.$allpre.' - '.$haircolor.' - '.$complextion.' - '.$eyecolor.' - '.$weight.' - '.$height.' - '.$bodytype.' - '.$bodyshape.' - '.$allemps.' - '.$allchoice.' - '.$headline.' - '.$aboutyourself.' - '.$youtubelink.' - '.$facebooklink.' - '.$instalink.' - '.$twitterlink.' - '.$linkedinlink.' - '.$behancelink.' - '.$googlepluslink.' - '.$dribbblelink;
    $trims['Is_Primary']=$setprimary;
    $trims['Temp_ID']=$this->input->post('tempid');
    $activeprofile=array();
    
    $get=$this->Aspirant_model->addprofiledetails($trims,$profileidd,$setprimary);
    
}

function updateprofiletwo(){
    $projectvalues=$this->input->post('projectvalues');
    $setprimary=trim($this->input->post('setprimary'));
    $shift=trim($this->input->post('shift'));
    $headline=trim($this->input->post('headline'));
    $aboutyourself=trim($this->input->post('aboutyourself'));
    $choice=$this->input->post('choiceofindustrytwoo');
    $getchoice='';
    foreach ($choice as $choices) {if($choices!=''){$getchoice.=trim($choices).', ';}}
    $preferdgere=trim($this->input->post('preferdgere'));
    $software=$this->input->post('software');
    $getsoft='';
    foreach ($software as $softwares) {if($softwares!=''){$getsoft.=trim($softwares).', ';}}

    $youtubelink=trim($this->input->post('youtubelink'));
    $facebooklink=trim($this->input->post('facebooklink'));
    $instalink=trim($this->input->post('instalink'));
    $twitterlink=trim($this->input->post('twitterlink'));
    $linkedinlink=trim($this->input->post('linkedinlink'));
    $behancelink=trim($this->input->post('behancelink'));
    $googlepluslink=trim($this->input->post('googlepluslink'));
    $dribbblelink=trim($this->input->post('dribbblelink'));
    $profileidd=trim($this->input->post('profileidd'));
    if($setprimary==''){$setprimary='S';}else{$setprimary='P';}
    $trims=array();
    $trims['User_From_Val']=$setprimary.' - '.$shift.' - '.$headline.' - '.$aboutyourself.' - '.rtrim($getchoice,', ').' - '.$preferdgere.' - '.rtrim($getsoft,', ').' - '.$youtubelink.' - '.$facebooklink.' - '.$instalink.' - '.$twitterlink.' - '.$linkedinlink.' - '.$behancelink.' - '.$googlepluslink.' - '.$dribbblelink.' - '.$projectvalues;
    $trims['Is_Primary']=$setprimary;
    $trims['Temp_ID']=$this->input->post('tempid');
   
    $get=$this->Aspirant_model->addprofiledetails($trims,$profileidd,$setprimary);
    exit();
}

public function updateprofilethree(){

    // 'profileidd':profileidd,'tempid':tempid,'shift':shift,'headline':headline,'aboutyourself':aboutyourself,'noofprojects':noofprojects,'wstatus':wstatus,'choiceindustry':choiceindustry,'addemp':addemp,'preferdgeree':preferdgeree,'software':software,'youtubelink':youtubelink,'facebooklink':facebooklink,'instalink':instalink,'twitterlink':twitterlink,'linkedinlink':linkedinlink,'behancelink':behancelink,'googlepluslink':googlepluslink,'dribbblelink':dribbblelink,'setprimary':setprimary
    $setprimary=trim($this->input->post('setprimary'));
    $projectvalues=trim($this->input->post('projectvalues'));
    
    $shift=trim($this->input->post('shift'));
    $headline=trim($this->input->post('headline'));
    $aboutyourself=trim($this->input->post('aboutyourself'));
    $profileidd=trim($this->input->post('profileidd'));
    $noofprojects=trim($this->input->post('noofprojects'));
    $wstatus=trim($this->input->post('wstatus'));

    $choiceindustry=$this->input->post('choiceindustry');
    $getallchoice='';
    foreach($choiceindustry as $getchoice){
        if($getchoice!=''){$getallchoice.=$getchoice.', ';}
    }
    $addemp=$this->input->post('addemp');
    $getalladdempp='';
    foreach($addemp as $addempp){
        if($addempp!=''){$getalladdempp.=$addempp.', ';}
    }
    $preferdgeree=trim($this->input->post('preferdgeree'));
    $software=$this->input->post('software');
    $getallsoftwares='';
    foreach($software as $softwares){
        if($softwares!=''){$getallsoftwares.=$softwares.', ';}
    }
    $youtubelink=trim($this->input->post('youtubelink'));
    $facebooklink=trim($this->input->post('facebooklink'));
    $instalink=trim($this->input->post('instalink'));
    $twitterlink=trim($this->input->post('twitterlink'));
    $linkedinlink=trim($this->input->post('linkedinlink'));
    $behancelink=trim($this->input->post('behancelink'));
    $googlepluslink=trim($this->input->post('googlepluslink'));
    $dribbblelink=trim($this->input->post('dribbblelink'));

    $trims['User_From_Val']=$setprimary.' - '.$shift.' - '.$headline.' - '.$aboutyourself.' - '.$noofprojects.' - '.$wstatus.' - '.rtrim($getallchoice,', ').' - '.rtrim($getalladdempp,', ').' - '.$preferdgeree.' - '.rtrim($getallsoftwares,', ').' - '.$youtubelink.' - '.$facebooklink.' - '.$instalink.' - '.$twitterlink.' - '.$linkedinlink.' - '.$behancelink.' - '.$googlepluslink.' - '.$dribbblelink.' - '.$projectvalues;

    $trims['Is_Primary']=$setprimary;
    $trims['Temp_ID']=$this->input->post('tempid');
    $get=$this->Aspirant_model->addprofiledetails($trims,$profileidd,$setprimary);
}

public function submitportfolio(){
    $portfolio=array();
    $title=$_REQUEST['title'];
    $linkurl=$_REQUEST['linkurl'];
    $alltitle="";
    $alllink="";
    $i=0;foreach ($title as $titles) {
        if($titles!=''){
        $j=0;foreach ($linkurl as $linkurls) {
            if($i==$j){ if(($linkurls!='')&&($titles!='')){$alldata.=$linkurls.','.$titles.' - '; }}
       ;
     $j++; } 
    }
    $i++;}
       
    $profileid=trim($_REQUEST['profileid']);
    $portfolio['Portfolio_Form_Links']=rtrim($alldata,' - ');

    $this->Aspirant_model->updateportfolio($portfolio,$profileid);
   
}

public function submitportfoliothree(){
    $portfolio=array();
    $vediourlone=$this->input->post('vediourlone');
    $allvediourl='';
    foreach($vediourlone as $vurl){
        if($vurl!=''){$allvediourl.=$vurl.' - ';}
    }
    $portfolio['Portfolio_Form_Vedios']=rtrim($allvediourl,' - ');
    $profileid=trim($_REQUEST['profileid']);
    $this->Aspirant_model->updateportfolio($portfolio,$profileid);

}

public function submitportfoliofour(){
    $profileid=$this->input->post('imageid');
    $docurl=$this->input->post('docurl');
    
    $doctitle=$this->input->post('doctitle');
    $portfolio=array();
    
    $documenttitle=$this->input->post('documenttitle');
    $imageurl2='./uploads/portfolio/document';
    $name=$_FILES["chooseFile"]["name"];
    $temp=$_FILES["chooseFile"]["tmp_name"];
    $ext=explode(".",$name);
    $url=$imageurl2."/". str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
    $url2=str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
    move_uploaded_file($temp,$url);
    $getimage='';
    if($documenttitle!=''){$docandtitle=$url2.','.$documenttitle;};
    $i=0;
    foreach($docurl as $image){
        $j=0;
        foreach($doctitle as $doctitles){
            if($i==$j){$getimage.=$image.','.$doctitles.' - ';}
            
        $j++;}
        

    $i++;}
    $allimages= rtrim($getimage,' - ');
    $portfolio['Portfolio_Form_Documents']=$docandtitle.' - '.$allimages;
    $this->Aspirant_model->updateportfolio($portfolio,$profileid);
}

public function submitportfoliotwo(){
    $profileid=$this->input->post('imageid');
    $imageurlone=$this->input->post('imageurlonetwo');
    $portfolio=array();
    $width='';
    $height='';
    $imageurl2='./uploads/portfolio';
    $name=$_FILES["image"]["name"];
    $temp=$_FILES["image"]["tmp_name"];
    if($name!=''){
        $imagename=$this->thumb($width,$height,$imageurl2,$name,$temp);
    }
    $getimage='';
    foreach($imageurlone as $image){
        if($image!=''){$getimage.=$image.' - ';}

    }
    $allimages= rtrim($getimage,' - ');
    $portfolio['Portfolio_Form_Images']=$imagename.' - '.$allimages;
    $this->Aspirant_model->updateportfolio($portfolio,$profileid);
}

public function getlinks(){
    $portpholioproid=$_REQUEST['portpholioproid'];
    $linkstitle=$this->Aspirant_model->selectportfolio('Portfolio_Form_Links',$portpholioproid);
    
    $getdata['getdata']=$linkstitle;
    $this->load->view('templates/aspirant/ajaxpages/getlinks.php',$getdata);
}
public function getimages(){
    $portpholioproid=$_REQUEST['portpholioproid'];
    $getimages=$this->Aspirant_model->selectportfolio('Portfolio_Form_Images',$portpholioproid);
    $getdata['getdata']=$getimages;
    $this->load->view('templates/aspirant/ajaxpages/getimages.php',$getdata);
}

public function getvedios(){
    $portpholioproid=$_REQUEST['portpholioproid'];
    $getimages=$this->Aspirant_model->selectportfolio('Portfolio_Form_Vedios',$portpholioproid);
    $getdata['getdata']=$getimages;
    $this->load->view('templates/aspirant/ajaxpages/getvedio.php',$getdata);
}
public function getdocuments(){
    $portpholioproid=$_REQUEST['portpholioproid'];
    $getimages=$this->Aspirant_model->selectportfolio('Portfolio_Form_Documents',$portpholioproid);
    $getdata['getdata']=$getimages;
    $this->load->view('templates/aspirant/ajaxpages/getdocument.php',$getdata);
}




public function getprofilestwo(){
    $iwanttobe=array();
    $iwanttobe['name']=trim($_REQUEST['iwanttobe']);
    $getallprof=$this->Aspirant_model->getallprofilestwo($iwanttobe);
    $getuserpro=$this->Aspirant_model->userpro();
    $rowss['rowss']=$getallprof;
    $selectpro['selectpro']=$getuserpro;
    $alldata=array_merge_recursive($rowss,$selectpro);
    $this->load->view('templates/aspirant/ajaxpages/getprofiles.php',$alldata);
}

public function getuserpro(){
    
    $profile=$_REQUEST['profile'];
    
    $getuserpro=$this->Aspirant_model->userpro();
    $selectpro['selectpro']=$getuserpro;
    $profilee['profilee']=$profile;
    $alldata=array_merge_recursive($selectpro,$profilee);
    $this->load->view('templates/aspirant/ajaxpages/getuserprofile.php',$alldata);
}

public function gettemplate(){
    $tempid=$_REQUEST['profileid'];
    
    $gettemplate=$this->Aspirant_model->getprotemp($tempid);
    $getvalues=$this->Aspirant_model->getvalues($tempid);
    $haircolor=$this->Aspirant_model->getdrop('Hair Color');
    $complextion=$this->Aspirant_model->getdrop('Complextion');
    $eyecolor=$this->Aspirant_model->getdrop('Eye Color');
    $bodytype=$this->Aspirant_model->getdrop('Body Type');
    $bodyshape=$this->Aspirant_model->getdrop('Body Shape');
    $adddfe=$this->Aspirant_model->getdrop('Additional Details For Employers');
    $choice=$this->Aspirant_model->getdrop('Choice of Industry','Form One');
    $plateformone=$this->Aspirant_model->getdrop('Preferred Platform');
    $getpre=$this->Aspirant_model->getdroplist('Preferred Genre','Form Two');
    $softwares=$this->Aspirant_model->getdroplist('Softwares','Form One');
    $emp=$this->Aspirant_model->getdroplist('Additional Details For Employers2','Form Two');
    $adddetailemp=$this->Aspirant_model->getdroplist('Additional Details For Employers','Form One');
    

    
    
    $getvaluess['getvaluess']=$getvalues;
    $gettemp['gettemp']= $gettemplate;
    $gettempid['gettempid']=$tempid;
    $gethaircolor['gethaircolor']=$haircolor;
    $getcomp['getcomp']=$complextion;
    $geteyecolor['geteyecolor']=$eyecolor;
    $getbodytype['getbodytype']=$bodytype;
    $getbodyshape['getbodyshape']=$bodyshape;
    
    $getchoice['getchoice']=$choice;
    $getplateform['getplateform']=$plateformone;
    $getpree['getpree']=$getpre;
    $getsoft['getsoft']=$softwares;
    $empp['empp']=$emp;
    $adddetailempp['adddetailempp']=$adddetailemp;
    
    $alldata=array_merge_recursive($gettempid,$getvaluess,$gettemp,$gethaircolor,$getcomp,$geteyecolor,$getbodytype,$getbodyshape,$getchoice,$getplateform,$getpree,$getsoft,$empp,$adddetailempp);
    $this->load->view('templates/aspirant/ajaxpages/profileformone.php',$alldata);
    
}

public function logout(){
$this->session->unset_userdata('aspirant');
$this->session->unset_userdata('profile');
$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
Logout Successful!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'login');
}

public function getcityselect(){
    $alldata=array();
    $pincode=trim($_REQUEST['pincode']);
    $getcity=$this->Aspirant_model->getcity($pincode);
    $getstate=$this->Aspirant_model->getstate($pincode);
  
    $citys.='<div class="form-group select" >';
       $citys.='<label class="form-label heading-title" for="mobile">City</label>';
       $citys.='<select class="form-input form-control example-singles"   name="city" id="city">';
       foreach($getcity as $city){
           $citys.='<option>'.$city['city'].'</option>';

       }
       $citys.='</select>';
       $citys.='</div>';
       $citys.="<script>$(document).ready(function() {
        $('.example-singles').multiselect({
            enableFiltering: true,
            filterBehavior: 'text',
            filterPlaceholder: 'Search',
            nonSelectedText: '',
            includeSelectAllOption: true,
            maxHeight: true,
            buttonText: function(options, select) {
                if (options.length == 0) {
                    return '';
                } else {
                    var selected = '';
                    options.each(function() {
                        selected += $(this).text() + ', ';
                    });
                    return selected.substr(0, selected.length - 2);
                }
            },
        });});</script>";
       echo $citys;
    //$alldata=array_merge_recursive( );
}


public function getstateselect(){
    $alldata=array();
    $pincode=trim($_REQUEST['pincode']);
    
    $getstate=$this->Aspirant_model->getstate($pincode);
  
    $citys.='<div class="form-group select">';
       $citys.='<label class="form-label heading-title" for="mobile">State</label>';
       $citys.='<select class="form-input form-control example-singless"   name="state" id="state">';
       foreach($getstate as $city){
           $citys.='<option>'.$city['state'].'</option>';

       }
       $citys.='</select>';
      $citys.='</div>';
       $citys.="<script>$(document).ready(function() {
        $('.example-singless').multiselect({
            enableFiltering: true,
            filterBehavior: 'text',
            filterPlaceholder: 'Search',
            nonSelectedText: '',
            includeSelectAllOption: true,
            maxHeight: true,
            buttonText: function(options, select) {
                if (options.length == 0) {
                    return '';
                } else {
                    var selected = '';
                    options.each(function() {
                        selected += $(this).text() + ', ';
                    });
                    return selected.substr(0, selected.length - 2);
                }
            },
        });});</script>";
       echo $citys;
    //$alldata=array_merge_recursive( );
}

public function getpincodecheck(){
    $pincode=trim($_REQUEST['pincode']);
    $getpincode=$this->Aspirant_model->checkpincode($pincode);
    echo $getpincode;
}



public function jobbox(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function ci_ranking(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function wallet(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function project_insights(){
    $this->load->view('templates/aspirant/commingsoon');
}
public function profile_enhancement(){
    $this->load->view('templates/aspirant/commingsoon');
}


public function schedule_manager(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function training_hub(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function portfolio_builder(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function legal_helpdesk(){
    $this->load->view('templates/aspirant/commingsoon');
}
public function ask_the_recruiter(){
    $this->load->view('templates/aspirant/commingsoon');
}


public function IPR_helpdesk(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function PR_assistance(){
    $this->load->view('templates/aspirant/commingsoon');
}


public function artist_management(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function personal_assistant(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function pay_pro_tech(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function CI_suggestions(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function priority_club(){
    $this->load->view('templates/aspirant/commingsoon');
}

public function employer_access(){
    $this->load->view('templates/aspirant/commingsoon');
}
public function mentor_interactions(){
    $this->load->view('templates/aspirant/commingsoon');
}
public function premium_learning_modules(){
    $this->load->view('templates/aspirant/commingsoon');
}


}