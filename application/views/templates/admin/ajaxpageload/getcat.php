<ul>
    <?php  foreach($getcert as $getcerts){?>
    <li
        onclick="return selectcat('<?php echo $getcerts['Category_ID']; ?>','<?php echo $getcerts['Category_Name']; ?>','<?php echo $getcc; ?>')">
        <?php echo $getcerts['Category_Name']; ?>

    </li>
    <?php } ?>
</ul>