<?php
require APPPATH.'/controllers/API/Common/Common.php';
class Jobbox extends Common {

    public function getJobBoxBySortData_get(){
        $response['JobBoxData'] = array();
		$USER_ID=trim($this->param["USER_ID"]);
		$result=$this->Jobbox_model->getJobBoxExecute($USER_ID);
        foreach ($result as $key) {
            $data[] = array(
                'ID'=>$key['ID'],
                'PROFILE_NAME'=>$key['PROFILE_NAME'],
                'JOB_TITLE_NAME'=>$key['JOB_TITLE_NAME'],
                'VIEW_COUNTER'=>$key['VIEW_COUNTER']
            );
             $response['JobBoxData'] = $data;
        }
		$this->httpOkGetResponse($response);
        
    }
    
    public function getJobBoxData_get(){
        $response['JobBoxData'] = array();
		$USER_ID=trim($this->param["USER_ID"]);
		$result=$this->Jobbox_model->getJobBoxExecute($USER_ID);
        foreach ($result as $key) {
            // ----- skills get-------------------//
          //  $SKILLS = explode (",", $key['SKILLS']); 
            $SKILLS=array($key['SKILLS']);
                $selectedItems = 'SKILL_NAME';
                $table = 'skills';
                $columnName = 'ID';
                $SKILLs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SKILL);
           
            $SKILLS = implode(",",$SKILLs);
           // print_r($SKILLS);die();
            // ----- location get-------------------//
            $LOCATIONS = explode (",", $key['LOCATION_IDS']); 
            foreach ($LOCATIONS as $LOCATION) {
                $selectedItems = 'LOCATION_NAME';
                $table = 'location';
                $columnName = 'ID';
                $LOCATIONs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LOCATION);
            }
            $LOCATIONS = implode(",",$LOCATIONs);
            // ----- Langulage get-------------------//
            $LANGUAGES = explode (",", $key['LANGUAGES']); 
            foreach ($LANGUAGES as $LANGUAGE) {
                $selectedItems = 'LANGUAGE_NAME';
                $table = 'languages';
                $columnName = 'ID';
                $LANGUAGEs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LANGUAGE);
            }
            $LANGUAGES = implode(",",$LANGUAGEs);
            // ----- software get-------------------//
            $SOFTWARES = explode (",", $key['SOFTWARES']); 
            foreach ($SOFTWARES as $SOFTWARE) {
                $selectedItems = 'SOFTWARES_NAME';
                $table = 'software';
                $columnName = 'ID';
                $SOFTWAREs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SOFTWARE);
            }
            $SOFTWARES = implode(",",$SOFTWAREs);
             // ----- software get-------------------//
            $TAGS = explode (",", $key['TAGS']); 
            foreach ($TAGS as $TAG) {
                $selectedItems = 'TAG_NAME';
                $table = 'tags';
                $columnName = 'ID';
                $TAGs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$TAG);
            }
            $TAGS = implode(",",$TAGs);
            $data[] = array(
                'ID'=>$key['ID'],
                'PROFILE_NAME'=>$key['PROFILE_NAME'],
                'name'=>$key['name'],
                'PROJECT_NAME'=>$key['PROJECT_NAME'],
                'JOB_TITLE_NAME'=>$key['JOB_TITLE_NAME'],
                'TYPE'=>$key['TYPE'],
                'BUDGET'=>$key['BUDGET'],
                'DURATION_STARTDATE'=>$key['DURATION_STARTDATE'],
                'DURATION_ENDDATE'=>$key['DURATION_ENDDATE'],
                'VALIDITY_STARTDATE'=>$key['VALIDITY_STARTDATE'],
                'VALIDITY_ENDDATE'=>$key['VALIDITY_ENDDATE'],
                'JOB_DESCRIPTION'=>$key['JOB_DESCRIPTION'],
                'AGE_RANGE'=>$key['AGE_RANGE'],
                'EXPERIENCE_RANGE'=>$key['EXPERIENCE_RANGE'],
                'EXPERTISE'=>$key['EXPERTISE'],
                'LANGUAGE_NAME'=>$LANGUAGES,
                'SKILLS'=>$SKILLS,
                'LOCATIONS'=>$LOCATIONS,
                'SOFTWARES_NAME'=>$SOFTWARES,
                'PORTFOLIO'=>$key['PORTFOLIO'],
                'INDUSTRY_NAME'=>$key['INDUSTRY_NAME'],
                'AREA_NAME'=>$key['AREA_NAME'],
                'OTHER_EXPECTATION'=>$key['OTHER_EXPECTATION'],
                'POINTS_FOR_TALENT'=>$key['POINTS_FOR_TALENT'],
                'TAG_NAME'=>$TAGS,
                'AUDITION'=>$key['AUDITION'],
                'STATUS_NAME'=>$key['STATUS_NAME'],
                'VIEW_COUNTER'=>$key['VIEW_COUNTER']
            );
             $response['JobBoxData'] = $data;
        }
		$this->httpOkGetResponse($response);
    }
    public function getJobBoxDataByID_get(){
        $response['JobBoxData'] = array();
		$ID=trim($this->param["ID"]);
		$result=$this->Jobbox_model->getJobBoxIDExecute($ID);
        foreach ($result as $key) {
            // ----- skills get-------------------//
            $SKILLS = explode (",", $key['SKILLS']); 
            foreach ($SKILLS as $SKILL) {
                $selectedItems = 'SKILL_NAME';
                $table = 'skills';
                $columnName = 'ID';
                $SKILLs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SKILL);
            }
            $SKILLS = implode(",",$SKILLs);
            // ----- location get-------------------//
            $LOCATIONS = explode (",", $key['LOCATION_IDS']); 
            foreach ($LOCATIONS as $LOCATION) {
                $selectedItems = 'LOCATION_NAME';
                $table = 'location';
                $columnName = 'ID';
                $LOCATIONs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LOCATION);
            }
            $LOCATIONS = implode(",",$LOCATIONs);
            // ----- Langulage get-------------------//
            $LANGUAGES = explode (",", $key['LANGUAGES']); 
            foreach ($LANGUAGES as $LANGUAGE) {
                $selectedItems = 'LANGUAGE_NAME';
                $table = 'languages';
                $columnName = 'ID';
                $LANGUAGEs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LANGUAGE);
            }
            $LANGUAGES = implode(",",$LANGUAGEs);
            // ----- software get-------------------//
            // $SOFTWARES = explode (",", $key['SOFTWARES']); 
            // foreach ($SOFTWARES as $SOFTWARE) {
            //     $selectedItems = 'SOFTWARES_NAME';
            //     $table = 'software';
            //     $columnName = 'ID';
            //     $SOFTWAREs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SOFTWARE);
            // }
            // $SOFTWARES = implode(",",$SOFTWAREs);
             // ----- software get-------------------//
            $TAGS = explode (",", $key['TAGS']); 
            foreach ($TAGS as $TAG) {
                $selectedItems = 'TAG_NAME';
                $table = 'tags';
                $columnName = 'ID';
                $TAGs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$TAG);
            }
            $TAGS = implode(",",$TAGs);
            $data[] = array(
                'ID'=>$key['ID'],
                'PROFILE_NAME'=>$key['PROFILE_NAME'],
                'name'=>$key['name'],
                'PROJECT_NAME'=>$key['PROJECT_NAME'],
                'JOB_TITLE_NAME'=>$key['JOB_TITLE_NAME'],
                // 'TYPE'=>$key['TYPE'],
                // 'BUDGET'=>$key['BUDGET'],
                // 'DURATION_STARTDATE'=>$key['DURATION_STARTDATE'],
                // 'DURATION_ENDDATE'=>$key['DURATION_ENDDATE'],
                // 'VALIDITY_STARTDATE'=>$key['VALIDITY_STARTDATE'],
                // 'VALIDITY_ENDDATE'=>$key['VALIDITY_ENDDATE'],
                'JOB_DESCRIPTION'=>$key['JOB_DESCRIPTION'],
                'AGE_RANGE'=>$key['AGE_RANGE'],
                'EXPERIENCE_RANGE'=>$key['EXPERIENCE_RANGE'],
                'EXPERTISE'=>$key['EXPERTISE'],
                'LANGUAGE_NAME'=>$LANGUAGES,
                'SKILLS'=>$SKILLS,
                'LOCATIONS'=>$LOCATIONS,
                //'SOFTWARES_NAME'=>$SOFTWARES,
                // 'PORTFOLIO'=>$key['PORTFOLIO'],
                // 'INDUSTRY_NAME'=>$key['INDUSTRY_NAME'],
                // 'AREA_NAME'=>$key['AREA_NAME'],
                // 'OTHER_EXPECTATION'=>$key['OTHER_EXPECTATION'],
                // 'POINTS_FOR_TALENT'=>$key['POINTS_FOR_TALENT'],
                'TAG_NAME'=>$TAGS,
                'AUDITION'=>$key['AUDITION'],
                'STATUS_NAME'=>$key['STATUS_NAME'],
                'VIEW_COUNTER'=>$key['VIEW_COUNTER']
            );
             $response['JobBoxData'] = $data;
        }
		$this->httpOkGetResponse($response);
    }
    public function getAllJobBoxData_get(){	
        $response['JobBoxData'] = array();
		$result=$this->Jobbox_model->getAllJobBoxExecute();
        foreach ($result as $key) {
            // ----- skills get-------------------//
            $SKILLS = explode (",", $key['SKILLS']); 
            foreach ($SKILLS as $SKILL) {
                $selectedItems = 'SKILL_NAME';
                $table = 'skills';
                $columnName = 'ID';
                $SKILLs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SKILL);
            }
            $SKILLS = implode(",",$SKILLs);
            // ----- location get-------------------//
            $LOCATIONS = explode (",", $key['LOCATION_IDS']); 
            foreach ($LOCATIONS as $LOCATION) {
                $selectedItems = 'LOCATION_NAME';
                $table = 'location';
                $columnName = 'ID';
                $LOCATIONs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LOCATION);
            }
            $LOCATIONS = implode(",",$LOCATIONs);
            // ----- Langulage get-------------------//
            $LANGUAGES = explode (",", $key['LANGUAGES']); 
            foreach ($LANGUAGES as $LANGUAGE) {
                $selectedItems = 'LANGUAGE_NAME';
                $table = 'languages';
                $columnName = 'ID';
                $LANGUAGEs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LANGUAGE);
            }
            $LANGUAGES = implode(",",$LANGUAGEs);
            // ----- software get-------------------//
            $SOFTWARES = explode (",", $key['SOFTWARES']); 
            foreach ($SOFTWARES as $SOFTWARE) {
                $selectedItems = 'SOFTWARES_NAME';
                $table = 'software';
                $columnName = 'ID';
                $SOFTWAREs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SOFTWARE);
            }
            $SOFTWARES = implode(",",$SOFTWAREs);
             // ----- software get-------------------//
            $TAGS = explode (",", $key['TAGS']); 
            foreach ($TAGS as $TAG) {
                $selectedItems = 'TAG_NAME';
                $table = 'tags';
                $columnName = 'ID';
                $TAGs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$TAG);
            }
            $TAGS = implode(",",$TAGs);
            $data[] = array(
                'ID'=>$key['ID'],
                'PROFILE_NAME'=>$key['PROFILE_NAME'],
                'name'=>$key['name'],
                'PROJECT_NAME'=>$key['PROJECT_NAME'],
                'JOB_TITLE_NAME'=>$key['JOB_TITLE_NAME'],
                'TYPE'=>$key['TYPE'],
                'BUDGET'=>$key['BUDGET'],
                'DURATION_STARTDATE'=>$key['DURATION_STARTDATE'],
                'DURATION_ENDDATE'=>$key['DURATION_ENDDATE'],
                'VALIDITY_STARTDATE'=>$key['VALIDITY_STARTDATE'],
                'VALIDITY_ENDDATE'=>$key['VALIDITY_ENDDATE'],
                'JOB_DESCRIPTION'=>$key['JOB_DESCRIPTION'],
                'AGE_RANGE'=>$key['AGE_RANGE'],
                'EXPERIENCE_RANGE'=>$key['EXPERIENCE_RANGE'],
                'EXPERTISE'=>$key['EXPERTISE'],
                'LANGUAGE_NAME'=>$LANGUAGES,
                'SKILLS'=>$SKILLS,
                'LOCATIONS'=>$LOCATIONS,
                'SOFTWARES_NAME'=>$SOFTWARES,
                'PORTFOLIO'=>$key['PORTFOLIO'],
                'INDUSTRY_NAME'=>$key['INDUSTRY_NAME'],
                'AREA_NAME'=>$key['AREA_NAME'],
                'OTHER_EXPECTATION'=>$key['OTHER_EXPECTATION'],
                'POINTS_FOR_TALENT'=>$key['POINTS_FOR_TALENT'],
                'TAG_NAME'=>$TAGS,
                'AUDITION'=>$key['AUDITION'],
                'STATUS_NAME'=>$key['STATUS_NAME'],
                'VIEW_COUNTER'=>$key['VIEW_COUNTER']
            );
             $response['JobBoxData'] = $data;
        }
		$this->httpOkGetResponse($response);
    }
    public function saveUpdateJobBoxData_post(){
        $jobbox['USER_ID'] = trim($this->param["USER_ID"]);
        $USER_ID = trim($this->param["USER_ID"]);
        $jobbox['PROFILE_ID'] = trim($this->param["PROFILE_ID"]);

        $columnData = trim($this->param["SENIORITY"]);
        $selectedItems = 'ID';
        $table = 'asp_seniority';
        $columnName = 'name';
        $jobbox['SENIORITY_ID'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData);
        
        // $columnData = trim($this->param["LOCATION"]);
        // $locs = explode (",", $columnData); 
        // foreach ($locs as $loc) {
        //     $selectedItems = 'ID';
        //     $table = 'location';
        //     $columnName = 'LOCATION_NAME';
        //     $location[]=$loc;
        //     $LOCATION_IDS[] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$loc);
        // }
        // $jobbox['LOCATION'] = implode(",",$LOCATION_IDS);
        $jobbox['LOCATION_IDS'] = trim($this->param["LOCATION"]);

        $columnDataLANGUAGES = trim($this->param["LANGUAGES"]);
        $LANGUAGES = explode (",", $columnDataLANGUAGES); 
        foreach ($LANGUAGES as $LANGUAGE) {
            $selectedItems = 'ID';
            $table = 'languages';
            $columnName = 'LANGUAGE_NAME';
            $LANGUAGESs[] = $this->Jobbox_model->validData2($selectedItems,$table,$columnName,$LANGUAGE);
        }
        $jobbox['LANGUAGES'] = implode(",",$LANGUAGESs);
        $jobbox['TYPE'] = trim($this->param["TYPE"]);
        $jobbox['BUDGET'] = trim($this->param["BUDGET"]);
        $jobbox['DURATION_STARTDATE'] = trim($this->param["DURATION_STARTDATE"]);
        $jobbox['DURATION_ENDDATE'] = trim($this->param["DURATION_ENDDATE"]);
        $jobbox['VALIDITY_STARTDATE'] = trim($this->param["VALIDITY_STARTDATE"]);
        $jobbox['VALIDITY_ENDDATE'] = trim($this->param["VALIDITY_ENDDATE"]);
        $jobbox['JOB_DESCRIPTION'] = trim($this->param["JOB_DESCRIPTION"]);
        $jobbox['PORTFOLIO'] = trim($this->param["PORTFOLIO"]);
        $jobbox['OTHER_EXPECTATION'] = trim($this->param["OTHER_EXPECTATION"]);
        $jobbox['POINTS_FOR_TALENT'] = trim($this->param["POINTS_FOR_TALENT"]);
        //$jobbox['AUDITION'] = trim($this->param["AUDITION"]);
        $jobbox['AUDITION'] = 'Y';
        //$jobbox['VIEW_COUNTER'] = trim($this->param["VIEW_COUNTER"]);
        $jobbox['VIEW_COUNTER'] = '0';
        // $jobbox['STATUS'] = trim($this->param["STATUS"]);
         $jobbox['STATUS'] = '12';
        $JOB_TITLE_ID = trim($this->param["JOB_TITLE_ID"]);
        $columnData = trim($this->param["JOB_TITLE_ID"]);
        $selectedItems = 'ID';
        $table = 'job_title';
        $columnName = 'JOB_TITLE_NAME';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData);
        if($validateData){
            $jobbox['JOB_TITLE_ID'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData);
            $JOB_TITLE_ID = $jobbox['JOB_TITLE_ID'];
        }else{
            $columnDataaa['JOB_TITLE_NAME'] = $columnData;
            $jobbox['JOB_TITLE_ID'] = $this->Jobbox_model->saveDataToTable($table,$columnDataaa);
            $JOB_TITLE_ID = $jobbox['JOB_TITLE_ID'];
        }
        $columnData1 = trim($this->param["PROJECT_ID"]);
        $selectedItems = 'ID';
        $table = 'project';
        $columnName = 'PROJECT_NAME';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData1);
        if($validateData){
            $jobbox['PROJECT_ID'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData1);
        }else{
            $columnDataaa1['PROJECT_NAME'] = $columnData1;
            $jobbox['PROJECT_ID'] = $this->Jobbox_model->saveDataToTable($table,$columnDataaa1);
        }
        $columnData2 = trim($this->param["EXPERTISE"]);
        $selectedItems = 'ID';
        $table = 'expertise';
        $columnName = 'EXPERTISE';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData2);
        if($validateData){
            $jobbox['EXPERTISE'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData2);
        }else{
            $columnDataa2['EXPERTISE'] = $columnData2;
            $jobbox['EXPERTISE'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa2);
        }




        // $columnData3 = trim($this->param["SKILLS"]);
        // $selectedItems = 'ID';
        // $table = 'skills';
        // $columnName = 'SKILL_NAME';
        // $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData3);
        // if($validateData){
        //     $jobbox['SKILLS'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData3);
        // }else{
        //     $columnDataa3['SKILL_NAME'] = $columnData3;
        //     $jobbox['SKILLS'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa3);
        // }

        $columnDataSKILLS = trim($this->param["SKILLS"]);
        $SKILLS = explode (",", $columnDataSKILLS); 
        foreach ($SKILLS as $SKILL) {
            $selectedItems = 'ID';
            $table = 'skills';
            $columnName = 'SKILL_NAME';
            $SKILLs[] = $this->Jobbox_model->validData2($selectedItems,$table,$columnName,$SKILL);
        }
        $jobbox['SKILLS'] = implode(",",$SKILLs);

        $columnData4 = trim($this->param["FUNCTIONAL_INDUSTRY_ID"]);
        $selectedItems = 'ID';
        $table = 'functional_industry';
        $columnName = 'INDUSTRY_NAME';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData4);
        if($validateData){
            $jobbox['FUNCTIONAL_INDUSTRY_ID'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData4);
        }else{
            $columnDataa4['INDUSTRY_NAME'] = $columnData4;
            $jobbox['FUNCTIONAL_INDUSTRY_ID'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa4);
        }
        $columnData5 = trim($this->param["FUNCTIONAL_AREA_ID"]);
        $selectedItems = 'ID';
        $table = 'functional_area';
        $columnName = 'AREA_NAME';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData5);
        if($validateData){
            $jobbox['FUNCTIONAL_AREA_ID'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData5);
        }else{
            $columnDataa5['AREA_NAME'] = $columnData5;
            $jobbox['FUNCTIONAL_AREA_ID'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa5);
        }
        
        // $columnData6 = trim($this->param["TAGS"]);
        // $selectedItems = 'ID';
        // $table = 'tags';
        // $columnName = 'TAG_NAME';
        // $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData6);
        // if($validateData){
        //     $jobbox['TAGS'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData6);
        // }else{
        //     $columnDataa6['TAG_NAME'] = $columnData6;
        //     $jobbox['TAGS'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa6);
        // }
        $columnDataTAGS = trim($this->param["TAGS"]);
        $TAGS = explode (",", $columnDataTAGS); 
        foreach ($TAGS as $TAG) {
            $selectedItems = 'ID';
            $table = 'tags';
            $columnName = 'TAG_NAME';
            $TAGSs[] = $this->Jobbox_model->validData2($selectedItems,$table,$columnName,$TAG);
        }
        $jobbox['TAGS'] = implode(",",$TAGSs);

        $columnDataSOFTWARES = trim($this->param["SOFTWARES_NAME"]);
        $SOFTWARES = explode (",", $columnDataSOFTWARES); 
        foreach ($SOFTWARES as $SOFTWARE) {
            $selectedItems = 'ID';
            $table = 'software';
            $columnName = 'SOFTWARES_NAME';
            $SOFTWARESs[] = $this->Jobbox_model->validData2($selectedItems,$table,$columnName,$SOFTWARE);
        }
        $jobbox['SOFTWARES'] = implode(",",$SOFTWARESs);
        
        $columnData9 = trim($this->param["AGE_RANGE"]);
        $selectedItems = 'ID';
        $table = 'age_range';
        $columnName = 'AGE_RANGE';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData9);
        if($validateData){
            $jobbox['AGE_RANGE'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData9);
        }else{
            $columnDataa9['AGE_RANGE'] = $columnData9;
            $jobbox['AGE_RANGE'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa9);
        }

        $columnData10 = trim($this->param["EXPERIENCE_RANGE"]);
        $selectedItems = 'ID';
        $table = 'experience';
        $columnName = 'EXPERIENCE_RANGE';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData10);
        if($validateData){
            $jobbox['EXPERIENCE'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData10);
        }else{
            $columnDataa10['EXPERIENCE_RANGE'] = $columnData10;
            $jobbox['EXPERIENCE'] = $this->Jobbox_model->saveDataToTable($table,$columnDataa10);
        }

        $ID = trim($this->param["ID"]);
        $flag = trim($this->param["flag"]);
        if($flag == 'insert'){
           
            $columnData7 = trim($this->param["JOB_TITLE_ID"]);
            $selectedItems = 'ID';
            $table = 'job_title';
            $columnName = 'JOB_TITLE_NAME';
            $JOB_TITLE_ID = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData7);
            $validatetitle=$this->Jobbox_model->validatetitle($USER_ID ,$JOB_TITLE_ID);
            if($validatetitle){
                $status?$this->httpOk('MSG_200_026',MSG_200_026):$this->httpOk('MSG_200_026',MSG_200_026);
                
            }else{
                $jobbox['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
                $status=$this->Jobbox_model->saveJobBoxExecute($jobbox);
                $status?$this->httpOk('MSG_200_020',MSG_200_020):$this->httpOk('MSG_200_021',MSG_200_021);
               
            }
        }else{
             
                $jobbox['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
                $status=$this->Jobbox_model->updateJobBoxExecute($jobbox, $USER_ID,$ID);
                $status?$this->httpOk('MSG_200_022',MSG_200_022):$this->httpOk('MSG_200_023',MSG_200_023);
                 
        }
    }
    public function deleteJobBoxData_post(){
		$USER_ID=trim($this->param["USER_ID"]);	
        $ID=trim($this->param["ID"]);	
        $jobbox['DELETE_FLAG'] = "Y";
		$status=$this->Jobbox_model->deleteJobBoxExecute($jobbox, $USER_ID,$ID);
        $status?$this->httpOk('MSG_200_024',MSG_200_024):$this->httpOk('MSG_200_025',MSG_200_025);
    }
    public function getProjectData_post(){
        $searchParam=trim($this->param["PROJECT_NAME"]);
        $table='project';
        $selectedColumn='PROJECT_NAME';
        $selectedColumn2 = 'ID,PROJECT_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getSoftware_post(){
        $searchParam=trim($this->param["SOFTWARES_NAME"]);
        $table='software';
        $selectedColumn='SOFTWARES_NAME';
        $selectedColumn2 = 'ID,SOFTWARES_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getLocationData_post(){
        $searchParam=trim($this->param["LOCATION_NAME"]);
        $table='location';
        $selectedColumn='LOCATION_NAME';
        $selectedColumn2 = 'ID,LOCATION_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getAgeRangeData_post(){
        $searchParam=trim($this->param["AGE_RANGE"]);
        $table='age_range';
        $selectedColumn='AGE_RANGE';
        $selectedColumn2 = 'ID,AGE_RANGE';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }

    public function getExperienceData_post(){
		$searchParam=trim($this->param["EXPERIENCE_RANGE"]);
        $table='experience';
        $selectedColumn='EXPERIENCE_RANGE';
        $selectedColumn2 = 'ID,EXPERIENCE_RANGE';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getExpertiseData_post(){
		$searchParam=trim($this->param["EXPERTISE"]);
        $table='expertise';
        $selectedColumn='EXPERTISE';
        $selectedColumn2 = 'ID,EXPERTISE';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getLanguagesData_post(){
		$searchParam=trim($this->param["LANGUAGE_NAME"]);
        $table='languages';
        $selectedColumn='LANGUAGE_NAME';
        $selectedColumn2 = 'ID,LANGUAGE_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getSkillsData_post(){
		$searchParam=trim($this->param["SKILL_NAME"]);
        $table='skills';
        $selectedColumn='SKILL_NAME';
        $selectedColumn2 = 'ID,SKILL_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getFunctionalIndustryData_post(){
		$searchParam=trim($this->param["INDUSTRY_NAME"]);
        $table='functional_industry';
        $selectedColumn='INDUSTRY_NAME';
        $selectedColumn2 = 'ID,INDUSTRY_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getFunctionalAreaData_post(){
		$searchParam=trim($this->param["AREA_NAME"]);
        $table='functional_area';
        $selectedColumn='AREA_NAME';
        $selectedColumn2 = 'ID,AREA_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getTagsData_post(){
		$searchParam=trim($this->param["TAG_NAME"]);
        $table='tags';
        $selectedColumn='TAG_NAME';
        $selectedColumn2 = 'ID,TAG_NAME';
        $result['result']=$this->Jobbox_model->likeQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getSendInterviewInviteData_post(){
        $searchParam=trim($this->param["INVITE_NAME"]);
        $table='send_interview_invite';
        $selectedColumn='INVITE_NAME';
        $selectedColumn2 = 'ID,INVITE_NAME';
        $result['result']=$this->Jobbox_model->whereQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getCancelReasonData_post(){
        $searchParam=trim($this->param["REASON"]);
        $table='cancel_reason';
        $selectedColumn='REASON';
        $selectedColumn2 = 'ID,REASON';
        $result['result']=$this->Jobbox_model->whereQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    public function getJobTitleData_post(){
        $searchParam=trim($this->param["JOB_TITLE_NAME"]);
        $table='job_title';
        $selectedColumn='JOB_TITLE_NAME';
        $selectedColumn2 = 'ID,JOB_TITLE_NAME';
        $result['result']=$this->Jobbox_model->whereQueryExecute($table,$selectedColumn,$selectedColumn2,$searchParam);
		$this->httpOkGetResponse($result);
    }
    //--------------- job aspirant mapping api -------------------------
    public function getAspirantJobAllData_get(){
        $DELETE_FLAG="N";	
		$jobbox['AllData']=$this->Jobbox_model->getAspirantJobAllExecute($DELETE_FLAG);
		$this->httpOkGetResponse($jobbox);
    }
    public function getAspirantJobBoxData_get(){
		$USER_ID=trim($this->param["USER_ID"]);	
        $DELETE_FLAG="N";	
		$jobbox['AspirantJobBox']=$this->Jobbox_model->getAspirantJobBoxExecute($USER_ID,$DELETE_FLAG);
		$this->httpOkGetResponse($jobbox);
    }
    public function saveUpdateAspirantJobBoxData_post(){
        $jobbox['USER_ID'] = trim($this->param["USER_ID"]);
        $USER_ID = trim($this->param["USER_ID"]);
        $jobbox['REQUEST_PROFILE_UPDATE'] = trim($this->param["REQUEST_PROFILE_UPDATE"]);
        $jobbox['INVITATION_STATUS'] = trim($this->param["INVITATION_STATUS"]);
        $jobbox['JOB_APPLICANT_STATUS'] = trim($this->param["JOB_APPLICANT_STATUS"]);
        $JOB_TITLE_ID = trim($this->param["JOB_TITLE_ID"]);
        $columnData = trim($this->param["JOB_TITLE_ID"]);
        $selectedItems = 'ID';
        $table = 'job_title';
        $columnName = 'JOB_TITLE_NAME';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData);
        if($validateData){
            $jobbox['JOB_TITLE_ID'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData);
            $JOB_TITLE_ID = $jobbox['JOB_TITLE_ID'];
        }else{
            $columnDataaa['JOB_TITLE_NAME'] = $columnData;
            $jobbox['JOB_TITLE_ID'] = $this->Jobbox_model->saveDataToTable($table,$columnDataaa);
            $JOB_TITLE_ID = $jobbox['JOB_TITLE_ID'];
        }
        $columnData = trim($this->param["CANCEL_REASON"]);
        $selectedItems = 'ID';
        $table = 'cancel_reason';
        $columnName = 'REASON';
        $validateData=$this->Jobbox_model->validData($selectedItems,$table,$columnName,$columnData);
        if($validateData){
            $jobbox['CANCEL_REASON'] = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData);
        }else{
            $columnnDataaa['REASON'] = $columnData;
            $jobbox['CANCEL_REASON'] = $this->Jobbox_model->saveDataToTable($table,$columnnDataaa);
        }
        $ID = trim($this->param["ID"]);
        $flag = trim($this->param["flag"]);
        if($flag == 'insert'){
            $columnData7 = trim($this->param["JOB_TITLE_ID"]);
            $selectedItems = 'ID';
            $table = 'job_title';
            $columnName = 'JOB_TITLE_NAME';
            $JOB_TITLE_ID = $this->Jobbox_model->validData1($selectedItems,$table,$columnName,$columnData7);
            $validatetitle=$this->Jobbox_model->validatetitleasp($USER_ID ,$JOB_TITLE_ID);
            if($validatetitle){
                $status?$this->httpOk('MSG_200_026',MSG_200_026):$this->httpOk('MSG_200_026',MSG_200_026);
            }else{
                $jobbox['RECORD_INSERTED_DTTM']=date('Y-m-d h:i:s');
                $status=$this->Jobbox_model->saveAspirantJobBoxExecute($jobbox);
                $status?$this->httpOk('MSG_200_020',MSG_200_020):$this->httpOk('MSG_200_021',MSG_200_021);
            }
        }else{
                $jobbox['RECORD_UPDATED_DTTM']=date('Y-m-d h:i:s');
                $status=$this->Jobbox_model->updateAspirantJobBoxExecute($jobbox, $USER_ID,$ID);
                $status?$this->httpOk('MSG_200_022',MSG_200_022):$this->httpOk('MSG_200_023',MSG_200_023);
        }
    }
    public function deleteAspirantJobBoxData_post(){
		$USER_ID=trim($this->param["USER_ID"]);	
        $ID=trim($this->param["ID"]);	
        $jobbox['DELETE_FLAG'] = "Y";
		$status=$this->Jobbox_model->deleteAspirantJobBoxExecute($jobbox, $USER_ID, $ID);
        $status?$this->httpOk('MSG_200_024',MSG_200_024):$this->httpOk('MSG_200_025',MSG_200_025);
    }
    public function getStatusData_get(){	
		$status['status']=$this->Jobbox_model->getStatusExecute();
		$this->httpOkGetResponse($status);
    }
    public function getSortByData_get(){  	
		$sortby['sortby']=$this->Jobbox_model->getSortByExecute();
		$this->httpOkGetResponse($sortby);
    } 
    public function updateStatus_post(){
        $USER_ID=trim($this->param["USER_ID"]);	
        $ID=trim($this->param["ID"]);	
        $status=trim($this->param["status"]);
        $getStatusName['STATUS'] = $this->Jobbox_model->getStatusByName($status);
        $status=$this->Jobbox_model->updateStatusJobBoxExecute($getStatusName,$USER_ID,$ID);
        $status?$this->httpOk('MSG_200_020',MSG_200_020):$this->httpOk('MSG_200_021',MSG_200_021);
    }    
    public function getJobsByStatus_get(){
        $response['JobBoxData'] = array();
        $USER_ID=trim($this->param["USER_ID"]);	
        $status=trim($this->param["status"]);
        $statusid = $this->Jobbox_model->getStatusByName($status);
        $result=$this->Jobbox_model->getJobsByStatus($USER_ID,$statusid);
        foreach ($result as $key) {
            // ----- skills get-------------------//
            $SKILLS = explode (",", $key['SKILLS']); 
            foreach ($SKILLS as $SKILL) {
                $selectedItems = 'SKILL_NAME';
                $table = 'skills';
                $columnName = 'ID';
                $SKILLs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SKILL);
            }
            $SKILLS = implode(",",$SKILLs);
            // ----- location get-------------------//
            $LOCATIONS = explode (",", $key['LOCATION_IDS']); 
            foreach ($LOCATIONS as $LOCATION) {
                $selectedItems = 'LOCATION_NAME';
                $table = 'location';
                $columnName = 'ID';
                $LOCATIONs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LOCATION);
            }
            $LOCATIONS = implode(",",$LOCATIONs);
            // ----- Langulage get-------------------//
            $LANGUAGES = explode (",", $key['LANGUAGES']); 
            foreach ($LANGUAGES as $LANGUAGE) {
                $selectedItems = 'LANGUAGE_NAME';
                $table = 'languages';
                $columnName = 'ID';
                $LANGUAGEs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$LANGUAGE);
            }
            $LANGUAGES = implode(",",$LANGUAGEs);
            // ----- software get-------------------//
            $SOFTWARES = explode (",", $key['SOFTWARES']); 
            foreach ($SOFTWARES as $SOFTWARE) {
                $selectedItems = 'SOFTWARES_NAME';
                $table = 'software';
                $columnName = 'ID';
                $SOFTWAREs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$SOFTWARE);
            }
            $SOFTWARES = implode(",",$SOFTWAREs);
             // ----- software get-------------------//
            $TAGS = explode (",", $key['TAGS']); 
            foreach ($TAGS as $TAG) {
                $selectedItems = 'TAG_NAME';
                $table = 'tags';
                $columnName = 'ID';
                $TAGs[] = $this->Jobbox_model->validData3($selectedItems,$table,$columnName,$TAG);
            }
            $TAGS = implode(",",$TAGs);
            $data[] = array(
                'ID'=>$key['ID'],
                'PROFILE_NAME'=>$key['PROFILE_NAME'],
                'name'=>$key['name'],
                'PROJECT_NAME'=>$key['PROJECT_NAME'],
                'JOB_TITLE_NAME'=>$key['JOB_TITLE_NAME'],
                // 'TYPE'=>$key['TYPE'],
                // 'BUDGET'=>$key['BUDGET'],
                // 'DURATION_STARTDATE'=>$key['DURATION_STARTDATE'],
                // 'DURATION_ENDDATE'=>$key['DURATION_ENDDATE'],
                // 'VALIDITY_STARTDATE'=>$key['VALIDITY_STARTDATE'],
                // 'VALIDITY_ENDDATE'=>$key['VALIDITY_ENDDATE'],
                'JOB_DESCRIPTION'=>$key['JOB_DESCRIPTION'],
                'AGE_RANGE'=>$key['AGE_RANGE'],
                'EXPERIENCE_RANGE'=>$key['EXPERIENCE_RANGE'],
                'EXPERTISE'=>$key['EXPERTISE'],
                'LANGUAGE_NAME'=>$LANGUAGES,
                'SKILLS'=>$SKILLS,
                'LOCATIONS'=>$LOCATIONS,
                //'SOFTWARES_NAME'=>$SOFTWARES,
                // 'PORTFOLIO'=>$key['PORTFOLIO'],
                // 'INDUSTRY_NAME'=>$key['INDUSTRY_NAME'],
                // 'AREA_NAME'=>$key['AREA_NAME'],
                // 'OTHER_EXPECTATION'=>$key['OTHER_EXPECTATION'],
                // 'POINTS_FOR_TALENT'=>$key['POINTS_FOR_TALENT'],
                'TAG_NAME'=>$TAGS,
                'AUDITION'=>$key['AUDITION'],
                'STATUS_NAME'=>$key['STATUS_NAME'],
                'VIEW_COUNTER'=>$key['VIEW_COUNTER']
            );
             $response['JobBoxData'] = $data;
        }
        $this->httpOkGetResponse($response);
    } 
    public function aspirantDetail_post(){
        $ID=trim($this->param["ID"]);
        $USER_ID = trim($this->param["USER_ID"]);
        $Profile_Id = trim($this->param["Profile_Id"]);
        $result=$this->Jobbox_model->getaspirantDetailExecute($USER_ID,$ID);
        $ProfileDetails=$this->Jobbox_model->getaspirantProfileDetails($USER_ID,$Profile_Id);
        foreach ($result as $key) {
            
            $response['Personal Details'] = array(
                'Gender'=>$key['Gender'],
                'Date_Of_Birth'=>$key['Date_Of_Birth'],
                'Address'=>$key['Permanent_Address'],
                'City_Pincode'=>$key['City'].$key['Pin_Code'],
                'Country'=>$key['Country'],
                'Mobile_No'=>$key['Mobile_No'],
                'E_Mail'=>$key['E_Mail'],
                'Hobbies'=>$key['Hobbies'],
                'Interests'=>'',
                
            );
            $response['Professional Details'] = array(
                'Working_Status'=>$key['Working_Status'],
                'Association_Name'=>$key['Association_Name'],
                'License_No'=>$key['License_No'],
                'Job_Title'=>$key['Job_Title'],
                'Job_Locality'=>$key['Job_Locality'],
                'Certificate'=>$key['Certificate'],
                'Current_Pay'=>$key['Current_Pay'],
                'Notice_Period'=>$key['Notice_Period'],
                'Yrs_of_Exp'=>$key['Yrs_of_Exp'],
                'Present_Job_Roles'=>$key['Present_Job_Roles'],
                'Job_Desc'=>$key['Job_Desc'],
                'Current_Working_Status'=>$key['Current_Working_Status'],
                'Clients_wrk_with'=>$key['Clients_wrk_with'],
                'Project_Done'=>$key['Project_Done'],
                'Project_Type'=>$key['Project_Type'],
            );
            $response['Educational Details'] = array(
                'Highest_Education'=>$key['Highest_Education'],
                'Specialization'=>$key['Specialization'],
                'Year_of_Passing'=>$key['Year_of_Passing'],
                'Othr_Certificates'=>$key['Othr_Certificates'],
                'Language_Known'=>$key['Language_Known'],
                'Softwares'=>$key['Softwares'],
                'Othr_Compt_Achievements'=>$key['Othr_Compt_Achievements'],
                'City_Pincode'=>$key['City'].$key['Pin_Code'],
                'Country'=>$key['Country'],
            );
        }
        foreach ($ProfileDetails as $key) {
            $json = json_decode($key['User_From_Val'], true);
            $response['Profile_Details'] = array(
                'Profile'=>$json
            );
        }
        $this->httpOkGetResponse($response);
    }
}