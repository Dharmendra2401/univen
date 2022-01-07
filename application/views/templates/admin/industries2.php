<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Industries Two";
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr <?php $i=1; foreach($getdata as $index)  {?>>
                                    <td><?php echo $i; ?></td>
                                    <td class="text-uppercase"><?php echo $index['title']; ?></td>
                                    <td><?php echo $index['description']; ?></td>
                                    <td> <a href="#" title="edit" data-toggle="modal" data-target="#update" onclick="return update('<?php echo $index['id']; ?>','<?php echo base64_encode($index['title']); ?>','<?php echo base64_encode($index['description']); ?>','<?php echo base64_encode($index['content']); ?>');" class="rounded btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a></td>
                                   
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
                        <h5 class="modal-title" id="">Update <?php echo $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/updateindustriestwo">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Title</label><br>
                            <input type="text" name="utitle" id="utitle" placeholder="Enter title" class="form-control text-uppercase" maxlength="50">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Description</label><br>
                            <textarea type="text" name="udescription" id="udescription" placeholder="Enter title" class="form-control" maxlength="70"></textarea>
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Content</label><br>
                            <textarea type="text" name="ucontent" id="ucontent" placeholder="Enter title" class="form-control"></textarea>
                        </div>
                        <span id="jerror"></span>

                        <input type="hidden" id="uid" name="uid">

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary" onclick="return validate();">Update</button>
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
    CKEDITOR.replace('ucontent', {
        extraPlugins: 'colorbutton,colordialog'
    });



function update(id,title,description,content){
    $('#uid').val(id);
    $('#utitle').val(atob(title));
    $('#udescription').val(atob(description));
    CKEDITOR.instances['ucontent'].setData(atob(content));
}

function validate(){
var utitle=$('#utitle').val();
var udescription=$('#udescription').val();
var ucontent=CKEDITOR.instances['ucontent'].getData().replace(/<[^>]*>/gi, '').length;

if(utitle.trim()==''){
   $('#utitle').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter title <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(udescription.trim()==''){
   $('#udescription').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter description <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(ucontent==0){
   $('#ucontent').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else{

    return true;
}


}

</script>
</body>
</html>
