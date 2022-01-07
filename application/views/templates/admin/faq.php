<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="FAQ";
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
                        <h5 class="modal-title" id="">Add <?php echo $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/faq">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Question</label><br>
                            <input type="text" name="question" id="question" placeholder="Enter question" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Answer</label><br>
                            <textarea type="text" name="answer" id="answer" placeholder="Enter answer" class="form-control"></textarea>
                        </div>
                        <span id="jerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" value="add" class="btn btn-primary" onclick="return validate();">Add</button>
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
                        <h5 class="modal-title" id="">Update <?php echo $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/faq">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Question</label><br>
                            <input type="text" name="uquestion" id="uquestion" placeholder="Enter question" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger">*</span> Answer</label><br>
                            <textarea type="text" name="uanswer" id="uanswer" placeholder="Enter answer" class="form-control"></textarea>
                        </div>
                        <input type="hidden" id="uid" name="uid">
                        <span id="jerrorr"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" value="update" class="btn btn-primary" onclick="return updatevalidate();">Update</button>
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
CKEDITOR.replace('answer', {
        extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('uanswer', {
        extraPlugins: 'colorbutton,colordialog'
});

$(document).ready(function() {
    getdata();    
    
});

function update(uid,uquestion,uanswer){
    $('#uid').val(atob(uid));
    $('#uquestion').val(atob(uquestion));
    // $('#uanswer').val(atob(uanswer));
    CKEDITOR.instances['uanswer'].setData(atob(uanswer));
}

function getdata(){
    $('.loader').show();
    var loadpage="load_faq.php";
    var model="faq";
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
        text: "You want to active this faq!",
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
    text: "You want to deactive this faq!",
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
function validate(){
var utitle=$('input[name=question').val();
var ucontent=CKEDITOR.instances['answer'].getData().replace(/<[^>]*>/gi, '').length;

if(utitle.trim()==''){
   $('#question').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter question <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(ucontent==0){
   $('#answer').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter answer <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else{

    return true;
}


}

function updatevalidate(){
var uutitle=$('input[name=uquestion').val();
var uucontent=CKEDITOR.instances['uanswer'].getData().replace(/<[^>]*>/gi, '').length;

if(uutitle.trim()==''){
   $('#uquestion').focus();
   $('#jerrorr').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter question <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}
else if(uucontent==0){
   $('#uanswer').focus();
   $('#jerrorr').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> Please enter answer <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else{

    return true;
}

}

</script>

</body>

</html>