<?php if ($this->session->flashdata('success')) {?>
	<div class="alert alert-success alert-dismissible fade show">
	  <?php echo $this->session->flashdata('success');?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
<?php }?>
<?php if ($this->session->flashdata('error')) {?>
	<div class="alert alert-error alert-dismissible fade show">
	  <?php echo $this->session->flashdata('wrror');?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
<?php }?>

<?php if ($this->session->flashdata('info')) {?>
	<div class="alert alert-info alert-dismissible fade show">
	  <?php echo $this->session->flashdata('info');?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
<?php }?>
