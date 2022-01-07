<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Vendor Terms & Conditions";
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
<form class="p-3 border bg-light" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/ven_terms_conditions" >

<div class="form-group">
<label><span class="text-danger">*</span> Content</label>
<textarea type="text" id="editor" class="form-control" name="content"  placeholder="Enter Content"><?php echo $row['content'];?></textarea>
</div>
<span id="imageerror"></span>
<button type="submit" value="update" name="update" class="btn btn-primary">Update</button>
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

    
</script>
</body>
</html>
