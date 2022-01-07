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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/PagingStyle.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.css">

</head>

<div class="loader"><i class="fas fa-circle-notch fa-spin"></i></div>
       <body class="sb-nav-fixed">
           <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
               <a class="navbar-brand text-center" href="<?php echo base_url();?>admin">Cast India</a>
               <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
               <!-- Navbar Search-->
               <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                  
               </form>
               <!-- Navbar-->
               <ul class="navbar-nav ml-auto ml-md-0">
                   <span id="time-part"></span>
                   <li class="nav-item dropdown">
                       <span id="notifications"></span>

                       
                   </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                           
                           <a class="dropdown-item <?php if($pagename=='profile'){echo'active';} ?>" href="<?php echo base_url()?>admin/profile"><i class="far fa-id-badge"></i> Profile Update</a>
                           <a class="dropdown-item" href="<?php echo base_url();?>admin/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                           
                          
                       </div>

                       
                   </li>
                  
               </ul>
           </nav>

