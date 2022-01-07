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
                    <!-- <ol class="bg-info text-white breadcrumb mb-4 bg-info">
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-list-alt"></i>   Total Status</li>

                </ol>-->
                        <!-- <table id="example1" class="table table-striped table-bordered shadow" width='100%'>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Type</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Recruiters</td>
                                    <td><?php echo $countra;  ?> </td>
                                    <td><a href="<?php echo base_url();?>admin/recuiter_list" title="view all" class="rounded btn btn-sm btn-success btn-dash"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Applicants</td>
                                    <td><?php echo $countre;  ?></td>
                                    <td><a href="<?php echo base_url();?>admin/applicant_list" title="view all" class="rounded btn btn-sm btn-success btn-dash"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Events</td>
                                    <td><?php echo $countrb;  ?></td>
                                    <td><a href="<?php echo base_url();?>admin/view_events" title="view all" class="rounded btn btn-sm btn-success btn-dash"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Blogs</td>
                                    <td><?php echo $countrc;  ?></td>
                                    <td><a href="<?php echo base_url();?>admin/blog_list" title="view all" class="rounded btn btn-sm btn-success btn-dash"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Jobs</td>
                                    <td><?php echo $countrd;  ?></td>
                                    <td><a href="<?php echo base_url();?>admin/jobs_list" title="view all" class="rounded btn btn-sm btn-success btn-dash"><i class="fas fa-eye"></i></a></td>
                                </tr>
                            </tbody>

                        </table> -->
                    </div>
                    <div class="col-md-4">
                    <!-- <ol class="bg-info text-white breadcrumb mb-0 bg-info events-head">
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-calendar-alt"></i> Ongoing Events</li>
                    </ol>
                <ul class="event-dashboard">
                <?php foreach($geteventt as $event){?>
                    <li><p class="dateeventtop"><i class="fas fa-chevron-right text-success"></i><a href="<?php echo base_url()?>admin/detail_events?token=<?php echo base64_encode($event['id']);?>"><?php echo $event['event_title']; ?></a></p>
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

                </div><br> -->
                 </div>
                </main>
                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "scripts.php";  ?>
        
        
    </body>
</html>
