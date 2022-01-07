<?php $this->load->view('/common/header'); ?>
<div class="login">
	<div class="container">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3 class="text-uppercase">REcuirter LOGIN</h3>
					 <img src="http://www.castindia.in/images/27.png" alt="">
					 <p>Welcome, please enter the following to continue.</p>
					 <!--p>If you have previously Login with us, <a href="#">click here</a></p-->
								 
					<div class="alert alert-danger" id="loginerrormsg" style="display:none"></div>
					<div class="alert alert-success" id="successmsg" style="display: none;"></div>
					<form id="loginform" action="http://www.castindia.in/user/loggedinuser" method="POST">
						 <h5>User Name:</h5>	
						 <input type="text" name="email" id="email" placeholder="Email Id">
						 <h5>Password:</h5>
						 <input type="password" name="password" id="password" placeholder="Password">
						 <input type="submit" value="LOGIN">
						  <a href="#" data-toggle="modal" data-target="#forgotPass" >Forgot Password ?</a>
					 </form>				 
			</div>
			<div class="col-md-6 login-right">
				<h3>NEW REGISTRATION</h3>
				<img src="http://www.castindia.in/images/27.png" alt="">
				<p>Hey there! Register now and open up a wide arena of the glamor world in front of you.</p>
				<p>Registrations are absolutely free.</p>
				<a href="<?php echo base_url(); ?>home/register">CREATE AN ACCOUNT</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	 <!-- Modal -->
		<div id="forgotPass" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content" style="border-radius: 0;">
			  <div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Forgot Password</h4>
			  </div>
              <form method="post" action="<?php echo base_url();?>/home/forgotemail">
			  <div class="modal-body">
              <div class="form-group">
			 	<label> <span class="text-danger">*</span>  Email </label>
				<input type="email" name="forgotemail" id="forgotemail" class="form-control"  placeholder="Enter email">
			  </div>
              <span id="forgoterror"></span>
              </div>
			  <div class="modal-footer">
				<button type="submit" name="send" class="btn btn-info clk_bt" id="resetpass" onclick="return forogotEmail();">Send</button>
				<button type="button" class="btn btn-default clk_bt" data-dismiss="modal">Close</button>
			  </div>
              </form>
			</div>

		  </div>
		</div>
</div>

<!-- Modal -->

<script>
function forogotEmail(){
    var emails=$('#forgotemail').val();
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if(emails.trim()==''){
        $('#forgotemail').focus();
        $('#forgoterror').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter email<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return false;
    }
    else{
        return true;
    }

}
</script>

<?php $this->load->view('/common/footer'); ?>  