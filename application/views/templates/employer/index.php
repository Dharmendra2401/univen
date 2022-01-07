
<?php $this->load->view('/common/header'); ?>
<h2 class="text-center">Hello Employer => <span class="bg-success rounded"><?php echo $getempusers['First_Name'].' '.$getempusers['Last_Name'] ; ?></span> <br>

<a href="<?php echo base_url();?>/employer/logout" class="btn btn-info btn-sm" >Logout</a>
</h2>


<?php $this->load->view('/common/footer'); ?>