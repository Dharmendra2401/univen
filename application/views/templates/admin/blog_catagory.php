<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Blogs Category";
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <?php include 'bedcrum.php'; ?>
                <form class="row ">
                     <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> 

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<div id="gridview">
</div>


                    </div>
                </div>
        </main>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Blog Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url()?>admin/blog_catagories">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Blog Category</label><br>
                            <input type="text"  placeholder="Enter category" id="blog" name="blog" class="form-control" maxlength ="30" >
                        </div>
                        <span id="errormessage"></span>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="submit" name="add" value="Add" class="btn btn-success" onclick="return adds();" >Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Blog Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url()?>admin/blog_catagories">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Event Category</label><br>
                            <input type="text"  placeholder="Enter category" id="ublog" name="ublog" class="form-control" maxlength ="30" >
                        </div>
                        <input type="hidden"  id="uid" name="uid" >
                        <span id="errormessagetwo"></span>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="submit" name="update" value="Update" class="btn btn-success" onclick="return updateevent();" >Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    

    
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>



function adds(){
    var events=$('#blog').val();
    if(events.trim()==''){
        $('#blog').focus();
        $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter a blog category <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false; 
    }else{
        return true;
    }
}


function update(uid,ublog){

  $('#uid').val(uid);
  $('#ublog').val(ublog);
  
}

function updateevent(){
    var uevents=$('#ublog').val();
    if(uevents.trim()==''){
        $('#ublog').focus();
        $('#errormessagetwo').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter a blog category <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false; 
    }else{
        return true;
    }

}


$(document).ready(function() {
    getdata();    
    
});

function sendemail(){
    var eemail=$('#eemail').val();
    var subject=$('#subject').val();
}

function getdata(){
    var loadpage="load_blogs_catagory.php";
    var model="blog_catagories";
    $.ajax({
    type: 'POST',
    url: "load_table",
    data: {"loadpage":loadpage,"model":model},
    success: function(dataload){
    $("#gridview").html(dataload);
    
} 
}); 
}



function btnclickdelete(id,table)
{
   
    
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this blog catagory!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        $('.loader').show();
      $.ajax({
       type: 'POST',
       url: "delete",
       data: {"id":id,"table":table},
       success: function(data1234){
       if(data1234=='ok')	
       {	
        $('.loader').fadeOut();
        getdata();
        }
        else {
            $('.loader').fadeOut();
        swal("Your imaginary file is safe!");

        }
} 
});	
    
  } 
});
}


function verify(id,status,table,classname){
    swal({
        title: "Are you sure?",
        text: "You want to active this blog category!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        $('.loader').show();
        $.ajax({
        type: 'POST',
        url: "update",
        data: {"id":id,"status":status,"table":table},
        success: function(data112){ 
         
       if(data112=='ok')	
       {	
        getdata();
        $('.loader').fadeOut(); 

        }
        else {
            $('.loader').fadeOut();
        swal("Your imaginary file is safe!");

        }
} 
});	
    
  } 
});
	
}	



function unverify(id,status,table){


swal({
    title: "Are you sure?",
    text: "You want to deactive this  blog category!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
  .then((willDelete) => {
  if (willDelete) {
    $('.loader').show();
    $.ajax({
    type: 'POST',
    url: "update",
    data: {"id":id,"status":status,"table":table},
    success: function(data13){ 
    
   if(data13=='ok')	
   {	
    getdata();
    $('.loader').fadeOut(); 
    }
    else {
        $('.loader').fadeOut();
    swal("Your imaginary file is safe!");
    }
} 
});	

} 
});

}

</script>

</body>

</html>