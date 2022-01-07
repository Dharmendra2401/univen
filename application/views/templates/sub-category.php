<?php $this->load->view('/common/header'); ?>
<div class="banner-category" style="background: url(<?php echo base_url();?>uploads/subcategorynarration/<?php echo $subdetail['Long_Image']; ?>);background-repeat: no-repeat;">
	<a href="<?php echo base_url();?>registration" class="btn-join">Join us</a>
</div>
<div class="row sub-category">
    <div class="col-md-10 col-md-offset-1">
    	<h4 class="desc-title">STORY DEVELOPMENT</h4>
    	<div class="description-txt">
    	<?php echo $subdetail['Overview'];?>
    	</div>
        <?php foreach($profdetail as $pro){ $getpro=str_replace(' ', '_',$pro['PROFILE_NAME']); $getcatname=str_replace(' ', '_',$subdetail['Category_Name']); $subcatname=str_replace(' ', '_',$subdetail['Sub_Category_Name']);?>
    	<div class="profile-container">
    		<img src="<?php echo base_url();?>/uploads/profilenarration/<?php echo $pro['Long_Image'];?>">
    		<span class="profile-title"><?php echo $pro['PROFILE_NAME']; ?></span>
    		<a href="<?php echo base_url();?>category/<?php echo $getcatname; ?>/<?php echo $subcatname; ?>/<?php echo $getpro; ?>">View more &nbsp;<i class="fas fa-arrow-right"></i></a>
    	</div>
		<?php } ?>
    	
    	

	</div>
</div>

<div class="sub-cate-bnr-btm">
	<img class="bnr-btm" src="<?php echo base_url();?>/images/category/banner-btm.png">
<div>
	<span>Destination is yet to come, Start now.</span>
	<a href="#">Click here</a>
</div>
</div>

<?php $this->load->view('/common/footer'); ?>