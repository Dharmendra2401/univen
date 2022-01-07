<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Testimonials";
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
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
                        <h5 class="modal-title" id="">Update Testimonal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/testimonials" enctype='multipart/form-data'>
                    <div class="form-group">
                            <label><span class="text-danger">*</span> Image</label><br>
                            <input type="file" name="uaddfile" id="uaddfile" accept="image/x-png,image/gif,image/jpeg"><br>
                            <small><i>Please select the size of image 89*89</i></small><br>
                            <input type="hidden" id="oldimage" name="oldimage" />
                            <span id="uimage"></span>
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Full Name</label><br>
                            <input type="text" name="ufullname" id="ufullname" placeholder="Enter fullname" class="form-control" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Position </label><br>
                            <input type="text" name="uposition" id="uposition" placeholder="Enter position" class="form-control" maxlength="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Content</label><br>
                            <textarea type="text" name="utestcontent" id="utestcontent" placeholder="Enter content" class="form-control"></textarea>
                            <br>
                            <small><i>Enter content less than 400 charcters or equal to 400</i></small><br>
                        </div>
                        <span id="ujerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatetest" value="updatetest" class="btn btn-primary" onclick="return validateone();">Update</button>
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
                        <h5 class="modal-title" id="">Add Testimonal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/testimonials" enctype='multipart/form-data'>
                    <div class="form-group">
                            <label><span class="text-danger">*</span> Image</label><br>
                            <input type="file" name="addfile" id="addfile" accept="image/x-png,image/gif,image/jpeg"><br>
                            <small><i>Please select the size of image 89*89</i></small><br>
                           
                           
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Full Name</label><br>
                            <input type="text" name="fullname" id="fullname" placeholder="Enter fullname" class="form-control" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Position </label><br>
                            <input type="text" name="position" id="position" placeholder="Enter position" class="form-control" maxlength="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Content</label><br>
                            <textarea type="text" name="testcontent" id="testcontent" placeholder="Enter content" class="form-control"></textarea>
                            <br>
                            <small><i>Enter content less than 400 charcters or equal to 400</i></small><br>
                        </div>
                        <span id="jerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addtest" value="addtest" class="btn btn-primary" onclick="return validate();">Add</button>
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
CKEDITOR.replace('testcontent', {
        extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('utestcontent', {
        extraPlugins: 'colorbutton,colordialog'
});
$(document).ready(function() {
    getdata();    
    
});
function update(uid,uimage,ufullname,uposition,utestcontent){
    
    $('#uid').val(atob(uid));
    $('#oldimage').val(atob(uimage));
    $('#ufullname').val(atob(ufullname));
    $('#uimage').html('<img src="<?php echo base_url();?>uploads/testimonials/'+(atob(uimage))+'" style=border-radius:50%>');
    $('#uposition').val(atob(uposition));
    CKEDITOR.instances['utestcontent'].setData(atob(utestcontent));
}

function validate(){
var fullname=$('input[name=fullname').val();
var image=$('input[name=addfile').val();
var position=$('input[name=position').val();
var content=CKEDITOR.instances['testcontent'].getData().replace(/<[^>]*>/gi, '').length;
if(image.trim()==''){
   $('#addfile').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please select image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(fullname.trim()==''){
   $('#fullname').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter full name <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}

else if(position.trim()==''){
   $('#position').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter position <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(content==0){
   $('#testcontent').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(content>400){
   $('#testcontent').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content less than 300 charcters or equal to 300<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else{

    return true;
}


}

function validateone(){
var fullname=$('input[name=ufullname').val();
var position=$('input[name=uposition').val();
var content=CKEDITOR.instances['utestcontent'].getData().replace(/<[^>]*>/gi, '').length;

if(fullname.trim()==''){
   $('#fullname').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter full name <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}

else if(position.trim()==''){
   $('#position').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter position <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}

else if(content==0){
   $('#testcontent').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(content>400){
   $('#testcontent').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter content less than 300 charcters or equal to 300<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else{

    return true;
}


}
function getdata(){
    $('.loader').show();
    var loadpage="load_testimonials.php";
    var model="testimonals";
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
        text: "Once deleted, you will not be able to recover this testimonials!",
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
        text: "You want to active this testimonial!",
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
    text: "You want to deactive this testimonial!",
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
