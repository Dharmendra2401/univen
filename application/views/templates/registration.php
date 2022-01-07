<?php $this->load->view('/common/header');  ?>
<div class="registration-form">
    <div class="container section-padding">







        <div class="col-md-8 col-sm-8 position-relative">
            <br></br><br>
            <div class="content-asp-reg">
                <p class="">Say 'YES' to new opportunities.</p>
                <h6>Register now and hire a talent</h6>

                <ul class="listofasp">
                    <li>Jobs</li>
                    <li>Legal assistance</li>
                    <li>Trainings</li>
                    <li>Personal assistance</li>
                    <li>Exclusive membership</li>
                    <li>Celebrity intractions</li>
                    <li>Create portfolio</li>
                    <li>Training discounts</li>
                    <li>Social intractions</li>
                    <li>Marketplace</li>

                </ul>
            </div>
            <img src="<?php echo base_url();?>img/aspregistration.png" id="reg-image" />
        </div>
        <div class="col-md-4 col-sm-4 box-left-shadow">
            <h4 class="text-center f20">Register</h4>
            <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
            <ul class="nav nav-tabs login-contain">
                <li class="<?php if(($tabs=='aspirant')|| ($tabs=='')) { echo "active";}?>"><a data-toggle="tab"
                        href="#regisone" id="aspregimage">Aspirant</a></li>
                <li class="<?php if(($tabs=='employer')) { echo "active";}?>"><a data-toggle="tab" href="#registwo"
                        id="empregimage">Employer</a></li>
            </ul>

            <div class="tab-content">
                <div id="regisone" class="tab-pane fade in active">
                    <form class="form popupmodal formregasp" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="form-label heading-title" for="first">First name</label>
                                <input type="text" class=" form-input form-control" onKeyPress="return isString(event)"
                                    maxlength="15" id="aspfirst" name="aspfirst" onkeyup="return aspregistration();">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label heading-title" for="last">Last name</label>
                                <input type="text" class="form-input form-control" onKeyPress="return isString(event)"
                                    maxlength="15" id="asplast" name="asplast" onkeyup="return aspregistration();">
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <label class="form-label heading-title" for="mobile">Mobile number</label>
                            <input type="number" class="form-input form-control" maxlength="15"
                                onKeyPress="return isNumeric(event)" name="aspmobile" min="6000000000" max="9999999999">
                            <button type="button" name="verifyasp" onclick="return getotp('aspirant');"
                                class="verifyasp" id="verifyasp" style="display:none;">verify</button>
                        </div>
                        <div class="form-group text-center otp-input allotp" style="display:none;">
                            <label class="otp-text">Please enter OTP </label>

                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength='1'
                                name="aspotpone" id="aspotpone" onkeyup="return aspregistration();">
                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength='1'
                                name="aspotptwo" id="aspotptwo" onkeyup="return aspregistration();">
                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength='1'
                                name="aspotpthree" id="aspotpthree" onkeyup="return aspregistration();">
                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength='1'
                                name="aspotpfour" id="aspotpfour" onkeyup="return aspregistration();"><br>
                            <div id="timer" class="settimer"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label heading-title" for="email">Email address</label>
                            <input type="email" class="form-input form-control" id="aspemail" name="aspemail"
                                onkeyup="return verifyemailtwo(this.value)">
                        </div>
                        <span id="asperror"></span>
                        <button type="button" name="submit" value="submit" id="buttonregasp"
                            class="btn btn-primary d-inline-block d-sm-block btn-modal" disabled
                            onclick="return registeredasp();">Continue</button>

                    </form>
                    <div class="terms-cond">

                        <p>By continuing, I agree to<a target="_blank"
                                href="<?php echo base_url();?>home/terms_condition?token=<?php echo base64_encode(1);?>">
                                Terms & Conditions </a>of Cast India</p>
                    </div>
                    <hr>
                    <p class="or"><span>OR</span></p>
                    <p class="social-login text-center">
                        <a href="#">
                            <span id="customBtn" class="customGPlusSignIn">
                                <span class="icon"></span>
                                <span class="buttonText"><i class="fab fa-google"></i></span>
                            </span></a>
                        <a href="#" id="call_facebook_login"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram-square"></i> </a>

                    </p><br></br>
                    <div class="terms-cond register">
                        <p>Already Registered? <a href="<?php echo base_url().'login?tabs=aspirant'?>"> Login here </a>.
                        </p>
                    </div>
                </div>

                <div id="registwo" class="tab-pane fade">
                    <form class="form popupmodal formregemp" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="form-label heading-title" for="first">First name</label>
                                <input type="text" class=" form-input form-control" onKeyPress="return isString(event)"
                                    maxlength="15" id="empfirst" name="empfirst" onkeyup="return regemp();">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label heading-title" for="last">Last name</label>
                                <input type="text" class="form-input form-control" onKeyPress="return isString(event)"
                                    maxlength="15" id="emplast" name="emplast" onkeyup="return regemp();">
                            </div>
                        </div>
                        <div class="form-group position-relative">
                            <label class="form-label heading-title" for="mobile">Mobile number</label>
                            <input type="number" class="form-input form-control" maxlength="15"
                                onKeyPress="return isNumeric(event)" name="empmobile" onkeyup="return regemp();"
                                min="6000000000" max="9999999999">
                            <button type="button" name="verifyasp" onclick="return getotp('employer');"
                                class="verifyemp" id="verifyemp" style="display:none;">verify</button>
                        </div>
                        <div class="form-group text-center otp-input-emp allotp" style="display:none;">
                            <label class="otp-text">Please enter OTP </label>


                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1' name="empotpone"
                                id="empotpone" onkeyup="return regemp();" class="otpinputsemp">
                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1' name="empotptwo"
                                id="empotptwo" onkeyup="return regemp();" class="otpinputsemp">
                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1'
                                name="empotpthree" " id=" empotpthree"onkeyup="return regemp();" class="otpinputsemp">
                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1' name="empotpfour"
                                id="empotpfour" onkeyup="return regemp();" class="otpinputsemp"><br>
                            <div id="timertwo" class="settimer"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label heading-title" for="email">Email address</label>
                            <input type="email" class="form-input form-control" id="empemail" name="empemail"
                                onkeyup="return verifyemail(this.value);">
                        </div>
                        <span id="emperror"></span>
                        <button type="button" name="button" id="buttonregemp"
                            class="btn btn-primary d-inline-block d-sm-block btn-modal"
                            onclick="return registeredemp();" disabled>Continue</button>

                    </form>
                    <div class="terms-cond">

                        <p>By continuing, I agree to <a target="_blank"
                                href="<?php echo base_url();?>home/terms_condition?token=<?php echo base64_encode(2);?>">
                                Terms & Conditions </a>of Cast India</p>
                    </div>
                    <hr>
                    <p class="or"><span>OR</span></p>

                    <p class="social-login text-center">
                        <a href="#">
                            <span id="customBtntwo" class="customGPlusSignIn">
                                <span class="icon"></span>
                                <span class="buttonText"><i class="fab fa-google"></i></span>
                            </span></a>
                        <a href="#" id="call_facebook_login1"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram-square"></i> </a>

                    </p><br></br>
                    <div class="terms-cond register">
                        <p>Already Registered? <a href="<?php echo base_url().'login?tabs=employer'?>"> Login here </a>.
                        </p>

                    </div>

                </div>
                <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
            </div>

        </div>
    </div>
<div id="fb-root"></div>

    <?php $this->load->view('/common/footer'); ?>

    <script>
    $('input[name=aspmobile]').keyup(function() {

        var aspmobile = $('input[name=aspmobile]').val();
        if (aspmobile.length == 10) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>home/validmobile',
                data: {
                    'aspmobile': aspmobile
                },
                success: function(formresult) {

                    if ((formresult == 'ok')) {
                        $('.verifyasp').hide();
                        $('.otp-input').hide();
                        $('input[name=aspmobile]').val('');
                        $('input[name=aspmobile]').focus('');
                        $('#asperror').html(
                            '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Sorry! Mobile number already exist</div>'
                        );
                        aspregistration();
                        return false;
                    } else {
                        $('.verifyasp').show();
                    }



                }
            })
        } else {
            $('.verifyasp').hide();
        }

    });




    $('input[name=empmobile]').keyup(function() {
        var aspmobile = $('input[name=empmobile]').val();
        var usertype = $('input[name=aspusertype]').val();
        if (aspmobile.length == 10) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>home/validmobile',
                data: {
                    'aspmobile': aspmobile
                },
                success: function(formresult) {
                    if (formresult == 'ok') {
                        $('#emperror').html(
                            '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Sorry! Mobile number already exist.</div>'
                        );
                        $('.verifyemp').hide();
                        $('.otp-input-emp').hide();
                        $('input[name=empmobile]').focus('');
                        $('input[name=empmobile]').val('');
                        regemp();
                        return false;
                    } else {
                        $('.verifyemp').show();
                    }



                }
            })


        } else {
            $('.verifyemp').hide();
        }

    });



    function regemp() {
        var empfirst = $('input[name=empfirst]').val();
        var emplast = $('input[name=emplast]').val();
        var empmobile = $('input[name=empmobile]').val();
        var empemail = $('input[name=empemail]').val();
        var empotpone = $('input[name=empotpone]').val();
        var empotptwo = $('input[name=empotptwo]').val();
        var empotpthree = $('input[name=empotpthree]').val();
        var empotpfour = $('input[name=empotpfour]').val();

        var empotponestoreone = $('input[name=empotponestoreone]').val();
        var empotponestoretwo = $('input[name=empotponestoretwo]').val();
        var empotponestorethree = $('input[name=empotponestorethree]').val();
        var empotponestorefour = $('input[name=empotponestorefour]').val();

        var inputotp = empotpone + empotptwo + empotpthree + empotpfour;
        var otpuotp = empotponestoreone + empotponestoretwo + empotponestorethree + empotponestorefour;

        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if ((empfirst.trim() == '') || (emplast.trim() == '') || (empmobile.trim() == '') || (empmobile.length <=
                '9') || (empemail.trim() == '') || (!testEmail.test(empemail)) || (inputotp == '') || (otpuotp == '') ||
            (
                inputotp != otpuotp)) {
            $('#buttonregemp').attr('disabled', false);

            return false;
        } else {
            $('#buttonregemp').attr('disabled', false);

            return true;
        }

    }


    function aspregistration() {
        var aspfirst = $('input[name=aspfirst]').val();
        var asplast = $('input[name=asplast]').val();
        var aspmobile = $('input[name=aspmobile]').val();
        var aspemail = $('input[name=aspemail]').val();
        var aspotpone = $('input[name=aspotpone]').val();
        var aspotptwo = $('input[name=aspotptwo]').val();
        var aspotpthree = $('input[name=aspotpthree]').val();
        var aspotpfour = $('input[name=aspotpfour]').val();

        var aspotponestoreone = $('input[name=aspotponestoreone]').val();
        var aspotponestoretwo = $('input[name=aspotponestoretwo]').val();
        var aspotponestorethree = $('input[name=aspotponestorethree]').val();
        var aspotponestorefour = $('input[name=aspotponestorefour]').val();

        var inputotpp = aspotpone + aspotptwo + aspotpthree + aspotpfour;
        var otpuotpp = aspotponestoreone + aspotponestoretwo + aspotponestorethree + aspotponestorefour;
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if ((aspfirst.trim() == '') || (asplast.trim() == '') || (aspmobile.trim() == '') || (aspmobile.length <=
                '9') || (aspemail.trim() == '') || (!testEmail.test(aspemail)) || (inputotpp == '') || (inputotpp !=
                otpuotpp)) {
            $('#buttonregasp').attr('disabled', true);
        } else {
            $('#buttonregasp').attr('disabled', false);

        }

    }





    var googleUser = {};
    var startApp = function() {
        gapi.load('auth2', function() {
            // Retrieve the singleton for the GoogleAuth library and set up the client.
            auth2 = gapi.auth2.init({
                client_id: '773353308271-he9l4skbvsnjrmc953s4mligp2gtjpog.apps.googleusercontent.com',
                //client_id: '311505472577-03gq7s13oit6ndbcbvbsmb2m4vet6kij.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
                // Request scopes in addition to 'profile' and 'email'
                //scope: 'additional_scope'
            });
            attachSignin(document.getElementById('customBtn'));
            attachSignintwo(document.getElementById('customBtntwo'));
        });
    };

    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                var aspname = googleUser.getBasicProfile().getName();
                var aspemail = googleUser.getBasicProfile().getEmail();
                var getallname = aspname.split(" ");

                window.location = '<?php echo base_url();?>aspmobile?aspfirstname=' + btoa(getallname[0]) +
                    '&asplastname=' + btoa(getallname[1]) + '&aspemail=' + btoa(aspemail);

            },
            function(error) {

            });
    }

    function attachSignintwo(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                var aspname = googleUser.getBasicProfile().getName();
                var aspemail = googleUser.getBasicProfile().getEmail();
                var getallname = aspname.split(" ");

                window.location = '<?php echo base_url();?>empmobile?aspfirstname=' + btoa(getallname[0]) +
                    '&asplastname=' + btoa(getallname[1]) + '&aspemail=' + btoa(aspemail);


            },
            function(error) {

            });
    }





    function registeredasp() {
        var aspname = $('input[name=aspfirst]').val();
        var asplast = $('input[name=asplast]').val();
        var aspemail = $('input[name=aspemail]').val();
        var aspmobile = $('input[name=aspmobile]').val();

        window.location = '<?php echo base_url();?>aspmobile?aspfirstname=' + btoa(aspname) + '&asplastname=' + btoa(
            asplast) + '&aspemail=' + btoa(aspemail) + '&aspmobile=' + btoa(aspmobile);
    }

    function registeredemp() {
        var aspname = $('input[name=empfirst]').val();
        var asplast = $('input[name=emplast]').val();
        var aspemail = $('input[name=empemail]').val();
        var aspmobile = $('input[name=empmobile]').val();
        window.location = '<?php echo base_url();?>empmobile?aspfirstname=' + btoa(aspname) + '&asplastname=' + btoa(
            asplast) + '&aspemail=' + btoa(aspemail) + '&aspmobile=' + btoa(aspmobile);
    }
    
    
    
    window.fbAsyncInit = function ()
            {
                FB.init
                        ({
                            appId: '414502202923335',
                            status: true,
                            cookie: true,
                            xfbml: true
                        });
            };

            (function () {
                var e = document.createElement('script');
                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());

            /** Fb Login **/
            $(document).on("click", "#call_facebook_login", function () {
                Login();
                
            });
            
            $(document).on("click", "#call_facebook_login1", function () {
               Logintwo();
                
            });



 

            function Login() {
                
                FB.login(function (response) {
                    if (response.session && response.perms) {
            alert(response.perms);
          }
                    if (response.authResponse) {
                        
                        getUserInfo();
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {scope: 'public_profile ,email'});
            }
            function getUserInfo() {
                FB.api('/me', {fields: "id,picture,email,first_name,gender,last_name,name"}, function (response) {
                    var email = response.email;
                     var aspname = response.first_name;
                     var asplast = response.last_name;
                     var aspemail =  response.email;

        window.location = '<?php echo base_url();?>aspmobile?aspfirstname=' + btoa(aspname) + '&asplastname=' + btoa(
            asplast) + '&aspemail=' + btoa(aspemail);
                });
            }
            /** End of FB Login **/

function Logintwo(){
  FB.login(function (response) {
                    if (response.authResponse) {
                        
                        getUserInfo2();
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {scope: 'public_profile ,email'});
            }
            function getUserInfo2() {
                FB.api('/me', {fields: "id,picture,email,first_name,gender,last_name,name"}, function (response) {
                    var email = response.email;
                    var aspemail = response.email;
                    var aspname = response.first_name;
                    var asplast = response.last_name;
                    window.location = '<?php echo base_url();?>empmobile?aspfirstname=' + btoa(aspname) + '&asplastname=' + btoa(
            asplast) + '&aspemail=' + btoa(aspemail);
                });

}
    
    
    
    
    
    
    
    
    
    
    
    
    </script>
    <script src="https://apis.google.com/js/api:client.js"></script>
    <script>
    startApp();
    </script>