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
            //$otp = trim($this->param["otp"]);
            if($firstName !='' && $lastName!='' && $email !='' && $mobile !='' && $password !='' ){
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
                // $messagetype='MSG_200_037';
                // $subject='Successfully Registered With Studio Rentals';
                // $mess='';
                // $mess.='<p>Hello  '.$asp['First_Name'].' '.$asp['Last_Name'].' !</p>';
                // $mess.='<p>Welcome to Studio Rentals!</p>';
                // $mess.='<p>Studio Rentals is an all-inclusive platform where you can rent out spaces, equipment and props as well as provide your services and connect with clients or other artists. With us you can build connections within the industry and collaborate with other artists.</p>';
                // $mess.='<p>So, what are you waiting for? Start working on your first ever project with us and meet passionate individuals just like you! </p>';
                // $mess.='<p>If you have any further queries, you can contact us at +919890726666.</p>';
                // // $mess.='<p>You are successfully registered As Studio Rentals. Please click <a href= '.$this->param["verifylink"].base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
                // $mess.='<p>Regards,<br> Team Studio Rentals. </p>';
                // $message=$mess;
                // $mailSendStatus=$this->emailbody(REGISTRATION_EMAIL_STUDIO_RENTALS,'shuklaharsh989@gmail.com',$subject,$message);
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
    // public function forgotPassword_post(){
    //     $email = trim($this->param["E_Mail"]);
    //     //$otp = trim($this->param["otp"]);
    //     $getvalue=$this->Univen_model->validMobileEmailLogin($email);
    //     if($getvalue >= 1){
    //         $getaspdetails=$this->Univen_model->getLoginUserDetailsReg($email);   
    //         $mobile=$getaspdetails['Mobile_No'];
    //         //$otpStatus = $this->otpSendPortfolio($mobile,$otp);
    //         $this->httpOk('MSG_200_057',MSG_200_057);
    //     }
    // }
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
        }else{
            $this->httpOk('MSG_200_062',MSG_200_062);
        }
    }
    // public function reSendOTP_post(){
    //     $email = trim($this->param["E_Mail"]);
    //     //$otp = trim($this->param["otp"]);
    //     $getvalue=$this->Univen_model->validMobileEmailLogin($email);
    //     if($getvalue >= 1){
    //         $getaspdetails=$this->Univen_model->getLoginUserDetailsReg($email);   
    //         $mobile=$getaspdetails['Mobile_No'];
    //         //$otpStatus = $this->otpSendPortfolio($mobile,$otp);
    //         $this->httpOk('MSG_200_059',MSG_200_059);
    //     }
    // }
    public function insertProofOfIdentity_post(){
        $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
        $saveTableData["LEGAL_NAME"] = trim($this->param["LEGAL_NAME"]);
        $saveTableData["TRADE_NAME"] = trim($this->param["TRADE_NAME"]);
        $saveTableData["GSTIN"] = trim($this->param["GSTIN"]);
        $saveTableData["PAN_NUMBER"] = trim($this->param["PAN_NUMBER"]);
        $saveTableData["AADHAR_NUMBER"] = trim($this->param["AADHAR_NUMBER"]);
        $saveTableData["BUSINESS_CONSTITUTION"] = trim($this->param["BUSINESS_CONSTITUTION"]);
        $saveTableData["REGISTRATION_DATE"] = trim($this->param["REGISTRATION_DATE"]);
        $saveTableData["ADDITIONAL_BUSINESS_ADDRESS"] = trim($this->param["ADDITIONAL_BUSINESS_ADDRESS"]);
        $saveTableData["PRINCIPAL_BUSINESS_ADDRESS"] = trim($this->param["PRINCIPAL_BUSINESS_ADDRESS"]);
        $saveTableData["PINCODE"] = trim($this->param["PINCODE"]);
        $saveTableData["COUNTRY"] = trim($this->param["COUNTRY"]);
        $saveTableData["STATE_NAME"] = trim($this->param["STATE_NAME"]);
        $saveTableData["PRINCIPAL_BUSINESS_NATURE"] = trim($this->param["PRINCIPAL_BUSINESS_NATURE"]);
        $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
        $result=$this->Univen_model->saveDataToTable('uni_proof_identity',$saveTableData);
    	   $result?$this->httpOk('MSG_200_052',MSG_200_052):$this->httpOk('MSG_200_053',MSG_200_053);
    }
    public function insertProofOfCommunication_post(){
        $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
        $saveTableData["PRIMARY_EMAIL"] = trim($this->param["PRIMARY_EMAIL"]);
        $saveTableData["PRIMARY_MOBILE"] = trim($this->param["PRIMARY_MOBILE"]);
        $saveTableData["PRIMARY_NAME"] = trim($this->param["PRIMARY_NAME"]);
        $saveTableData["PRIMARY_REGISTERED_MOBILE"] = trim($this->param["PRIMARY_REGISTERED_MOBILE"]);
        $saveTableData["PRIMARY_SIGNATORY"] = trim($this->param["PRIMARY_SIGNATORY"]);
        $saveTableData["WEBSITE"] = trim($this->param["WEBSITE"]);
        $saveTableData["SECONDARY_EMAIL"] = trim($this->param["SECONDARY_EMAIL"]);
        $saveTableData["SECONDARY_MOBILE"] = trim($this->param["SECONDARY_MOBILE"]);
        $saveTableData["SECONDARY_NAME"] = trim($this->param["SECONDARY_NAME"]);
        $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
        $result=$this->Univen_model->saveDataToTable('uni_proof_communication',$saveTableData);
    	   $result?$this->httpOk('MSG_200_052',MSG_200_052):$this->httpOk('MSG_200_053',MSG_200_053);
    }
    public function insertProofOfBanking_post(){
        $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
        $saveTableData["BANK_ACC_NO"] = trim($this->param["BANK_ACC_NO"]);
        $saveTableData["BRANCH"] = trim($this->param["BRANCH"]);
        $saveTableData["IFSC_CODE"] = trim($this->param["IFSC_CODE"]);
        $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
        $result=$this->Univen_model->saveDataToTable('uni_proof_banking',$saveTableData);
    	   $result?$this->httpOk('MSG_200_052',MSG_200_052):$this->httpOk('MSG_200_053',MSG_200_053);
    }
    public function insertProofOfCompliance_post(){
        $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
        $saveTableData["EBILL_STATUS"] = trim($this->param["EBILL_STATUS"]);
        $saveTableData["SECTION_APPLICABILITY"] = trim($this->param["SECTION_APPLICABILITY"]);
        $saveTableData["GSTR_1_IFF_STATUS"] = trim($this->param["GSTR_1_IFF_STATUS"]);
        $saveTableData["MSME_REG_NO"] = trim($this->param["MSME_REG_NO"]);
        $saveTableData["CENTRE_JURISDICTION"] = trim($this->param["CENTRE_JURISDICTION"]);
        $saveTableData["GSTN_STATUS"] = trim($this->param["GSTN_STATUS"]);
        $saveTableData["TAXPAYER_TYPE"] = trim($this->param["TAXPAYER_TYPE"]);
        $saveTableData["MSME_EFFECTIVE_DATE"] = trim($this->param["MSME_EFFECTIVE_DATE"]);
        $saveTableData["EINVOICE_APPLICABILITY"] = trim($this->param["EINVOICE_APPLICABILITY"]);
        
        $saveTableData["TURNOVER"] = trim($this->param["TURNOVER"]);
        $saveTableData["GSTR_3B_STATUS"] = trim($this->param["GSTR_3B_STATUS"]);
        $saveTableData["GST_CANCELLATION_DATE"] = trim($this->param["GST_CANCELLATION_DATE"]);
        $saveTableData["GST_REGISTRATION_DATE"] = trim($this->param["GST_REGISTRATION_DATE"]);
        $saveTableData["STATE_JURISDICTION"] = trim($this->param["STATE_JURISDICTION"]);
        $saveTableData["ANNUAL_AGGR_TURNOVER"] = trim($this->param["ANNUAL_AGGR_TURNOVER"]);
        
        $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
        $result=$this->Univen_model->saveDataToTable('uni_proof_compliance',$saveTableData);
    	   $result?$this->httpOk('MSG_200_052',MSG_200_052):$this->httpOk('MSG_200_053',MSG_200_053);
    }
    public function insertProofOfCatelouge_post(){
        $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
        $saveTableData["BUSINESS_ACTI_NATURE"] = trim($this->param["BUSINESS_ACTI_NATURE"]);
        $saveTableData["TYPE_INDUSTRY"] = trim($this->param["TYPE_INDUSTRY"]);
        $saveTableData["KEY_PRODUCTS_SERVICES"] = trim($this->param["KEY_PRODUCTS_SERVICES"]);
        $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
        $result=$this->Univen_model->saveDataToTable('uni_proof_catelogue',$saveTableData);
    	   $result?$this->httpOk('MSG_200_052',MSG_200_052):$this->httpOk('MSG_200_053',MSG_200_053);
    }
    public function getProofOfIdentity_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_proof_identity';
        $result['result']=$this->Univen_model->getDataFromTable($table,
        $USER_ID);
		$this->httpOkGetResponse($result);
    }
    public function getProofOfCommunication_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_proof_communication';
        $result['result']=$this->Univen_model->getDataFromTable($table,
        $USER_ID);
		$this->httpOkGetResponse($result);
    }
    public function getProofOfBanking_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_proof_banking';
        $result['result']=$this->Univen_model->getDataFromTable($table,
        $USER_ID);
		$this->httpOkGetResponse($result);
    }
    public function getProofOfCompliance_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_proof_compliance';
        $result['result']=$this->Univen_model->getDataFromTable($table,
        $USER_ID);
		$this->httpOkGetResponse($result);
    }
    public function getProofOfCatelouge_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_proof_catelouge';
        $result['result']=$this->Univen_model->getDataFromTable($table,
        $USER_ID);
		$this->httpOkGetResponse($result);
    }
    public function verifyDocuments_post(){
        $data = json_decode(file_get_contents('php://input'),true);
        $type=trim($data['type']);
        $docnumber=trim($data['docnumber']);
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.sandbox.co.in/authenticate",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "x-api-key: key_live_Ra1WpZZYiPmqMV3S5QJ09fMhxaCDq12O",
            "x-api-secret: secret_live_b1Hn69dbA0gXihkL4Ntq6mD0E0eZc1SA",
            "x-api-version: 3.3"
        ],
        ]);
        $responseddd = curl_exec($curl);
        $getdata=json_decode($responseddd, true);
        if($type!=''){
            if($type=='pan'){
                $ch = curl_init('https://api.sandbox.co.in/pans/'.$docnumber.'/verify?consent=y&reason=KYC-Process');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization:".$getdata['access_token']."",
                    "x-api-key: key_live_Ra1WpZZYiPmqMV3S5QJ09fMhxaCDq12O",
                    "x-api-version: 1.0"
                ]);
                curl_exec($ch);
                $responsed = curl_exec($ch);
          

            $getdatass=json_decode($responsed, true);
               
            $this->httpOkGetResponse($getdatass['data']);
            }
            else if($type=='gstin'){
                $ch = curl_init('https://api.sandbox.co.in/gsp/public/gstin/'.$docnumber.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization:".$getdata['access_token']."",
                    "x-api-key: key_live_Ra1WpZZYiPmqMV3S5QJ09fMhxaCDq12O",
                    "x-api-version: 1.0"
                ]);
                curl_exec($ch);
                $responseds = curl_exec($ch);
            $getdatass=json_decode($responseds, true);
            $this->httpOkGetResponse($getdatass['data']['sts']);
            }else{
                $this->httpOkGetResponse('false');
            }
               
        }
       
    }
    //---------------------- ritesh api--------------------
    public function businsessIdentity_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_BUSINESS_IDENTITY_TBL,BUSINESS_IDENTITY_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function dataSharing_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_DATA_SHARING_SUB_HEADINGS_TBL,DATA_SHARING_SUB_HEADINGS_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function faqs_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_CLIENT_MERCHANT_RELATION_TBL,CLIENT_MERCHANT_RELATION_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function ourStory_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_OUR_STORY_TBL,OUR_STORY_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function meetTheTeam_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_MEET_TEAM_TBL,MEET_TEAM_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function clientMerchantRelation_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_CLIENT_MERCHANT_RELATION_TBL,CLIENT_MERCHANT_RELATION_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function subscriptionDetail_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_SUBSCRIPTION_TBL,SUBSCRIPTION_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function proofOfIdentityDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_PROOF_IDENTITY_TBL,PROOF_IDENTITY_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function proofOfCommunicationDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_PROOF_COMMUNICATION_TBL,PROOF_COMMUNICATION_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function proofOfBankingDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_PROOF_BANKING_TBL,PROOF_BANKING_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function proofOfComplianceDetalis_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_PROOF_COMPLIANCE_TBL,PROOF_COMPLIANCE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function proofOfCatelougeDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_PROOF_CATELOUGE_TBL,PROOF_CATELOUGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function startHerePageDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_START_HERE_PAGE_TBL,START_HERE_PAGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function loginPageDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_LOGIN_PAGE_TBL,LOGIN_PAGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function forgotPasswordPageDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_FORGOT_PASSWORD_PAGE_TBL,FORGOT_PASSWORD_PAGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function setNewPasswordPageDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_SET_NEWPASSWORD_PAGE_TBL,SET_NEWPASSWORD_PAGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function registerPageDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_REGISTER_PAGE_TBL,REGISTER_PAGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function otpPageDetails_get(){
       
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_OTP_PAGE_TBL,OTP_PAGE_COL);
        
		$this->httpOkGetResponse($result);
    }
    public function subscriptionPlans_get(){

        $result['result']=$this->Univen_model->getTableData($id);
        
		$this->httpOkGetResponse($result);
    }
    public function my_Entities_List_get(){

        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_ENTITIES_LIST_TBL,ENTITIES_LIST_COL);
        
		$this->httpOkGetResponse($result);
    }
     public function searchCompany_post(){
        $TRADE_NAME['TRADE_NAME']=trim($this->param["company"]);
        $table='uni_proof_identity';
        $selectedColumn = 'USER_ID';
        $USER_ID=$this->Univen_model->likeQueryExecuteMore($table,$TRADE_NAME,$selectedColumn);
        $table1='uni_proof_identity';
        $result['proof_of_identity']=$this->Univen_model->getDataFromTable($table1,
        $USER_ID);
        $table2='uni_proof_communication';
        $result['uni_proof_communication']=$this->Univen_model->getDataFromTable($table2,
        $USER_ID);
        $table3='uni_proof_banking';
        $result['uni_proof_banking']=$this->Univen_model->getDataFromTable($table3,
        $USER_ID);
        $table4='uni_proof_compliance';
        $result['uni_proof_compliance']=$this->Univen_model->getDataFromTable($table4,
        $USER_ID);
        $table5='uni_proof_catelouge';
        $result['uni_proof_catelouge']=$this->Univen_model->getDataFromTable($table5,
        $USER_ID);
		$this->httpOkGetResponse($result);
    }
     public function getComplianceScheduleCalender_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_compliance_schedule';
        $selectedData =array('ID','DATE','COLOR');
        $order ='DATE';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result=$this->Univen_model->getLimitedDataFromTable($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function getComplianceScheduleCalenderDetails_post(){
        $USER_ID=trim($this->param["ID"]);
        $table='uni_compliance_schedule';
        $selectedData =array('ID','COLOR','DATE','COMPLIANCE_SCHEDULE');
        $cond=array('ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result=$this->Univen_model->getRowDataFromTable($table,
        $USER_ID,$selectedData,$cond);
		$this->httpOkGetResponse($result);
    }
   //----------------- Request recieved start ------------------------------//
    public function pendingRequestRecievedCount_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_recieved';
        $selectedData =array('*');
        $order ='ID';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result['Pending Request']=$this->Univen_model->pendingRequestRecievedCount($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
   public function requestRejectedRecievedCount_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_recieved';
        $selectedData =array('*');
        $order ='ID';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result['Request Rejected']=$this->Univen_model->requestRejectedRecievedCount($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function requestFailedRecievedCount_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_recieved';
        $selectedData =array('*');
        $order ='ID';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result['Request Failed']=$this->Univen_model->requestRejectedRecievedCount($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function pendingRequestRecievedDetails_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_recieved';
        $selectedData =array('uni_request_recieved.ID','uni_proof_identity.TRADE_NAME','uni_status.STATUS');
        $order ='ID';
        $cond=array('uni_request_recieved.USER_ID' =>$USER_ID,'uni_request_recieved.REQUEST_STATUS' =>1,'uni_request_recieved.DELETE_FLAG'=>'N','uni_request_recieved.ACTIVE_FLAG'=>'Y');
        $result['Pending Request']=$this->Univen_model->requestRecieved($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
   public function requestRejectedRecievedDetails_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_recieved';
        $selectedData =array('uni_request_recieved.ID','uni_proof_identity.TRADE_NAME','uni_status.STATUS');
        $order ='ID';
        $cond=array('uni_request_recieved.USER_ID' =>$USER_ID,'uni_request_recieved.REQUEST_STATUS' =>2,'uni_request_recieved.DELETE_FLAG'=>'N','uni_request_recieved.ACTIVE_FLAG'=>'Y');
        $result['Request Rejected']=$this->Univen_model->requestRecieved($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function requestFailedRecievedDetails_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_recieved';
        $selectedData =array('uni_request_recieved.ID','uni_proof_identity.TRADE_NAME','uni_status.STATUS');
        $order ='ID';
        $cond=array('uni_request_recieved.USER_ID' =>$USER_ID,'uni_request_recieved.REQUEST_STATUS' =>3,'uni_request_recieved.DELETE_FLAG'=>'N','uni_request_recieved.ACTIVE_FLAG'=>'Y');
        $result['Request Failed']=$this->Univen_model->requestRecieved($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    //----------------- Request recieved end ------------------------------//
    //----------------- Request send start ------------------------------//
    public function pendingRequestSendCount_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_send';
        $selectedData =array('*');
        $order ='ID';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result['Pending Request']=$this->Univen_model->pendingRequestSendCount($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
   public function requestRejectedSendCount_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_send';
        $selectedData =array('*');
        $order ='ID';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result['Request Rejected']=$this->Univen_model->requestRejectedSendCount($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function requestFailedSendCount_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_send';
        $selectedData =array('*');
        $order ='ID';
        $cond=array('USER_ID' =>$USER_ID,'DELETE_FLAG'=>'N','ACTIVE_FLAG'=>'Y');
        $result['Request Failed']=$this->Univen_model->requestRejectedSendCount($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function pendingRequestSendDetails_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_send';
        $selectedData =array('uni_request_send.ID','uni_proof_identity.TRADE_NAME','uni_status.STATUS');
        $order ='ID';
        $cond=array('uni_request_send.USER_ID' =>$USER_ID,'uni_request_send.REQUEST_STATUS' =>1,'uni_request_send.DELETE_FLAG'=>'N','uni_request_send.ACTIVE_FLAG'=>'Y');
        $result['Pending Request']=$this->Univen_model->requestRecievedSend($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
   public function requestRejectedSendDetails_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_send';
        $selectedData =array('uni_request_send.ID','uni_proof_identity.TRADE_NAME','uni_status.STATUS');
        $order ='ID';
        $cond=array('uni_request_send.USER_ID' =>$USER_ID,'uni_request_send.REQUEST_STATUS' =>2,'uni_request_send.DELETE_FLAG'=>'N','uni_request_send.ACTIVE_FLAG'=>'Y');
        $result['Request Rejected']=$this->Univen_model->requestRecievedSend($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    public function requestFailedSendDetails_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $table='uni_request_send';
        $selectedData =array('uni_request_send.ID','uni_proof_identity.TRADE_NAME','uni_status.STATUS');
        $order ='ID';
        $cond=array('uni_request_send.USER_ID' =>$USER_ID,'uni_request_send.REQUEST_STATUS' =>3,'uni_request_send.DELETE_FLAG'=>'N','uni_request_send.ACTIVE_FLAG'=>'Y');
        $result['Request Failed']=$this->Univen_model->requestRecievedSend($table,
        $USER_ID,$selectedData,$cond,$order);
		$this->httpOkGetResponse($result);
    }
    //----------------- Request recieved end ------------------------------//
    public function myStateCodes_post(){

        $STATE=trim($this->param["STATE"]);
        $table='uni_valid_state_codes';
        $result['result']=$this->Univen_model->getStateCodeData($table,
        $STATE);
		$this->httpOkGetResponse($result);
    }
    public function newsNotification_get(){
        $result['result']=$this->Univen_model->getSelectedColumn(UNIVEN_NEWS_NOTIFICATION_TBL,NEWS_NOTIFICATION_COL);
        
		$this->httpOkGetResponse($result);
    }
}
     
