<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<style type="text/css">
.site-footer:before {
    background-image: url("<?php echo base_url()?>templates/blog/asset/images/placeholder/blogberg-footer-shape.png");
    background-position: center bottom;
    bottom: 0;
    content: "";
    height: 365px;
    left: 0;
    right: 0;
    position: absolute;
    width: 100%;
    z-index: -1;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url().'images/logo-Cast-India.png'?>"
        type="<?php echo base_url().'images/logo-Cast-India.png'?>" sizes="16x16">
    <title>Castindia Blog</title>
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <link rel='dns-prefetch' href='http://s.w.org/' />
    <link rel='stylesheet' id='blogberg-google-fonts-css'
        href='http://fonts.googleapis.com/css?family=Hind:300,400,400i,500,600,700,800,900|Playfair+Display:400,400italic,700,900'
        type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css'
        href='<?php echo base_url()?>templates/blog/asset/vendors/bootstrap/css/bootstrap.mina352.css?ver=4.1.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='kfi-icons-css'
        href='<?php echo base_url()?>templates/blog/asset/vendors/kf-icons/css/style8a54.css?ver=1.0.0' type='text/css'
        media='all' />
    <link rel='stylesheet' id='owlcarousel-css'
        href='<?php echo base_url()?>templates/blog/asset/vendors/OwlCarousel2-2.2.1/assets/owl.carousel.min77e6.css?ver=2.2.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='owlcarousel-theme-css'
        href='<?php echo base_url()?>templates/blog/asset/vendors/OwlCarousel2-2.2.1/assets/owl.theme.default.min77e6.css?ver=2.2.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='blogberg-blocks-css'
        href='<?php echo base_url()?>templates/blog/asset/css/blocks.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='blogberg-style-css' href='<?php echo base_url()?>templates/blog/asset/css/style.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='blogora-style-parent-css'
        href='<?php echo base_url()?>templates/blog/asset/css/style8d9d.css?ver=4.9.16' type='text/css' media='all' />
    <link rel='stylesheet' id='blogora-style-css'
        href='<?php echo base_url()?>templates/blog/asset/css/style8a54.css?ver=1.0.0' type='text/css' media='all' />
    <link rel='stylesheet' id='blogora-google-fonts-css'
        href='http://fonts.googleapis.com/css?family=Montserrat%3A300%2C400%2C400i%2C500%2C600%2C700%7CPoppins%3A300%2C400%2C500%2C600%2C700&amp;display=swap&amp;ver=4.9.16'
        type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/media.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owlcarousel/assets/owl.carousel.css" rel='stylesheet'
        type='text/css' />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fontawesome5/css/all.min.css">
    <script type='text/javascript' src='<?php echo base_url()?>templates/blog/asset/js/jquery/jqueryb8ff.js?ver=1.12.4'>
    </script>
    <script type='text/javascript'
        src='<?php echo base_url()?>templates/blog/asset/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
    <style type="text/css">
    .recentcomments a {
        display: inline !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    </style>
</head>

<body class="home blog wp-custom-logo site-layout-full">

    <div id="page" class="site">
        <!-- //navigation -->
        <div class="loader" style="display: none;">
            <i class="fas fa-circle-notch fa-spin"></i>
        </div>

        <!-- header -->
        <?php if(($pagename!='aspmobile')&&($pagename!='empmobile')){?>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="header-left col-md-6 col-sm-6 col-xs-12">
                        <ul>
                            <li><i class="fab fa-whatsapp"></i><a
                                    href="https://wa.me/91<?php echo $admin['whatsapp'];?>">
                                    +91 <?php echo $admin['whatsapp'];?></a></li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $admin['s_email'];?>">
                                    <?php echo $admin['s_email'];?></a></li>
                        </ul>
                    </div>
                    <div class="header-right col-md-6 col-sm-6 col-xs-12">
                        <ul>
                            <?php  if(($getemp['Mobile_No']=='')&&($getasp['Mobile_No']=='')){?>
                            <li><a href="<?php echo base_url().'login'?>">Login</a></li>
                            <li><a href="<?php echo base_url().'registration'?>">Register</a></li>
                            <?php } ?>
                            <li><a href="#contact" style="padding-right:0px;" id="#contact">Contact us</a></li>

                            <!-- <li><a href="<?php echo base_url();?>/recruiter/dashboard">Recruiter</a></li>
			
				<li><a href="<?php echo base_url();?>/adminpanel/dashboard">Admin</a></li>
			
				<li><a href="<?php echo base_url();?>/user/dashboard">Manage Profile</a></li>
				<li><a href="<?php echo base_url();?>/user/logout">Logout</a></li> -->

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- //header -->
        <!-- logo -->
        <div id="home" class="logo">
            <div class="container">
                <h1 style="margin-bottom:25px;"><a href="<?php echo base_url(); ?>"><img
                            src="<?php echo base_url();?>/images/logo-Cast-India.png" class="logo_img"></a>
                    <h1>
                        <p>Launching India’s Finest.</p>
            </div>
        </div>
        <!-- //logo -->

        <!-- navigation -->
        <?php if(($pagename!='aspmobile')&& ($pagename!='empmobile')){?>
        <nav class="navbar navbar-default" style="display:block;">
            <div class="container-fluid">
                <div class="navbar-header" style="display: block;width: 100%;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="<?php echo base_url().'home/about';?>">ABOUT US</a></li> -->
                        <li><a href="<?php echo base_url()?>home/casting_calls">Casting Calls </a></li>

                        <li><a href="<?php echo base_url()?>home/category">Categories </a></li>
                        <li><a href="<?php echo base_url().'blog/index';?>">Blogs </a></li>

                        <li><a href="#">Tie-Ups </a></li>
                        <li><a href="<?php echo base_url();?>registration?tabs=employer">Hire Talent </a></li>
                        <!-- <li><a href="<?php echo base_url();?>home/blog">BLOGS </a></li> -->

                    </ul>
                </div>
            </div>
        </nav>
        <?php } ?>