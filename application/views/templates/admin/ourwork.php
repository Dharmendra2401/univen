<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Our Work";
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
                    <form method="post" action="<?php echo base_url();?>admin/ourwork"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Title</label><br>
                            <input type="text" name="title"  id="title" placeholder="Enter title" class="form-control" maxlength ="40">
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Content</label><br>
                            <textarea type="text" name="content"  id="content" placeholder="Enter content" class="form-control" maxlength ="70"></textarea>
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
                    <form method="post" action="<?php echo base_url();?>admin/ourwork"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Ttile</label><br>
                            <input type="text" name="utitle" placeholder="Enter title" id="utitle" class="form-control" maxlength ="40">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Position</label><br>
                            <textarea type="text" name="ucontent" placeholder="Enter content" id="ucontent" class="form-control" maxlength ="70"></textarea>
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


function addUser(){
  var title=$('#title').val();
  var content=$('#content').val();
   if(title.trim()==''){
            $('#title').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else if(content.trim()==''){
            $('#content').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter content<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else{
    return true;

   }
 


}

function updatetwo(){
  var title=$('#utitle').val();
  var content=$('#ucontent').val();
   if(title.trim()==''){
            $('#utitle').focus();
            $('#imageerrortwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }
   else if(content==0){
            $('#ucontent').focus();
            $('#imageerrortwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter content<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return false;

   }

else{
    return true;

   }
 


}


function update(id,utitle,ucontent){
  $('#uid').val(id);
  $('#utitle').val(atob(utitle));
  $('#ucontent').val(atob(ucontent));
  
}



$(document).ready(function() {
    getdata();
});

function getdata(){
    var loadpage="load_ourwork.php";
    var model="ourwork";
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
        text: "Once deleted, you will not be able to recover this work!",
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
        text: "You want to active this work!",
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
    text: "You want to deactive this work!",
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