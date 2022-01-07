<?php
require APPPATH.'/controllers/API/Common/Common.php';

class AspRegisteration extends Common 
{
    public function getprofiles_post()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        $iwanttobe=array();
        $iwanttobe['name']=trim($data["iwanttobe"])??"";
        $getallprof['getallprof']=$this->Api_model->getallprofiles($iwanttobe);
        $this->httpOkGetResponse($getallprof);
    }

    public function getseniority_get()
    {
        $getsen['getsen']=$this->Api_model->getseniority();
        $this->httpOkGetResponse($getsen);
    }
    
}