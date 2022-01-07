<?php $this->load->view('/common/header');  ?>
<div class="">
<div class="container section-padding">

<div class="col-md-offset-3 col-md-6 col-sm-6 ">
<h5 class="heytext">Hey <?php echo $getdetails['aspfirstname'];?>,</h5>
<span class="text-secondary opacity0-5"><small>Please fill below details</small></span>


<form class=" form popupmodal formregasp" autocomplete="off" method="post" action="<?php echo base_url()?>adduseremp">
<input type="hidden" name="empfirst" value="<?php echo $getdetails['aspfirstname'];?>" >
<input type="hidden" name="emplast" value="<?php echo $getdetails['asplastname'];?>">
<input type="hidden" name="empemail" value="<?php echo $getdetails['aspemail'];?>">
<input type="hidden" name="aspmobile" value="">
<?php if($getdetails['aspmobile']!=''){?>
<input type="hidden" name="empmobile" value="<?php echo $getdetails['aspmobile'];?>">

<?php } ?>
<?php if($getdetails['aspmobile']==''){?>

<div class="row">
<div class="col-md-6">
<div class="form-group position-relative">
<label class="form-label heading-title" for="mobile">Mobile number</label>
<input type="tel" class="form-input form-control" onKeyPress="return isNumeric(event)"  name="empmobile" maxlength="10">
<!-- <button type="button" name="verifyemp" onclick="return getotp('employer');" class="verifyemp" id="verifyasp" style="display:none;">verify</button> -->
</div>
<!-- <div class="form-group text-center otp-input-emp allotp" style="display:none;">
<label class="otp-text">Please enter OTP </label>

<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotpone" id="empotpone"  onkeyup="return formregasp();" class="otpinputs">
<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotptwo" id="empotptwo"  onkeyup="return formregasp();" class="otpinputs" >
<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotpthree" id="empotpthree"  onkeyup="return formregasp();" class="otpinputs">
<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotpfour" id="empotpfour"  onkeyup="return formregasp();" class="otpinputs">
<div id="timertwo" class="settimer"></div>
</div> -->

</div>

</div>

<?php } ?>


<div class="form-group">
<label class="radio-label">Select Profile Type</label>
<?php $i=1; foreach($getempcat as $allempcat){?>
<label class="margin-radio">
<input type="radio" name="empcat" value="<?php echo $allempcat['name'];?>" <?php if($i==1){echo "checked";} ?> />
<span><?php echo $allempcat['name'];?></span>
</label>
<?php $i++;} ?>
</div>
<div class="row" id="companyfirmdiv" style="display:none;">
<div class="form-group col-md-6">
<label class="form-label heading-title" for="mobile">Company/Firm</label>
<input type="text" class="form-input form-control" name="companyfirm" onKeyPress="return isString(event)"  maxlength="60" onkeyup="return formregasp();">
</div>

<div class="form-group col-md-6">
<label class="form-label heading-title" for="mobile">Website</label>
<input type="url" class="form-input form-control" name="website"  maxlength="200" onkeyup="return formregasp();">
</div>

</div>

<div class="form-group">
<label class="form-label heading-title" for="mobile">Address</label>
<textarea type="text" class="form-input form-control" rows="4" cols="4" maxlength="150" name="address" onkeyup="return formregasp();"></textarea>
</div>

<div class="row">
<div class="form-group select col-md-6" >
<label class="form-label heading-title" for="mobile">State</label>
<select class=" form-input form-control"   name="state" id="state" onchange="return getstate();">
<option value="" style="display:none"></option>
<?php foreach ($getstates as $getstate){?>
<option value="<?php echo $getstate['state'];?>"><?php echo $getstate['state'];?></option>
<?php } ?>
</select>
</div>


<div id="getcity" class="col-md-6">

</div>
</div>

<div class="row">

<div class="form-group position-relative col-md-6">
<label class="form-label heading-title" for="mobile">Refrence Code</label>
<input type="text" class="form-input form-control" maxlength="20" name="refrencecode">
</div>
<input type="hidden" id="profileid12345" name="profileid">

</div>
<span id="emperror"></span>
<div class="col-md-offset-3 col-md-6 col-sm-6 ">
<button type="submit" name="submit" value="submit" id="buttonregasp" class="btn btn-primary d-inline-block d-sm-block btn-modal" disabled>Continue</button>
</div>
<br><br>
</form>
</div>     
</div>
<!-- <div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--</div> -->-->
</div>

</div>
</div>
<div class="text-center"><a href="<?php echo base_url();?>registration" class="grey">Back</a></div>
<br><br>


<?php $this->load->view('/common/footer'); ?>
<script>

$('input[name=empmobile]').keyup(function(){
	var aspmobile=$('input[name=empmobile]').val();
	var usertype=$('input[name=aspusertype]').val();
	if(aspmobile.length==10){
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/validmobile',
			data:{'aspmobile':aspmobile},
			success:function(formresult){
				if(formresult=='ok'){
					$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Sorry! Mobile number already exist.</div>');
					$('.verifyemp').hide();
					$('.otp-input-emp').hide();
					$('input[name=empmobile]').focus('');
					$('input[name=empmobile]').val('');
					regemp();
					return false;
				}
				else{
					$('.verifyemp').show();
				}
				

				
			}
		})


	}else{
		$('.verifyemp').hide();
	}
	
});

function formregasp(){
var aspmobile=$('input[name=empmobile]').val();
var aspotpone=$('input[name=empotpone]').val();
var aspotptwo=$('input[name=empotptwo]').val();
var aspotpthree=$('input[name=empotpthree]').val();
var aspotpfour=$('input[name=empotpfour]').val();
var address=$('textarea[name=address]').val();
var city=$('select[name=city]').val();
var state=$('select[name=state]').val();
var empcat=$('input[name=empcat]:checked').val();
var companyfirm=$('input[name=companyfirm]').val();
var url=$('input[name=website]').val();
var aspotponestoreone=$('input[name=empotponestoreone]').val();
var aspotponestoretwo=$('input[name=empotponestoretwo]').val();
var aspotponestorethree=$('input[name=empotponestorethree]').val();
var aspotponestorefour=$('input[name=empotponestorefour]').val();
var expression =/[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);
var otpcondition='';
<?php if($getdetails['aspmobile']==''){?>
var inputotpp=aspotpone+aspotptwo+aspotpthree+aspotpfour;
var otpuotpp=aspotponestoreone+aspotponestoretwo+aspotponestorethree+aspotponestorefour;


if((aspmobile.length<'10')||(aspmobile.trim()<6000000000)||(address=='')|| (inputotpp=='')||(city=='')||(state=='')){
$('#buttonregasp').attr('disabled',true);
<?php }else{?>
if((aspmobile.trim()=='')||(aspmobile.trim()<6000000000)||(address=='')||(city=='')||(state=='')){
$('#buttonregasp').attr('disabled',true);
<?php } ?>

}
else{
if((empcat=='Company/Firm')){
    
    if((companyfirm=='')|| (!expression.test(url))){
        $('#buttonregasp').attr('disabled',true);
    }else{
        $('#buttonregasp').attr('disabled',false);
    }
    
}else{
    $('#buttonregasp').attr('disabled',false);
}


}

}


$(document).mouseup(function (e) { 
if ($(e.target).closest(".droping-list").length 
=== 0) { 
$('.droping-list').hide(); 
} 
});
getstate();
function getstate(){

$('.loader').show();
var state=$('select[name=state]').val();
$.ajax({
method:'POST',
url:'<?php echo base_url();?>getcity',
data:{'state':state},
success:function(getcity){
$('#getcity').html(getcity);
$('.loader').hide();
formregasp();
}

})

}

function getcity(inputValue){
formregasp();
if ( inputValue == "" ) {
$('#city').removeClass('filled');
$('#citytop').removeClass('focused');  
$('.droping-list').hide();
} else {
$('#city').addClass('filled');
$('#citytop').addClass('focused');


}
}

$('input[name=empcat').change(function(){
    var empcat=$(this).val();
    if(empcat=='Company/Firm'){
        $('#companyfirmdiv').show();
        formregasp();
    }else{
        $('#companyfirmdiv').hide();
        $('input[name=companyfirm]').val('');
        $('input[name=website]').val('');
        formregasp();
    }
})
</script>

