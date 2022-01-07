<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Job Detail Of ".$profile['title']." ";
$profiless=''; foreach($getp as $index) {
     $profiless.= $index['name'].', ';
    //print_r($row);
    } 
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?> <a href="<?php echo base_url().'recruiter/job_list'?>" class="btn btn-sm btn-primary float-right">Back</a></h1>
                <?php include 'bedcrum.php'; ?>
                <form class="row ">
                    <!-- <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> -->

                </form>
                <div class="row">
                    
                    
                    <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Job Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Applicants</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>

  <div class="row">

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-2"><strong>Title:</strong></label>
                    <div class="col-md-10  form-group"><textarea type="text" class="form-control" readonly><?php echo $profile['title']; ?></textarea ></div>
                    </div>
                    </div>
                    

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-2"><strong>Profile:</strong></label>
                    <div class="col-md-10 form-group"><textarea type="text" class="form-control" readonly><?php echo rtrim($profiless,' ,');?></textarea></div>
                    </div>
                    </div> 

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-2"><strong>Location:</strong></label>
                    <div class="col-md-10 form-group"><textarea class="form-control" placeholder="No location found" readonly><?php echo $profile['location'];?></textarea></div>
                    </div>      
                    </div>


                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Date Created:</strong></label>
                    <div class="col-md-8 form-group"><input class="form-control" readonly value="<?php echo date('d-M-Y h:i:s A',strtotime($profile['date_created']));?> "> </div>
                    </div>      
                    </div>

                    <div class="col-md-5">
                    <div class="row">
                    <label class="col-md-4"><strong>Date Updated:</strong></label>
                    <div class="col-md-8 form-group"><input class="form-control" placeholder="No date found" readonly value="<?php if($profile['date_updated']!=''){echo date('d-M-Y h:i:s A',strtotime($profile['date_updated']));}?>"> </div>
                    </div>      
                    </div>

                    


                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-5"><strong>Job Type:</strong></label>
                    <div class="col-md-5 form-group"><?php if($profile['old_type']=='paid') {echo '<label class="text-white bg-success btn-sm">Paid</label>';} else if($profile['old_type']=='intern'){ echo '<label class="text-white bg-info btn-sm">Intern<label></label></label>';}else{  echo '<label class="text-white bg-primary btn-sm">Free<label></label></label>';} ?></div>
                    </div>      
                    </div>

                    

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Admin Approval:</strong></label>
                    <div class="col-md-8 form-group"><?php 
                   
                                if($profile['admin_approval']=='Y'){ 
                                    echo "<label class='text-white bg-success btn-sm'>Approved</label>";}
                                else{
                                    echo "<label class='text-white bg-danger btn-sm'>Disapproved</label>";} ?></div>
                    </div>      
                    </div>




                    
                                            

                    <div class="col-md-12">
                    <div class="row">
                    <label class="col-md-12"><strong>Description:</strong></label>
                    <div class="col-md-12 form-group"><div class="content"><?php if($profile['old_content']!=''){ echo $profile['old_content'];} ?></div></div>
                    </div>      
                    </div>
  
  </div>
  
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="col-md-12">
<br><br>

                        <div id="gridview">
                        
                        <?php  include 'load_job_applicant.php'; ?>
                        </div>


                    
  </div>
  </div>
  
</div>
</div>

                    

                    

                    
                    

                    

                   

        </main>
        <span id="pageInfos"></span>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

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