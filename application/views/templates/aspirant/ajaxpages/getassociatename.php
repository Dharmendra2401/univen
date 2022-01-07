
<?php if($count=='0'){?><p class="associatenameadd"><input type="text" class="getassociatedname" id="getassociatedname" readonly><button type="button" onclick="return addassociate();">Add</button></p><?php } ?>
<ul>
<?php foreach($getass as $associate){?>
<li onclick="return selectassname('<?php echo $associate['Association_Name']; ?>')"><?php echo $associate['Association_Name']; ?></li>
<?php } ?>
</ul>
