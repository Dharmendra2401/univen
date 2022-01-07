<?php 
$getadmin=$this->session->userdata('aspirant'); 
$sql="select * from applicant_recruiter where USER_ID='".$getadmin['USER_ID']."'";
$query = $this->db->query($sql)->row_array();

?>
<nav class="sb-topnav navbar navbar-expand navbar-dark shadow">


<!-- Navbar Search-->
<div class="row ml-0">
<div class="col-md-5 text-center pl-4">

<div class="form-group position-relative">
<input type="search" id="form1" class="form-control search" placeholder="Search Jobs by Skills, Designation, Companies" width="90%;"/>
<span>
<button type="button" class="btn btn-primary search-button">
<i class="fas fa-search"></i>
</button>
</span>
</div>
</div>

<div class="col-md-3 text-center">
<div class="custom-control custom-switch mt-2">
<strong class="name">Aspirant</strong>
<input type="checkbox" class="custom-control-input" id="switch1" >
<label class="custom-control-label name-grey" style="margin-left:50px" for="switch1">Employer</label>
</div>
</div>
<div class="col-md-4">
<ul class="navbar-nav float-right nav-margin-right">
<li><img src="<?php echo base_url()?>images/rank.png" alt="rank"></li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

<!-- <a class="dropdown-item" href="<?php echo base_url()?>admin/profile"><i class="far fa-id-cog"></i> Profile </a> -->
<a class="dropdown-item" href="<?php echo base_url();?>aspirant/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>


</div>


</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>
<!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

<a class="dropdown-item <?php if($pagename=='profile'){echo'active';} ?>" href="<?php echo base_url()?>admin/profile"><i class="far fa-id-badge"></i> Profile Update</a>
<a class="dropdown-item" href="<?php echo base_url();?>aspirant/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>


</div> -->


</li>
<li>
<?php if($query['Profile_Pic']==''){?><img src="<?php echo base_url();?>/img/footer.png" class="profile-image"/><?php } else{?> <img src="<?php echo base_url();?>/uploads/profile/<?php echo $query['Profile_Pic']; ?>" class="profile-image"/>  <?php } ?> <?php echo ucwords($query['First_Name'].' '.$query['Last_Name']); ?>
</li>

</ul>

</div>

</div>


<!-- Navbar-->
</nav>