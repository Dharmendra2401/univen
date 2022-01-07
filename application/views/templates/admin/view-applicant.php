<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Applicant Details Of ".$row['firstname']." ".$row['lastname']." ";
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
                <h1 class="mt-4"><?php echo $title;  ?> <a href="<?php echo base_url().'admin/applicant_list'?>" class="btn btn-sm btn-primary float-right">Back</a></h1>
                
                <form class="row ">
                    <!-- <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> -->

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <ol class="bg-info text-light breadcrumb mb-4">
                <li class="breadcrumb-item active text-white">General Information</li>
                    
                </ol><br>
                    </div>
                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Title:</strong></label>
                    <div class="col-md-9  form-group"><p class="dyy"><?php if($row['salutation']!=''){echo $row['salutation'];}else{echo"No title found";} ?></p></div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>First Name:</strong></label>
                    <div class="col-md-9  form-group"><p class="dyy"><?php echo $row['firstname']; ?></p></div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Last Name:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy"><?php echo $row['lastname']; ?></p></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Email:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy break-all"><?php echo $row['email']; ?></p></div>
                    </div>
                    </div> 

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Mobile:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy break-all"><?php echo $row['contact_no']; ?></p></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Telphone:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy break-all"><?php if( $row['tele_number']!=''){echo $row['tele_number'];}else{echo "No telephone no found";} ?></p></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>DOB:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy break-all"><?php if($row['date_of_birth']!=''){echo date('d-M-Y',strtotime($row['date_of_birth']));}else{echo "No date of birth found";} ?></p></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Father's Name:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy break-all"><?php if( $row['father_name']!=''){echo $row['father_name'];}else{echo "No fathers name found";} ?></p></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Mother's Name:</strong></label>
                    <div class="col-md-9 form-group"><p class="dyy break-all"><?php if( $row['mother_name']!=''){echo $row['mother_name'];}else{echo "No mothers name found";} ?></p></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Date Created:</strong></label>
                    <div class="col-md-8 form-group"><input class="form-control" readonly value="<?php echo date('d-M-Y h:i:s A',strtotime($row['date_created']));?> "> </div>
                    </div>      
                    </div>

                    <div class="col-md-5">
                    <div class="row">
                    <label class="col-md-4"><strong>Date Updated:</strong></label>
                    <div class="col-md-8 form-group"><input class="form-control" placeholder="No date found" readonly value="<?php if($row['update_date']!=''){echo date('d-M-Y h:i:s A',strtotime($row['update_date']));}?>"> </div>
                    </div>      
                    </div>

                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-3"><strong>Location:</strong></label>
                    <div class="col-md-9 form-group"><textarea class="form-control" readonly><?php echo $row['location'];?></textarea></div>
                    </div>      
                    </div>

                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-3"><strong>Marital Status:</strong></label>
                    <div class="col-md-9 form-group"><input class="form-control" placeholder="Not found" readonly value="<?php if($row['marital_status']!=''){echo $row['marital_status'];}?>"></div>
                    </div>      
                    </div>

                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-3"><strong>City:</strong></label>
                    <div class="col-md-9 form-group"><input class="form-control" placeholder="Not found" readonly value="<?php if($row['City']!=''){echo $row['City'];}?>"></div>
                    </div>      
                    </div>

                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-3"><strong>Pincode:</strong></label>
                    <div class="col-md-9 form-group"><input class="form-control" placeholder="Not found" readonly value="<?php if($row['pincode']!=''){echo $row['pincode'];}?>"></div>
                    </div>      
                    </div>


                     

                    <div class="col-md-3">
                    <div class="row">
                    <label class="col-md-5"><strong>Job Type:</strong></label>
                    <div class="col-md-5 form-group"><?php if($profile['old_type']=='paid') {echo '<label class="text-white bg-success btn-sm">Paid</label>';} else if($profile['old_type']=='intern'){ echo '<label class="text-white bg-info btn-sm">Intern<label></label></label>';}else{  echo '<label class="text-white bg-primary btn-sm">Free<label></label></label>';} ?></div>
                    </div>      
                    </div>

                    <div class="col-md-12">
                    <div class="row">
                    <label class="col-md-12"><strong>Description:</strong></label>
                    <div class="col-md-12 form-group"><div class="content"><?php if($profile['old_content']!=''){ echo $profile['old_content'];} ?></div></div>
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