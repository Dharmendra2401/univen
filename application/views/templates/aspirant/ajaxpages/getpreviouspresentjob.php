
<?php if($countss=='0'){?><p class="associatenameadd">
    <input type="text" class="getassociatedname" id="getpresentjobrolesr<?php echo $getcc; ?>" readonly> <button type="button" onclick="return addpreviouspresentjob('<?php echo $getcc; ?>');">Add</button>
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectpreviouspresentjob('<?php echo $getcerts['Name']; ?>','<?php echo $getcc; ?>')"><?php echo $getcerts['Name']; ?></li>
<?php } ?>
</ul>
<script>

  

</script>