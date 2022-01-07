<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Team";
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <?php include 'bedcrum.php'; ?>
                <form class="row ">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div>

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<div id="gridview">
</div>


                    </div>
                </div>
        </main>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add <?php echo $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/team"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Full Name</label><br>
                            <input type="text" name="fullname"  id="fullname" placeholder="Enter full name" class="form-control" maxlength ="30">
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Position</label><br>
                            <input type="text" name="position"  id="position" placeholder="Enter position" class="form-control" maxlength ="30">
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Image</label><br>
                            <input type="file"  name="sliderimage" id="profile_image"  >
                        </div>
                        <span id="imageerror"></span>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary" value="Add" onclick="return addUser();">Add</button>
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
                        <h5 class="modal-title" id="">Update <?php echo $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/team"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Full Name</label><br>
                            <input type="text" name="ufullname" placeholder="Enter full name" id="ufullname" class="form-control" maxlength ="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Position</label><br>
                            <input type="text" name="uposition" placeholder="Enter position" id="uposition" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Image</label><br>
                            <input type="file"  name="profile_imagetwo" class="profile_image" id="profile_imagetwo" max-size="30" ><br><br>
                            <image id="uimage"  width="100px">
                        </div>
                        <span id="imageerrortwo"></span>
                        <input type="hidden" id="oldimage" name="oldimage">
                        <input type="hidden" id="uid" name="uid">

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary" value="update" onclick="return    updatetwo()">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>
var _URL = window.URL;
$("#profile_image").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
        if((this.width<=264)){
            $('#profile_image').val('');
            $('#profile_image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image 264*264 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        else if((this.height<=264)){
            $('#profile_image').val('');
            $('#profile_image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image 264*264 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else{
            $('#imageerror').html('');

        }    
        };
        img.src = _URL.createObjectURL(file);
    }
});

function addUser(){
  var fullname=$('#fullname').val();
  var position=$('#position').val();
  var image=$('#profile_image').val();
   if(fullname.trim()==''){
            $('#fullname').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter fullname<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else if(position.trim()==''){
            $('#position').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter position<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }

   else if(image.trim()==''){
            $('#profile_image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please select image<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }else{
    return true;

   }
 


}

function updatetwo(){
  var title=$('#ufullname').val();
  var position=$('#uposition').val();
   if(title.trim()==''){
            $('#ufullname').focus();
            $('#imageerrortwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter full name<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else if(position==''){
            $('#uposition').focus();
            $('#imageerrortwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter position<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }

else{
    return true;

   }
 


}


function update(id,ufullname,uposition,image,uimage){
  $('#uid').val(id);
  $('#ufullname').val(atob(ufullname));
  $('#uposition').val(uposition);
  $('#oldimage').val(atob(image));
  var image=atob(image);
  var url='<?php echo base_url();?>uploads/team/'+image;
  $('#uimage').attr('src',url);
  
}



$(document).ready(function() {
    getdata();
});

function getdata(){
    var loadpage="load_team.php";
    var model="allteam";
    $.ajax({
    type: 'POST',
    url: "load_table",
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
        text: "Once deleted, you will not be able to recover this team member!",
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
        text: "You want to active this team member!",
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
    text: "You want to deactive this team member!",
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
    swal("Your imaginary file is safe!");
    }
} 
});	

} 
});

}

$("#profile_imagetwo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
        if((this.width<=264)){
            $('#profile_imagetwo').val('');
            $('#profile_imagetwo').focus();
            $('#imageerrortwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image 264*264 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        else if((this.height<=264)){
            $('#profile_imagetwo').val('');
            $('#profile_imagetwo').focus();
            $('#imageerrortwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image 264*264 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else{
            $('#imageerror').html('');

        }    
        };
        img.src = _URL.createObjectURL(file);
    }
});

</script>

</body>

</html>