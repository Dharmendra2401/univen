
<?php if($count=='0'){?><p class="associatenameadd"><input type="text" class="getassociatedname" id="getcertificatename" readonly>
    <!-- <button type="button" onclick="return addcertificate(this.val);">Add</button>-->
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectjoblocality('<?php echo $getcerts['City']; ?>')"><?php echo $getcerts['City']; ?></li>
<?php } ?>
</ul>
