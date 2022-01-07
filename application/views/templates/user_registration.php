<?php $this->load->view('/common/header'); ?>
<div class="registration-form">
	<div class="container">
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					<h3>Registration</h3>
					<img src="http://www.castindia.in/images/27.png" alt="">
					 <p>Welcome, please enter the following details to continue.</p>
					 <p>If you have previously registered with us, <a href="<?php echo base_url();?>home/login">click here</a></p>
					 <form id="register" class="" action="http://www.castindia.in/user/createuser" method="POST" enctype="multipart/form-data" novalidate="novalidate">
						  
						 <!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content" style="border-radius: 0;">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h4 class="modal-title">I want to be</h4>
								  </div>
								  <div class="modal-body chk">
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="2" class="one_required"> Actor (Male/ Female)</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="33" class="one_required"> Animation artist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="18" class="one_required"> Art director</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="19" class="one_required"> Assistant art director</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="13" class="one_required"> Assistant choreographer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="6" class="one_required"> Assistant director</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="7" class="one_required"> Assistant director of Photography</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="21" class="one_required"> Assistant makeup artist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="5" class="one_required"> Camera man</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="15" class="one_required"> Casting director</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="10" class="one_required"> Caterers</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="12" class="one_required"> Choreographer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="23" class="one_required"> Costume designer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="16" class="one_required"> Dancers</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="3" class="one_required"> Director</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="11" class="one_required"> Driver</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="34" class="one_required"> Dubbing artist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="30" class="one_required"> Editors</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="31" class="one_required"> Hair stylist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="9" class="one_required"> Instrumentalist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="27" class="one_required"> Light designer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="28" class="one_required"> Light support</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="20" class="one_required"> Makeup artist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="1" class="one_required"> Model (Male/ Female)</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="4" class="one_required"> Photographer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="17" class="one_required"> Physiotherapist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="24" class="one_required"> Playback artist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="14" class="one_required"> PR</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="26" class="one_required"> Script writers</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="8" class="one_required"> Singer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="29" class="one_required"> Sound engineer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="25" class="one_required"> Story board designer</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="22" class="one_required"> Stylist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="32" class="one_required"> VFX artist</label>
								  									<label class="col-xs-4">
									<input type="checkbox" name="profiles[]" value="35" class="one_required"> Voice over artist</label>
								  								  <div class="clearfix"></div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default clk_bt" data-dismiss="modal">Close</button>
								  </div>
								</div>

							  </div>
							</div>
						 
						 			
							 <ul>
								 <li class="text-info">I want to be </li>
								 <li><span class="" data-toggle="modal" data-target="#myModal" style="font-weight:bold;cursor:pointer;" id="cprofiles">Click here to select Profile</span></li>
								 <label id="profiles-error" class="error" for="profiles[]"></label>
								  
							 </ul>
						 <ul>
							 <li class="text-info">First Name: </li>
							 <li><input type="text" name="firstname" placeholder="First Name"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Last Name: </li>
							 <li><input type="text" name="lastname" placeholder="Last Name"></li>
						 </ul>				 
						 <ul>
							 <li class="text-info">Email: </li>
							 <li><input type="text" name="email" id="email" placeholder="Email"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Password: </li>
							 <li><input type="password" id="password" name="password" placeholder="Password"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Re-enter Password:</li>
							 <li><input type="password" name="cpassword" placeholder="Confirm Password"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Mobile Number:</li>
							 <li><input type="text" id="contact_no" name="contact_no" placeholder="Contact Number" maxlength="10"></li>
						 </ul>						
						  <ul>
							 <li class="text-info">Display Name:</li>
							 <li><input type="text" name="display_name" id="display_name" placeholder="For Display"></li>
						 </ul>						
						  <ul>
							 <li class="text-info"></li>
							 <li><input type="button" id="f_submit" value="REGISTER NOW" class="clk_bt"></li>
						 </ul>						
						 
						 <p class="click">By clicking this button, you are agree to my <a href="<?php echo base_url();?>home/terms_condition">Policy Terms and Conditions.</a></p> 
					 </form>
				 </div>
			</div>
			<div class="reg-right">
				 <h3>Completely Free Account</h3>
				 <img src="http://www.castindia.in/images/27.png" alt="">
				 <p>Beware of scams! Registration with Cast India is completely free and we don't 
charge for registrations. Go on, register yourself and watch your story unfold!</p>
				 <!--h3 class="lorem">Lorem ipsum dolor sit amet elit.</h3-->
				 <!--img src="http://www.castindia.in/images/27.png" alt=""/-->
				 <!--p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p-->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php $this->load->view('/common/footer'); ?>