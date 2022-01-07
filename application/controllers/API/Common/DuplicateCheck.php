<?php
require APPPATH.'/controllers/API/Common/Common.php';

class DuplicateCheck extends Common 
{
    public function mobile_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $mobile = trim($data["mobilenumber"])??"";
        if ($mobile!='') {
            $getvalue=$this->Api_model->validMobile($mobile);
            if ($getvalue>0) {
                $this->httpOk('MSG_200_003', MSG_200_003);
            } else {
                $this->httpOk('MSG_200_004', MSG_200_004);
            }
        } else {
           $this->httpNotFound('EN_404_002', EN_404_002);
        }
    }

    public function email_post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = trim($data["email"])??"";
        if ($email!='') {
            $getvalue=$this->Api_model->duplicateemailcheck($email);
            if ($getvalue>0) {
                $this->httpOk('MSG_200_005', MSG_200_005);
            } else {
                $this->httpOk('MSG_200_004', MSG_200_004);
            }
        } else {
           $this->httpNotFound('EN_404_003', EN_404_003);
        }
    }

}