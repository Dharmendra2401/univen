<!-- contact -->
<?php $pagename= end($this->uri->segment_array()); if(($pagename!='aspmobile')&& ($pagename!='empmobile')){?>
<div id="contact" class="contact">
    <div class="container">
        <div class="contact-grids text-center">
            <div class="col-md-4 col-sm-6 col-xs-12 contact-grid">
                <h2><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/img/footer.png"
                            class="logo_img_footer"></a></h2>
                <p class="text-white launch">Launching India's Finest</p>
                <h2 class="text-white"><span>Contact</span></h2>
                <hr>
                <div class="row address-location">
                    <div class="col-md-6">
                        <h4 class="text-white text-capitalize"><?php echo $admin['cityone'];?>:</h4>
                        <p class="text-white"><?php echo $admin['addressone'];?></p>
                        <h5 class="text-white"><i class="fas fa-mobile-alt"></i> <a
                                href="tel:<?php echo $admin['mobile'];?>"><?php echo $admin['mobile'];?></a></h5>

                        <h5></h5>
                    </div>
                    <div class="col-md-6 ">
                        <h4 class="text-white text-capitalize"><?php echo $admin['citytwo'];?>:</h4>
                        <p class="text-white"><?php echo $admin['addresstwo'];?></p>
                        <h5 class="text-white"><i class="fas fa-envelope"></i> <a
                                href="mailto:<?php echo $admin['s_email'];?>"><?php echo $admin['s_email'];?></a></h5>

                    </div>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
                <h4 class="text-white">Interact</h4></span>
                <span><a href="<?php echo base_url('home/aboutus')?>">The Clique</a></span>
                <span><a href="<?php echo base_url('home/our_team')?>">CI Squad</a></span>
                <span><a href="<?php echo base_url('home/life_at_ci')?>">Life at CI</a></span>
                <span><a href="#">Cover, uncover</a></span>
                <span><a href="#">Talk the Talk</a></span>

            </div>
            <div class=" col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
                <h4 class="text-white">Business Programs</h4>
                <span><a href="#">Ambassador Program</a></span>
                <span><a href="#">Advertise with Us</a></span>
                <span><a href="#">Collaborations and Partnerships</a></span>
                <span><a href="#">Referral Programs</a></span>
            </div>
            <div class="col-md-offset-2 col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
                <h4 class="text-white">Explore</h4>
                <span><a href="#">Contest page</a></span>
                <span><a href="#">Offers</a></span>
                <span><a href="#">Magazine/News</a></span>
                <span><a href="#">Video diaries</a></span>
            </div>
            <div class=" col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
                <h4 class="text-white">Support</h4>
                <span><a href="#">Help</a></span>
                <span><a href="#">Careers@CastIndia</a></span>
                <span><a href="#">Affiliates</a></span>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-- footer -->
        <div class="col-md-12 footer">
            <hr>
            <p class="text-white float-left">Copyright &#169 <?php echo date('Y'); ?> CastIndia</p>
            <p class="text-white float-right social-icons">
                <?php if($admin['facebook']!=''){?><span><a href="<?php echo $admin['facebook'] ;?>"><img
                            src="<?php echo base_url().'img/facebook.png'?>"></a></span>
                <?php } ?>
                <?php if($admin['instagram']!=''){?>
                <span><a href="<?php echo $admin['instagram'] ;?>"><img
                            src="<?php echo base_url().'img/instagram.png'?>"></a></span>
                <?php } ?>
                <?php if($admin['linkdin']!=''){?>
                <span><a href="<?php echo $admin['linkdin'] ;?>"><img
                            src="<?php echo base_url().'img/linkedin.png'?>"></a></span>
                <?php } ?>
                <?php if($admin['twitter']!=''){?>
                <span><a href="<?php echo $admin['twitter']; ?>"><img
                            src="<?php echo base_url().'img/twitter.png'?>"></a></span>
                <?php } ?>
            </p>
        </div>
    </div>
</div>

<?php } ?>







<input type="hidden" name="empotponestoreone" id="empotponestoreone">
<input type="hidden" name="empotponestoretwo" id="empotponestoretwo">
<input type="hidden" name="empotponestorethree" id="empotponestorethree">
<input type="hidden" name="empotponestorefour" id="empotponestorefour">

<input type="hidden" name="aspotponestoreone" id="aspotponestoreone">
<input type="hidden" name="aspotponestoretwo" id="aspotponestoretwo">
<input type="hidden" name="aspotponestorethree" id="aspotponestorethree">
<input type="hidden" name="aspotponestorefour" id="aspotponestorefour">


<input type="hidden" name="getloginaspotpone">
<input type="hidden" name="getloginaspotptwo">
<input type="hidden" name="getloginaspotpthree">
<input type="hidden" name="getloginaspotpfour">
<script type='text/javascript'
    src='<?php echo base_url()?>css/css/vendors/bootstrap/js/bootstrap.mina352.js?ver=4.1.3'></script>
<script type='text/javascript'
    src='<?php echo base_url()?>css/css/vendors/OwlCarousel2-2.2.1/owl.carousel.min77e6.js?ver=2.2.1'>
</script>
<script type='text/javascript' src='<?php echo base_url()?>css/css/js/skip-link-focus-fix.min.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>css/css/js/imagesloaded.min55a0.js?ver=3.2.0'>
</script>
<script type='text/javascript' src='<?php echo base_url()?>css/css/js/masonry.mind617.js?ver=3.3.2'>
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var BLOGBERG = {
    "is_admin_bar_showing": "",
    "enable_scroll_top": "1",
    "is_rtl": "",
    "search_placeholder": "hit enter for search.",
    "search_default_placeholder": "search...",
    "home_slider": {
        "autoplay": false,
        "timeout": 5000
    }
};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url()?>css/css/js/main.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>css/css/js/wp-embed.min8d9d.js?ver=4.9.16'>
</script>

</body>

</html>