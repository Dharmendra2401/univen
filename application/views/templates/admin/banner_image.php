<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Banner Image";
?>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<?php  include "left_menu.php"; ?>    
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class=" mt-4">Banner Images</h1>
<?php include 'bedcrum.php'; ?>
<div class="row">

<div class="col-md-12">
<?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<form class="p-3 border bg-light" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/banner_image" >
<div class="row">
<div class="form-group col-md-4">
<label><span class="text-danger">*</span> Network Image</label><br>
<input type="file"  name="bannerfive" id="bannerfive"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimagefive" id="oldimagefive" value="<?php echo $ban['banner_about']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_about']; ?>" alt="banner about us" style="width:100px" ><br>
<small><i>Please select the size of image 1400*306</i></small>
</div>


<div class="form-group col-md-4">
<label><span class="text-danger">*</span> Training Image</label><br>
<input type="file"  name="bannersix" id="bannersix"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimagesix" id="oldimagesix" value="<?php echo $ban['banner_trainer']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_trainer']; ?>" alt="banner training" style="width:100px" ><br>
<small><i>Please select the size of image 1400*394</i></small>
</div>

<div class="form-group col-md-4">
<label><span class="text-danger">*</span> Category Image</label><br>
<input type="file"  name="bannerseven" id="bannerseven"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimageseven" id="oldimageseven" value="<?php echo $ban['banner_category']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_category']; ?>" alt="banner training" style="width:100px" ><br>
<small><i>Please select the size of image 1400*394</i></small>
</div>


<!-- <div class="form-group col-md-4">
<label><span class="text-danger">*</span> Event Image</label><br>
<input type="file"  name="bannerone" id="bannerone"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimageone" id="oldimageone" value="<?php echo $ban['banner_event']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_event']; ?>" alt="banner event" style="width:100px" ><br>
<small><i>Please select the size of image 1500*157</i></small>
</div> -->

<!-- <div class="form-group col-md-4">
<label><span class="text-danger">*</span> Blog Image</label><br>
<input type="file"  name="bannertwo" id="bannertwo"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimagetwo" id="oldimagetwo" value="<?php echo $ban['banner_blog']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_blog']; ?>" alt="banner blog" style="width:100px" ><br>
<small><i>Please select the size of image 1500*157</i></small>
</div> -->

<!-- <div class="form-group col-md-4">
<label> <span class="text-danger">*</span> Casting Calls Image</label><br>
<input type="file"  name="bannerthree" id="bannerthree"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimagethree" id="oldimagethree" value="<?php echo $ban['banner_job']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_job']; ?>" alt="banner job" style="width:100px" ><br>
<small><i>Please select the size of image 1500*157</i></small>
</div> -->

<!-- <div class="form-group col-md-4">
<label> <span class="text-danger">*</span> Contact Us Image</label><br>
<input type="file"  name="bannerfour" id="bannerfour"  accept="image/x-png,image/gif,image/jpeg" >
<input type="hidden" name="oldimagefour" id="oldimagefour" value="<?php echo $ban['banner_contact']; ?>" >
<img src="<?php echo base_url().'uploads/banner/'.$ban['banner_contact']; ?>" alt="banner contact" style="width:100px" ><br>
<small><i>Please select the size of image 1500*157</i></small>
</div> -->

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


</script>
</body>
</html>
