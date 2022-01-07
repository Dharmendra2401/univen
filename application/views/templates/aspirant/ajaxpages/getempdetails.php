
<?php if($countss=='0'){?><p class="associatenameadd">
    <input type="text" class="getassociatedname" id="getempdetails<?php echo $getcc; ?>" readonly> <button type="button" onclick="return addempdetails('<?php echo $getcc; ?>');">Add</button>
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectempdetails('<?php echo $getcerts['Name']; ?>','<?php echo $getcc; ?>')"><?php echo $getcerts['Name']; ?></li>
<?php } ?>
</ul>
<script>

  

</script>