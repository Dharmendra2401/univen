<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="About Us";
?>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<?php  include "left_menu.php"; ?>    
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class=" mt-4">About Us</h1>
<?php include 'bedcrum.php'; ?>
<div class="row">

<div class="col-md-12">
<?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<form class="p-3 border bg-light" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/updateabout" >
<div class="form-group">
<label> Image</label><br>
<input type="file"  name="profile_image" id="profile_image"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimage" id="oldimage" value="<?php echo $about['image']; ?>" >
<img src="<?php echo base_url().'uploads/about/'.$about['image']; ?>" alt="about us" style="width:100px" ><br>
<small><i>Please select the size of image 500*350</i></small>
</div>
<div class="form-group">
<label><span class="text-danger">*</span> Content</label>
<textarea type="text" id="editor" class="form-control" name="content"  placeholder="Enter Content"><?php echo $about['content'];?></textarea>
</div>
<span id="imageerror"></span>
<button type="submit" class="btn btn-primary">Update</button>
</form>   

</div>


</div>
</div>
</main>
<?php include "footer.php";  ?>
</div>
</div>
<?php include "scripts.php";  ?>

<script>
    CKEDITOR.replace('editor', {
        extraPlugins: 'colorbutton,colordialog'
    });

    var _URL = window.URL;
$("#profile_image").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
        if((this.width<=500)){
            $('#profile_image').val('');
            $('#profile_image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image greater then or equal to 500*350 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        else if((this.height<=350)){
            $('#profile_image').val('');
            $('#profile_image').focus();
            $('#imageerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select the size of image greater then or equal to 500*350 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
