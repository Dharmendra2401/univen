<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="User Content";
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
                    <form method="post" action="<?php echo base_url();?>admin/usercontent" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Image</label><br>
                            <input type="file" name="file" id="file" accept="image/x-png,image/gif,image/jpeg"><br>
                            <small><i>Please select the size of image 262*300</i></small><br>
                            <span id="uimage"></span>
                            <input type="hidden" name="oldimage" id="oldimage" />
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Content</label><br>
                            <textarea type="text" name="content" id="content" placeholder="Enter content" class="form-control" maxlength="150"></textarea>
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
CKEDITOR.replace('content', {
        extraPlugins: 'colorbutton,colordialog'
});
$(document).ready(function() {
    getdata();    
    
});
function update(uid,uimage,content){
    $('#uid').val(atob(uid));
    $('#oldimage').val(atob(uimage));
    $('#uimage').html('<img src="<?php echo base_url();?>uploads/user/'+(atob(uimage))+'" width=150px>');
    CKEDITOR.instances['content'].setData(atob(content));
}

function validate(){
var content=CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').length;
if(content=='0'){
   $('#content').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter content <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
if(content>700){
   $('#step1title').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Please enter content less than or equal to 400 character<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}


else{

    return true;
}


}
function getdata(){
    $('.loader').show();
    var loadpage="load_usercontent.php";
    var model="usercontent";
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
        text: "Once deleted, you will not be able to recover this faq!",
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
        text: "You want to active this recent employee!",
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
    text: "You want to deactive this recent employee!",
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
