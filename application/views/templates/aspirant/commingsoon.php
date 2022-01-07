<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
?>

<body>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php  include "left_menu.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <?php $this->load->view('templates/aspirant/nav'); ?>
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
                    <div class="position-relative">
                   <img src="<?php echo base_url();?>img/aspirant_commingsoon.jpg" width="100%">
                   <a href="<?php echo base_url();?>aspirant/profiles?type=Profile_details" value="submit" id="buttonregasp" class="btn btn-primary d-inline-block d-sm-block btn-modal width42 commingsoon">Go To Profile</a>
                  </div>
                </div>
                </div>
            </main>

            <?php include "footer.php";  ?>
        </div>
    </div>

<?php include "scripts.php";  ?>


</body>
<script>






</script>

</html>