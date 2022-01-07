<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Details Of ".$rows['firstname'];
?>
    
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php  include "left_menu.php"; ?>    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4 text-capitalize"><?php echo $title;  ?> </h1> 
                    <?php include 'bedcrum.php'; ?>
                    <div id="accordion">
  <div class="card">
    <div class="card-header bg-info text-white" id="headingOne">
      <h6 class="mb-0 text-left cursor-pointer " >
        <div class=" w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fa fa-user"></i> Personal Details <i class="fa fa-plus pluss float-right"></i>
       </div>
      </h6>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <div class="row">

            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Name:</strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php echo $rows['firstname'].' '.$rows['lastname'];?> </p></div>
            </div>
            </div>


            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>User Id:</strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom" readonly="">CIU<?php echo $rows['id'];?></p></div>
            </div>
            </div> 

            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Contact No:</strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom" readonly=""><?php if($rows['contact_no']!=''){echo $rows['contact_no'] ;}else{ echo "Not found";}?></p></div>
            </div>      
            </div>


            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Telephone No:</strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom" readonly=""><?php if($rows['tele_number']!=''){echo $rows['tele_number'] ;}else{ echo "Not found";}?></p></div>
            </div>      
            </div>


            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Email:</strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom" readonly=""><?php if($rows['email']!=''){echo $rows['email'] ;}else{ echo "Not found";}?></p> </div>
            </div>      
            </div>

            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Profiles:</strong></label>
            <div class="col-md-9 form-group"><?php $allpro='';foreach($profiles as $pro){ $allpro.=$pro['name'].', ';}   ?> <p class=" rounded alert-secondary p-1 border-custom" readonly=""><?php echo rtrim($allpro,', ' ); ?></p></div>
            </div>      
            </div>


            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Marital Status: </strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['marital_status']!=''){echo $rows['marital_status'] ;}else{ echo "Not found";}?></p></p></div>
            </div>      
            </div>

            <div class="col-md-4">
            <div class="row">
            <label class="col-md-3"><strong>Current Address: </strong></label>
            <div class="col-md-9 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['t_city']!=''){echo $rows['t_city'] ;}else{ echo "Not found";}?></p></p></div>
            </div>      
            </div>

            <div class="col-md-6">
            <div class="row">
            <label class="col-md-3"><strong>Profile Image:</strong></label>
            <div class="col-md-4 form-group"><a data-lightbox="example-1" href="<?php echo base_url();?>images/profile/<?php echo $rows['profile_pic'];?>"><img src="<?php echo base_url();?>images/profile/<?php echo $rows['profile_pic'];?>" alt="<?php $rows['firtsname'].' '.$rows['lastname'];?>" title="<?php $rows['firtsname'].' '.$rows['lastname'];?>" style="width:100%"></a></div>
            </div> 
            </div>

            </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-info text-white" id="headingTwo">
      <h6 class="mb-0 text-left cursor-pointer">
        <div class="w-100" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       <i class="fas fa-university"></i>  Educational Details<i class="fa fa-plus pluss float-right"></i>
</div>
</h6>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <div class="row">

        <div class="col-md-5">
        <div class="row">
        <label class="col-md-4"><strong>Highest Qualification:</strong></label>
        <div class="col-md-8 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['highest_qualification']!=''){echo $rows['highest_qualification'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>
    

        <div class="col-md-3">
        <div class="row">
        <label class="col-md-4"><strong>Final Year:</strong></label>
        <div class="col-md-8 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['final_year']!=''){echo $rows['final_year'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>


        <div class="col-md-3">
        <div class="row">
        <label class="col-md-4"><strong>Percentage:</strong></label>
        <div class="col-md-8 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['percentage']!=''){echo $rows['percentage'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>


        <div class="col-md-5">
        <div class="row">
        <label class="col-md-4"><strong>University:</strong></label>
        <div class="col-md-8 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['university']!=''){echo $rows['university'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>

        <div class="col-md-3">
        <div class="row">
        <label class="col-md-5"><strong>Occupation:</strong></label>
        <div class="col-md-7 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['occupation']!=''){echo $rows['occupation'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>

        

        <div class="col-md-3">
        <div class="row">
        <label class="col-md-4"><strong>Capacity:</strong></label>
        <div class="col-md-8 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['capaicity']!=''){echo $rows['capacity'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>


        <div class="col-md-5">
        <div class="row">
        <label class="col-md-2"><strong>Other:</strong></label>
        <div class="col-md-10 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['other']!=''){echo $rows['other'] ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>

        <div class="col-md-6">
        <div class="row">
        <label class="col-md-8"><strong>Inovolved with the Performing Arts / Entertainment Industry:</strong></label>
        <div class="col-md-4 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['industry']=='N'){echo "No" ;}else if($rows['industry']=='Y'){ echo "Yes" ;}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>


        
       




        </div>
      </div>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header bg-info text-white" id="headingThree">
      <h6 class="mb-0 text-left cursor-pointer"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       
      <i class="fas fa-book-reader"></i>  Employement Details <i class="fa fa-plus pluss float-right"></i>
       
      </h6>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      <div class="row">

        <div class="col-md-4">
        <div class="row">
        <label class="col-md-4"><strong>Start:</strong></label>
        <div class="col-md-8 form-group"><p class=" rounded alert-secondary p-1 border-custom text-capitalize" readonly=""><?php if($rows['start']!=''){echo date('d-M-Y',strtotime($rows['start']));}else{ echo "Not found";}?></p></p></div>
        </div> 
        </div>

      


        </div>
      </div>
    </div>
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
        
        
    </body>
</html>

<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $('.card-header').css('cursor','pointer');
        $(".collapse.show").each(function(){
            
        	$(this).prev(".card-header").find(".pluss").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".pluss").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".pluss").removeClass("fa-minus").addClass("fa-plus");
        });
    });
</script>
