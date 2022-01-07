<?php
  
$pagename= basename($_SERVER['PHP_SELF']);
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
        

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
<link href="<?php echo base_url(); ?>css/admincss/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/PagingStyle.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-multiselect.css">






</head>

<div class="loader"><i class="fas fa-circle-notch fa-spin"></i></div>
       <body class="sb-nav-fixed sb-sidenav-toggled">
           
                       
       <?php $this->load->view("templates/recruiter/settings.php");?>
                       
                  

