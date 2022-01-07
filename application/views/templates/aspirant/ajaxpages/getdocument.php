<?php 
  $allgetdata=explode(' - ',$getdata['Portfolio_Form_Documents']);
  foreach($allgetdata as $data ){
      if($data!=''){
      $actualdata=explode(',',$data);
      
?>
<div class="col-md-6 remove form-group position-relative focused mr-0 link-right">
 <h6 class="pb-2 text-left upload-content links">
 <a href="<?php echo base_url().'uploads/portfolio/document/'.$actualdata[0];?>" download><?php echo $actualdata[1];?></a></h6>
 <input type="hidden" name="docurl[]" id="docurl" value="<?php echo $actualdata[0];?>">
 <input type="hidden" name="doctitle[]" id="doctitle" value="<?php echo $actualdata[1];?>" >
 <a href="#" class="remove-field btn-remove-customer removeall"><i class="fas fa-times"></i></a>

</div>
<?php }} ?>

