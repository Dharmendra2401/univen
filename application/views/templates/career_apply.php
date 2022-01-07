
<style type="text/css">
	input[type=file] {
    padding-left: 9%!important;
}
.custom-file-input:focus~.custom-file-label {
  border-color: none;
  box-shadow: none;
}
</style>
<!-- Life At Cast India -->
<?php $this->load->view('/common/header'); ?>
<!--Testimonials-->
<section class="container section-padding" style="
    padding-bottom: 0px!important;">
	<div class="box-shadowssss">
      <div class="row">
      	 <div class="col-sm-6 col-md-12 col-lg-10 col-xl-10">
      	 	<h2  class="our-team-heading">Sr. Graphics Designier</h2>
		</div>
		<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12 card" style="margin: 6% 0px 9% 0px;">
		  	<h4  class="" style="text-align: center;">Application Form</h4>
		  	<form class="form" autocomplete="off" style="margin: 43px 109px 0px 109px;">
				<div class="row">
					<div class="col-md-6 form-group">
						<label class="form-label heading-title" for="first">First name</label>
						<input type="text" class=" form-input form-control"  onKeyPress="return isString(event)"  maxlength="15" id="empfirst" name="empfirst" >
					</div>
					<div class="col-md-6 form-group">
						<label class="form-label heading-title" for="last">Last name</label>
						<input type="text" class="form-input form-control"  onKeyPress="return isString(event)" maxlength="15" id="emplast" name="emplast" >
					</div>
                </div>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile">Mobile number</label>
					<input type="tel" class="form-input form-control" maxlength="15" onKeyPress="return isNumeric(event)"  name="empmobile" onkeyup="return regemp();">
					<button type="button" name="verifyasp" onclick="return getotptwo();" class="verifyemp" id="verifyemp" style="display:none;">verify</button>
				</div>
				<div class="form-group text-center otp-input-emp allotp" style="display:none;">
				    <label class="otp-text">Please enter OTP </label>
				    

					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotpone" class="otpinputs" id="empotpone"onkeyup="return regemp();">
					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotptwo" class="otpinputs"  id="empotptwo"onkeyup="return regemp();">
					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="empotpthree" class="otpinputs" id="empotpthree"onkeyup="return regemp();">
					<input type="empotpfour" onKeyPress="return isNumeric(event)" maxlength="1" name="empotpfour" class="otpinputs" id="empotpfour"onkeyup="return regemp();">
                </div>
				<div id="timertwo" class="settimer"></div>
				<div class="form-group">
	                <label class="form-label heading-title" for="email">Email address</label>
	                <input type="email" class="form-input form-control"  id="empemail" onchange="return verifyemail(this.value)"  name="empemail" onkeyup="return regemp();">
                </div>
				<span id="emperror"></span>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile" >Describe yourself</label>
					<textarea class="form-input form-control" rows="4"></textarea>
				</div>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile" >Current CTC</label>
					<input type="text" class="form-input form-control">
				</div>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile" >Current Employer</label>
					<input type="text" class="form-input form-control">
				</div>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile" >Preferred work location</label>
					<input type="text" class="form-input form-control">
				</div>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile" >Resume</label>
					<input type="file" class="form-input form-control custom-file-input">
				</div>
				<div class="form-group position-relative">
					<label class="form-label heading-title" for="mobile" >Portfolio</label>
					<input type="file" class="form-input form-control custom-file-input">
				</div>
				<button type="button" name="button" id="buttonregemp" class="btn btn-primary d-inline-block d-sm-block btn-modal" style="width: 273px!important;margin: 3% 0px 0px 36%;">Submit</button>
			</form>
		</div>
      </div>
    </div>
</section>
<div class="clearfix"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<?php $this->load->view('/common/footer'); ?>
