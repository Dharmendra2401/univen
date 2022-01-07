<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="FAQ Queries";
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
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br> -->
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
                        <h5 class="modal-title" id="">Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/faqquerries" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Subject</label><br>
                            <input type="text" name="subject" id="subject" placeholder="Enter subject" class="form-control" maxlength="50">
                        </div>
                    
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Email</label><br>
                            <input type="text" name="uname" id="uname" placeholder="Enter email" class="form-control" maxlength="50" readonly>
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Message</label><br>
                            <textarea type="text" name="content" id="content" placeholder="Enter message" class="form-control" maxlength="200" ></textarea>
                        </div>


                      
                        <span id="ujerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="send" value="send" class="btn btn-primary" onclick="return validateone();">Send</button>
                    </div>
                    <input type="hidden" id="uid" name="uid">
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">View Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form >
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Subject</label><br>
                            <input type="text" name="vsubject" id="vsubject" placeholder="Enter subject" class="form-control" maxlength="50" readonly>
                        </div>
                    
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Email</label><br>
                            <input type="text" name="vemail" id="vemail" placeholder="Enter email" class="form-control" maxlength="50" readonly>
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Message</label><br>
                            <div id="vmessage" class="rounded border p-2 bg-light" readonly></div>
                        </div>


                      
                        <span id="ujerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
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

<script>
 CKEDITOR.replace('content', {
        extraPlugins: 'colorbutton,colordialog'
    });
getdata();
function update(uid,ucat){
    $('#uid').val(atob(uid));
    $('#uname').val(atob(ucat));
    
}

function view(vsubject,vemail,vmessage){
    $('#vemail').val(atob(vemail));
    $('#vsubject').val(atob(vsubject));
    $('#vmessage').html(atob(vmessage));

}

function reply(){
    
}

function validateone(){
var email=$('input[name=uname').val();
var subject=$('input[name=subject').val();
var message= CKEDITOR.instances['content'].getData();
if(email.trim()==''){
    
   $('input[name=email').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else if(subject.trim()==''){
    $('input[name=subject').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter subject <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else if(message==''){
    $('input[name=message').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter message <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else{
    return true;
}

}
function getdata(){
    $('.loader').show();
    var loadpage="load_faq_quries.php";
    var model="faqquery";
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
        text: "Once deleted, you will not be able to recover this question!",
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
        text: "You want to active this question!",
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
    text: "You want to deactive this question!",
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
