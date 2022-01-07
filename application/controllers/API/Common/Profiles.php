<?php
require APPPATH.'/controllers/API/Common/Common.php';

class Profiles extends Common 
{
    
        public function getProfilePageDetails_post(){
            $data = json_decode(file_get_contents('php://input'), true);
            $mobile = trim($data["mobilenumber"])??"";
            if ($mobile!='') {
                $response["ppjr"]=$this->ApiProfilesModel->getdroplist('Previous Present Job Roles', 'Form One');
                $response['admin']=$this->Api_model->admin_details();
                $response['getlang']=$this->ApiProfilesModel->getlang();
                $response['getseniority']=$this->Api_model->getseniority();
                $response['certificate']=$this->ApiProfilesModel->getdroplist('Other Ceritificate Courses', 'Form One');
                $response["getprofilepagedetails"]=$this->ApiProfilesModel->getprofilepagedetails($mobile);
                $response['getstates']=$this->Api_model->state();
                $response['googlecertificate']=$this->ApiProfilesModel->getdroplist('Google Certificate', 'Form One');
                $this->httpOkGetResponse($response);
            } else {
                $this->httpNotFound('EN_404_003', EN_404_003);
            }
        }

        public function savePersonalDetails_post(){
                    $data = json_decode(file_get_contents('php://input'), true);
                    $mobile = trim($data["mobilenumber"])??"";
                    $asp=array();
                    $date=date('Y-m-d H:s:i');
                    $asp['First_Name']=trim($data['firstname'])??"";
                    $asp['Last_Name']=trim($data['lastname'])??"";
                    $asp['Display_Name']=trim($data['displayname'])??"";
                    $asp['Date_Of_Birth']=trim($data['dob'])??"";
                    $asp['Gender']=trim($data['gender'])??"";
                    $asp['Hobbies']=trim($data["hobby"])??"";
                    $asp['Applicant_Interests']=trim($data['selectinterest'])??"";
                    $asp['RECORD_UPDATED_DTTM']=$date;
                    $width='';
                    $height='';
                    // $imageurl2='./uploads/document';
                    // $name=trim($data['docname'])??""; 
                    // $temp=trim($data['doctmpname'])??"";
                    // $oldimage=trim($data['oldimage'])??"";
                    // if($name!=''){$imagename=$this->thumb($width,$height,$imageurl2,$name,$temp); unlink($imageurl2.'/'.$oldimage);}else{
                    //               $imagename=$oldimage;
                    //           }
                    $asp['Identity_Proof']=trim($data['identity'])??"".','.trim($data['identitynumber'])??"".','.$imagename;
                    $comm['Pin_Code']=trim($data['pincode'])??"";
                    $getcityStateByPincode['cityStateByPincode']=$this->Api_model->getGeoCode($comm['Pin_Code']);
                    $comm['City']=$getcityStateByPincode['cityStateByPincode']['city'];
                    $comm['State']=$getcityStateByPincode['cityStateByPincode']['state']; 
                    $comm['Country']=$getcityStateByPincode['cityStateByPincode']['country']; 
                    $comm['Alt_Mobile_No']=trim($data['altmobileno'])??"";
                    $comm['Permanent_Address']=trim($data['address'])??"";
                    $comm['RECORD_UPDATED_DTTM']=$date;
                    $userid=$this->Api_model->getUserId($mobile);
                    $status=$this->ApiProfilesModel->updatePersonalDetails($comm,$asp, $userid['USER_ID']);
                    $status?$this->httpOk('MSG_200_012',MSG_200_012):$this->httpOk('MSG_200_013',MSG_200_013);
                }
                

        public function saveEducationalDetails_post(){
                    $data = json_decode(file_get_contents('php://input'), true);
                    $mobile = trim($data["mobilenumber"])??"";
                    $education['Highest_Education']=trim($data['selecthighestedu'])??"";
                    $education['Specialization']=trim($data['selectspecialization'])??"";
                    $education['Year_of_Passing']=trim($data['yearofpassing'])??"";
                    $education['Language_Known']=trim($data['languages'])??"";
                    $education['Othr_Certificates']=trim($data['selectcertificateone'])??"";
                    $education['Softwares']=trim($data['selectsoftwares'])??"";
                    $education['Othr_Compt_Achievements']=trim($data['competitiveachievements'])??"";
                    $education['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
                    $userid=$this->Api_model->getUserId($mobile);
                    $status=$this->ApiProfilesModel->updateeducationdetails($education, $userid['USER_ID']);
                    $status?$this->httpOk('MSG_200_014',MSG_200_014):$this->httpOk('MSG_200_015',MSG_200_015);
        }
    
        public function addProfiles_post(){
                    $data = json_decode(file_get_contents('php://input'), true);
                    $mobile = trim($data["mobilenumber"])??"";
                    $profileadd=$this->Api_model->getUserId($mobile);
                    $profileadd['Is_Primary']='S';
                    $profileadd['Profile_Id']=trim($data['profileid'])??"";
                    $status=$this->ApiProfilesModel->addprofiles($profileadd);
                    $status?$this->httpOk('MSG_200_016',MSG_200_016):$this->httpOk('MSG_200_017',MSG_200_017);
        }

        public function saveProfessionalButton_post(){
                    $data = json_decode(file_get_contents('php://input'), true);
                    $mobile = trim($data["mobilenumber"])??"";
                    $proff['Association_Name']=trim($data['selectassociatename'])??"";
                    $proff['Functional_Industry']=trim($data['selectfunctionalintreset'])??"";
                    $proff['Job_Title']=trim($data['jobtitle'])??"";
                    $proff['Job_Desc']=trim($data['jobdescription'])??"";
                    $proff['Job_Locality']=trim($data['selectjoblocality'])??"";
                    $proff['License_No']=trim($data['licensenumber'])??"";
                    $proff['Clients_wrk_with']=trim($data['selectclientworkwith'])??"";
                    $proff['Expertise']=trim($data['selectexpert'])??"";
                    $proff['Skills']=trim($data['skills'])??"";
                    $proff['Functional_Area']=trim($data['selectfunctionalarea'])??"";
                    $proff['Certificate']=trim($data['selectprocertificate'])??"";
                    $proff['Working_Status']=trim($data['status'])??"";
                    $proff['Current_Working_Status']=trim($data['wstatus'])??"";
                    $proff['Current_Pay']=trim($data['currentpay'])??"";
                    $proff['Notice_Period']=trim($data['noticeperiod'])??"";
                    $proff['Yrs_of_Exp']=trim($data['yearofexpirence'])??"";
                    $proff['Present_Job_Roles']=trim($data['presentjobroles'])??"";
                    $proff['Project_Type']=trim($data['projecttype'])??"";
                    $proff['Project_Done']=trim($data['projectdone'])??"";
                    $proff['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
                    $status=$this->ApiProfilesModel->updateproffessional($proff, $mobile);
                    $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }

        public function thumb($width,$height,$imageurl2,$name,$temp)
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
        public function getAccountDetails_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $id = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($id);
            $mobile = $mobile['Mobile_No'];
            if ($id['USER_ID']!='') {
                if ($type==EMPLOYER) {
                    $response['employerAccountDetails']=$this->Api_model->getEmployeVerificationDetails($type,$id);
                    $this->httpOkGetResponse($response);
                }else{
                    $this->httpNotFound('EN_404_001', EN_404_001); 
                }
            }else{
                $this->httpNotFound('EN_404_005', EN_404_005);
            }
        }
        public function updateAccountDetails_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $id = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($id);
            $mobile = $mobile['Mobile_No'];
            $rec['First_Name']=trim($data['First_Name'])??"";
            $rec['Last_Name']=trim($data['Last_Name'])??"";
            $rec['Budget_Of_Project']=trim($data['Budget_Of_Project'])??"";
            $rec['Website']=trim($data['Website'])??"";
            $rec['Referral_Code']=trim($data['Referral_Code'])??"";
            $rec['Profile_Pic']=trim($data['Profile_Pic'])??"";
            $rec['Company_Name']=trim($data['Company_Name'])??"";
            $rec['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
            
            $comm['City']=trim($data['City'])??"";
            $comm['State']=trim($data['State'])??"";
            $comm['Country']=trim($data['Country'])??"";
            $comm['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
            
            $emp['CATEGORY_ID']=trim($data['CATEGORY_ID'])??"";
            $emp['BRAND_NAME']=trim($data['BRAND_NAME'])??"";
            $emp['PROFILE_ID']=trim($data['PROFILE_ID'])??"";
            $emp['BUSINESS_INFORMATION']=trim($data['BUSINESS_INFORMATION'])??"";
            
            $reg_stg['Address']=trim($data['Address'])??"";
            $reg_stg['First_Name']=trim($data['First_Name'])??"";
            $reg_stg['Last_Name']=trim($data['Last_Name'])??"";
            $reg_stg['Referral_Code']=trim($data['Referral_Code'])??"";
            $reg_stg['City']=trim($data['City'])??"";
            $reg_stg['State']=trim($data['State'])??"";
            $reg_stg['Website']=trim($data['Website'])??"";
            $reg_stg['Company_Name']=trim($data['Company_Name'])??"";
            $reg_stg['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
            $reg_stg['Category_Name']=trim($data['CATEGORY_ID'])??"";
            
            $status=$this->Api_model->updatepAppliRecuiter($id,$rec);
            $status=$this->Api_model->updatepCommunication($comm, $id);
            $status=$this->Api_model->updatepEmpUserProMapping($emp, $id);
            $status=$this->Api_model->updatepRegStag($reg_stg, $type,$mobile);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
        public function indivisualVerification_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $id = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($id);
            $mobile = $mobile['Mobile_No'];
            if($id!='') {
                if ($type==EMPLOYER) {
                    $response['indivisualVerification']=$this->Api_model->getindivisualVerification($type,$id);
                    $this->httpOkGetResponse($response);
                }else{
                    $this->httpNotFound('EN_404_001', EN_404_001); 
                }
            }else{
                $this->httpNotFound('EN_404_005', EN_404_005);
            }
        }
        public function updateIndivisualVerification_post(){
           
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $id = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($id);
            $mobile = $mobile['Mobile_No'];
            $ind['USER_ID']=trim($data['USER_ID'])??"";
            $ind['FIRST_NAME']=trim($data['First_Name'])??"";
            $ind['LAST_NAME']=trim($data['Last_Name'])??"";
            $ind['DOB']=trim($data['Date_Of_Birth'])??"";
            $ind['ADDRESS']=trim($data['Address'])??"";
            $ind['TYPE']=trim($data['type'])??"";
            $rec['First_Name']=trim($data['First_Name'])??"";
            $rec['Last_Name']=trim($data['Last_Name'])??"";
            $rec['Date_Of_Birth']=trim($data['Date_Of_Birth'])??"";
            
            $reg_stg['Address']=trim($data['Address'])??"";
            $reg_stg['First_Name']=trim($data['First_Name'])??"";
            $reg_stg['Last_Name']=trim($data['Last_Name'])??"";
            //$USER_ID = $this->Api_model->getindivisualVerificationUser_id($id);
            if($id!=''){
                $status=$this->Api_model->updateIndivisual($id,$ind);
            }else{
                $status=$this->Api_model->insertIndivisual($ind);
            }
            $status=$this->Api_model->updatepAppliRecuiter($id,$rec);
            $status=$this->Api_model->updatepRegStag($reg_stg, $type,$mobile);
            $status?$this->httpOk('MSG_200_012',$data):$this->httpOk('MSG_200_013',$data);
        }
        public function verifyDocumentIndivisual_get(){
            $data = json_decode(file_get_contents('php://input'),true);
            $userid = $data["USER_ID"]??"";
            $ID_Type=trim($data['VERIFY_DOC'])??"";
            $emp['VERIFY_DOC']=trim($data['VERIFY_DOC'])??"";
            $emp['DOC_NUMBER']=trim($data['DOC_NUMBER'])??"";
            $docnumber = trim($data['DOC_NUMBER'])??"";
            $getdataAuthorize=$this->Authorize_post();
            if($ID_Type == 'pan'){
                $ch = curl_init('https://api.sandbox.co.in/pans/'.$docnumber.'/verify?consent=y&reason=KYC-Process');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization: $getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;die;
                }
            }
            if($ID_Type == 'gstin'){
                $ch = curl_init('https://api.sandbox.co.in/gsp/public/gstin/'.$docnumber.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization: $getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;
                }
            }
            $status=$this->Api_model->updateIndivisual($userid,$emp);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
        public function uploadDocumentIndivisual_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $userid = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($userid);
            $mobile = $mobile['Mobile_No']; 
            $emp['UPLOAD_DOC_TYPE']=trim($data['document'])??"";
            $emp['DOC_UPLOAD']=trim($data['upload_doc'])??"";
            $status=$this->Api_model->updateIndivisual($userid,$emp);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
        public function partnershipFirmVerification_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $id = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($id);
            $mobile = $mobile['Mobile_No'];
            if($id!='') {
                if ($type==EMPLOYER) {
                    $response['partnershipFirmVerification']=$this->Api_model->getpartnershipFirmVerification($type,$id);
                    $this->httpOkGetResponse($response);
                }else{
                    $this->httpNotFound('EN_404_001', EN_404_001); 
                }
            }else{
                $this->httpNotFound('EN_404_005', EN_404_005);
            }
        }
        public function updatePartnershipFirmVerification_post(){
           
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $userid = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($userid);
            $mobile = $mobile['Mobile_No'];
            $rec['Company_Name']=trim($data['Company_Name'])??"";

            $reg_stg['Company_Name']=trim($data['Company_Name'])??"";
            $reg_stg['E_Mail']=trim($data['E_Mail'])??"";

            $emp['PARTNERS']=trim($data['PARTNERS'])??"";
            
            $emp['REGISTERED_ADDRESS']=trim($data['REGISTERED_ADDRESS'])??"";
            
            $partnership['REGISTERED_ADDRESS']=trim($data['REGISTERED_ADDRESS'])??"";
            $partnership['PARTNERSHIP']=trim($data['Company_Name'])??"";
            $partnership['TYPE']=trim($data['type'])??"";
            $partnership['USER_ID']=trim($data['USER_ID'])??"";
            $partnership['PARTNER']=trim($data['PARTNERS'])??"";
            $USER_ID = $this->Api_model->getPartnershipVerificationUser_id($userid);
                if($USER_ID){
                    $status=$this->Api_model->updatePartnership($userid,$partnership);
                }else{
                    $status=$this->Api_model->insertPartnership($partnership);
                }
            $status=$this->Api_model->updatepAppliRecuiter($userid,$rec);
            $status=$this->Api_model->updatepEmpUserProMapping($emp, $userid);
            $status=$this->Api_model->updatepRegStag($reg_stg, $type,$mobile);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
        public function verifyDocumentPartnership_get(){
            $data = json_decode(file_get_contents('php://input'),true);
            $userid = $data["USER_ID"]??"";
            $ID_Type=trim($data['ID_Type'])??"";
            $emp['VERIFY_DOC']=trim($data['ID_Type'])??"";
            $emp['DOC_NUMBER']=trim($data['DOCUMENT_NUMBER'])??"";
            $docnumber = trim($data['DOCUMENT_NUMBER'])??"";
            $getdataAuthorize=$this->Authorize_post();
            if($ID_Type == 'pan'){
                $ch = curl_init('https://api.sandbox.co.in/pans/'.$docnumber.'/verify?consent=y&reason=KYC-Process');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization: $getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;
                }
            }
            if($ID_Type == 'gstin'){
                $ch = curl_init('https://api.sandbox.co.in/gsp/public/gstin/'.$docnumber.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization: $getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;
                }
            }
            $status=$this->Api_model->updatePartnership($userid,$emp);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
        public function uploadDocumentPartnership_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $userid = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($userid);
            $mobile = $mobile['Mobile_No']; 
            $emp['UPLOAD_DOCUMENT_TYPE']=trim($data['document'])??"";
            $emp['UPLOAD_DOC']=trim($data['upload_doc'])??"";
            $status=$this->Api_model->updatePartnership($userid,$emp);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
        public function companyVerification_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $userid = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($userid);
            $mobile = $mobile['Mobile_No'];
            if($userid!='') {
                if ($type==EMPLOYER) {
                    $response['companyVerification']=$this->Api_model->getCompanyVerification($type,$userid);
                    $this->httpOkGetResponse($response);
                }else{
                    $this->httpNotFound('EN_404_001', EN_404_001); 
                }
            }else{
                $this->httpNotFound('EN_404_005', EN_404_005);
            }
        }
        public function updateCompanyVerification_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $type = trim($data["type"])??"";
            $userid = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($userid);
            $mobile = $mobile['Mobile_No']; 
            $company['USER_ID']=trim($data['USER_ID'])??"";
            $company['Type']=trim($data['type'])??"";
            $company['COMPANY_NAME']=trim($data['Company_Name'])??"";
            $company['CIN']=trim($data['CIN'])??"";
            $company['PARTNERS']=trim($data['PARTNERS'])??"";
            $company['REGISTERED_ADDRESS']=trim($data['REGISTERED_ADDRESS'])??"";
            $company['DATE_OF_INCORPORATION']=trim($data['DATE_OF_INCORPORATION'])??"";
            $rec['Company_Name']=trim($data['Company_Name'])??"";
            $reg_stg['Company_Name']=trim($data['Company_Name'])??"";

            $emp['PARTNERS']=trim($data['PARTNERS'])??"";
            $emp['DATE_OF_INCORPORATION']=trim($data['DATE_OF_INCORPORATION'])??"";
            $emp['CIN']=trim($data['CIN'])??"";
            $comp = trim($data['CIN'])??"";
            $consent = 'y';
            $reason ='KYC Process';
            $emp['REGISTERED_ADDRESS']=trim($data['REGISTERED_ADDRESS'])??"";
            $getdataAuthorize=$this->Authorize_post();
            $ch = curl_init('https://api.sandbox.co.in/mca/companies/'.$comp.'?consent=y&reason=KYC');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization: $getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                $response;
                }
               $USER_ID = $this->Api_model->getCompanyVerificationUser_id($userid);
                if($USER_ID){
                    $status=$this->Api_model->updateCompany($userid,$company);
                }else{
                    $status=$this->Api_model->insertCompany($company);
                }
            $status=$this->Api_model->updatepAppliRecuiter($userid,$rec);
            $status=$this->Api_model->updatepEmpUserProMapping($emp, $userid);
            $status=$this->Api_model->updatepRegStag($reg_stg, $type,$mobile);
           $this->httpOkGetResponse($response);
        }
        public function verifyDocumentCompany_get(){
            $data = json_decode(file_get_contents('php://input'),true);
            $userid = $data["USER_ID"]??"";
            $ID_Type=trim($data['ID_Type'])??"";
            $emp['VERIFY_DOC']=trim($data['ID_Type'])??"";
            $emp['DOC_NUMBER']=trim($data['DOCUMENT_NUMBER'])??"";
            $docnumber = trim($data['DOCUMENT_NUMBER'])??"";
            $getdataAuthorize=$this->Authorize_post();
            if($ID_Type == 'pan'){
                $ch = curl_init('https://api.sandbox.co.in/pans/'.$docnumber.'/verify?consent=y&reason=KYC-Process');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization:$getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;
                }
            }
            
            if($ID_Type == 'gstin'){
                $ch = curl_init('https://api.sandbox.co.in/gsp/public/gstin/'.$docnumber.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_ENCODING, "");
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_TIMEOUT, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "GET");
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Accept: application/json",
                    "Authorization: $getdataAuthorize",
                    "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                    "x-api-version: 3.6"
                ]);
                curl_exec($ch);
                 $response = curl_exec($ch);
                 $err = curl_error($ch);
                curl_close($ch);
                if ($err) {
                echo "cURL Error #:" . $err;
                } else {
                echo $response;
                } 
            }
            $status=$this->Api_model->updateCompany($userid,$emp);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        }
       
        public function uploadDocumentCompany_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $cropped_image = trim($data['upload_doc'])??"";
            list($type, $cropped_image) = explode(';', $cropped_image);
            list(, $cropped_image) = explode(',', $cropped_image);
            $cropped_image = base64_decode($cropped_image);
            $imageurl2='./uploads/document/';
            $name = date('ymdgis').'.png';
            $ext=explode(".",$name);
            $url=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
            file_put_contents($imageurl2.''.$url, $cropped_image);
            $type = trim($data["type"])??"";
            $userid = $data["USER_ID"]??"";
            $mobile=$this->Api_model->getUserId($userid);
            $mobile = $mobile['Mobile_No']; 
            $emp['UPLOAD_DOC_TYPE']=trim($data['document'])??"";
            $emp['UPLOAD_DOC']=$url;
            $status=$this->Api_model->updateCompany($userid,$emp);
            $status?$this->httpOk('MSG_200_018',MSG_200_018):$this->httpOk('MSG_200_019',MSG_200_019);
        } 
        public function Authenticate_post(){
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
                "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                "x-api-secret: secret_live_bij3Fh6HlS9x2gTZk1lDdOemietPzuil",
                "x-api-version: 3.3"
            ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $getdata=json_decode($response, true);
		   

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            return $response=$getdata['access_token'];
            }
        }
        public function Authorize_post(){
            
            $curl = curl_init();
            $getresp=$this->Authenticate_post();
            curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.sandbox.co.in/authorize?request_token='.$getresp.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Authorization: $getresp",
                "x-api-key: key_live_BxNHy4AgL6pH1OuZlDHe4StziRThqbWH",
                "x-api-version: 3.3"
            ],
            ]);

            $response = curl_exec($curl);
            $getdataAuthorize=json_decode($response, true);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
              return $response=$getdataAuthorize['access_token'];
            }
        }
         public function quessend_post(){
            $data = json_decode(file_get_contents('php://input'), true);
            $ques['fullname']=trim($data['quesfullname'])??"";
            $ques['email']=trim($data['quesemail'])??"";
            $ques['question']=trim($data['quesaddress'])??"";
            $ques['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
            $subject='Question Regarding '.'Cast India'.'';
            $mess='';
            $mess.='<p>Dear Admin</p>';
            $mess.='<p>A '.$ques['fullname'].' ask you a question</p>';
            $mess.='<p><strong>Full Name</strong>: '.$ques['fullname'].' <br> <strong>Email</strong>: '.$ques['email'].'<br> <strong>Question</strong>: '.$ques['question'].'</p>';
            $mess.='<p><strong>Regards,<br>Team Cast India</strong></p>';
            $message=$mess;
            $this->emailbody('noreply@castindia.in','noreply@castindia.in',$subject,$message);
            $messtwo='';
            $messtwo.='<p>Dear '.$ques['fullname'].'</p>';
            $messtwo.='<p>Thankyou for raising your question. We will get back as soon as possible.if any query email us  <a href=mailto:'.'contact@castindia.in'.'>'.'contact@castindia.in'.'</a> </p>';
            $messtwo.='<p><strong>Regards,<br>Team Cast India</strong></p>';
            $messagetwo=$messtwo;
            $this->emailbody('noreply@castindia.in',$ques['email'],$subject,$messagetwo);
            $page_data['submit'] = $this->Api_model->addquestion($ques);
            $this->httpOkGetResponse($page_data['submit']);
        }
        
    }