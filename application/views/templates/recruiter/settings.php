<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
<a class="navbar-brand text-center" href="<?php echo base_url();?>recruiter"><img src="<?php echo base_url();?>images/logo.png" class="logo_img" style="width: 63px;"></a>
<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
<!-- Navbar Search-->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 w-100">
<h5 class="text-white text-center text-capitalize">Welcome: <span class="text-warning" id="recfullname"></span> <span class="text-warning" id="reclastname"> </span> as <span class="text-white bg-success btn-sm">Recruiter</span><br> </h5>
</form>
<!-- Navbar-->
<ul class="navbar-nav ml-auto ml-md-0">
<li class="nav-item dropdown">
<span id="notifications"></span>


</li>
<li class="nav-item dropdown">

</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw "></i></a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

<a class="dropdown-item <?php if($pagename=='profile'){echo'active';} ?>" href="<?php echo base_url()?>recruiter/profile"><i class="far fa-id-badge text-warning"></i> Profile Update</a>
<a class="dropdown-item" href="#" data-toggle="modal" data-target="#settings"><i class="fas fa-cog fa-fw text-warning"></i> Profile Setings</a>
<a class="dropdown-item" href="<?php echo base_url();?>recruiter/logout"><i class="fas fa-sign-out-alt text-warning"></i> Logout</a>


</div>
</li>
</ul>
</nav>


<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="settings" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-info text-white">
<h5 class="modal-title" id="">Profile Settings</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
<div class="row">
<div class="col-md-2">
<label class="switch">
<input type="checkbox" name="emailsendtorec"  value="Y" onclick="return settings();" >
<span class="slider round"></span>
</label>
</div>
<div class="col-md-10 form-group">
Send new message alerts on my email
</div>

<div class="col-md-2">
<label class="switch">
<input type="checkbox" name="statisticssettings" value="Y" onclick="return settings();" >
<span class="slider round"></span>
</label>
</div>
<div class="col-md-10 form-group">
Send me my Account weekly statistics
</div>

<div class="col-md-2">
<label class="switch">
<input type="checkbox" name="profilesettings" value="Y" onclick="return settings();" >
<span class="slider round"></span>
</label>
</div>
<div class="col-md-10 form-group">
Show contact form on my profile
</div>


<div class="col-md-2">
<label class="switch">
<input type="checkbox" name="jobssettings" value="Y" onclick="return settings();" >
<span class="slider round"></span>
</label>
</div>
<div class="col-md-10 form-group">
Send email if any one applied on my jobs.
</div>
</div>
<span class="messagesettings"></span>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>