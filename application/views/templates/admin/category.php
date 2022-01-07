<!-- Category Page -->
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
                    if($category_films){
                        foreach ($category_films as $category_film ) {?>
                <div class="slider-img">
                    <div class="text-center">
                        <div class="redline">
                            <h1 class="cat-heading cat-heading-film"><?php 
                                     
                                    $this->db->select('Category_Name');
                                    $this->db->from('category');
                                    $this->db->where('Category_ID' , $category_film['ID']);
                                    $query = $this->db->get();
                                   
                                   $cat_name = $query->row_array();
                                   print_r($cat_name['Category_Name']);
                                     ?></h1>
                        </div>
                        <div class="down_bar text-center">
                        </div>
                    </div>
                    <div class="carousel slide media-carousel" id="media">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row row-box">
                                    <div class="col-md-2 padtop30 box-width">
                                        <center>
                                            <a
                                                href="<?php echo base_url('home/sub_category/'.$category_film['sub_category1'])?>">
                                                <div class="parent_circle">
                                                    <img class="img-responsive adver-img margin-offset-advertising"
                                                        src="<?php echo base_url('uploads/categorynarration/'.$category_film['Image1'])?>" />
                                                    <div class="centered">
                                                        <?php 
                                     
                                                                    $this->db->select('Sub_Category_Name');
                                                                    $this->db->from('sub_category');
                                                                    $this->db->where('Sub_Category_ID' , $category_film['sub_category1']);
                                                                    $query = $this->db->get();
                                                                
                                                                $subcat_name = $query->row_array();
                                                                print_r($subcat_name['Sub_Category_Name']);
                                                                ?></div>
                                                </div>
                                            </a>
                                        </center>
                                    </div>
                                    <div class="col-md-2 padtop30 box-width">
                                        <center>
                                            <a
                                                href="<?php echo base_url('home/sub_category/'.$category_film['sub_category2'])?>">
                                                <div class="parent_circle">
                                                    <img class="img-responsive adver-img margin-offset-advertising"
                                                        src="<?php echo base_url('uploads/categorynarration/'.$category_film['Image2'])?>" />
                                                    <div class="centered" style="width: 130px;">
                                                        <?php 
                                                                $this->db->select('Sub_Category_Name');
                                                                $this->db->from('sub_category');
                                                                $this->db->where('Sub_Category_ID' , $category_film['sub_category2']);
                                                                $query = $this->db->get();
                                                                $subcat_name = $query->row_array();
                                                                print_r($subcat_name['Sub_Category_Name']);
                                                            ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </center>
                                    </div>
                                    <div class="col-md-2 padtop30 box-width">
                                        <center>
                                            <a
                                                href="<?php echo base_url('home/sub_category/'.$category_film['sub_category3'])?>">
                                                <div class="parent_circle">
                                                    <img class="img-responsive adver-img margin-offset-advertising"
                                                        src="<?php echo base_url('uploads/categorynarration/'.$category_film['Image3'])?>" />
                                                    <div class="centered">
                                                        <?php 
                                                                $this->db->select('Sub_Category_Name');
                                                                $this->db->from('sub_category');
                                                                $this->db->where('Sub_Category_ID' , $category_film['sub_category3']);
                                                                $query = $this->db->get();
                                                                $subcat_name = $query->row_array();
                                                                print_r($subcat_name['Sub_Category_Name']);
                                                            ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </center>
                                    </div>
                                    <div class="col-md-2 padtop30 box-width">
                                        <center>
                                            <a
                                                href="<?php echo base_url('home/sub_category/'.$category_film['sub_category4'])?>">
                                                <div class="parent_circle">
                                                    <img class="img-responsive adver-img margin-offset-advertising"
                                                        src="<?php echo base_url('uploads/categorynarration/'.$category_film['Image4'])?>" />
                                                    <div class="centered" style="width: 130px;">
                                                        <?php 
                                                                $this->db->select('Sub_Category_Name');
                                                                $this->db->from('sub_category');
                                                                $this->db->where('Sub_Category_ID' , $category_film['sub_category4']);
                                                                $query = $this->db->get();
                                                                $subcat_name = $query->row_array();
                                                                print_r($subcat_name['Sub_Category_Name']);
                                                            ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </center>
                                    </div>
                                    <div class="col-md-2 padtop30 box-width">
                                        <center>
                                            <a
                                                href="<?php echo base_url('home/sub_category/'.$category_film['sub_category5'])?>">
                                                <div class="parent_circle">
                                                    <img class="img-responsive adver-img margin-offset-advertising"
                                                        src="<?php echo base_url('uploads/categorynarration/'.$category_film['Image5'])?>" />
                                                    <div class="centered">
                                                        <?php 
                                                                $this->db->select('Sub_Category_Name');
                                                                $this->db->from('sub_category');
                                                                $this->db->where('Sub_Category_ID' , $category_film['sub_category5']);
                                                                $query = $this->db->get();
                                                                $subcat_name = $query->row_array();
                                                                print_r($subcat_name['Sub_Category_Name']);
                                                            ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </center>
                                    </div>
                                    <a data-slide="prev" href="#media" class="left carousel-control">
                                        <img class="img-responsive"
                                            src="<?php echo base_url()?>images/left_baner_arrow.png">
                                    </a>
                                    <a data-slide="next" href="#media" class="right carousel-control">
                                        <img class="img-responsive"
                                            src="<?php echo base_url()?>images/right_button_scroling.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
            </section>

            <div class="clearfix"></div>
            <?php 
                    if($categories){
                        foreach ($categories as $category ) {?>
            <section>
                <div class="slider-img">
                    <div class="text-center">
                        <div class="redline">
                            <h1 class="cat-heading">
                                <?php 
                                     
                                    $this->db->select('Category_Name');
                                    $this->db->from('category');
                                    $this->db->where('Category_ID' , $category['ID']);
                                    $query = $this->db->get();
                                   
                                   $cat_name = $query->row_array();
                                   print_r($cat_name['Category_Name']);
                                     ?></h1>
                        </div>
                        <div class="down_bar text-center">
                        </div>
                    </div>
                    <div class="row row-box">
                        <?php
                                    if($category['Image5'] == Null && $category['Image4'] != Null){?>
                        <div class="col-md-1 padtop30 ">

                        </div>
                        <?php }elseif($category['Image4'] == Null){?>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <div class="parent_circle">

                                </div>
                            </center>
                        </div>
                        <?php }?>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <a href="<?php echo base_url('home/sub_category/'.$category['sub_category1'])?>">
                                    <div class="parent_circle">
                                        <img class="img-responsive adver-img margin-offset-advertising"
                                            src="<?php echo base_url('uploads/categorynarration/'.$category['Image1'])?>" />
                                        <div class="centered">
                                            <?php 
                                                    $this->db->select('Sub_Category_Name');
                                                    $this->db->from('sub_category');
                                                    $this->db->where('Sub_Category_ID' , $category['sub_category1']);
                                                    $query = $this->db->get();
                                                    $subcat_name = $query->row_array();
                                                    print_r($subcat_name['Sub_Category_Name']);
                                                ?>
                                        </div>
                                </a>
                            </center>
                        </div>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <a href="<?php echo base_url('home/sub_category/'.$category['sub_category2'])?>">
                                    <div class="parent_circle">
                                        <img class="img-responsive adver-img margin-offset-advertising"
                                            src="<?php echo base_url('uploads/categorynarration/'.$category['Image2'])?>" />
                                        <div class="centered" style="width: 130px;">
                                            <?php 
                                                    $this->db->select('Sub_Category_Name');
                                                    $this->db->from('sub_category');
                                                    $this->db->where('Sub_Category_ID' , $category['sub_category2']);
                                                    $query = $this->db->get();
                                                    $subcat_name = $query->row_array();
                                                    print_r($subcat_name['Sub_Category_Name']);
                                                ?>
                                        </div>
                                    </div>
                                </a>
                            </center>
                        </div>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <a href="<?php echo base_url('home/sub_category/'.$category['sub_category3'])?>">
                                    <div class="parent_circle">
                                        <img class="img-responsive adver-img margin-offset-advertising"
                                            src="<?php echo base_url('uploads/categorynarration/'.$category['Image3'])?>" />
                                        <div class="centered">
                                            <?php 
                                                    $this->db->select('Sub_Category_Name');
                                                    $this->db->from('sub_category');
                                                    $this->db->where('Sub_Category_ID' , $category['sub_category3']);
                                                    $query = $this->db->get();
                                                    $subcat_name = $query->row_array();
                                                    print_r($subcat_name['Sub_Category_Name']);
                                                ?>
                                        </div>
                                    </div>
                                </a>
                            </center>
                        </div>
                        <?php
                                    if($category['Image4'] == Null){?>

                        <?php }else{?>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <a href="<?php echo base_url('home/sub_category/'.$category['sub_category4'])?>">
                                    <div class="parent_circle">
                                        <img class="img-responsive adver-img margin-offset-advertising"
                                            src="<?php echo base_url('uploads/categorynarration/'.$category['Image4'])?>" />
                                        <div class="centered" style="width: 130px;">
                                            <?php 
                                                    $this->db->select('Sub_Category_Name');
                                                    $this->db->from('sub_category');
                                                    $this->db->where('Sub_Category_ID' , $category['sub_category4']);
                                                    $query = $this->db->get();
                                                    $subcat_name = $query->row_array();
                                                    print_r($subcat_name['Sub_Category_Name']);
                                                ?>
                                        </div>
                                    </div>
                                </a>
                            </center>
                        </div>
                        <?php }
                                ?>
                        <?php
                                    if($category['Image5'] == Null && $category['Image4'] != Null){?>
                        <div class="col-md-1 padtop30 ">

                        </div>
                        <?php }elseif($category['Image5'] == Null){?>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <div class="parent_circle">

                                </div>
                            </center>
                        </div>
                        <?php }else{?>
                        <div class="col-md-2 padtop30 box-width">
                            <center>
                                <a href="<?php echo base_url('home/sub_category/'.$category['sub_category5'])?>">
                                    <div class="parent_circle">
                                        <img class="img-responsive adver-img margin-offset-advertising"
                                            src="<?php echo base_url('uploads/categorynarration/'.$category['Image5'])?>" />
                                        <div class="centered">
                                            <?php 
                                                    $this->db->select('Sub_Category_Name');
                                                    $this->db->from('sub_category');
                                                    $this->db->where('Sub_Category_ID' , $category['sub_category5']);
                                                    $query = $this->db->get();
                                                    $subcat_name = $query->row_array();
                                                    print_r($subcat_name['Sub_Category_Name']);
                                                ?>
                                        </div>
                                    </div>
                                </a>
                            </center>
                        </div>
                        <?php  }
                                ?>

                    </div>
            </section>
            <?php } }?>
            <div class="clearfix"></div>
            <section style="margin-bottom: 8%">
                <div>
                    <div class="text-center">
                        <div class="">
                            <h2 class="cat-heading">Join Cast India
                                Today!</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-xxl-offset-1 margin-offset-advertising">
                            </div>
                            <div class="col-md-2 join-cast-india-img2">
                                <img class="img-responsive join-cast-india-img-prop " style="margin-top: 48px;"
                                    src="<?php echo base_url()?>images/Group 812.png" />
                                <p class="join-cast-india-heading" style="margin-top: 36px;">Find Your Role</p>
                                <p class="join-cast-india-p">Explore over 10,000 jobs and find the role that
                                    suits you best.</p>
                            </div>
                            <div class="col-md-1 col-xxl-offset-1 margin-offset-advertising">
                            </div>
                            <div class="col-md-2 join-cast-india-img2">
                                <img class="img-responsive join-cast-india-img-prop"
                                    src="<?php echo base_url()?>images/Group 813.png" />
                                <p class="join-cast-india-heading">Get Discovered</p>
                                <p class="join-cast-india-p">“Build your profile and connect with Industry
                                    Professionals”</p>
                            </div>
                            <div class="col-md-1 col-xxl-offset-1 margin-offset-advertising">
                            </div>
                            <div class="col-md-2 join-cast-india-img3">
                                <img class="img-responsive join-cast-india-img-prop"
                                    src="<?php echo base_url()?>images/Group 814.png" />
                                <p class="join-cast-india-heading">Get Casted</p>
                                <p class="join-cast-india-p">Land the role, take your place, and make your mark.
                                </p>
                            </div>
                            <div class="col-md-2 col-xxl-offset-1 margin-offset-advertising">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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