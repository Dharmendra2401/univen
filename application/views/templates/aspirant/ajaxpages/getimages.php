<?php 

  $allgetdata=explode(' - ',$getdata['Portfolio_Form_Images']);
 
  foreach($allgetdata as $data ){
     if($data!=''){
      
?>
<div class="col-md-3 remove form-group position-relative focused link-right mr-0 allimages">
<input type="hidden" name="imageurlonetwo[]" id="imageurl" value="<?php echo $data; ?>">
  <img src="<?php echo base_url().'uploads/portfolio/'.$data; ?>" width="100%">
  
  <a href="#" class="remove-field btn-remove-customer removeall"><i class="fas fa-times"></i></a>

</div>
<?php }} ?>

