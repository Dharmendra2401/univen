<?php
require APPPATH.'/controllers/API/Common/Common.php';
class Univen extends Common {
   public function login_post(){
        $email = trim($this->param["E_Mail"]);
        $password = trim($this->param["Password"]);
        $getvalue=$this->Univen_model->validEmailLogin($email,$password);
        if($getvalue>0){
            $getaspdetails=$this->Univen_model->getLoginUserDetails($email); 
            //print_r($getaspdetails['USER_ID']);die;  
            $response['mobile_no']=$getaspdetails['Mobile_No'];
            $response['user_id']=$getaspdetails['USER_ID'];
            $response['email']=$getaspdetails['E_Mail'];
            $response['first_name']=$getaspdetails['First_Name'];
            $response['last_name']=$getaspdetails['Last_Name'];
            $this->httpOkGetResponse( $response);
        }else{
            $this->httpOk('MSG_200_056',MSG_200_056);
        }
    }
    public function registration_post(){
        $email = trim($this->param["E_Mail"]);
        $getvalue=$this->Univen_model->validMobileEmailLogin($email);
        //print_r($getvalue);die;
        if($getvalue == 0){
            $firstName = trim($this->param["First_Name"]);
            $lastName = trim($this->param["Last_Name"]);
            $email = trim($this->param["E_Mail"]);
            $mobile = trim($this->param["Mobile_No"]);
            $password = trim($this->param["Password"]);
            $otp = trim($this->param["otp"]);
            if($firstName !='' && $lastName!='' && $email !='' && $mobile !='' && $password !='' && $otp !=''){
                $asp=array();
                $keytable=array();
                $asp_emp=array();
                $comm=array();
                $asp['First_Name']= $firstName;
                $asp['Last_Name']=$lastName;
                $asp['Mobile_No']=$mobile;
                $asp['E_Mail']=$email;
                $asp['Password']=$password;
                $date=date('Y-m-d H:s:i');
                $asp['Record_Inserted_Dttm']=date('Y-m-d h:i:s');
                $userId=$this->portfolioID();
                $keytable['ID']=$userId;
                $keytable['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
                $keytable['Source_Key']=$email;
                $asp_emp['USER_ID']=$userId;
                $asp_emp['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
                $asp_emp['ACTIVE_STATUS']=YES;
                $asp_emp['First_Name']= $firstName;
                $asp_emp['Last_Name']=$lastName;
                $comm['USER_ID']=$userId;
                $comm['Mobile_No']= $mobile;
                $comm['E_Mail']=$email;
                $comm['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
                $comm['ACTIVE_STATUS']=NO;
                //---------  Email start User --------------// 
                $messagetype='MSG_200_037';
                $subject='Successfully Registered With Studio Rentals';
                $mess='';
                $mess.='<p>Hello  '.$asp['First_Name'].' '.$asp['Last_Name'].' !</p>';
                $mess.='<p>Welcome to Studio Rentals!</p>';
                $mess.='<p>Studio Rentals is an all-inclusive platform where you can rent out spaces, equipment and props as well as provide your services and connect with clients or other artists. With us you can build connections within the industry and collaborate with other artists.</p>';
                $mess.='<p>So, what are you waiting for? Start working on your first ever project with us and meet passionate individuals just like you! </p>';
                $mess.='<p>If you have any further queries, you can contact us at +919890726666.</p>';
                // $mess.='<p>You are successfully registered As Studio Rentals. Please click <a href= '.$this->param["verifylink"].base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
                $mess.='<p>Regards,<br> Team Studio Rentals. </p>';
                $message=$mess;
                $mailSendStatus=$this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
                //---------  Email end  --------------// 
                //---------  Email start  Admin--------------// 
                $messagetype='MSG_200_037';
                $subject='A New User has been created Mobile : '.$comm['Mobile_No'];
                $mess='';
                $mess.='<p>A New User '.$asp['First_Name'].' '.$asp['Last_Name'].' has created a profile on studio rentals </p>';
                $mess.='<p> User Details are Mobile : '.$mobile.', '.'Email : '.$asp['E_Mail'].', '.'Type : '.$type;
                // $mess.='<p>You are successfully registered As Studio Rentals. Please click <a href= '.$this->param["verifylink"].base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
                $mess.='<p>Regards,<br> <strong>Team '.WEBSITE_NAME.'</strong> </p>';
                $message=$mess;
                $mailSendStatus=$this->emailbody(REGISTRATION_EMAIL_STUDIO_RENTALS,REGISTRATION_EMAIL_STUDIO_RENTALS,$subject,$message);
                //---------  Email end  --------------// 
                $this->Univen_model->aspregistration($asp, $keytable, $asp_emp, $comm);
                //$otpStatus = $this->otpSendPortfolio($mobile,$otp);
                $result['registrationmessage']=MSG_200_037;
                $getaspdetails=$this->Univen_model->getLoginUserDetailsReg($email);   
                $response['mobile_no']=$getaspdetails['Mobile_No'];
                $response['user_id']=$getaspdetails['USER_ID'];
                $response['email']=$getaspdetails['E_Mail'];
                $response['first_name']=$getaspdetails['First_Name'];
                $response['last_name']=$getaspdetails['Last_Name'];
                $response['otpstatus']=$otpStatus;
                $this->httpOkGetResponse( $response);
            }else{
                $this->httpOk('MSG_200_060',MSG_200_060);
            }
        }else{
            $this->httpOk('MSG_200_005',MSG_200_005);
        }
    }
    public function forgotPassword_post(){
        $email = trim($this->param["E_Mail"]);
        $otp = trim($this->param["otp"]);
        $getvalue=$this->Univen_model->validMobileEmailLogin($email);
        if($getvalue >= 1){
            $getaspdetails=$this->Univen_model->getLoginUserDetailsReg($email);   
            $mobile=$getaspdetails['Mobile_No'];
            $otpStatus = $this->otpSendPortfolio($mobile,$otp);
            $this->httpOk('MSG_200_057',MSG_200_057);
        }
    }
    public function resetPassword_post(){
        $email = trim($this->param["E_Mail"]);
        $getvalue=$this->Univen_model->validMobileEmailLogin($email);
        if($getvalue >= 1){
            $data["Password"] = trim($this->param["Password"]);
            $data['Record_Updated_Dttm']=date('Y-m-d h:i:s');
            $getaspdetails=$this->Univen_model->resetPassword($email,$data);   
            $mobile=$getaspdetails['Mobile_No'];
            $otpStatus = $this->otpSendPortfolio($mobile,$otp);
            $this->httpOk('MSG_200_058',MSG_200_058);
        }
    }
    public function reSendOTP_post(){
        $email = trim($this->param["E_Mail"]);
        $otp = trim($this->param["otp"]);
        $getvalue=$this->Univen_model->validMobileEmailLogin($email);
        if($getvalue >= 1){
            $getaspdetails=$this->Univen_model->getLoginUserDetailsReg($email);   
            $mobile=$getaspdetails['Mobile_No'];
            $otpStatus = $this->otpSendPortfolio($mobile,$otp);
            $this->httpOk('MSG_200_059',MSG_200_059);
        }
    }
}
     