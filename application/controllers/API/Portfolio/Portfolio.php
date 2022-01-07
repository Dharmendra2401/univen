<?php
require APPPATH.'/controllers/API/Common/Common.php';
class Portfolio extends Common {
    public function loginPortfolio_post(){
        $otp = trim($this->param["otp"]);
        $mobile = trim($this->param["mobilenumber"]);
        $email = trim($this->param["email"]);
        $otpStatus = $this->otpSendPortfolio($mobile,$otp);
        $getvalue=$this->Portfolio_model->validMobileLogin($mobile,$email);
        if($getvalue>0){
            $getaspdetails=$this->Portfolio_model->getLoginUserDetails($mobile,$email); 
            //print_r($getaspdetails);die;  
            $response['mobile_no']=$getaspdetails['Mobile_No'];
            $response['user_id']=$getaspdetails['USER_ID'];
            $response['email']=$getaspdetails['E_Mail'];
            $response['first_name']=$getaspdetails['First_Name'];
            $response['last_name']=$getaspdetails['Last_Name'];
            $response['otpstatus']=$otpStatus;
            $this->httpOkGetResponse( $response);
        }else{
            $this->httpOk('MSG_200_004',MSG_200_004);
        }
    }
    public function registrationPortfolio_post(){
        $mobile = trim($this->param["mobilenumber"]);
        $getvalue=$this->Portfolio_model->validMobileEmailLogin($mobile);
        if($getvalue == 0){
            $firstName = trim($this->param["firstname"]);
            $lastName = trim($this->param["lastname"]);
            $email = trim($this->param["email"]);
            $type = trim($this->param["TYPE"]);
            $asp=array();
            $keytable=array();
            $user_profile=array();
            $asp_emp=array();
            $comm=array();
            $user_temp=array();
            $asp['First_Name']= $firstName;
            $asp['Last_Name']=$lastName;
            $asp['Mobile_No']=$mobile;
            $asp['E_Mail']=$email;
            $date=date('Y-m-d H:s:i');
            $asp['Record_Inserted_Dttm']=$date;
            $userId=$this->portfolioID();
            $keytable['ID']=$userId;
            $keytable['RECORD_INSERTED_DTTM']=$date;
            $keytable['Source_Key']=$email;
            $asp_emp['USER_ID']=$userId;
            $asp_emp['RECORD_INSERTED_DTTM']=$date;
            $asp_emp['ACTIVE_STATUS']=YES;
            $asp_emp['First_Name']= $firstName;
            $asp_emp['Last_Name']=$lastName;
            $comm['USER_ID']=$userId;
            $comm['Mobile_No']= $mobile;
            $comm['E_Mail']=$email;
            $comm['RECORD_INSERTED_DTTM']=$date;
            $comm['ACTIVE_STATUS']=NO;
            $user_profile['USER_ID']=$userId;
            $user_temp['USER_ID']=$userId;
            $this->Portfolio_model->aspregistration($asp, $keytable, $user_profile, $asp_emp, $comm, $user_temp, $type);
            $result['registrationmessage']=MSG_200_037;
            // $messagetype='MSG_200_037';
            // $subject='Successfully Registered With Studio Rentals';
            // $mess='';
            // $mess.='<p>Dear '.$asp['First_Name'].' '.$asp['Last_Name'].'</p>';
            // $mess.='<p>You are successfully registered As Studio Rentals. Please click <a href= '.$this->param["verifylink"].base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
            // $mess.='<p>Regards,<br> <strong>Team '.WEBSITE_NAME.'</strong> </p>';
            // $message=$mess;
            // $mailSendStatus=$this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
            // $result['mailsendstatus']=$mailSendStatus;
            // $this->httpOk($messagetype, $result);
            $getaspdetails=$this->Portfolio_model->getLoginUserDetails($mobile);   
            $response['mobile_no']=$getaspdetails['Mobile_No'];
            $response['user_id']=$getaspdetails['USER_ID'];
            $response['email']=$getaspdetails['E_Mail'];
            $response['first_name']=$getaspdetails['First_Name'];
            $response['last_name']=$getaspdetails['Last_Name'];
            $response['otpstatus']=$otpStatus;
            $this->httpOkGetResponse( $response);
        }else{
            $this->httpOk('MSG_200_003',MSG_200_003);
        }
    }
    public function insertUpdatePortfolio_post(){
        $USER_ID = trim($this->param["USER_ID"]);
        $pagedata['PORTFOLIO_TYPE'] = trim($this->param["PORTFOLIO_TYPE"]);
        $pagedata['PORTFOLIO_NAME'] = trim($this->param["PORTFOLIO_NAME"]);
        $pagedata['SHOOT_DATE'] = trim($this->param["SHOOT_DATE"]);
        $pagedata['SHOOT_TIME'] = trim($this->param["SHOOT_TIME"]);
        $pagedata['PACKAGE_ID'] = trim($this->param["PACKAGE_ID"]);
        $pagedata['PHOTOGRAPHER_ID'] = trim($this->param["PHOTOGRAPHER_ID"]);
        $pagedata['MAKEUP_ARTIST_ID'] = trim($this->param["MAKEUP_ARTIST_ID"]);
        $pagedata['COSTUME_DESIGNER_ID'] = trim($this->param["COSTUME_DESIGNER_ID"]);
        $pagedata['PORTFOLIO_PRICE'] = trim($this->param["PORTFOLIO_PRICE"]);
        $flag = trim($this->param["flag"]);
        if($flag == 'insert'){
            $pagedata["USER_ID"] = trim($this->param["USER_ID"]);
            $jobbox['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
            $status=$this->Portfolio_model->savePortfolioExecute($pagedata);
            $status?$this->httpOk('MSG_200_020',MSG_200_020):$this->httpOk('MSG_200_021',MSG_200_021);
        }elseif($flag == "update"){
            $jobbox['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
            $status=$this->Portfolio_model->updatePortfolioExecute($pagedata, $USER_ID,$ID);
            $status?$this->httpOk('MSG_200_022',MSG_200_022):$this->httpOk('MSG_200_023',MSG_200_023);
        }
    }
    public function upcommingBookings_get(){
        $USER_ID = trim($this->param["USER_ID"]);
        $data['UpcommingBookings']=$this->Portfolio_model->getUpcommingBookings($USER_ID);
		$this->httpOkGetResponse($data);
    }
    public function pastBookings_get(){
        $USER_ID = trim($this->param["USER_ID"]);
        $data['pastBookings']=$this->Portfolio_model->getPastBookings($USER_ID);
		$this->httpOkGetResponse($data);
    }
    public function createEventClient_post(){
        $pagedata['USER_ID'] = trim($this->param["USER_ID"]);
        $pagedata['EVENT_NAME'] = trim($this->param["EVENT_NAME"]);
        $pagedata['DATE'] = trim($this->param["DATE"]);
        $pagedata['START_TIME'] = trim($this->param["START_TIME"]);
        $pagedata['END_TIME'] = trim($this->param["END_TIME"]);
        $pagedata['NOTE'] = trim($this->param["NOTE"]);
        $pagedata['RECORD_INSERTED_DTTM'] = date('Y-m-d h:i:s');
        $status=$this->Portfolio_model->createEventClientExecute($pagedata);
        $this->httpOk('MSG_200_041',MSG_200_041);
    }
    public function myPlansClient_post(){
        $pagedata['USER_ID'] = trim($this->param["USER_ID"]);
        $pagedata['DATE'] = trim($this->param["DATE"]);
        $pagedata['START_TIME'] = trim($this->param["START_TIME"]);
        $pagedata['END_TIME'] = trim($this->param["END_TIME"]);
        $pagedata['RECORD_INSERTED_DTTM'] = date('Y-m-d h:i:s');
        $status=$this->Portfolio_model->myPlansClientExecute($pagedata);
        $this->httpOk('MSG_200_041',MSG_200_041);
    }

}
     