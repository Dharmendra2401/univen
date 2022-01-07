<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Form Details Of ". $getnames;  ?>;
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
<a class="btn btn-primary btn-sm back-absolute-btn" href="<?php echo base_url();?>admin/aspsubcat">Back</a>
<div class="row">
<div class="col-md-12 text-right">
<!-- <button type="button" class="btn btn-primary" data-toggle="modal"id="addbutton" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br> -->
                    </div>
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

                    <div id="gridview">
</div>

</div>
</main>
        
<input type="hidden" name="catid" value="<?php echo $getid; ?>">
<?php include "footer.php";  ?>
</div>
</div>

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">View form of <?php echo $getnames; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" class="row">
                   
                        <div class="form-group col-md-6">
                            <label>Sub Category Section </label><br>
                            <input type="text"  id="sectionname" class="form-control" placeholder="Not found" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sub Category Form </label><br>
                            <input type="text"  id="catform" class="form-control" placeholder="Not found" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Form Element </label><br>
                            <input type="text"  id="formelement" class="form-control" placeholder="Not found" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Form Type </label><br>
                            <input type="text"  id="formtype" class="form-control" placeholder="Not found" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Label Name </label><br>
                            <input type="text"  id="labelname" class="form-control" placeholder="Not found" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Form Min-length </label><br>
                            <input type="text"  id="minlength" class="form-control" placeholder="Not found" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Form Max-length </label><br>
                            <input type="text"  id="maxlength" class="form-control" placeholder="Not found" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Class Name </label><br>
                            <input type="text"  id="classname" class="form-control" placeholder="Not found" readonly>
                        </div>

                        
                        
                        <span id="jerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" name="import" value="import" class="btn btn-primary" >Add</button> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php include "scripts.php";  ?>

<script>
    
getdata();
$('#addbutton').click(function(){
    $('input[name=catidd').val(<?php echo $getid; ?>);
})
function viewall(sectionname,catform,formelement,formtype,labelname,minlength,maxlength){
    
    $('#sectionname').val(atob(sectionname));
    $('#catform').val(atob(catform));
    $('#formtype').val(atob(formtype));
    $('#formelement').val(atob(formelement));
    $('#labelname').val(atob(labelname));
    $('#minlength').val(atob(minlength));
    $('#maxlength').val(atob(maxlength));
    
    
}

function getdata(){
    var catid=$('input[name=catid').val();
    $('.loader').show();
    var loadpage="load_subcatform.php";
    var model="getsubcatform";
    $.ajax({
    type: 'POST',
    url: "load_tabletwo",
    data: {"loadpage":loadpage,"model":model,'catid':catid},
    success: function(dataload){
    $("#gridview").html(dataload);
    $('.loader').hide();
    
} 
}); 
}





function verify(id,status,table){
    swal({
        title: "Are you sure?",
        text: "You want to active this form!",
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
    text: "You want to deactive this form!",
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
