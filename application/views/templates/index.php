
<?php $this->load->view('/common/header'); ?>


<div class="clearfix"></div>
<section class="fullsize-video-bg">
	<div class="inner container">
	
	<div class="col-md-offset-2 col-md-10">
	 <h1 class="bg_heading"><?php echo $getvedio['title'] ;?></h1>
	 <p class="bg_des text-white"><?php echo $getvedio['content'] ;?></p><br>
	 <div class="col-md-6 somi">
	 <div class="row">
	 <?php echo $tab; ?>
				<div class="col-sm-4 col-md-4 col-xs-6" >
					<a href="<?php echo base_url();?>login?tab=employer" class="btn btn-primary d-inline-block d-sm-block">Finders</a>
					<!-- <br><small class="d-block mt-1 hero-text text-white">I need to hire</small> -->
				</div>
				<div class="col-sm-4 col-md-4 col-xs-6">
					<a href="<?php echo base_url();?>login?tab=aspirant" class="btn btn-primary d-inline-block d-sm-block">Seekers</a>
					<!-- <br><small class="d-block mt-1 hero-text text-white">I want to get hired</small> -->
				</div>
			</div>
		</div>
	</div>
	</div>
	<div id="video-viewport" >
		<video width="1920" height="454" autoplay="" muted="" loop="" >
			<source src="https://www.castindia.in/images/CastIndiavideo.mp4" type="video/mp4">
			<!--source src="http://www.coverr.co/s3/mp4/Winter-Grass.webm" type="video/webm" /-->
		</video>
	</div>
</section>

<div class="clearfix"></div>
<!--Setps Hired & Hire-->
<section class="container section-padding">
	<div class="row">
	<div class="col-md-12">
		<div class="box-shadow">
    <ul class="nav nav-tabs border-none">
    <li class="steps active"><a data-toggle="tab" href="#menu2" class="active show"><h3 class="text-secondary"><b>3 Steps to get hired</h3></b></a></li>
    <li class="steps"><a data-toggle="tab" href="#menu1"><h3 class="text-secondary"><b>3 Steps to hire</h3></b></a></li>
    </ul>

  <div class="tab-content ">
    <div id="menu2" class="tab-pane active">
	  <br>
      <h3 class="heading"><?php echo $get_hired_hire[1]['content'];?></h3>
	  <br>
	  <ul class="row step-count">
		  <li><span> <img src="<?php echo base_url();?>/img/6.png"></span><div><h3><?php echo $get_hired_hire[1]['step_one_title'];?></h3> <p><?php echo $get_hired_hire[1]['step_one_content'];?></p></div></li>
		  <li><span><img src="<?php echo base_url();?>/img/5.png"></span><div><h3><?php echo $get_hired_hire[1]['step_two_title'];?></h3> <p><?php echo $get_hired_hire[1]['step_two_content'];?></p></div></li>
		  <li><span><img src="<?php echo base_url();?>/img/4.png"></span><div><h3><?php echo $get_hired_hire[1]['step_three_title'];?></h3> <p><?php echo $get_hired_hire[1]['step_three_content'];?></p></div></li>
		  <li class="getbutton">  <a href="<?php echo base_url().'registration?tabs=aspirant'?>" class="btn btn-primary d-inline-block d-sm-block">Get Started</a></li>
	  </ul>
	  
    </div>
    <div id="menu1" class="tab-pane">
	  <br>
      <h3 class="heading"><?php echo $get_hired_hire[0]['content'];?></h3>
	  <br>
	  <ul class="row step-count">
		  <li ><span><img src="<?php echo base_url();?>/img/1.png"></span><div><h3><?php echo $get_hired_hire[0]['step_one_title'];?></h3> <p><?php echo $get_hired_hire[0]['step_one_content'];?></p></div></li>
		  <li ><span><img src="<?php echo base_url();?>/img/7.png" ></span><div><h3><?php echo $get_hired_hire[0]['step_two_title'];?></h3> <p><?php echo $get_hired_hire[0]['step_two_content'];?></p></div></li>
		  <li ><span><img src="<?php echo base_url();?>/img/9.png" ></span><div><h3><?php echo $get_hired_hire[0]['step_three_title'];?></h3> <p><?php echo $get_hired_hire[0]['step_three_content'];?></p></div></li>
		  <li class="getbutton">  <a href="<?php echo base_url().'registration?tabs=employer'?>" class="btn btn-primary d-inline-block d-sm-block">Get Started</a></li>
	  </ul>
    </div>
</div>
  </div>
</div>
</div>

</div>
</section>


<div class="clearfix"></div>
<!--Network-->
<section class="position-relative">
<img  src="<?php echo base_url().'uploads/banner/'.$banner['banner_about'];?>" width="100%">
<div class="container">
<div class="text-center">
<h2 class="text-center text-white network"><b>NETWORK</b></h2>
</div>

</div>
</section>

<!--Recent Employers-->
<div class="clearfix"></div>
<section class="container section-padding">
<div class="">
<h2 class="heading-title text-center"><strong>Recent Employers</strong></h2>
      <div class="row">
        <div class="large-12 columns">
		
          <div class="owl-carouselone owl-carousel">
		  <?php foreach($alllogo as $getlogo) {?>
            <div class="item text-center">
			<a href="<?php if($getlogo['url']==''){echo "#";}else{echo $getlogo['url'];};?>"><img src="<?php echo base_url();?>uploads/emp/<?php echo $getlogo['logo'];?>" ></a>	
          </div>
		  <?php  }?>
        </div>


      </div>
    </div>
</section>



<!--Training-->
<section class="position-relative">
<img src="<?php echo base_url().'uploads/banner/'.$banner['banner_trainer'];?>" width="100%">
<div class="container">
<div class="position-absolute training">
<h2 class="text-white"><b>Training Benefits</b></h2>
</div>
<div class="position-absolute joinbutton">
<a href="<?php echo base_url();?>registration" class="btn btn-primary d-inline-block d-sm-block">Join us</a>
</div>
</div>
</section>


<!--FAQ-->
<section class="position-relative section-padding">
<div class="col-md-12 text-center"><h2 class="heading-title"><strong>Frequently Ask Questions</strong></h2><br>
<br></div>

<div class="container">
<div class="row">
<div class="col-md-7">
<div class="panel-group" id="faqAccordion">
	<?php $count=0; foreach($getfaq as $faqs){?>
        <div class="panel">
            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?php echo $count; ?>">
                 <h4 class="panel-title faq">
                    <a class="ing"><?php echo $faqs['question'];?></a>
                </h4>
			</div>
            <div id="question<?php echo $count; ?>" class="panel-collapse collapse" >
                <div class="panel-body">
					 <?php echo $faqs['answer'];?>
                </div>
            </div>
        </div>
		<?php $count++; } ?> 
        
    </div>
    
</div>

<div class="col-md-5" id="form-qestion">
<div class="text-center ques-image">
<img src="<?php echo base_url();?>img/question.png">
</div>
<div class="text-center">
<h3 class="question-text"><strong>Any Questions?</strong></h3>
<p>You can ask anything that you want to know.</p>
</div>

<div class="row">
<div class="col-md-12"><?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?></div>
<form class="form-qestion"  method="post" action="<?php echo base_url();?>home/quessend" autocomplete="off">
<div class="form popupmodal">
<div class="col-md-12 text-center">
<label class="text-center">Let me know</label>
</div>
<div class="col-md-12 form-group">
<label class="form-label heading-title" for="first">Name</label>
<input type="text" class="form-input form-control" onkeypress="return isString(event)" maxlength="50" id="quesfullname" name="quesfullname">
</div>


<div class="col-md-12 form-group">
<label class="form-label heading-title" for="email">Email</label>
<input type="email" class="form-input form-control"  maxlength="150" id="quesemail" name="quesemail">
</div>

<div class="col-md-12 form-group">
<label class="form-label heading-title" for="address">Question</label>
<textarea type="text" class="form-input form-control"  maxlength="200" col="4" rows="4" id="quesaddress" name="quesaddress"></textarea>
</div>

</div>
<div class="col-md-12 form-group text-center">
<button type="submit" value="quessend" name="quessend" id="quessend" class="btn btn-primary d-inline-block d-sm-block" disabled>Send</button>
</div>
</div>

</div>
</div>
</form>
</section>

<!--All users-->
<section class="container hideusers">
<div class="row">

<?php foreach($getalluser as $allusers){?>
<div class="col-md-3 col-sm-3 col-xs-6">
<div class="user-top <?php if($allusers['id']=='1'){echo 'asp';}elseif($allusers['id']=='2'){echo "emp";} elseif($allusers['id']=='3'){echo "train";}else{echo "mer";}?>">
<img src="<?php echo base_url();?>uploads/user/<?php echo $allusers['image'];?>" width="100%"/>
<div class="user-shadow">
<h4 class="text-center title-user text-white"><?php if($allusers['id']=='1'){echo 'Aspirant';}elseif($allusers['id']=='2'){echo "Employer";} elseif($allusers['id']=='3'){echo "Trainer";}else{echo "Merchant";}?></h4>

</div>
</div>
</div>
<?php }?>

</div>
</section>

<!--All users details-->
<section class="container alluserdetails" style="display:none;">
<div class="row">
<div class="col-md-12">
<ul class="ulcal">
	<?php  $userid=1;foreach($getalluser as $tabuser){?>
  <li class="active"  id="<?php if($tabuser['id']=='1'){echo 'asp';}elseif($tabuser['id']=='2'){echo "emp";} elseif($tabuser['id']=='3'){echo "train";}else{echo "mer";}?>">
    <div class="section-title">
      <h2><?php if($tabuser['id']=='1'){echo 'Aspirant';}elseif($tabuser['id']=='2'){echo "Employer";} elseif($tabuser['id']=='3'){echo "Trainer";}else{echo "Merchant";}?></h2>
    </div>
    <div class="section-content">
	
	<img src="<?php echo base_url();?>uploads/user/<?php echo $tabuser['image'];?>"/>
      <p>
		  <h2><?php if($tabuser['id']=='1'){echo 'Aspirant';}elseif($tabuser['id']=='2'){echo "Employer";} elseif($tabuser['id']=='3'){echo "Trainer";}else{echo "Merchant";}?></h2>
		 <?php echo $tabuser['content']; ?>
		</p>
    </div>
  </li>
  <?php } ?>
   
</ul>
</div>
</div>
</div>
</div>
</section>

<!--Testimonials-->
<section class="container section-padding">
<div class="box-shadowssss">
	
      <div class="row">
		  <div class="col-md-4">
		  <h2 class="heading-title"><strong>What others say<br> about us</strong></h2>
	    </div>
        <div class="col-md-8  large-12 columns">
          <!-- <h3>Demo</h3> -->
          <div class="owlbutton owl-carousel">
		  <?php foreach($gettest as $gettesti){?>
            <div class="item text-center">
			   <img src="<?php echo base_url().'uploads/testimonials/'.$gettesti['image'];?>" width="89px" height="89px">
			   <h2><i class="fas fa-quote-left"></i></h2>
              <h3><?php echo $gettesti['fullname'];?></h3>
			  <h4><?php echo $gettesti['position'];?></h4><br>
			  <p><?php echo $gettesti['content']; ?></p>
			  <hr>
            </div>
			<?php  }?>
           	
          </div>
        </div>


      </div>
    </div>
</section>

<?php $this->load->view('/common/footer'); ?>
<script>
$(document).ready(function(){
  $('.owlbutton').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:2
        }
    }
})
$('.owl-carouselone').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
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
});



</script>
<script>
$('.emp').click(function(){
	$('#emp').addClass('active');
	$('#asp').removeClass('active');
	$('#train').removeClass('active');
	$('#mer').removeClass('active');
	$('.hideusers').hide();
	$('.alluserdetails').show();
})
$('.asp').click(function(){
	$('#emp').removeClass('active');
	$('#asp').addClass('active');
	$('#train').removeClass('active');
	$('#mer').removeClass('active');
	$('.hideusers').hide();
	$('.alluserdetails').show();
})
$('.train').click(function(){
	$('#emp').removeClass('active');
	$('#asp').removeClass('active');
	$('#train').addClass('active');
	$('#mer').removeClass('active');
	$('.hideusers').hide();
	$('.alluserdetails').show();
})
$('.mer').click(function(){
	$('#emp').removeClass('active');
	$('#asp').removeClass('active');
	$('#train').removeClass('active');
	$('#mer').addClass('active');
	$('.hideusers').hide();
	$('.alluserdetails').show();
})

$('.form-qestion').keyup(function(){
	var quesfullname=$('input[name=quesfullname]').val();
	var quesemail=$('input[name=quesemail]').val();
	var quesaddress=$('textarea[name=quesaddress]').val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if((quesfullname=='')||(quesemail=='')||(!testEmail.test(quesemail))||(quesaddress=='')){
		$('#quessend').attr('disabled',true);
	}else{
		$('#quessend').attr('disabled',false);
	}

})

</script>