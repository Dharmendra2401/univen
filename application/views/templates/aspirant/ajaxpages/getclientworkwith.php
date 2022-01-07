
<?php if($countss=='0'){?><p class="associatenameadd">
    <input type="text" class="getassociatedname" id="getclientworkwith<?php echo $getcc; ?>" readonly> <button type="button" onclick="return addclientworkwith('<?php echo $getcc; ?>');">Add</button>
</p><?php } ?> 
<ul>
<?php foreach($getcert as $getcerts){?>
<li onclick="return selectclientworkwith('<?php echo $getcerts['Name']; ?>','<?php echo $getcc; ?>')"><?php echo $getcerts['Name']; ?></li>
<?php } ?>
</ul>
<script>

  

</script>