<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Events Details ";
$getcatagories='';
foreach( $getcatagories1 as  $catagories){
    $getcatagories.=$catagories['name'].', ';

}
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <ol class="bg-info text-light breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo $title;  ?></li>
                </ol>

                
                <!-- <form class="row ">
                     <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> 

                </form> -->
                   <a href="<?php echo base_url();?>admin/view_events" class="btn btn-sm bg-primary text-white float-right">Back</a>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Events Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Booked By</a>
                    </li>
                    
                    </ul>
                    <div class="tab-content" id="myTabContent" >
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                   
                   <div class="row">
                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-6"><strong> ID:</strong></label>
                   <h6 class="col-md-6 rounded alert-secondary p-1" readonly>EV0000<?php echo  $evntsdwtails['id'];?></h6></div>
                   </div>
                   

                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label  class="col-md-4"><strong> Title:</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php echo  $evntsdwtails['event_title'];?></h6></div>
                   </div>

                   <div class="col-md-5 form-group">
                   <div class="row">
                   <label  class="col-md-4"><strong> Category :</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php echo  rtrim($getcatagories,', ');?></h6></div>
                   </div>

                   
                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-6"><strong>Date Created:</strong></label>
                   <h6 class="col-md-6 rounded alert-secondary p-1" readonly><?php echo  date('d-M-Y h:i:s A',strtotime($evntsdwtails['date_created']));?></h6></div>
                   </div>

                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong>Status:</strong></label>
                   <h6 class="col-md-8"><?php if($evntsdwtails['approve']=='Y'){ 
                                    echo "<label class='text-white bg-success btn-sm'>Approve</label>";}
                                else{
                                    echo "<label class='text-white bg-danger btn-sm'>Disapprove</label>";}?></h6></div></div>
                    <?php if($evntsdwtails['date_updated']!=''){?>
                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong>Update Date:</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php if($evntsdwtails['date_updated']!=''){echo  date('d-M-Y h:i:s A',strtotime($evntsdwtails['date_updated']));} ;?></h6></div></div>
                   <?php }  ?>
                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong>Address:</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php echo  $evntsdwtails['address'];?></h6></div></div>

                   <?php if($evntsdwtails['event_type']=='Paid') { ?>
                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong> Price:</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php echo  $evntsdwtails['event_price'];?></h6></div></div>
                   <?php } ?>

                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong> Type:</strong></label>
                   <h6 class="col-md-8 rounded text-capitalize" readonly><?php if($evntsdwtails['event_type']=='Paid') {echo '<label class="text-white bg-success btn-sm">Paid</label>';} else if($evntsdwtails['event_type']=='intern'){ echo '<label class="text-white bg-info btn-sm">Intern<label></label></label>';}else{  echo '<label class="text-white bg-primary btn-sm">Free<label></label></label>';} ?></h6></div></div>

                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-5"><strong>Start Date:</strong></label>
                   <h6 class="col-md-7 rounded alert-secondary p-1 text-capitalize" readonly><?php echo  date('d-M-Y',strtotime($evntsdwtails['startdate']));?></h6></div></div>

                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-5"><strong>Start Date:</strong></label>
                   <h6 class="col-md-7 rounded alert-secondary p-1 text-capitalize" readonly><?php if($evntsdwtails['enddate']!='0000-00-00 00:00:00'){echo  date('d-M-Y',strtotime($evntsdwtails['enddate']));}else{echo "No end date found";}?></h6></div></div>


                   <div class="col-md-12 form-group">
                   <div class="row">
                   <label class="col-md-12"><strong>Description:</strong></label>
                   <div class=" col-md-12" readonly><textarea id="editor" disabled><?php echo $evntsdwtails['description']; ?></textarea></div></div></div>
                   

                   <div class="col-md-12 form-group">
                   <div class="row">
                   <label class="col-md-12"><strong>Terms & Conditions:</strong></label>
                   <div class=" col-md-12" readonly><textarea id="termscondition" disabled> <?php echo $evntsdwtails['termsandconditions']; ?></textarea></div></div></div>
                   

                   <div class="col-md-6 form-group">
                   <div class="row">
                   <label class="col-md-12"><strong>Banner Image:</strong></label>
                   <div class=" col-md-12 pt-2" readonly> <a data-lightbox="example-8" href="<?php echo base_url().'uploads/events/bimage/'. $evntsdwtails['event_image']; ?>"><img src="<?php echo base_url().'uploads/events/bimage/'.$evntsdwtails['event_image']; ?>" width="100%">
                    </a> <div >
                   
                   </div></div></div></div>
                   

                   <div class="col-md-6 form-group">
                   <div class="row">
                   <label class="col-md-12"><strong>Gallery Image:</strong></label>
                   <?php $getgallery=explode(',',$evntsdwtails['gallary_images']); foreach($getgallery as $showg) {?>
                   <div class="col-md-3 p-2" >
                    <div class="image-overlay">
                    <a data-lightbox="example-12" href="<?php echo base_url().'uploads/events/'. $showg; ?>"><img src="<?php echo base_url().'uploads/events/'. $showg; ?>" class="image-grid">
                    </a>
                   </div>
                    </div>
                   <?php } ?>
                   </div>
                   </div>
                  

                   </div>
                   </div>
                   
                 
                   
                    

                   
                  


                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <div class="row">
                    <div class="col-md-12">
                    <div id="gridview"><?php include "load_buy_event.php";  ?></div>
                    </div>
                    </div>
                    
                    
                    </div>
               
                </div>
        </main>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Event Catagory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Add Event Catagory</label><br>
                            <input type="text"  placeholder="Enter event catagory" id="event" class="form-control" maxlength ="30" >
                        </div>
                    </div>
                    <div class="modal-footer bg-light text-dark">
                         <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
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




function update(idu,ufirst_name){

  $('#idu').val(idu);
  $('#ufirst_name').val(ufirst_name);
  
}



CKEDITOR.replace('editor', {});
CKEDITOR.replace('termscondition', {});






</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                      
<script>

$(document).ready(function() {
                                //$("#gridview").load('load_artist.php');
                                var table =$('#example1').DataTable({searching: true, paging: true, info: false});
                                $('.dataTables_length').css('display', 'inline-block');
                                $('.dataTables_filter').css({
                                    'display': 'inline-block',
                                    'float': 'right'
                                });
                                // $('#example1').on( 'page.dt', function () {
                                // var info = table.page.info();
                                // $('#pageInfos').html( 'Showing page: '+1+info.page+' of '+info.pages );
                                // } );

});

</script>

</body>

</html>