<?php
require APPPATH.'/controllers/API/Common/Common.php';

class Empregisteration extends Common 
{
    public function getemployerinputdetails_get()
    {
        $getstates['getstates']=$this->Api_model->state();
        $getempcat['getempcat']=$this->Api_model->getemployercat();
        $getall=array_merge_recursive($getempcat, $getstates);
        $this->httpOkGetResponse($getall);
    }

    public function getStateByCity_post(){
        $data = json_decode(file_get_contents('php://input'), true);
        $city=trim($data["city"])??"";
        if ( $city!='') {
            $getStateByCity['getStateByCity']=$this->Api_model->getStateByCity($city);
            $this->httpOkGetResponse( $getStateByCity);
        }else{
            $this->httpNotFound('EN_404_004', EN_404_004);
        }
    }

}