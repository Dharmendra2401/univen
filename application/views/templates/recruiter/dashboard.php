<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Dashboard";
?>
    
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php  include "left_menu.php"; ?>    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4"><?php echo $title;  ?> </h1> 
                    <?php include 'bedcrum.php'; ?>
                    
                <div class="row">
                    <div class="col-md-8">
                        <ol class="bg-info text-white breadcrumb  bg-info">
                        <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-users"></i>   Total Applicants</li>
                    </ol>

                    <div class="row padding-top-manage">
                    <?php  $i=0;foreach($row as $index){?>
                

                    <div class="col-md-3 p-0 border text-center"><a href="<?php echo base_url();?>recruiter/search_talent?name=<?php echo base64_encode($index['id']);?>" class="text-body">
                    <h5 class="mb-2 pt-2"><h6><?php echo $index['name'];?></h6><?php //$sql ="SELECT id,profile_ids FROM jobs WHERE profile_ids REGEXP CONCAT('(^|,)(', REPLACE($index[id], ',', '|'), ')(,|$)')";
                    $sql='SELECT pro.user_id,pro.profile_id,us.id,us.firstname,us.lastname,det.profile_pic,det.t_city from details as det RIGHT JOIN user as us on us.id=det.user_id RIGHT JOIN user_profiles as pro on pro.user_id=us.id where us.delete_flag="N" and pro.profile_id!="" and pro.profile_id IN ('.$index[id].') GROUP BY det.user_id ';
                    
                    $query = $this->db->query($sql);
                    echo $countt=$query->num_rows();
                    foreach($allappp as $getapp){
                        

                    }
                    ?></p></div></a>
                    <?php } ?>
                    
               
                </div>
                    </div>
                    <div class="col-md-4">
                    <ol class="bg-info text-white breadcrumb mb-0 bg-info events-head">
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-user"></i> Account Status </li>
                    </ol>
                    <?php 
                    
                $status='';
                if($getrecc['firstname']!=''){
                    $status1=5;
                }
                if($getrecc['lastname']!=''){
                $status2=5;
                } 
                if($getrecc['contact_no']!=''){
                    $status3=10;
                }
                if($getrecc['company_name']!=''){
                    $status4=10;
                } 
                
                if($getrecc['admin_approval']=='Y'){
                   $adminapproval=10;
                }
                
                if($getrecc['email_verified']=='Y'){
                    $status7=10;
                }
                if($getrecc['company_logo']!=''){
                    $status8=10;
                }
                if($getrecc['registration_no']!=''){
                    $status9=10;
                }
                if($getrecc['pan']!=''){
                    $status10=10;
                }
                if($getrecc['gst']!=''){
                    $status11=10;
                }
                if($getrecc['address']!=''){
                    $status12=10;
                }
                if($getrecc['other']!=''){
                    $status13=10;
                } 
                $total=$status1+$status2+$status3+$status4+$status7+$status8+$status9+$status10+$status11+$status12+$status13;
                   
                   ?>
                  
                    <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-top">
                        <input type="hidden" value="<?php echo $total; ?>" id="alltotal">
                        <h6 class="text-center"><label class="text-white <?php if($total!=100){?>bg-secondary <?php }else {?> bg-success<?php } ?> btn-sm"><?php echo $total;?>% Completed</label></h6>
                    <div class="progress-top rounded"style="background: #f1f1f1;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated rounded" style="height: 9px;width:<?php echo $total;?>%;    background-color: #17a2b8;"></div>
                    </div><br>
                    
                     <div class="row">
                        <div class="col-md-8 col-8 text-left"><h6 class="title"><i class="fas fa-user-check text-warning"></i> Admin Approval:</h6></div>
                        <div class="col-md-4 col-4 text-right"> <?php if($getrecc['admin_approval']=='Y'){?><label class="text-white bg-success btn-sm">Approved</label> <?php }else{?> <label class="text-white bg-danger btn-sm">Not Approved</label> <?php } ?></div>

                        <div class="col-md-8 col-8 text-left"><h6 class="title"><i class="fas fa-envelope text-warning"></i> Email Verified:</h6></div>
                        <div class="col-md-4 col-4 text-right"><?php if($getrecc['email_verified']=='Y'){?><label class="text-white bg-success btn-sm">Verify</label> <?php }else{ ?> <label class="text-white bg-danger btn-sm">Unverify</label> <?php } ?></div>

                        <div class="col-md-8 col-8 text-left"> <h6 class="title"><i class="fas fa-briefcase text-warning"></i> Total Jobs:</h6></div>
                        <div class="col-md-4 col-4 text-right"><label class="text-white bg-secondary btn-sm">2</label></div>

                        <div class="col-md-8 col-8 text-left"><h6 class="title"><i class="fas fa-users text-warning"></i> Applied Users:</h6></div>
                        <div class="col-md-4 col-4 text-right"><label class="text-white bg-secondary btn-sm">2</label></div>

                        <div class="col-md-8 col-8 text-left"> <h6 class="title"><i class="fas fa-file-invoice text-warning"></i> Account Status:</h6></div>
                        <div class="col-md-4 col-4 text-right"><?php if( $total==100){?><label class="text-white bg-success btn-sm">Completed<label><?php }else{?> <label class="text-white bg-warning btn-sm">Incomplete<label><?php }?></div>

                        <div class="col-md-6 col-6 text-left"> <h6 class="title"><i class="fas fa-calendar-week text-warning"></i> Registration Date:</h6></div>
                        <div class="col-md-6 col-6 text-right"><label class="text-white bg-secondary btn-sm"><?php echo date("l") .', '.date('d-M-Y',strtotime($getrecc['date_created'])); ?><label></div>

                    </div>
                    </div><br>
                    

                    <div class="row">
                    <div class="col-md-12">
                    <ol class="bg-info text-white breadcrumb mb-0 bg-info events-head">
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-calendar-alt"></i> Ongoing Events</li>
                    </ol>
                    <ul class="event-dashboard">
                    <?php foreach($geteventt as $event){?>
                        <li><p class="dateeventtop"><i class="fas fa-chevron-right text-success"></i><a href="<?php echo base_url()?>home/detail_events?token=<?php echo base64_encode($event['id']);?>"><?php echo $event['event_title']; ?></a></p>
                        <p>
                        <span class="col-md-6 text-left date" title="startdate"><small><strong><i class="far fa-calendar-check text-success"></i></strong>: <?php echo date('d-M-Y',strtotime($event['startdate'])) ;?></small></span>
                        <span class="col-md-6 text-right date" title="enddate"><small><strong><i class="far fa-calendar-times text-danger"></i></strong>: <?php echo date('d-M-Y',strtotime($event['enddate'])) ;?></small></span>
                    </p>
                        </li>
                        <?php } if($geteventt[0]==''){?>
                            <li>No event found</li>

                        <?php } ?>
                    </ul>
                <a href="<?php echo base_url();?>admin/view_events"class="btn btn-info view-all">View all</a>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>



                </div><br>
                 </div>
                </main>



            
                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "scripts.php";  ?>
        
        <script>
        $(document).ready(function(){
           var alltotal=$('#alltotal').val();
           if(alltotal!=100){
            swal("Admin Approval Alert!", "Please complete your profile details for admin approval!", "error");
           }
         });

         
        </script>
    </body>
</html>
