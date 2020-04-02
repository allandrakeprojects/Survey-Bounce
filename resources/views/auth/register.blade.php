@extends('authtemplate')
@section('content')

    <div class="o-page__card">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><b>$530.00</b> paid <b id="secs">8 seconds</b> ago to @*** via PayPal</div>
        <script>
            var secsTimerWork = setInterval(secsTimer, 1000);

            var secs = parseInt(document.getElementById("secs").innerHTML, 10);

            function secsTimer() {
                secs = secs + 1;
                document.getElementById("secs").innerHTML = "" + secs + " seconds";
                if (secs > 59) {
                    clearInterval(secsTimerWork);
                    outputMinute();
                }
            };

            function outputMinute()  {
                document.getElementById("secs").innerHTML = "1 minute";
                var minute = parseInt(document.getElementById("secs").innerHTML, 10);
                window.setInterval(function () {
                    minute = minute + 1;
                    document.getElementById("secs").innerHTML = "" + minute + " minutes";
                }, 60000);
            }
        </script>
        <div class="c-card c-card--center">
            <a href="https://surveybounce.com"><img style="width: 80px; margin-bottom: 15px" src="{{asset('assets/t2e/content/uploads/2019/10/logo.png')}}" alt="Survey Bounce Logo"></a>

            <h4 style="margin-bottom: 10px !important" class="u-mb-medium">Sign Up</h4>
            <span class="" style="background: #ff4230;border-color: #ff4230;color: #fff;padding: 5px;font-size: 10px;border-radius: 10px;">$25 Sign Up Bonus Activated <i class="fas fa-check-circle"></i></span>
            <br>
            <br>
            <form id="register-form" role="form" action=""  method="post">

                <div class="c-field">
                    <label class="c-field__label">Full Name</label>
                    <input id="name" data-validation="required length alphanumeric" data-validation-allowing=" " data-validation-error-msg="Please enter a valid full name" data-validation-length="min1" class="c-input u-mb-small" type="text" placeholder="Full name" name="name" required >
                </div>

                <div class="c-field">
                    <label class="c-field__label">Username</label>
                    <input data-validation="required length alphanumeric" data-validation-allowing="-_." data-validation-error-msg="Please enter a valid username (minimum 4 characters)" data-validation-length="min4" class="c-input u-mb-small" id="nosp" type="text" placeholder="Username (minimum 4 chars.)" name="username" required >
                </div>

                <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input data-validation="required length email" data-validation-error-msg="Please enter a valid email" data-validation-length="min1" class="c-input u-mb-small" id="nosp" type="email" placeholder="Email" name="email" required >
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Password</label>
                    <input data-validation="required length" data-validation-error-msg="Please enter a valid password (minimum 8 chars.)" data-validation-length="min8" class="c-input" type="password" placeholder="Password (minimum 8 chars.)" name="password"  required>
                </div>
                <div class="c-field u-mb-small">
                    <label class="c-field__label">Confirm Password</label>
                    <input data-validation="required length" data-validation-error-msg="Please enter the same password again" data-validation-length="min8" class="c-input" type="password" placeholder="Enter your password again" name="confirmPassword"  required>
                </div>

                <div>
                    <input class="" data-validation="required" data-validation-error-msg="You must accept our Terms &amp; Conditions to sign up" id="terms" name="terms" type="checkbox" value="1" required>
                    <span style="font-size:13px;">I accept the <a style="font-size:13px;" href="https://surveybounce.com/terms/" target="_blank">Terms &amp; Conditions</a>, <a style="font-size:13px;" href="https://surveybounce.com/privacy-policy/" target="_blank">Privacy Policy</a>, & <a style="font-size:13px;" href="https://surveybounce.com/fraud/" target="_blank">Fraud Policy</a></span>
                </div>


                <div class="c-field" id="login-msg" style="margin: 3px;"  >
                    <span class="help-block form-error" id="login-msg-span"></span>
                </div>


                <!--<input type="hidden" name="g-recaptcha" value="6Lc9qX0UAAAAALGVXEHg7Se9FhyuwpcZhSozdliY"/>-->
                <br>
                {{--<input type="submit" class="c-btn c-btn--fullwidth c-btn--info" name="signup_acc" value="Sign up">--}}
                <button  type="button" onclick="reg_btn_click(this);" class="c-btn c-btn--fullwidth c-btn--info" name="login">Sign up</button>
                <br>
                <br>
                <p>Already have an account? <a href="<?=url('/login')?>">Login</p>
            </form>
        </div>
    </div>



@endsection

@section('javascript')
    <script>

        function reg_btn_click(ele){

            var name = $('#name').val().trim();
            if(name == ''){
                $('#name').focus();
                return false;
            }
//            $('.loading-icon').show(); f2019-150 ==>
//            $('#notifications').html('');
            // var   msg_div = '<div class="col-md-12 alert alert-danger border-danger" style="text-align: left;"  ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times-circle-o" style="color:#e74c3c"></i></button><strong>Error! &nbsp &nbsp</strong>'
            var form_data = $('#register-form').serialize();



            $.ajax({
                method: "POST",
                url:    "{{ url('/do-register') }}",
                data:   form_data
            }).done(function( res ) {
                if(res.status){
                   //  alert(res.message);
                    $('#login-msg').show();
                    $('#login-msg-span').html(res.message);
                    window.location = "{{ url('/login') }}";
                }else{
                    $('#login-msg').show();
                    $('#login-msg-span').html(res.message);
                }
            }).fail(function( res ) {
                $('.loading-icon').hide();
                console.log(res.statusText);
                msg_div += res.statusText;
                msg_div += '</div>';
                $('#notifications').html(msg_div);
            });
        }
    </script>
@endsection
