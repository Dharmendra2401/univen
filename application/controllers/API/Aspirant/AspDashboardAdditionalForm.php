<?php
require APPPATH.'/controllers/API/Common/Common.php';

class AspDashboardAdditionalForm extends Common 
{
    public function dashboardAdditionalFormDetails_post(){
        $data = json_decode(file_get_contents('php://input'),true);
        $cropped_image = trim($data['image'])??"";
        list($type, $cropped_image) = explode(';', $cropped_image);
        list(, $cropped_image) = explode(',', $cropped_image);
        $cropped_image = base64_decode($cropped_image);
        $comm=array();
        $asp=array();
        $imageurl2='uploads/profile/';
        $name = date('ymdgis').'.png';
        $ext=explode(".",$name);
        $url=str_replace("","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
        file_put_contents($imageurl2.''.$url, $cropped_image);
        $idd=trim($data['userid'])??"";
        $comm['Pin_Code']=trim($data['pincodes'])??"";
        $asp['Profile_Pic']=$url;
        $date= trim($data['dobs'])??"";
        $cdate = str_replace('/', '-', $date);
        $asp['Date_Of_Birth']=date('Y-m-d',strtotime($cdate));
        $asp['Gender']=trim($data['genders'])??"";
        $asp['Middle_Name']=trim($data['middlenames'])??"";
        $status=$this->Api_model->updatepersonal($comm,$asp,$idd); 
        $status?$this->httpOk('MSG_200_008', MSG_200_008):$this->httpOk('MSG_200_009', MSG_200_009);
    }

}