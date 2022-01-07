
<?php if($count=='0'){?><p class="associatenameadd">
    <!-- <button type="button" onclick="return addcertificate(this.val);">Add</button>-->
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectspecialization('<?php echo $getcerts['name']; ?>')"><?php echo $getcerts['name']; ?></li>
<?php } ?>
</ul>
