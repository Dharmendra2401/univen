<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
    float: left;
    width: 25%;
    padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {
    margin: 0 -5px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
    }
}

/* Style the counter cards */
.card {
    box-shadow: 0px 3px 10px #00000029;
    padding: 0px;
    text-align: center;
    top: 438px;
    left: 139px;
    width: 200px;
    height: 100px;
    border-radius: 8px;
    background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
    background: #FFFFFF 0% 0% no-repeat padding-box;
}

.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover {
    border-bottom: 0px !important;
}

.nav-tabs>li>a {
    margin-right: -16px !important;
}

#panel {
    display: none;
}

.cur {
    cursor: pointer;
}
</style>
<!-- Life At Cast India -->
<?php $this->load->view('/common/header'); ?>
<!--Testimonials-->
<section class="container section-padding" style="
    padding-bottom: 0px!important;">
    <div class="box-shadowssss">
        <div class="row">
            <div class="col-sm-6 col-md-12 col-lg-10 col-xl-10">
                <h2 class="our-team-heading">All Departments</h2>
            </div>
            <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                <p style="top: 345px;left: 254px;width: 858px;height: 38px;margin-left: 11%;">Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book.</p>
            </div>

        </div>
    </div>
</section>
<section class="container section-padding" style="padding-top: 0px!important;
    padding-bottom: 0px!important;">
    <div class="box-shadowssss">
        <div class="row">
            <div id="exTab2">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#1" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>Finance</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#it" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>IT</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#3" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>HR</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#4" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>Legal</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#5" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>Creative</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#6" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>Finance</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#7" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>IT</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#8" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>HR</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#9" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>Legal</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#10" data-toggle="tab">
                            <div class="column">
                                <div class="card">
                                    <h5>Creative</h5>
                                    <span style="font-size: 14px;">4 Openings</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active" id="it">
                        <div class="row row-image-team">
                            <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="career-desc-heading"><span class="bottom-border-job-desc"
                                        style="color: red; font-size:18px!important;">IT</span></h6>
                                <p class="career-desc-heading" style="font-size: 14px!important;">All open positions</p>
                                <div class="image-team">
                                    <div class="row row-image-team">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <a href="<?php echo base_url()?>home/career_desc">
                                                        <h4 style="margin-right: 44%; color: red">Business Devlopment
                                                            Manager</h4>
                                                    </a>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">Project Manager</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-image-team">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">Sr. UX Designer</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">Lead Web Developer</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-image-team">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">Sr. QA</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">UI Designer (intern)</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-image-team" id="panel">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">Sr. QA</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                            <div class="column">
                                                <div class="card"
                                                    style="top: 89px;left: 139px; width: 559px;height: 110px;opacity: 70%;margin-bottom: 26%;border-left: 5px solid red;">
                                                    <h4 style="margin-right: 44%;">UI Designer (intern)</h4>
                                                    <div style="margin-left: 5%;">
                                                        <p style="width: 441px;">We would like to hear from
                                                            target-oriented, focused indivisuals with a flair of
                                                            creativity and have exceptional commuincation skills.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <img class="img-responsive mrgn-img img-founder career-arrow-style cur"
                                onclick="myFunction()" src="<?php echo base_url()?>images/arrowheads.svg">
                        </div>
                    </div>
                    <div class="tab-pane" id="2">
                        <p class="our-team">Our Team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<?php $this->load->view('/common/footer'); ?>
<script>
function myFunction() {
    document.getElementById("panel").style.display = "block";
}
</script>