<?php $this->load->view('/common/header');?>
<div class="banner-category" style="background: url(<?php echo base_url();?>uploads/banner/<?php echo $admin['banner_category']; ?>);background-repeat: no-repeat;">
	<a href="<?php echo base_url();?>registration" class="btn-join">Join us</a>
</div>
<div class="row category">
<div class="col-md-10 col-md-offset-1">
	<div class="profile-container">
		<?php  foreach($allprofiles as $profiles){  
			$getpro=str_replace(' ', '_',$profiles['PROFILE_NAME']);
			$getsubcat=str_replace(' ', '_',$profiles['Sub_Category_Name']);
			$getcat=str_replace(' ', '_',$profiles['Category_Name']);
			
			?>
		
			<a href="<?php echo base_url().'category/'.$getcat.'/'.$getsubcat.'/'.$getpro; ?>" class="profile"><?php echo $profiles['PROFILE_NAME']; ?></a>
		<?php  }?>
	</div>
<?php $i=1; foreach($getcats as $getcat){  $getcatname=str_replace(' ', '_',$getcat['Category_Name']);?>
	<section>
      <h3 class="heading-title"><span style="text-transform: capitalize;"><?php echo $getcat['Category_Name'];?></span></h3>
      <div class="row">
        <div class="col-md-12">
          <div class="owl-<?php echo $i; ?> owl-carousel">
		  <?php foreach($getnarrations as $narration){ if($getcat['Category_ID']==$narration['Category_ID']){  $getsubid=str_replace(' ', '_',$narration['Sub_Category_Name']);?>
		        <div class="item">
		        	<a href="<?php echo base_url();?>category/<?php echo $getcatname; ?>/<?php echo $getsubid; ?>">
		        	<div class="img-container">
		        		<img src="<?php echo base_url();?>/uploads/subcategorynarration/<?php echo $narration['Short_Image']; ?>">
			        	<div class="img-txt-wrapper">
						<span class="img-txt"><?php echo $narration['Sub_Category_Name'];?></span>
						</div>
		        	</div>
		        	</a>
		        </div>
		    <?php } } ?>  
          </div>
        </div>
      </div>
    </section>
	
	<?php } ?>

	<?php if($getaprocount==0){ ?> 
<div class="alert alert-danger" role="alert">
  Sorry! No records found.
</div>
<?php } ?>
</div>

</div>

<?php $this->load->view('/common/footer'); ?>
<script>
<?php $i=1; foreach($getcats as $getcat){?>
$('document').ready(function(){
$('.owl-<?php echo $i;?>').owlCarousel({
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
})
<?php  }  ?>
$('document').ready(function(){
$('.owl-advertise').owlCarousel({
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

$('.owl-art').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

$('.owl-marketing').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
})

$('.owl-theatre').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('.owl-photography').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('.owl-sales').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

$('.owl-digital').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('.owl-pr').owlCarousel({
    loop:false,
    nav:true,
    margin:10,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

});
</script>