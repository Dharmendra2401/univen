
<?php if($count=='0'){?><p class="associatenameadd"><input type="text" class="getassociatedname" id="getcertificatename" readonly><button type="button" onclick="return addcertificate(this.val);">Add</button></p><?php } ?>
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectcerticate('<?php echo $getcerts['Certificate_Name']; ?>')"><?php echo $getcerts['Certificate_Name']; ?></li>
<?php } ?>
</ul>
