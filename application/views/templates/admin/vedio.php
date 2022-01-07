<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Video Content";
?>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<?php  include "left_menu.php"; ?>    
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class=" mt-4"><?php echo $title; ?></h1>
<?php include 'bedcrum.php'; ?>
<div class="row">

<div class="col-md-12">
<?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<form class="p-3 border bg-light" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/vedio" >
<div class="form-group">
<label><span class="text-danger">*</span> Title</label><br>
<input type="text"  name="title" id="title" maxlength ="50" class="form-control col-md-6 text-uppercase" placeholder="Enter title" value="<?php echo $ved['title'];?>">
</div>
<div class="form-group">
<label><span class="text-danger">*</span> Description</label><br>
<input type="text"  name="description" id="description" maxlength ="70" class="form-control col-md-6"  placeholder="Enter description" value="<?php echo $ved['content'];?>">
</div>
<!-- <div class="form-group">
<label><span class="text-danger">*</span>Iframe Url</label><br>
<input type="url"  name="url" id="url" maxlength ="70" class="form-control col-md-6"  placeholder="Enter url" value="<?php echo $ved['vedio_url'];?>"><br>
<div class="col-md-6 overlays">
<?php $link =$ved['vedio_url'];
$link_array = explode('/',$link);
$vedioid = end($link_array); ?>
<iframe width="100%" height="250" 
src="<?php echo $ved['vedio_url'];?>?playlist=<?php echo $vedioid; ?>&rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&loop=1&autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe>
</div> 
</div>-->

<span id="jerror"></span>
<button type="submit" name="update"class="btn btn-primary" value="update" onclick="return validation()">Update</button>
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
function validation(){
var title=$('#title').val();
var description=$('#description').val();
var content=$('#content').val();
// var url=$('#url').val();
if(title.trim()==''){
    $('#title').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter title <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else if(description.trim()==''){
    $('#description').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter description <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}


// else if(url.trim()==''){
//     $('#url').focus();
//     $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter url <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
//     return false;

// }
else{

    return true;
}

  
}
</script>
</body>
</html>
