<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Super Model List";
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <?php include 'bedcrum.php'; ?>
                <form class="row ">
                    <!-- <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> -->

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
<div id="gridview">
</div>


                    </div>
                </div>
        </main>

    


        <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content model lg">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">View Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="row">
                    
                    <div class="col-md-12 form-group">
                            <label> Full Name</label><br>
                            <input type="text" id="name" class="form-control"  readonly>
                    </div>

                    <div class="col-md-12 form-group">
                            <label> Email</label><br>
                            <input type="text" id="email" class="form-control"  readonly>
                    </div>

                    <div class="col-md-12 form-group">
                            <label> Address</label><br>
                            <textarea type="text" id="address" placeholder="No address found" class="form-control"  readonly></textarea>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> City</label><br>
                            <input type="text" id="city" placeholder="No city found" class="form-control"  readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> State</label><br>
                            <input type="text" id="state" placeholder="No state found" class="form-control"  readonly>
                    </div>
                    <div class="col-md-6 form-group">
                            <label> Birth Place</label><br>
                            <input type="text" id="birth_place"placeholder="No birth place found" class="form-control" maxlength ="50" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                            <label> Height</label><br>
                            <input type="text" id="height" placeholder="No height found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Pincode</label><br>
                            <input type="text" id="pincode" placeholder="No pincode found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Mobile No</label><br>
                            <input type="text" id="mobile_no" placeholder="No mobile no found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Date Of Birth</label><br>
                            <input type="text" id="birth_date" placeholder="No date of birth found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Agent</label><br>
                            <input type="text" id="agent" placeholder="No agent found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Occupation</label><br>
                            <input type="text" id="occupation" placeholder="No occupation found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Found Us</label><br>
                            <input type="text" id="found_us" placeholder="Not found" class="form-control" maxlength ="50" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                            <label> Registration Date</label><br>
                            <input type="text" id="date_created" placeholder="No date found" class="form-control" maxlength ="50" readonly>
                    </div>

                    

                    
                        
                    </div>
                    <div class="modal-footer bg-light text-dark">
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
function update(name,email,address,city,state,pincode,birth_place,height,mobileno,dateofbirth,birth_date,occupation,agent,found_us,date_created){
  $('#name').val(atob(name));
  $('#email').val(atob(email));
  $('#address').val(atob(address));
  $('#city').val(city);
  $('#state').val(state);
  $('#pincode').val(pincode);
  $('#birth_place').val(birth_place);
  $('#height').val(atob(height));
  
  $('#mobile_no').val(mobileno);
  $('#birth_date').val(dateofbirth);
  $('#occupation').val(occupation);
  $('#agent').val(agent); 
  $('#found_us').val(found_us);
  $('#date_created').val(date_created); 
   
}







$(document).ready(function() {
    getdata();    
    
});


function getdata(){
    var loadpage="load_supermodel.php";
    var model="super_model";
    $.ajax({
    type: 'POST',
    url: "load_table",
    data: {"loadpage":loadpage,"model":model},
    success: function(dataload){
    $("#gridview").html(dataload);
    
} 
}); 
}








</script>

</body>

</html>