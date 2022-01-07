<?php
require APPPATH.'/controllers/API/Common/Common.php';
class Studiorental extends Common {
   public function loginStudiorental_post(){
        $otp = trim($this->param["otp"]);
        $mobile = trim($this->param["mobilenumber"]);
        $email = trim($this->param["email"]);
        $otpStatus = $this->otpSendPortfolio($mobile,$otp);
        $getvalue=$this->Studiorental_model->validMobileLogin($mobile,$email);
        if($getvalue>0){
            $getaspdetails=$this->Studiorental_model->getLoginUserDetails($mobile,$email); 
            //print_r($getaspdetails['USER_ID']);die;  
            $response['mobile_no']=$getaspdetails['Mobile_No'];
            $response['user_id']=$getaspdetails['USER_ID'];
            $data=$this->Studiorental_model->getProfileId($getaspdetails['USER_ID']); 
            $data1=$this->Studiorental_model->getformtemp($data); 
            $data2=$this->Studiorental_model->getProfileName($data); 
            $response['form_temp']=$data1;
            $response['profile_id']=$data;
            $response['profile_name']=$data2;
            $response['email']=$getaspdetails['E_Mail'];
            $response['first_name']=$getaspdetails['First_Name'];
            $response['last_name']=$getaspdetails['Last_Name'];
            $response['otpstatus']=$otpStatus;
            $this->httpOkGetResponse( $response);
        }else{
            $this->httpOk('MSG_200_004',MSG_200_004);
        }
    }
     public function checkemail_post(){
        $email = trim($this->param["email"]);
        $getvalue=$this->Studiorental_model->validemail($email);
        $this->httpOkGetResponse($getvalue);
    }
    public function registrationStudiorental_post(){
        $mobile = trim($this->param["mobilenumber"]);
        $email = trim($this->param["email"]);
        $getvalue=$this->Studiorental_model->validMobileEmailLogin($mobile,$email);
        //print_r($getvalue);die;
        if($getvalue == 0){
            $firstName = trim($this->param["firstname"]);
            $lastName = trim($this->param["lastname"]);
            $email = trim($this->param["email"]);
            $type = trim($this->param["TYPE"]);
            $profile = trim($this->param["PROFILE_ID"]);
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
            $asp['TYPE_OF_REGISTRATION']=$type;
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
            $this->Studiorental_model->aspregistration($asp, $keytable, $user_profile, $asp_emp, $comm, $user_temp, $type, $profile);
            $result['registrationmessage']=MSG_200_037;
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
            $getaspdetails=$this->Studiorental_model->getLoginUserDetailsReg($mobile);   
            $response['mobile_no']=$getaspdetails['Mobile_No'];
            $response['user_id']=$getaspdetails['USER_ID'];
            $response['email']=$getaspdetails['E_Mail'];
            $response['first_name']=$getaspdetails['First_Name'];
            $response['last_name']=$getaspdetails['Last_Name'];
            $response['i_am_a'] = $this->Studiorental_model->getProfileNameByID($getaspdetails['PROFILE_ID']);   
            $response['form_type'] = $this->Studiorental_model->getFormByID($getaspdetails['PROFILE_ID']);   
            $response['otpstatus']=$otpStatus;
            $this->httpOkGetResponse( $response);
        }else{
            $this->httpOk('MSG_200_004',MSG_200_004);
        }
    }
    public function getAllProfile_get(){
		$blogs['getAllProfile']=$this->Studiorental_model->getProfileList();
		$this->httpOkGetResponse($blogs);
	}
    public function insertUpdateStudiorental_post(){
        $USER_ID = trim($this->param["USER_ID"]);
        $columnDataPROJECT = trim($this->param["PROJECT_TYPE"]);
        $PROJECTS = explode (",", $columnDataPROJECT); 
        foreach ($PROJECTS as $PROJECT) {
            $PROJECTSs[] = $this->Studiorental_model->getIDByIfValueExist('project_type_studio_rentals','PROJECT_NAME',$PROJECT);
        }
        $pagedata['PROJECT_TYPE'] = implode(",",$PROJECTSs);
        $columnDataEXPERTISE = trim($this->param["EXPERTISE"]);
        $EXPERTISES = explode (",", $columnDataEXPERTISE); 
        foreach ($EXPERTISES as $EXPERTISE) {
            $EXPERTISESs[] = $this->Studiorental_model->getIDByIfValueExist('expertise','EXPERTISE',$EXPERTISE);
        }
        $pagedata['EXPERTISE'] = implode(",",$EXPERTISESs);

        $columnDataCLIENT = trim($this->param["CLIENT"]);
        $CLIENTS = explode (",", $columnDataCLIENT); 
        foreach ($CLIENTS as $CLIENT) {
            $CLIENTs[] = $this->Studiorental_model->getIDByIfValueExist('studio_rentals_client','CLIENT',$CLIENT);
        }
        $pagedata['CLIENT'] = implode(",",$CLIENTs);
        $columnDataINVENTRY = trim($this->param["INVENTRY_TYPE"]);
        $INVENTRIES = explode (",", $columnDataINVENTRY); 
        foreach ($INVENTRIES as $INVENTRY) {
            $INVENTRYs[] = $this->Studiorental_model->getIDByIfValueExist('inventry_type','INVENTRY_NAME',$INVENTRY);
        }
        $pagedata['INVENTRY_TYPE'] = implode(",",$INVENTRYs);
        $PROFILE_ID = trim($this->param["PROFILE_ID"]);
        $pagedata['PROFILE_ID'] = $PROFILE_ID;
        $pagedata['EXPERIENCE'] = trim($this->param["EXPERIENCE"]);
        $pagedata['WORK_LOCATION'] = trim($this->param["WORK_LOCATION"]);
        $pagedata['ABOUT_ME'] = trim($this->param["ABOUT_ME"]);
        $imgs= trim($this->param["IMAGES"]);
        $pagedata['PAY_PER_SIFT'] = trim($this->param["PAY_PER_SIFT"]);
        $pagedata['RENT'] = trim($this->param["RENT"]);
        $pagedata['STUDIO_SIZE'] = trim($this->param["STUDIO_SIZE"]);
        $validateID = $this->Studiorental_model->validateUSER_ID($USER_ID);
        $imgss=explode(' @@@@ ',$imgs);
        $url='';
        $i=0;
        $gettype='';
        foreach( $imgss  as  $img ){
            $geturl='';
        $gettypes= explode(',',$img);
        $gettypeone=$gettypes[0];
        $cropped_image = $img;
        list($type, $cropped_image) = explode(';', $cropped_image);
        list(, $cropped_image) = explode(',', $cropped_image);
        $cropped_image = base64_decode($cropped_image);
        $imageurl2='uploads/studiobinder/';
         if($gettypeone=='mp3'){
            $name = date('ymdgis').$i.'.mp3';  
        }elseif($gettypeone=='mp4'){
            $name = date('ymdgis').$i.'.mp4';
        }elseif($gettypeone=='doc'){
            $name = date('ymdgis').$i.'.doc';
        }elseif($gettypeone=='pdf'){
            $name = date('ymdgis').$i.'.pdf';
        }elseif($gettypeone=='jpeg'){
            $name = date('ymdgis').$i.'.jpeg';
        }elseif($gettypeone=='png'){
            $name = date('ymdgis').$i.'.png';
        }elseif($gettypeone=='avi'){
            $name = date('ymdgis').$i.'.avi';
        }elseif($gettypeone=='aac'){
            $name = date('ymdgis').$i.'.aac';
        }else{
            $name = date('ymdgis').$i.'.jpg';
        }
        $ext=explode(".",$name);
        $url.=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]).',';
        $imgname=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
        file_put_contents($imageurl2.''.$imgname,$cropped_image);
        $i++;
         }
        $pagedata['IMAGES'] = rtrim($url,',');
        if($validateID>0){
            $pagedata['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
            $status=$this->Studiorental_model->updateStudiorentalProfileExecute($PROFILE_ID, $USER_ID);
            $status=$this->Studiorental_model->updateStudiorentalProfileMappingExecute($PROFILE_ID, $USER_ID);
            $status=$this->Studiorental_model->updateStudiorentalExecute($pagedata, $USER_ID);
            $status?$this->httpOk('MSG_200_040',MSG_200_039):$this->httpOk('MSG_200_040',MSG_200_039);
        }else{
            $pagedata["USER_ID"] = trim($this->param["USER_ID"]);
            $pagedata['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
            $status=$this->Studiorental_model->updateStudiorentalProfileExecute($PROFILE_ID, $USER_ID);
            $status=$this->Studiorental_model->updateStudiorentalProfileMappingExecute($PROFILE_ID, $USER_ID);
            $status=$this->Studiorental_model->saveStudiorentalExecute($pagedata);
            $status?$this->httpOk('MSG_200_039',MSG_200_039):$this->httpOk('MSG_200_039',MSG_200_039);
        }
    }
	public function addProject_post(){
        $columnDataPROJECT = trim($this->param["PROJECT_TYPE"]);
        $PROFILE_ID = trim($this->param["PROFILE_ID"]);
        $PROJECTS = explode (",", $columnDataPROJECT); 
        foreach ($PROJECTS as $PROJECT) {
            $PROJECTSs[] = $this->Studiorental_model->getIDByIfValueInsert('project_type_studio_rentals','PROJECT_NAME',$PROJECT,$PROFILE_ID);
        }
    }
    public function checkProjectExistOrNot_post(){
        $getvalue=$this->Studiorental_model->ProjectExistOrNot(trim($this->param["PROJECT_TYPE"]),trim($this->param["PROFILE_ID"]));
        print_r($getvalue);
    }
    public function checkExpertiseExistOrNot_post(){
        $getvalue=$this->Studiorental_model->ExpertiseExistOrNot(trim($this->param["EXPERTISE"]));
        print_r($getvalue);
    }
    public function checkClientExistOrNot_post(){
        $getvalue=$this->Studiorental_model->ClientExistOrNot(trim($this->param["CLIENT"]));
        print_r($getvalue);
    }
    public function addExpertise_post(){
        $columnDataEXPERTISE = trim($this->param["EXPERTISE"]);
        $EXPERTISES = explode (",", $columnDataEXPERTISE); 
        foreach ($EXPERTISES as $EXPERTISE) {
            $EXPERTISESs[] = $this->Studiorental_model->getIDByIfValueInsertExpertise('expertise','EXPERTISE',$EXPERTISE);
        }
    }
    public function addClient_post(){
        $columnDataCLIENT = trim($this->param["CLIENT"]);
        $CLIENTS = explode (",", $columnDataCLIENT); 
        foreach ($CLIENTS as $CLIENT){
            $CLIENTSs[] = $this->Studiorental_model->getIDByIfValueInsertExpertise('studio_rentals_client','CLIENT',$CLIENT);
        }
    }
    public function addInventry_post(){
        $columnDataINVENTRY = trim($this->param["INVENTRY_NAME"]);
        $PROFILE_ID = trim($this->param["PROFILE_ID"]);
        $INVENTRIES = explode (",", $columnDataINVENTRY); 
        foreach ($INVENTRIES as $INVENTRY) {
            $INVENTRIESs[] = $this->Studiorental_model->getIDByIfValueInsert('inventry_type','INVENTRY_NAME',$INVENTRY,$PROFILE_ID);
        }
    }
    public function checkInvenrtyExistOrNot_post(){
        $getvalue=$this->Studiorental_model->InventryExistOrNot(trim($this->param["INVENTRY_NAME"]));
        print_r($getvalue);
    }
	public function getExperienceData_post(){
		$searchParam=trim($this->param["EXPERIENCE"]);
        $table='experience';
        $selectedColumn='EXPERIENCE_RANGE';
        $result['result']=$this->Studiorental_model->likeQueryExecute($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
   public function getExpertiseData_post(){
		$searchParam=trim($this->param["EXPERTISE"]);
        $table='expertise';
        $selectedColumn='EXPERTISE';
        $result['result']=$this->Studiorental_model->likeQueryExecute($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getCleintData_post(){
		$searchParam=trim($this->param["CLIENT"]);
        $table='studio_rentals_client';
        $selectedColumn='CLIENT';
        $result['result']=$this->Studiorental_model->likeQueryExecute($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getLocationData_post(){
		$searchParam=trim($this->param["pincode"]);
        $table='states_city_country';
        $selectedColumn='pincode';
        $result['result']=$this->Studiorental_model->likeQueryLocation($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getAllProfile_post(){
		$searchParam=trim($this->param["PROFILE_NAME"]);
        $FORM_TYPE=trim($this->param["FORM_TYPE"]);
        $table='studio_rentals_profile';
        $selectedColumn='PROFILE_NAME';
        $result['result']=$this->Studiorental_model->likeQueryProfile($table,$selectedColumn,$searchParam,$FORM_TYPE);
		$this->httpOkGetResponse($result);
    }
    public function getAllProject_post(){
		$searchParam=trim($this->param["PROJECT_NAME"]);
        $profile=trim($this->param["PROFILE_ID"]);
        $table='project_type_studio_rentals';
        $selectedColumn='PROJECT_NAME';
        $result['result']=$this->Studiorental_model->likeQueryExecuteMore($table,$selectedColumn,$searchParam,$profile);
		$this->httpOkGetResponse($result);
    }
    public function getInventryType_post(){
		$searchParam=trim($this->param["INVENTRY_NAME"]);
        $profile=trim($this->param["PROFILE_ID"]);
        $table='inventry_type';
        $selectedColumn='INVENTRY_NAME';
        $result['result']=$this->Studiorental_model->likeQueryExecuteMore($table,$selectedColumn,$searchParam,$profile);
		$this->httpOkGetResponse($result);
    }
     public function getValidateRental_post(){
        $USER_ID = trim($this->param["USER_ID"]);
        $form = trim($this->param["form_type"]);
        if($form == 0){
            $this->httpOkGetTrue($response);
        }elseif($form == 1){
            $ValidateRental=$this->Studiorental_model->getValidateRental($USER_ID);
            if($ValidateRental['PROFILE_ID'] == '' || $ValidateRental['PROJECT_TYPE'] == '' || $ValidateRental['EXPERTISE'] == '' || $ValidateRental['WORK_LOCATION'] == '' || $ValidateRental['ABOUT_ME'] == '' || $ValidateRental['IMAGES'] == '' || $ValidateRental['PAY_PER_SIFT'] == '' || $ValidateRental['EXPERIENCE'] == ''){
                $this->httpOkGetFalse($response);
            }else{
                $this->httpOkGetTrue($response);
            }
        }elseif($form == 2){
            $ValidateRental=$this->Studiorental_model->getValidateRental($USER_ID);
            if($ValidateRental['PROFILE_ID'] == '' || $ValidateRental['PROJECT_TYPE'] == '' || $ValidateRental['EXPERTISE'] == '' || $ValidateRental['WORK_LOCATION'] == '' || $ValidateRental['ABOUT_ME'] == '' || $ValidateRental['IMAGES'] == '' || $ValidateRental['PAY_PER_SIFT'] == '' || $ValidateRental['EXPERIENCE'] == ''){
                $this->httpOkGetFalse($response);
            }else{
                $this->httpOkGetTrue($response);
            }
        }elseif($form == 3){
            $ValidateRental=$this->Studiorental_model->getValidateRental($USER_ID);
            if($ValidateRental['PROFILE_ID'] == '' || $ValidateRental['RENT'] == '' || $ValidateRental['STUDIO_SIZE'] == '' || $ValidateRental['WORK_LOCATION'] == '' || $ValidateRental['ABOUT_ME'] == '' || $ValidateRental['IMAGES'] == '' || $ValidateRental['INVENTRY_TYPE'] == '' ){
                $this->httpOkGetFalse($response);
            }else{
                $this->httpOkGetTrue($response);
            }
        }elseif($form == 4){
            $ValidateRental=$this->Studiorental_model->getValidateRental($USER_ID);
            if($ValidateRental['PROFILE_ID'] == '' || $ValidateRental['EXPERTISE'] == '' || $ValidateRental['WORK_LOCATION'] == '' || $ValidateRental['ABOUT_ME'] == ''    || $ValidateRental['INVENTRY_TYPE'] == '' || $ValidateRental['EXPERIENCE'] == ''){
                $this->httpOkGetFalse($response);
            }else{
                $this->httpOkGetTrue($response);
            }
        }elseif($form == 5){
            $ValidateRental=$this->Studiorental_model->getValidateRental($USER_ID);
            if($ValidateRental['PROFILE_ID'] == '' || $ValidateRental['PROJECT_TYPE'] == '' || $ValidateRental['EXPERTISE'] == '' || $ValidateRental['WORK_LOCATION'] == '' || $ValidateRental['ABOUT_ME'] == '' || $ValidateRental['IMAGES'] == '' || $ValidateRental['PAY_PER_SIFT'] == '' || $ValidateRental['EXPERIENCE'] == ''){
                $this->httpOkGetFalse($response);
            }else{
                $this->httpOkGetTrue($response);
            }
        }
	}
	
	public function insertRentMySpaceStudio_post(){
	    $saveDataTable["USER_ID"] = trim($this->param["USER_ID"]);
	    $saveDataTable['STUDIO_SPACE_NAME'] = trim($this->param["STUDIO_SPACE_NAME"]);
	    $saveDataTable['PINCODE'] = trim($this->param["PINCODE"]);
	    $saveDataTable['STUDIO_SPACE_LOCATION'] = trim($this->param["STUDIO_SPACE_LOCATION"]);
	    $saveDataTable['STUDIO_OR_SPACE_ID'] = trim($this->param["STUDIO_OR_SPACE_ID"]);
	    $saveDataTable['TYPE_IDS'] = trim($this->param["TYPE_IDS"]);
        $saveDataTable['DETAILS'] = trim($this->param["DETAILS"]);
	    $saveDataTable['DIMENSIONS'] = trim($this->param["DIMENSIONS"]);
	    $saveDataTable['PARKING_ID'] = trim($this->param["PARKING_ID"]);
	    $saveDataTable['PARKING_DETAILS'] = trim($this->param["PARKING_DETAILS"]);
	    $saveDataTable['SURVEILANCE_DEVICES_ID'] = trim($this->param["SURVEILANCE_DEVICES_ID"]);
	    $saveDataTable['RATE'] = trim($this->param["RATE"]);
	    $saveDataTable['DEPOSIT'] = trim($this->param["DEPOSIT"]);
	    $saveDataTable['RULES_BY_THE_HOST'] = trim($this->param["RULES_BY_THE_HOST"]);
	    $saveDataTable['CLEANING'] = trim($this->param["CLEANING"]);
	    $saveDataTable['AVAILABLE_START_TIME'] = trim($this->param["AVAILABLE_START_TIME"]);
	    $saveDataTable['AVAILABLE_END_TIME'] = trim($this->param["AVAILABLE_END_TIME"]);
	    $saveDataTable['AVALIABLE_DAYS_IDS'] = trim($this->param["AVALIABLE_DAYS_IDS"]);
	    $saveDataTable['ASSISTANCE_ID'] = trim($this->param["ASSISTANCE_ID"]);
	    $saveDataTable['AMENITIES_IDS'] = trim($this->param["AMENITIES_IDS"]);
	    $saveDataTable['PROPS'] = trim($this->param["PROPS"]);
	    $saveDataTable['EQUIPMENT'] = trim($this->param["EQUIPMENT"]);
	    $saveDataTable['FEATURES_IDS'] = trim($this->param["FEATURES_IDS"]);
	    $saveDataTable['OTHERS'] = trim($this->param["OTHERS"]);
        $imgss=explode(' @@@@ ',$imgs);
        $url='';
        $i=0;
        $gettype='';
        foreach( $imgss  as  $img ){
            $geturl='';
        $gettypes= explode(',',$img);
        $gettypeone=$gettypes[0];
        $cropped_image = $img;
        list($type, $cropped_image) = explode(';', $cropped_image);
        list(, $cropped_image) = explode(',', $cropped_image);
        $cropped_image = base64_decode($cropped_image);
        $imageurl2='uploads/studiobinder/';
         if($gettypeone=='mp4'){
            $name = date('ymdgis').$i.'.mp4';  
        }elseif($gettypeone=='jpeg'){
            $name = date('ymdgis').$i.'.jpeg';
        }elseif($gettypeone=='png'){
            $name = date('ymdgis').$i.'.png';
        }elseif($gettypeone=='avi'){
            $name = date('ymdgis').$i.'.avi';
        }else{
            $name = date('ymdgis').$i.'.jpg';
        }
        $ext=explode(".",$name);
        $url.=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]).',';
        $imgname=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
        file_put_contents($imageurl2.''.$imgname,$cropped_image);
        $i++;
         }
        $saveDataTable['IMAGES_VIDEOS'] = rtrim($url,',');
        $saveDataTable['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
        $status=$this->Studiorental_model->saveDataToTable('studio_space',$saveDataTable);
        $status?$this->httpOk('MSG_200_045',MSG_200_045):$this->httpOk('MSG_200_046',MSG_200_046);
	}
	
	public function getStudioTypeOrSpaceType_post(){
	    if(trim($this->param["TYPE"])=="Space"){
	    $table='studio_space_type';
        $selectedColumn='TYPE_NAME';
	    }else{
	    $table='studio_type';
        $selectedColumn='TYPE_NAME'; 
	    }
        $result['result']=$this->Studiorental_model->getSelectedColumn($table,$selectedColumn);
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioSpaceAmenities_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_space_amenities','AMENITIES_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioSpaceFeatures_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_space_features','FEATURES_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioType_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_type','TYPE_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioSpaceType_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_space_type','TYPE_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioFormTime_post(){
		$searchParam=trim($this->param["TIME"]);
        $table='studio_form_time';
        $selectedColumn='TIMING_NAME';
        $result['result']=$this->Studiorental_model->likeQueryExecute($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioAvailabilityDays_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_availability_days','DAYS_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioSpaceFormType_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_space_form_type','TYPE_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioFormYesNo_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_form_yes_no','TYPE_NAME');
		$this->httpOkGetResponse($result);
    }
    
    public function getStudioFormAssistance_get(){
        $result['result']=$this->Studiorental_model->getSelectedColumn('studio_form_assistance','ASSISTANCE_NAME');
		$this->httpOkGetResponse($result);
    }

    public function getCardDetail_post(){
        $TypeIds=trim($this->param["TYPE_IDS"]);
        $StudioOrSpaceId=trim($this->param["STUDIO_SPACE_ID"]);
        $AmenitiesIds=trim($this->param["AMENITIES_IDS"]);
        $byBudgetMin=trim($this->param["BY_BUDGET_MIN"]);
        $byBudgetMax=trim($this->param["BY_BUDGET_MAX"]);
        $result['result']=$this->Studiorental_model->getCardDetailList(trim($this->param["SEARCH_BY"]),$StudioOrSpaceId,$TypeIds,$AmenitiesIds, $byBudgetMin,$byBudgetMax);
		$this->httpOkGetResponse($result);
    }
    
    public function getAllProjectType_post(){
		$searchParam=trim($this->param["PROJECT_TYPE"]);
        $table='project_type_studio_rentals';
        $selectedColumn='PROJECT_NAME';
        $result['result']=$this->Studiorental_model->likeQueryExecute($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getStudioSpaceDetail_post(){
        $result['result']=$this->Studiorental_model->getStudioSpaceDetailList(trim($this->param["ID"]));
        foreach ($result as $key) {
            
            $typeTable=($key['STUDIO_OR_SPACE_NAME']=="Studio")?"studio_type":"studio_space_type";
            
            $selectedItems[] = array('TYPE_NAME',$typeTable,$key['TYPE_IDS']);
            $selectedItems[] = array(FEATURES_NAME_COL,STUDIO_SPACE_FEATURES_TBL,$key["FEATURES_IDS"]);
            $selectedItems[] = array(AMENITIES_NAME_COL,STUDIO_SPACE_AMENITIES_TBL,$key["AMENITIES_IDS"]);
            $selectedItems[] = array(DAYS_NAME_COL,STUDIO_AVAILABILITY_DAYS_TBL,$key["AVALIABLE_DAYS_IDS"]);
            $selectedItems[] = array(PROJECT_NAME,project_type_studio_rentals,$key["PROJECT_TYPE"]);
            $selectedItems[] = array(EXPERTISE,expertise,$key["EXPERTISE"]);
            $selectedItems[] = array(CLIENT,studio_rentals_client,$key["CLIENT"]);
            $selectedCity[] = array(city,states_city_country,$key["WORK_LOCATION"]);
            $selectedCity[] = array(state,states_city_country,$key["WORK_LOCATION"]);
            
            foreach ($selectedCity as $selectedCi) {
                $keyValueC[$selectedCi['0']]= $this->Studiorental_model->getCityStateByPincode($selectedCi['0'], $selectedCi['1'], $selectedCi['2']);
            }
            
            foreach ($selectedItems as $selectedItem) {
                $keyValue[$selectedItem['0']]= $this->Studiorental_model->getAllNameValue($selectedItem['0'], $selectedItem['1'], $selectedItem['2']);
            }
        
        $data[] = array(
                'ID'=>$key['ID'],
                'STUDIO_SPACE_NAME'=>$key['STUDIO_SPACE_NAME']??"",
                'STUDIO_SPACE_LOCATION'=>$key['STUDIO_SPACE_LOCATION'],
                'STUDIO_OR_SPACE_NAME'=>$key['STUDIO_OR_SPACE_NAME'],
                'DETAILS'=>$key['DETAILS'],
                'DIMENSIONS'=>$key['DIMENSIONS'],
                'PARKING_DETAILS'=>$key['PARKING_DETAILS'],
                'RATE'=>$key['RATE'],
                'DEPOSIT'=>$key['DEPOSIT'],
                'RULES_BY_THE_HOST'=>$key['RULES_BY_THE_HOST'],
                'CLEANING'=>$key['CLEANING'],
                'PROPS'=>$key['PROPS'],
                'EQUIPMENT'=>$key['EQUIPMENT'],
                'OTHERS'=>$key['OTHERS'],
                'IMAGES_VIDEOS'=>$key['IMAGES_VIDEOS'],
                'PARKING'=>$key['PARKING'],
                'SURVEILANCE_DEVICES'=>$key['SURVEILANCE_DEVICES'],
                'START_TIME'=>$key['START_TIME'],
                'END_TIME'=>$key['END_TIME'],
                'ASSISTANCE_NAME'=>$key['ASSISTANCE_NAME'],
                'FEATURES_NAME'=>$keyValue[FEATURES_NAME_COL],
                'AMENITIES_NAME'=>$keyValue[AMENITIES_NAME_COL],
                'DAYS_NAME'=>$keyValue[DAYS_NAME_COL],
                'TYPE_NAME'=>$keyValue['TYPE_NAME'],
                'SELLER_FIRST_NAME'=>$key['First_Name'],
                'SELLER_LAST_NAME'=>$key['Last_Name'],
                'SELLER_EMAIL'=>$key['E_Mail'],
                'SELLER_MOBILE_NO'=>$key['Mobile_No'],
                'SELLER_CITY'=>$keyValueC[city],
                'SELLER_STATE'=>$keyValueC[state],
                'SELLER_ABOUT'=>$key['ABOUT_ME'],
                'SELLER_PROJECT_TYPE'=>$keyValue[PROJECT_NAME],
                'SELLER_EXPERTISE'=>$keyValue[EXPERTISE],
                'SELLER_CLIENT'=>$keyValue[CLIENT],
                
            );
        
        $response['result']  = $data; 
        }
         $this->httpOkGetResponse($response);
    }
    public function getProjectNameList_post(){
        $userid=trim($this->param["USER_ID"]);
        $searchParam=trim($this->param["SEARCH"]);
        $table='studio_project';
        $selectedColumn='PROJECT_NAME';
        $result['result']=$this->Studiorental_model->likeQueryExecuteUserId($table,$selectedColumn,$userid,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function insertStudioProject_post(){
	    $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
	    $saveTableData['PROJECT_NAME'] = trim($this->param["PROJECT_NAME"]);
	    $saveTableData['PROJECT_DESCRIPTION'] = trim($this->param["PROJECT_DESCRIPTION"]);
	    $saveTableData['PROJECT_TYPE'] = trim($this->param["PROJECT_TYPE"]);
	    $saveTableData['START_DATE'] = trim($this->param["START_DATE"]);
	    $saveTableData['END_DATE'] = trim($this->param["END_DATE"]);
        $saveTableData['START_TIME'] = trim($this->param["START_TIME"]);
	    $saveTableData['END_TIME'] = trim($this->param["END_TIME"]);
	    $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
	    $saveTableData["USER_ID"] = $saveTableData["USER_ID"];
	    $saveTableData2['FLEXIBLE_WITH_DATE_TIME'] = trim($this->param["FLEXIBLE_WITH_DATE_TIME"]);
	    $saveTableData2['STUDIO_SPACE_NAME_ID'] = trim($this->param["STUDIO_SPACE_NAME_ID"]);
	    $saveTableData2['ESTIMATED_TOTAL_NUMBER_SHIFT'] = trim($this->param["ESTIMATED_TOTAL_NUMBER_SHIFT"]);
	    $saveTableData2['ESTIMATED_TOTAL_AMOUNT'] = trim($this->param["ESTIMATED_TOTAL_AMOUNT"]);
	    $saveTableData2['NOTE_TO_THE_OWNER'] = trim($this->param["NOTE_TO_THE_OWNER"]);
	    
	    $desireCond=array('USER_ID'=>$saveTableData["USER_ID"],'PROJECT_NAME'=>$saveTableData['PROJECT_NAME']);
	    $id=$this->Studiorental_model->checkDuplicateValueTwoParam('studio_project',$desireCond);
	    if(empty($id)){
	        $id=$this->Studiorental_model->saveDataToTable('studio_project',$saveTableData);
	    }
	    $saveTableData2['PROJECT_NAME_ID']=$id;
	    $desireCond=array('PROJECT_NAME_ID'=>$id,'STUDIO_SPACE_NAME_ID'=>$saveTableData2['STUDIO_SPACE_NAME_ID']);
	    $smid=$this->Studiorental_model->checkDuplicateValueTwoParam('studio_project_space_mapping',$desireCond);
	    if(empty($smid)){
	        $saveTableData2['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
	        $smid=$this->Studiorental_model->saveDataToTable('studio_project_space_mapping',$saveTableData2);
	   $smid?$this->httpOk('MSG_200_047',MSG_200_047):$this->httpOk('MSG_200_048',MSG_200_048);
	    } else{
	        $saveTableData2['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
	       $status=$this->Studiorental_model->UpdateTableExecute('studio_project_space_mapping',$saveTableData2,$smid);
	         $status?$this->httpOk('MSG_200_049',MSG_200_049):$this->httpOk('MSG_200_050',MSG_200_050);
	    }
	}
	public function getArtistProfile_post(){
        $FORM_TYPE=trim($this->param["FORM_TYPE"]);
        $result['result']=$this->Studiorental_model->getArtistProfile($FORM_TYPE);
		$this->httpOkGetResponse($result);
	}
	public function filterArtist_post(){
	    $SORT_BY = trim($this->param["SORT_BY"]);
	    $PROFILE = trim($this->param["PROFILE"]);
        $search = trim($this->param["SEARCH"]);
        $FORM_TYPE=trim($this->param["FORM_TYPE"]);
        $table='studio_rentals_profile';
        $selectedColumn='PROFILE_NAME';
        //$CityName['CityName']=$this->Studiorental_model->getCityName();
        //print_r($CityName);die;
        $allProfile=$this->Studiorental_model->getArtistProfile($FORM_TYPE);
        $username=$this->Studiorental_model->getUserIdByName($search);
        $profileid=$this->Studiorental_model->getProfileIdByName($search);
        $result['result']=$this->Studiorental_model->filterArtist($search,$username,$profileid,$allProfile,$PROFILE,$SORT_BY);
        if($result['result'] == NULL){
            $result['result']="Search not found. Please try some other options.";
        }
		$this->httpOkGetResponse($result);
	}
	public function insertArtistProject_post(){
    	    $saveTableData["USER_ID"] = trim($this->param["USER_ID"]);
    	    $saveTableData['PROJECT_NAME'] = trim($this->param["PROJECT_NAME"]);
    	    $saveTableData['PROFILE_TYPE'] = trim($this->param["PROFILE_TYPE"]);
    	    $saveTableData['PROJECT_DESCRIPTION'] = trim($this->param["PROJECT_DESCRIPTION"]);
    	    $saveTableData['PROJECT_TYPE'] = trim($this->param["PROJECT_TYPE"]);
    	    $saveTableData['START_DATE'] = trim($this->param["START_DATE"]);
    	    $saveTableData['END_DATE'] = trim($this->param["END_DATE"]);
            $saveTableData['START_TIME'] = trim($this->param["START_TIME"]);
    	    $saveTableData['END_TIME'] = trim($this->param["END_TIME"]);
    	    $saveTableData['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
    	    $saveTableData["USER_ID"] = $saveTableData["USER_ID"];
    	    $saveTableData2['FLEXIBLE_WITH_DATE_TIME'] = trim($this->param["FLEXIBLE_WITH_DATE_TIME"]);
    	    $saveTableData2['STUDIO_SPACE_NAME_ID'] = trim($this->param["STUDIO_SPACE_NAME_ID"]);
    	    $saveTableData2['ESTIMATED_TOTAL_NUMBER_SHIFT'] = trim($this->param["ESTIMATED_TOTAL_NUMBER_SHIFT"]);
    	    $saveTableData2['ESTIMATED_TOTAL_AMOUNT'] = trim($this->param["ESTIMATED_TOTAL_AMOUNT"]);
    	    $saveTableData2['NOTE_TO_THE_ARTIST'] = trim($this->param["NOTE_TO_THE_ARTIST"]);
    	    $saveTableData2['STUDIO_SPACE_NAME'] = trim($this->param["STUDIO_SPACE_NAME"]);
    	    $saveTableData2['STUDIO_SPACE_LOCATION'] = trim($this->param["STUDIO_SPACE_LOCATION"]);
    	    $desireCond=array('USER_ID'=>$saveTableData["USER_ID"],'PROJECT_NAME'=>$saveTableData['PROJECT_NAME']);
    	    $id=$this->Studiorental_model->checkDuplicateValueTwoParam('studio_project',$desireCond);
    	    if(empty($id)){
    	        $id=$this->Studiorental_model->saveDataToTable('studio_project',$saveTableData);
    	    }
    	     $saveTableData2['PROJECT_NAME_ID']=$id;
    	    $desireCond=array('PROJECT_NAME_ID'=>$id,'STUDIO_SPACE_NAME_ID'=>$saveTableData2['STUDIO_SPACE_NAME_ID']);
    	    $smid=$this->Studiorental_model->checkDuplicateValueTwoParam('studio_project_artist_mapping',$desireCond);
    	    if(empty($smid)){
    	        $saveTableData2['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
    	        $smid=$this->Studiorental_model->saveDataToTable('studio_project_artist_mapping',$saveTableData2);
    	   $smid?$this->httpOk('MSG_200_052',MSG_200_052):$this->httpOk('MSG_200_053',MSG_200_053);
    	    } else{
    	        $saveTableData2['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
    	       $status=$this->Studiorental_model->UpdateTableExecute('studio_project_artist_mapping',$saveTableData2,$smid);
    	         $status?$this->httpOk('MSG_200_054',MSG_200_054):$this->httpOk('MSG_200_055',MSG_200_055);
    	    }
    	}
    	public function getExistingProjectDetail_post(){
    	    $userId = trim($this->param["USER_ID"]);
    	    $projectName = trim($this->param["PROJECT_NAME"]);
    	    $t='studio_project';
    	    $t2='project_type_studio_rentals';
    	    $t3='studio_form_time as Start';
    	    $t4='studio_form_time as End';
    	    $selectedColumn='studio_project.PROJECT_NAME,studio_project.PROJECT_DESCRIPTION,studio_project.PROJECT_TYPE,studio_project.START_DATE,studio_project.END_DATE,studio_project.START_TIME,studio_project.END_TIME,project_type_studio_rentals.PROJECT_NAME as PROJECT_TYPE_NAME,Start.TIMING_NAME as START_TIME_NAME,End.TIMING_NAME as END_TIME_NAME';
    	    $result['result']=$this->Studiorental_model->getExistingProjectDetail($t,$userId,$projectName,$selectedColumn,$t2,$t3,$t4);
		$this->httpOkGetResponse($result);
    	}
    	public function getArtistDetail_post(){
    	    $result['result']=$this->Studiorental_model->getArtistDetailList(trim($this->param["ID"]));
    	    foreach ($result as $key) {
            
            $selectedItems[] = array('PROJECT_NAME','project_type_studio_rentals',$key['PROJECT_TYPE']);
            $selectedItems[] = array('EXPERTISE','expertise',$key["EXPERTISE"]);
            $selectedItems[] = array('CLIENT','studio_rentals_client',$key["CLIENT"]);
            
            foreach ($selectedItems as $selectedItem) {
                $keyValue[$selectedItem['0']]= $this->Studiorental_model->getAllNameValue($selectedItem['0'], $selectedItem['1'], $selectedItem['2']);
            }
        
        $data[] = array(
                'ID'=>$key['ID'],
                'ABOUT_ME'=>$key['ABOUT_ME']??"",
                'IMAGES'=>$key['IMAGES'],
                'PAY_PER_SIFT'=>$key['PAY_PER_SIFT'],
                'EXPERIENCE'=>$key['EXPERIENCE'],
                'First_Name'=>$key['First_Name'],
                'Last_Name'=>$key['Last_Name'],
                'PROJECT_TYPE'=>$keyValue['PROJECT_NAME'],
                'EXPERTISE'=>$keyValue['EXPERTISE'],
                'CLIENT'=>$keyValue['CLIENT'],
            );
        
        $response['result']  = $data; 
        }
         $this->httpOkGetResponse($response);
    	}
    	public function getSpaceNameList_post(){
        $userid=trim($this->param["USER_ID"]);
        $searchParam=trim($this->param["SEARCH"]);
        $table='studio_space';
        $selectedColumn='STUDIO_SPACE_NAME';
        $result['result']=$this->Studiorental_model->getSpaceNameList($table,$selectedColumn,$userid,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getCategoryEquipmentList_post(){
		$searchParam=trim($this->param["EQUIP_CATEGORY_NAME"]);
        $table='studio_equip_category';
        $selectedColumn='EQUIP_CATEGORY_NAME';
        $result['result']=$this->Studiorental_model->getCategoryEquipmentList($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getCategoryEquipmentTypeList_post(){
		$searchParam=trim($this->param["EQUIP_CATEGORY_ID"]);
        $table='studio_equip_type';
        $selectedColumn='TYPE';
        $result['result']=$this->Studiorental_model->getCategoryEquipmentTypeList($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getCategoryPropsList_post(){
		$searchParam=trim($this->param["PROP_CATEGORY_NAME"]);
        $table='studio_prop_category';
        $selectedColumn='PROP_CATEGORY_NAME';
        $result['result']=$this->Studiorental_model->getCategoryEquipmentList($table,$selectedColumn,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function allCategoryEquipmentList_get(){
        $result['result']=$this->Studiorental_model->allCategoryEquipmentList();
		$this->httpOkGetResponse($result);
    }
    public function allCategoryPropsList_get(){
        $result['result']=$this->Studiorental_model->allCategoryPropsList();
		$this->httpOkGetResponse($result);
    }
    public function getEqupBrandList_get(){
        $result['result']=$this->Studiorental_model->getEqupBrandList();
		$this->httpOkGetResponse($result);
    }
    public function getEqupAreaList_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $WORK_LOCATION=$this->Studiorental_model->getWorkLocationByUSER_ID($USER_ID);
        $city=$this->Studiorental_model->getCity($WORK_LOCATION['WORK_LOCATION']);
        //print_r($city);die;
        $result['result']=$this->Studiorental_model->getEqupAreaList($city['city']);
		$this->httpOkGetResponse($result);
    }
    public function getEqupSellerList_get(){
        $result['result']=$this->Studiorental_model->getEqupSpaceSellerList();
         if($result['result'] == NULL){
            $result['result']=$this->Studiorental_model->getEqupSellerList();
            if($result['result'] == NULL){
                $result['result']=$this->Studiorental_model->getEqupSellerListAlphaOrder();
            }
        }
		$this->httpOkGetResponse($result);
    }
    public function filterEqupInventory_post(){
        $TYPE_ID=trim($this->param["TYPE_ID"]);
        $BRAND=trim($this->param["BRAND"]);
        $MINPRICE=trim($this->param["MINPRICE"]);
        $MAXPRICE=trim($this->param["MAXPRICE"]);
        $USER_ID=trim($this->param["USER_ID"]);
        $PINCODE=trim($this->param["PINCODE"]);
        $result['result']=$this->Studiorental_model->filterEqupInventory($TYPE_ID,$BRAND,$MINPRICE,$MAXPRICE,$USER_ID,$PINCODE);
		$this->httpOkGetResponse($result);
    }
    public function getPropAreaList_post(){
        $USER_ID=trim($this->param["USER_ID"]);
        $WORK_LOCATION=$this->Studiorental_model->getWorkLocationByUSER_ID($USER_ID);
        //print_r($WORK_LOCATION);die;
        $city=$this->Studiorental_model->getCity($WORK_LOCATION['WORK_LOCATION']);
        $result['result']=$this->Studiorental_model->getPropAreaList($city['city']);
		$this->httpOkGetResponse($result);
    }
    public function getPropSellerList_get(){
        $result['result']=$this->Studiorental_model->getPropSpaceSellerList();
         if($result['result'] == NULL){
            $result['result']=$this->Studiorental_model->getPropSellerList();
            if($result['result'] == NULL){
                
                $result['result']=$this->Studiorental_model->getPropSellerListAlphaOrder();
            }
        }
		$this->httpOkGetResponse($result);
    }
    public function filterPropsInventory_post(){
        $MINPRICE=trim($this->param["MINPRICE"]);
        $MAXPRICE=trim($this->param["MAXPRICE"]);
        $USER_ID=trim($this->param["USER_ID"]);
        $PINCODE=trim($this->param["PINCODE"]);
        $result['result']=$this->Studiorental_model->filterPropInventory($TYPE_ID,$BRAND,$MINPRICE,$MAXPRICE,$USER_ID,$PINCODE);
		$this->httpOkGetResponse($result);
    }
}
     