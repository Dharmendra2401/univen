<?php $i=0; foreach($rowss as $rowss){?>
<div onclick="return getvaluesall(<?php echo $i;?>);" class="content-here formregasp" id="content-hereee">
    <input type="hidden" name="catid<?php echo $i;?>" value="<?php echo $rowss['catname'] ?>">
    <input type="hidden" name="subcatid<?php echo $i;?>" value="<?php echo $rowss['Sub_Category_Name'] ?>">
    <input type="hidden" name="profileid<?php echo $i;?>" value="<?php echo $rowss['PROFILE_NAME'] ?>">
    <input type="hidden" name="profileiddd<?php echo $i;?>" value="<?php echo $rowss['PROFILE_ID'] ?>">


    <span id="profilename<?php echo $i;?>"><?php echo $rowss['PROFILE_NAME']; ?></span>
    <p> <span id="catname<?php echo $i;?>"><?php echo $rowss['catname']; ?></span>
        <i class="fas fa-chevron-right"></i>
        <span id="subname<?php echo $i;?>"><?php echo $rowss['Sub_Category_Name']; ?></span>
    </p>
</div>
<?php $i++;} ?>

<script>
function getvaluesall(i) {
    // var catid=$('input[name=catid'+i).val();
    // var subcatid=$('input[name=subcatid'+i).val();
    var profileid = $('input[name=profileid' + i + ']').val();
    var subcatid = $('input[name=subcatid' + i + ']').val();
    var catid = $('input[name=catid' + i + ']').val();
    var profileiddd = $('input[name=profileiddd' + i + ']').val();
    var catname = $('#catname' + i).text();
    var subname = $('#subname' + i).text();
    var profilename = $('#profilename' + i).text();
    $('input[name=profidd]').val(profilename);
    $('#profin').text(' in ' + catname);
    $('input[name=proid]').val(profileid);
    $('input[name=subtid]').val(subname);
    $('input[name=cid]').val(catid);
    $('input[name=proiddddd]').val(profileiddd);


    $('.droping-list').hide();
    $('.seniority').show();
    formregasp();
}
</script>