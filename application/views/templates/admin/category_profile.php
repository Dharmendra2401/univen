<?php $this->load->view('/common/header'); ?>
<div class="banner-category" style="background: url(<?php echo base_url();?>uploads/profilenarration/<?php echo $profile['Long_Image']; ?>);background-repeat: no-repeat;">
	<a href="<?php echo base_url();?>registration" class="btn-join">Join us</a>
	<div class="row tab-container">
		<div class="col-md-10 col-md-offset-1 wrapper">
			<ul class="nav nav-tabs">
			    <li class="active"><a href="#overview">Overview</a></li>
			    <li><a href="#become">How to Become</a></li>
			    <li><a href="#qualification">Qualifications</a></li>
			    <li><a href="#position">Positions and Responsibilities</a></li>
			</ul>
	    </div>
	</div>
</div>
<div class="row cate-profile">
    <div class="col-md-10 col-md-offset-1">
    	<div id="overview">
	        <h4 class="title f20">Overview</h4>
	    	<div>
			<?php echo $profile['Overview'];?>
        </div>

        <div id="become">
	    	 <h4 class="title f20">How to become?</h4>
	    	<?php echo $profile['How_To_Become'];?>
	    	</div>
	    </div> 	
		
    </div> 
	
</div>
<div class="profile-bnr-btm">
	<img class="bnr-btm" src="<?php echo base_url();?>/images/category/opportunity.png">
<div class="wrapper">
	<span>Opportunities just one click away.</span>
	<a href="<?php echo base_url();?>registration">Click here</a>
</div>
</div>
<div class="row cate-profile">
    <div class="col-md-10 col-md-offset-1">
    	<div id="qualification">
	    	<h4>Qualification</h4>
	    	<div>
			<?php echo $profile['Qualifications'];?>
	    	</div>
    	</div>

    	<div id="position">
	    	<h4>Positions and Responsibilities</h4>
			<?php echo $profile['Positions_and_Responsibilities'];?>
        </div>
    	<h4 class="title">Explore Related Profiles</h4>
    	<div class="owl-profile owl-carousel">
		        <?php foreach($getallpro as $getpro){?>
		        <div class="item">
		        	<div class="img-container">
		        		<img src="<?php echo base_url();?>/uploads/profilenarration/<?php echo $getpro['Short_Image'];?>">
			        	<div class="img-txt-wrapper">
						<span class="img-txt"><?php echo $getpro['PROFILE_NAME']; ?> </span>
						</div>
		        	</div>
		        </div>
				<?php } ?>
		
          </div>
    </div>
</div>
<div class="profile-bnr-btm1">
	<img class="bnr-btm" src="<?php echo base_url();?>/images/category/banner-stage.png">
<div>
	<span>It's time to take the centre stage.</span>
	<a href="#">Enroll yourself</a>
</div>
</div>
<?php $this->load->view('/common/footer'); ?>
<script>
$(document).ready(function(){
$('.owl-profile').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


  $('.nav li').on('click', function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

});
</script>