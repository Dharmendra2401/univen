<div class="modal fade" id="viewmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header mod-head">
<!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body m-3">
<div class="text-center pb-2 successmessage"></div>
<div class="modal-footer text-center d-block border-0 mb-2">
<button type="button" class="btn btn-primary width42" data-dismiss="modal">Ok </button>
</div>
</div>
</div>
</div>
</div>



<div class="modal fade" id="additionaldetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo base_url();?>aspirant/dashboard" enctype="multipart/form-data" method="post"
                class=" adddetailss" autocomplete="off">
                <div class="modal-content ">
                    <input type="hidden" id="getimagename" name="image">
                    <div class="modal-header mod-head">
                        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    </div>
                    <div class="mainform">
                        <div class="modal-body mt-4 ml-2 mr-2">
                            <h5 class="text-center pb-1 mb-0">Additional Details form!<h6
                                    class="text-center mt-0 font-14px">
                                    Let's enter some general details about you for us to know you better!</h6>
                            </h5><br>



                            <p class="position-relative font-18px"><strong>We want to know you better, so we can
                                    recommend
                                    the
                                    right employers for you!</strong><br>
                                Let’s start with birthdate.



                                <span class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii p"
                                    data-link-field="dtp_input1">
                                    <input class="profile-selecter text-center datetimepicker"
                                        style="width: 100px;" type="text" value="" readonly onchange="return reminder()"
                                        name="dobs">
                                    <span class="input-group-addon"><span class="glyphicon fa fa-calendar"></span>
                                    </span>
                                </span>
                                <span style="display:none" class="reminder">. We'll put a reminder in our calendar to
                                    wish
                                    you!
                                    How about your middle name? <input type="text" name="middlenames" id="middlenames"
                                        class="profile-selecter text-center" placeholder="middle name"
                                        style="width:120px" onkeyup="return reminder()">
                                </span>
                                <span style="display:none;" class="genders">
                                    Your gender <select type="text" name="genders" id="genders" class="profile-selecter"
                                        onchange="return reminder()" style="width: 100px;">
                                        <option value="" style="display:none;"></option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="T">Transgender</option>
                                        <option value="O">Other</option>
                                    </select>
                                </span>

                                <span class="pincode" style="display:none">. Next, please enter zip code for us to
                                    locate
                                    the best recruiters near you <input type="tel" name="pincodes" id="pincodes"
                                        class="profile-selecter text-center" placeholder="pincode" style="width:120px"
                                        onkeyup="return reminder()" maxlength="6" placeholder="Zip Code" onkeypress="return isNumeric(event)" onkeyup="return reminder()"></span>

                                <span class="imagediv" style="display:none;"><br>
                                   <strong>Great! We are almost done with the
                                            personal details!</strong><br>
                                            Please upload a picture of yours, so we can recognize you in the future!
                                        <button class="btn file-btn " type="button">
                                            <img src="<?php echo base_url(); ?>img/profile-user.png" id='getcropimage' width="45px">
                                            <i class="fa fa-plus image-button" aria-hidden="true"></i>
                                            <input type="file" id="upload" class="cropper-button upload"
                                                accept="image/*" />
                                        </button>

                                </span>
                            </p>


                        </div>
                        <div class="modal-footer text-center d-block border-0 mb-2">
                            <button type="submit" name="updatedetails" value="updatedetails"
                                class="btn btn-primary width42 adddetailss text-white">Save
                            </button>
                        </div>
                    </div>

                    <div class="modal-body mt-4 ml-2 mr-2 demo-wrap upload-demo mb-4" style="display:none">
                        <p class="position-relative font-18px">Profile Picture</p>
                        <div class="col-1-2">
                            <div class="upload-msg">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="upload-demo-wrap">
                                <div class="upload-demos"></div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12 text-center">
                            <button class="btn file-btn btn-primary width42 " type="button">
                                <span>Upload</span>
                                <input type="file" id="upload" class="cropper-button upload" value="Choose a file"
                                    accept="image/*" />
                            </button>
                            <button type="button"
                                class="upload-result btn btn-secondary width42 adddetailss text-white">Save</button>
                        </div>

                    </div>
            </form>
        </div>
      </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>css/admincss/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>css/admincss/js/chart.min.js"></script>
        <script src="<?php echo base_url(); ?>css/admincss/js/shorting.js"></script>
        <script type="text/javascript" src="https://cdn.ckeditor.com/4.15.0/standard-all/ckeditor.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>js/lightbox.js"></script>
        <script src="<?php echo base_url(); ?>js/userscript.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>
        
        <script src="https://foliotek.github.io/Croppie/demo/prism.js"></script>
        <script src="https://foliotek.github.io/Croppie/bower_components/sweetalert/dist/sweetalert.min.js"></script>

        <script src="https://foliotek.github.io/Croppie/croppie.js"></script>
        <script src="<?php echo base_url();?>js/demo.js"></script>
        <script src="https://foliotek.github.io/Croppie/bower_components/exif-js/exif.js"></script>
        <script>
            Demo.init();
        </script>
        
        <script>

$('input[name=pincodes]').keyup(function(){
    var pincodes=$(this).val();
    getpincodecheck(pincodes);
})

function getpincodecheck(pincode){
    var len=$('input[name=pincode]').val();          
    $.ajax({
        type: 'POST',
        url: 'getpincodecheck',
        data: {
            'pincode':pincode,
        },
        success: function(getcity) {
            if(getcity=='1'){
                $('#getcity div.select').addClass('focused');
                $('#getstate div.select').addClass('focused');
                // $('#personaldetailbutton').attr('disabled', false);
                // $('button[name=updatedetails]').attr('disabled', false);
                return true;
        }else{
            // $('#personaldetailbutton').attr('disabled', true);
            // $('button[name=updatedetails]').attr('disabled', true);
             return false;
        }
        }
    })
}


function isNumeric (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[0-9]|\./;
if ( !regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}

$(document).ready(function(){
$(function(){
   setTimeout(function(){
      $(".alert.alert-success.alert-dismissible.fade.show").hide();
      }, 3000);
});
$("#notifications").load("<?php echo base_url();?>admin/loadnotication");

});
$('.modal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
})


$('input').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});
$(document).ready(function() {
$('input').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
	$('.droping-list').hide();
  } else {
    $(this).addClass('filled');
  }
}) 
}) 
$('textarea').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
	$('.droping-list').hide();
  } else {
    $(this).addClass('filled');
  }
})  
$('textarea').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});

$('select').change(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
	$('.droping-list').hide();
  } else {
    $(this).addClass('filled');
    $(this).parents('.form-group').addClass('focused');
	
  }
}) 
$(document).mouseup(function (e) { 
if ($(e.target).closest(".droping-list").length 
=== 0) { 
$('.droping-lists').hide(); 

} 
});

function isString (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[^a-zA-Z _]/g;
if ( regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}

function isAlphaNumeric (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[^a-zA-Z0-9\s_]/g;
if ( regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}
function allowFloat (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[0-9]|[.]|\./;
if ( !regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}
$(document).ready(function(){


});
emailverfication();
function emailverfication(){
  $.ajax({
    type:'GET',
    url:'emailverfied',
    success:function(emailverified){
      if(emailverified=='0'){
        $('.emailalert').show();
      }else{
        $('.emailalert').hide();
      }
    }
  })
}

function sendemailverfify(){
  $('.loader').fadeIn();
  $.ajax({
    type:'GET',
    url:'sendemailverfify',
    success:function(emailverified){
      $('.loader').fadeOut();
      $('.successmessage').html('<div class="alert alert-success alert-dismissible show" role="alert"> Send! Please click on the link sent on your email and verify.  </div>');
                $('#viewmessage').modal('show');
      
    }
  })
}

getpopup();
function getpopup(){
    $.ajax({
        url:'getpopup',
        type:'GET',
        success:function(getalert){
            if(getalert=='0'){ 
                $('#additionaldetails').modal({
              		backdrop: 'static',
              		keyboard: false
             });
                $('#additionaldetails').modal('show');
            }else{
                $('#additionaldetails').modal('hide');
            }
        }
    })
}

$('#upload').change(function() {
    var image = $('#upload').val();
    if (image != '') {
        $('.upload-demo').show();
        $('.mainform').hide();
        $('#getimagename').val('');
    }
})
reminder();
<?php if(($getalldet['Year_of_Passing']==0)){?>
$('#yearofpassing').val('');
<?php } ?>
function reminder() {
    var date = $('input[name=dobs]').val();
    var middlename = $('input[name=middlenames]').val();
    var gender = $('select[name=genders]').val();
    if (middlename == '') {
        gender = '';
    }
    var pincode = $('input[name=pincodes]').val();
    var image = $('#getimagename').val();
    if (date != '') {
        $('.reminder').fadeIn();
    } else {
        $('.genders').fadeOut();
        $('.pincode').fadeOut();
        $('.imagediv').fadeOut();
        $('select[name=middlenames]').val('');
        $('select[name=genders]').val('');
        $('input[name=pincodes]').val('');
        $('#upload').val('');
    }
    if (middlename != '') {
        $('.genders').fadeIn();
    } else {
        $('.genders').fadeOut();
        $('.pincode').fadeOut();
        $('.imagediv').fadeOut();
        $('input[name=pincodes]').val('');
        $('select[name=genders]').val('');
        $('#upload').val('');
    }
    if (gender != '') {
        $('.pincode').fadeIn();
    } else {
        $('.pincode').fadeOut();
        $('.imagediv').fadeOut();
        $('#upload').val('');
        $('select[name=genders]').val('');
    }
    if ((pincode != '')&&(pincode.length==6)) {
        $('.imagediv').show();
        
    } else {
        $('.imagediv').fadeOut();
        $('#upload').val('');
    }

    if ((date != '') && (middlename != '') && (gender != '') && (pincode.length==6) && (image != '')) {
        $('button[name=updatedetails]').attr('disabled', false);
    } else {

        $('button[name=updatedetails]').attr('disabled', true);
    }

}
var dates='<?php echo date('Y-m-d');?>';
$(".form_datetime").datetimepicker({
    weekStart: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    format: "dd/m/yyyy",
    autoclose: true,
    startDate: "1980-01-1",
    endDate: dates,
    formatTime: false,
});


</script>
        

        
        
        

        

        


        

        