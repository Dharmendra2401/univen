<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Add Event ";
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
                            Event</button><br><br>
                    </div>  -->

                </form>
                <div class="row">
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
                    <form method="post" action="<?php echo base_url()?>admin/add_events" class="form-top" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label><span class="text-danger">*</span> Title</label><br>
                            <input type="text"  placeholder="Enter title" id="title" name="title" class="form-control" maxlength ="70" >
                        </div>
                        <div class="col-md-4 form-group">
                            <label><span class="text-danger">*</span> Catagory</label><br>
                            <select  id="catagory" name="catagory[]" title="Select" class="form-control updateselect" data-live-search="true" multiple>
                            <?php foreach($allcat as $cat){?>
                            <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                            <?php }?>
                            </select>
                            
                        </div>

                        <div class="col-md-4 form-group">
                            <label><span class="text-danger">*</span> Sub Catagory</label><br>
                            <select  id="sub_cat" name="sub_cat" class="form-control" >
                            <option value="">Select</option>
                            <?php foreach($suball as $scat){?>
                            <option value="<?php echo $scat['id'];?>"><?php echo $scat['name'];?></option>
                            <?php }?>
                            </select>
                            
                        </div>
                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> Type</label><br>
                            <select id="type" name="type" class="form-control" >
                            <option value="">Select</option>
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
                            </select>
                            
                        </div>

                        <div class="col-md-3 form-group">
                            <label><span class="text-danger" id="pricemand" style="display:none;">*</span> Price</label><br>
                            <input type="tel" placeholder="Enter price" id="price" name="price" class="form-control" onKeyPress="return isNumeric(event)" maxlength ="70" disabled>
                        </div>

                        
                        
                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> Start Date</label><br>
                            <input type="date"  placeholder="Enter start date" id="startdate" name="startdate" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> End Date</label><br>
                            <input type="date"  placeholder="Enter end date" id="enddate" name="enddate" class="form-control" disabled title="select start date to unable">
                        </div>

                      
                        

                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span> Description</label><br>
                            <textarea type="text"  placeholder="Enter description" id="description" name="description" class="form-control" ></textarea>
                        </div>


                        <div class="col-md-6 form-group">
                            <label><span class="text-danger">*</span>  Terms & Conditions</label><br>
                            <textarea type="text"  placeholder="Enter terms and condition" id="termcond" name="termcond" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> Location</label><br>
                            <select  id="locationsssss"  name="addcity" title="Select" class="form-control locationsssss" data-live-search="true" single>
                           <option value="">Select</option>
                            <?php foreach($ccity as $getcity){?>
                            <option value="<?php echo $getcity['city'];?>"><?php echo $getcity['city'];?></option>
                            <?php }?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> Address</label><br>
                            <textarea type="text"  placeholder="Enter address" id="address" name="address" class="form-control" maxlength ="150"></textarea>
                            <br>
                            <div  id="getmapp" style="display:none;" ></div>
                            
                        </div>

                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> Images Gallery</label><br>
                            <input type="file" class="" name="image[]" id="image" accept="image/*" multiple><br>
                            <small><i>Please select image size of less than 1mb and greater then 500kb</i></small>
                        </div>

                        <div class="col-md-3 form-group">
                            <label><span class="text-danger">*</span> Event Banner Image</label><br>
                            <input type="file" class="" name="bimage" id="bimage" accept="image/*"><br>
                            <small><i>Please select image size of 1920 * 400</i></small>
                        </div>



                        
                        </div>
                       
                      


                        
                        <span id="errormessages"></span>
                    
                    <div class="text-center form-group">
                        <button type="submit" name="add" value="Add" class="btn btn-success" onclick="return addevents();" >Add</button>
                        
                    </div>
                    </form>
                    </div>

                    </div>
                </div><br>
        </main>

    

       
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>
</body>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDIaVx3nzu2hMV5Aa8bTeSJxx-s3TtSrmc"></script>
<script type='text/javascript'>
var address="India";

 $( "#address" ).keyup(function() {
  address = $(this).val();
  if(address==''){
    $('#getmapp').hide();
  }else{
    $('#getmapp').show();
  }
  getlatlong();
});

var geocoder = new google.maps.Geocoder();
var count = 0;
function getlatlong()
{
	++count;
geocoder.geocode( { 'address': address}, function(results, status) {
	//console.log(status);
  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
    //alert(latitude+" -- "+longitude); 
	initMap(latitude,longitude);
  }else{
	  address = "<?php echo $view->details[0]['location']; ?>";
	  if(count<=2)
	  {
		getlatlong();
	  }
  }
}); 
}

function initMap(latitude,longitude) {
        var myLatLng = {lat: latitude, lng: longitude};
        var map = new google.maps.Map(document.getElementById('getmapp'), {
          zoom: 14,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: address
        });
		
		
      }  

	

	   
  

var _URL = window.URL;
$('#image').change(function(){
var fi = document.getElementById('image'); // GET THE FILE INPUT.
if (fi.files.length > 0) {
for (var i = 0; i <= fi.files.length - 1; i++) {
var fsize = fi.files.item(i).size; 
var sizemain=Math.round((fsize / 1024)) ;
if((sizemain>1024)||(sizemain<500)){
$('#image').val('');
$('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please select image size of less then 1mb and greater then 500kb<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
}else{
$('#fileerror').html('');
}
}
}
})

function addevents(){
    var title=$('#title').val();
    var sub_cat=$('#sub_cat').val();
    var price=$('#price').val();
    var type=$('#type').val();
    var startdate=$('#startdate').val();
    var enddate=$('#enddate').val();
    var address=$('#address').val();
    var image=$('#image').val();
    var addcity=$('.locationsssss :selected').val();
    var alldrop=$('.updateselect :selected').length;
    var description=CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
    var termcond=CKEDITOR.instances['termcond'].getData().replace(/<[^>]*>/gi, '').length;
    var bimage=$('#bimage').val();
    if(title.trim()==''){
        $('#title').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter title<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(alldrop==0){
        $('#catagory').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select catagory<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    
    else if(alldrop>5){
        $('#catagory').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select maximum 5 catagory<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(sub_cat==''){
        $('#sub_cat').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select sub catagory<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    
    else if(type.trim()==''){
        $('#type').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter type<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(((type=='Intern')||(type=='Paid'))&&(price=='')){
        $('#price').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter price<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(startdate.trim()==''){
        $('#startdate').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select start date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if((startdate.trim()!='')&&(enddate.trim()=='')){
        $('#enddate').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select end date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(startdate.trim()>=enddate){
        $('#enddate').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select valid end date<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if((addcity==1)||(addcity==0)){
        $('#addcity').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select location<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }

    
    else if(address.trim()==''){
        $('#address').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter address <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(image.trim()==''){
        $('#image').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(description.trim()==0){
        $('#description').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter description <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(termcond.trim()==0){
        $('#termcond').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Enter terms & conditions <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else if(bimage.trim()==''){
        $('#bimage').focus();
        $('#errormessages').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Select banner image <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;

    }
    else{
        return true;
    }
}
 
 CKEDITOR.replace('description', {
        extraPlugins: 'colorbutton,colordialog'
});
CKEDITOR.replace('termcond', {
        extraPlugins: 'colorbutton,colordialog'
});

$(document).ready(function(){
$('#startdate').change(function(){
    var startdate=$('#startdate').val();
    $('#enddate').prop('min',startdate);
    $('#enddate').prop('disabled',false);
})
$('#type').change(function(){
   var type= $(this).val();
   if((type=='Intern')||(type=='Paid') ){
    $('#price').prop('disabled',false);
    $('#pricemand').show();
   }else{
    $('#price').prop('disabled',true);
    $('#pricemand').hide();
   }
})

});

   
$('.updateselect').selectpicker();
$('.locationsssss').selectpicker();

</script>



</html>