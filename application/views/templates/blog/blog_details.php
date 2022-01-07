
<style type="text/css">
	.section-banner-wrap{
		padding: 80px 0!important;
	}
</style>
<div id="content" class="site-main">
	<section class="section-banner-wrap section-banner-one">
		<div class="wrap-inner-banner">
			<div class="container">
				<header class="page-header">
					<div class="inner-header-content">
						<span class="screen-reader-text">Posted on</span>
						<span class="posted-on">
							<a rel="bookmark">
								<span class="entry-date published"><?php  $blog_details['date_created'];
																			$timestamp = strtotime($blog_details['date_created']);
																			echo date("Y-M-d", $timestamp);
																			?>	</span>		
							</a>
						</span>
						<h1 class="page-title"><?php echo $blog_details['blog_title']?></h1>
					</div>
				</header>
			</div>
		</div>
		<div class="breadcrumb-wrap">
			<div class="container">
				<nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
					<ul class="trail-items" itemscope itemtype="">
						<meta name="numberOfItems" content="5" />
						<meta name="itemListOrder" content="Ascending" />
						<li itemprop="itemListElement" itemscope itemtype="" class="trail-item trail-begin">
							<a href="<?php echo base_url().'home';?>" >
								<span itemprop="name">Home</span>
							</a><meta itemprop="position" content="1" />
						</li>
						<li itemprop="itemListElement" itemscope itemtype="" class="trail-item">
							<a href="<?php echo base_url().'blog/index';?>">
								<span itemprop="name">Blog</span>
							</a>
							<meta itemprop="position" content="2" />
						</li>
						<li itemprop="itemListElement" itemscope itemtype="" class="trail-item">
							<a >
								<?php echo $blog_details['blog_title']?>
							</a>
							<meta itemprop="position" content="3" />
						</li>
					</ul>
				</nav>					
			</div>
		</div>
	</section>
	<section class="wrap-detail-page" id="main-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="post-thumbnail">
			            <img width="1200" height="710" src="<?php echo base_url('images/blog/'.$blog_details['blog_images'])?>" class="attachment-blogberg-1200-710 size-blogberg-1200-710 wp-post-image" alt="" />				    
			        </div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<main id="main" class="post-main-content" role="main">
						<article id="post-36" class="post-content post-36 post type-post status-publish format-standard has-post-thumbnail hentry category-effective-research category-uncategorized">
							<div class="post-content-inner">
    							<div class="post-text">
    								<?php echo $blog_details['description']?>
    							</div>
    							<footer class="post-footer">
			            			<div class="post-format-outer">
				            			<span class="post-format">
				            				<span class="kfi kfi-pushpin-alt"></span>
				            			</span>
				            		</div>
        		            		<div class="detail">
            						<!-- Hide this section in single page  -->
										<div class="cat-links">
											<span class="screen-reader-text">
												Categories							
											</span>
											<span class="categories-list">
												<a href="#" rel="category tag"><?php  echo $this->db->get_where('blog_category', array('id'=>$blog_details['blog_category_id']))->row()->name;  ?></a> 
												<a href="<?php echo base_url().'blog/index';?>" rel="category tag">Uncategorized</a>							
											</span>
										</div>
									</div>
								</footer>
		    				</div>
						</article>
						<div class="author-detail">
							<div class="author">
								<a href="javascript:void(0)">
								    <img alt='' src='<?php echo base_url('images/avtar.png')?>' srcset='' class='avatar avatar-100 photo' height='100' width='100' />		
								</a>
							</div>
							<div class="author-content no-author-text">
								<h3 class="author-name">
									Admin		
								</h3>
							</div>
						</div>
						<div id="comments" class="comments-area">
							<div id="respond" class="comment-respond">
								<h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a></small></h3>			
								<form method="post" action="<?php echo base_url(); ?>blog/blog_comment" class="comment-form">
									<p class="comment-notes">
										<span id="email-notes">Your email address will not be published.</span> 
										Required fields are marked 
										<span class="required">*</span>
									</p>
									<p class="comment-form-comment">
										<label for="comment">Comment</label> 
										<textarea maxlength="350" minlength="200" class="required" id="desinp" name="comment" cols="45" rows="8" required="required">
										</textarea>
									</p>
									<p class="comment-form-author" style="width: 49.5%!important;">
										<label for="author">Name 
											<span class="required">*</span>
										</label> 
										<input id="author" name="name" type="text" value="" size="30" maxlength="245" required='required' />
									</p>
									<p class="comment-form-email" style="width: 49.5%!important;">
										<label for="email">Email 
											<span class="required">*</span>
										</label> 
										<input id="email" name="email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' />
									</p>
									<p class="form-submit">
										<input type="submit" id="submit" class="submit"/> 
										<input type='hidden' name='blog_id' value="<?php echo $blog_details['id']?>" id='comment_parent' value='0' />
									</p>			
								</form>
							</div><!-- #respond -->
						</div><!-- #comments -->
						<!--<nav class="navigation clearfix post-navigation" role="navigation">-->
						<!--	<h2 class="screen-reader-text">Post navigation</h2>-->
						<!--	<div class="nav-links"><div class="nav-previous"><a href="#" rel="prev"><span class="nav-label">Previous Reading</span><span class="nav-title">The Indispensable Creative Brief</span></a></div></div>-->
						<!--</nav>				-->
					</main>
				</div>
			<div class="col-12 col-md-4">
				<sidebar class="sidebar clearfix" id="primary-sidebar">
					<div id="search-2" class="widget widget_search">
						<form role="search" method="get" id="searchform" class="searchform" action="#">
							<div>
								<label class="screen-reader-text" for="s">Search for:</label>
								<input type="text" value="" name="s" id="s" />
								<input type="submit" id="searchsubmit" value="Search" />
							</div>
							<button type="submit" class="search-button"><span class="kfi kfi-search"></span></button>
						</form>
					</div>		
					<div id="recent-posts-2" class="widget widget_recent_entries">		
						<h2 class="widget-title">Recent Posts</h2>		
						<ul>
							<?php 
				                    if($blogs_limits){
				                        foreach ($blogs_limits as $blogs_limit ) {?>
								<li>
									<a href="<?php echo base_url('blog/blog_details/'.$blogs_limit['id'])?>"><?php echo $blogs_limit['blog_title']?></a>
								</li>
								<?php } }?>	
						</ul>
					</div>
					<div id="recent-comments-2" class="widget widget_recent_comments">
						<h2 class="widget-title">Search by Category</h2>
						<ul>
							<?php 
				                    if($blog_category){
				                        foreach ($blog_category as $blog_category ) {?>
								<li>
									<a href="<?php echo base_url('blog/blog_list/'.$blog_category['id'])?>"><?php echo $blog_category['name']?></a>
								</li>
								<?php } }?>	
						</ul>
					</div>
    		<!--	 	<div id="archives-2" class="widget widget_archive">-->
						<!--<h2 class="widget-title">Archives</h2>		-->
						<!--<ul>-->
						<!--    <li>-->
						<!--        <a>-->
						      <?php 
						  //          $blog_details['date_created'];
								//     $timestamp = strtotime
								// 	($blog_details['date_created']);
								// 	echo date("Y-M-d", $timestamp); 
							  ?>
					<!--			</a>-->
					<!--		</li>-->
					<!--	</ul>-->
					<!--</div>	-->
				</sidebar>
			</div>			
		</div>
			</div>
	</section>
</div> <!-- site main end -->
<div class="instagram-wrapper">
	<div class="container"></div>
</div>
<script type="text/javascript">
var wrapper = document.createElement('div');
var text    = document.getElementById("desinp");
var c_wrap  = document.createElement('div');
var count   = document.createElement('span');

wrapper.style.position = 'relative';
c_wrap.style.position = 'absolute';
c_wrap.style.bottom = '8px';
c_wrap.style.color = '#ccc';
c_wrap.innerHTML = 'Char :';

text.parentNode.appendChild(wrapper);
wrapper.appendChild(text);

c_wrap.appendChild(count);
wrapper.appendChild(c_wrap);


function _set() {
	c_wrap.style.left = (text.clientWidth - c_wrap.clientWidth - 12) + 'px';
	count.innerHTML = this.value.length || 0;
}

text.addEventListener('input', _set);
_set.call(text);
</script>
	