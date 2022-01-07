<?php ?>
<input type="hidden" name="profileidd" id="profileidd" value="<?php echo $gettemp['Profile_Name']; ?>" />
<input type="hidden" name="tempid" id="tempid" value="<?php echo $gettemp['HTML_Sample_Form']; ?>" />
<!-- Template One -->
<?php $getall=explode(' - ',$getvaluess['User_From_Val']); ?>
<?php if($gettemp['HTML_Sample_Form']=='1'){?>
<div class="col-md-6">
    <h5 class="form-title text-left">Profile Details</h5>
    <br>
</div>
<div class="col-md-6 text-right">
    <label
        class="checkbox-class position-relative <?php if($getvaluess['Is_Primary']=='P'){ echo "pointer-none";} ?>"><input
            type="checkbox" name='setprimary' value="P" <?php if($getvaluess['Is_Primary']=='P'){ echo "checked";} ?>
            <?php if($getvaluess['Is_Primary']=='P'){ echo "readonly";} ?>>Your current Primary Profile</label>
</div>

<div class="col-md-4 form-group <?php if(($getall[1]!='NULL')&&($getall[1]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="pay">Pay Per Shift <span class="required">*</span></label>
    <input type="number" min="1000" class="form-input form-control" name="shift" id="shift"
        value="<?php if(($getall[1]!='NULL')&&($getall[1]!='')){ echo $getall[1];} ?>" onkeyup="return prodetailsone()">
</div>
<!-- <?php $getpre=explode(', ',$getall[2]); ?>
<div class="col-md-4 form-group <?php if(($getall[2]!='NULL')&&($getall[2]!='')){ echo "focused";} ?>">
<label class="form-label heading-title" for="prefered">Preferred Work Platform  </label>
<select name="preferd[]" id="preferd" class="form-input form-control example-single" multiple="multiple">

<?php foreach($getplateform as $plateform) {?>
<option value="<?php echo $plateform['Name'];?>" <?php foreach($getpre as $pre){ if($pre==$plateform['Name']){echo "Selected";}} ?>><?php echo $plateform['Name'];?></option>
<?php }  ?>
</select>
</div> -->

<h5 class="items-text col-md-12"><span>Preferred Work Platform</span></h5>

<?php $getpre=explode(',',$getall[2]); ?>
<div id="items" class="row prsentjobparent">
    <div class="form-group position-relative <?php if($getpre[0]!=''){echo "focused";};?> mr-3">

        <input type="text" class="form-input form-control" maxlength="50" id="pwp" onkeyup="return prefworkplate('');"
            name="pwp[]" value="<?php  echo $getpre[0];?>">
        <div class="droping-lists droppingeleven" id="droping-lists" style="display:none">
        </div>

        <input type="hidden" name="selectpwp[]" id="pwpp" value="<?php  echo $getpre[0];?>">
    </div>
    <div class="all_pre content">
        <?php $j=0;$i=0;foreach($getpre as $getpree){?>
        <?php if($j!=0){?>
        <div class="remove form-group position-relative focused">

            <input type="text" class="form-input form-control" maxlength="150" id="pwp<?php echo $i; ?>"
                onkeyup="prefworkplate('<?php echo $i; ?>')" value="<?php echo $getpree; ?>" name="pwp[]">

            <input type="hidden" name="selectpwp[]" id="pwpp<?php echo $i; ?>" value="<?php echo $getpree; ?>">
            <div class="droping-lists droppingeleven<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a
                href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
        </div>

        <?php $i++;} $j++; } ?>

    </div>
    <button type="button" class="addpre addbutton"><i class="far fa-plus-square"></i> </button>
</div>



<div class="col-md-6 form-group <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="address">Headline</label>
    <textarea type="text" class="form-input form-control" maxlength="200" rows="4" id="Headline"
        name="headline"><?php if(($getall[11]!='NULL')&&($getall[12]!='')){ echo $getall[12];} ?></textarea>
</div>

<div class="col-md-6 form-group <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="about">About Yourself</label>
    <textarea type="text" rows='4' class="form-input form-control" maxlength="200" id="aboutyourself"
        name="aboutyourself"><?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo $getall[13];} ?></textarea>
</div>




<div class="col-md-4 form-group <?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo "focused";} ?>">
    <label class="form-label  heading-title" for="color">Hair Color</label>

    <input type="text" class="form-input form-control" maxlength="150" id="haircolor" name="haircolor"
        value="<?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo $getall[3];}  ?>"
        onkeypress="return isString (event);" onkeyup="return haircolors();">
    <div class="droping-lists droping12" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" id="gethaircolor"
        value="<?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo $getall[3];}  ?>" />

</div>

<div class="col-md-4 form-group <?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="complextion">Complextion</label>

    <input type="text" class="form-input form-control" maxlength="150" id="complextion" name="complextion"
        value="<?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo $getall[4];}  ?>"
        onkeypress="return isString (event);" onkeyup="return complextionn();">
    <div class="droping-lists droping13" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" id="getcomplextion"
        value="<?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo $getall[4];}  ?>" />

    <!-- <select class="form-input form-control" maxlength="150" id="complextion" name="complextion">
<option value="" style="display:none;"></option>
<?php foreach ($getcomp as $comp) { ?>
<option value="<?php echo $comp['Name'];?>" <?php if($comp['Name']==$getall[3]){echo "Selected";} ?>><?php echo $comp['Name'];?></option>
<?php } ?>

</select> -->
</div>

<div class="col-md-4 form-group <?php if(($getall[5]!='NULL')&&($getall[5]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="weight">Eye Color</label>

    <input type="text" class="form-input form-control" maxlength="150" id="eyecolor" name="eyecolor"
        value="<?php if(($getall[4]!='NULL')&&($getall[5]!='')){ echo $getall[5];}  ?>"
        onkeypress="return isString (event);" onkeyup="return eyecolorr();">
    <div class="droping-lists droping14" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" id="geteyecolor"
        value="<?php if(($getall[5]!='NULL')&&($getall[5]!='')){ echo $getall[5];}  ?>" />


    <!-- <select type="text" row='3' class="form-input form-control" maxlength="150" id="eyecolor" name="eyecolor">
<option value="" style='display:none'></option>
<?php foreach ($geteyecolor as $eyecolor) { ?>
<option value="<?php echo $eyecolor['Name'];?>" <?php if($eyecolor['Name']==$getall[4]){echo "Selected";} ?>><?php echo $eyecolor['Name'];?></option>
<?php }?>
</select> -->
</div>

<div class="col-md-4 form-group <?php if(($getall[6]!='NULL')&&($getall[6]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="weight">Weight</label>
    <input type="number" min="10" max="200" class="form-input form-control " id="weight" name="weight"
        value="<?php echo $getall[6];?>">
</div>

<div class="col-md-4 form-group <?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="height">Height</label>
    <input type="text" minlength="1" maxlength="4" class="form-input form-control " onkeypress="return isHeight (event)"
        id="height" name="height" value="<?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo $getall[7];} ?>">
</div>

<div class="col-md-4 form-group <?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="bodytype">Body Type</label>

    <input type="text" class="form-input form-control" maxlength="150" id="bodytype" name="bodytype"
        value="<?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo $getall[8];}  ?>"
        onkeypress="return isString (event);" onkeyup="return bodytypee();">
    <div class="droping-lists droping16" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" id="getbodytype"
        value="<?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo $getall[8];}  ?>" />

    <!-- <select  class="form-input form-control">
<option value="" style="display:none;"></option>
<?php foreach ($getbodytype as $bodytype) {?>
<option value="<?php echo $bodytype['Name'];?>" <?php if($bodytype['Name']==$getall[7]){echo "Selected";} ?>><?php echo $bodytype['Name'];?></option>
<?php } ?>
</select> -->
</div>

<div class="col-md-4 form-group <?php if(($getall[9]!='NULL')&&($getall[9]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="bodyshape">Body Shape</label>

    <input type="text" class="form-input form-control" maxlength="150" id="bodyshape" name="bodyshape"
        value="<?php if(($getall[9]!='NULL')&&($getall[9]!='')){ echo $getall[9];}  ?>"
        onkeypress="return isString (event);" onkeyup="return bodyshapee();">
    <div class="droping-lists droping17" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" id="getbodyshape"
        value="<?php if(($getall[9]!='NULL')&&($getall[9]!='')){ echo $getall[9];}  ?>" />
    <!-- <select  class="form-input form-control">
<option value="" style="display:none"></option>
<?php foreach ($getbodyshape as $bodyshape) { ?>
<option value="<?php echo $bodyshape['Name'] ;?>" <?php if($bodyshape['Name']==$getall[9]){echo "Selected";} ?>><?php echo $bodyshape['Name'] ;?></option>
<?php }  ?>
</select> -->
</div>
<div class="col-md-4 form-group"></div>
<!-- <?php $getemps=explode(', ',$getall[10]); ?>
<div class="col-md-6 form-group <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo "focused";} ?>">
<label class="form-label heading-title" for="eyecolor">Additional Details for the Employer</label>
<select class="form-input form-control example-single" id="additionaldetails" name="additionaldetails" multiple="multiple">
<?php foreach ($adddetailempp as $addemp) { ?>
<option value="<?php echo $addemp['Name'] ?>" <?php foreach($getemps as $empssss){ if($empssss==$addemp['Name']){echo "Selected";}}  ?>><?php echo $addemp['Name'] ?> </option>
<?php } ?>
</select>
</div> -->



<div class="col-md-12 form-group">

    <h6 class="form-title title-two text-left">My Profiles <span class="required">*</span></h6>
    <button type="button" name="submit" value="submit" id="buttonregasp"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width42 myprofile1" data-toggle="modal"
        data-target="#addportpholio"
        onclick="return uploadportfolio('<?php echo $gettemp['Profile_Name']; ?>')">Upload</button>

    <button type="button" name="submit" value="submit"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width42">Create</button>
</div>

<h5 class="items-text col-md-12"><span>Additional details for the employer</span></h5>
<?php $adddetail=explode(',',$getall[10]); ?>
<div id="items" class="row prsentjobparent">
    <div class="form-group position-relative <?php if($adddetail[0]!=''){echo "focused";};?> mr-3">
        <input type="text" class="form-input form-control" maxlength="50" id="additionaldetails"
            onkeyup="return adddetails('');" name="additionaldetails[]" value="<?php  echo $adddetail[0];?>">
        <div class="droping-lists droppingeltweleve" id="droping-lists" style="display:none">
        </div>

        <input type="hidden" name="selectadditionaldetails[]" id="additionaldetailss"
            value="<?php  echo $adddetail[0];?>">
    </div>
    <div class="all_add_detail content">
        <?php $j=0;$i=0;foreach($adddetail as $adddet){?>
        <?php if($j!=0){?>
        <div class="remove form-group position-relative focused">
            <input type="text" class="form-input form-control" maxlength="150" id="additionaldetails<?php echo $i; ?>"
                onkeyup="adddetails('<?php echo $i; ?>')" value="<?php echo $adddet; ?>" name="additionaldetails[]">

            <input type="hidden" name="selectadditionaldetails[]" id="additionaldetailss<?php echo $i; ?>"
                value="<?php echo $adddet; ?>">
            <div class="droping-lists droppingeltweleve<?php echo $i; ?>" id="droping-lists" style="display:none"></div>
            <a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
        </div>

        <?php $i++;} $j++; } ?>

    </div>
    <button type="button" class="addempdetail addbutton"><i class="far fa-plus-square"></i> </button>
</div>





<!-- <?php $getchoicess=explode(', ',$getall[11]); ?>
<div class="col-md-6 form-group  <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo "focused";} ?>">
<label class="form-label heading-title" for="choiceindustry">Choice of Industry</label>
<select class="form-input form-control example-single" name="getchoices" id="getchoices" multiple="multiple">
<?php foreach ($getchoice as $choice) { ?>
<option value="<?php echo $choice['Name'] ?>" <?php foreach($getchoicess as $choi){ if($choi==$choice['Name']){ echo "Selected";}} ?>><?php echo $choice['Name'] ?> </option>
<?php } ?>
</select>

</div> -->


<h5 class="items-text col-md-12"><span>Choice of Industry</span></h5>
<?php $choiceone=explode(',',$getall[11]); ?>
<div id="items" class="row prsentjobparent">
    <div class="form-group position-relative <?php if($choiceone[0]!=''){echo "focused";};?> mr-3">
        <input type="text" class="form-input form-control" maxlength="50" id="choiceofindustry"
            onkeyup="return choiceofindustrysone('');" name="choiceofindustrysone[]"
            value="<?php  echo $choiceone[0];?>">
        <div class="droping-lists droppingthrteen" id="droping-lists" style="display:none">
        </div>

        <input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy"
            value="<?php  echo $choiceone[0];?>">
    </div>
    <div class="all_choice_one content">
        <?php $j=0;$i=0;foreach($choiceone as $getchoices){?>
        <?php if($j!=0){?>
        <div class="remove form-group position-relative focused">
            <input type="text" class="form-input form-control" maxlength="150" id="choiceofindustry<?php echo $i; ?>"
                onkeyup="choiceofindustrysone('<?php echo $i; ?>')" value="<?php echo $getchoices; ?>"
                name="choiceofindustrysone[]">

            <input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy<?php echo $i; ?>"
                value="<?php echo $getchoices; ?>">
            <div class="droping-lists droppingthrteen<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a
                href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
        </div>

        <?php $i++;} $j++; } ?>

    </div>
    <button type="button" class="choiceonebutton addbutton"><i class="far fa-plus-square"></i> </button>
</div>




<div class="col-md-12 mt-2 font15 mb-3"><label class="mr-3 ">Active Social Media Handles</label></div>

<div class="col-md-6">

    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="youtube"
                    name="youtube"
                    <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo 'Checked';} ?>>Youtube</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo "focused";} ?>"
                id="youtubelink"
                <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>
                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="200" name="youtubelink"
                    value="<?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo $getall[14];} ?>"
                    onkeyup="return prodetailsone()"><br>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="facebook"
                    name="facebook"
                    <?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo 'Checked';} ?>>Facebook</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo "focused";} ?>"
                id="facebooklink"
                <?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="100" name="facebooklink"
                    value="<?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo $getall[15];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="instagram"
                    name="instagram"
                    <?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo 'Checked';} ?>>Instagram</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo "focused";} ?>"
                id="instalink"
                <?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="200" name="instalink"
                    value="<?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo $getall[16];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="twitter"
                    name="twitter"
                    <?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo 'Checked';} ?>>Twitter</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo "focused";} ?>"
                id="twitterlink"
                <?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="100" name="twitterlink"
                    value="<?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo $getall[17];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>


</div>
</div>
</div>

<div class="col-md-6">

    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="linkedin"
                    name="linkedin"
                    <?php if(($getall[18]!='NULL')&&($getall[18]!='')){ echo 'Checked';} ?>>Linkedin</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[18]!='NULL')&&($getall[18]!='')){ echo "focused";} ?>"
                id="linkedinlink"
                <?php if(($getall[18]!='NULL')&&($getall[18]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="200" name="linkedinlink"
                    value="<?php if(($getall[18]!='NULL')&&($getall[18]!='')){ echo $getall[18];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="behance"
                    name="behance"
                    <?php if(($getall[19]!='NULL')&&($getall[19]!='')){ echo 'Checked';} ?>>Behance</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[19]!='NULL')&&($getall[19]!='')){ echo "focused";} ?>"
                id="behancelink"
                <?php if(($getall[19]!='NULL')&&($getall[19]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="200" name="behancelink"
                    value="<?php if(($getall[19]!='NULL')&&($getall[19]!='')){ echo $getall[19];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="googleplus"
                    name="googleplus" <?php if(($getall[20]!='NULL')&&($getall[20]!='')){ echo 'Checked';} ?>>Google
                Plus</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[20]!='NULL')&&($getall[20]!='')){ echo "focused";} ?>"
                id="googlepluslink"
                <?php if(($getall[20]!='NULL')&&($getall[20]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="200" name="googlepluslink"
                    value="<?php if(($getall[20]!='NULL')&&($getall[20]!='')){ echo $getall[20];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 social-label">
            <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="dribbble"
                    name="dribbble"
                    <?php if(($getall[21]!='NULL')&&($getall[21]!='')){ echo 'Checked';} ?>>Dribbble</label><br>
        </div>
        <div class="col-md-7">
            <div class="form-group position-relative  mb-0 <?php if(($getall[21]!='NULL')&&($getall[21]!='')){ echo "focused";} ?>"
                id="dribbblelink"
                <?php if(($getall[21]!='NULL')&&($getall[21]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                <label class="form-label heading-title">Add link here</label>
                <input type="url" class="form-input form-control" maxlength="200" name="dribbblelink"
                    value="<?php if(($getall[21]!='NULL')&&($getall[21]!='')){ echo $getall[21];} ?>"
                    onkeyup="return prodetailsone()"><br>
            </div>
        </div>
    </div>



</div>
</div>

</div>
<div class="form-group select col-md-12 text-center mt-4">
    <button type="button" name="profileditailsone" value="profileditailsone" id="profiledetailone"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width253" disabled
        onclick="return profileonedetail()">Save</button>
</div>
<br>





<!-- Template Two -->


<?php } if($gettemp['HTML_Sample_Form']=='2'){?>

<div class="col-md-6">
    <h5 class="form-title text-left">Profile Details</h5>
    <br>
</div>
<div class="col-md-6 text-right">
    <label
        class="checkbox-class position-relative <?php if($getvaluess['Is_Primary']=='P'){ echo "pointer-none";} ?>"><input
            type="checkbox" name='setprimary' value="P" <?php if($getvaluess['Is_Primary']=='P'){ echo "checked";} ?>
            <?php if($getvaluess['Is_Primary']=='P'){ echo "readonly";} ?>>Your current Primary Profile</label>
</div>

<div class="col-md-4 form-group <?php if(($getall[1]!='NULL')&&($getall[1]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="pay">Pay Per Shift <span class="required">*</span></label>
    <input type="number" min="1000" class="form-input form-control" name="profile[]" id="shift"
        value="<?php if(($getall[1]!='NULL')&&($getall[1]!='')){ echo $getall[1];} ?>" onkeyup="return prodetailsone()">
</div>
<div class="col-md-6"></div>




<div class="col-md-12 form-group">

    <h6 class="form-title title-two text-left">My Profiles <span class="required">*</span></h6>
    <button type="button" name="submit" value="submit" id="buttonregasp"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width42 myprofile3" data-toggle="modal"
        data-target="#addportpholio"
        onclick="return uploadportfolio('<?php echo $gettemp['Profile_Name']; ?>')">Upload</button>

    <button type="button" name="submit" value="submit" 
        class="btn btn-primary d-inline-block d-sm-block btn-modal width42">Create</button>
</div>


<div class="col-md-6 form-group <?php if(($getall[2]!='NULL')&&($getall[2]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="address">Headline</label>
    <textarea type="text" class="form-input form-control" maxlength="200" rows="4" id="Headline"
        name="profile[]"><?php if(($getall[2]!='NULL')&&($getall[2]!='')){ echo $getall[2];} ?></textarea>
</div>

<div class="col-md-6 form-group <?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="about">About Yourself</label>
    <textarea type="text" rows='4' class="form-input form-control" maxlength="200" id="aboutyourself"
        name="profile[]"><?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo $getall[3];} ?></textarea>
</div>


<!-- <div class="col-md-4 form-group  <?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo "focused";} ?>">
<label class="form-label heading-title" for="choiceindustry">Choice of Industry</label>

<input type="text" class="form-input form-control" maxlength="150" id="choiceindustrytwo" name="choiceindustrytwo" value="<?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo $getall[4];}  ?>" onkeypress="return isString (event);" onkeyup="return choiceindustrytwoo();">
<div class="droping-lists dropingten" id="droping-lists" style="display:none">
</div>

<input type="hidden" name="profile[]" id="getchoicetwo" value="<?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo $getall[4];}  ?>" />
</div> -->

<!--<h5 class="items-text col-md-12"><span>Choice of Industry1</span></h5>-->
<!--<?php $choiceone=explode(',',$getall[4]); ?>-->
<!--<div id="items" class="row prsentjobparent">-->
<!--    <div class="form-group position-relative <?php if($choiceone[0]!=''){echo "focused";};?> mr-3">-->
<!--        <input type="text" class="form-input form-control" maxlength="50" id="choiceofindustrytwo"-->
<!--            onkeyup="return choiceofindustrytwooo('');" onkeypress="return isString (event);"-->
<!--            name="choiceofindustrytwo[]" value="<?php  echo $choiceone[0];?>">-->
<!--        <div class="droping-lists droppingfourteen" id="droping-lists" style="display:none">-->
<!--        </div>-->

<!--        <input type="hidden" name="choiceofindustrytwoo[]" id="choiceofindustrytwoo"-->
<!--            value="<?php  echo $choiceone[0];?>">-->
<!--    </div>-->
<!--    <div class="all_choice_two content">-->
<!--        <?php $j=0;$i=0;foreach($choiceone as $getchoices){?>-->
<!--        <?php if($j!=0){?>-->
<!--        <div class="remove form-group position-relative focused">-->
<!--            <input type="text" class="form-input form-control" maxlength="150"-->
<!--                id="choiceofindustrytwoo<?php echo $i; ?>" onkeyup="choiceofindustrytwooo('<?php echo $i; ?>')"-->
<!--                value="<?php echo $getchoices; ?>" name="choiceofindustrytwo[]" onkeypress="return isString (event);">-->

<!--            <input type="hidden" name="choiceofindustrytwoo[]" id="choiceofindustrytwoo<?php echo $i; ?>"-->
<!--                value="<?php echo $getchoices; ?>">-->
<!--            <div class="droping-lists droppingfourteen<?php echo $i; ?>" id="droping-lists" style="display:none"></div>-->
<!--            <a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>-->
<!--        </div>-->

<!--        <?php $i++;} $j++; } ?>-->

<!--    </div>-->
<!--    <button type="button" class="choiceonebuttontwo addbutton"><i class="far fa-plus-square"></i> </button>-->
<!--</div>-->


<h5 class="items-text col-md-12"><span>Choice of Industry1</span></h5>
<?php $choiceone=explode(',',$getall[4]); ?>
<div id="items" class="row prsentjobparent">
    <div class="form-group position-relative <?php if($choiceone[0]!=''){echo "focused";};?> mr-3">
        <input type="text" class="form-input form-control" maxlength="50" id="choiceofindustry"
            onkeyup="return choiceofindustrysone('');" name="choiceofindustrysone[]"
            value="<?php  echo $choiceone[0];?>">
        <div class="droping-lists droppingthrteen" id="droping-lists" style="display:none">
        </div>

        <input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy"
            value="<?php  echo $choiceone[0];?>">
    </div>
    <div class="all_choice_one content">
        <?php $j=0;$i=0;foreach($choiceone as $getchoices){?>
        <?php if($j!=0){?>
        <div class="remove form-group position-relative focused">
            <input type="text" class="form-input form-control" maxlength="150" id="choiceofindustry<?php echo $i; ?>"
                onkeyup="choiceofindustrysone('<?php echo $i; ?>')" value="<?php echo $getchoices; ?>"
                name="choiceofindustrysone[]">

            <input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy<?php echo $i; ?>"
                value="<?php echo $getchoices; ?>">
            <div class="droping-lists droppingthrteen<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a
                href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
        </div>

        <?php $i++;} $j++; } ?>

    </div>
    <button type="button" class="choiceonebutton addbutton"><i class="far fa-plus-square"></i> </button>
</div>



<div
    class="col-md-4 form-group position-relative <?php if(($getall[5]!='NULL')&&($getall[5]!='')){ echo "focused";} ?> mr-3">
    <label class="form-label heading-title" for="Preferred Genre">Preferred Genre</label>
    <input type="text" class="form-input form-control" maxlength="50" id="preferdgere" onkeyup="return preferdgereee();"
        name="preferdgere" value="<?php  echo $getall[5];?>">
    <div class="droping-lists dropinggpreferdgere" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" name="selectpreferdgere" id="preferdgeree" value="<?php  echo $getall[5];?>">
</div>

<div class="row col-md-12">

    <div class="col-md-12 mt-2 font15 mb-3"><label class="mr-3 ">Active Social Media Handles</label></div>

    <div class="col-md-6">

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="youtube"
                        name="youtube"
                        <?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo 'Checked';} ?>>Youtube</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo "focused";} ?>"
                    id="youtubelink"
                    <?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>
                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="youtubelink"
                        value="<?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo $getall[7];} ?>"
                        onkeyup="return prodetailsone()"><br>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="facebook"
                        name="facebook"
                        <?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo 'Checked';} ?>>Facebook</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo "focused";} ?>"
                    id="facebooklink"
                    <?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="100" name="facebooklink"
                        value="<?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo $getall[8];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="instagram"
                        name="instagram"
                        <?php if(($getall[9]!='NULL')&&($getall[9]!='')){ echo 'Checked';} ?>>Instagram</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[7]!='NULL')&&($getall[7]!='')){ echo "focused";} ?>"
                    id="instalink"
                    <?php if(($getall[9]!='NULL')&&($getall[9]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="instalink"
                        value="<?php if(($getall[9]!='NULL')&&($getall[9]!='')){ echo $getall[9];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="twitter"
                        name="twitter"
                        <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo 'Checked';} ?>>Twitter</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo "focused";} ?>"
                    id="twitterlink"
                    <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="100" name="twitterlink"
                        value="<?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo $getall[10];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>


    </div>


    <div class="col-md-6">

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="linkedin"
                        name="linkedin"
                        <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo 'Checked';} ?>>Linkedin</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo "focused";} ?>"
                    id="linkedinlink"
                    <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="linkedinlink"
                        value="<?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo $getall[11];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="behance"
                        name="behance"
                        <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo 'Checked';} ?>>Behance</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo "focused";} ?>"
                    id="behancelink"
                    <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="behancelink"
                        value="<?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo $getall[12];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="googleplus"
                        name="googleplus" <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo 'Checked';} ?>>Google
                    Plus</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo "focused";} ?>"
                    id="googlepluslink"
                    <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="googlepluslink"
                        value="<?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo $getall[13];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="dribbble"
                        name="dribbble"
                        <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo 'Checked';} ?>>Dribbble</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo "focused";} ?>"
                    id="dribbblelink"
                    <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="dribbblelink"
                        value="<?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo $getall[14];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>



    </div>

</div>

<h5 class="items-text col-md-12"><span>Softwares</span></h5>
<?php $softss=explode(', ',$getall[6]);  ?>
<div id="items" class="row">
    <div class="form-group position-relative <?php if($softss[0]!=''){echo "focused";};?> mr-3">

        <input type="text" class="form-input form-control" maxlength="50" id="softtwo"
            onkeyup="return softwarestwo('');" name="softtwo[]" value="<?php  echo $softss[0];?>">
        <div class="droping-lists dropinggonetwo" id="droping-lists" style="display:none">
        </div>

        <input type="hidden" name="selectsoftwarestwo[]" id="softwaresstwo" value="<?php  echo $softss[0];?>">
    </div>
    <div class="all_softwarestwo content">
        <?php $j=0;$i=0;foreach($softss as $softsss){?>
        <?php if($j!=0){?>
        <div class="remove form-group position-relative focused">
            <input type="text" class="form-input form-control" maxlength="150" id="soft<?php echo $i; ?>"
                onkeyup="softwarestwo('<?php echo $i; ?>')" value="<?php echo $softsss; ?>" name="softtwo[]">
            <input type="hidden" name="selectsoftwarestwo[]" id="softwaresstwo<?php echo $i; ?>"
                value="<?php echo $softsss; ?>">
            <div class="droping-lists dropinggonetwo<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a
                href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
        </div>

        <?php $i++;} $j++; } ?>

    </div>
    <button type="button" class="addsoftwarestwo addbutton"><i class="far fa-plus-square"></i> </button>
</div>


<div class="col-md-4 form-group <?php if(($getall[15]!='')&&($getall[15]!='NULL')){echo "focused";};?>">
    <label class="form-label heading-title" for="projectvaluw">Project Value </label>
    <input type="number" min="1000" class="form-input form-control filled" name="projectvalues" id="projectvalues"
        value="<?php echo $getall[15]; ?>">
</div>


</div>
<div class="form-group select col-md-12 text-center mt-4">
    <button type="button" name="profileditailstwo" value="profileditailstwo" id="profiledetailone"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width253 profileditailstwo" disabled
        onclick="return profiledetailtwo();">Save</button>
</div>
<br>






<?php }  if($gettemp['HTML_Sample_Form']=='3'){?>
<div class="col-md-6">
    <h5 class="form-title text-left">Profile Details</h5>
    <br>
</div>
<div class="col-md-6 text-right">
    <label
        class="checkbox-class position-relative <?php if($getvaluess['Is_Primary']=='P'){ echo "pointer-none";} ?>"><input
            type="checkbox" name='setprimary' value="P" <?php if($getvaluess['Is_Primary']=='P'){ echo "checked";} ?>
            <?php if($getvaluess['Is_Primary']=='P'){ echo "readonly";} ?>>Your current Primary Profile</label>
</div>

<div class="col-md-4 form-group <?php if(($getall[1]!='NULL')&&($getall[1]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="pay">Pay Per Shift <span class="required">*</span></label>
    <input type="number" min="1000" class="form-input form-control" name="profile[]" id="shift"
        value="<?php if(($getall[1]!='NULL')&&($getall[1]!='')){ echo $getall[1];} ?>" onkeyup="return prodetailsone()">
</div>
<div class="col-md-6"></div>



<div class="col-md-12 form-group">

    <h6 class="form-title title-two text-left">My Profiles <span class="required">*</span></h6>
    <button type="button" name="submit" value="submit" id="buttonregasp"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width42 myprofile2" data-toggle="modal"
        data-target="#addportpholio"
        onclick="return uploadportfolio('<?php echo $gettemp['Profile_Name']; ?>')">Upload</button>

    <button type="button" name="submit" value="submit" 
        class="btn btn-primary d-inline-block d-sm-block btn-modal width42">Create</button>
</div>

<div class="col-md-6 form-group <?php if(($getall[2]!='NULL')&&($getall[2]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="address">Headline</label>
    <textarea type="text" class="form-input form-control" maxlength="200" rows="4" id="Headline"
        name="profile[]"><?php if(($getall[2]!='NULL')&&($getall[2]!='')){ echo $getall[2];} ?></textarea>
</div>

<div class="col-md-6 form-group <?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="about">About Yourself</label>
    <textarea type="text" rows='4' class="form-input form-control" maxlength="200" id="aboutyourself"
        name="profile[]"><?php if(($getall[3]!='NULL')&&($getall[3]!='')){ echo $getall[3];} ?></textarea>
</div>

<div class="col-md-4 form-group <?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo "focused";} ?>">
    <label class="form-label heading-title" for="No. of Projects Handled">No. of Projects Handled <span
            class="required">*</span></label>
    <input type="number" min="1" class="form-input form-control" name="noofprojects" id="noofprojects"
        value="<?php if(($getall[4]!='NULL')&&($getall[4]!='')){ echo $getall[4];} ?>" onkeyup="return prodetailsone()">
</div>




<div class="col-md-8 form-group mt-2 font15">

    <label class="radio form-radio">
        <input type="radio" name="wstatus" value="Corporate" <?php if($getall[5]=='Corporate'){echo "Checked";} ?>>
        <span>Corporate</span></label>
    <label class="radio form-radio">
        <input type="radio" name="wstatus" value="Non Corporate"
            <?php if($getall[5]=='Non Corporate'){echo "Checked";} ?>>
        <span>Non Corporate</span></label>

</div>

<h5 class="items-text col-md-12"><span>Choice of Industry</span></h5>
<?php $choiceone=explode(',',$getall[6]); ?>
<div id="items" class="row prsentjobparent">
    <div class="form-group position-relative <?php if($choiceone[0]!=''){echo "focused";};?> mr-3">
        <input type="text" class="form-input form-control" maxlength="50" id="choiceofindustry"
            onkeyup="return choiceofindustrysthree('');" name="choiceofindustrysone[]"
            value="<?php  echo $choiceone[0];?>">
        <div class="droping-lists droppingthrteen" id="droping-lists" style="display:none">
        </div>

        <input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy"
            value="<?php  echo $choiceone[0];?>">
    </div>
    <div class="all_choice_three content">
        <?php $j=0;$i=0;foreach($choiceone as $getchoices){?>
        <?php if($j!=0){?>
        <div class="remove form-group position-relative focused">
            <input type="text" class="form-input form-control" maxlength="150" id="choiceofindustry<?php echo $i; ?>"
                onkeyup="choiceofindustrysthree('<?php echo $i; ?>')" value="<?php echo $getchoices; ?>"
                name="choiceofindustrysone[]">

            <input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy<?php echo $i; ?>"
                value="<?php echo $getchoices; ?>">
            <div class="droping-lists droppingthrteen<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a
                href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
        </div>

        <?php $i++;} $j++; } ?>

    </div>
    <button type="button" class="choiceonebuttonthree addbutton"><i class="far fa-plus-square"></i> </button>
</div>

<div
    class="col-md-4 form-group position-relative <?php if(($getall[8]!='NULL')&&($getall[8]!='')){ echo "focused";} ?> mr-3">
    <label class="form-label heading-title" for="Preferred Genre">Preferred Genre</label>
    <input type="text" class="form-input form-control" maxlength="50" id="preferdgere" onkeyup="return preferdgereee();"
        name="preferdgere" value="<?php  echo $getall[8];?>">
    <div class="droping-lists dropinggpreferdgere" id="droping-lists" style="display:none">
    </div>

    <input type="hidden" name="selectpreferdgere" id="preferdgeree" value="<?php  echo $getall[8];?>">
</div>


<div class="col-md-12 mt-2 font15 mb-3"><label class="mr-3 ">Active Social Media Handles</label></div>
<div class="row col-md-12">
    <div class="col-md-6">

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="youtube"
                        name="youtube"
                        <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo 'Checked';} ?>>Youtube</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo "focused";} ?>"
                    id="youtubelink"
                    <?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>
                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="youtubelink"
                        value="<?php if(($getall[10]!='NULL')&&($getall[10]!='')){ echo $getall[10];} ?>"
                        onkeyup="return prodetailsone()"><br>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="facebook"
                        name="facebook"
                        <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo 'Checked';} ?>>Facebook</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo "focused";} ?>"
                    id="facebooklink"
                    <?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="100" name="facebooklink"
                        value="<?php if(($getall[11]!='NULL')&&($getall[11]!='')){ echo $getall[11];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="instagram"
                        name="instagram"
                        <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo 'Checked';} ?>>Instagram</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo "focused";} ?>"
                    id="instalink"
                    <?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="instalink"
                        value="<?php if(($getall[12]!='NULL')&&($getall[12]!='')){ echo $getall[12];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="twitter"
                        name="twitter"
                        <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo 'Checked';} ?>>Twitter</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo "focused";} ?>"
                    id="twitterlink"
                    <?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="100" name="twitterlink"
                        value="<?php if(($getall[13]!='NULL')&&($getall[13]!='')){ echo $getall[13];} ?>"
                        onkeyup="return prodetailsone()"> <br>
                </div>
            </div>
        </div>


    </div>


    <div class="col-md-6">

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="linkedin"
                        name="linkedin"
                        <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo 'Checked';} ?>>Linkedin</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo "focused";} ?>"
                    id="linkedinlink"
                    <?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="linkedinlink"
                        value="<?php if(($getall[14]!='NULL')&&($getall[14]!='')){ echo $getall[14];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="behance"
                        name="behance"
                        <?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo 'Checked';} ?>>Behance</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo "focused";} ?>"
                    id="behancelink"
                    <?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="behancelink"
                        value="<?php if(($getall[15]!='NULL')&&($getall[15]!='')){ echo $getall[15];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="googleplus"
                        name="googleplus" <?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo 'Checked';} ?>>Google
                    Plus</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo "focused";} ?>"
                    id="googlepluslink"
                    <?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="googlepluslink"
                        value="<?php if(($getall[16]!='NULL')&&($getall[16]!='')){ echo $getall[16];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 social-label">
                <label class="checkbox-class position-relative form-checkbox"><input type="checkbox" value="dribbble"
                        name="dribbble"
                        <?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo 'Checked';} ?>>Dribbble</label><br>
            </div>
            <div class="col-md-7">
                <div class="form-group position-relative  mb-0 <?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo "focused";} ?>"
                    id="dribbblelink"
                    <?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo '';} else{echo 'style="display:none;"';} ?>>

                    <label class="form-label heading-title">Add link here</label>
                    <input type="url" class="form-input form-control" maxlength="200" name="dribbblelink"
                        value="<?php if(($getall[17]!='NULL')&&($getall[17]!='')){ echo $getall[17];} ?>"
                        onkeyup="return prodetailsone()"><br>
                </div>
            </div>
        </div>



    </div>


    <h5 class="items-text col-md-12"><span>Additional Details for the
            Employers</span></h5>
    <?php $adddetail=explode(',',$getall[7]); ?>
    <div id="items" class="row prsentjobparent">
        <div class="form-group position-relative <?php if($adddetail[0]!=''){echo "focused";};?> mr-3">

            <input type="text" class="form-input form-control" maxlength="50" id="additionaldetails"
                onkeyup="return adddetails('');" name="additionaldetails[]" value="<?php  echo $adddetail[0];?>">
            <div class="droping-lists droppingeltweleve" id="droping-lists" style="display:none">
            </div>

            <input type="hidden" name="selectadditionaldetails[]" id="additionaldetailss"
                value="<?php  echo $adddetail[0];?>">
        </div>
        <div class="all_add_detail content">
            <?php $j=0;$i=0;foreach($adddetail as $adddet){?>
            <?php if($j!=0){?>
            <div class="remove form-group position-relative focused">
                <input type="text" class="form-input form-control" maxlength="150"
                    id="additionaldetails<?php echo $i; ?>" onkeyup="adddetails('<?php echo $i; ?>')"
                    value="<?php echo $adddet; ?>" name="additionaldetails[]">

                <input type="hidden" name="selectadditionaldetails[]" id="additionaldetailss<?php echo $i; ?>"
                    value="<?php echo $adddet; ?>">
                <div class="droping-lists droppingeltweleve<?php echo $i; ?>" id="droping-lists" style="display:none">
                </div>
                <a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a>
            </div>

            <?php $i++;} $j++; } ?>

        </div>
        <button type="button" class="addempdetail addbutton"><i class="far fa-plus-square"></i> </button>
    </div>


    <h5 class="items-text col-md-12"><span>Softwares</span></h5>
    <?php $softss=explode(', ',$getall[9]);  ?>
    <div id="items" class="row">
        <div class="form-group position-relative <?php if($softss[0]!=''){echo "focused";};?> mr-3">
            <input type="text" class="form-input form-control" maxlength="50" id="softtwo"
                onkeyup="return softwarestwo('');" name="softtwo[]" value="<?php  echo $softss[0];?>">
            <div class="droping-lists dropinggonetwo" id="droping-lists" style="display:none">
            </div>

            <input type="hidden" name="selectsoftwarestwo[]" id="softwaresstwo" value="<?php  echo $softss[0];?>">
        </div>
        <div class="all_softwarestwo content">
            <?php $j=0;$i=0;foreach($softss as $softsss){?>
            <?php if($j!=0){?>
            <div class="remove form-group position-relative focused">
                <input type="text" class="form-input form-control" maxlength="150" id="soft<?php echo $i; ?>"
                    onkeyup="softwarestwo('<?php echo $i; ?>')" value="<?php echo $softsss; ?>" name="softtwo[]">
                <input type="hidden" name="selectsoftwarestwo[]" id="softwaresstwo<?php echo $i; ?>"
                    value="<?php echo $softsss; ?>">
                <div class="droping-lists dropinggonetwo<?php echo $i; ?>" id="droping-lists" style="display:none">
                </div><a href="#" class="remove-field btn-remove-customer removeall"><i
                        class="far fa-trash-alt"></i></a>
            </div>

            <?php $i++;} $j++; } ?>

        </div>
        <button type="button" class="addsoftwarestwo addbutton"><i class="far fa-plus-square"></i> </button>
    </div>

    <div class="col-md-4 form-group <?php if(($getall[18]!='')&&($getall[18]!='NULL')){echo "focused";};?>">
        <label class="form-label heading-title" for="projectvaluw">Project Value </label>
        <input type="number" min="1000" class="form-input form-control filled" name="projectvalues" id="projectvalues"
            value="<?php echo $getall[18]; ?>">
    </div>



</div>
<div class="form-group select col-md-12 text-center mt-4">
    <button type="button" name="profileditailstwo" value="profileditailstwo" id="profiledetailone"
        class="btn btn-primary d-inline-block d-sm-block btn-modal width253 profileditailstwo" disabled
        onclick="return profiledetailthree();">Save</button>
</div>
<br>

<?php } ?>

<div class="modal fade" id="addportpholio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header mod-head">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <h5 class="text-center pb-2">Portfolio Details</h5>
                <h6 class="pb-2 text-center upload-content">Upload files according to your choice to be visible on your
                    profile.</h6>
                <div class="popupmodal addprofiles" autocomplete="off" id="porfolioform">
                    <input type="hidden" id="portpholioproid">
                    <nav class="portpholio-tabs">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-link-tab" data-toggle="tab" href="#nav-link"
                                role="tab" aria-controls="nav-link" aria-selected="true">Link</a>
                            <a class="nav-item nav-link" id="nav-images-tab" data-toggle="tab" href="#nav-images"
                                role="tab" aria-controls="nav-images" aria-selected="false">Images</a>
                            <a class="nav-item nav-link" id="nav-videos-tab" data-toggle="tab" href="#nav-videos"
                                role="tab" aria-controls="nav-videos" aria-selected="false">Videos</a>
                            <a class="nav-item nav-link" id="nav-documentssss-tab" data-toggle="tab"
                                href="#nav-documentssss" role="tab" aria-controls="nav-documentssss"
                                aria-selected="false">Documents</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active tabing-portfolio" id="nav-link" role="tabpanel"
                            aria-labelledby="nav-link-tab">
                            <div class="row popupmodal mt-4">
                                <div class="col-md-12">
                                    <h6 class="pb-2 text-left upload-content">Upload links to your portfolio here!</h6>
                                </div>
                                <div id="" class="col-md-6">
                                    <div class="form-group position-relative mr-0">
                                        <label class="form-label heading-title" for="url">Title</label>
                                        <input type="text" class="form-input form-control" maxlength="title"
                                            name="title[]" id="titleone" onkeyup="return validateformone();">

                                    </div>
                                </div>

                                <div id="" class="col-md-6">
                                    <div class="form-group position-relative mr-0">
                                        <label class="form-label heading-title" for="url">Url</label>
                                        <input type="url" class="form-input form-control" maxlength="200"
                                            id="linkurlport" name="linkurl[]" onkeyup="return validateformone();">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="getlinks" class="row"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <br>
                                <button type="button" name="addportfolio" value="addportfolio"
                                    class="btn btn-primary width42 mr-0" onclick="return portfolioformone();"
                                    id="addlinksss">Save &
                                    Updates</button>
                            </div>
                        </div>



                        <div class="tab-pane fade tabing-portfolio" id="nav-images" role="tabpanel"
                            aria-labelledby="nav-images-tab">
                            <form class="imageform" id="imageform">
                                <input type="hidden" name="imageid" id="imageid"
                                    value="<?php echo $gettemp['Profile_Name']; ?>" />
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="pb-2 text-left upload-content">Add your portfolio images here! You
                                            can add up to 20 images that will be visible on your profile.</h6>
                                    </div>
                                    <div class="col-md-3 float-right">
                                        <label class="image-upload float-right proimage" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Please select image size of minimum 700kb and maximum 1mb">Upload
                                            <input type="file" accept="image/jpeg"
                                                onchange="return Filevalidation(event);" id="file" name="image" class="imageinput">
                                        </label>

                                    </div>
                                    <div class="col-md-12 portfolioimageerror"></div>

                                    <div class="col-md-12">
                                        <div id="getimages" class="row"></div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <br>
                                    <button type="submit" name="addportfolio" value="addportfolio"
                                        class="btn btn-primary width42 mr-0" id="addimagess">Save & Updates</button>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane fade tabing-portfolio" id="nav-videos" role="tabpanel"
                            aria-labelledby="nav-videos-tab">
                            <form class="vedioform" id="vedioform">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="pb-2 text-left upload-content">Add videos links here!</h6>
                                    </div>





                                    <div id="" class="col-md-6">
                                        <div class="form-group position-relative mr-3">
                                            <label class="form-label heading-title" for="url">Url</label>
                                            <input type="text" class="form-input form-control" maxlength="200"
                                                id="addvedio" name="vediourlone[]" data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Please select iframe url of youtube videos"
                                                onkeyup="return validationvedio();">
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div id="getvedios" class="row"></div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <button type="button" onclick="return portfolioformvedio();"
                                            class="btn btn-primary width42 mr-0" id="formvedio">Save & Updates</button>
                                    </div>
                                </div>
                            </form>
                        </div>



                        <div class="tab-pane fade tabing-portfolio" id="nav-documentssss" role="tabpanel"
                            aria-labelledby="nav-document-tab">
                            <form id="documentform" class="document">
                                <input type="hidden" name="imageid" id="imageid"
                                    value="<?php echo $gettemp['Profile_Name']; ?>" />

                                <div class="row">

                                    <div class="col-md-12" id="docformssss">
                                        <h6 class="pb-2 text-left upload-content">Add documents related to your
                                            portfolio here.</h6>
                                    </div>

                                    <div id="" class="col-md-6">
                                        <div class="form-group position-relative mr-0">
                                            <label class="form-label heading-title" for="url">Title</label>
                                            <form></form>
                                            <input type="text" class="form-input form-control" maxlength="50"
                                                id="documenttitle" name="documenttitle">

                                        </div>
                                    </div>


                                    <div id="" class="col-md-6">
                                        <div class="form-group position-relative mr-0">

                                            <div class="file-upload">
                                                <div class="file-select" data-toggle="tooltip" data-placement="top"
                                                    title="Select document">

                                                    <div class="file-select-name" id="noFile">Select Document</div>
                                                    <input type="file" name="chooseFile" id="chooseFile"
                                                        class="choosefile"
                                                        accept=".pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                    <div class="file-select-button" id="fileName"><i
                                                            class="fas fa-link"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div id="getdocument" class="row"></div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-primary width42 mr-0">Save &
                                            Updates</button>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer text-center d-block border-0 mb-2">

                    </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <script>
    function validateURL(textval) {

        var urlregex = new RegExp(
            "^" +
            // protocol identifier
            "(?:(?:https?|http)://)" +
            // user:pass authentication
            "(?:\\S+(?::\\S*)?@)?" +
            "(?:" +
            // IP address exclusion
            // private & local networks
            "(?!(?:10|127)(?:\\.\\d{1,3}){3})" +
            "(?!(?:169\\.254|192\\.168)(?:\\.\\d{1,3}){2})" +
            "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" +
            // IP address dotted notation octets
            // excludes loopback network 0.0.0.0
            // excludes reserved space >= 224.0.0.0
            // excludes network & broacast addresses
            // (first & last IP address of each class)
            "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" +
            "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" +
            "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" +
            "|" +
            // host name
            "(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)" +
            // domain name
            "(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*" +
            // TLD identifier
            "(?:\\.(?:[a-z\\u00a1-\\uffff]{2,}))" +
            ")" +
            // port number
            "(?::\\d{2,5})?" +
            // resource path
            "(?:/\\S*)?" +
            "$", "i"
        );
        return urlregex.test(textval);
    }
    getimages();
    getvedios();
    getlinks();
    getdocument();

    function getlinks() {
        var portpholioproid = '<?php echo $gettemp['Profile_Name']; ?>';
        $("#getlinks").html('<div class="col-md-12 text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        $.ajax({
            method: 'POST',
            url: 'getlinks',
            data: {
                'portpholioproid': portpholioproid
            },
            success: function(getlinks) {
                $('#getlinks').html(getlinks);
                prodetailsone()
            }
        })
    }

    function getvedios() {
        var portpholioproid = '<?php echo $gettemp['Profile_Name']; ?>';
        $("#getvedios").html('<div class="col-md-12 text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        $.ajax({
            method: 'POST',
            url: 'getvedios',
            data: {
                'portpholioproid': portpholioproid
            },
            success: function(getlinks) {
                $('#getvedios').html(getlinks);
                $('#vedio').val('');
                prodetailsone()
            }
        })
    }

    function getimages() {
        $("#getimages").html('<div class="col-md-12 text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        var portpholioproid = '<?php echo $gettemp['Profile_Name']; ?>';
        $.ajax({
            method: 'POST',
            url: 'getimages',
            data: {
                'portpholioproid': portpholioproid
            },
            success: function(getlinks) {
                $('.imageinput').val('');
                $('#getimages').html(getlinks);
                var countimagess=$('#getimages div.col-md-3').length;
                if(countimagess>=20){
                    $('.proimage').css("display","none");
                }else{
                    $('.proimage').css("display","block");
                }
                
                
                prodetailsone()
            }
        })
    }

    function getdocument() {
        $("#getdocument").html('<div class="col-md-12 text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        var portpholioproid = '<?php echo $gettemp['Profile_Name']; ?>';
        $.ajax({
            method: 'POST',
            url: 'getdocuments',
            data: {
                'portpholioproid': portpholioproid
            },
            success: function(getdocument) {
                $('#getdocument').html(getdocument);
                prodetailsone()
            }
        })
    }

    $(document).ready(function(e) {
        $('#imageform').on('submit', (function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'submitportfoliotwo',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('.portfolioimageerror').show();
                    $('.portfolioimageerror').html('');
                    getimages();

                }
            });
        }));

        $('#documentform').on('submit', (function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'submitportfoliofour',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    getdocument();
                    $('#documenttitle').val('');
                    $('#chooseFile').val('');
                    $('#noFile').text('Choose your file');
                    prodetailsone();
                    $('input').blur();
                }
            });
        }));

    });

    function validateformone() {
        var linkurlport = $('#linkurlport').val();
        var titleone = $('#titleone').val();
        if (((validateURL(linkurlport) == false)) && (titleone != '')) {
            $('#addlinksss').attr('disabled', true);
        } else {
            $('#addlinksss').attr('disabled', false);
        }
    }





    function portfolioformone() {
        var title = $("input[name='title[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var linkurl = $("input[name='linkurl[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var profileid = $('#portpholioproid').val();

        $.ajax({
            type: 'POST',
            url: "submitportfolio",
            data: {
                'title': title,
                'linkurl': linkurl,
                'profileid': profileid
            },
            success: function(getdata) {
                $('#titleone').val('');
                $('#linkurlport').val('');
                getlinks();
                $('input').blur();
            }
        })


    }

    function validationvedio() {
        var addvedio = $('#addvedio').val();
        if ((validateURL(addvedio) == false) && (addvedio != '')) {
            $('#formvedio').attr('disabled', true);
            return false;
        } else {
            $('#formvedio').attr('disabled', false);
            return true;
        }
    }

    function portfolioformvedio() {
        var vediourlone = $("input[name='vediourlone[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var profileid = $('#portpholioproid').val();
        $.ajax({
            type: 'POST',
            url: "submitportfoliothree",
            data: {
                'vediourlone': vediourlone,
                'profileid': profileid
            },
            success: function(getdata) {
                $('input').blur();
                $('#title').val('');
                $('#addvedio').val('');
                getvedios();


            }
        })


    }

    function portfolioformdocument() {
        var document = $("input[name='documentall[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var profileid = $('#portpholioproid').val();
        $.ajax({
            type: 'POST',
            url: "submitportfoliofour",
            data: {
                'document': document,
                'profileid': profileid
            },
            success: function(getdata) {
                $('#documenttitle').val('');
                $('#vedio').val('');
                $('input').blur();
                getvedios();
            }
        })

    }

    function uploadportfolio(profileid) {
        $('#portpholioproid').val(profileid);
         $("#addportpholio").modal("show");
    }

    function profiledetailthree() {
        var profileidd = $('#profileidd').val();
        var projectvalues = $('#projectvalues').val();
        var tempid = $('input[name=tempid]').val();
        var shift = $('#shift').val();
        var headline = $('#Headline').val();
        var aboutyourself = $('#aboutyourself').val();
        var noofprojects = $('#noofprojects').val();
        var wstatus = $('input[name=wstatus]:checked').val();
        var choiceindustry = $("input[name='selectchoiceofindustry[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var addemp = $("input[name='selectadditionaldetails[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var preferdgeree = $('#preferdgeree').val();
        var software = $("input[name='selectsoftwarestwo[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var youtubelink = $('input[name=youtubelink]').val();
        var facebooklink = $('input[name=facebooklink]').val();
        var instalink = $('input[name=instalink]').val();
        var twitterlink = $('input[name=twitterlink]').val();
        var linkedinlink = $('input[name=linkedinlink]').val();
        var behancelink = $('input[name=behancelink]').val();
        var googlepluslink = $('input[name=googlepluslink]').val();
        var dribbblelink = $('input[name=dribbblelink]').val();
        var setprimary = $('input[name=setprimary]:checked').val();


        $.ajax({
            method: 'Post',
            url: 'updateprofilethree',
            data: {
                'profileidd': profileidd,
                'tempid': tempid,
                'shift': shift,
                'headline': headline,
                'aboutyourself': aboutyourself,
                'noofprojects': noofprojects,
                'wstatus': wstatus,
                'choiceindustry': choiceindustry,
                'addemp': addemp,
                'preferdgeree': preferdgeree,
                'software': software,
                'youtubelink': youtubelink,
                'facebooklink': facebooklink,
                'instalink': instalink,
                'twitterlink': twitterlink,
                'linkedinlink': linkedinlink,
                'behancelink': behancelink,
                'googlepluslink': googlepluslink,
                'dribbblelink': dribbblelink,
                'setprimary': setprimary,
                'projectvalues': projectvalues
            },
            success: function(getalert) {
                $('.alert').hide();
                getuserprofile(profileidd);
                if (getalert == 'ok') {

                    opentemp(profileidd);
                    $('#profilemessage').html(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">You are successfully updated your profile details!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $('html, body').animate({
                        scrollTop: 1
                    }, 'fast');
                    $('#profilemessage').show();
                    $('#question0').addClass('show');
                    $('#profiledetails').removeClass('show');

                } else {
                    $('#profilemessage').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please try again later<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $('html, body').animate({
                        scrollTop: 1
                    }, 'fast');
                    $('#profilemessage').show();

                }

            }
        })
        return false;

    }

    function profileonedetail() {
        var profileidd = $('#profileidd').val();
        var tempid = $('input[name=tempid]').val();
        var shift = $('#shift').val();
        var preferd = $("input[name='selectpwp[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var haircolor = $('#gethaircolor').val();
        var complextion = $('#getcomplextion').val();
        var eyecolor = $('#geteyecolor').val();
        var weight = $('#weight').val();
        var height = $('#height').val();
        var bodytype = $('#getbodytype').val();
        var bodyshape = $('#getbodyshape').val();
        var getadditionaldetails = $("input[name='selectadditionaldetails[]']").map(function() {
            return $(this).val().trim();
        }).get();

        var choiceindustry = $("input[name='selectchoiceofindustry[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var headline = $('#Headline').val();
        var aboutyourself = $('#aboutyourself').val();
        var youtubelink = $('input[name=youtubelink]').val();
        var facebooklink = $('input[name=facebooklink]').val();
        var instalink = $('input[name=instalink]').val();
        var twitterlink = $('input[name=twitterlink]').val();
        var linkedinlink = $('input[name=linkedinlink]').val();
        var behancelink = $('input[name=behancelink]').val();
        var googlepluslink = $('input[name=googlepluslink]').val();
        var dribbblelink = $('input[name=dribbblelink]').val();
        var setprimary = $('input[name=setprimary]:checked').val();

        $.ajax({
            method: 'Post',
            url: "<?php echo base_url();?>aspirant/updateprofileone",
            data: {
                'shift': shift,
                'preferd': preferd,
                'haircolor': haircolor,
                'complextion': complextion,
                'eyecolor': eyecolor,
                'weight': weight,
                'height': height,
                'bodytype': bodytype,
                'bodyshape': bodyshape,
                'getadditionaldetails': getadditionaldetails,
                'choiceindustry': choiceindustry,
                'headline': headline,
                'aboutyourself': aboutyourself,
                'youtubelink': youtubelink,
                'facebooklink': facebooklink,
                'instalink': instalink,
                'twitterlink': twitterlink,
                'linkedinlink': linkedinlink,
                'behancelink': behancelink,
                'googlepluslink': googlepluslink,
                'dribbblelink': dribbblelink,
                'setprimary': setprimary,
                'profileidd': profileidd,
                'tempid': tempid
            },
            success: function(getall) {
                getuserprofile(profileidd);
                $('.alert').hide();
                if (getall == 'ok') {
                    opentemp(profileidd);
                    $('#profilemessage').html(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">You are successfully updated your profile details!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $('html, body').animate({
                        scrollTop: 1
                    }, 'fast');
                    $('#profilemessage').show();
                    $('#question0').addClass('show');
                    $('#profiledetails').removeClass('show');

                } else {

                    $('#profilemessage').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please try again later<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $('html, body').animate({
                        scrollTop: 1
                    }, 'fast');
                    $('#profilemessage').show();

                }
            }
        })
        return false;
    }



    function profiledetailtwo() {
        var tempid = $('input[name=tempid]').val();
        var profileidd = $('#profileidd').val();
        var shift = $('#shift').val();
        var headline = $('#Headline').val();
        var aboutyourself = $('#aboutyourself').val();
        var projectvalues = $('#projectvalues').val();
        var choiceofindustrytwoo = $("input[name='choiceofindustrysone[]']").map(function() {
            return $(this).val();
        }).get();
        var preferdgere = $('#preferdgere').val();
        var software = $("input[name='selectsoftwarestwo[]']").map(function() {
            return $(this).val();
        }).get();

        var youtubelink = $('input[name=youtubelink]').val();
        var facebooklink = $('input[name=facebooklink]').val();
        var instalink = $('input[name=instalink]').val();
        var twitterlink = $('input[name=twitterlink]').val();
        var linkedinlink = $('input[name=linkedinlink]').val();
        var behancelink = $('input[name=behancelink]').val();
        var googlepluslink = $('input[name=googlepluslink]').val();
        var dribbblelink = $('input[name=dribbblelink]').val();
        var setprimary = $('input[name=setprimary]:checked').val();

        $.ajax({
            method: 'Post',
            url: "<?php echo base_url();?>aspirant/updateprofiletwo",
            data: {
                'shift': shift,
                'headline': headline,
                'aboutyourself': aboutyourself,
                'choiceofindustrytwoo': choiceofindustrytwoo,
                'preferdgere': preferdgere,
                'software': software,
                'youtubelink': youtubelink,
                'facebooklink': facebooklink,
                'instalink': instalink,
                'twitterlink': twitterlink,
                'linkedinlink': linkedinlink,
                'behancelink': behancelink,
                'googlepluslink': googlepluslink,
                'dribbblelink': dribbblelink,
                'setprimary': setprimary,
                'profileidd': profileidd,
                'tempid': tempid,
                'projectvalues': projectvalues
            },
            success: function(getall) {
                getuserprofile(profileidd);
                $('.alert').hide();
                if (getall == 'ok') {
                    opentemp(profileidd);
                    $('#profilemessage').html(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">You are successfully updated your profile details!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $('html, body').animate({
                        scrollTop: 1
                    }, 'fast');
                    $('#profilemessage').show();
                    $('#question0').addClass('show');
                    $('#profiledetails').removeClass('show');

                    return true;

                } else {
                    $('#profilemessage').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please try again later<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    );
                    $('html, body').animate({
                        scrollTop: 1
                    }, 'fast');
                    $('#profilemessage').show();
                    return true;
                }

            }
        })
        return false;

    }

    function adddetails(counts) {
        var values = $("input[name='additionaldetails[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var certificate = $('#additionaldetails' + counts).val();

        $("#additionaldetailss" + counts).val('');
        $(".droppingeltweleve" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".droppingeltweleve" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getaddetailss',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".droppingeltweleve" + counts).html(succccc);
                    $('#getempdetails' + counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".droppingeltweleve" + counts).hide();
        }

    }

    function preferdgereee() {
        var haircolor = $('input[name=preferdgere]').val();
        $('#selectpreferdgere').val('');
        $(".dropinggpreferdgere").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (haircolor.trim() != '') {
            $(".dropinggpreferdgere").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>aspirant/getpreferdgere',
                data: {
                    'name': haircolor
                },
                success: function(succccc) {
                    $(".dropinggpreferdgere").html(succccc);
                    $('input[name=preferdgere]').val(haircolor);

                }

            })
        } else {
            $(".dropinggpreferdgere").hide();
        }
    }

    function selectgetpreferdgere(name) {
        $('#selectpreferdgere').val(name);
        $('#preferdgere').val(name);
        $('#preferdgeree').val(name);
        $(".dropinggpreferdgere").hide();
    }

    function choiceofindustrysone(counts) {
        var values = $("input[name='choiceofindustrysone[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var certificate = $('#choiceofindustry' + counts).val();
        $("#choiceofindustryy" + counts).val('');
        $(".droppingthrteen" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".droppingthrteen" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getchoiceone',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".droppingthrteen" + counts).html(succccc);
                    $('#getchoiceone' + counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".droppingthrteen" + counts).hide();
        }

    }



    function prefworkplate(counts) {
        var values = $("input[name='pwp[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var certificate = $('#pwp' + counts).val();
        $("#pwpp" + counts).val('');
        $(".droppingeleven" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".droppingeleven" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getprefworkplat',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".droppingeleven" + counts).html(succccc);
                    $('#getpreworkplate' + counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".droppingeleven" + counts).hide();
        }

    }


    function choiceofindustrytwooo(counts) {
        var values = $("input[name='choiceofindustrytwo[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var certificate = $('#choiceofindustrytwo' + counts).val();
        $("#choiceofindustrytwoo" + counts).val('');
        $(".droppingfourteen" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".droppingfourteen" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getchoicethree',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".droppingfourteen" + counts).html(succccc);
                    $('#getchoicetwo' + counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".droppingfourteen" + counts).hide();
        }

    }


    function choiceofindustrysthree(counts) {

        var values = $("input[name='choiceofindustrysone[]']").map(function() {
            return $(this).val().trim();
        }).get();
        var certificate = $('#choiceofindustry' + counts).val();
        $("#choiceofindustryy" + counts).val('');
        $(".droppingthrteen" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".droppingthrteen" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getchoicethree',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".droppingthrteen" + counts).html(succccc);
                    $('#getchoicetwo' + counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".droppingthrteen" + counts).hide();
        }

    }



    function softwarestwo(counts) {
        var values = $("input[name='softtwo[]']").map(function() {
            return $(this).val();
        }).get();
        var certificate = $('#softtwo' + counts).val();
        $("#softwaresstwo" + counts).val('');
        $(".dropinggonetwo" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".dropinggonetwo" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getsoftwarestwo',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".dropinggonetwo" + counts).html(succccc);


                    $('#getsoftwaretwo' + counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".dropinggonetwo" + counts).hide();
        }

    }



    function selectempdetails(name, count) {
        $('.droppingeltweleve' + count).hide();
        adddetails(count);
        $('#additionaldetailss' + count).val(name);
        $('#additionaldetails' + count).val(name);
        $('.droppingeltweleve' + count).hide();

    }

    function selectchoicethree(name, count) {
        $('.droppingthrteen' + count).hide();
        choiceofindustrysthree(count);
        $('#choiceofindustry' + count).val(name);
        $('#choiceofindustryy' + count).val(name);
        $('.droppingthrteen' + count).hide();
    }

    function selectchoiceone(name, count) {
        $('.droppingthrteen' + count).hide();
        choiceofindustrysone(count);
        $('#choiceofindustry' + count).val(name);
        $('#choiceofindustryy' + count).val(name);
        $('.droppingthrteen' + count).hide();

    }

    function selectworkplate(name, count) {
        $('.droppingeleven' + count).hide();
        prefworkplate(count);
        $('#pwp' + count).val(name);
        $('#pwpp' + count).val(name);
        $('.droppingeleven' + count).hide();

    }


    function selectchoicetwo(name, count) {
        $('.droppingfourteen' + count).hide();
        choiceofindustrytwooo(count);
        $('#choiceofindustrytwo' + count).val(name);
        $('#choiceofindustrytwoo' + count).val(name);
        $('.droppingfourteen' + count).hide();

    }

    function selectsoftwarestwo(name, count) {
        $('#softtwo' + count).val(name);
        $('.dropinggonetwo' + count).hide();
        softwarestwo(count);
        $('#softwaresstwo' + count).val(name);
        $('.dropinggonetwo' + count).hide();
    }



    function addworkplate(counts) {
        var getname = $('#getpreworkplate' + counts).val();
        var type = 'Preferred Platform';
        $.ajax({
            type: 'Post',
            url: "adddropdown",
            data: {
                'getname': getname,
                'type': type
            },
            success: function(addassociate) {
                $('#pwp' + counts).val(getname);
                prefworkplate(counts);
                $('#pwpp' + counts).val(getname);
                $('.droppingeleven' + counts).hide();
            }
        })
    }


    function addchoicethree(counts) {
        var getname = $('#getchoicetwo' + counts).val();
        var type = 'Choice Of Industry';
        $.ajax({
            type: 'Post',
            url: "adddropdown",
            data: {
                'getname': getname,
                'type': type
            },
            success: function(addassociate) {
                $('#choiceofindustry' + counts).val(getname);
                choiceofindustrysone(counts);
                $('#choiceofindustryy' + counts).val(getname);
                $('.droppingthrteen' + counts).hide();
            }
        })
    }


    function addchoiceone(counts) {
        var getname = $('#getchoiceone' + counts).val();
        var type = 'Choice Of Industry';
        $.ajax({
            type: 'Post',
            url: "adddropdown",
            data: {
                'getname': getname,
                'type': type
            },
            success: function(addassociate) {
                $('#choiceofindustry' + counts).val(getname);
                choiceofindustrysone(counts);
                $('#choiceofindustryy' + counts).val(getname);
                $('.droppingthrteen' + counts).hide();
            }
        })
    }

    function addchoicetwo(counts) {
        var getname = $('#getchoicetwo' + counts).val();
        var type = 'Choice Of Industry';
        $.ajax({
            type: 'Post',
            url: "adddropdown",
            data: {
                'getname': getname,
                'type': type
            },
            success: function(addassociate) {
                $('#choiceofindustrytwo' + counts).val(getname);
                choiceofindustrystwo(counts);
                $('#choiceofindustrytwoo' + counts).val(getname);
                $('.droppingfourteen' + counts).hide();
            }
        })
    }


    function addempdetails(counts) {
        var getname = $('#getempdetails' + counts).val();
        var type = 'Additional Details For Employers';
        $.ajax({
            type: 'Post',
            url: "adddropdown",
            data: {
                'getname': getname,
                'type': type
            },
            success: function(addassociate) {
                $('#additionaldetails' + counts).val(getname);
                adddetails(counts);
                $('#additionaldetailss' + counts).val(getname);
                $('.droppingeltweleve' + counts).hide();
            }
        })
    }




    $('.addurl').click(function() {
        var numItems = $('.all_url div.form-group').length;
        $('.all_url .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_url').append(
            '<div class="remove form-group position-relative focused"><label class="form-label heading-title" for="url">Url</label><input type="text" class="form-input form-control" maxlength="200"  id="url' +
            numItems +
            '" name="url[]"><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });

    $('.addpre').click(function() {
        var numItems = $('.all_pre div.form-group').length;
        $('.all_pre .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_pre').append(
            '<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" onkeypress="return isString (event);" id="pwp' +
            numItems + '"  onkeyup="prefworkplate(' + numItems +
            ')" name="pwp[]"><div class="droping-lists droppingeleven' + numItems +
            '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectpwp[]" id="pwpp' +
            numItems +
            '" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });

    $('.addsoftwarestwo').click(function() {
        var numItems = $('.all_softwarestwo div.form-group').length;
        $('.all_softwarestwo .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_softwarestwo').append(
            '<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" id="softtwo' +
            numItems + '" onkeypress="return isString (event);" onkeyup="softwarestwo(' + numItems +
            ')" name="softtwo[]"><div class="droping-lists dropinggonetwo' + numItems +
            '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectsoftwarestwo[]" id="softwaresstwo' +
            numItems +
            '" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });


    $('.addempdetail').click(function() {
        var numItems = $('.all_add_detail div.form-group').length;
        $('.all_add_detail .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_add_detail').append(
            '<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" onkeypress="return isString (event);" id="additionaldetails' +
            numItems + '"  onkeyup="adddetails(' + numItems +
            ')" name="additionaldetails[]"><div class="droping-lists droppingeltweleve' + numItems +
            '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectadditionaldetails[]" id="additionaldetailss' +
            numItems +
            '" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });

    $('.choiceonebutton').click(function() {
        var numItems = $('.all_choice_one div.form-group').length;
        $('.all_choice_one .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_choice_one').append(
            '<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" onkeypress="return isString (event);" id="choiceofindustry' +
            numItems + '"  onkeyup="choiceofindustrysone(' + numItems +
            ')" name="choiceofindustrysone[]"><div class="droping-lists droppingthrteen' + numItems +
            '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy' +
            numItems +
            '" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });

    $('.choiceonebuttontwo').click(function() {
        var numItems = $('.all_choice_two div.form-group').length;
        $('.all_choice_two .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_choice_two').append(
            '<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" onkeypress="return isString (event);" id="choiceofindustrytwo' +
            numItems + '"  onkeyup="choiceofindustrytwooo(' + numItems +
            ')" name="choiceofindustrytwo[]"><div class="droping-lists droppingfourteen' + numItems +
            '" id="droping-lists" style="display:none"></div><input type="hidden" name="choiceofindustrytwoo[]" id="choiceofindustrytwoo' +
            numItems +
            '" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });

    $('.choiceonebuttonthree').click(function() {
        var numItems = $('.all_choice_three div.form-group').length;
        $('.all_choice_three .alllanguages').addClass('single remove');
        $('.single .extra-fields-customer').remove();
        $('.all_choice_three').append(
            '<div class="remove form-group position-relative focused"><input type="text" class="form-input form-control" maxlength="150" onkeypress="return isString (event);" id="choiceofindustry' +
            numItems + '"  onkeyup="choiceofindustrysthree(' + numItems +
            ')" name="choiceofindustrysone[]"><div class="droping-lists droppingthrteen' + numItems +
            '" id="droping-lists" style="display:none"></div><input type="hidden" name="selectchoiceofindustry[]" id="choiceofindustryy' +
            numItems +
            '" ><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>'
        );
    });



    function addsoftwares(counts) {
        var getname = $('#getsoftwaretwo' + counts).val();

        var type = 'Softwares';
        $.ajax({
            type: 'Post',
            url: "adddropdown",
            data: {
                'getname': getname,
                'type': type
            },
            success: function(addassociate) {
                $('#softtwo' + counts).val(getname);
                //softwares(counts);
                $("#getsoftwaretwo" + counts).val(getname);
                $("#softwaresstwo" + counts).val(getname);

                $('.dropinggone' + counts).hide();
            }
        })
    }




    $(document).ready(function() {
        $('input[name=youtube]').click(function() {
            var youtube = $('input[name=youtube]:checked').val();
            if (youtube == 'youtube') {
                $('#youtubelink').show();
            } else {
                $('#youtubelink').hide();
                $('#youtubelink input').val('');
            }
        })
        $('input[name=facebook]').click(function() {
            var facebook = $('input[name=facebook]:checked').val();
            if (facebook == 'facebook') {
                $('#facebooklink').show();
            } else {
                $('#facebooklink').hide();
                $('#facebooklink input').val('');
            }
        })
        $('input[name=instagram]').click(function() {
            var instagram = $('input[name=instagram]:checked').val();
            if (instagram == 'instagram') {
                $('#instalink').show();
            } else {
                $('#instalink').hide();
                $('#instalink input').val('');
            }
        })
        $('input[name=twitter]').click(function() {
            var twitter = $('input[name=twitter]:checked').val();
            if (twitter == 'twitter') {
                $('#twitterlink').show();
            } else {
                $('#twitterlink').hide();
                $('#twitterlink input').val('');
            }
        })
        $('input[name=linkedin]').click(function() {
            var linkedin = $('input[name=linkedin]:checked').val();
            if (linkedin == 'linkedin') {
                $('#linkedinlink').show();
            } else {
                $('#linkedinlink').hide();
                $('#linkedinlink input').val('');
            }
        })
        $('input[name=behance]').click(function() {
            var behance = $('input[name=behance]:checked').val();
            if (behance == 'behance') {
                $('#behancelink').show();
            } else {
                $('#behancelink').hide();
                $('#behancelink input').val('');
            }
        })
        $('input[name=googleplus]').click(function() {
            var googleplus = $('input[name=googleplus]:checked').val();
            if (googleplus == 'googleplus') {
                $('#googlepluslink').show();
            } else {
                $('#googlepluslink').hide();
                $('#googlepluslink input').val('');
            }
        })
        $('input[name=dribbble]').click(function() {
            var dribbble = $('input[name=dribbble]:checked').val();
            if (dribbble == 'dribbble') {
                $('#dribbblelink').show();
            } else {
                $('#dribbblelink').hide();
                $('#dribbblelink input').val('');
            }
        })
    });

    function prodetailsone() {

        var shift = $('#shift').val();
        var total = shift * 260;
        x = total.toString();
        var lastThree = x.substring(x.length - 3);
        var otherNumbers = x.substring(0, x.length - 3);
        if (otherNumbers != '') {
            lastThree = ',' + lastThree;
            var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            $('#currentpay').val(res);

        } else {
            $('#currentpay').val('');
        }
        var numlinks = $('#getlinks div.col-md-6').length;
        var getimages = $('#getimages div.col-md-3').length;
        var getvedios = $('#getvedios div.col-md-6').length;
        var docformssss = $('#getdocument div.col-md-6').length;
        var totlalinkcount = numlinks + getimages + getvedios + docformssss;
        var youtubelink = $('input[name=youtubelink]').val();
        var facebooklink = $('input[name=facebooklink]').val();
        var instalink = $('input[name=instalink]').val();
        var twitterlink = $('input[name=twitterlink]').val();
        var linkedinlink = $('input[name=linkedinlink]').val();
        var behancelink = $('input[name=behancelink]').val();
        var googlepluslink = $('input[name=googlepluslink]').val();
        var dribbblelink = $('input[name=dribbblelink]').val();
        var setprimary = $('input[name=setprimary]:checked').val();
        var changeurl1 = validateURL(youtubelink);

        if ((shift == '') || (totlalinkcount == 0) || ((validateURL(youtubelink) == false) && (youtubelink != '')) ||
            ((validateURL(facebooklink) == false) && (facebooklink != '')) || ((validateURL(instalink) == false) && (
                instalink != '')) || ((validateURL(twitterlink) == false) && (twitterlink != '')) || ((validateURL(
                linkedinlink) == false) && (linkedinlink != '')) || ((validateURL(behancelink) == false) && (
                behancelink != '')) || ((validateURL(googlepluslink) == false) && (googlepluslink != '')) || ((
                validateURL(dribbblelink) == false) && (dribbblelink != ''))) {
            $('#profiledetailone').attr('disabled', true);

            return false;
        } else {
            $('#profiledetailone').attr('disabled', false);
            return true;
        }
    }

    $('input').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });
    $(document).ready(function() {
        $('input').blur(function() {
            var inputValue = $(this).val();
            if (inputValue == "") {
                $(this).removeClass('filled');
                $(this).parents('.form-group').removeClass('focused');
                $('.droping-list').hide();
            } else {
                $(this).addClass('filled');
            }
        })
    })
    $(document).ready(function() {
        $('.example-single').multiselect({
            enableFiltering: true,
            filterBehavior: 'text',
            filterPlaceholder: 'Search',
            nonSelectedText: '',
            includeSelectAllOption: true,
            maxHeight: true,
            buttonText: function(options, select) {
                if (options.length == 0) {
                    return '';
                } else {
                    var selected = '';
                    options.each(function() {
                        selected += $(this).text() + ', ';
                    });
                    return selected.substr(0, selected.length - 2);
                }
            },
        });
        $('.example-singletwo').multiselect({
            enableFiltering: true,
            filterBehavior: 'text',
            filterPlaceholder: 'Search',
            nonSelectedText: '',
            includeSelectAllOption: true,
            buttonText: function(options, select) {
                if (options.length == 0) {
                    return '';
                } else {
                    var selected = '';
                    options.each(function() {
                        selected += $(this).text() + ', ';
                    });
                    return selected.substr(0, selected.length - 2);
                }
            },
        });
    });

    function isHeight(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|[']|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    $('textarea').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
            $('.droping-list').hide();
        } else {
            $(this).addClass('filled');
        }
    })
    $('textarea').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });
    $('select').change(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
            $('.droping-list').hide();
        } else {
            $(this).addClass('filled');
            $(this).parents('.form-group').addClass('focused');

        }
    })

    function haircolors() {
        var haircolor = $('input[name=haircolor]').val();
        $('#gethaircolor').val('');
        $(".droping12").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (haircolor.trim() != '') {
            $(".droping12").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>aspirant/gethaircolor',
                data: {
                    'name': haircolor
                },
                success: function(succccc) {
                    $(".droping12").html(succccc);
                    $('input[name=haircolor]').val(haircolor);

                }

            })
        } else {
            $(".droping12").hide();
        }


    }


    function complextionn() {

        var complextion = $('input[name=complextion]').val();

        $('#getcomplextion').val('');
        $(".droping13").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (complextion.trim() != '') {
            $(".droping13").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>aspirant/getcomplextion',
                data: {
                    'name': complextion
                },
                success: function(succccc) {
                    $(".droping13").html(succccc);
                    $('input[name=complextion]').val(complextion);

                }

            })
        } else {
            $(".droping13").hide();
        }


    }

    function eyecolorr() {
        var eyecolor = $('input[name=eyecolor]').val();
        $('#geteyecolor').val('');
        $(".droping14").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (eyecolor.trim() != '') {
            $(".droping14").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>aspirant/geteyecolor',
                data: {
                    'name': eyecolor
                },
                success: function(succccc) {
                    $(".droping14").html(succccc);
                    $('input[name=eyecolor]').val(eyecolor);

                }

            })
        } else {
            $(".droping14").hide();
        }


    }

    function bodytypee() {
        var bodytype = $('input[name=bodytype]').val();
        $('#getbodytype').val('');
        $(".droping16").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (bodytype.trim() != '') {
            $(".droping16").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>aspirant/getbodytype',
                data: {
                    'name': bodytype
                },
                success: function(succccc) {
                    $(".droping16").html(succccc);
                    $('input[name=bodytype]').val(bodytype);

                }

            })
        } else {
            $(".droping16").hide();
        }


    }

    function bodyshapee() {

        var bodyshape = $('input[name=bodyshape]').val();
        $('#getbodyshape').val('');
        $(".droping17").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (bodyshape.trim() != '') {
            $(".droping17").show();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>aspirant/getbodyshape',
                data: {
                    'name': bodyshape
                },
                success: function(succccc) {
                    $(".droping17").html(succccc);
                    $('input[name=bodyshape]').val(bodyshape);

                }

            })
        } else {
            $(".droping17").hide();
        }


    }



    function certificate(counts) {
        var values = $("input[name='cert[]']").map(function() {
            return $(this).val();
        }).get();
        var certificate = $('#cert' + counts).val();
        // $('#cert'+counts).val('');
        $(".dropingg" + counts).html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
        if (certificate.trim() != '') {
            $(".dropingg" + counts).show();
            $.ajax({
                type: 'post',
                url: 'getpreferedgenree',
                data: {
                    'name': certificate,
                    'counts': counts,
                    'values': values
                },
                success: function(succccc) {
                    $(".dropingg" + counts).html(succccc);
                    $("#getcertificatee" + counts).val(certificate);
                    //   $('#cert'+counts).val(certificate);
                    //   $('#certificatee'+counts).val(certificate);
                }

            })
        } else {
            $(".dropingg" + counts).hide();
        }

    }




    function selectaddemp(name) {
        $('#additionaldetails').val(name);
        $('#getadditionaldetails').val(name);
        $(".dropingeight").hide();
    }



    function selectchoice(name) {
        $('#choiceindustry').val(name);
        $('#getchoices').val(name);
        $(".dropingseven").hide();
    }



    function selectpreffered(name) {
        $('#preferedgenree').val(name);
        $('#getpreferedgenree').val(name);
        $(".dropingnine").hide();
    }

    function selecthaircolor(name) {
        $('#haircolor').val(name);
        $('#gethaircolor').val(name);
        $(".droping12").hide();
    }

    function selectcomplextion(name) {
        $('#complextion').val(name);
        $('#getcomplextion').val(name);
        $(".droping13").hide();
    }

    function selecteyecolor(name) {
        $('#eyecolor').val(name);
        $('#geteyecolor').val(name);
        $(".droping14").hide();
    }

    function selectbodytype(name) {
        $('#bodytype').val(name);
        $('#getbodytype').val(name);
        $(".droping16").hide();
    }

    function selectbodyshape(name) {
        $('#bodyshape').val(name);
        $('#getbodyshape').val(name);
        $(".droping17").hide();
    }


    function isString(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[^a-zA-Z _]/g;
        if (regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    $('#chooseFile').bind('change', function() {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.addbutton').html('<i class="fas fa-plus"></i>');
    </script>