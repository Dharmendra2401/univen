<?php
require APPPATH.'/controllers/API/Common/Common.php';
class StudiorentalArtist extends Common {
    public function getArtistProfile_post(){
        $FORM_TYPE=trim($this->param["FORM_TYPE"]);
        $result['result']=$this->StudiorentalArtist_model->getArtistProfile($FORM_TYPE);
		$this->httpOkGetResponse($result);
	}
	public function filterArtist_post(){
	    $SORT_BY = trim($this->param["SORT_BY"]);
	    $PROFILE = trim($this->param["PROFILE"]);
        $search = trim($this->param["SEARCH"]);
        $FORM_TYPE=trim($this->param["FORM_TYPE"]);
        $table='studio_rentals_profile';
        $selectedColumn='PROFILE_NAME';
        $allProfile=$this->StudiorentalArtist_model->getArtistProfile($FORM_TYPE);
        $username=$this->StudiorentalArtist_model->getUserIdByName($search);
        $profileid=$this->StudiorentalArtist_model->getProfileIdByName($search);
        $result['result']=$this->StudiorentalArtist_model->filterArtist($search,$username,$profileid,$allProfile,$PROFILE,$SORT_BY);
		$this->httpOkGetResponse($result);
	}
	public function insertArtistProject_post(){
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
}
     