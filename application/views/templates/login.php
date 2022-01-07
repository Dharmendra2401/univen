<?php $this->load->view('/common/header');  ?>
<section class="registration-form">
    <div class="container section-padding">


        <!-- Modal content-->
        <style>
        .show {
            opacity: 1;
        }
        </style>

        <div class="col-md-8 col-sm-8 position-relative">
            <br></br><br><br>
            <p class="popop-image-containe" id="top-image-content">You’re off to a greater place, explore more.</p>
            <img src="<?php echo base_url();?>img/loginimage.png" id="login-image" />
        </div>
        <div class="col-md-4 col-sm-4 box-left-shadow">
            <h4 class="text-center f20">Login</h4>
            <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>
            <ul class="nav nav-tabs login-contain">
                <li class="<?php if(($tabs=='aspirant')|| ($tabs=='')) { echo "active";}?>"><a data-toggle="tab"
                        href="#loginone" id="aspimage">Aspirant</a></li>
                <li class="<?php if(($tabs=='employer')) { echo "active";}?>"><a data-toggle="tab" href="#logintwo"
                        id="empimage">Employer</a></li>
            </ul>
            <input type="hidden" name="aspusertype" value="aspirant">
            <div class="tab-content">
                <div id="loginone"
                    class="tab-pane fade <?php if(($tabs=='aspirant')|| ($tabs=='')) { echo "active in";}?>">

                    <form class="form popupmodal loginaspirant" action="<?php echo base_url();?>loginasp" method="POST">
                        <div class="form-group position-relative">
                            <label class="form-label heading-title" for="mobile">Mobile number</label>
                            <input type="number" class="form-input form-control" min="6000000000" max="9999999999"
                                onKeyPress="return isNumeric(event)" name="aspmobile">

                            <button type="button" name="verifyasp" onclick="return getotp('aspirantlogin');"
                                class="verifyasp" id="verifyasp" style="display:none;">verify</button>
                        </div>
                        <div class="form-group text-center otp-input allotp" style="display:none;">
                            <label class="otp-text">Please enter OTP </label>


                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1"
                                name="aspotpone" id="aspotpone" onkeyup="return asplogin();">
                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1"
                                name="aspotptwo" id="aspotptwo" onkeyup="return asplogin();">
                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1"
                                name="aspotpthree" id="aspotpthree" onkeyup="return asplogin();">
                            <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1"
                                name="aspotpfour" id="aspotpfour" onkeyup="return asplogin();">
                        </div>
                        <div id="timer" class="settimer"></div>
                        <div id="asperror"></div>
                        <button type="submit" class="asploginbutton btn btn-primary d-inline-block d-sm-block btn-modal"
                            disabled>Continue</button>

                    </form>
                    <div class="terms-cond">
                        <p>By continuing, I agree to <a target="_blank"
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
                        <p>New to Cast India? <a href="<?php echo base_url().'registration?tabs=aspirant'?>"> Register
                                here </a>.</p>
                    </div>

                </div>


                <div id="logintwo" class="tab-pane fade <?php if(($tabs=='employer')) { echo "active in";}?>">
                    <form class="form popupmodal" action="<?php echo base_url();?>loginemp" method="POST">
                        <div class="form-group position-relative">
                            <label class="form-label heading-title" for="mobile">Mobile number</label>
                            <input type="number" class="form-input form-control" maxlength="15"
                                onKeyPress="return isNumeric(event)" name="empmobile" min="6000000000" max="9999999999">

                            <button type="button" name="verifyasp" onclick="return getotp('employerlogin');"
                                class="verifyemp" id="verifyemp" style="display:none;">verify</button>
                        </div>
                        <div class="form-group text-center otp-input-emp allotp" style="display:none;">
                            <label class="otp-text">Please enter OTP </label>


                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1' name="empotpone"
                                id="empotpone" onkeyup="return emplogin();" class="otpinputsemp">
                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1' name="empotptwo"
                                id="empotptwo" onkeyup="return emplogin();" class="otpinputsemp">
                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1'
                                name="empotpthree" " id=" empotpthree"onkeyup="return emplogin();" class="otpinputsemp">
                            <input type="tel" onKeyPress="return isNumeric(event)" maxlength='1' name="empotpfour"
                                id="empotpfour" onkeyup="return emplogin();" class="otpinputsemp"><br>
                            <div id="timertwo" class="settimer"></div>
                        </div>

                        <div id="emperror"></div>

                        <button href="#" class="btn btn-primary d-inline-block d-sm-block btn-modal emploginbutton"
                            disabled>Continue</button>

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
                        <p>New to Cast India? <a href="<?php echo base_url().'registration?tabs=employer'?>"> Register
                                here </a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <div id="fb-root"></div>
<?php $this->load->view('/common/footer'); ?>
<script>
function asplogin() {
    var aspmobile = $('input[name=aspmobile]').val();
    var aspotpone = $('input[name=aspotpone]').val();
    var aspotptwo = $('input[name=aspotptwo]').val();
    var aspotpthree = $('input[name=aspotpthree]').val();
    var aspotpfour = $('input[name=aspotpfour]').val();

    var aspotponestoreone = $('input[name=aspotponestoreone]').val();
    var aspotponestoretwo = $('input[name=aspotponestoretwo]').val();
    var aspotponestorethree = $('input[name=aspotponestorethree]').val();
    var aspotponestorefour = $('input[name=aspotponestorefour]').val();

    var inputall = aspotpone + '' + aspotptwo + '' + aspotpthree + '' + aspotpfour;
    var outputall = aspotponestoreone + '' + aspotponestoretwo + '' + aspotponestorethree + '' + aspotponestorefour;

    if ((aspmobile.trim() == '') || (inputall == '') || (inputall != outputall)) {
        $('.asploginbutton').attr('disabled', true);
    } else {
        $('.asploginbutton').attr('disabled', false);
    }

}

function emplogin() {
    var empmobile = $('input[name=empmobile]').val();
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

    if ((empmobile.trim() == '') || (inputotp == '') || (inputotp != otpuotp)) {
        $('.emploginbutton').attr('disabled', false);
        // changed it for without otp login
        //$('.emploginbutton').attr('disabled',true);
    } else {
        $('.emploginbutton').attr('disabled', false);
    }

}



$('input[name=aspmobile]').keyup(function() {
    var aspmobile = $('input[name=aspmobile]').val();
    if (aspmobile.length == 10) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>home/validmobileloginasp',
            data: {
                'aspmobile': aspmobile
            },
            success: function(formresult) {
                if ((formresult == 'ok')) {
                    $('.verifyasp').show();
                    $('.otp-input').hide();
                    asplogin();
                }
                if ((formresult == 'false')) {
                    $('.verifyasp').hide();
                    $('.otp-input').hide();
                    $('#asperror').html(
                        '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Sorry! Mobile number not exist</div>'
                    );
                }
            }
        })
    } else {
        $('.verifyasp').hide();
    }

});




$('input[name=empmobile]').keyup(function() {
    var aspmobile = $('input[name=empmobile]').val();
    if (aspmobile.length == 10) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>home/validmobileloginemp',
            data: {
                'aspmobile': aspmobile
            },
            success: function(formresult) {
                if (formresult == 'ok') {
                    $('.verifyemp').show();
                    $('.otp-input-emp').hide();
                    emplogin();

                }
                if (formresult == 'false') {
                    $('.verifyemp').hide();
                    $('.otp-input-emp').hide();
                    $('#emperror').html(
                        '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Sorry! Mobile number not exist</div>'
                    );
                }



            }

        })


    } else {
        $('.verifyemp').hide();
    }

});


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

            window.location = '<?php echo base_url();?>loginasp?aspemail=' + btoa(aspemail);

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
            window.location = '<?php echo base_url();?>loginemp?aspemail=' + btoa(aspemail);

        },
        function(error) {

        });
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
                    var aspemail = response.email;
                    <!--console.log(aspemail); return false;-->
                    window.location = '<?php echo base_url();?>loginasp?aspemail=' + btoa(aspemail);
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
                    <!--console.log(aspemail); return false;-->
                    window.location = '<?php echo base_url();?>loginemp?aspemail=' + btoa(aspemail);
                });

}

</script>

<script src="https://apis.google.com/js/api:client.js"></script>
<script>
startApp();
</script>