<?php $this->load->view('/common/header');  ?>
<div class="registration-form">
	<div class="container">

	<?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
  </div>
</div>

<?php $this->load->view('/common/footer'); ?>
