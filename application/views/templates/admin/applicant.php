<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Applicant List";
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
                        <h5 class="modal-title" id="">Send Mail To <span id="efirstname"></span> <span id="elastname"></span></h5>
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


        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">View Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="row">
                        <div class="form-group col-md-6">
                            <label> First Name</label><br>
                            <input type="text"  placeholder="No first name found" id="ufirst_name" class="form-control" maxlength ="30" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Last Name</label><br>
                            <input type="text"  placeholder="No last name found" id="ulast_name" class="form-control" maxlength ="50" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Contact No</label><br>
                            <input type="text"  placeholder="No contact no found" id="ucontact_no" class="form-control" readonly>
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label> Display Name</label><br>
                            <input type="text"  placeholder="No name  found" id="udisplayname" class="form-control" readonly>
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label> Email</label><br>
                            <input type="text"  placeholder="No company found" id="uemail" class="form-control" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Registration Date</label><br>
                            <input type="text"  placeholder="No registration date found" id="uregistration" class="form-control" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Email Verification Status</label><br>
                            <span id="uverifyemail"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Last Updated Date </label><br>
                            <input type="text"  placeholder="No update date found" id="uupdate" class="form-control " readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Company </label><br>
                            <input type="text"  placeholder="No company found" id="ucompany" class="form-control text-capitalize" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label> Address</label><br>
                            <textarea type="text"  placeholder="No address found" id="uaddress" class="form-control" readonly></textarea>
                        </div>

                        <h5 class="col-md-12"><div class="bg-info text-white other-details">Other Details</div></h5>

                        <div class="form-group col-md-6">
                            <label> Registration No</label><br>
                            <input type="text"  placeholder="No registration no found" id="uregistration_no" class="form-control" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Id Proof</label><br>
                            <input type="text"  placeholder="No id  found" id="uid_proof" class="form-control" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> PAN No</label><br>
                            <input type="text"  placeholder="No pan no found" id="upan" class="form-control text-uppercase" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> GST No</label><br>
                            <input type="text"  placeholder="No gst no found" id="ugst" class="form-control text-uppercase" readonly>
                        </div>

                        
                        <div class="form-group col-md-6">
                            <label> Purpose </label><br>
                            <input type="text"  placeholder="No pan no found" id="uporpuse" class="form-control " readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label> Admin Approval </label><br>
                            <span id="ustatus"></span>
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

function update(idu,ufirst_name,ulast_name,ucontact_no,udisplayname,uemail,uregistration,uverifyemail,uregistration_no,upan,ugst,uaddress,uporpuse,ustatus,uupdate,uid_proof,ucompany){

  $('#idu').val(idu);
  $('#ufirst_name').val(ufirst_name);
  $('#ulast_name').val(ulast_name);
  $('#ucontact_no').val(ucontact_no);
  $('#udisplayname').val(udisplayname);
  $('#uemail').val(uemail);
  $('#uregistration').val(uregistration);
  $('#uverifyemail').html(atob(uverifyemail));
  $('#uregistration_no').val(uregistration_no);
  $('#upan').val(upan);
  $('#ugst').val(ugst);
  $('#uaddress').val(atob(uaddress));
  $('#uporpuse').val(uporpuse);
  $('#ustatus').html(atob(ustatus));
  $('#uupdate').val(uupdate);
  $('#uid_proof').val(uid_proof);
  $('#ucompany').val(ucompany);
}



$(document).ready(function() {
    getdata();    
    
});

function sendemail(){
    var eemail=$('#eemail').val();
    var subject=$('#subject').val();
}

function getdata(){
    var loadpage="load_applicant.php";
    var model="applicant_list";
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