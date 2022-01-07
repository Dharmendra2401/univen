<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Recruiter Detail Of ".$row['firstname']." ".$row['lastname']."  ";
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
                <h1 class="mt-4"><?php echo $title;  ?> <a href="<?php echo base_url().'admin/recuiter_list'?>" class="btn btn-sm btn-primary float-right">Back</a></h1>
                <?php include 'bedcrum.php'; ?>
                <form class="row ">
                    <!-- <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> -->

                </form>
                <div class="row">
                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>First Name:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control" value="<?php echo $row['firstname']; ?>" readonly></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Last Name:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control" value="<?php echo $row['lastname']; ?>" readonly></div>
                    </div>
                    </div>


                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Contact No:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control" value="<?php echo $row['contact_no']; ?>" readonly>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-5"><strong>Company Name:</strong></label>
                    <div class="col-md-7  form-group"><textarea type="text" class="form-control" readonly><?php echo $row['company_name']; ?></textarea>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-3"><strong>Email:</strong></label>
                    <div class="col-md-9  form-group"><textarea type="text" class="form-control" readonly><?php echo $row['email']; ?></textarea>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-6"><strong>Registration Date:</strong></label>
                    <div class="col-md-6  form-group"><input type="text" class="form-control" value="<?php echo date('d-M-Y',strtotime($row['date_created'])); ?>" readonly>
                    </div>
                    </div>
                    </div>


                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-5"><strong>Email Verification:</strong></label>
                    <div class="col-md-7  form-group"><?php if($row['email_verified']=='Y'){echo '<label class="text-white bg-success btn-sm">Verify</label>';}else{
                        echo '<label class="text-white bg-danger btn-sm">Unverify</label>';
                    } ?>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-6"><strong>Updated Date:</strong></label>
                    <div class="col-md-6  form-group"><input type="text" class="form-control"placeholder="No date found" value="<?php if($row['update_date']!=''){echo date('d-M-Y',strtotime($row['update_date']));} ?>" readonly>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-6"><strong>Company Type:</strong></label>
                    <div class="col-md-6  form-group"><input type="text" class="form-control text-capitalize"placeholder="No company found" value="<?php echo $row['company']; ?>" readonly>
                    </div>
                    </div>
                    </div>

                   
<div class="col-md-12">
<br><br>
<ol class="bg-info text-light breadcrumb mb-4">
                <li class="breadcrumb-item active text-white">Other Details</li>
                    
                </ol>
                <div class="row">
                <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Pan No:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control text-uppercase" placeholder="No pan no found" value="<?php echo $row['pan']; ?>" readonly></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Gst No:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control text-uppercase" placeholder="No gst no found" value="<?php echo $row['gst']; ?>" readonly></div>
                    </div>
                    </div>


                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Registration No:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control text-uppercase" placeholder="Not found" value="<?php echo $row['registration_no']; ?>" readonly></div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Purpose:</strong></label>
                    <div class="col-md-8  form-group"><input type="text" class="form-control text-capitalize" placeholder="Not found" value="<?php echo $row['purpose']; ?>" readonly></div>
                    </div>
                    </div>


                    <div class="col-md-4">
                    <div class="row">
                    <label class="col-md-4"><strong>Address:</strong></label>
                    <div class="col-md-8  form-group"><textarea type="text" class="form-control text-capitalize" placeholder="Not found" readonly><?php echo $row['address']; ?></textarea></div>
                    </div>
                    </div>

                    
<?php if($row['id_proof']!='')  {?>
                    <div class="col-md-12">
<br><br>
<ol class="bg-info text-light breadcrumb mb-4">
                <li class="breadcrumb-item active text-white">All Documents</li>
                    
                    </div>
                    <?php } ?>
                    <?php  
                    $getprroff=explode(',',$row['id_proof']); 
                    $getimages=explode(',',$row['id_proof_image']);  
                    
                    $i=0; foreach($getprroff as $idds){ if($idds!=''){?>
                      <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-4"><strong>Id Proof Name:</strong></label>
                        <input type="text" class="form-control proofname col-md-8" name="idproof[]"  placeholder="Enter id proof name" maxlength="50" value="<?php echo $idds ; ?>" id="idproof1" readonly>
                    
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label class="col-md-4"><strong>Id Proof Image:</strong></label>
                        <a data-lightbox="example-<?php echo $i; ?>" href="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[$i];?>">
                        <img src="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[$i];?>"width="45px;">
                        </a>
                        
                        <br>
                        
                   </div>
                   </div>
                    
                   
                   
                    <?php $i++;} }?>

               


                        


                    
                </div>
        </main>
        <span id="pageInfos"></span>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>
</body>

</html>