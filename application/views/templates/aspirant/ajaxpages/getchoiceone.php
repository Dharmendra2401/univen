
<?php if($countss=='0'){?><p class="associatenameadd">
    <input type="text" class="getassociatedname" id="getchoiceone<?php echo $getcc; ?>" readonly> <button type="button" onclick="return addchoiceone('<?php echo $getcc; ?>');">Add</button>
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectchoiceone('<?php echo $getcerts['Name']; ?>','<?php echo $getcc; ?>')"><?php echo $getcerts['Name']; ?></li>
<?php } ?>
</ul>
<script>

  

</script>