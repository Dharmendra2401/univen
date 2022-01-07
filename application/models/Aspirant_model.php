<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Aspirant_model extends CI_Model {
    public function authfalse(){
   
        $getadmin=$this->session->userdata('aspirant');
        if(!empty($getadmin)){
        redirect(base_url().'aspirant/dashboard');
        return false;
        }
        
        
        }

        public function authtrue(){
   
            $getadmin=$this->session->userdata('aspirant');
            
            if(empty($getadmin)){
            redirect(base_url().'login');
            return true;
            }
            
            
        }

        public function emailverfied(){
            $getadmin=$this->session->userdata('aspirant');
            $email=$getadmin['E_Mail'];
            $cond=array('E_Mail'=>$email,'ACTIVE_STATUS'=>'Y');
            $getverify=$this->db->select('ACTIVE_STATUS')->from('communication')->where($cond)->get()->num_rows();
            echo $getverify;

        }
       
        public function getpersonaldetails($id){
            $get=$this->db->select('asp.*,comm.*,proffesion.*,edu.*')->from('applicant_recruiter as asp')->join('communication as comm','comm.USER_ID=asp.USER_ID','INNER')->join('user_profession as proffesion ','proffesion.USER_ID=asp.USER_ID','LEFT')->join('user_education as edu','edu.USER_ID=asp.USER_ID','LEFT')->where('asp.USER_ID',$id)->get()->row_array();
            return $get;

        }
        public function updatepersonal($comm,$asp,$id){
            $this->db->where('USER_ID',$id)->update('applicant_recruiter',$asp);
            $this->db->where('USER_ID',$id)->update('communication',$comm);
        }

        public function getpopupadddetails($id){
            $cond='asp.Middle_Name!="" and asp.Date_Of_Birth!="" and asp.Gender!="" and comm.Pin_Code!="" and asp.Profile_Pic!="" and asp.USER_ID="'.$id.'" ';
            echo $getselect=$this->db->select('asp.*,comm.*')->from('applicant_recruiter as asp')->join('communication as comm','comm.USER_ID=asp.USER_ID','INNER')->where($cond)->get()->num_rows();
        }


     

        public function interest(){
            $cond=array('ACTIVE_STATUS'=>'Y','Delete_Flag'=>'N');
            $getall=$this->db->select('Interest_Name')->from('interest')->where($cond)->get()->result_array();
            return $getall;

        }

        public function getassociatedname($name){
            $getname=$this->db->select(' Association_Name')->from('asp_association_name')->where("Association_Name LIKE '%$name%'")->order_by('Association_Name','asc')->get()->result_array();
           
            return $getname;
        }
        public function getassociatecount($getname){
            $cond=array("Association_Name"=>$getname);
            $getcount=$this->db->select(' Association_Name')->from('asp_association_name')->where($cond)->get()->num_rows();
            return $getcount;
        }
        public function addassociate($add){
            $this->db->insert('asp_association_name',$add);
        }

        

        public function addcertificate($add){
            $this->db->insert('asp_certificate_name',$add);
        }

        public function getcountcertificate($getname){
            $cond=array("Certificate_Name"=>$getname);
            $getcount=$this->db->select('Certificate_Name')->from('asp_certificate_name')->where($cond)->get()->num_rows();
            return $getcount;
        }

        public function getjoblocality($name){

             $cond="city!='' and city !='#N/A' and city LIKE '$name%'  ";
            $getname=$this->db->select('City')->from('states_city_country')->where($cond)->group_by('city')->order_by('city','asc')->get()->result_array();
           
            return $getname;
        }

        public function updateproffessional($proff,$id){
            $countpersonal=$this->db->select('USER_ID')->from('user_profession')->where('USER_ID',$id)->get()->num_rows();
            if($countpersonal=='0'){
               $proff['USER_ID']=$id;
               $this->db->insert('user_profession',$proff);
            }else{
                $this->db->where('USER_ID',$id)->update('user_profession',$proff);
            }
            
        }

        public function getallprofiles($iwanttobe){
			$iwanttobeget.='';
			$iwanttobeget.=$iwanttobe['name'];
			$que=$this->db->select('*')->from('profile_temp')->where('PROFILE_NAME  LIKE "'.$iwanttobeget.'%"')->get()->result_array();
			
			return $que;

		}

        public function gethighesteduu($name){
            $cond="type ='Highest Education' and Delete_Flag='N' and Form_Type='Form One' and name LIKE '$name%'";
            $getname=$this->db->select('name')->from('dropdown_profile')->where($cond)->order_by('Id','desc')->get()->result_array();
           
            return $getname;

        }
      
        public function getspecialization($name){
            $cond="type ='Specialization' and Delete_Flag='N' and Form_Type='Form One' and name LIKE '$name%'";
            $getname=$this->db->select('name')->from('dropdown_profile')->where($cond)->order_by('name','asc')->get()->result_array();
           
            return $getname;

        }

        public function getcertificateone($name){
            $cond="type ='Other Ceritificate Courses' and Delete_Flag='N' and Form_Type='Form One' and name LIKE '$name%'";
            $getname=$this->db->select('name')->from('dropdown_profile')->where($cond)->order_by('name','asc')->get()->result_array();
           
            return $getname;

        }

        public function getlang(){
            $cond="type ='Language Known' and Delete_Flag='N' and Form_Type='Form One'";
            $getname=$this->db->select('name')->from('dropdown_profile')->where($cond)->order_by('name','asc')->get()->result_array();
           
            return $getname;

        }
        

        public function updateeducationdetails($education,$id){
            $countedu=$this->db->select('USER_ID')->from('user_education')->where('USER_ID',$id)->get()->num_rows();
            if($countedu=='0'){
                $education['USER_ID']=$id;
                $this->db->insert('user_education',$education);

            }else{
                $this->db->where('USER_ID',$id)->update('user_education',$education);
            }
            
        }

        public function getprofileone($getname,$getid,$getuserid){

        }
        
        public function getallpro($getid){
            $getprofile=$this->db->select('ptemp.Id,ptemp.PROFILE_NAME,utemp.Profile_Id,utemp.USER_ID')->form('PROFILE_TEMP as ptemp')->joins('utemp as USER_PROFILE_TEMP','utemp.USER_ID=ptemp.Id','left')->where('utemp.USER_ID',$getid)->get()->result_array();
        }

        public function getallprofilestwo($iwanttobe){
            $getaspuser=$this->session->userdata('aspirant');
			$iwanttobeget.='';
			$iwanttobeget.=$iwanttobe['name'];
            $idd=$getaspuser['USER_ID'];
			$cond="pro.Active_Status='Y' or pro.PROFILE_NAME  LIKE '%$iwanttobeget%'";
            $newque='';
              $query=$this->db->query('SELECT cta.Category_ID,cta.Category_Name as catname,sub.Sub_Category_ID as subcatid,sub.Sub_Category_Name,pro.PROFILE_ID,pro.PROFILE_NAME,map.Category_ID,map.Sub_Category_ID,map.PROFILE_ID,pro.PROFILE_ID,pro.PROFILE_NAME,pt.Profile_Name from profile as pro left join profile_form_mapping as map ON map.PROFILE_ID=pro.PROFILE_ID left join profile_temp as pt ON pt.Profile_Name=pro.PROFILE_ID left join  sub_category as sub ON sub.Sub_Category_ID=map.Sub_Category_ID  left join category as cta ON cta.Category_ID=map.Category_ID  where pt.Profile_Name is not null and pro.Active_Status="Y" and pro.PROFILE_NAME  LIKE "'.$iwanttobeget.'%"  GROUP BY pro.PROFILE_NAME ')->result_array();
			return $query;

		}

        public function userpro(){
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];
            $cond="(utemp.USER_ID='".$idd."' and pro.ACTIVE_STATUS!='N')";
            $querrrry=$this->db->select('utemp.USER_ID,utemp.Profile_Id,pro.PROFILE_ID,pro.PROFILE_NAME,utemp.Is_Primary')->from('user_profile_temp as utemp')->join('profile as pro','pro.PROFILE_ID=utemp.Profile_Id','INNER')->where($cond)->order_by('utemp.Is_Primary','asc')->group_by('pro.PROFILE_NAME')->get()->result_array();
            return $querrrry;

        }
        public function getprotemp($tempid){
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];
            if($tempid!=''){
            $userid=$tempid;
            $this->session->set_userdata('profile',$userid);
            }
            $getpro=$this->session->userdata('profile');
            if($getpro!=''){
            $gettemp=$this->db->select('Profile_Name,HTML_Sample_Form')->from('profile_temp')->where('Profile_Name',$getpro)->get()->row_array();
            }else{
                $cond=array('Is_Primary'=>'P','USER_ID'=>$idd);
            $gettemp=$this->db->select('protemp.Profile_Name,protemp.HTML_Sample_Form')->from('profile_temp as protemp')->join('user_profile_temp as usertemp','usertemp.Profile_Id=protemp.Profile_Name','INNER')->where($cond)->get()->row_array();

            }
            
            
            return $gettemp;
        }
        
        public function addprofiles($add){
            $this->db->insert('user_profile_temp',$add);
        }

        public function getvalues($tempid){
            $getpro=$this->session->userdata('profile');
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];
            if($getpro!=''){$cond="Profile_Id='".$getpro."' and USER_ID='".$idd."' ";
            $getval=$this->db->select('User_From_Val,Is_Primary')->from('user_profile_temp')->where($cond)->get()->row_array();}
            else{

             $cond="Is_Primary='P' and USER_ID='".$idd."' ";
            $getval=$this->db->select('User_From_Val,Is_Primary')->from('user_profile_temp')->where($cond)->get()->row_array();

            }
            
            return $getval;
        }

        public function deletepro(){
            $getpro=$this->session->userdata('profile');
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];
            $cond2="Profile_Id='".$getpro."' and USER_ID='".$idd."' and Is_Primary='P' ";
            
            $getcount=$this->db->where($cond2)->select('*')->from('user_profile_temp')->get()->num_rows();
            if(($getcount!='1')&&($getpro!='')){
                $cond="Profile_Id='".$getpro."' and USER_ID='".$idd."' ";
                $this->db->where($cond);
                $this->db->delete('user_profile_temp');
                echo "ok";
            }else{
                echo "false";

            }
            $this->session->unset_userdata('profile');
        }

        public function addprofiledetails($setdata,$profileidd,$setprimary){
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];

            if($setprimary=='P'){ 
            $update=array();
            
            $update['Is_Primary']='S';
            $condd="USER_ID='".$idd."' and  Profile_Id!='".$profileidd."'";
            $this->db->where($condd)->update('user_profile_temp',$update);
             }
           
            
            $cond="Profile_Id='".$profileidd."' and USER_ID='".$idd."' ";
            $this->db->where($cond)->update('user_profile_temp',$setdata);
            echo "ok";
        }
        public function updateportfolio($portfolio,$profileid){
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];
            $cond="Profile_Id='".$profileid."' and USER_ID='".$idd."' ";
            $this->db->where($cond)->update('user_profile_temp',$portfolio);
            echo "ok";
        }
        public function getdrop($type){
            $cond='Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->result_array();
            return $getlist;
        }
        public function getdropsearch($type,$name,$values){
            $cond='Form_Type="Form One" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name Like "'.$name.'%" and Name NOT IN ("'.$values.'") ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->result_array();
            return $getlist;
        }

        public function getdropcountone($type,$name){
            $cond='Form_Type="Form One" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name = "'.$name.'" ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->num_rows();
            return $getlist;
        }

        public function getdropsearchtwo($type,$name,$values){
            $cond='Form_Type="Form Two" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name Like "'.$name.'%" and Name NOT IN ("'.$values.'") ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->result_array();
            return $getlist;
        }

        public function getdropsearchthree($type,$name,$values){
            $cond='Form_Type="Form Three" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name Like "'.$name.'%" and Name NOT IN ("'.$values.'") ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->result_array();
            return $getlist;
        }

        public function getdropcountwo($type,$name){
            $cond='Form_Type="Form Two" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name = "'.$name.'" ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->num_rows();
            return $getlist;
        }

        public function getdropcounthree($type,$name){
            $cond='Form_Type="Form Three" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N" and Name = "'.$name.'" ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->num_rows();
            return $getlist;
        }

        public function getdroplist($type,$formtype){
            $cond='Form_Type="'.$formtype.'" and Type="'.$type.'" and ACTIVE_STATUS="Y" and Delete_Flag="N"  ';
            $getlist=$this->db->where($cond)->select('Name')->from('dropdown_profile')->order_by('Name','asc')->get()->result_array();
            return $getlist;
        }

        public function other_ceritificate_courses(){
			$cond=array('Type'=>'Other Ceritificate Courses','Delete_Flag'=>'N','Form_Type'=>'Form One', 'ACTIVE_STATUS'=>"Y");
			$getall=$this->db->select('Name')->from('dropdown_profile')->where($cond)->order_by('Name','asc')->get()->result_array();
			return $getall;
		}

        public function Previous_Present_Job_Roles(){
			$cond=array('Type'=>'Previous Present Job Roles','Delete_Flag'=>'N','Form_Type'=>'Form One', 'ACTIVE_STATUS'=>"Y");
			$getall=$this->db->select('Name')->from('dropdown_profile')->where($cond)->order_by('Name','asc')->get()->result_array();
			return $getall;
		}

        public function adddropdown($add){
            $this->db->insert('dropdown_profile',$add);
        }
        
        public function selectportfolio($selectcolom,$proid){
            $getaspuser=$this->session->userdata('aspirant');
            $idd=$getaspuser['USER_ID'];
            $cond="Profile_Id='".$proid."' and USER_ID='".$idd."' ";
            $getall=$this->db->where($cond)->select($selectcolom)->from('user_profile_temp')->get()->row_array();
            return $getall;
        }
        
        public function getcity($pincode){
            $getcity=$this->db->select('city')->from('states_city_country')->where('pincode',$pincode)->order_by('city','asc')->GROUP_BY('city')->get()->result_array();
            return  $getcity;
        }

        public function getstate($pincode){
            $getcity=$this->db->select('state')->from('states_city_country')->where('pincode',$pincode)->order_by('city','asc')->GROUP_BY('state')->get()->result_array();
            return  $getcity;
        }

        public function checkpincode($pincode){
            $cond="pincode='".$pincode."' and pincode!=''  ";
            $getcity=$this->db->select('pincode')->from('states_city_country')->where($cond)->order_by('pincode','asc')->GROUP_BY('pincode')->get()->num_rows();
            return  $getcity;
        }

        


}

   