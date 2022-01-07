<ul>
    <?php foreach($getsubcert as $getsubcerts){?>
    <li
        onclick="return selectsubcat('<?php echo $getsubcerts['Sub_Category_ID']; ?>','<?php echo $getsubcerts['Sub_Category_Name']; ?>','<?php echo $getsubcc; ?>')">
        <?php echo $getsubcerts['Sub_Category_Name']; ?>

    </li>
    <?php } ?>
</ul>