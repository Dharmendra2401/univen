<?php
require APPPATH.'/controllers/API/Common/Common.php';

class Login extends Common
{
    public function login_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $mobile = trim($data["mobilenumber"])??"";
        $type = trim($data["type"])??"";
        $otp = trim($data["otp"])??"";
        $email = trim($data["email"])??"";
        
                $getvalue=$this->Api_model->validMobileLogin($mobile, $type,$email);
                if ($getvalue>0) {
                    $getaspdetails=$this->Api_model->getLoginUserDetails($mobile, $type,$email);    
                    if ($getaspdetails['Mobile_No']!='') {
                        $response['mobile_no']=$getaspdetails['Mobile_No'];
                        $response['user_id']=$getaspdetails['USER_ID'];
                        $response['email']=$getaspdetails['E_Mail'];
                        $response['first_name']=$getaspdetails['First_Name'];
                        $response['last_name']=$getaspdetails['Last_Name'];
                        $response['profile_pic']=$getaspdetails['Profile_Pic'];
                        $response['type']=$getaspdetails['Type_ID'];
                        $response['otpstatus']=$this->otpSend($mobile,$otp,$type);
                    }
                    elseif($getaspdetails['E_Mail']!=''){
                        $response['mobile_no']=$getaspdetails['Mobile_No'];
                        $response['user_id']=$getaspdetails['USER_ID'];
                        $response['email']=$getaspdetails['E_Mail'];
                        $response['first_name']=$getaspdetails['First_Name'];
                        $response['last_name']=$getaspdetails['Last_Name'];
                        $response['profile_pic']=$getaspdetails['Profile_Pic'];
                        $response['type']=$getaspdetails['Type_ID'];
                    }
                   $this->httpOkGetResponse( $response);
                } else {
                  $this->httpOk('MSG_200_004', MSG_200_004);
                   
                }
               
            } 

   
}