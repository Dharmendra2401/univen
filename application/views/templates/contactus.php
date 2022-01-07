<?php $page='Contact Us'; $banner=$admin['banner_contact'] ;?>
<?php $this->load->view('/common/header'); ?>
<div class="contact-page">
<?php include 'bedcrumb.php';?>
	<div class="container">
		
		<div class="contact-blocks">
			<div class="contact-form">
				<h3>CONTACT FORM</h3>
				<?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

				<img src="<?php echo base_url();?>images/27.png" alt="">
				<form method="post" action="<?php echo base_url();?>home/contactus">
					<input type="text" placeholder="Name" id="name" name="name">
					<input type="email" placeholder="E-Mail" id="email" name="email">
					<input type="text" placeholder="Subject"  id="subject" name="subject">
					<textarea placeholder="Message" id="message" name="message"></textarea>
					<span id="errormessage"></span>
					<button type="submit" name="submit" class="btn btn-secondary btn-sm buttons text-white" onclick="return contactus()" value="SEND">SEND</button>
				</form><br>
			</div>
			<div class="contact-inform">
				<h3>CONTACT INFORMATION</h3>
				<img src="<?php echo base_url();?>images/27.png" alt="">
				<h4>Feel free to contact us</h4>
				<p>For further inquiries, you can send in your queries in the contact form or if you would like to visit us,
find our address below.</p>
				<h4>Address</h4>
				<ul>
					<li>1098/8b, Model Colony, </li>
					<li>Shivaji Nagar, Pune – 16.</li>
					<li>Maharashtra, India</li>
				</ul>
				<p>Phone : +9890726666</p>
				<p>Mail us at : <a href="mail-to:sample@example.com"> info@castindia.in</a></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php $this->load->view('/common/footer'); ?>
<script>
	function contactus(){
		var name=$('#name').val();
		var email=$('#email').val();
		var subject=$('#subject').val();
		var message=$('#message').val();
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if(name.trim()==''){
                    $('#name').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter name <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(email.trim()==''){
                    $('#email').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(!testEmail.test(email)){
                    $('#email').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter valid email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(subject.trim()==''){
                    $('#subject').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter subject <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(message.trim()==''){
                    $('#message').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter message <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else{
			return true;
		}
	}
</script>