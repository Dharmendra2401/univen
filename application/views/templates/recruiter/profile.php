<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Profile Update";
$url='create';
?>
    
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php  include "left_menu.php"; ?>    
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <h1 class="mt-4"><?php echo $title;  ?> </h1> 
                    <?php include "bedcrum.php"; ?>
                    
                <div class="row">
                <div class="col-md-12"> <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?></div>
                    <div class="col-md-8">
                    <ol class="bg-info text-white breadcrumb mb-0 bg-info events-head">
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-pencil-alt"></i>  Profile Update</li>
                    </ol>
                
               
                <div class="form-top">
                <form class="row" method="post" action="<?php echo base_url();?>recruiter/profile" enctype="multipart/form-data">


                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> I am </label>
                        <div class="radio-button">
                            <?php $i=1;foreach( $cat as $catagories) {?>
                            <input type="radio" id="radio<?php echo $i; ?>" name="iam" value="<?php echo $catagories['id'];?>" <?php if($catagories['id']==$row['category']){echo "checked";} ?>>
                            <label for="radio<?php echo $i; ?>"><?php echo $catagories['name'];?></label>
                            <?php $i++;} ?>
                            
                            
                        </div>
                       
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Company Type </label>
                        <div class="radio-button">
                        
                            <?php $ii=1;foreach( $comp as $company) {?>
                            <input type="radio" id="radio-<?php echo $ii; ?>" name="company" value="<?php echo $company['name'];?>" <?php if($row['company']==$company['name']){echo "checked";} ?>>
                            <label for="radio-<?php echo $ii; ?>"><?php echo $company['name'];?></label>
                            <?php $ii++;} ?>
                            
                            
                        </div>
                       
                    </div>
                    </div>
                    
                   

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> First Name </label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter first name" maxlength="30" value="<?php echo $row['firstname']; ?>" id="firstname">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Last Name </label>
                        <input type="text" class="form-control" name="lastname"  placeholder="Enter last name" maxlength="30" value="<?php echo $row['lastname']; ?>" id="lastname">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Email </label>
                        <input type="email" class="form-control" name="pemail"  placeholder="Enter primary email id" maxlength="150" value="<?php echo $row['email']; ?>" id="pemail" readonly>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Mobile No</label>
                        <input type="tel" class="form-control" name="mobile"  placeholder="Enter mobile no" maxlength="15" value="<?php if($row['contact_no']!=0){echo $row['contact_no'];} ?>" id="mobile"  onKeyPress="return isNumeric(event)">
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Company Name </label>
                        <input type="text" class="form-control" name="companyname"  placeholder="Enter company name" maxlength="100" value="<?php echo $row['company_name']; ?>" id="companyname" >
                    </div>
                    </div>
                   
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Address </label>
                        <textarea type="text" class="form-control" name="address"  placeholder="Enter address " maxlength="150" id="address"><?php echo $row['address']; ?></textarea>
                        <div id="map" style="display:none;"></div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Other Details</label>
                        <textarea type="text" class="form-control" name="otherdetail"  placeholder="Enter other details" maxlength="150" id="otherdetail"><?php echo $row['other']; ?></textarea>
                    </div>
                    </div>
                    
                    
                    

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Purpose Of Usage </label>
                        <div class="radio-button">
                        
                            
                            <input type="radio" id="radio-123" name="Purpose" value="Self" <?php if($row['purpose']=="Self"){echo "checked";} ?>>
                            <label for="radio-123">Self</label>

                            <input type="radio" id="radio-1234" name="Purpose" value="Client" <?php if($row['purpose']=="Client"){echo "checked";} ?>>
                            <label for="radio-1234">For Client</label>
                            
                            
                            
                        </div>
                       
                    </div>
                    </div>
                    
                    

                    <div class="col-md-12"><br>
                    <div class="btn-sm bg-info extra-fields-customer w-100 text-white">All Documents</div><br>
                    </div>
                    
                   
                    <input type="hidden" name="oldimagestwo" value="<?php echo $row['id_proof_image'] ;?>">
                    <?php  
                     
                    $getimages=explode(',',$row['id_proof_image']);  
                    
                   ?>
                    
                    <div class="col-md-6">
                    <div class="form-group ">
                        <label> <span class="text-danger">*</span> Registration No</label>
                        <input type="text" class="form-control text-uppercase" name="regno"  placeholder="Enter registration no" maxlength="15" value="<?php echo $row['registration_no']; ?>" id="regno" <?php if($row['registration_no']!=''){echo 'readonly'; }?>>
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Registration Card Image</label><br>
                        <input type="file"  name="idfile1"  id="idfile1" accept="image/x-png,image/gif,image/jpeg"><br><small><i>Please select image size less then 1mb and greater then 500kb</i></small><br><a class="imageshow" id="imageshow" target="_blank" alt="Id proof file" width="300px;"></a>
                       <?php if($getimages[0]!='') {?> <a data-lightbox="example-<?php echo $i; ?>" href="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo  $getimages[0];?>">
                        <img src="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[0];?>"width="45px;">
                        </a><?php }?>
                        <input type="hidden" name="doc1" value="<?php echo $getimages[0];?>">
                   </div>
                   </div>

                   <div class="col-md-6">
                    <div class="form-group ">
                        <label> <span class="text-danger">*</span> Pan No</label>
                        <input type="text" class="form-control text-uppercase" name="panno"  placeholder="Enter pan no" maxlength="15" value="<?php echo $row['pan']; ?>" id="regno" readonly>
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Pan Card Image</label><br>
                        <input type="file"  name="idfile2"  id="idfile2" accept="image/x-png,image/gif,image/jpeg"><br><small><i>Please select image size less then 1mb and greater then 500kb</i></small><br><a class="imageshow" id="imageshow" target="_blank" alt="Id proof file" width="300px;"></a>
                        <?php if($getimages[1]!=''){?><a data-lightbox="example-<?php echo $i; ?>" href="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[1];?>">
                        <img src="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[1];?>"width="45px;">
                        </a><?php } ?>
                        <input type="hidden" name="doc2" value="<?php echo $getimages[1];?>">
                   </div>
                   </div>

                   <div class="col-md-6">
                    <div class="form-group ">
                        <label> <span class="text-danger">*</span> Gst No</label>
                        <input type="text" class="form-control text-uppercase" name="gstno"  placeholder="Enter gst no" maxlength="15" value="<?php echo $row['gst']; ?>" id="gstno" readonly>
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Gst Card Image</label><br>
                        <input type="file"  name="idfile3"  id="idfile3" accept="image/x-png,image/jpeg"><br><small><i>Please select image size less then 1mb and greater then 500kb</i></small><br><a class="imageshow" id="imageshow" target="_blank" alt="Id proof file" width="300px;"></a>
                        <?php if($getimages[2]!='') {?><a data-lightbox="example-<?php echo $i; ?>" href="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[2];?>">
                        <img src="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[2];?>"width="45px;">
                        </a><?php } ?>
                        <input type="hidden" name="doc3" value="<?php echo $getimages[2];?>">
                   </div>
                   </div>

                   <!-- <div class="col-md-6">
                    <div class="form-group ">
                        <label> <span class="text-danger">*</span> Adhar No</label>
                        <input type="text" class="form-control" name="gstno"  placeholder="Enter gst no" maxlength="15" value="<?php echo $row['gst']; ?>" id="gstno" readonly>
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Adhar Card Image</label><br>
                        <input type="file"  name="idfile4"  id="idfile4" accept="image/x-png,image/jpeg"><br><small><i>Please select image size less then or equal to 1mb</i></small><br><a class="imageshow" id="imageshow" target="_blank" alt="Id proof file" width="300px;"></a>
                        <?php if($getimages[3]!='') {?><a data-lightbox="example-<?php echo $i; ?>" href="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[3];?>">
                        <img src="<?php echo base_url();?>uploads/recruiter/idproof/<?php echo $getimages[3];?>"width="45px;">
                        </a><?php } ?>
                        <input type="hidden" name="doc4" value="<?php echo $getimages[3];?>">
                   </div>
                   </div> -->
                   

                    

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Company Logo</label><br>
                        <input type="file" id="companylogo" name="companylogo" accept="image/x-png,image/gif,image/jpeg" ><br>
                        <small><i>Please select image size less then 800kb and greater then 500kb</i></small><br>
                        <img id="blah" src="" style="display:none;" width="300px;">
                        <?php if($row['company_logo']!=''){?><img src="<?php echo base_url();?>uploads/recruiter/logo/<?php echo $row['company_logo'];?>" title="Logo" width="width: 300px;" id="dbimage"><?php } ?> 
                        <input type="hidden" name="oldimage" id="oldimage" value="<?php echo $row['company_logo'];?>">
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                    <span id="errormessage"></span>
                    </div>
                    </div>

                    <div class="col-md-12 text-center">
                    <div class="form-group"><br>
                        <button type="submit" value="Update" class="btn btn-sm btn-info" name="updateprofile" onclick="return updateprofiles()">Update</button>
                    </div>
                    </div>


                </form>
                </div><br>
                      
                    </div>
                    
                    <div class="col-md-4">
                    <ol class="bg-info text-white breadcrumb mb-0 bg-info events-head">
                    <li class="breadcrumb-item active text-white events-icon"> <i class="fas fa-key"></i>Password Update</li>
                    </ol>
                    <div class="form-top">
                        <form class="row" method="post" action="<?php echo base_url();?>recruiter/profile">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Old Password </label>
                            <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter old password" onchange="return checkpassword()" maxlength="10">
                        </div>
                        <span id="passwordicon"></span>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> New Password </label>
                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter new password" maxlength="10">
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Confirm Password </label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Enter confirm password" maxlength="10"><span id="passworderror"></span>
                        </div>
                        <span id="errorpassword"></span>
                        </div>

                       

                        <div class="col-md-12">
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-sm btn-info" value="Update" name="passupdate" onclick="return updatepasswod();">Update</button>
                        </div>
                        </div>

                        </form>
                    </div>
                    </div>
                    

                </div>
                 </div>
                </main>
                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "scripts.php";  ?>
        <script>
         $('#newpassword , #confirmpassword').on('keyup', function () {
                    if ($('#newpassword').val().trim() == $('#confirmpassword').val().trim()) {
                        $('#passworderror').html('<i class="fas fa-check"></i>').css('color', 'green');
                    }
                     else 
                        $('#passworderror').html('<i class="fas fa-times"></i>').css('color', 'red');
                    });
        function checkpassword(){
            var password=$('#oldpassword').val();
            $.ajax({
                method:'post',
                url:'<?php echo base_url ();?>recruiter/chekpass',
                data:{'password':password},
                success:function(datat1234){
                   if(datat1234.trim()=='false'){
                    $('#oldpassword').focus();
                    $('#oldpassword').val('');
                    $('#errorpassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter your current password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                   }

                }

            })
        }

            function updateprofiles(){
                var firstname=$('#firstname').val();
                var lastname=$('#lastname').val();
                var email=$('#pemail').val();
                var semail=$('#semail').val();
                var mobile=$('#mobile').val();
                var whatsapp=$('#whatsappno').val();
                var facebook=$('#facebookurl').val();
                var instagram=$('#instagramurl').val();
                var google=$('#googleurl').val();
                var address=$('#address').val();
                var googlemap=$('#googlemap').val();
                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

                if(firstname.trim()==''){
                    $('#firstname').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter firstname <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                }
                else if(lastname.trim()==''){
                    $('#lastname').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter firstname <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                }
                else if(email.trim()==''){
                    $('#email').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(!testEmail.test(email)){
                    $('#email').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter valid email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(semail.trim()==''){
                    $('#semail').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter secondary email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(!testEmail.test(semail)){
                    $('#semail').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter valid email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if((mobile.trim()!='')&& (mobile.trim().length<=9) ){
                    $('#mobile').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter valid 10 digit mobile <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                }
                else if((whatsapp.trim()!='')&& (whatsapp.trim().length<=9)){
                    $('#whatsappno').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter valid whatsapp number <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(address.trim()==''){
                    $('#address').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(googlemap.trim()==''){
                    $('#googlemap').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter google map iframe url <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }

                
                else{
                    return true;
                }

            }

            function updatepasswod(){
                var oldpassword=$('#oldpassword').val();
                var newpassword=$('#newpassword').val();
                var confirmpassword=$('#confirmpassword').val();
                if(oldpassword.trim()==''){
                    $('#errorpassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter old password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                   
                    $('#oldpassword').focus();
                    return false;

                }
                else if(newpassword.trim()==''){
                    $('#errorpassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter new password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                   
                    $('#newpassword').focus();
                    return false;

                }
                else if(confirmpassword.trim()==''){
                    $('#errorpassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter confirm password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#confirmpassword').focus();
                    return false;

                }
                else if((newpassword.trim())!=(confirmpassword.trim()) ){
                    $('#errorpassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please re-enter confirm password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    $('#confirmpassword').focus();
                    return false;

                }else{
                    return true;
                }
            }

           

          
       </script>
       <script>
    //    $( document ).ready(function() {
    //        var countclass=$('.top-idproof div.row').length;
    //        alert(countclass);
    //        for($i=countclass){

    //        }
    //        if(countclass>1){
    //             $('.top-idproof .row').addClass('remove');
    //        }
          
    //   });


            function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').show();
            $('#dbimage').hide();
            
            }

            reader.readAsDataURL(input.files[0]);
            }
            }

            

            var _URL = window.URL;
// $("#companylogo").change(function (e) {
//     var file, img;
//     if ((file = this.files[0])) {
//         img = new Image();
//         img.onload = function () {
//         if((this.width<=300)){
//             $('#companylogo').val('');
//             $('#companylogo').focus();
//             $('#blah').hide();
//             swal("Sorry!", "Please select the size of image 300*200", "error");
//         } else{
//             $('#errormessage').html('');
            

//         }    
//         };
//         img.src = _URL.createObjectURL(file);
//     }
// });

$("#companylogo").change(function (e) {
var fi = document.getElementById('companylogo');
if (fi.files.length > 0) {
for (var i = 0; i <= fi.files.length - 1; i++) {
var fsize = fi.files.item(i).size; 
var sizemain=Math.round((fsize / 1024)) ;

if(sizemain>800){
$('#companylogo').val('');
$('#companylogo').focus();
$('#blah').hide();
$('#dbimage').show();
swal("Sorry!", "Please select image size less then 800kb and greater then 500kb", "error");
}
else if(sizemain<500){

$('#companylogo').val('');
$('#companylogo').focus();
$('#blah').hide();
$('#dbimage').show();
swal("Sorry!", "Please select image size less then 800kb and greater then 500kb", "error");
}else{
$('#errormessage').html('');
readURL(this);
}
}
}

});

$("#idfile1").change(function (e) {
var fi = document.getElementById('idfile1');
if (fi.files.length > 0) {
for (var i = 0; i <= fi.files.length - 1; i++) {
var fsize = fi.files.item(i).size; 
var sizemain=Math.round((fsize / 1024)) ;
if(sizemain>1024){
$('#idfile1').val('');
$('#idfile1').focus();
swal("Sorry!", "Please select image size less then 1mb and greater then 500kb", "error");
}
else if(sizemain<500){
$('#idfile1').val('');
swal("Sorry!", "Please select image size less then 1mb and greater then 500kb", "error");
}else{
$('#errormessage').html('');
}
}
}
});
$("#idfile2").change(function (e) {
var fi = document.getElementById('idfile2');
if (fi.files.length > 0) {
for (var i = 0; i <= fi.files.length - 1; i++) {
var fsize = fi.files.item(i).size; 
var sizemain=Math.round((fsize / 1024)) ;
if(sizemain>1024){
$('#idfile2').val('');
swal("Sorry!", "Please select image size less then 1mb and greater then 500kb", "error");
}
else if(sizemain<500){
$('#idfile2').val('');
swal("Sorry!", "Please select image size less then 1mb and greater then 500kb", "error");
}else{
$('#errormessage').html('');
}
}
}
});

$("#idfile3").change(function (e) {
var fi = document.getElementById('idfile3');
if (fi.files.length > 0) {
for (var i = 0; i <= fi.files.length - 1; i++) {
var fsize = fi.files.item(i).size; 
var sizemain=Math.round((fsize / 1024)) ;
if(sizemain>1024){
$('#idfile3').val('');
swal("Sorry!", "Please select image size less then 1mb and greater then 500kb", "error");
}
else if(sizemain<500){
$('#idfile3').val('');
swal("Sorry!", "Please select image size less then 1mb and greater then 500kb", "error");
}else{
$('#errormessage').html('');
}
}
}
});



      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });
		
		
        // Create the search box and link it to the UI element.
	
        var input = document.getElementById('address');
		
		
        var searchBox = new google.maps.places.SearchBox(input);
		
		
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
	
        });
		
		
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          if (places.length == 0) {
            return;
          }
          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];
          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
			
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
			   
            }
          });
          map.fitBounds(bounds);
		 
        });
	
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3sJI07ongMwp7n98CSQRhLDDm0B1LIVA&libraries=places&callback=initAutocomplete"
         async defer></script>

        
   