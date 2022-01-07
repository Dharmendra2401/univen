<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Jobs Lists";
?>
    
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php  include "left_menu.php"; ?>    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4"><?php echo $title;  ?> </h1> 
                    <?php include 'bedcrum.php'; ?>
                    <form class="row ">
                     <div class="col-md-12 text-right">
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            Job</button><br><br> 
                    </div> 

                </form>
                <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
                
                    <div id="gridview">
                    </div>
                
                    </div>
                    </div>
                    </div>
                </div><br>
                 </div>
                </main>
                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "scripts.php";  ?>
        
        
    </body>
</html>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Job</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>recruiter/job_list">

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Profile</label>
                    <select class="col-md-12 form-control selectsingle" data-live-search="true" title="Select profile" name="profile[]" id="profile" multiple >
                    
                    <?php  foreach($profiles as $pro){?>
                    <option value="<?php echo $pro['id'] ;?>"><?php echo $pro['name'] ;?></option>
                    <?php }?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Type</label>
                    <select name="jobtype" class="form-control" id="jobtype">
                        <option value="">Select</option>
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                        <option value="Intern">Intern</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Title</label>
                    <input type="text" placeholder="Enter title" name="title"id="title" class="form-control">
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Location</label>
                    <select class="col-md-12 form-control selectmulti" name="city[]" id="city" data-live-search="true"  title="Select location" maxlength="10" multiple >
                    <?php  foreach($cityy as $cityys){?>
                    <option value="<?php echo $cityys['city'] ;?>"><?php echo $cityys['city'] ;?></option>
                    <?php }?>
                    </select>
                    
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Last Date</label>
                    <input type="date" class="form-control" min="<?php echo date('Y-m-d');?>" placeholder="select date" id="lastdate" name="lastdate">
                    
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Description</label>
                    <textarea type="text" class="form-control" placeholder="Enter description" name="desc" id="desc"></textarea>
                    
                    </div>
                    <div class="form-group">
                        <span id="errormessage"></span>
                    </div>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                    <button type="submit" value="Add" name="add" class="btn btn-success" onclick="return adddetail()">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Job</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>recruiter/job_list">
                   
                    <input type="hidden" id="uid" name="uid" >
                    <div class="form-group">
                    <label><span class="text-danger">*</span> Profile</label>
                    <select class="col-md-12 form-control updateselect" data-live-search="true" title="Select profile" name="uprofile[]" id="uprofile" multiple>
                    
                    <?php  foreach($profiles as $pro){?>
                    <option value="<?php echo $pro['id'] ;?>"><?php echo $pro['name'] ;?></option>
                    <?php }?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Type</label>
                    <select name="utype" class="form-control" id="utype">
                        <option value="">Select</option>
                        <option value="Paid">Paid</option>
                        <option value="Free">Free</option>
                        <option value="Intern">Intern</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Title</label>
                    <input type="text" placeholder="Enter title" name="utitle"id="utitle" class="form-control">
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Location</label>
                    <select class="col-md-12 form-control selectmultiiiii" name="ucity[]" id="ulocaions" data-live-search="true"  title="Select location" multiple>
                    <?php  foreach($cityy as $cityys){?>
                    <option value="<?php echo $cityys['city'] ;?>"><?php echo $cityys['city'] ;?></option>
                    <?php }?>
                    </select>
                    
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Last Date</label>
                    <input type="date" class="form-control" min="<?php echo date('Y-m-d');?>" placeholder="select date" id="ulastdate" name="ulastdate">
                    
                    </div>

                    <div class="form-group">
                    <label><span class="text-danger">*</span> Description</label>
                    <textarea type="text" class="form-control" placeholder="Enter description" name="ucontents" id="ucontents"></textarea>
                    
                    </div>
                    <div class="form-group">
                        <span id="errormessages"></span>
                    </div>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                    <button type="submit" value="Update" name="update" class="btn btn-success" onclick="return updadtedetals()">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        


<script>

    function adddetail(){
        var profile=$('#profile').val();
        var jobtype=$('#jobtype').val();
        var title=$('#title').val();
        var city=$('#city').val();
        var alldrop=$('.selectmulti :selected').length;
        var alpro=$('.selectsingle :selected').length;
        var lastdate=$('#lastdate').val();
        var lstdte="<?php echo date('Y-m-d');?>";
        var desc=CKEDITOR.instances['desc'].getData().replace(/<[^>]*>/gi, '').length;
       
        if(profile==''){
            $('#profile').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  job profile<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else if(alpro>10){
            $('#profile').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Maximum 10 location should be added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        
        else if(jobtype==''){
            $('#jobtype').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  job type<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else if(title==''){
            $('#title').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        else if(city==''){
            $('#city').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select minimum one location<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        else if(alldrop>5){
            $('#city').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Maximum 5 location should be select<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        else if(lastdate==''){
            $('#lastdate').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  last date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else if(lstdte>lastdate){
            $('#lastdate').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  valid last date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }


        
        else if(desc==''){
            $('#desc').focus();
            $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter  description<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else{
            return true;

        }

        
        

    }

    function updadtedetals(){
        var profile=$('#uprofile').val();
        var jobtype=$('#utype').val();
        var title=$('#utitle').val();
        var city=$('#ulocaions').val();
        var lastdate=$('#ulastdate').val();
        var alldrop=$('.updateselect :selected').length;
        var alpro=$('.selectmultiiiii :selected').length;
        var lstdte="<?php echo date('Y-m-d');?>";
        var desc=CKEDITOR.instances['ucontents'].getData().replace(/<[^>]*>/gi, '').length;
        
        if(profile==''){
            $('#uprofile').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  job profile<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else if(alldrop>10){
            $('#uprofile').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Maximum 10 profile should be selected<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
         
        else if(jobtype==''){
            $('#utype').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  job type<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else if(title==''){
            $('#utitle').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        else if(alpro>5){
            $('#ulocaions').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Maximum 5 location should be selected<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        else if(city==''){
            $('#ulocaions').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select minimum one location<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }

        
        else if(lastdate==''){
            $('#ulastdate').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  last date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else if(lstdte>lastdate){
            $('#ulastdate').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select  valid last date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }


        
        else if(desc==''){
            $('#ucontents').focus();
            $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter  description<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;
        }
        else{
            return true;

        }


    }

    function deselected(){
            var alldrop=$('.updateselect li').length;
            for(i=0;i<=alldrop;i++){
                $(".updateselect option").prop("selected", false);
            }
            var alldrops=$('.selectmultiiiii li').length;
            for(i=0;i<=alldrops;i++){
                $(".selectmultiiiii option").prop("selected", false);
            }
    }

    
    
    CKEDITOR.replace('desc', {
        extraPlugins: 'colorbutton,colordialog'
    });
    CKEDITOR.replace('ucontents', {
        extraPlugins: 'colorbutton,colordialog'
    });

    function update(uid,utitle,utype,ulocaionssss,ulastdate,ucontents,updateselect,getallprofiles){
        deselected();
        
        $.each(ulocaionssss.split(","), function(i,e){
        $(".selectmultiiiii option[value='" + e + "']").prop("selected", true);
        });
        $('#uid').val(uid);
        $('#utitle').val(utitle);
        var alllocations=ulocaionssss;
        var allprof=atob(updateselect);
        var allprofiles=atob(getallprofiles);
        $.each(allprof.split(","), function(i,f){
        $(".updateselect option[value='" + f + "']").prop("selected", true);
        });
        $('.selectmultiiiii .filter-option-inner-inner').text(alllocations);
        $('.updateselect .filter-option-inner-inner').text(allprofiles);
        

        $('#utype').val(utype);
        $('#ulastdate').val(ulastdate);
        CKEDITOR.instances['ucontents'].setData(atob(ucontents));
        $('#updateselect').val(updateselect);
        
       
    }
    
    
    
    function getdata(){
        var loadpage="load_jobs.php";
        var model="jobs_list";
        $.ajax({
        type: 'POST',
        url: "load_tablejobs",
        data: {"loadpage":loadpage,"model":model},
        success: function(dataload){
            $("#gridview").html(dataload);
    } 
    }); 
    }
    
    function btnclickdelete(id,table)
    {
        
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this artist!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
          .then((willDelete) => {
          if (willDelete) {
          $.ajax({
           type: 'POST',
           url: "delete",
           data: {"id":id,"table":table},
           success: function(data1234){
           if(data1234=='ok')	
           {	
            swal("Your artist is succesfully deleted", {
            icon: "success",
            });
            getdata();  
            }
            else {
            swal("Your imaginary file is safe!");
            }
    } 
    });	
        
      } 
    });
    }
    
    
    function verify(id,status,table){
    
        swal({
            title: "Are you sure?",
            text: "You want to active this artist!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
          .then((willDelete) => {
          if (willDelete) {
            $.ajax({
            type: 'POST',
            url: "update",
            data: {"id":id,"status":status,"table":table},
            success: function(data112){ 
           if(data112=='ok')	
           {	
            swal("Your artist is actived", {
            icon: "success",
            });
            getdata();  
            }
            else {
            swal("Your imaginary file is safe!");
            }
    } 
    });	
        
      } 
    });
        
    }	
    
    
    
    function unverify(id,status,table){
    
    swal({
        title: "Are you sure?",
        text: "You want to deactive this artist!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        type: 'POST',
        url: "update",
        data: {"id":id,"status":status,"table":table},
        success: function(data13){
       if(data13=='ok')	
       {	
        swal("Your artist is deactived", {
        icon: "success",
        });
        getdata();  
        }
        else {
        swal("Your imaginary file is safe!");
        }
    } 
    });	
    
    } 
    });
    
    }
    $(window).on('load', function () {  
    $('.selectsingle').selectpicker();
    $('.selectmulti').selectpicker();
    $('.selectmultiiiii').selectpicker();
    $('.updateselect').selectpicker();
    $('.updateselect').selectpicker('refresh');
    getdata();
    });
</script>    
