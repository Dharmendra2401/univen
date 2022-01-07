<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Blog Details ";
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
                   <a href="<?php echo base_url();?>admin/blog_list" class="btn btn-sm bg-primary text-white float-right">Back</a>
                    
                 
                    <br>
                   
                   <div class="row">
                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-6"><strong> ID:</strong></label>
                   <h6 class="col-md-6 rounded alert-secondary p-1" readonly>BLG000<?php echo  $rows['id'];?></h6></div>
                   </div>
                   

                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label  class="col-md-4"><strong> Title:</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php echo  $rows['blog_title'];?></h6></div>
                   </div>

                   <div class="col-md-5 form-group">
                   <div class="row">
                   <label  class="col-md-4"><strong> Category :</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php echo  rtrim($getcatagories,', ');?></h6></div>
                   </div>

                   
                   <div class="col-md-3 form-group">
                   <div class="row">
                   <label class="col-md-6"><strong>Date Created:</strong></label>
                   <h6 class="col-md-6 rounded alert-secondary p-1" readonly><?php echo  date('d-M-Y h:i:s A',strtotime($rows['date_created']));?></h6></div>
                   </div>

                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong>Status:</strong></label>
                   <h6 class="col-md-8"><?php if($rows['approve']=='Y'){ 
                                    echo "<label class='text-white bg-success btn-sm'>Approve</label>";}
                                else{
                                    echo "<label class='text-white bg-danger btn-sm'>Disapprove</label>";}?></h6></div></div>

                   <div class="col-md-4 form-group">
                   <div class="row">
                   <label class="col-md-4"><strong>Update Date:</strong></label>
                   <h6 class="col-md-8 rounded alert-secondary p-1" readonly><?php if($rows['date_updated']!='0000-00-00 00:00:00'){echo  date('d-M-Y h:i:s A',strtotime($rows['date_updated']));};?></h6></div></div>

                   <div class="col-md-12 form-group">
                   <div class="row">
                   <label class="col-md-12"><strong>Description:</strong></label>
                   <div class=" col-md-12" readonly><textarea id="editor" disabled><?php echo $rows['description']; ?></textarea></div></div></div>
                   

                 
                   

                   <div class="col-md-12 form-group">
                   <div class="row">
                   <label class="col-md-12"><strong> Image:</strong></label>
                   <div class=" col-md-12" readonly>
                      
                       <img src="<?php echo base_url('images/blog/'.$rows['blog_images'])?>" id="blah" class="user-auth-img img-circle" style="height: 150px!important;width: 150px!important;" /> 
                       </div></div></div>
                   
                    
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



CKEDITOR.replace('editor', {});




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