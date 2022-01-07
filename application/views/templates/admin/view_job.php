<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Job Detail Of ".$profile['company_name']." ";
$profiless=''; foreach($rows as $index) {
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
                <h1 class="mt-4"><?php echo $title;  ?> <a href="<?php echo base_url().'admin/jobs_list'?>" class="btn btn-sm btn-primary float-right">Back</a></h1>
                <?php include 'bedcrum.php'; ?>
                <form class="row ">
                    <!-- <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> -->

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <h5 class="border-bottom">Company Details:-</h5><br>
                    </div>
                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-5"><strong>Company Name:</strong></label>
                    <div class="col-md-7  form-group"><textarea type="text" class="form-control" readonly><?php echo $profile['company_name']; ?></textarea ></div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-2"><strong>Title:</strong></label>
                    <div class="col-md-10 form-group"><textarea type="text" class="form-control" readonly><?php echo $profile['old_title']; ?></textarea ></div>
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
                    <label class="col-md-3"><strong>Location:</strong></label>
                    <div class="col-md-9 form-group"><textarea class="form-control" placeholder="No location found" readonly><?php echo $profile['location'];?></textarea></div>
                    </div>      
                    </div>


                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-5"><strong>Job Type:</strong></label>
                    <div class="col-md-5 form-group"><?php if($profile['old_type']=='paid') {echo '<label class="text-white bg-success btn-sm">Paid</label>';} else if($profile['old_type']=='intern'){ echo '<label class="text-white bg-info btn-sm">Intern<label></label></label>';}else{  echo '<label class="text-white bg-primary btn-sm">Free<label></label></label>';} ?></div>
                    </div>      
                    </div>

                    <div class="col-md-5">
                    <div class="row">
                    <label class="col-md-3"><strong>Created By:</strong></label>
                    <div class="col-md-6 form-group"><?php echo '<label class="text-white bg-success btn-sm">'.$profile['firstname'].' '.$profile['lastname'];'</label>'; ?></div>
                    </div>      
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Status:</strong></label>
                    <div class="col-md-9 form-group"><?php 
                   
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

                    

                    
                    

                    

                   
<div class="col-md-12">
<br><br>
<ol class="bg-info text-light breadcrumb mb-4">
                <li class="breadcrumb-item active text-white">Applicant Applied:-</li>
                    
                </ol>
                        <div id="gridview">
                        
                        <?php  include 'load_job_applicant.php'; ?>
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