<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/jquery-ui.css" /> 
    <link rel="stylesheet" href="icomoon/style.css" /> 
    <link rel="stylesheet" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="slick/slick.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>E-permit</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="slick/slick.min.js"></script>
    <script src="js/app.js"></script>
    <style type="text/css">
        color-palate, .settings{
            display: none;
        }
    </style>
</head>
<body>
    <header class="main-header" style="box-shadow: 0px 1px 3px #0003; position: relative;">
        <div class="container-fluid text-center">
            <div class="logo d-inline-block">E-permit</div>
        </div>
    </header>
    <div class="login-container">
        <div class="illustrations">
            <div class="slider-1">
                <div class="slide-single">
                    <img src="images/slider/1.jpg" alt="">
                </div>
                <div class="slide-single">
                    <img src="images/slider/2.jpg" alt="">
                </div>
                <div class="slide-single">
                    <img src="images/slider/3.jpg" alt="">
                </div>
                <div class="slide-single">
                    <img src="images/slider/4.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="flip-card" id="forgotpassword">

            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <div class="login-box">
                        <div class="header">
                            <img src="images/logo.png"
                                class="logo" alt="" />
                            <div class="title">E-Permit</div>
                        </div>

                        <form id="loginfrm" name="loginfrm" action="trade-list" method="post">
                        @csrf    
                        <!-- <input type="hidden" name="_token" value="E5YUxnb7Pm7Ohva9J8DFha9VCkNBpKCSyRTfQrpP"> -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="priya-phone"></i></span>
                                    <input type="text" id="mobileno" min="10" maxlength="10" name="mobileno"
                                        class="form-control mobile" placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="priya-lock"></i></span>
                                    <input type="password" id="loginpwd" name="pwd" class="form-control"
                                        placeholder="Password" autocomplete="off">
                                    <div class="input-group-addon"><i class="priya-eye" aria-hidden="true"
                                            onmousedown="showPassword(this)" onmouseout="hidePassword(this)"></i></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="flex-auto">
                                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                            name="captcha">
                                    </div>
                                    <div class="flex-auto text-right">
                                        <div class="captcha d-flex">
                                            <span><img src="images/captcha.png"></span>
                                            <button type="button" class="btn btn-r-curved" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-login btn-sm mt-2">Login</button>
                        </form>
                        <div class="text-center small mt-3 bold">
                            <a href="#forgotpassword" class="link">Forgot Password</a>
                            <!-- <div class="p-1 text-center"><strong>OR</strong></div> -->
                            <div class="bdr-t-1 mt-3 pt-3">
                                <!-- <div class="signup-wrapper"> <span>Sign Up</span>
                                    <signuptooltip>
                                        <a href="farmer-register"><i
                                                class="priya-farmer"></i> Farmer</a>
                                        <a href="reg-citizens"><i
                                                class="priya-user"></i> Citizen</a>
                                        <a href="otheruser-register"><i
                                                class="priya-user"></i> Other User</a>
                                    </signuptooltip>
                                </div> -->

                            <a href="registration.html" class="btn btn-sm btn-rounded"><i class="priya-farmer"></i> Register</a> 
                            </div>
                            <!-- <b onclick="prToast('my test msg',{'type':'warning'})">Toast</b> -->
                        </div>
                        <!--  -->
                    </div>
                </div>
                <div class="flip-card-back">
                    <div class="login-box">
                        <div class="header">
                            <img src="images/logo.png"
                                class="logo" alt="" />
                            <div class="title">E-Permit</div>
                        </div>
                        <form action="forgotpwd" id="forgotfrm" name="forgotfrm"
                            onsubmit="return forgotfrmFunc();" method="post">
                            <input type="hidden" name="_token" value="E5YUxnb7Pm7Ohva9J8DFha9VCkNBpKCSyRTfQrpP">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="priya-user"></i></span>
                                    <input type="text" id="forgot_login_id" name="forgot_login_id" class="form-control"
                                        placeholder="Enter Mobile / Email" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-login btn-sm mt-2">Send OTP</button>
                        </form>

                        <div class="text-center small mt-3 bold">
                            <a href="#" class="link">Back To Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- @include("includes/footer"); -->

    <script type="text/javascript">

        $(document).on('keyup', '.mobile', function (event) {
            var regex = /^[6-9]/;
            if (!regex.test(this.value)) {
                this.value = '';
                return false;
            }

        });
        function loginSubmitFunc() {
            var mobileno = $("#mobileno").val();
            var loginpwd = $("#loginpwd").val();
            var captcha = $("#captcha").val();
            var blankTest = /\S/;
            if (!blankTest.test(mobileno)) {
                $("#mobileno").focus();
                $("#mobileno").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#mobileno").parents('.input-group').removeClass('form_validate_error');
            }
            if (!blankTest.test(loginpwd)) {
                $("#loginpwd").focus();
                $("#loginpwd").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#loginpwd").parents('.input-group').removeClass('form_validate_error');
                //$("#loginsubmitfrm").submit();

            }
            if (!blankTest.test(captcha)) {
                $("#captcha").focus();
                $("#captcha").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#captcha").parents('.input-group').removeClass('form_validate_error');
                //$("#loginsubmitfrm").submit();

            }
        }
        function forgotfrmFunc() {
            var forgot_login_id = $("#forgot_login_id").val();
            var blankTest = /\S/;
            if (!blankTest.test(forgot_login_id)) {
                $("#forgot_login_id").focus();
                $("#forgot_login_id").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#forgot_login_id").parents('.input-group').removeClass('form_validate_error');
            }
        }
        function forgotOtpSubmitFunc() {
            var forgot_verify_otp = $("#forgot_verify_otp").val();
            var blankTest = /\S/;
            if (!blankTest.test(forgot_verify_otp)) {
                $("#forgot_verify_otp").focus();
                $("#forgot_verify_otp").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#forgot_verify_otp").parents('.input-group').removeClass('form_validate_error');
            }
        }
        function setNewPwdSubmitFunc() {
            var new_pwd = $("#new_pwd").val();
            var confirm_pwd = $("#confirm_pwd").val();
            var blankTest = /\S/;
            if (!blankTest.test(new_pwd)) {
                $("#new_pwd").focus();
                $("#new_pwd").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#new_pwd").parents('.input-group').removeClass('form_validate_error');
            }
            if (!blankTest.test(confirm_pwd)) {
                $("#confirm_pwd").focus();
                $("#confirm_pwd").parents('.input-group').addClass('form_validate_error');
                return false;
            } else {
                $("#confirm_pwd").parents('.input-group').removeClass('form_validate_error');
            }
            if (confirm_pwd != new_pwd) {
                $("#confirm_pwd").focus();
                $("#confirm_pwd").parents('.input-group').addClass('form_validate_error');
                $("#errorconfirmpwdmsg").html('<font style="color:#f00">Password Mismatch!!</font>');
                return false;
            } else {
                $("#confirm_pwd").parents('.input-group').removeClass('form_validate_error');
                $("#errorconfirmpwdmsg").html('');
            }
        }
        // $('#reload').click(function () {
        //     $.ajax({
        //         type: 'GET',
        //         url: 'reload-captcha',
        //         success: function (data) {
        //             $(".captcha span").html(data.captcha);
        //         }
        //     });
        // });

    </script>
</body>

</html>