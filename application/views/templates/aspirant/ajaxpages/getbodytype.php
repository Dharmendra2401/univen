
<?php if($count=='0'){?><p class="associatenameadd">
    <!-- <button type="button" onclick="return addcertificate(this.val);">Add</button>-->
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectbodytype('<?php echo $getcerts['Name']; ?>')"><?php echo $getcerts['Name']; ?></li>
<?php } ?>
</ul>
