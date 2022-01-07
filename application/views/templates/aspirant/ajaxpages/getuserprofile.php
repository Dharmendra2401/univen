<?php $getpro=$this->session->userdata('profile'); ?>
<input type="hidden" id="deleteid" value="<?php echo $getpro; ?>" >
<div class="profile-list">
<ul>
<?php  $ii=1; foreach($selectpro as $profilename){?>
<li onclick="return opentemp(<?php echo $profilename['PROFILE_ID'];  ?>)" 
<?php if($getpro!=''){ if($getpro==$profilename['PROFILE_ID']){echo "class='active'";} }
else if($profilename['Is_Primary']=='P'){echo "class='active'"; } else{echo "";} ?> ><span><?php echo $ii; ?>.</span><?php echo $profilename['PROFILE_NAME']; ?> <?php if($profilename['Is_Primary']=='P'){?> <small><i>Primary profile</i></small><?php } ?></li>
<?php $ii++;}  ?>


</ul>

</div>
                            <div class="profile-buttons">
                                <a type="button" value="Scroll" id="scroll"><i class="fas fa-arrow-down"></i></a>
                                <a type="button" value="Scrolltwo" id="scrolltwo"><i class="fas fa-arrow-up"></i></a>
                                <a type="button" ><i class="fas fa-info-circle"></i></a>
                                <a type="button" onclick="return deletepro('');"><i class="fas fa-trash-alt"></i></a>
                            </div>
<script>
var selector = '.profile-list ul li';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});
$(document).ready(function () {
$('#scroll').click(function () {
$('.profile-list').animate({
scrollTop: '+=100'
}, 100);
});
$('#scrolltwo').click(function () {
$('.profile-list').animate({
scrollTop: '-=100'
}, 100);
});
});
</script>