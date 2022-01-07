<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Steps Of Hire & Hired";
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

                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

                        <table id="example" class="table table-striped table-bordered" width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Type</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr <?php $i=1; foreach($row as $index)  {?>>
                                    <td><?php echo $i; ?></td>
                                    <td class="text-uppercase"><label class="bg-success btn-sm text-white"><?php echo $index['type']; ?></label></td>
                                    <td><?php echo $index['content']; ?></td>
                                    <td> <a href="#" title="edit" data-toggle="modal" data-target="#update" onclick="return update('<?php echo $index['id']; ?>','<?php echo $index['type']; ?>','<?php echo base64_encode($index['content']); ?>','<?php echo base64_encode($index['step_one_title']); ?>','<?php echo base64_encode($index['step_one_content']); ?>','<?php echo base64_encode($index['step_two_title']); ?>','<?php echo base64_encode($index['step_two_content']); ?>','<?php echo base64_encode($index['step_three_title']); ?>','<?php echo base64_encode($index['step_three_content']); ?>');" class="rounded btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a></td>
                                   
                                </tr <?php $i++; } ?>>






                            </tbody>

                        </table>


</div>
</main>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update <span id="type" class="text-capitalize"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/hired_hire">
                    <input type="hidden" name="typeone" id="typeone">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Content</label><br>
                            <textarea type="text" name="content" id="content" placeholder="Enter content" class="form-control" rows="3" ></textarea>
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Step One Title</label><br>
                            <input type="text" name="step1title" id="step1title" placeholder="Enter step one" class="form-control" maxlength="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Step One Content</label><br>
                            <textarea type="text" name="step1content" id="step1content" placeholder="Enter step one content"  class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Step Two Title</label><br>
                            <input type="text" name="step2title" id="step2title" placeholder="Enter step two" class="form-control" maxlength="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Step Three Content</label><br>
                            <textarea type="text" name="step2content" id="step2content" placeholder="Enter step three content"  class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Step Three Title</label><br>
                            <input type="text" name="step3title" id="step3title" placeholder="Enter step three" class="form-control" maxlength="30">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Step Three Content</label><br>
                            <textarea type="text" name="step3content" id="step3content" placeholder="Enter step three content" class="form-control" rows="3"></textarea>
                        </div>
                        <span id="jerror"></span>

                        <input type="hidden" id="uid" name="uid">

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updated" value="updated" class="btn btn-primary" onclick="return validate();">Update</button>
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
function update(id,type,content,step1title,step1content,step2title,step2content,step3title,step3content){
    $('#uid').val(id);
    $('#type').html(type);
    $('#content').val(atob(content));
    $('#step1title').val(atob(step1title));
    $('#step1content').val(atob(step1content));
    $('#step2title').val(atob(step2title));
    $('#step2content').val(atob(step2content));
    $('#step3title').val(atob(step3title));
    $('#step3content').val(atob(step3content));
    $('#typeone').val(type);
    
}

function validate(){
var content=$('#content').val();
var step1title=$('#step1title').val();
var step1content=$('#step1content').val();
var step2title=$('#step2title').val();
var step2content=$('#step2content').val();
var step3title=$('#step3title').val();
var step3content=$('#step3content').val();


if(content.trim()==''){
   $('#content').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
if(step1title.trim()==''){
   $('#step1title').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter step one title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(step1content.trim()==''){
   $('#step1content').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter step one content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
if(step2title.trim()==''){
   $('#step2title').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter step two title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(step2content.trim()==''){
   $('#step2content').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter step two content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
if(step3title.trim()==''){
   $('#step1title').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter step three title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(step3content.trim()==''){
   $('#step3content').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter step three content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else{

    return true;
}


}

</script>
</body>
</html>
