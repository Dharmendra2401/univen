<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo PNAME; ?></title> 
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="<?php echo base_url(); ?>css/admincss/css/styles.css" rel="stylesheet" />
<link rel="icon" href="<?php echo base_url().'images/logo-Cast-India.png'?>" type="<?php echo base_url().'images/logo-Cast-India.png'?>" sizes="16x16">
</head>
<body class="bg-info">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                            <div class="text-center">
                            <img style="width:150px;margin-top: 2em; " src="http://www.castindia.in/images/logo-Cast-India.png" alt="">
                            </div>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center my-4 text-info">Admin Login</h3></div>
                                   
                                    <div class="card-body"><?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
                                        <form method="post" action="<?php echo base_url();?>admin/login">
                                            <div class="form-group">
                                                <label class=" mb-1" for="inputEmailAddress"><span class="text-danger">*</span> Email</label>
                                                <input class="form-control py-4" id="email" name="email" type="email" placeholder="Enter email" />
                                            </div>
                                            <div class="form-group">
                                                <label class=" mb-1" for="inputPassword"> <span class="text-danger">*</span> Password</label>
                                                <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group text-center ">
                                            <span id="errormessage" class="text-left"></span>
                                            <button type="submit" name="submit" onclick="return formvaldation()" class="btn btn-primary" >Login</button>
</div>
                                            <div class="form-group text-center">
                                                <a class="small" href="#" data-toggle="modal" data-target="#forgot">Forgot Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>


        <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" action="<?php echo base_url();?>admin/forgotpass">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="" >Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
<label><span class="text-danger">*</span> Email</label><br>
<input type="email"  name="email" placeholder="Enter email" class="form-control" id="forgotemail">
</div>
<span id="forgoterror"></span>
      </div>
      <div class="modal-footer bg-light text-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="return forgotPass()">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>

        <?php include 'scripts.php'; ?>
        <script>
function formvaldation(){
var email=$('#email').val();
var password=$('#password').val();
var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;


if(email.trim()==''){
    $('#email').focus();
    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else if (!testEmail.test(email))
	{   
	$('#email').focus();
	$('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter a valid email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
	}
else if(password.trim()==''){
    $('#password').focus();
    $('#errormessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;

}else{
    
    return true;
}

}
function forgotPass(){
var forgotemail=$('#forgotemail').val();
var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
if(forgotemail.trim()==''){
    $('#forgotemail').focus();
    $('#forgoterror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else if (!testEmail.test(forgotemail))
	{   
	$('#forgotemail').focus();
	$('#forgoterror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter a valid email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
	}
else{
    return true;
}
}



</script>

</body>
</html>
