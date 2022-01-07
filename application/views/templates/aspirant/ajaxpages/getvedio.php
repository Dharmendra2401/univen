<?php 

  $allgetdata=explode(' - ',$getdata['Portfolio_Form_Vedios']);
 
  foreach($allgetdata as $data ){
    if($data!=''){
      
?>
<div class="col-md-6 remove form-group position-relative focused link-right mr-0 ">
<input type="hidden" name="vediourlone[]" id="vediourlone" value="<?php echo $data; ?>">
  <iframe id="video" width="200" height="120" src="<?php echo $data; ?>" frameborder="0" allowfullscreen></iframe>
  <a href="#" class="remove-field btn-remove-customer removeall"><i class="fas fa-times"></i></a>
</div>

<?php } } ?>

