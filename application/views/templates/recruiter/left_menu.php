

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<div class="text-center admin-pic">
<img src="<?php echo base_url(); ?>img/default.png" alt="default.jpg" style="width: 60px;">
<div class="sb-sidenav-menu-heading"><span class="bg-warning bg-admin">Recruiter</span></div>
</div>

<a class="nav-link" href="<?php echo base_url(); ?>recruiter">
<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
Dashboard
</a>


<a class="nav-link" href="<?php echo base_url(); ?>recruiter/job_list">
<div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
Jobs List
</a>

<a class="nav-link" href="<?php echo base_url(); ?>recruiter/search_talent">
<div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
Search Talent
</a>


<a class="nav-link <?php if(($pagename=='add_events')||($pagename=='view_events')||($pagename=='detail_events')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayoutstwo" <?php if(($pagename=='recuiter_list')||($pagename=='add_events') ){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
Events
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='events')||($pagename=='add_events') ||($pagename=='detail_events')){echo "show";}else{ echo "";} ?>" id="collapseLayoutstwo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link <?php if(($pagename=='add_events')){echo "active";}?>" href="<?php echo base_url(); ?>recruiter/add_events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div> Add Event</a>
<a class="nav-link <?php if(($pagename=='view_events') ||($pagename=='detail_events')){echo "active";}?>" href="<?php echo base_url(); ?>recruiter/view_events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div> Events List</a>
</nav>
</div>

<a class="nav-link" href="<?php echo base_url(); ?>recruiter/logout">
<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
Logout
</a>
</div>
</div>
<div class="sb-sidenav-footer">

</div>
</nav>