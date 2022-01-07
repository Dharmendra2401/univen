<?php $this->load->view('/common/header'); ?>
<section class=" ">
    <div class="">
        <div class="">
            <section class="subcat-img-banner" style="background: transparent url(<?php echo base_url('uploads/subcategorynarration/'.$subcategories->Long_Image)?>) 0% 0% no-repeat padding-box;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-position: center center;">
                <div class="join-us">
                    <a href="<?php echo base_url()?>registration" class=" col-md-2 btn btn-primary btn-danger"
                        style="text-transform: none!important;">Join us</a>
                </div>
            </section>
        </div>
    </div>
</section>
<section class="container section-padding" style="
    padding-bottom: 0px!important;">
    <div class="box-shadowssss">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 30px;">
                <h4><span class=""><?php
                   echo $Sub_Category_Name = $this->db->get_where('sub_category', array('Sub_Category_ID'=> $subcategories->ID))->row()->Sub_Category_Name;
                   
                ?></span></h4>
                <span>
                    <div class="p-subcat-text"><?php echo $subcategories->Overview?></div>
                </span>
            </div>
        </div>
        <?php  foreach($subcatprofile as $subcatprofiles){  ?>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="margin-top: 30px;">
                <div class="sub-cat-banner1" style="background: transparent url(<?php echo base_url('uploads/subcategorynarration/'.$subcatprofiles['Image'])?>) 0% 0% no-repeat padding-box;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-position: center center;"><br>
                    <h4 class="highlight">
                        <?php
                        echo $PROFILE_Name= $this->db->get_where('profile', array('PROFILE_ID'=> $subcatprofiles['ID']))->row()->PROFILE_NAME;
                        
                        ?>
                    </h4>
                    <div style="margin-right: 51px;float: right;padding: 157px 5px 3px 2px;">
                        <a href="<?php echo base_url('home/profile/'.$subcatprofiles['ID'])?>" style="color: white">View
                            more</a>
                        <i class="fa fa-arrow-right" style="color:white ;margin-left: 7px;" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php  }?>

    </div>
</section>
<section class=" ">
    <div class="">
        <div class="">
            <div class="sub-cat-bottom-banner" style="
            background: transparent url(<?php echo base_url('images/sub-cat-ba.png')?>) 0% 0% no-repeat padding-box;
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-position: center center;">
                <p style="font-size: 22px;color: #fff;margin-left: 132px;
    /* margin-top: 29px; */
    padding-top: 20px;">Destination is yet to come, Start now.</p>
                <a href="<?php echo base_url()?>registration" class="btn btn-primary d-inline-block d-sm-block "
                    style="float: right;margin-right: 186px;margin-top: 36px;">
                    Click here</a>
            </div>
        </div>
    </div>
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