<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Search Talent";
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
                    <form class="row form-group" id="mySearch">

                <div class="col-md-4">
                <div class="form-group">
                <select class="form-control selectsingle" name="city[]" id="city" data-live-search="true" placeholder="Select city"   multiple>
               
                <?php foreach($city as $citys){?>
                <option value="<?php echo $citys['city'];?>"><?php echo $citys['city'];?></option>
                <?php } ?>
                </select>
                </div>
                </div>
                
                <div class="col-md-4">
                <div class="form-group">
                <input type="hidden" id="oldprofile" value="<?php echo $name ;?>" >
                <select class="form-control selectsingletwo" name="profile[]" id="profile"  data-live-search="true" placeholder="Select profiles"  multiple>
                
                <?php  foreach($getprofiles as $profile){?>
                <option value="<?php echo $profile['id'];?>" <?php if($name==$profile['id']){ echo "selected"; } ?>><?php echo $profile['name'];?></option>
                <?php } ?>
                </select>
                </div>
                </div>
                <div class="col-md-3">
                <button type="button" class="btn btn-success " onclick="return getPosition();">Search</button>
                <button type="button" class="btn btn-secondary " onclick="return clearALL();">Clear All</button>
                </div>
              </form>

                    <style>.gotdata{    position: relative;
    top: 10px;
    z-index: 9999;
    height: 200px;
    background: #80808021;
    text-align: center;
    font-size: 139px;}</style>
                              <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
                <div class="gotdata text-info"><i class="fas fa-circle-notch fa-spin"></i></div>
                
               <div id="gridview"></div>
               <div class="row" >
               <div class="col-md-12 text-right"><span class="border pagination"id='pagination'></span></div>
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
window.onscroll = function() {myFunction()};
var header = document.getElementById("mySearch");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky123");
  } else {
    header.classList.remove("sticky123");
  }
}
// $(document).ready(function() {
//     getdata();
// });








 $(".selectsingle").bsMultiSelect({placeholder:'Select city',
});
$(".selectsingletwo").bsMultiSelect({placeholder:'Select profile',
});



function clearALL(){
var oldprofile=$('#oldprofile').val();
getPosition();
$('.gotdata').show();
$('#gridview').html('');
$('#mySearch')[0].reset();
//$('.selectsingle').bsMultiSelect('refresh');

if(oldprofile!=''){window.location="<?php echo base_url();?>recruiter/search_talent";}

}
</script> 
<script type='text/javascript'>
$(document).ready(function(){
$('#pagination').on('click','a',function(e){
e.preventDefault(); 
var pageno = $(this).attr('data-ci-pagination-page');
loadPagination(pageno);
});

});


getPosition();
function getPosition(){
$.ajax({
url: '<?php echo base_url()?>recruiter/getPaginationposition/',
type: 'POST',
success: function(response){
  //$('.gotdata').show();
var pageno = response;
loadPagination(pageno);
}
});
}


// Load pagination

function loadPagination(pagno){

var city=$('#city').val();
var profile=$('#profile').val();
//loadRecords($rowno=0,$search,$rowperpage)
$.ajax({
  type: 'GET',
url: '<?php echo base_url()?>recruiter/loadRecords/'+pagno,

data:{'city':city,'profile':profile},
dataType: 'json',
success: function(response){
$('#pagination').html(response.pagination);
getdata(response.rowperpage,response.row);

}
});
}

// Create table list
function getdata(rowperpage,rowno){
$('#gridview').html('');
var city=$('#city').val();
var profile=$('#profile').val();
$.ajax({
url: '<?php echo base_url()?>recruiter/getalljobs',
type: 'POST',
data:{'rowperpage':rowperpage,'rowno':rowno,'city':city,'profile':profile},
success: function(responseall){
$('#gridview').html(responseall);
$('.gotdata').hide();
if(profile!=''){
  $('.card-footer p.profiles').empty();
}
}
});

}

	</script> 
