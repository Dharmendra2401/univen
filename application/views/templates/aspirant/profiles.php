<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 

?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <?php $this->load->view('templates/aspirant/nav'); ?>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">

                        <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
                        <span class="profilemessage" id="profilemessage" action="#profilemessage"></span>

                        <h5 class="form-title">My Profiles</h5>
                        <p class="form-title-content"> Always keep your profiles updated!</p>




                        <div class="panel-group ml-5" id="faqAccordion">



                            <div class="panel">
                                <div class="panel-heading accordion-toggle question-toggle profiledetails"
                                    data-toggle="collapse" data-parent="#profiledetails" data-target="#profiledetails">
                                    <h5 class="panel-title faq">
                                        <a class="ing"> Profile Details</a>
                                        <span><i class="fas fa-caret-down"></i></span>
                                    </h5>
                                </div>
                                <div id="profiledetails"
                                    class="panel-collapse collapse <?php if($types=="Profile_details"){ echo "show";} ?>">
                                    <div class="panel-body">
                                        <form action="<?php echo base_url();?>aspirant/profiles" method="post"
                                            enctype='multipart/form-data' autocomplete="off">

                                            <div class="row popupmodal gettemplate"></div>


                                    </div>
                                </div>
                                </form>
                            </div>







                            <div class="panel-between-content-top">
                                <h6 class="panel-between-content"></h6>Details entered below are common to all
                                professional Profiles created any changes under this will apply to all profiles.
                            </div>



                            <div class="panel">
                                <div class="panel-heading accordion-toggle question-toggle collapsed"
                                    data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0"
                                    aria-expanded="true">
                                    <h5 class="panel-title faq">
                                        <a class="ing">Personal Details</a>
                                        <span><i class="fas fa-caret-down"></i></span>
                                    </h5>
                                </div>
                                <div id="question0" class="panel-collapse collapse">


                                    <div class="panel-body">
                                        <form class="personaldetails" id="personaldetails"
                                            action="<?php echo base_url();?>aspirant/profiles" method="post"
                                            enctype='multipart/form-data' autocomplete="off">
                                            <div class="row popupmodal">


                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['First_Name']!=''){echo "focused";}; ?>">
                                                    <label class="form-label heading-title" for="firstname">First Name
                                                        <span class="required">*</span></label>
                                                    <input type="text" class="form-input form-control" maxlength="50"
                                                        id="firstname" name="firstname"
                                                        value="<?php echo $getalldet['First_Name']; ?>"
                                                        onkeyup="return personaldetails()"
                                                        onkeypress="return isString (event);">
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Last_Name']!=''){echo "focused";}; ?>">
                                                    <label class="form-label heading-title" for="lastname">Last Name
                                                        <span class="required">*</span></label>
                                                    <input type="text" class="form-input form-control" maxlength="50"
                                                        id="lastname" name="lastname"
                                                        value="<?php echo $getalldet['Last_Name']; ?>"
                                                        onkeyup="return personaldetails()"
                                                        onkeypress="return isString (event);">
                                                </div>
                                                <div class="col-md-4"></div>

                                                <div
                                                    class="font15 col-md-12 form-group <?php if($getalldet['Gender']!=''){echo "focused";}; ?> mt-1">
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="gender" value="M"
                                                            <?php if($getalldet['Gender']=='M'){echo "checked";}; ?>>
                                                        <span>Male</span></label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="gender" value="F"
                                                            <?php if($getalldet['Gender']=='F'){echo "checked";}; ?>>
                                                        <span>Female</span></label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="gender" value="T"
                                                            <?php if($getalldet['Gender']=='T'){echo "checked";}; ?>>
                                                        <span>Transgender</span></label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="gender" value="O"
                                                            <?php if($getalldet['Gender']=='O'){echo "checked";}; ?>>
                                                        <span>Other</span></label>

                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if(($getalldet['Date_Of_Birth']!='0000-00-00')&&($getalldet['Date_Of_Birth']!='')){echo "focused";}; ?>">
                                                    <label class="form-label heading-title" for="dateofbirth">Date Of
                                                        Birth <span class="required">*</span></label>
                                                    <?php if(($getalldet['Date_Of_Birth']=='0000-00-00')||($getalldet['Date_Of_Birth']=='')){?>
                                                    <input type="text" class="form-input form-control" id="dob"
                                                        name="dob" onfocus="(this.type='date')"
                                                        onblur="if(!this.value)this.type='text'"
                                                        max="<?php echo date('Y-m-d');?>"
                                                        onchange="return personaldetails()">
                                                    <?php }else{ ?>
                                                    <input type="date" class="form-input form-control" id="dob"
                                                        name="dob" onfocus="(this.type='date')"
                                                        onblur="if(!this.value)this.type='text'"
                                                        value="<?php echo date('Y-m-d',strtotime($getalldet['Date_Of_Birth'])) ?>"
                                                        max="<?php echo date('Y-m-d');?>"
                                                        onchange="return personaldetails()">
                                                    <?php }  ?>
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Display_Name']!=''){echo "focused";}; ?>">
                                                    <label class="form-label heading-title" for="displayname">Display
                                                        Name <span class="required">*</span></label>
                                                    <input type="text" class="form-input form-control" maxlength="50"
                                                        id="displayname" name="displayname"
                                                        value="<?php echo $getalldet['Display_Name']; ?>"
                                                        onkeyup="return personaldetails()"
                                                        onkeypress="return isString (event);">
                                                </div>




                                                <div
                                                    class="col-md-12 form-group <?php if($getalldet['Permanent_Address']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title"
                                                        for="address">Address</label>
                                                    <textarea type="text" class="form-input form-control"
                                                        maxlength="200" col="4" rows="4" id="address"
                                                        name="address"><?php echo $getalldet['Permanent_Address']; ?></textarea>
                                                </div>

                                                <div id="getcity"
                                                    class="col-md-4 <?php if($getalldet['City']!=''){echo "focused";} ?>">
                                                    <div class="form-group select" id="citytop">
                                                        <label class="form-label heading-title" for="city">City</label>
                                                        <select class="form-input form-control" name="city" id="city"
                                                            onchange="return cityes(this.value);">
                                                            <option style="display:none;"></option>

                                                            <option value="<?php echo $getalldet['City']; ?>" readonly
                                                                selected><?php echo $getalldet['City']; ?></option>


                                                        </select>
                                                    </div>
                                                </div>

                                               
                                                
                                                    <div id="getstate" class="col-md-4">
                                                    <label class="form-label heading-title" for="state">State <span
                                                            class="required">*</span></label>
                                                    <select class=" form-input form-control example-single" name="state"
                                                        id="state" onchange="return getstate();"
                                                        onkeyup="return personaldetails()">

                                                        <?php foreach ($getstates as $getstate){?>
                                                        <option value="<?php echo $getstate['state'];?>"
                                                            <?php if($getalldet['State']==$getstate['state']){echo 'selected';} ?>>
                                                            <?php echo $getstate['state'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                        </div>
                                                
                                                <div
                                                    class="form-group select col-md-4 <?php if($getalldet['Country']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="country">Country
                                                        <span class="required">*</span></label>
                                                    <select class=" form-input form-control" name="country" id="country"
                                                        onchange="return personaldetails()">
                                                        <option value="" style="display:none"></option>
                                                        <option value="India"
                                                            <?php if($getalldet['Country']=='India'){echo "selected";} ?>>
                                                            India</option>
                                                    </select>
                                                </div>

                                                <div
                                                    class="form-group select col-md-4 <?php if($getalldet['Pin_Code']!='0'){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="pincode">Pincode <span
                                                            class="required">*</span></label>
                                                    <input type="tel" name="pincode" class="form-input form-control"
                                                        minlength="6" maxlength="6"
                                                        value="<?php if($getalldet['Pin_Code']!='0'){echo $getalldet['Pin_Code'];}; ?>"
                                                        onkeypress="isNumeric(event)"/>
                                                </div>

                                                <div
                                                    class="form-group select col-md-4 <?php if($getalldet['Alt_Mobile_No']!='0'){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="mobile">Alt Phone
                                                        Number</label>
                                                    <input type="number" class="form-input form-control"
                                                        min="6000000000" max="9999999999"
                                                        value="<?php if($getalldet['Alt_Mobile_No']!='0'){echo $getalldet['Alt_Mobile_No'];} ;?>"
                                                        onkeypress="return isNumeric(event)" name="altmobileno">
                                                </div>
                                                <div class="form-group select col-md-4"></div>
                                                <?php $getidentity=explode(',',$getalldet['Identity_Proof']); ?>
                                                <div
                                                    class="form-group select col-md-4 <?php if($getidentity[0]!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="identity">Identity
                                                        Proof</label>
                                                    <select class=" form-input form-control" name="identity"
                                                        id="identity">
                                                        <option value="" style="display:none"></option>
                                                        <option value="pancard"
                                                            <?php if($getidentity[0]=='pancard'){echo "selected";} ?>>
                                                            Pan Card</option>
                                                        <option value="adharcard"
                                                            <?php if($getidentity[0]=='adharcard'){echo "selected";} ?>>
                                                            Adhar Card</option>
                                                        <option value="voterid"
                                                            <?php if($getidentity[0]=='voterid'){echo "selected";} ?>>
                                                            Voter Id Card</option>
                                                    </select>
                                                </div>

                                                <div
                                                    class="form-group select col-md-4 <?php if($getidentity[1]!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="idnumber">
                                                        Identity Proof Number</label>
                                                    <input type="text" class="form-input form-control" maxlength="15"
                                                        name="identitynumber" value="<?php echo $getidentity[1]; ?>">
                                                </div>

                                                <div class="form-group select col-md-4 position-relative ">
                                                    <label class="image-upload text-right ml-4" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Please upload selected identity proof image size of minimum 700kb and maximum 1mb">
                                                        Upload
                                                        <input type="file" accept="image/jpeg"
                                                            onchange="return Filevalidationtwo(event);" id="filetwo"
                                                            name="doc" data-toggle="tooltip" data-placement="top"
                                                            title="Click here to view your doc imaage">
                                                    </label><span class="info-image">
                                                        <a id="getimage"
                                                            href="<?php echo base_url().'/uploads/document/'.$getidentity[2]?>"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Click here to view your doc image"><i
                                                                class="fas fa-eye"></i></a>
                                                        <!-- <a target="_blank"
                                                            <?php if($getidentity[2]==''){echo "style='display:none'"; }?>
                                                            href="<?php echo base_url().'/uploads/document/'.$getidentity[2]?>"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Click here to view your doc imaage"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="Please select the size of image minimum 700kb and maximum 1mb"><i
                                                                class="fas fa-info-circle"></i></a> -->
                                                    </span>
                                                    <input type="hidden" value="<?php echo $getidentity[2];?>"
                                                        name="oldimage" />




                                                </div>



                                                <!-- <div class="form-group select col-md-8 Applicant_Interests <?php if($getalldet['Applicant_Interests']!=''){echo 'focused';} ;?>" >
<label class="form-label heading-title" for="identity">Interests </label>

<?php $getint=explode(',',$getalldet['Applicant_Interests']); ?>
<select id="example-singleone" class="form-control example-single form-input" multiple="multiple" name="interest[]" data-mdb-visible-options='9'>
<?php foreach($getinterest as $intrest){
?>
<option value="<?php echo $intrest['Interest_Name'];?>" <?php  foreach($getint as $int){ if($intrest['Interest_Name']==$int){echo "selected";}; } ?>><?php echo $intrest['Interest_Name'];?></option>
<?php }  ?>
</select>
</div> -->


                                                <h5 class="items-text col-md-12"><span>Interests</span></h5>
                                                <?php $getint=explode(',',$getalldet['Applicant_Interests']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($getint[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="interest"
                                                            onkeyup="return interestss('');" name="interest[]"
                                                            value="<?php  echo $getint[0];?>">
                                                        <div class="droping-lists dropinggsix" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectinterest[]" id="interesttt"
                                                            value="<?php  echo $getint[0];?>">
                                                    </div>
                                                    <div class="all_interest content">
                                                        <?php $j=0;$i=0;foreach($getint as $getintt){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">

                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="interest<?php echo $i; ?>"
                                                                onkeyup="interestss('<?php echo $i; ?>')"
                                                                value="<?php echo $getintt; ?>" name="interest[]">

                                                            <input type="hidden" name="selectinterest[]"
                                                                id="interesttt<?php echo $i; ?>"
                                                                value="<?php echo $getintt; ?>">
                                                            <div class="droping-lists dropinggsix<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="interestbutton addbutton"><i
                                                            class="far fa-plus-square"></i></button>
                                                </div>





                                                <!-- <div class="form-group select col-md-8 <?php if($getalldet['Hobbies']!=''){echo 'focused';} ;?>" >
<label class="form-label heading-title" for="identity">Hobbies </label>
<?php  $gethobb=explode(',',$getalldet['Hobbies']); ?>
<select id="example-single" class="form-control example-single form-input" multiple="multiple" name="hobbies[]" data-mdb-visible-options='9'>
<?php foreach($gethobby as $hobby){
?>

<option value="<?php echo $hobby['Hobby_Name'];?>" <?php  foreach($gethobb as $hob){ if($hobby['Hobby_Name']==$hob){echo "selected";}; } ?>><?php echo $hobby['Hobby_Name'];?></option>
<?php }  ?>
</select>
</div> -->


                                                <h5 class="items-text col-md-12"><span>Hobbies</span></h5>
                                                <?php $gethob=explode(',',$getalldet['Hobbies']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($gethob[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="hobbys" onkeyup="return hobbies('');"
                                                            name="hobby[]" value="<?php  echo $gethob[0];?>">
                                                        <div class="droping-lists dropinggseven" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selecthobby[]" id="hobbyy"
                                                            value="<?php  echo $gethob[0];?>">
                                                    </div>
                                                    <div class="all_hobby content">
                                                        <?php $j=0;$i=0;foreach($gethob as $gethobs){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">

                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="hobbys<?php echo $i; ?>"
                                                                onkeyup="hobbies('<?php echo $i; ?>')"
                                                                value="<?php echo $gethobs; ?>" name="hobby[]">

                                                            <input type="hidden" name="selecthobby[]"
                                                                id="hobbyy<?php echo $i; ?>"
                                                                value="<?php echo $gethobs; ?>">
                                                            <div class="droping-lists dropinggseven<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addhobby addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>




                                                <span id="personalerror"></span>

                                                <div class="form-group select col-md-12 text-center mt-4 pb-3">
                                                    <button type="submit" name="personaldetailbutton"
                                                        class="btn btn-primary d-inline-block d-sm-block btn-modal width253"
                                                        id="personaldetailbutton" value="personaldetailbutton"
                                                        disabled>Save & Continue</button>
                                                </div>

                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>


                            <div class="panel">
                                <div class="panel-heading accordion-toggle question-toggle collapsed"
                                    data-toggle="collapse" data-parent="#proffesionaldetails"
                                    data-target="#proffesionaldetails">
                                    <h5 class="panel-title faq">
                                        <a class="ing">Professional Details</a>
                                        <span><i class="fas fa-caret-down"></i></span>
                                    </h5>
                                </div>
                                <div id="proffesionaldetails"
                                    class="panel-collapse collapse <?php if($types=="Professional"){ echo "show";} ?>">
                                    <div class="panel-body">
                                        <form class="popupmodal" action="<?php echo base_url();?>aspirant/profiles"
                                            method="post" autocomplete="off">

                                            <div class="row">
                                                <div class="col-md-8 form-group mt-2 font15  ">
                                                    <label class="mr-3">Working status</label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="status" value="Fresher"
                                                            <?php if($getalldet['Working_Status']=='Fresher'){echo "checked";} ?>>
                                                        <span>Fresher</span></label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="status" value="Salaried"
                                                            <?php if($getalldet['Working_Status']=='Salaried'){echo "checked";} ?>>
                                                        <span>Salaried</span></label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="status" value="Freelancer"
                                                            <?php if($getalldet['Working_Status']=='Freelancer'){echo "checked";} ?>>
                                                        <span>Freelancer</span></label>
                                                </div>
                                                <div class="col-md-4"></div>
                                                <!-- <div class="col-md-4 form-group <?php if($getalldet['Association_Name']!=''){echo "focused";} ?> position-relative">
<label class="form-label heading-title" for="associationname">Association name </label>
<input type="text" class="form-input form-control" maxlength="150" id="associationname" name="associationname" value="<?php echo $getalldet['Association_Name'];  ?>"  onkeyup="return assocname();">
<div class="droping-lists dropingone" id="droping-lists" style="display:none">
</div>

<input type="hidden" name="selectassociatename" value="<?php echo $getalldet['Association_Name'];  ?>" />

</div> -->


                                                <?php $accc=explode(' - ',$getalldet['Association_Name']); ?>

                                                <div
                                                    class="form-group position-relative col-md-4 <?php if($accc[0]!=''){echo "focused";};?>">
                                                    <label class="form-label heading-title"
                                                        for="associatename">Association name</label>
                                                    <input type="text" class="form-input form-control" maxlength="50"
                                                        id="associatename" onkeyup="return associatenames('');"
                                                        name="associatename[]" value="<?php  echo $accc[0];?>"><input
                                                        type="hidden" name="selectassociatename" id="associatenamee"
                                                        value="<?php  echo $accc[0];?>">
                                                    <div class="droping-lists dropinggfour" id="droping-lists"
                                                        style="display:none">

                                                    </div>



                                                    <!-- <div class="allassociate content">
<?php $j=0;$i=0;foreach($accc as $accce){?>
<?php if($j!=0){?>
<div class="remove form-group position-relative focused">
<label class="form-label heading-title" for="associatename">Association name</label>
<input type="text" class="form-input form-control" maxlength="150" id="associatename<?php echo $i; ?>" onkeyup="associatenames('<?php echo $i; ?>')" value="<?php echo $accce; ?>" name="associatename[]">

<input type="hidden" name="selectassociatename[]" id="associatenamee<?php echo $i; ?>" value="<?php echo $accce; ?>"><div class="droping-lists dropinggfour<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>

<?php $i++;} $j++; } ?>

</div>
<button type="button" class="addaccosiate addbutton"><i class="far fa-plus-square"></i> </button> -->
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['License_No']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="licensenumber">License
                                                        Number</label>
                                                    <input type="text" class="form-input form-control text-uppercase"
                                                        maxlength="30" id="licensenumber" name="licensenumber"
                                                        value="<?php echo $getalldet['License_No']; ?>"
                                                        onkeypress="return isAlphaNumeric (event)">
                                                </div>

                                                <div class="col-md-4"></div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Job_Title']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="Job Title name">Job
                                                        Title</label>
                                                    <input type="text" class="form-input form-control" maxlength="200"
                                                        id="jobtitle" name="jobtitle"
                                                        value="<?php echo $getalldet['Job_Title'];  ?>">
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Job_Locality']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="joblocality">Job
                                                        Locality</label>


                                                    <input type="text" class="form-input form-control" maxlength="150"
                                                        id="joblocality" name="joblocality"
                                                        value="<?php echo $getalldet['Job_Locality'];  ?>"
                                                        onkeypress="return isString (event);"
                                                        onkeyup="return joblocalityy();">
                                                    <div class="droping-lists dropingthree" id="droping-lists"
                                                        style="display:none">
                                                    </div>

                                                    <input type="hidden" name="selectjoblocality"
                                                        value="<?php echo $getalldet['Job_Locality'];  ?>" />


                                                </div>





                                                <h5 class="items-text col-md-12"><span>Certificates</span></h5>

                                                <?php $getgcert=explode(', ',$getalldet['Certificate']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($getgcert[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="procertificate"
                                                            onkeyup="return procertificates('');"
                                                            name="procertificate[]" value="<?php  echo $getgcert[0];?>">
                                                        <div class="droping-lists dropinggthree" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectprocertificate[]"
                                                            id="procertificatee" value="<?php  echo $getgcert[0];?>">
                                                    </div>
                                                    <div class="all_pro_cert content">
                                                        <?php $j=0;$i=0;foreach($getgcert as $getgcertt){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">
                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="procertificate<?php echo $i; ?>"
                                                                onkeyup="procertificates('<?php echo $i; ?>')"
                                                                value="<?php echo $getgcertt; ?>"
                                                                name="procertificate[]">

                                                            <input type="hidden" name="selectprocertificate[]"
                                                                id="procertificatee<?php echo $i; ?>"
                                                                value="<?php echo $getgcertt; ?>">
                                                            <div class="droping-lists dropinggthree<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="procerticatebutton addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>


                                                <div class="col-md-4 form-group focused">
                                                    <label class="form-label heading-title" for="currentpay">Current
                                                        Pay</label>
                                                    <input type="text" class="form-input form-control bg-transparent"
                                                        id="currentpay" name="currentpay"
                                                        value="<?php echo $getalldet['Current_Pay'];  ?>"
                                                        onkeypress="return isNumeric(event)" readonly><span
                                                        class="right-text"><a data-toggle="tooltip" data-placement="top"
                                                            title=""
                                                            data-original-title="Per Shift X 260 Working Days"><i
                                                                class="fas fa-info-circle"></i></a></span>
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Notice_Period']!=''){echo "focused";} ?> position-relative">
                                                    <label class="form-label heading-title" for="noticeperiod">Notice
                                                        period</label>
                                                    <input type="number" min="1" max="84"
                                                        class="form-input form-control" maxlength="30" id="noticeperiod"
                                                        name="noticeperiod"
                                                        value="<?php echo $getalldet['Notice_Period']; ?>"
                                                        onkeypress="return isNumeric(event)">
                                                    <span class="right-text">In Days</span>
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Yrs_of_Exp']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title"
                                                        for="yearsofExperience">Years of Experience</label>
                                                    <input type="text" class="form-input form-control" min="1"
                                                        max="100000" id="yearofexpirence" name="yearofexpirence"
                                                        value="<?php echo $getalldet['Yrs_of_Exp']; ?>"
                                                        onkeypress="return allowFloat (event)">
                                                </div>



                                                <!-- <?php  $pprs=explode(', ',$getalldet['Present_Job_Roles']);?>
<div class="col-md-8 form-group <?php if($getalldet['Present_Job_Roles']!=''){echo "focused";} ?>">
<label class="form-label heading-title" for="presentjobroles">Previous/ Present Job Roles</label>
<select class="example-single" name="presentjobroles[]" multiple="multiple">
<?php foreach ($ppjrr as $ppjr) {?>
<option value="<?php echo $ppjr['Name'];?>" <?php foreach($pprs as $gppr){ if($gppr==$ppjr['Name']){ echo "Selected";}} ?>><?php echo $ppjr['Name'];?></option>
<?php }  ?>
</select>

</div> -->
                                                <h5 class="items-text col-md-12"><span>Present Previous Jobs</span></h5>

                                                <?php $pprs=explode(', ',$getalldet['Present_Job_Roles']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($pprs[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="ppjr"
                                                            onkeyup="return presentjobroles('');"
                                                            name="presentjobroles[]" value="<?php  echo $pprs[0];?>">
                                                        <div class="droping-lists dropinggtwo" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectpresentjobroless[]"
                                                            id="presentjobroless" value="<?php  echo $pprs[0];?>">
                                                    </div>
                                                    <div class="alljobs content">
                                                        <?php $j=0;$i=0;foreach($pprs as $pprss){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">

                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="ppjr<?php echo $i; ?>"
                                                                onkeyup="presentjobroles('<?php echo $i; ?>')"
                                                                value="<?php echo $pprss; ?>" name="presentjobroles[]">

                                                            <input type="hidden" name="selectpresentjobroless[]"
                                                                id="presentjobroless<?php echo $i; ?>"
                                                                value="<?php echo $pprss; ?>">
                                                            <div class="droping-lists dropingtwo<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="jobbutton addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>



                                                <div
                                                    class="col-md-12 form-group <?php if($getalldet['Job_Desc']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="jobdescription">Job
                                                        description</label>
                                                    <textarea type="text" class="form-input form-control"
                                                        maxlength="200" col="4" rows="3" id="jobdescription"
                                                        name="jobdescription"><?php echo $getalldet['Job_Desc'];?></textarea>
                                                </div>

                                                <div class="col-md-4 form-group mt-2 font15">

                                                    <label class="radio form-radio">
                                                        <input type="radio" name="wstatus" value="Working"
                                                            <?php if($getalldet['Current_Working_Status']=='Working'){echo "checked";} ?>>
                                                        <span>Working</span></label>
                                                    <label class="radio form-radio">
                                                        <input type="radio" name="wstatus" value="Not Working"
                                                            <?php if($getalldet['Current_Working_Status']=='Not Working'){echo "checked";} ?>>
                                                        <span>Not Working</span></label>

                                                </div>

                                                <h5 class="items-text col-md-12"><span>Clients work with</span></h5>
                                                <?php $cww=explode(' - ',$getalldet['Clients_wrk_with']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($cww[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="clientworkwith"
                                                            onkeyup="return clientworkwithhs('');"
                                                            name="clientworkwith[]" value="<?php  echo $cww[0];?>"
                                                            onkeypress="return isString (event);">
                                                        <div class="droping-lists dropinggfive" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectclientworkwith[]"
                                                            id="clientworkwithh" value="<?php  echo $cww[0];?>">
                                                    </div>
                                                    <div class="all_client content">
                                                        <?php $j=0;$i=0;foreach($cww as $cwww){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">
                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="clientworkwith<?php echo $i; ?>"
                                                                onkeyup="clientworkwithhs('<?php echo $i; ?>')"
                                                                value="<?php echo $cwww; ?>" name="clientworkwith[]"
                                                                onkeypress="return isString (event);">

                                                            <input type="hidden" name="selectclientworkwith[]"
                                                                id="clientworkwithh<?php echo $i; ?>"
                                                                value="<?php echo $cwww; ?>">
                                                            <div class="droping-lists dropinggfive<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addclients addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if(($getalldet['Project_Done']!='')&&($getalldet['Project_Done']!='0')){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="projectdone">Project
                                                        Done</label>
                                                    <input type="number" class="form-input form-control"
                                                        id="projectdone" name="projectdone"
                                                        value="<?php if(($getalldet['Project_Done']!='')&&($getalldet['Project_Done']!='0')){echo $getalldet['Project_Done'];} ?>"
                                                        min="1" max="100000" onkeypress="return isNumeric(event)">
                                                </div>

                                                <div
                                                    class="col-md-4 form-group <?php if($getalldet['Project_Type']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="projectdone">Project
                                                        Type</label>
                                                    <input type="text" class="form-input form-control" maxlength="30"
                                                        id="projecttype" name="projecttype"
                                                        value="<?php echo $getalldet['Project_Type']; ?>">
                                                </div>



                                                <?php $fi=explode(' - ',$getalldet['Functional_Industry']); ?>

                                                <div
                                                    class=" col-md-4 form-group position-relative <?php if($fi[0]!=''){echo "focused";};?>">
                                                    <label class="form-label heading-title"
                                                        for="functionalintreset">Functional Industry</label>
                                                    <input type="hidden" name="selectfunctionalintreset"
                                                        id="functionalintresett" value="<?php  echo $fi[0];?>">
                                                    <input type="text" class="form-input form-control" maxlength="50"
                                                        id="functionalintreset"
                                                        onkeyup="return functionalintresets('');"
                                                        name="functionalintreset[]" value="<?php  echo $fi[0];?>"
                                                        onkeypress="return isString (event);">
                                                    <div class="droping-lists dropping12345" id="droping-lists"
                                                        style="display:none">
                                                    </div>
                                                </div>

                                                <!-- <div class="all_functional_intreset content">
<?php $j=0;$i=0;foreach($fi as $fii){?>
<?php if($j!=0){?>
<div class="remove form-group position-relative focused">
<label class="form-label heading-title" for="functionalintreset">Functional Industry</label>
<input type="text" class="form-input form-control" maxlength="150" id="functionalintreset<?php echo $i; ?>" onkeyup="functionalintresets('<?php echo $i; ?>')" value="<?php echo $fii; ?>" name="functionalintreset[]" onkeypress="return isString (event);">

<input type="hidden" name="selectfunctionalintreset[]" id="functionalintresett<?php echo $i; ?>" value="<?php echo $fii; ?>"><div class="droping-lists dropping12345<?php echo $i; ?>" id="droping-lists" style="display:none"></div><a href="#" class="remove-field btn-remove-customer removeall"><i class="far fa-trash-alt"></i></a></div>

<?php $i++;} $j++; } ?>

</div>
<button type="button" class="addfunctinterest addbutton"><i class="far fa-plus-square"></i> </button>-->


                                                <h5 class="items-text col-md-12"><span>Functional Area</span></h5>

                                                <?php $fa=explode(', ',$getalldet['Functional_Area']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($fa[0]!=''){echo "focused";};?> mr-3">
                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="functionalarea"
                                                            onkeyup="return functionalareas('');"
                                                            name="functionalarea[]" value="<?php  echo $fa[0];?>"
                                                            onkeypress="return isString (event);">
                                                        <div class="droping-lists dropping1234" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectfunctionalarea[]"
                                                            id="functionalareaa" value="<?php  echo $fa[0];?>">
                                                    </div>
                                                    <div class="all_functional_area content">
                                                        <?php $j=0;$i=0;foreach($fa as $faa){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">

                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="functionalarea<?php echo $i; ?>"
                                                                onkeyup="functionalareas('<?php echo $i; ?>')"
                                                                value="<?php echo $faa; ?>" name="functionalarea[]"
                                                                onkeypress="return isString (event);">

                                                            <input type="hidden" name="selectfunctionalarea[]"
                                                                id="functionalareaa<?php echo $i; ?>"
                                                                value="<?php echo $faa; ?>">
                                                            <div class="droping-lists dropping1234<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addfuncarea addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>

                                                <h5 class="items-text col-md-12"><span>Skills</span></h5>

                                                <?php $skills=explode(', ',$getalldet['Skills']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($skills[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="skills" onkeyup="return skillsss('');"
                                                            name="skills[]" value="<?php  echo $skills[0];?>"
                                                            onkeypress="return isString (event);">
                                                        <div class="droping-lists dropping123456" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectskills[]" id="skillss"
                                                            value="<?php  echo $skills[0];?>">
                                                    </div>
                                                    <div class="all_skill content">
                                                        <?php $j=0;$i=0;foreach($skills as $skill){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">

                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="skills<?php echo $i; ?>"
                                                                onkeyup="skillsss('<?php echo $i; ?>')"
                                                                value="<?php echo $skill; ?>" name="skills[]"
                                                                onkeypress="return isString (event);">

                                                            <input type="hidden" name="selectskills[]"
                                                                id="skillss<?php echo $i; ?>"
                                                                value="<?php echo $skill; ?>">
                                                            <div class="droping-lists dropping123456<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addskill addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>

                                                <h5 class="items-text col-md-12"><span>Expertises</span></h5>
                                                <?php $expert=explode(', ',$getalldet['Expertise']); ?>
                                                <div id="items" class="row prsentjobparent">
                                                    <div
                                                        class="form-group position-relative <?php if($expert[0]!=''){echo "focused";};?> mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="expert" onkeyup="return expertises('');"
                                                            name="expert[]" value="<?php  echo $expert[0];?>"
                                                            onkeypress="return isString (event);">
                                                        <div class="droping-lists dropping11" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectexpert[]" id="expertss"
                                                            value="<?php  echo $expert[0];?>">
                                                    </div>
                                                    <div class="all_expertise content">
                                                        <?php $j=0;$i=0;foreach($expert as $experts){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">
                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="expert<?php echo $i; ?>"
                                                                onkeyup="return expertises('<?php echo $i; ?>')"
                                                                value="<?php echo $experts; ?>" name="expert[]"
                                                                onkeypress="return isString (event);">

                                                            <input type="hidden" name="selectexpert[]"
                                                                id="expertss<?php echo $i; ?>"
                                                                value="<?php echo $experts; ?>">
                                                            <div class="droping-lists dropping11<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addexpertise addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>






                                                <!-- 
<div class="col-md-4 form-group">
<label class="form-label heading-title" for="first">OTT, TV</label>
<select type="text" class="form-input form-control filled"  maxlength="50"  name="quesfullname">
<option value="" style="display:none" selected></option>
<option>OTT, TV</option>
</select>
<select id="example-single" class="form-control example-single" >
<option value="">Option 1</option>
<option value="1">Harsh</option>
<option value="2">Option 2</option>
<option value="3">Option 3</option>
<option value="4">Option 4</option>
<option value="5">Option 5</option>
<option value="6">Option 6</option>
</select>

</div> -->





                                            </div>


                                            <div class="form-group select col-md-12 text-center mt-4 ">
                                                <button type="submit" name="professionalbutton"
                                                    value="professionalbutton"
                                                    class="btn btn-primary d-inline-block d-sm-block btn-modal width253">Save
                                                    & Continue</button>
                                            </div>
                                            <br>
                                    </div>
                                </div>
                                </form>
                            </div>


                            <div class="panel">
                                <div class="panel-heading accordion-toggle question-toggle collapsed"
                                    data-toggle="collapse" data-parent="#educationaldetails"
                                    data-target="#educationaldetails">
                                    <h5 class="panel-title faq">
                                        <a class="ing">Educational Details</a>
                                        <span><i class="fas fa-caret-down"></i></span>
                                    </h5>
                                </div>
                                <div id="educationaldetails"
                                    class="panel-collapse collapse <?php if($types=="Educational"){ echo "show";} ?>">
                                    <div class="panel-body">
                                        <form action="<?php echo base_url();?>aspirant/profiles" method="post"
                                            enctype='multipart/form-data' autocomplete="off">
                                            <div class="row popupmodal">



                                                <div
                                                    class="form-group select col-md-4 <?php if($getalldet['Highest_Education']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="country">Highest
                                                        Education</label>

                                                    <input type="text" class="form-input form-control" maxlength="150"
                                                        id="highestedu" name="highestedu"
                                                        value="<?php echo $getalldet['Highest_Education'];  ?>"
                                                        onkeypress="return isString (event);"
                                                        onkeyup="return highesteduu();">
                                                    <div class="droping-lists dropingfour" id="droping-lists"
                                                        style="display:none">
                                                    </div>

                                                    <input type="hidden" name="selecthighestedu"
                                                        value="<?php echo $getalldet['Highest_Education'];  ?>" />
                                                </div>


                                                <div
                                                    class="form-group select col-md-4 <?php if($getalldet['Specialization']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title"
                                                        for="Specialization">Specialization</label>
                                                    <input type="text" class="form-input form-control" maxlength="150"
                                                        id="specialization" name="specialization"
                                                        value="<?php echo $getalldet['Specialization'];  ?>"
                                                        onkeypress="return isString (event);"
                                                        onkeyup="return specializationnn();">
                                                    <div class="droping-lists dropingfive" id="droping-lists"
                                                        style="display:none">
                                                    </div>

                                                    <input type="hidden" name="selectspecialization"
                                                        value="<?php echo $getalldet['Specialization'];  ?>" />
                                                </div>

                                                <div
                                                    class="form-group select col-md-4 <?php if(($getalldet['Year_of_Passing']!='0')){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="year">Year of
                                                        Passing</label>
                                                    <select class=" form-input form-control example-single"
                                                        name="yearofpassing" id="yearofpassing">
                                                        <?php $getyesr=date('Y'); for($x = 1980; $x <= $getyesr; $x++){?>
                                                        <option value="<?php echo $x;  ?>"
                                                            <?php if($getalldet['Year_of_Passing']==$x){echo "selected";} ?>>
                                                            <?php echo $x;  ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <h5 class="items-text col-md-12"><span>Certificates</span></h5>
                                                <?php $othercertificate=explode(', ',$getalldet['Othr_Certificates']); ?>
                                                <div id="items" class="row">
                                                    <div class="form-group position-relative mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" onkeyup="return certificatess('');"
                                                            name="cert[]" id="cert"
                                                            value="<?php  echo $othercertificate[0];?>">
                                                        <div class="droping-lists dropingg" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectcertificateone[]"
                                                            id="certificatee"
                                                            value="<?php  echo $othercertificate[0];?>">
                                                    </div>
                                                    <div class="allcertificate content">
                                                        <?php $j=0;$i=0;foreach($othercertificate as $certificates){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative">
                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="cert<?php echo $i; ?>"
                                                                onkeyup="certificatess('<?php echo $i; ?>')"
                                                                value="<?php echo $certificates; ?>" name="cert[]">
                                                            <input type="hidden" name="selectcertificateone[]"
                                                                id="certificatee<?php echo $i; ?>"
                                                                value="<?php echo $certificates; ?>">
                                                            <div class="droping-lists dropingg<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addcertificates addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>


                                                <!-- <div class="form-group select col-md-12 <?php if($getalldet['Othr_Certificates']!=''){echo "focused";} ?>" >

<label class="form-label heading-title" for="certificate">Certificate</label>
<select class="example-single" multiple="multiple" name="selectcertificateone[]">
<?php foreach ($certificatee as $certi) { ?>
<option value="<?php echo $certi['Name']; ?>" <?php foreach($othercertificate as $getcert){ if($getcert==$certi['Name']){echo "Selected";}} ?>><?php echo $certi['Name']; ?> </option>
<?php }?>
</select> 


</div>-->
                                                <h5 class="items-text col-md-12"><span>Languages</span></h5>

                                                <?php $langgu=explode(' - ',$getalldet['Language_Known']); ?>
                                                <div id="items" class="row language-border">

                                                    <div
                                                        class="form-group alllanguages position-relative <?php if($langgu[0]!=''){echo "focused";};?> mr-3">
                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="lang" onkeyup="return language('');"
                                                            name="lang[]" value="<?php  echo $langgu[0];?>">
                                                        <div class="droping-lists droping" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="langusgaess[]" id="languagee"
                                                            value="<?php  echo $langgu[0];?>">
                                                    </div>
                                                    <div class="alllanguages_row content">
                                                        <?php $j=0;$i=0;foreach($langgu as $langguu){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">
                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="lang<?php echo $i; ?>"
                                                                onkeyup="language('<?php echo $i; ?>')"
                                                                value="<?php echo $langguu; ?>" name="lang[]">
                                                            <input type="hidden" name="langusgaess[]"
                                                                id="languagee<?php echo $i; ?>"
                                                                value="<?php echo $langguu; ?>">
                                                            <div class="droping-lists droping<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="extra-fields-customer addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>

                                                <h5 class="items-text col-md-12"><span>Softwares</span></h5>
                                                <?php $softs=explode(', ',$getalldet['Softwares']); ?>
                                                <div id="items" class="row">
                                                    <div class="form-group position-relative mr-3">

                                                        <input type="text" class="form-input form-control"
                                                            maxlength="50" id="softs" onkeyup="return softwaress('');"
                                                            name="softs[]" value="<?php  echo $softs[0];?>">
                                                        <div class="droping-lists dropinggones" id="droping-lists"
                                                            style="display:none">
                                                        </div>

                                                        <input type="hidden" name="selectsoftwaress[]" id="softwaresss"
                                                            value="<?php  echo $softs[0];?>">
                                                    </div>
                                                    <div class="all_softwaress content">
                                                        <?php $j=0;$i=0;foreach($softs as $softss){?>
                                                        <?php if($j!=0){?>
                                                        <div class="remove form-group position-relative focused">

                                                            <input type="text" class="form-input form-control"
                                                                maxlength="150" id="softs<?php echo $i; ?>"
                                                                onkeyup="softwaress('<?php echo $i; ?>')"
                                                                value="<?php echo $softss; ?>" name="softs[]">
                                                            <input type="hidden" name="selectsoftwaress[]"
                                                                id="softwaress<?php echo $i; ?>"
                                                                value="<?php echo $softss; ?>">
                                                            <div class="droping-lists dropinggones<?php echo $i; ?>"
                                                                id="droping-lists" style="display:none"></div><a
                                                                href="#"
                                                                class="remove-field btn-remove-customer removeall"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>

                                                        <?php $i++;} $j++; } ?>

                                                    </div>
                                                    <button type="button" class="addsoftwaress addbutton"><i
                                                            class="far fa-plus-square"></i> </button>
                                                </div>




                                                <div
                                                    class="col-md-8 form-group <?php if($getalldet['Othr_Compt_Achievements']!=''){echo "focused";} ?>">
                                                    <label class="form-label heading-title" for="address">Competitive
                                                        Achievements</label>
                                                    <textarea type="text" class="form-input form-control" col="4"
                                                        rows="3" id="competitiveachievements"
                                                        name="competitiveachievements"><?php echo $getalldet['Othr_Compt_Achievements']; ?></textarea>
                                                </div>

                                                <div class="form-group select col-md-12 text-center mt-4 pb-3">
                                                    <button type="submit" name="educationaldetails"
                                                        value="educationaldetails"
                                                        class="btn btn-primary d-inline-block d-sm-block btn-modal width253">Save</button>
                                                </div>

                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="col-md-3 pl-5">
                        <div class="form-group select col-md-12 text-left pl-0">
                            <button type="button" name="submit" value="submit"
                                class="btn btn-primary d-inline-block d-sm-block btn-modal width42 addprofile" id="adduserpro"
                                data-toggle="modal" data-target="#addprofile" disabled>Add Profile</button>
                        </div>
                        <h6 class="priority">Priority List</h6>
                        <span class="userprofile"></span>


                    </div>
                </div>
            </div>
    </div>
    </main>
    <div class="modal fade" id="addprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content adddetailss ">
                <div class="modal-header mod-head">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-5">
                    <h5 class="text-center pb-2">Raise the bar by adding another profile here!</h5>
                    <h6 class="pb-2">Let’s begin!</h6>
                    <form class="popupmodal addprofiles" autocomplete="off" method="post"
                        action="<?php echo base_url();?>aspirant/profiles">
                        <p class="position-relative mb-0">I also want to be <input type="text" name="iwanttobe"
                                id="iwanttobe" class="profile-selecter" onkeyup="return addprofilesssss()"><span
                                id="profilein"></span></p>
                        <div class="droping-list">
                            <span id="getprofile"></span>
                        </div>
                        <p class="experiencess mb-0" style="display:none;"> I have <select type="text" name="expirence"
                                id="expirence" class="profile-selecter" onchange="return addprofilesssss()">
                                <option value="">Select Seniority</option>
                                <?php foreach($getsenn as $gets) {?><option value="<?php echo $gets['name']; ?>">
                                    <?php echo $gets['name']; ?></option> <?php } ?>
                            </select>experience level. </p>
                        <p class="afterexperience" style="display:none;">Looks good! Let’s move further and enter
                            details for your <span class="namepro text-lowercase"></span> profile.</p>
                </div>
                <input type="hidden" id="profileid" name="profileid">
                <input type="hidden" id="subcatid" name="subcatid">
                <input type="hidden" id="catid" name="catid">
                <div class="modal-footer text-center d-block border-0 mb-2">
                    <button type="submit" name="addprofiles" value="addprofiles" class="btn btn-primary width42">Save
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>








    <?php include "footer.php";  ?>
</div>
</div>
<?php include "scripts.php";  ?>


</body>

<script type="text/javascript">


getcityall(<?php echo $getalldet['Pin_Code'];?>);
getstateall(<?php echo $getalldet['Pin_Code'];?>);
getpincodecheck(<?php echo $getalldet['Pin_Code'];?>);

$('input[name=pincode]').keyup(function(){
    
   var pincode=$(this).val();
   getcityall(pincode);
   getstateall(pincode);
  
});
function getcityall(pincode) { 
    var len=$('input[name=pincode]').val();          
    $.ajax({
        type: 'POST',
        url: 'getcityselect',
        data: {
            'pincode':pincode,
        },
        success: function(getcity) {
            $('#getcity').html(getcity);
            getpincodecheck(pincode);
        }
    })
}


function getstateall(pincode) {
    var len=$('input[name=pincode]').val();
    $.ajax({
        type: 'POST',
        url: 'getstateselect',
        data: {
            'pincode':pincode,
        },
        success: function(getcity) {
            $('#getstate').html(getcity);
            
        }
    })
}


opentemp('');

function opentemp(id) {
    $('#deleteid').val(id);
    $(".gettemplate").html('<div class="col-md-12 text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    $.ajax({
        method: 'POST',
        url: '<?php echo base_url();?>aspirant/gettemplate',
        data: {
            'profileid': id
        },
        success: function(gettemplate) {
            $('.gettemplate').html(gettemplate);
            //$('#profiledetails').addClass('show');
            prodetailsone();
            //             if(id!=''){
            //  $('#profiledetails').addClass('show');
            //             }


        }
    })

}




personaldetails();
addprofilesssss();
getuserprofile('');

function getuserprofile(profile) {
    $(".userprofile").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    $.ajax({
        method: 'POST',
        url: '<?php echo base_url();?>aspirant/getuserpro',
        data: {
            'profile': profile
        },
        success: function(successs) {
            $('.userprofile').html(successs);

            var countpro = $('.profile-list ul li').length;
            if (countpro == '10') {
                $('.addprofile').attr('disabled', true);
            } else {
                $('.addprofile').attr('disabled', false);
            }
        }
    })
}


function deletepro() {
    $.ajax({
        type: 'Post',
        url: 'deletepro',
        success: function(deletes) {
            if (deletes == 'ok') {
                $('.successmessage').html(
                    '<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully updated your profiles !  </div>'
                );
                $('#viewmessage').modal('show');
            } else {
                $('.successmessage').html(
                    '<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! You are not able to delete primary profile.</div> '
                );
                $('#viewmessage').modal('show');
            }

            opentemp('');
            personaldetails();
            addprofilesssss();
            getuserprofile('');
        }

    })
}


function addprofilesssss() {
    var iwanttobe = $('input[name=iwanttobe]').val();
    var expirence = $('select[name=expirence]').val();
    if (expirence != '') {
        $('.afterexperience').fadeIn();
    } else {
        $('.afterexperience').fadeOut();
    }
    if ((iwanttobe.trim() == '') || (expirence.trim() == '')) {
        $('button[name=addprofiles]').attr('disabled', true);

    } else {
        $('button[name=addprofiles]').attr('disabled', false);
    }
}


function addassociate() {

    assocname();
    var getname = $('input[name=associationname]').val();
    $.ajax({
        type: 'Post',
        url: "<?php echo base_url();?>aspirant/addassociationname",
        data: {
            'getname': getname
        },
        success: function(addassociate) {
            assocname();
        }
    })
}



function selectassname(name) {
    $('#associationname').val(name);
    $('input[name=selectassociatename]').val(name);
    $(".dropingone").hide();
}

function selectcerticate(name) {
    $('#certificate').val(name);
    $('input[name=selectcetificate]').val(name);
    $(".dropingtwo").hide();
}

function selectjoblocality(name) {
    $('#joblocality').val(name);
    $('input[name=selectjoblocality]').val(name);
    $(".dropingthree").hide();
}

function selecthighestedu(name) {
    $('#highestedu').val(name);
    $('input[name=selecthighestedu]').val(name);
    $(".dropingfour").hide();
}

function selectspecialization(name) {
    $('#specialization').val(name);
    $('input[name=selectspecialization]').val(name);
    $(".dropingfive").hide();
}



function selectothercertificate(name) {
    $('#certificateone').val(name);
    $('input[name=selectcertificateone]').val(name);
    $(".dropingsix").hide();
}

function certificatefunct() {
    var certificate = $('input[name=certificate]').val();
    $('input[name=selectcetificate]').val('');
    $(".dropingtwo").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (certificate.trim() != '') {
        $(".dropingtwo").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>aspirant/getcerticates',
            data: {
                'name': certificate
            },
            success: function(succccc) {
                $(".dropingtwo").html(succccc);
                $('input[name=getcertificatename]').val(certificate);
                $('#getcertificatename').val(certificate);
            }

        })
    } else {
        $(".dropingtwo").hide();
    }

}

function joblocalityy() {
    var joblocality = $('input[name=joblocality]').val();
    $('input[name=selectjoblocality]').val('');
    $(".dropingthree").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (joblocality.trim() != '') {
        $(".dropingthree").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>aspirant/getjoblocality',
            data: {
                'name': joblocality
            },
            success: function(succccc) {
                $(".dropingthree").html(succccc);
                $('input[name=getjoblocality]').val(joblocality);
                $('#getjoblocality').val(joblocality);
            }

        })
    } else {
        $(".dropingthree").hide();
    }

}

function highesteduu() {
    var highestedu = $('input[name=highestedu]').val();
    $('input[name=selecthighestedu]').val('');
    $(".dropingfour").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (highestedu.trim() != '') {
        $(".dropingfour").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>aspirant/gethighesteduu',
            data: {
                'name': highestedu
            },
            success: function(succccc) {
                $(".dropingfour").html(succccc);
                $('input[name=gethighestedu]').val(highestedu);
                $('#gethighestedu').val(highestedu);
            }

        })
    } else {
        $(".dropingfour").hide();
    }

}

function specializationnn() {
    var specialization = $('input[name=specialization]').val();
    $('input[name=selectspecialization]').val('');
    $(".dropingfive").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (specialization.trim() != '') {
        $(".dropingfive").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>aspirant/getspecialization',
            data: {
                'name': specialization
            },
            success: function(succccc) {
                $(".dropingfive").html(succccc);
                $('input[name=getspecialization').val(specialization);
                $('#getspecialization').val(specialization);
            }

        })
    } else {
        $(".dropingfive").hide();
    }

}

function certificateones() {
    var certificateone = $('input[name=certificateone]').val();
    $('input[name=selectcertificateone]').val('');
    $(".dropingsix").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (certificateone.trim() != '') {
        $(".dropingsix").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>aspirant/getcertificateone',
            data: {
                'name': certificateone
            },
            success: function(succccc) {
                $(".dropingsix").html(succccc);
                $('input[name=getspecialization').val(certificateone);
                $('#getspecialization').val(certificateone);
            }

        })
    } else {
        $(".dropingsix").hide();
    }

}





function assocname() {
    $('input[name=selectassociatename]').val('');
    var associatedname = $('input[name=associationname]').val();
    $(".dropingone").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i></div>');
    if (associatedname.trim() != '') {
        $(".dropingone").show();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>aspirant/getassociatename',
            data: {
                'name': associatedname
            },
            success: function(succccc) {
                $(".dropingone").html(succccc);
                $('input[name=getassociatedname]').val(associatedname);
                $('#getassociatedname').val(associatedname);
            }

        })
    } else {
        $(".dropingone").hide();
    }

}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#getimage').attr('src', e.target.result);

            $('#getimage').hide();
        }

        reader.readAsDataURL(input.files[0]);
    }
}
Filevalidation = (event) => {
    var fi = document.getElementById('file');
    // Check if any file is selected.
    if (fi.files.length > 0) {
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size;
            var file = Math.round((fsize / 1024));
            // The size of the file.
            if ((file <= 700) || (file >= 1024)) {
                $('.portfolioimageerror').html(
                    '<div class="alert alert-danger alert-dismissible show" role="alert"> Error! Please select a image greater than 700kb or less then 1mb in size!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
                $('#getimage').hide();
                $('#imagephp').show();
                $('#file').val('');
            } else {
                $('#imagephp').hide();
                readURL(fi);
                $('.portfolioimageerror').html(
                    '<div class="alert alert-success alert-dismissible show alert-sm" role="alert"> Image is successfully selected  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
            }
        }
    }
}

Filevalidationtwo = (event) => {
    var fi = document.getElementById('filetwo');
    // Check if any file is selected.
    if (fi.files.length > 0) {
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size;
            var file = Math.round((fsize / 1024));
            // The size of the file.
            if (file <= 700) {
                alert("File too small, please select a file greater than or equal to 700kb");
                $('#getimage').hide();
                $('#imagephp').show();
                $('#filetwo').val('');
            } else if (file >= 1024) {
                alert(
                    "File too Big, please select a file less than or equal to 1mb");
                $('#getimage').hide();
                $('#filetwo').val('');
                $('#imagephp').show();
            } else {
                alert("Successfull! The file is successfully selected");
                $('#imagephp').hide();
                readURL(fi);

            }
        }
    }
}



function cityes(city) {
    if (city != '') {
        $('#citytop').addClass('focused');
    }
    
}
personaldetails();
function personaldetails() {
    var firstname = $('input[name=firstname]').val();
    var lastname = $('input[name=lastname]').val();
    var displayname = $('input[name=displayname]').val();
    var pincode = $('input[name=pincode]').val();
    var country = $('select[name=country]').val();
    
    var dob = $('input[name=dob]').val();
    if ((firstname.trim() == '') || (lastname.trim() == '') || (displayname.trim() == '') || (dob.trim() == '') || (country=='')) {
        $('#personaldetailbutton').attr('disabled', true);
        return false;
    } else {
        getpincodecheck(pincode);
        $('#personaldetailbutton').attr('disabled', false);
        return true;
    }
}


$('#iwanttobe').keyup(function() {
    $('.droping-list').show();
    $('#profilein').html('');
    $('#profileid').val('');
    $('#subcatid').val('');
    $('#catid').val('');
    $('.experiencess').fadeOut();
    $('.afterexperience').fadeOut();
    $('select[name=expirence]').val('');
    $('.seniority').hide();
    $('#getprofile').html('<p class="text-center"><i class="fas fa-spinner fa-spin"></i></p>');
    var iwanttobe = $('#iwanttobe').val();
    if (iwanttobe.trim() != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>aspirant/getprofilestwo',
            data: {
                'iwanttobe': iwanttobe
            },
            success: function(formresult) {
                $('#getprofile').html(formresult);


            }
        })

    } else {
        $('.droping-list').hide();
    }
})






function getstate() {
    $('.loader').show();
    var state = $('select[name=state]').val();
    $.ajax({
        method: 'POST',
        url: 'getcitytwo',
        data: {
            'state': state
        },
        success: function(getcity) {

            $('#getcity').html(getcity);
            personaldetails();
            $('.loader').hide();
        }

    })

}




function getcity(inputValue) {
    if (inputValue == "") {
        $('#city').removeClass('filled');
        $('#citytop').removeClass('focused');
        $('.droping-list').hide();
    } else {
        $('#city').addClass('filled');
        $('#citytop').addClass('focused');


    }
}

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
</script>

</html>