<?php $page='Events'; $banner=$admin['banner_event'] ;?>
<?php $this->load->view('/common/header'); ?>
<style>
.pick_mind{
	text-align:center;
	padding-top:4em;
	padding-bottom:1em;
}
.switch_bt{
	width:150px;
	height:35px;
	background:#fff;
	border:1px solid #555;
}
.font_ST{
	font-family: fontStyle1;
	font-size: 40px;
	padding-top:10px;
}
.category_st{
    border: 1px solid #c0c0c0;
    padding: 4px 10px;
    border-radius: 20px;
    margin: 5px 0 0px 0;
    display: inline-block;
}
.bg_cont{
    background: #f9f9f9;
    padding-bottom: 10px;
    margin-bottom: 30px;
    height: 160px;
    overflow-y: auto;
}
.btn_cuatro {
    transition: all .5s ease;
    padding: 7px;
    background: rgba(204,51,51,.8);
    color: #fff;
    font-size: 11px;
    bottom: 12px;
    width: auto;
    left: 16px;
    display: inline-block;
    margin: 10px 0 0 5px;
}
.btn_cuatro:hover {
    background: #c33;
    color:#fff;
    text-decoration:none;
}
.text_small11{
	font-size:10px;
	font-weight:normal;
}
.text_heading11{
	position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    padding: 15px;
    color: #fff;
}
.img_overflow {
    position: relative;
    max-width: 100%;
    height: 150px;
    overflow: hidden;
}
.date_display {
    bottom: 10px;
    position: absolute;
    border: 1px solid #c0c0c0;
    padding: 4px 10px;
    border-radius: 20px;
}
.filter-button{
    margin-right: 5px;
    margin-bottom: 15px;
    color: #666;
    border: 1px solid #D9D9D9;
    background: #D9D9D9;
    border-radius: 20px;
    padding: 7px 10px;
    text-align: center;
    font-size: 11px;
    display: inline-block;
    text-transform: uppercase;
    cursor: pointer;
}
.filter-button:focus{
    outline:none;
}

.active111
{
    background: #c33!important;
    color: white;
}
.active11
{
    background: #c33!important;
    color: white;
}

</style>

<?php include 'bedcrumb.php';?>
<?php print_r($gettype);?>
<div class="col-sm-12 pick_mind">
<?php $itype=1; foreach($gettype as $type){?>
	<button class="filter-buttonet switch_bt <?php echo $type['id'];?> <?php if($itype==1){ echo 'active11';} ?>" data-filter="<?php echo $type['id'];?>" onclick="event_type_function('<?php echo $type['id'];?>')"><?php echo $type['name'];?></button>
<?php $itype++;} ?>
</div>

<div class="container">
        <div class="row">
		<div align="center" class="">
			            <button class="filter-button all active111" data-filter="all">All</button>
						<button class="filter-button filteret et2  et2 " data-filter="9" data-filteret="2">Film Festivals</button>
						<button class="filter-button filteret et3  et3 " data-filter="3" data-filteret="3">Movies</button>
				            <!--<button class="filter-button" data-filter="sprinkle">Sprinkle Pipes</button>
            <button class="filter-button" data-filter="spray">Spray Nozzle</button>
            <button class="filter-button" data-filter="irrigation">Irrigation Pipes</button>-->
		</div> 
        <br/>

		<div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter 9_et2 et2" id="9">
				<div class="img_overflow">
					<img src="<?php echo base_url(); ?>images/events/59b77f5aa35a7408.jpg" class="img-responsive">
					<div class="text_heading11"> 
						<h4>Tag a friend</h4>
													<!--<h4>Rs. 700<br/><span class="text_small11">Onwards<span></h4>-->
							
												<p class="date_display">Oct 20 2017 
													- Oct 27 2017</p><p>
											</p></div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4 title="Impact A 2 Min Shortfilm Festival">Impact A 2 Min Shortfilm F...</h4>
					<!--<p>Impact A 2 Min Shortfilm Festival</p>-->
												<span class="category_st" title="Film Festivals">Film Festivals</span>
																	<br>
                                        <a class="btn_cuatro" href="<?php echo base_url().'home/eventsdetail';?>">Book Now</a>
				</div>
			</div>
			
			<div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter 9_et3 et3" id="3">
				<div class="img_overflow">
					<img src="<?php echo base_url(); ?>images/events/59b77f5aa35a7408.jpg" class="img-responsive">
					<div class="text_heading11"> 
						<h4>Tag a friend</h4>
													<!--<h4>Rs. 700<br/><span class="text_small11">Onwards<span></h4>-->
							
												<p class="date_display">Oct 20 2017 
													- Oct 27 2017</p><p>
											</p></div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4 title="Impact A 2 Min Shortfilm Festival">Impact A 2 Min Shortfilm F...</h4>
					<!--<p>Impact A 2 Min Shortfilm Festival</p>-->
												<span class="category_st" title="Film Festivals">Film Festivals</span>
																	<br>
                                        <a class="btn_cuatro" href="<?php echo base_url().'home/eventsdetail';?>">Book Now</a>
				</div>
            </div>
            <!--<div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter sprinkle">
				<div class="img_overflow">
					<img src="images/events/ET00054098.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter hdpe">
                <div class="img_overflow">
					<img src="images/events/ET00047257.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter irrigation">
                <div class="img_overflow">
					<img src="images/events/ET00014607.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>
			
			<div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter hdpe">
                <div class="img_overflow">
					<img src="images/events/ET00058658.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter sprinkle">
                <div class="img_overflow">
					<img src="images/events/ET00054098.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter hdpe">
                <div class="img_overflow">
					<img src="images/events/ET00047257.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter irrigation">
                <div class="img_overflow">
					<img src="images/events/ET00014607.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>
			
			
            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter hdpe">
                <div class="img_overflow">
					<img src="images/events/ET00047257.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter irrigation">
                <div class="img_overflow">
					<img src="images/events/ET00014607.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>
			<div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter hdpe">
                <div class="img_overflow">
					<img src="images/events/ET00058658.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>

            <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter sprinkle">
                <div class="img_overflow">
					<img src="images/events/ET00054098.jpg" class="img-responsive">
					<div class="text_heading11">
						<h4>Rs. 999<br/><span class="text_small11">Onwards<span></h4>
						<p class="date_display">Jul 25 2017 - Aug 14 2017<p>
					</div>
				</div>
				<div class="col-md-12 bg_cont">
					<h4>Imagica Theme Park</h4>
					<p>Imagica Theme Park</p>
					<span class="category_st">Adventure</span>
					<span class="category_st">Park</span>
					<a class="btn_cuatro" href="http://castindia.in/events/details">Buy Tickets</a>
				</div>
            </div>-->
			
        </div>
    </div>
</section>
<script>

	var event_type_id = "";
	
	//This code for facebook
	 window.fbAsyncInit = function() {
    FB.init({
      appId      : '908019722670466',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

      logInWithFacebook = function(event_id,event_image)
    {
		
		/*
       FB.login(function (response) {
           if (response.status === 'connected') {
               FB.api('/me', { fields: 'last_name,first_name' }, function (response) {
                   alert("Successfully logged into facebook. Welcome " + response.first_name + " " + response.last_name);
                   // Show loader
                   login();
               });
           } else {
               alert("Facebook authentication failed.");
           }
       });*/
	   FB.ui({
    method: 'feed',
    // mobile_iframe: true,
	picture: '<?php echo base_url();; ?>/images/events/'+event_image,
	name:'nn',
	caption:'nn',
    link: '<?php echo base_url();; ?>/events/details?code='+event_id,
  }, function(response){});
    }
	
	//This function for calling function on event type
	function event_type_function(id)
	{
		event_type_id = id;
		$(".active11").removeClass("active11");
		$("."+id).addClass("active11");
		$(".active111").removeClass("active111");
		$(".all").addClass("active111");
	}
$(document).ready(function(){
	
    $(".filter-button").click(function(){
		$(".active111").removeClass("active111");
		$(this).addClass("active111");
        var value = $(this).attr('data-filter');
        var valueet = $(this).attr('data-filteret');

        filterdata(value,valueet)
        
    });
    
	
	var codedata = '';
	if(codedata != "")
	{
		//filterdata(codedata);
	}
	 
	function filterdata(value,valueet)
	{
		console.log(event_type_id+"---"+value+'---et'+event_type_id);
	
		if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            //$('.filter').show('1000');
			$(".filter").not('.et'+event_type_id).hide('1000');
            $('.filter').filter('.et'+event_type_id).show('1000');
            
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value+'_et'+event_type_id).hide('3000');
            $('.filter').filter('.'+value+'_et'+event_type_id).show('3000');
            
        }
	}
	
	 $(".filter-buttonet").click(function(){
		$(".active11").removeClass("active11");
		$(this).addClass("active11");
        var value = $(this).attr('data-filter');
		console.log(value);
        filterdataet(value)
        
    });
	
	function filterdataet(value)
	{
		if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.et'+value).hide('3000');
            $('.filter').filter('.et'+value).show('3000');
			$(".filteret").not('.et'+value).hide('3000');
            $('.filteret').filter('.et'+value).show('3000');
            
        }
	}
	
	
	
   // if ($(".filter-button").removeClass("active")) {
//$(this).removeClass("active");
//}
//$(this).addClass("active");

});





var affixElement = '#navbar-main';

$(affixElement).affix({
  offset: {
    // Distance of between element and top page
    top: function () {
      return (this.top = $(affixElement).offset().top)
    }
  }
});
</script>
<?php $this->load->view('/common/footer'); ?>  
  
  
  
  
  
  
  
  
  
  