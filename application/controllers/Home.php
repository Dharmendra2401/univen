<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function emailbody($sendfrom,$to,$subject,$message){
		$this->load->view('mailactive/index');	
		sendmails($sendfrom,$to,$message,$subject);	
	}

	public function verify(){
		$email=base64_decode($_REQUEST['email']);
		$verifyd=$this->Main_model->verifyemail($email);	
		if($verifyd!=0){
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">You are already verifyed your email.  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');


		}else{
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Email successfully verified.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');


		}
	}

	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
		$this->load->library('email');
		
		//$this->load->library('upload');
	}
	
	public function checkemail()
	{
		$email=trim($_POST['email']);
		$mobile=trim($_POST['mobile']);
		$table=trim($_POST['table']);
		$getcount=$this->Main_model->emailverification($email,$table,$mobile);
		if($getcount!=0){
			echo "true";
		}
		else{
			echo "false";

		}
	}

	
	public function checkmobile()
	{
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$table=$_POST['table'];
		$getcount=$this->Main_model->emailverification($email,$table,$mobile);
		if($getcount!=0){
			echo "true";
		}
		else{
			echo "false";

		}
	}

	public function index()
	{   
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		
		$this->load->view('templates/index',$alldata);
	}



	public function quessend(){
		if($this->input->post('quessend')){
			trim($this->form_validation->set_rules('quesfullname','quesfullname','required'));
			trim($this->form_validation->set_rules('quesemail','quesemail','required'));
			trim($this->form_validation->set_rules('quesaddress','quesaddress','required'));
			if($this->form_validation->run()==true){
				$ques=array();
				$ques['fullname']=trim($this->input->post('quesfullname'));
				$ques['email']=trim($this->input->post('quesemail'));
				$ques['question']=trim($this->input->post('quesaddress'));
				$this->Main_model->addquestion($ques);
				$subject='Question Regarding '.WEBSITE_NAME.'';
				$mess='';
				$mess.='<p>Dear Admin</p>';
				$mess.='<p>A '.$ques['fullname'].' ask you a question</p>';
				$mess.='<p><strong>Full Name</strong>: '.$ques['fullname'].' <br> <strong>Email</strong>: '.$ques['email'].'<br> <strong>Question</strong>: '.$ques['question'].'</p>';
				$mess.='<p><strong>Regards,<br>Team Cast India</strong></p>';
				$message=$mess;
				$this->emailbody(NO_REPLY,ADMIN_EMAIL,$subject,$message);

				$messtwo='';
				$messtwo.='<p>Dear '.$ques['fullname'].'</p>';
				$messtwo.='<p>Thankyou for raising your question. We will get back as soon as possible.if any query email us  <a href=mailto:'.EMAIL_FROM.'>'.EMAIL_FROM.'</a> </p>';
				$messtwo.='<p><strong>Regards,<br>Team Cast India</strong></p>';

				$messagetwo=$messtwo;
				
				//$this->emailbody(NO_REPLY,$ques['email'],$subject,$messagetwo);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Successfull! Thankyou for contacting us. We will get in touch as soon as possible  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'#form-qestion');

			}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Please fill out the fields and try again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'#form-qestion');


		}
	}




	
	public function terms_condition()
	{
		$admindet=$this->Main_model->admin_details();
		$id=base64_decode($_REQUEST['token']);
		$term_con=$this->Main_model->terms_condition($id);
		$admin['admin']=$admindet;
		$termcon['termcon']=$term_con;
		$term_condition=array_merge_recursive($admin,$termcon);
		$this->load->view('templates/terms_condition.php',$term_condition);
	}
	public function contactus()
	{
		$admindet=$this->Main_model->admin_details();
		$admin['admin']=$admindet;
		$contact_us=array_merge_recursive($admin);
		$this->load->view('templates/contactus.php',$contact_us);

		if($this->input->post('submit')){
			trim($this->form_validation->set_rules('name','name','required'));
			trim($this->form_validation->set_rules('email','email','required'));
			trim($this->form_validation->set_rules('subject','subject','required'));
			trim($this->form_validation->set_rules('message','message','required'));
			if($this->form_validation->run()==true){
				$contactus=array();
				$contactus['name']=$this->input->post('name');
				$contactus['email']=$this->input->post('email');
				$contactus['subject']=$this->input->post('subject');
				$contactus['message']=$this->input->post('message');
				$contactus['date_created']=date('Y-m-d h:i:s');
				$this->Main_model->contactus($contactus);
				$to=$contactus['email'];
				$subject='Contact Us Team From Castindia';
				$mess='';
				$mess.='<p>Dear '.$contactus['name'].'</p>';
				$mess.='<p>Thankyou for contacting us.We will get back as soon as possible.if any query email us <a href=to:'.EMAIL_FROM.'>'.EMAIL_FROM.'</a> </p>';
				$message=$mess;
				$this->emailbody($to,$subject,$message);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Successfull! Thankyou for contacting us. We will get in touch as soon as possible  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/contactus');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Please fill out the fields and try again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/contactus');
	
			}
		}
	}
	
	


	public function recuirter_login()
	{
		$this->load->view('templates/recuirter_login');
		if($this->input->post('forgotemail')){
			$email=$_POST['forgotemail'];
			$mobile='';
			$table='recruiter';
			$getcount=$this->Main_model->emailverification($email,$table,$mobile);
		if($getcount!=0){
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Send! Your password is successfully send to your email registered account <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuirter_login');
			
		}
		else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Please enter a valid registered email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuirter_login');

		}
		}
	}

	

	

	public function emailverify(){
		$token=base64_decode($_REQUEST['token']);
		$this->Main_model->emailverify($token);
		$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> Your email is verified successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url().'registration');


	}

	
	
	public function validmobile(){
		$mobile=trim($_REQUEST['aspmobile']);
		if($mobile!=''){
			$getvalue=$this->Main_model->validmobile($mobile);
			if($getvalue>0){
				echo "ok";
			}else{
				echo "false";
			}

		}

	}


	public function validmobileloginasp(){
		$mobile=trim($_REQUEST['aspmobile']);
		
		if($mobile!=''){
			$getvalue=$this->Main_model->validmobileloginasp($mobile);
			if($getvalue>0){
				echo "ok";
			}else{
				echo "false";
			}

		}
	}

	public function validmobileloginemp(){
		$mobile=trim($_REQUEST['aspmobile']);
		if($mobile!=''){
			$getvalue=$this->Main_model->validmobileloginemp($mobile);
			if($getvalue>0){
				echo "ok";
			}else{
				echo "false";
			}

		}
	}

	public function validemail(){
		$aspemail=trim($_REQUEST['aspemail']);
		$aspmobile='';
		if($aspemail!=''){
			$getvalue=$this->Main_model->validemail($aspemail,$aspmobile);
			if($getvalue==0){
				echo "ok";
			}else{
				echo "false";
			}

		}

	}

	public function otpreq(){
		$otpone=$_REQUEST['otpone'];
		$otptwo=$_REQUEST['otptwo'];
		$otpthree=$_REQUEST['otpthree'];
		$type=$_REQUEST['type'];
		$otpfour=$_REQUEST['otpfour'];
		$mobilenumber='91'.$_REQUEST['mobilenumber'];
		$otp=$otpone.''.$otptwo.''.$otpthree.''.$otpfour;
		$apiKey = urlencode('NzAzN2M4ODJhODQ5YTVhNTJkNWQxY2ExZmMwZGJjYzU=');
		// Message details
		$numbers = array($mobilenumber);
		$sender = urlencode('GLCAIN');
		//$message = rawurlencode('Hello testing');
		//$message = rawurlencode('The One Time Password (OTP) for registration at Cast India is '.$otp.'.Please use this OTP to login. It is only valid for 01.00 minutes. Do not share this code with anyone for security reasons.');
		if(($type=='aspirantlogin')||($type=='employerlogin')){
			$message = rawurlencode('The One Time Password (OTP) for Cast India login is '.$otp.'. Please use this OTP to login. It is only valid for 01:00minutes. Do not share this code with anyone for security reasons.');
		}else{
			$message = rawurlencode('The One Time Password (OTP) for registration at Cast India is '.$otp.'. Do not share this code with anyone for security reasons.');
		}
		
		//$message = rawurlencode('The One Time Password (OTP) for Cast India login is XXXX. Please use this OTP to login. It is only valid for XXXXminutes. Do not share this code with anyone for security reasons.');

		$numbers = implode(',', $numbers);
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$getdata=json_decode($response, true);
		echo $getdata['status'];

		exit;
	// $array=array();
	//  $datas=json_encode($response);
	//  $array=$response;
	//  echo $array['status'];

	
	}



	public function otplogin(){
		$otpone=$_REQUEST['otpone'];
		$otptwo=$_REQUEST['otptwo'];
		$otpthree=$_REQUEST['otpthree'];
		$otpfour=$_REQUEST['otpfour'];
		$mobilenumber='91'.$_REQUEST['mobilenumber'];
		$otp=$otpone.''.$otptwo.''.$otpthree.''.$otpfour;
		$apiKey = urlencode('NzAzN2M4ODJhODQ5YTVhNTJkNWQxY2ExZmMwZGJjYzU=');
		// Message details
		$numbers = array($mobilenumber);
		$sender = urlencode('GLCAIN');
		//$message = rawurlencode('Hello testing');
		//$message = rawurlencode('The OTP for your '.WEBSITE_NAME.' is :'.$otp.' ');
		
		$numbers = implode(',', $numbers);
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$getdata=json_decode($response, true);
		echo $getdata['status'];

		exit;
	// $array=array();
	//  $datas=json_encode($response);
	//  $array=$response;
	//  echo $array['status'];

	
	}

	public function blog(){
		$this->load->view("templates/blogs");
	}
	public function aboutus(){
	    $admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/aboutus",$alldata);
	}
	public function life_at_ci(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/life_at_ci",$alldata);
	}
	public function our_team(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/our_team",$alldata);
	}
	public function career(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/career",$alldata);
	}
	public function career_desc(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/career_desc",$alldata);
	}
	public function career_apply(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/career_apply",$alldata);
	}
	public function category(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$category=$this->Main_model->categories();
		$subcatnt=$subcatn;
		$populartaglist=$this->Main_model->populartaglist();
		// $category_film=$this->Main_model->category_film();
		// $category_films['category_films']=$category_film;
		$categories['categories']=$category;
		$populartaglists['populartaglists']=$populartaglist;
		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$subcatna['subcatna']=$subcatn;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$categories,$populartaglists);
		$this->load->view("templates/category",$alldata);
	}
	public function sub_category($id){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$subcategories['subcategories']=$this->Main_model->subcategory_description($id);
		$subcatprofile['subcatprofile']=$this->Main_model->subcategory_profile($id);
		//print_r($subcatprofile);die;
		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$subcategories,$subcatprofile);
		$this->load->view("templates/sub_category",$alldata);
	}
	public function profile($id){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();
		$profiles['profiles']=$this->Main_model->profiles($id);
		$profilelist['profilelist']=$this->Main_model->getprofilelist();
		
		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest,$profiles,$profilelist);
		$this->load->view("templates/profile",$alldata);
	}
	public function casting_calls(){
		$admindet=$this->Main_model->admin_details();
		$banner=$this->Main_model->banner();
		$vedio=$this->Main_model->getvedio();
		$hired_hire=$this->Main_model->gethired_hire();
		$faq=$this->Main_model->faq();
		$getlogo=$this->Main_model->recentemp();
		$users=$this->Main_model->usercontent();
		$testmonials=$this->Main_model->testimonals();

		$admin['admin']=$admindet;
		$getfaq['getfaq']=$faq;
		$indtwo['indtwo']=$industriestwo;
		$getvedio['getvedio']=$vedio;
		$get_hired_hire['get_hired_hire']=$hired_hire;
		$allbanner['banner']=$banner;
		$alllogo['alllogo']=$getlogo;
		$getalluser['getalluser']=$users;
		$gettest['gettest']=$testmonials;
		$alldata=array_merge_recursive($admin,$getvedio,$get_hired_hire,$allbanner,$getfaq,$alllogo,$getalluser,$gettest);
		$this->load->view("templates/casting_calls",$alldata);
	}

}