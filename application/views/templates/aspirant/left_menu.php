<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<div class="text-center admin-pic">
<img src="<?php echo base_url(); ?>images/userlogo.png" alt="default.jpg" style="width: 113px;">

</div>

<a class="nav-link <?php if($pagename=='dashboard'){echo 'active';} ?>" href="<?php echo base_url(); ?>aspirant/dashboard" >
<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
Dashboard
</a>

<a class="nav-link <?php if($pagename=='profiles'){echo 'active';} ?>" href="<?php echo base_url(); ?>aspirant/profiles?type=Profile_details" >
<div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
Profiles
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/jobbox">
<div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
Job Box
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/ci_ranking">
<div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
CI Ranking
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/wallet">
<div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
Wallet
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/project_insights">
<div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
Project Insights
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/profile_enhancement">
<div class="sb-nav-link-icon"><i class="fas fa-file-word"></i></div>
Profile enhancement
</a>
<a class="nav-link " href="<?php echo base_url(); ?>aspirant/schedule_manager" >
<div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
Schedule Manager
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/training_hub">
<div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
Training Hub
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/portfolio_builder">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Portfolio Builder
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/legal_helpdesk">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Legal Helpdesk
</a>

<a class="nav-link"  href="<?php echo base_url(); ?>aspirant/ask_the_recruiter">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Ask the Recruiter
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/IPR_helpdesk">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
IPR Helpdesk
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/PR_assistance">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
PR Assistance
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/artist_management">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Artist Management
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/personal_assistant">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Personal Assistant
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/pay_pro_tech">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Pay Pro-Tech
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/CI_suggestions">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
CI Suggestions
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/priority_club">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Priority Club
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/employer_access">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Employer Access
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/mentor_interactions">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Mentor Interactions
</a>

<a class="nav-link" href="<?php echo base_url(); ?>aspirant/premium_learning_modules">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Premium Learning Modules
</a>


<!-- 
<a class="nav-link <?php if(($pagename=='aspcat')||($pagename=='aspform')||($pagename=='aspprofile')||($pagename=='aspsubform')||($pagename=='aspprofileform') ){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayouts" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i> </div>Aspirant Profile

<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='aspcat')||($pagename=='aspform') ||($pagename=='aspsubcat')||($pagename=='aspsubform')||($pagename=='aspprofile')||($pagename=='aspprofileform')){echo "show";}else{ echo "";} ?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="<?php echo base_url(); ?>admin/aspcat"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Category List</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/aspsubcat"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Sub Category List</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/aspprofile"><div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div> Profile List</a>
</nav>
</div> -->



<!-- 
<a class="nav-link" href="<?php echo base_url(); ?>admin/slider">
<div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
Slider
</a> -->

<!-- <a class="nav-link" href="<?php echo base_url();?>admin/applicant_list">
<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
Applicants List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/contact_us">
<div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
Contact Us List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/super_model">
<div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
Super Model
</a> -->



<a class="nav-link" href="<?php echo base_url(); ?>aspirant/logout">
<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
Logout
</a>
</div>
</div>
<!-- <div class="sb-sidenav-footer">

</div> -->
</nav>