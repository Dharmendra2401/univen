<?php $this->load->view('/common/header'); ?>
<section class="cat-img-banner">
    <div class="join-us">
        <a href="<?php echo base_url()?>registration" class=" col-md-2 btn btn-primary btn-danger"
            style="text-transform: none!important;">Join us</a>
    </div>
</section>
<section class="container section-padding">
    <div class="box-shadowssss">
        <div class="row">
            <!-- Pills navs -->
            <div class="nav tabs">
                <ul class="tabs-list">
                    <?php $i = 0;
                    if($populartaglists){
                        foreach ($populartaglists as $populartaglist ) {?>
                    <a href="<?php echo base_url('home/profile/'.$populartaglist['ID'])?>">
                        <li class="<?php $i++; if($i == 1){echo 'active';}?> action-li">

                            <?php echo $PROFILE_NAME = $this->db->get_where('profile', array('PROFILE_ID'=> $populartaglist['ID']))->row()->PROFILE_NAME;?>

                        </li>
                    </a>
                    <?php } }?>
                </ul>
            </div>




            <section style="">
                <?php 
                 
                        foreach ($categories as $category_film ) {?>
                <div class="slider-img">
                    <div class="text-center">
                        <span class="cat-heading-film"><?php echo $category_film['Category_Name'];?> </span>

                        <div class="redline">

                        </div>
                        <!-- <div class="down_bar text-center">
                        </div> -->

                    </div>
                    <div class="category owl-carousel1  owl-carousel owl-theme">
                        <?php 
                        $sql="select * from category_description where id='".$category_film['ID']."' and ACTIVE_FLAG='Y' "; 
                        $querys=$this->db->query($sql)->result_array();
                        $i=0; foreach($querys as $sna){?>
                        <div class="item">
                            <h4>
                                <a href="<?php echo base_url('home/sub_category/'.$sna['sub_category1'])?>">
                                    <img class="img-responsive adver-img margin-offset-advertising"
                                        src="<?php echo base_url('uploads/categorynarration/'.$sna['Image1'])?>" />
                                    <center>
                                        <div class="centered">
                                            <?php  
                                          echo  $this->db->get_where('sub_category', array('Sub_Category_ID'=>$sna['sub_category1']))->row()->Sub_Category_Name;
                                        
                                            ?>
                                        </div>
                                    </center>
                                </a>
                            </h4>
                        </div>
                        <?php } ?>

                    </div>
                </div>
                <?php }?>

            </section>

            <div class="clearfix"></div>
            <section style="margin-bottom: 8%;">
                <div>
                    <div class="text-center">
                        <div class="">
                            <h2 class="cat-heading">Join Cast India
                                Today!</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row" style="margin-left:15%;">
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                                <div class="join-cast-india-img2">
                                    <img class="img-responsive join-cast-india-img-prop "
                                        src="<?php echo base_url()?>images/Group 812.png" />
                                </div>
                                <p class="join-cast-india-heading">Find Your Role</p>
                                <p class="join-cast-india-p">Explore over 10,000 jobs and find the role that
                                    suits you best.</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                                <div class="join-cast-india-img2">
                                    <img class="img-responsive join-cast-india-img-prop"
                                        src="<?php echo base_url()?>images/Group 813.png" />
                                </div>
                                <p class="join-cast-india-heading">Get Discovered</p>
                                <p class="join-cast-india-p">“Build your profile and connect with Industry
                                    Professionals”</p>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                                <div class="join-cast-india-img3">
                                    <img class="img-responsive join-cast-india-img-prop"
                                        src="<?php echo base_url()?>images/Group 814.png" />
                                </div>
                                <p class="join-cast-india-heading">Get Casted</p>
                                <p class="join-cast-india-p">Land the role, take your place, and make your mark.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

</section>

<?php $this->load->view('/common/footer'); ?>
<script>
var owl = $('.owl-carousel1');
owl.owlCarousel({
    items: 5,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,
    nav: true,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: true,
            loop: false
        }
    }
});
$('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
})
</script>

<script type="text/javascript">
$(document).ready(function() {
    $(".tabs-list li a").click(function(e) {
        e.preventDefault();
    });
    $(".tabs-list li").click(function() {
        var tabid = $(this).find("a").attr("href");
        $(".tabs-list li,.tabs div.tab").removeClass(
            "active"); // removing active class from tab and tab content
        $(".tab").hide(); // hiding open tab
        $(tabid).show(); // show tab
        $(this).addClass("active"); //  adding active class to clicked tab
    });
});
</script>