<?php $this->load->view('/common/header'); ?>
<div class="login">
	<div class="container">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3>APPLICANT LOGIN</h3>
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
						  <a  >Forgot Password ?</a>
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
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content" style="border-radius: 0;">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Reset Password</h4>
			  </div>
			  <div class="modal-body chk">
			  <div class="alert alert-success fade in alert-dismissable loginmsg" style="margin-top:18px;displayL:none">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">�</a>
				<p></p>
			</div>
			 	<label class="col-xs-4">Email </label>
				<input type="text" name="email" class="one_required">
			  
			  <div class="clearfix"></div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-info clk_bt" id="resetpass">Reset</button>
				<button type="button" class="btn btn-default clk_bt" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
	
	
</div>
<?php $this->load->view('/common/footer'); ?>  