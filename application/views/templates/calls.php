<?php $page='Casting Calls'; $banner=$admin['banner_job'] ;?>
<?php $this->load->view('/common/header'); ?>
<style>.banner-info{    position: absolute;    top: 0;    text-align: center;    width: 100%;}.btn_cuatro {transition: all .5s ease;    padding: 10px;    background: rgba(204,51,51,.8);    color: #fff;    font-size: 13px;}.btn_cuatro:hover {    background: #c33;	color:#fff;	text-decoration:none;}.job_box{	padding:5px;	margin-top:10px;}.job_imgbox{	height:70px;}.job_imgbox img{	margin:3% 30%;	height:100%;}.job_box_inner{	min-height:350px;	background:#f1f1f1;	transition:all .5s ease;	border:1px solid #f1f1f1;}.bottom_fixed{	position:absolute;	bottom: 10px;}.title_inner1 {    color: #545454;    font-size: 17px;}.job_box_inner:hover {    background: #fff;	border:1px solid #c33;}</style>
<?php include 'bedcrumb.php'; ?>
<div class="clearfix"></div>

<div class="container">
   <div class="container" style="margin-top:4em;">
      	
      <div class="col-sm-3 job_box">
         <div class="col-sm-12 job_box_inner">
            						
            <div class="job_imgbox">
               <img src=""  />				</div>
           			
            <h4><b>Title:</b> <span>Makeup artist required for model portfolio shoot in and outside pune </span><span class="title_inner1">26-06-2018</span></h4>
            <p><b>Date Posted:</b> 
            </p>				
            <p>Company: 3 Legged Pundit</p>
         <a class="btn_cuatro bottom_fixed" href="<?php echo base_url(); ?>/jobs/view-details?id=">View More Info</a>			
         </div>
      </div>
     			
   </div>
</div>
<script>var affixElement = '#navbar-main';$(affixElement).affix({  offset: {  
  /* // Distance of between element and top page  */
  top: function () {      return (this.top = $(affixElement).offset().top)  
  }  }});</script>
  <?php $this->load->view('/common/footer'); ?>