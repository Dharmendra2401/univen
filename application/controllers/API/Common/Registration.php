<?php
require APPPATH.'/controllers/API/Common/Common.php';

class Registration extends Common 
{
    public function addregistrationuser_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $mobile = trim($data["mobilenumber"])??"";
        $email = trim($data["email"])??"";
        if ($mobile!='') {
            if ($email!='') {
                $getvalidateemail=$this->Api_model->validemail($email, $mobile);
        
                if ($getvalidateemail>0) {
                    $this->httpOk('MSG_200_005', MSG_200_005);
                } else {
                    $asp=array();
                    $keytable=array();
                    $user_profile=array();
                    $asp_emp=array();
                    $comm=array();
                    $user_temp=array();
        
                    $type = trim($data["type"])??"";
                    $firstName = trim($data["firstname"])??"";
                    $lastName = trim($data["lastname"])??"";
                    $refrenceCode=trim($data["refrencecode"])??"";
                    $asp['TYPE_OF_REGISTRATION']=$type;
                    $asp['First_Name']= $firstName;
                    $asp['Last_Name']=$lastName;
                    $asp['Mobile_No']=$mobile;
                    $asp['E_Mail']=$email;
                    $date=date('Y-m-d H:s:i');
                    $asp['Record_Inserted_Dttm']=$date;
                    $userId=$this->asp_emp_id();
                    $keytable['ID']=$userId;
                    $keytable['RECORD_INSERTED_DTTM']=$date;
                    $keytable['Source_Key']=$email;
                    $asp_emp['USER_ID']=$userId;
                    $asp_emp['RECORD_INSERTED_DTTM']=$date;
                    $asp_emp['ACTIVE_STATUS']=YES;
                    $asp_emp['Referral_Code']=$refrenceCode;
                    $asp_emp['First_Name']= $firstName;
                    $asp_emp['Last_Name']=$lastName;
                    $asp['Referral_Code']=$refrenceCode;
                    $comm['USER_ID']=$userId;
                    $comm['Mobile_No']= $mobile;
                    $comm['E_Mail']=$email;
                    $comm['RECORD_INSERTED_DTTM']=$date;
                    $comm['ACTIVE_STATUS']=NO;
        
                    if ($type==EMPLOYER||$type==ASPIRANT) {
                        if ($type==ASPIRANT) {
                            $profile='P';
                            $seniority  = trim($data["seniority"])??"";
                            $displayName  = trim($data["displayname"])??"";
                            $primaryprofilename = trim($data["primaryprofilename"])??"";
                            $categoryName  = trim($data["categoryname"])??"";
                            $subCategoryName  = trim($data["subcategoryname"])??"";
                            $profileId  = $this->Api_model->get_profile_id($asp['Primary_Profile_Name']);
                            $asp['Seniority']= $seniority;
                            $asp['Display_Name']=$displayName;
                            $asp['Referral_Code']=$refrenceCode;
                            $asp['Primary_Profile_Name']=$primaryprofilename;
                            $asp['Category_Name']=$categoryName  ;
                            $asp['Sub_Category_Name']= $subCategoryName;
                            $keytable['Type_ID']=ASPIRANT;
                            $asp_emp['Display_Name']=$displayName;
                            $asp_emp['Seniority']=$seniority;
                            $asp_emp['Applicant_Access'] =YES;
                            $asp_emp['Recruiter_Access']=NO;
                            $asp_emp['Referral_Code']=$refrenceCode;
                            $user_profile['USER_ID']=$userId;
                            $user_profile['Category_ID']=$this->Api_model->get_cat_id($asp['Category_Name']);
                            $user_profile['Sub_Category_ID']=$this->Api_model->get_subcat_id($asp['Sub_Category_Name']);
                            $user_profile['PROFILE_ID']=$profileId;
                            $user_profile['PROFILE_TYPE']=$profile;
                            $user_temp['Profile_Id']=$profileId;
                            $user_temp['USER_ID']=$userId;
                            $user_temp['Is_Primary']=$profile;
                            $this->Api_model->aspregistration($asp, $keytable, $user_profile, $asp_emp, $comm, $user_temp);
                            $result['registrationmessage']=MSG_200_006;
                            $result['userid']=$userId;
                            $messagetype='MSG_200_006';
                        } else {
                            $asp['Represents']=trim($data['empcat'])??"";
                            $asp['Address']=trim($data['address'])??"";
                            $asp['State']=trim($data['state'])??"";
                            $asp['City']=trim($data['city'])??"";
                            $asp['Company_Name']=trim($data['companyfirm'])??"";
                            $website=trim($data['website'])??"";
                            $asp['Website']=$website;
                            $keytable['Type_ID']=EMPLOYER;
                            $asp_emp['Recruiter_Represents']=trim($data['empcat'])??"";
                            $asp_emp['Company_Name']=trim($data['companyfirm'])??"";
                            $asp_emp['Website']=$website;
                            $asp_emp['Applicant_Access'] =NO;
                            $asp_emp['Recruiter_Access']=YES;
                            $comm['State']=trim($data['state'])??"";
                            $comm['City']=trim($data['city'])??"";
                            $comm['Permanent_Address']=trim($data['address'])??"";
                            $this->Api_model->aspregistration($asp, $keytable, '', $asp_emp, $comm, '');
                             $result['registrationmessage']=MSG_200_007;
                             $result['userid']=$userId;
                             $messagetype='MSG_200_007';
                        }
                        $subject='Successfully Registered With '.WEBSITE_NAME.' As '.$type;
                        $mess='';
                        $mess.='<p>Dear '.$asp['First_Name'].' '.$asp['Last_Name'].'</p>';
                        $mess.='<p>You are successfully registered with CastIndia as a <strong>'.$type.'</strong>. Please click <a href= '.$data["verifylink"].base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
                        $mess.='<p>Regards,<br> <strong>Team '.WEBSITE_NAME.'</strong> </p>';
                        $message=$mess;
                        $mailSendStatus=$this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
                        $result['mailsendstatus']='';
                        $this->httpOk($messagetype, $result);
                    }
                    else{
                        $this->httpNotFound('EN_404_001', EN_404_001); 
                    }
                   
                }
            } else {
                $this->httpNotFound('EN_404_002', EN_404_002);
            }
        } else {
            $this->httpNotFound('EN_404_003', EN_404_003);
        }
    }

}