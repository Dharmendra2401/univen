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
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br> -->
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

    

        <span id="pageInfos"></span>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>






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


function verify(id,status,table,type_id,type_user){
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
        data: {"id":id,"status":status,"table":table,"recruiter_id":type_id,"type_user":type_user},
        success: function(data112){ 
            alert(data112);
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



function unverify(id,status,table,type_id,type_user){

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
    data: {"id":id,"status":status,"table":table,"recruiter_id":type_id,"type_user":type_user},
    success: function(data13){ 
        alert(data13);
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