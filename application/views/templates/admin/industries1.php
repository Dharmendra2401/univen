<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Industries One Content";
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
<form class="p-3 border bg-light" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/updateindustreone" >
<div class="form-group">
<label><span class="text-danger">*</span> Title</label><br>
<input type="text"  name="title" id="title" maxlength ="50" class="form-control col-md-6 text-uppercase" placeholder="Enter title" value="<?php echo $industrisone['title'];?>">
</div>
<div class="form-group">
<label><span class="text-danger">*</span> Description</label><br>
<textarea type="text"  name="description" id="description" maxlength ="150" class="form-control col-md-6"  placeholder="Enter description"><?php echo $industrisone['description'];?></textarea>
</div>
<div class="form-group">
<label><span class="text-danger">*</span> Url</label><br>
<input type="url"  name="url" id="url" maxlength ="150" class="form-control col-md-6"  placeholder="Enter url" value="<?php echo $industrisone['url'];?>">
</div>
<div class="form-group">
<label><span class="text-danger">*</span> Content</label>
<textarea type="text" id="editor" class="form-control" name="content"  placeholder="Enter Content"><?php echo $industrisone['content'];?></textarea>
</div>
<span id="jerror"></span>
<button type="submit" name="submit"class="btn btn-primary" value="update" onclick="return validation()">Update</button>
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

function validation(){

var title=$('#title').val();
var description=$('#description').val();
var content=$('#content').val();
var url=$('#url').val();
if(title.trim()==''){
    $('#title').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter title <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else if(description.trim()==''){
    $('#description').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter description <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}

else if(content.trim()==''){
    $('#content').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}

else if(url.trim()==''){
    $('#url').focus();
    $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter url <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else{

    return true;
}

  
}
</script>
</body>
</html>
