<?php error_reporting(0);?>
<div id="content" class="site-main">
    <section class="block-slider block-slider-one">
        <div class="container">
            <div class="controls"></div>
            <div class="owl-pager" id="slide-pager"></div>
            <div class="home-slider owl-carousel">
                <?php 
                    if($blogs_sliders){
                        foreach ($blogs_sliders as $blogs_slider ) {?>
                <div class="slide-item"
                    style="background-image: url('<?php echo base_url('images/blog/'.$blogs_slider['blog_images'])?>');">
                    <div class="banner-overlay">
                        <div class="slide-inner text-center">
                            <article class="post">
                                <div class="post-content">
                                    <span class="entry-meta-cat">
                                        <a href="<?php echo base_url('blog/blog_details/'.$blogs_slider['id'])?>">
                                            <?php echo $blogs_slider['blog_title']?>
                                        </a>
                                    </span>
                                    <header class="post-title">
                                        <h2>
                                            <a href="<?php echo base_url('blog/blog_details/'.$blogs_slider['id'])?>">
                                                <?php echo $blogs_slider['blog_title']?>
                                            </a>
                                        </h2>
                                    </header>
                                    <div class="meta-tag">
                                        <div class="meta-time">
                                            <a href="#">
                                                <?php  $blogs_slider['date_created'];
																			$timestamp = strtotime($blogs_slider['date_created']);
																			echo date("Y-M-d", $timestamp);
																			?>
                                            </a>
                                        </div>
                                        <div class="meta-author">
                                            <a href="#">
                                                Admin
                                            </a>
                                        </div>
                                        <div class="meta-comment">
                                            <a href="#">
                                                0
                                            </a>
                                        </div>
                                    </div>
                                    <div class="button-container">
                                        <a href="<?php echo base_url('blog/blog_details/'.$blogs_slider['id'])?>"
                                            class="button-outline">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <?php } }?>
            </div>
            <div id="after-slider"></div>
        </div>
    </section>
    <section class="block-grid" id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="main-wrap">
                    <div class="post-section">
                        <div class="content-wrap">
                            <div class="row"></div>
                            <div class="row list-post ">
                                <?php 
				                    if($search_param){
				                        foreach ($search_param as $param ) {?>
                                <div class="col-12">
                                    <article id="post-36"
                                        class="post post-36 type-post status-publish format-standard has-post-thumbnail hentry category-effective-research category-uncategorized">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <figure class="featured-image">
                                                    <a href="<?php echo base_url('blog/blog_details/'.$param['id'])?>">
                                                        <img width="1200" height="710"
                                                            src="<?php echo base_url('images/blog/'.$param['blog_images'])?>"
                                                            class="attachment-blogberg-1200-710 size-blogberg-1200-710 wp-post-image"
                                                            alt="" /></a>
                                                </figure>
                                            </div> <!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="post-content">
                                                    <header class="entry-header">
                                                        <div class="entry-meta-cat">
                                                            <a
                                                                href="<?php echo base_url('blog/blog_details/'.$param['id'])?>"><?php  echo $this->db->get_where('blog_category', array('id'=>$param['blog_category_id']))->row()->name;  ?></a>
                                                        </div>
                                                        <h3 class="entry-title">
                                                            <a
                                                                href="<?php echo base_url('blog/blog_details/'.$param['id'])?>"><?php echo $param['blog_title']?></a>
                                                        </h3>
                                                        <div class="meta-tag">
                                                            <div class="meta-time">
                                                                <a>
                                                                    <?php  $param['date_created'];
																			$timestamp = strtotime($param['date_created']);
																			echo date("Y-M-d", $timestamp);
																			?>
                                                                </a>
                                                            </div>
                                                            <div class="meta-author">
                                                                <a href="#">
                                                                    Admin </a>
                                                            </div>
                                                            <div class="meta-comment">
                                                                <a href="#">
                                                                    0 </a>
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <div class="post-text">
                                                        <p>
                                                            <?php echo $param['short_desc']?>&#8230;

                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-lg-6 -->
                                        </div> <!-- end row -->
                                    </article>
                                </div>
                                <?php } }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!$search_param) : ?>

                <div class="col-md-12" id="main-wrap">
                    <div class="post-section">
                        <div class="content-wrap">
                            <div class="row"></div>
                            <div class="row list-post ">
                                <?php 
				                    if($blog_category){
				                        foreach ($blogs as $blog ) {?>
                                <div class="col-6">
                                    <article id="post-36"
                                        class="post post-36 type-post status-publish format-standard has-post-thumbnail hentry category-effective-research category-uncategorized">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <figure class="featured-image">
                                                    <a href="<?php echo base_url('blog/blog_details/'.$blog['id'])?>">
                                                        <img width="1200" height="710"
                                                            src="<?php echo base_url('images/blog/'.$blog['blog_images'])?>"
                                                            class="attachment-blogberg-1200-710 size-blogberg-1200-710 wp-post-image"
                                                            alt="" /></a>
                                                </figure>
                                            </div> <!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="post-content">
                                                    <header class="entry-header">
                                                        <div class="entry-meta-cat">
                                                            <a
                                                                href="javascript:void(0)"><?php  echo $this->db->get_where('blog_category', array('id'=>$blog['blog_category_id']))->row()->name;  ?></a>
                                                        </div>
                                                        <h3 class="entry-title">
                                                            <a
                                                                href="<?php echo base_url('blog/blog_details/'.$blog['id'])?>"><?php echo $blog['blog_title']?></a>
                                                        </h3>
                                                        <div class="meta-tag">
                                                            <div class="meta-time">
                                                                <a>
                                                                    <?php  $blog['date_created'];
																			$timestamp = strtotime($blog['date_created']);
																			echo date("Y-M-d", $timestamp);
																			?>
                                                                </a>
                                                            </div>
                                                            <div class="meta-author">
                                                                <a href="#">
                                                                    Admin</a>
                                                            </div>
                                                            <div class="meta-comment">
                                                                <a href="#">
                                                                    0 </a>
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <div class="post-text">
                                                        <p>
                                                            <?php echo $blog['short_desc']?>&#8230;
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <!-- end col-lg-6 -->
                                        </div> <!-- end row -->
                                    </article>
                                </div>
                                <?php } }else{?>
                                <div id="content" class="site-main">
                                    <section class="wrap-detail-page error-404">
                                        <div class="container">
                                            <div class="inner-page-content">
                                                <div class="row">
                                                    <div class="col-12 col-md-8 offset-md-2">
                                                        <div class="content">
                                                            <h1 class="section-title" style="text-align: center;">
                                                                Nothing Found </h1>
                                                            <p class="sub-title" style="text-align: center;">
                                                                It seems we can’t find what you’re looking for. Perhaps
                                                                another searching can help. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
</div> <!-- site main end -->
<div class="instagram-wrapper">
    <div class="container"></div>
</div>