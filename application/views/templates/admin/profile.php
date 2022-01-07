<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Profile Update";
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
                <div class="col-md-12"><?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?></div>
                    <div class="col-md-8">
                    <ol class="bg-info text-white breadcrumb mb-0 bg-info events-head">
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-pencil-alt"></i>  Profile Update</li>
                    </ol>
                </ol>
                <div class="form-top">
              
                <form class="row" method="post" action="<?php echo base_url();?>admin/profile" autocomplete="off">
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
                        <label><span class="text-danger">*</span> Primary Email </label>
                        <input type="email" class="form-control" name="pemail"  placeholder="Enter primary email id" maxlength="150" value="<?php echo $row['email']; ?>" id="pemail" readonly>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Secondary Email </label>
                        <input type="email" class="form-control" name="semail"  placeholder="Enter secondary email id" maxlength="150" value="<?php echo $row['s_email']; ?>" id="semail">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Mobile No</label>
                        <input type="tel" class="form-control" name="mobile"  placeholder="Enter mobile no" maxlength="15" value="<?php if($row['mobile']!=0){echo $row['mobile'];} ?>" id="mobile"  onKeyPress="return isNumeric(event)">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Whatsapp No </label>
                        <input type="tel" class="form-control" name="whatsappno"  placeholder="Enter whatsapp no" maxlength="15" value="<?php if($row['whatsapp']!=0){echo $row['whatsapp'];} ?>" id="whatsappno"  onKeyPress="return isNumeric(event)">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Facebook Url </label>
                        <input type="url" class="form-control" name="facebookurl"  placeholder="Enter facebook url" maxlength="200" value="<?php echo $row['facebook']; ?>" id="facebookurl">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Instagram Url </label>
                        <input type="url" class="form-control" name="instagramurl"  placeholder="Enter instagram url" maxlength="200" value="<?php echo $row['instagram']; ?>" id="instagramurl">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Linkedin</label>
                        <input type="url" class="form-control" name="linkdinurl"  placeholder="Enter linkedin url" maxlength="200" value="<?php echo $row['linkdin']; ?>"  id="linkdinurl">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label> Twitter</label>
                        <input type="url" class="form-control" name="twitterurl"  placeholder="Enter twiter url" maxlength="200" value="<?php echo $row['twitter']; ?>"  id="twitterurl">
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> City One </label>
                        <input type="text" class="form-control" name="cityone"  placeholder="Enter city one" maxlength="20" id="cityone" autocomplete="off" value="<?php echo $row['cityone']; ?>">
                        
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Address One</label>
                        <textarea type="text" class="form-control" name="addressone"  placeholder="Enter address one" maxlength="150" id="addressone" autocomplete="off"><?php echo $row['addressone']; ?></textarea>
                        <div id="map" style="display:none;"></div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> City Two </label>
                        <input type="text" class="form-control" name="citytwo"  placeholder="Enter city two " maxlength="20" value="<?php echo $row['citytwo']; ?>" id="citytwo" autocomplete="off">
                        
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Address Two</label>
                        <textarea type="text" class="form-control" name="addresstwo"  placeholder="Enter address two " maxlength="200" id="addresstwo" autocomplete="off"><?php echo $row['addresstwo']; ?></textarea>
                        <div id="mapone" style="display:none;"></div>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Google Iframe Url </label>
                        <input type="url" class="form-control" name="googlemap"  placeholder="Enter google iframe map url" maxlength="500" value="<?php echo $row['googlemap']; ?>"  id="googlemap">
                    </div>
                    </div>
                    <div class="col-md-12">
                    <p class="bg-info text-white breadcrumb mb-0 bg-info"> Meta Content</p><br>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Description </label>
                        <textarea type="text" class="form-control" name="description"  placeholder="Enter description " maxlength="200" id="description" autocomplete="off"><?php echo $row['description']; ?></textarea>
                        
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">*</span> Keywords </label>
                        <textarea type="text" class="form-control" name="keyword"  placeholder="Enter keyword " maxlength="200" id="keyword" autocomplete="off"><?php echo $row['keyword']; ?></textarea>
                       
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
                    <li class="breadcrumb-item active text-white events-icon"><i class="fas fa-key"></i>  Password Update</li>
                    </ol>
                    <div class="form-top">
                        <form class="row" method="post" action="<?php echo base_url();?>admin/profile">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Old Password </label>
                            <input type="password" class="form-control" name="oldpassword" id="oldpassword"  placeholder="Enter old password" onchange="return checkoldPass()" maxlength="10">
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
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="Enter confirm password" maxlength="10"><span id="passworderror"></span>
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
                    <br>
                    <label>Google Map Location</label>
                    <iframe src="<?php echo $row['googlemap']; ?>" width="100%" height="265" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
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
                var address=$('#addressone').val();
                var addresstwo=$('#addresstwo').val();
                var cityone=$('#cityone').val();
                var citytwo=$('#citytwo').val();
                var googlemap=$('#googlemap').val();
                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                var description=$('#description').val();
                var keyword=$('#keyword').val();
                

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
                else if(cityone.trim()==''){
                    $('#cityone').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter city one <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(citytwo.trim()==''){
                    $('#citytwo').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter city two <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(address.trim()==''){
                    $('#addressone').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(addresstwo.trim()==''){
                    $('#addresstwo').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(googlemap.trim()==''){
                    $('#googlemap').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter google map iframe url <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(description.trim()==''){
                    $('#description').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter description <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                else if(keyword.trim()==''){
                    $('#keyword').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter keywords <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;

                }
                

                
                else{
                    return true;
                }

            }

            function checkoldPass(){
                var oldpassword=$('#oldpassword').val();
                var table='admin';
                var id='1';
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url();?>admin/checkpassword',
                    data:{'oldpassword':oldpassword,'table':table,'id':id},
                    success:function(response){
                        if(response=='false'){
                            $('#errorpassword').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter old password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            $('#oldpassword').val('');
                            $('#oldpassword').focus();
                            return false;
                        }else{
                            $('#errorpassword').html('');

                        }

                    }

                })


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

                }
            }

            function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        var maps = new google.maps.Map(document.getElementById('mapone'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });
		
		
        // Create the search box and link it to the UI element.
	
        var input = document.getElementById('addressone');
        var inputtwo = document.getElementById('addresstwo');
		
		
        var searchBox = new google.maps.places.SearchBox(input);
        var searchBoxtwo = new google.maps.places.SearchBox(inputtwo);
		
		
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
    </body>
</html>
