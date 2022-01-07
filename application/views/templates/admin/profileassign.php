<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Add Profile & Template Assigned";
?>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<?php  include "left_menu.php"; ?>    
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class=" mt-4"><?php echo $title;  ?></h1>
<?php include 'bedcrum.php'; ?>
<div class="row">
<div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Profile & Template Assigned </button><br><br>
                    </div>
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

                    <div id="gridview">
</div>

</div>
</main>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Profile Template Assigned </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/profileassign" enctype='multipart/form-data'>
                    
                        <!-- <div class="form-group">
                            <label><span class="text-danger">*</span> Profile Name </label><br>
                            <input type="text" name="uname" id="uname" placeholder="Enter Profile Name " class="form-control" maxlength="50" disabled>
                        </div> -->

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Select Template </label><br>
                            <select class="form-control" name="utemplatename" id="utemplatename">
                            <option value="1">Form 1 (On Screen)</option>
                            <option value="2">Form 2 (Off Screen)</option>
                            <option value="3">Form 3 (Event and Photography)</option>
                            </select>
                        </div>
                      
                        <span id="ujerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" value="update" class="btn btn-primary" onclick="return validateone();">Update</button>
                    </div>
                    <input type="hidden" id="uid" name="uid">
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Profile & Template Assigned </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/profileassign" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Profile Name </label><br>
                            <select name="proname" id="name" placeholder="Enter Profile Name " class="form-control selectpicker" maxlength="50" data-live-search="true">
                            <option>Select Profile</option>
                            <?php foreach($getpro as $prosss){?>
                            <option value="<?php echo $prosss['PROFILE_ID'];?>" <?php foreach($getvalpro as $proval){if($proval['Profile_Name']==$prosss['PROFILE_ID']){ echo "style='display:none;'"; }}?>><?php echo $prosss['profiles'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Select Template </label><br>
                            <select class="form-control" name="templatename">
                           
                            <option value="1">Form 1 (On Screen)</option>
                          
                            <option value="2">Form 2 (Off Screen)</option>
                            <option value="3">Form 3 (Event and Photography)</option>
                            </select>
                        </div>
                        <span id="jerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" value="add" class="btn btn-primary" onclick="return validate();">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<?php include "footer.php";  ?>
</div>
</div>
<?php include "scripts.php";  ?>

<script>
getdata();
function update(uid,ucat,utemplate){
    
    $('#uid').val(atob(uid));
    $('#uname').val(atob(ucat));
    $('#utemplatename').val(atob(utemplate));
    
}

function validate(){
var Category=$('input[name=name').val();
var templatename=$('select[name=templatename').val();

if(Category.trim()==''){
    
   $('input[name=name').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter profile name  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else if((templatename=='')|| (templatename==null) ){
    
    $('select[name=templatename').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please select template  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
     return false;
 }
else{
    return true;
}
}

function validateone(){
var Category=$('input[name=uname').val();
if(Category.trim()==''){
    
   $('input[name=uname').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter eye color  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else{
    return true;
}

}
function getdata(){
    $('.loader').show();
    var loadpage="load_profileassign.php";
    var model="profileassigned";
    $.ajax({
    type: 'POST',
    url: "load_table",
    data: {"loadpage":loadpage,"model":model},
    success: function(dataload){
    $("#gridview").html(dataload);
    $('.loader').hide();
    
} 
}); 
}


function btnclickdelete(id,table)
{
    
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this eye color!",
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
        getdata(); 
        
 
        }
        else {
        swal("Sorry! Please try again");
        }
} 
});	
    
  } 
});
}


function verify(id,status,table){
    swal({
        title: "Are you sure?",
        text: "You want to active this eye color!",
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
        getdata(); 
        
        }
        else {
        swal("Sorry! Please try again");

        }
} 
});	
    
  } 
});
	
}	



function unverify(id,status,table){
swal({
    title: "Are you sure?",
    text: "You want to deactive this eye color!",
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
    getdata();
    }
    else {
    swal("Sorry! Please try again");
    }
} 
});	

} 
});

}

</script>
</body>
</html>
