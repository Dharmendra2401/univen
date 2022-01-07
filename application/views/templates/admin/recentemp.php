<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Recent Employers";
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
                        Recent Employer</button><br><br>
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
                        <h5 class="modal-title" id="">Update <span id="type" class="text-capitalize"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/recentemp" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Image</label><br>
                            <input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg"><br>
                            <small><i>Please select the size of image 165*165</i></small><br>
                            <span id="uimage"></span>
                            <input type="hidden" name="oldimage" id="oldimage" />
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Url</label><br>
                            <input type="url" name="uurl" id="uurl" placeholder="Enter url" class="form-control" maxlength="150">
                        </div>

            
                        <span id="jerror"></span>

                        <input type="hidden" id="uid" name="uid">

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updated" value="updated" class="btn btn-primary" >Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/recentemp" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Image</label><br>
                            <input type="file" name="addfile" id="addfile" accept="image/x-png,image/gif,image/jpeg"><br>
                            <small><i>Please select the size of image 165*165</i></small><br>
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Url</label><br>
                            <input type="url" name="addurl" id="addurl" placeholder="Enter url" class="form-control" maxlength="150">
                        </div>
                        <input type="hidden" value="1" name="demoid"/>
            
                        <span id="addjerror"></span>

                        

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" value="add" class="btn btn-primary" onclick="return validate();">Add</button>
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
$(document).ready(function() {
    getdata();    
    
});
function update(uid,uimage,uurl){
    $('#uid').val(atob(uid));
    $('#oldimage').val(atob(uimage));
    $('#uimage').html('<img src="<?php echo base_url();?>uploads/emp/'+(atob(uimage))+'">');
    $('#uurl').val(atob(uurl));
}

function validate(){
var addfile=$('#addfile').val();

if(addfile==''){
   $('#addfile').focus();
   $('#addjerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please select image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}

else{

    return true;
}


}
function getdata(){
    $('.loader').show();
    var loadpage="load_recentemp.php";
    var model="recentemp";
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
        text: "Once deleted, you will not be able to recover this recent employer!",
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
        text: "You want to active this recent employer!",
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
    text: "You want to deactive this recent employer!",
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
