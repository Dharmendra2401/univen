<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="text-center admin-pic">
                <img src="<?php echo base_url(); ?>img/default.png" alt="default.jpg" style="width: 60px;">
                <div class="sb-sidenav-menu-heading"><span class="bg-warning bg-admin">Admin</span></div>
            </div>

            <a class="nav-link" href="<?php echo base_url(); ?>admin">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/vedio">
                <div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
                Video Content
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/hired_hire">
                <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                Steps Hired/Hire
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/banner_image">
                <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                Banner Image
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/recentemp">
                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                Recent Emp
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/faq">
                <div class="sb-nav-link-icon"><i class="fas fa-question"></i></div>
                FAQ
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/usercontent">
                <div class="sb-nav-link-icon"><i class="fas fa-file-word"></i></div>
                User Content
            </a>
            <a class="nav-link " href="<?php echo base_url(); ?>admin/testimonials">
                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                Testimonials
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/faqquerries">
                <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                FAQ Query
            </a>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/empcat">
                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                Employer Profile
            </a>


            <a class="nav-link <?php if(($pagename=='aspcat')||($pagename=='aspform')||($pagename=='aspprofile')||($pagename=='aspsubform')||($pagename=='aspprofileform') ){echo "collapsed active";}else{ echo "";} ?>"
                href="#" data-toggle="collapse" data-target="#collapseLayouts"
                <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?>
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i> </div>Aspirant Profile

                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse <?php if(($pagename=='aspcat')||($pagename=='aspform') ||($pagename=='aspsubcat')||($pagename=='aspsubform')||($pagename=='aspprofile')||($pagename=='aspprofileform')){echo "show";}else{ echo "";} ?>"
                id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/aspcat">
                        <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Category List
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/aspsubcat">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Sub Category List
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/aspprofile">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div> Profile List
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/explore_releted_profiles">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div> Explore Related
                        Profiles
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/populartags">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>Popular Tags
                    </a>
                </nav>
            </div>

            <a class="nav-link" href="<?php echo base_url(); ?>admin/profileassign">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Profile Template Assigned
</a>

<a class="nav-link <?php if(($pagename=='hobbies')||($pagename=='interest') ||($pagename=='hair_color')||($pagename=='complexion')||($pagename=='eyecolor')||($pagename=='bodytype')||($pagename=='bodyshape')||($pagename=='choice_of_industry')||($pagename=='additional_details_for_employers')||($pagename=='preferred_platform')||($pagename=='preferred_genre')||($pagename=='highesteducation')||($pagename=='specialization')||($pagename=='other_ceritificate_courses')||($pagename=='language_known')||($pagename=='softwares')||($pagename=='additional_details_for_employerstwo')||($pagename=='choice_of_industry_two')||($pagename=='previous_present_job_roles')||($pagename=='google_certificate')||($pagename=='client_work_with')||($pagename=='functional_interest')||($pagename=='skills')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#master" <?php if(($pagename=='hobbies')||($pagename=='interest') ||($pagename=='hair_color')||($pagename=='eyecolor')||($pagename=='bodytype')||($pagename=='bodyshape')||($pagename=='choice_of_industry')||($pagename=='choice_of_industry')||($pagename=='additional_details_for_employers')||($pagename=='preferred_platform')||($pagename=='preferred_genre')||($pagename=='highesteducation')||($pagename=='specialization')||($pagename=='other_ceritificate_courses')||($pagename=='language_known')||($pagename=='softwares')||($pagename=='additional_details_for_employerstwo')||($pagename=='choice_of_industry_two')||($pagename=='previous_present_job_roles')||($pagename=='google_certificate')||($pagename=='client_work_with')||($pagename=='functional_area')||($pagename=='functional_interest')||($pagename=='skills')){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="master">
<div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i> </div>Master
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='hobbies')||($pagename=='interest') ||($pagename=='hair_color')||($pagename=='complexion')||($pagename=='eyecolor')||($pagename=='bodytype')||($pagename=='bodyshape')||($pagename=='choice_of_industry')||($pagename=='additional_details_for_employers')||($pagename=='preferred_platform')||($pagename=='preferred_genre')||($pagename=='highesteducation') ||($pagename=='specialization')||($pagename=='other_ceritificate_courses')||($pagename=='language_known')||($pagename=='softwares')||($pagename=='additional_details_for_employerstwo')||($pagename=='choice_of_industry_two')||($pagename=='previous_present_job_roles')||($pagename=='google_certificate')||($pagename=='client_work_with')||($pagename=='functional_area')||($pagename=='functional_interest')||($pagename=='skills')){echo "show";}else{ echo "";} ?>" id="master" aria-labelledby="headingOne" data-parent="#master">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="<?php echo base_url(); ?>admin/association"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Association</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/hobbies"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Hobbies</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/interest"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Interest</a>
<a class="nav-link" href="<?php echo base_url(); ?>master/modules"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Admin Modules</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/hair_color"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Hair Color</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/complexion"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Complexion</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/eyecolor"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Eye Color</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/bodytype"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Body Type</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/bodyshape"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Body Shape</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/choice_of_industry"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Choice Of Industry</a>
<!-- <a class="nav-link" href="<?php echo base_url(); ?>admin/choice_of_industry_two"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Choice Of Industry (Form 2)</a> -->
<a class="nav-link" href="<?php echo base_url(); ?>admin/additional_details_for_employers"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Additional Details For Emp (form 1)</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/additional_details_for_employerstwo"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Additional Details For Emp (form 2)</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/preferred_platform"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Preferred Platform</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/preferred_genre"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Preferred Genre</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/highesteducation"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Highest Education</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/specialization"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Specialization</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/other_ceritificate_courses"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Educational Ceritificate</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/language_known"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Language Known</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/softwares"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Softwares</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/previous_present_job_roles"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Previous/present job roles</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/google_certificate"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Professional Certificate</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/client_work_with"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Clients worked with</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/functional_area"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Functional Area</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/functional_interest"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Functional Interest</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/skills"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Skills</a>
</nav>
</div>


            <a class="nav-link <?php if(($pagename=='subcatnarration')||($pagename=='profilenarration') ){echo "collapsed active";}else{ echo "";} ?>"
                href="#" data-toggle="collapse" data-target="#allcontent"
                <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?>
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fab fa-bitbucket"></i> </div> All Narration

                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse <?php if(($pagename=='subcatnarration')||($pagename=='profilenarration')){echo "show";}else{ echo "";} ?>"
                id="allcontent" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/catnarration">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Cat Narration
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/subcatnarration">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div> Sub Cat Narration
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>admin/profilenarration">
                        <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div> Profile Narration
                    </a>
                </nav>
            </div>
            <!-- 
<a class="nav-link <?php if(($pagename=='recuiter_list')||($pagename=='jobs_list')||($pagename=='job_details')||($pagename=='view_recruiter')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayouts" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
Recruiters
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='recuiter_list')||($pagename=='jobs_list') ||($pagename=='job_details')||($pagename=='view_recruiter')){echo "show";}else{ echo "";} ?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="<?php echo base_url(); ?>admin/recuiter_list"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Recruiters List</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/jobs_list"><div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div> Recruiters Jobs</a>
</nav>
</div>

<a class="nav-link" href="<?php echo base_url(); ?>admin/industriesone">
<div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
Industries 1
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/industriestwo">
<div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
Industries 2
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/aboutus">
<div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
About Us
</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/ourwork">
<div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
Our Works
</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/team">
<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
Team
</a>	





<a class="nav-link <?php if(($pagename=='events')||($pagename=='view_events')||($pagename=='detail_events')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayoutstwo" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
Events
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='events')||($pagename=='view_events')||($pagename=='add_events') ||($pagename=='detail_events')){echo "show";}else{ echo "";} ?>" id="collapseLayoutstwo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link " href="<?php echo base_url(); ?>admin/events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div> Events Category</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/add_events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div>Add Event</a>
<a class="nav-link <?php if(($pagename=='view_events') ||($pagename=='detail_events')){echo "active";}?>" href="<?php echo base_url(); ?>admin/view_events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div> Events List</a>
</nav>
</div>
-->

            <a class="nav-link <?php if(($pagename=='blog_catagories')||($pagename=='blog_list')||($pagename=='details_blogs') ){echo "collapsed active";}else{ echo "";} ?>"
                href="#" data-toggle="collapse" data-target="#collapseLayoutsthree"
                <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?>
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                Blogs
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse <?php if(($pagename=='blog_catagories')||($pagename=='blog_list')||($pagename=='details_blogs')){echo "show";}else{ echo "";} ?>"
                id="collapseLayoutsthree" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link " href="<?php echo base_url(); ?>admin/blog_catagories">
                        <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Blogs Category
                    </a>
                    <a class="nav-link <?php if(($pagename=='blog_list')||($pagename=='details_blogs') ){echo "active";}?>"
                        href="<?php echo base_url(); ?>admin/blog_list">
                        <div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div> Blogs Lists
                    </a>
                </nav>
            </div>

            <a class="nav-link <?php if(($pagename=='terms_conditions')||($pagename=='app_terms_conditions')||($pagename=='rec_terms_conditions')){echo "collapsed active";}else{ echo "";} ?>"
                href="#" data-toggle="collapse" data-target="#collapseLayoutsfour"
                <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?>
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                Terms & Conditions
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse <?php if(($pagename=='terms_conditions')||($pagename=='rec_terms_conditions')||($pagename=='app_terms_conditions')|| ($pagename=='ven_terms_conditions')|| ($pagename=='train_terms_conditions') ){echo "show";}else{ echo "";} ?>"
                id="collapseLayoutsfour" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link " href="<?php echo base_url(); ?>admin/terms_conditions">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div> Home
                    </a>
                    <a class="nav-link " href="<?php echo base_url(); ?>admin/app_terms_conditions">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> Applicant
                    </a>
                    <a class="nav-link " href="<?php echo base_url(); ?>admin/rec_terms_conditions">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div> Recruiter
                    </a>
                    <a class="nav-link " href="<?php echo base_url(); ?>admin/ven_terms_conditions">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div> Vendor
                    </a>
                    <a class="nav-link " href="<?php echo base_url(); ?>admin/train_terms_conditions">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div> Trainer
                    </a>

                </nav>
            </div>




            <!-- 
<a class="nav-link" href="<?php echo base_url(); ?>admin/slider">
<div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
Slider
</a> -->

            <!-- <a class="nav-link" href="<?php echo base_url();?>admin/applicant_list">
<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
Applicants List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/contact_us">
<div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
Contact Us List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/super_model">
<div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
Super Model
</a> -->



            <a class="nav-link" href="<?php echo base_url(); ?>admin/logout">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">

    </div>
</nav>