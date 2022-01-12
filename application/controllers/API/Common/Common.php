<?php
require APPPATH.'/libraries/REST_Controller.php';
require APPPATH.'/views/mailactive/index.php';
use Restserver\Libraries\REST_Controller;

class Common extends REST_Controller
{
    public $param;
    public function __construct(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type,X-Requested-With");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Max-Age: 86400");
        $_SERVER['REQUEST_METHOD'];
        parent::__construct();
        $this->load->database();
        //$this->load->model('Api_model');
        // $this->load->model('ApiBlogModel');
        // $this->load->model('ApiProfilesModel');
        // $this->load->model('Jobbox_model');
        // $this->load->model('Studiorental_model');
        // $this->load->model('Portfolio_model');
        // $this->load->model('StudiorentalArtist_model');
        $this->load->model('Univen_model');
        $this->load->library('Authorization_Token');
        $this->load->library('email');
		$this->load->library('upload');
    	$this->load->library('image_lib');
        $this->param = json_decode(file_get_contents('php://input'), true);
    }
    public function httpOk($messageNumber, $responseMessage){
        $response['status']='success';
        $response['code']=REST_Controller::HTTP_OK;
        $response['messageNumber']=$messageNumber;
        $response['response_message']=$responseMessage;
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function httpOkGetResponse($responseMessage){
        $response['status']='success';
        $response['code']=REST_Controller::HTTP_OK;
        $response['response_message']=$responseMessage;
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function httpOkGetTrue($responseMessage){
        $response['status']='true';
        $response['code']=REST_Controller::HTTP_OK;
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function httpOkGetFalse($responseMessage){
        $response['status']='false';
        $response['code']=REST_Controller::HTTP_OK;
        $this->response($response, REST_Controller::HTTP_OK);
    }
    public function httpNotFound($errorNumber, $responseMessage){
        $response['status']='failure';
        $response['code']=REST_Controller::HTTP_NOT_FOUND;
        $response['errorNumber']=$errorNumber;
        $response['response_message']=$responseMessage;
        $this->response($response, REST_Controller::HTTP_NOT_FOUND);
    }
    public function emailbody($sendfrom, $to, $subject, $message){
        // $mailSendStatus= sendmails($sendfrom, $to, $message, $subject);
        // return $mailSendStatus;
        echo "hello";
        exit();
    }
    public function asp_emp_id(){
		$getcat=$this->Api_model->get_asp_emp_id();
		$str = ltrim($getcat['ID'], '');
		$dge=str_pad(intval($str) + 1, strlen($str), '0', STR_PAD_LEFT);
		if($getcat['ID']==''){$uniqid =$prefix."400001";}else{
			$uniqid =$prefix.$dge;
		}
		return $uniqid;
	}
    public function getPortfolioID(){
        $getid=$this->db->query('SELECT ID from key_univen_users order by ID desc Limit 0,1');
        return $getid->row_array();
        
        
    }
    public function portfolioID(){
		$getcat=$this->getPortfolioID();
		$str = ltrim($getcat['ID'], '');
		$dge=str_pad(intval($str) + 1, strlen($str), '0', STR_PAD_LEFT);
		if($getcat['ID']==''){$uniqid =$prefix."400001";}else{
			$uniqid =$prefix.$dge;
		}
		return $uniqid;
	}
    public function mainPage_get(){
        $adminprofile=array();
        $adminprofile["admin_details"]=$this->Api_model->admin_details();
        $adminprofile["banner"]=$this->Api_model->banner();
        $adminprofile["video"]=$this->Api_model->getvideo();
        $adminprofile["hired_hire"]=$this->Api_model->gethired_hire();
        $adminprofile["faq"]=$this->Api_model->faq();
        $adminprofile["getlogo"]=$this->Api_model->recentemp();
        $adminprofile["users"]=$this->Api_model->usercontent();
        $adminprofile["testmonials"]=$this->Api_model->testimonals();
		$this->httpOkGetResponse($adminprofile);
    }
    public function otpSend($mobile,$otp,$type){
        $mobilenumber='91'.$mobile;
        //   $otp=$otpone.''.$otptwo.''.$otpthree.''.$otpfour;
        $apiKey = urlencode('NzAzN2M4ODJhODQ5YTVhNTJkNWQxY2ExZmMwZGJjYzU=');
        // Message details
        $numbers = array($mobilenumber);
        $sender = urlencode('GLCAIN');
        //$message = rawurlencode('Hello testing');
        //$message = rawurlencode('The One Time Password (OTP) for registration at Cast India is '.$otp.'.Please use this OTP to login. It is only valid for 01.00 minutes. Do not share this code with anyone for security reasons.');
        if(($type==ASPIRANT)||($type==EMPLOYER)){
            $message = rawurlencode('The One Time Password (OTP) for Cast India login is '.$otp.'. Please use this OTP to login. It is only valid for 01:00minutes. Do not share this code with anyone for security reasons.');
        }else{
            $message = rawurlencode('The One Time Password (OTP) for registration at Cast India is '.$otp.'. Do not share this code with anyone for security reasons.');
        }
        //$message = rawurlencode('The One Time Password (OTP) for Cast India login is XXXX. Please use this OTP to login. It isonly valid for XXXXminutes. Do not share this code with anyone for security reasons.');
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
        return $getdata['status'];
    }
    public function getotp_post(){ 
        $mobile = trim($this->param["mobilenumber"]);
        $type = trim($this->param["type"]);
        $otp = trim($this->param["otp"]);
        $response=$this->otpSend($mobile,$otp,$type);
        $this->httpOkGetResponse( $response);
    }
    public function otpSendPortfolio($mobile,$otp){
        $mobilenumber='91'.$mobile;
        //   $otp=$otpone.''.$otptwo.''.$otpthree.''.$otpfour;
        $apiKey = urlencode('NzAzN2M4ODJhODQ5YTVhNTJkNWQxY2ExZmMwZGJjYzU=');
        // Message details
        $numbers = array($mobilenumber);
        $sender = urlencode('GLCAIN');
        //$message = rawurlencode('Hello testing');
        //$message = rawurlencode('The One Time Password (OTP) for registration at Cast India is '.$otp.'.Please use this OTP to login. It is only valid for 01.00 minutes. Do not share this code with anyone for security reasons.');
        $message = rawurlencode('The One Time Password (OTP) for Cast India login is '.$otp.'. Please use this OTP to login. It is only valid for 01:00minutes. Do not share this code with anyone for security reasons.');
        //$message = rawurlencode('The One Time Password (OTP) for Cast India login is XXXX. Please use this OTP to login. It isonly valid for XXXXminutes. Do not share this code with anyone for security reasons.');
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
        return $getdata['status'];
    }
}
