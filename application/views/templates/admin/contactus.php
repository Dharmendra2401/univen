<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Contact Us List";
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
                    <!-- <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> -->

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<div id="gridview">
</div>


                    </div>
                </div>
        </main>

        <div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Reply To <span id="efirstname"></span> <span id="elastname"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="#"  enctype="multipart/form-data" id="emailform">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Subject</label><br>
                            <input type="text" name="subject" id="subject" placeholder="Enter subject" class="form-control" maxlength ="50">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Mail Content</label><br>
                            <textarea type="text" name="content" id="content" placeholder="Enter content" class="form-control content" maxlength ="50"></textarea>
                        </div>
                        <input type="hidden" id="eid" name="ied" >
                        <input type="hidden" id="eemail" name="eemail" >



                        <span id="emailerror"></span>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="send" class="btn btn-primary" value="Send" onclick="return emailvalidation();">Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">View Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="row">
                    

                    <div class="form-group col-md-12">
                            <p class="bg-light p-2" id="message" readonly></p>
                        </div>
                        
                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <span id="pageInfos"></span>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>

CKEDITOR.replace('content', {
        extraPlugins: 'colorbutton,colordialog'
    });

function sendemailssss(eid,eemail,efirstname,elastname){
    $('#eid').val(eid);
    $('#eemail').val(eemail);
    $('#efirstname').html(efirstname);
    $('#elastname').html(elastname);

}

function emailvalidation(){
    var subject=$('#subject').val();
    var ucontent=CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').length;
    var eemail=$('#eemail').val();
    var eid=$('#eid').val();
    var content= CKEDITOR.instances['content'].getData();
    var usertype= "user";
    if(subject.trim()==''){
        $('#subject').focus();
        $('#emailerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter subject<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;

    }
    else if((ucontent==0)){
        $('#ucontent').focus();
        $('#emailerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter mail content<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;

    }
    else{
        $('.loader').fadeIn();
        $.ajax({
            type:'POST',
            url:'sendemail',
            data:{'subject':subject,'content':content,'eemail':eemail,'eid':eid,'usertype':usertype},
            success:function(successresponse){
                if(successresponse=='true'){
                    $('.loader').fadeOut();
                    CKEDITOR.instances.content.setData("");
                    $('#emailform')[0].reset();
                    //$("#mail").removeClass("in");
                    //$(".modal-backdrop").remove();
                    //$("#mail").modal('hide');
                    $('#mail').modal('hide');
                    $('#emailerror').html('');
                   
                    swal({
                    title: "Send!",
                    text: "Your email successfully send!",
                    icon: "success",
                    });
                }else{
                    swal({
                    title: "Error!",
                    text: "Error! Please try again later!",
                    icon: "error",
                    });

                }
                


            }

        });
        
    }
    


}

function update(message){
  $('#message').html(message);
}



$(document).ready(function() {
    getdata();    
    
});

function sendemail(){
    var eemail=$('#eemail').val();
    var subject=$('#subject').val();
}

function getdata(){
    var loadpage="load_contactus.php";
    var model="contactus";
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
        text: "Once deleted, you will not be able to recover this applicant!",
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
       {getdata();	
        $('.loader').fadeOut();
        }
        else {
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
        text: "You want to active this applicant!",
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
    text: "You want to deactive this applicant!",
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