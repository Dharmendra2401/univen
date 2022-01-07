<?php
require APPPATH.'/controllers/API/Common/Common.php';

class DashboardAdditionalForm  extends Common 
{

    public function getcityStateByPincode_post(){
        $data = json_decode(file_get_contents('php://input'), true);
        $pincode=trim($data["pincode"])??"";
        if ($pincode!='') {
            $getcityStateByPincode['cityStateByPincode']=$this->Api_model->getGeoCode($pincode);
            $this->httpOkGetResponse($getcityStateByPincode);
        }else{
            $this->httpNotFound('EN_404_004', EN_404_004);
        }
    }
    public function getCategory_post(){
        $data = json_decode(file_get_contents('php://input'),true);
        $getsearchcategory['getsearchcategory']=$this->Api_model->getCategory(trim($data["searchcategory"]));
        $this->httpOkGetResponse($getsearchcategory);
    }
    public function getSizeOfProjectBudget_post(){
        $data = json_decode(file_get_contents('php://input'),true);
        $getsearchcategory['getsearchprojectbudget']=$this->Api_model->getSizeOfProjectBudget(trim($data["searchprojectbudget"]));
        $this->httpOkGetResponse($getsearchcategory);
    }
    public function getSearchProfile_post(){
        $data = json_decode(file_get_contents('php://input'),true);
       if($data['notvalidpro']!=''){

       }
        $getval=explode(',',$data['notvalidpro']);
        $getpro.='';
        foreach($getval as $pro){
           $getpro.="'".$pro."',";
        }
        
        $getsearchprofile['getsearchprofile']=$this->Api_model->getProfile(trim($data["searchprofile"]),rtrim($getpro,','));
        $this->httpOkGetResponse($getsearchprofile);
    }
    public function getSearchCompanyName_post(){
        $data = json_decode(file_get_contents('php://input'),true);
        $getsearchcompanyname['searchcompanyname']=$this->Api_model->searchCompanyName(trim($data["userid"]))??"";
        $this->httpOkGetResponse($getsearchcompanyname);
    }
    public function submitAdditionalFormDetails_post(){
        $data = json_decode(file_get_contents('php://input'),true);
        $cropped_image = trim($data['image'])??"";
        $type = trim($data["type"])??"";
        list($type, $cropped_image) = explode(';', $cropped_image);
        list(, $cropped_image) = explode(',', $cropped_image);
        $cropped_image = base64_decode($cropped_image);
        $asp=array();
        $imageurl2='uploads/profile/';
        $name = date('ymdgis').'.png';
        $ext=explode(".",$name);
        $url=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
        file_put_contents($imageurl2.''.$url, $cropped_image);
        $id['USER_ID']=$data["userid"]??"";
        $type = trim($data["type"])??"";
        if ($id['USER_ID']!='') {
            if ($type==EMPLOYER||$type==ASPIRANT) {
                $asp['Profile_Pic']=$url;
                if ($type==ASPIRANT) {
                    $comm['Pin_Code']=trim($data['pincodes'])??"";
                    $date= trim($data['dobs'])??"";
                    $cdate = str_replace('/', '-', $date);
                    $asp['Date_Of_Birth']=date('Y-m-d', strtotime($cdate));
                    $asp['Gender']=trim($data['genders'])??"";
                    $asp['Middle_Name']=trim($data['middlenames'])??"";
                    $result['successmessage']=MSG_200_008;
                    $result['failmessage']=MSG_200_009;
                    $result['successmessagetype']='MSG_200_008';
                    $result['failmessagetype']='MSG_200_009';
                    $user_profile="";
            } else {
                $asp['Budget_Of_Project']=trim($data["budgetofproject"])??"";
                $user_profile['USER_ID']=$id['USER_ID'];
                $user_profile['PROFILE_ID']=trim($data["profileId"])??"";
                $user_profile['BRAND_NAME']=trim($data["brandname"])??"";
                $user_profile['BUSINESS_INFORMATION']=trim($data["bussinessinformation"])??"";
                $user_profile['CATEGORY_ID']=trim($data["categoryid"])??"";;
                $result['successmessage']=MSG_200_010;
                $result['failmessage']=MSG_200_011;
                $result['successmessagetype']='MSG_200_010';
                $result['failmessagetype']='MSG_200_011';
                $comm="";
               
            }
            
            $status=$this->Api_model->updatepersonal($comm,$asp, $id['USER_ID'],$user_profile);
            $status?$this->httpOk( $result['successmessagetype'],  $result['successmessage']):
                    $this->httpOk($result['failmessagetype'],  $result['failmessage']);
            }
            else{
                $this->httpNotFound('EN_404_001', EN_404_001); 
            }
        }else{
             $this->httpNotFound('EN_404_005', EN_404_005);
            }
        }

        public function getResponseAdditionalDetailsasp_post(){
            $data = json_decode(file_get_contents('php://input'),true);
            $idd= trim($data['userid'])??"";
            $type= trim($data['type'])??"";
           
                $response['getvalues']=$this->Api_model->getadditionaldetails($idd,$type);
                $this->httpOkGetResponse($response);
           

            
            
        }
    }

