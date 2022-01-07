<style>
.text strong {
    opacity: 1;
}
</style>
<?php $this->load->view('/common/header'); ?>
<section style="height: 250px;
	margin-left: 0px !important;
	background: url(<?php echo base_url('uploads/profilenarration/'.$profiles->Long_Image);?>)0% 0% no-repeat padding-box; width: 100%; background-repeat:
    no-repeat; background-size: 100% 100%; background-position: center center;">
    <p style="font-size: 22px;color: #fff;text-align: center;padding-top: 7%;">
        <?php echo $PROFILE_NAME = $this->db->get_where('profile', array('PROFILE_ID'=> $profiles->ID))->row()->PROFILE_NAME;?>
    </p>
    <div class="profile-nav-bg-color">
        <ul class="nav nav-tabs profile-nav-tab-menu   row-customize" style="">
            <li class="active"><a href="#1" style="background-color: transparent;">
                    <center>Overview</center>
                </a></li>
            <li>
                <a href="#2" style="background-color: transparent;">
                    <center>How to Become
                    </center>
                </a>
            </li>
            <li>
                <a href="#3" style="background-color: transparent;">
                    <center>Qualifications
                    </center>
                </a>
            </li>
            <li>
                <a href="#4" style="background-color: transparent;">
                    <center>Positions and
                        Responsibilities
                    </center>
                </a>
            </li>
        </ul>
    </div>
</section>
<section>
    <div class="container active" id="1"">
        <div class=" row row-box">
        <div id=" panel">
            <div class="row row-image-team">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top:5%;">
                    <p class="profile-heading-font">Overview</p>
                    <div style="margin-left: 3%;" class="p-subcat-text1 content-here1">
                        <?php echo $profiles->Overview?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section id="2">
    <div class="container">
        <div class="row row-box">
            <div>
                <div id="panel"><br><br>
                    <div class="row row-image-team">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-bottom:5%;">
                            <p class="profile-heading-font">How to become?</p>
                            <div style="margin-left: 3%;" class="p-subcat-text1 content-here1">
                                <?php echo $profiles->How_To_Become?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="height: 114px;
	margin-left: 0px !important;
	background: url(<?php echo base_url('images/opportunity-2x.png');?>)0% 0% no-repeat padding-box;
        width: 100%; background-repeat:
        no-repeat; background-size: 100% 100%; background-position: center center;">
    <div class="container">
        <div class="row" style="margin-top: 4%;">
            <div class="col-sm-6 col-md-6 col-xl-6 col-lg-6">
                <h4 class="" style="font-size: 22px;color: #fff;">Opportunities just one click away.</h4>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-6 col-lg-6">
                <a href="<?php echo base_url()?>registration" class=" col-md-2 btn btn-primary btn-danger pull-right"
                    style="text-transform: none!important;">Click
                    here</a>
            </div>

        </div>
    </div>
</section>
<section id="3">
    <div class="container">
        <div class="row row-box">
            <div class="">
                <div id="panel"><br><br>

                    <div class="row row-image-team">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p class="profile-heading-font">Qualification</p>
                            <div style="margin-left: 3%;" class="p-subcat-text1 content-here1">
                                <?php echo $profiles->Qualifications?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="4">
    <div class="container">
        <div class="row row-box">
            <div class="">
                <div id="panel"><br><br>

                    <div class="row row-image-team">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p class="profile-heading-font">Positions and Responsibilities</p>
                            <div style="margin-left: 3%;" class="p-subcat-text1 content-here1">
                                <?php echo $profiles->Positions_and_Responsibilities?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container section-padding" style="
    padding-bottom: 0px!important;">
    <div class="box-shadowssss">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="margin-bottom:5%;">
                <div>
                    <p class="profile-heading-font">Explore Related Profiles</p>
                    <div class="category owl-carousel1  owl-carousel owl-theme>
                        <div class=" carousel-inner">
                        <?php $i = 0;
                        if($profilelist){
                            foreach ($profilelist as $profilelists ) {?>
                        <div class="item  <?php $i++; if($i == 1){echo 'active';}?>">

                            <h4>
                                <a href="#">
                                    <img class="img-responsive adver-img margin-offset-advertising"
                                        src="<?php echo base_url('uploads/exploreprofile/'.$profilelists['Image1'])?>" />
                                    <center>
                                        <div class="centered">
                                            <?php echo $PROFILE_NAME = $this->db->get_where('profile', array('PROFILE_ID'=> $profilelists['ID']))->row()->PROFILE_NAME;?>
                                        </div>
                                    </center>
                                </a>
                            </h4>
                        </div>
                        <?php } }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="height: 294px;
	margin-left: 0px !important;
	background: url(<?php echo base_url('images/banner-stage-2x.png');?>)0% 0% no-repeat padding-box; width: 100%; background-repeat:
    no-repeat; background-size: 100% 100%; background-position: center center;">
    <p style="font-size: 22px;color: #fff;margin-left: 132px;
    /* margin-top: 29px; */
    padding-top: 20px;">It's time to take the centre stage.</p>
    <a href="<?php echo base_url()?>registration" class="btn btn-primary d-inline-block d-sm-block "
        style="float: right;margin-right: 186px;margin-top: 36px;">
        Enroll yourself</a>

</section>

<?php $this->load->view('/common/footer'); ?>

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