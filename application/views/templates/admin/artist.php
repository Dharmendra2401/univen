<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Recent Artists";
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <ol class="bg-info text-light breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo $title;  ?></li>
                </ol>
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
                       
<?php include "load_artist.php"; ?>
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
                    <form method="post" action="<?php echo base_url();?>admin/artist"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Name</label><br>
                            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control" maxlength ="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Positon</label><br>
                            <input type="text" name="position"  id="position" placeholder="Enter position" class="form-control" maxlength ="50">
                        </div>

                        <div class="form-group">
                            <label>Image</label><br>
                            <input type="file"  name="profile_image" id="profile_image" max-size="30" onchange="return imageone();">
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
                    <form method="post" action="<?php echo base_url();?>admin/artist"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Name</label><br>
                            <input type="text" name="uname" placeholder="Enter name" id="uname" class="form-control" maxlength ="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Positon</label><br>
                            <input type="text" name="uposition" placeholder="Enter position" id="uposition" class="form-control" maxlength ="50">
                        </div>

                        <div class="form-group">
                            <label>Image</label><br>
                            <input type="file"  name="profile_image2" class="profile_image" id="profile_imagetwo" max-size="30" ><br><br>
                            <image id="uimage"  width="100px">
                        </div>
                        <span id="updateerror"></span>
                        <input type="hidden" id="oldimage" name="oldimage">
                        <input type="hidden" id="uid" name="uid">

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary" value="update" onclick="return  updateUser();">Update</button>
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
        if((this.width!=300) && (this.height!=500)){
            $('#profile_image').val('');
            $('#profile_image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image 500*335 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else{
            $('#imageerror').html('');

        }    
        };
        img.src = _URL.createObjectURL(file);
    }
});





function addUser(){
  var name=$('#name').val();
  var position=$('#position').val();
  var image=$('#profile_image').val();
 
   if(name.trim()==''){
            $('#name').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter name<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else if(position.trim()==''){
            $('#position').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter position<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }

   else if(image.trim()==''){
            $('#image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please select image<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }else{
    return true;

   }
 


}



function updateUser(){
  var name=$('#uname').val();
  var position=$('#uposition').val();
  var image=$('#uprofile_image').val();
 
   if(name.trim()==''){
            $('#uname').focus();
            $('#updateerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter name<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else if(position.trim()==''){
            $('#uposition').focus();
            $('#updateerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter position<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }

   else if(image.trim()==''){
            $('#uimage').focus();
            $('#updateerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please select image<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }else{
    return true;

   }
 


}

function update(id,name,position,image){
  $('#uid').val(id);
  $('#uname').val(atob(name));
  $('#uposition').val(atob(position));
  var url="<?php echo base_url();?>uploads/artist/"+atob(image);
  $('#uimage').attr('src',url);
  $('#oldimage').val(atob(image));
}



$(document).ready(function() {
      
    
});

function getdata(){
    var loadpage="load_artist.php";
    var model="artist";
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


$("#profile_imagetwo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
        if((this.width!=300) && (this.height!=500)){
            $('#profile_imagetwo').val('');
            $('#profile_imagetwo').focus();
            $('#updateerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image 500*335 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else{
            $('#updateerror').html('');

        }    
        };
        img.src = _URL.createObjectURL(file);
    }
});


</script>

</body>

</html>