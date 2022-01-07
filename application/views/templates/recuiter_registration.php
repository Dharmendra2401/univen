<?php $this->load->view('/common/header'); ?>
<div class="registration-form">
	<div class="container">
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
                    <h3>Recruiter Registration</h3>
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
					<img src="<?php echo base_url();?>images/27.png" alt="">
					 <p>Welcome, please enter the following details to continue.</p>
                     <p>If you have previously registered with us, <a href="http://www.castindia.in/recruiter/login">click here</a></p>
                     
					 <form id="register" class="" action="<?php echo base_url() ;?>home/recuiter_registration" method="POST" enctype="multipart/form-data" novalidate="novalidate">
						 
						 			
						  <ul>
							 <li class="text-info">I am  :</li>
							 <li>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="1" checked="">Production House</label>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="2">Advertising Agency</label>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="3">Media House</label>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="4">Modeling Agency</label>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="5">Casting company</label>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="6">Brand</label>
							 							 <label style="width: 150px;"><input type="radio" name="category" value="7">Individual</label>
							 							 </li>
						 </ul>						
						  <ul>
							 <li class="text-info"><span class="text-danger">*</span> Company Name:</li>
							 <li><input type="text" name="company_name" id="display_name" placeholder="Company name" class="" maxlength='100'></li>
						 </ul>						
						  <ul>
							 <li class="text-info"><span class="text-danger">*</span> First Name: </li>
							 <li><input type="text" name="firstname" placeholder="First Name" id="firstname" class=" inputtext" maxlength='15'></li>
						 </ul>
						 <ul>
							 <li class="text-info"><span class="text-danger">*</span> Last Name: </li>
							 <li><input type="text" name="lastname" placeholder="Last Name" id="lastname" class="inputtext" maxlength='15'></li>
						 </ul>				 
						 <ul>
							 <li class="text-info"><span class="text-danger">*</span> Mobile Number:</li>
							 <li><input type="tel" id="contact_no" name="contact_no" placeholder="Contact Number" maxlength="15" id="contact_no" class=""  onKeyPress="return isNumeric(event)" onchange="return checkphone()"></li>
						 </ul>						
						  <ul>
							 <li class="text-info"><span class="text-danger">*</span> Email: </li>
							 <li><input type="email" name="email" id="email" placeholder="Email" class="" maxlength='150' onchange="return checkemail();"></li>
                         </ul>

                         <ul>
							 <li class="text-info"><span class="text-danger">*</span> GST Number: </li>
							 <li><input type="text" name="gstno" id="gstno" placeholder="Gst No" class="text-uppercase " maxlength='15'  ></li>
                         </ul>
                         
                         <ul>
							 <li class="text-info"><span class="text-danger">*</span> PAN Number: </li>
							 <li><input type="text" name="panno" id="penno" placeholder="Pan No" class="text-uppercase " maxlength='10'></li>
						 </ul>
						 <ul>
							 <li class="text-info"><span class="text-danger">*</span> Password: </li>
							 <li><input type="password" id="password" name="password" placeholder="Password" class="" maxlength="15"></li>
						 </ul>
						 <ul>
							 <li class="text-info"><span class="text-danger">*</span> Re-enter Password:</li>
							 <li class="position-relative"><input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="" maxlength="15"> <span id="message" class="spinner-load"></span></li>
                         </ul>
                        
                         <ul id="error"></ul>
						<ul>
							 <li class="text-info"></li>
							 <button  type="submit"  value="REGISTER NOW" name="register" onclick="return registered();">REGISTER NOW</button>
						 </ul>						
						 
						 <p class="click">By clicking this button, you are agree to my  <a href="<?php echo base_url();?>home/terms_condition">Policy Terms and Conditions.</a></p> 
					 </form>
				 </div>
			</div>
			<div class="reg-right">
				 <h3>Completely Free Account</h3>
				 <img src="http://www.castindia.in/images/27.png" alt="">
				 <p>Beware of scams! Registration with Cast India is completely free and we don't 
charge for registrations. Go on, register yourself and watch your story unfold!</p>
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php $this->load->view('/common/footer'); ?>
<script>
function registered(){
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var display_name=$('#display_name').val();
    var firstname=$('#firstname').val();
    var lastname=$('#lastname').val();
    var contact_no=$('#contact_no').val();
    var email=$('#email').val();
    var gstno=$('#gstno').val();
    var penno=$('#penno').val();
    var password=$('#password').val();
    var cpassword=$('#cpassword').val();

    if(display_name.trim()==''){
        $('#display_name').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter company name.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
     else if(firstname.trim()==''){
        $('#firstname').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter first name.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(lastname.trim()==''){
        $('#lastname').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter last name.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(contact_no.trim()==''){
        $('#contact_no').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter contact number.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(email.trim()==''){
        $('#email').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter email.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if (!testEmail.test(email)){
        $('#email').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter valid email.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(gstno.trim()==''){
        $('#gstno').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter valid GST NO.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(penno.trim()==''){
        $('#penno').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter PAN NO.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;

    } 
    else if(penno.trim().length!=10){
        $('#penno').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter valid 10 digit PAN NO.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;

    }    
    else if(password.trim()==''){
        $('#password').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter password.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(cpassword.trim()==''){
        $('#cpassword').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter confirm password.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }
    else if(cpassword.trim()!=password.trim()){
        $('#cpassword').focus();
        $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter valid confirm password.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;


    }else{

        return true;
    }

   

}

$('#cpassword').on('keyup', function () {
    var password=$('#password').val();
    var cpassword=$('#cpassword').val();
if(cpassword==''){
    $('#message').html('');
}
  else if (password == cpassword) {
    $('#message').html('<i class="fas fa-check-circle text-success"></i>');
  }else{
    $('#message').html('<i class="fas fa-spinner fa-spin text-danger"></i>');

  }
    
});


function checkemail(){
    var email=$('#email').val();
    var mobile='';
    var table="recruiter";
    if(email.trim()!=''){
        $.ajax({
            method:'post',
            url:'<?php echo base_url();?>home/checkemail',
            data:{'email':email,'table':table,'mobile':mobile},
            success:function(data12){
                if(data12=='true'){
                    $('#email').focus();
                    $('#email').val('');
                    $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                }else{
                    $('#error').html('');
                    return true;
                }
               
            }


        });
    }
}


function checkphone(){
    var email='';
    var mobile=$('#contact_no').val();
    var table="recruiter";
    if(mobile.trim()!=''){
        $.ajax({
            method:'post',
            url:'<?php echo base_url();?>home/checkmobile',
            data:{'email':email,'table':table,'mobile':mobile},
            success:function(data122){
                if(data122=='true'){
                    $('#contact_no').focus();
                    $('#contact_no').val('');
                    $('#error').html('<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Contact no already exist!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                }else{
                    $('#error').html('');
                    return true;
                }
               
            }


        });
    }
}

</script>