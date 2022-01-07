<?php
  
  $pagename= end($this->uri->segment_array());
?>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="icon" href="<?php echo base_url().'images/logo-Cast-India.png'?>" type="<?php echo base_url().'images/logo-Cast-India.png'?>" sizes="16x16">
<title>Castindia</title>
        

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="<?php echo base_url(); ?>css/admincss/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/PagingStyle.css">
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.css">

<link rel="Stylesheet" type="text/css" href="https://foliotek.github.io/Croppie/demo/prism.css" />
<link rel="Stylesheet" type="text/css" href="https://foliotek.github.io/Croppie/bower_components/sweetalert/dist/sweetalert.css" />
<link rel="Stylesheet" type="text/css" href="https://foliotek.github.io/Croppie/croppie.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/userstyle.css">      

</head>

<div class="loader"><i class="fas fa-circle-notch fa-spin"></i></div>
<span class="emailalert" style="display:none;">
<div class="alert alert-danger alert-dismissible fade show top-alert-message" role="alert">
 Your email is not verified, please verify to receive latest updates! Didn’t receive email ? <button type="button" onclick="return sendemailverfify();" class="verifybutton"> Resend mail.</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="fas fa-times"></i></span>
  </button>
</div>
</span>
       <body class="sb-nav-fixed">
           
