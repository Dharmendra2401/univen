<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Events List ";
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
                        <a type="button" class="btn btn-primary" href="<?php echo base_url();?>recruiter/add_events">Add
                            Event</a><br><br>
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
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url()?>recruiter/events">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Title</label><br>
                            <input type="text"  placeholder="Enter title" id="title" name="event" class="form-control" maxlength ="70" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Catagory</label><br>
                            <input type="text"  placeholder="Enter catagory" id="catagory" name="catagory" class="form-control" >
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Price</label><br>
                            <input type="tel"  placeholder="Enter price" id="price" name="price" class="form-control" onKeyPress="return isNumeric(event)" >
                        </div>

                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Type</label><br>
                            <input type="text"  placeholder="Enter type" id="type" name="type" class="form-control" >
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Start Date</label><br>
                            <input type="date"  placeholder="Enter start date" id="startdate" name="startdate" class="form-control" >
                        </div>
                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> End Date</label><br>
                            <input type="date"  placeholder="Enter end date" id="cat" name="enddate" class="form-control" >
                        </div>

                        <div class="col-md-12 form-group">
                            <label><span class="text-danger">*</span> Address</label><br>
                            <textarea type="text"  placeholder="Enter address" id="address" name="address" class="form-control" ></textarea>
                        </div>
                        

                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Description</label><br>
                            <textarea type="text"  placeholder="Enter catagory" id="desc" name="desc" class="form-control" ></textarea>
                        </div>


                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span>  Terms & Conditions</label><br>
                            <textarea type="text"  placeholder="Enter catagory" id="termcond" name="termcond" class="form-control" ></textarea>
                        </div>
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
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>
 
 CKEDITOR.replace('desc', {
        extraPlugins: 'colorbutton,colordialog'
    });
    CKEDITOR.replace('termcond', {
        extraPlugins: 'colorbutton,colordialog'
    });

function update(idu,ufirst_name){

  $('#idu').val(idu);
  $('#ufirst_name').val(ufirst_name);
  
}



$(document).ready(function() {
    getdata();    
    
});

function sendemail(){
    var eemail=$('#eemail').val();
    var subject=$('#subject').val();
}

function getdata(){
    var loadpage="load_view_events.php";
    var model="view_events";
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
        text: "Once deleted, you will not be able to recover this event catagory!",
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
        text: "You want to active this event catagory!",
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
    text: "You want to deactive this event catagory !",
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