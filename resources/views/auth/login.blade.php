@extends('authtemplate')
@section('content')

    <div class="o-page__card">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><b>$565.00</b> paid <b id="secs">5 seconds</b> ago to @* via CASH app</div>
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
            <a href="https://tap2earn.co"><img style="width: 200px; margin-bottom: 15px" src="https://tap2earn.co/wp-content/uploads/2019/09/Tap2Earn-1.png" alt="Tap 2 Earn Logo"></a>

            <h4 class="u-mb-medium">Login</h4>
            <div id="message"></div>
            <form id="login-form" method="POST" class="md-float-material" onsubmit="login_btn_click(this);" action="{{ route('login') }}" >
                @csrf
                <div class="c-field">
                    <label class="c-field__label">Username</label>

                    <input id="username" data-validation="required length alphanumeric" data-validation-allowing="-_." data-validation-error-msg="Please enter a valid username" data-validation-length="min4" class="c-input u-mb-small" type="text" placeholder="Username" value="{{ old('email') }}" name="username" required>
                </div>

                <div class="c-field">
                    <label class="c-field__label">Password</label>
                    <input id="password" data-validation="required length" data-validation-error-msg="Please enter a valid password (minimum 8 chars.)" data-validation-length="min8" class="c-input u-mb-small" type="password" placeholder="Password" name="password" required>
                </div>

                <div class="c-field" id="login-msg" style="margin: 3px;"  >
                    <span class="help-block form-error" id="login-msg-span"></span>
                </div>

                <button  type="button" onclick="login_btn_click(this);" class="c-btn c-btn--fullwidth c-btn--info" name="login">Login</button>
            </form>
            <br>
            <p>Don't have an account? <a href="<?=url('/register')?>">Sign Up</p>
            <br>
            <a href="/password-reset">I forgot my password</a>
        </div>
    </div>



@endsection

@section('javascript')
    <script>




        function login_btn_click(ele){

            var username = $('#username').val().trim();
            var password = $('#password').val().trim();


            if(username == ''){
                $('#username').focus();
                return false;
            }

            if(password == ''){
                $('#password').focus();
                return false;
            }






            $('.loading-icon').show();
            $('#notifications').html('');



            var   msg_div = '<div class="col-md-12 alert alert-danger border-danger" style="text-align: left;"  ><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times-circle-o" style="color:#e74c3c"></i></button><strong>Error! &nbsp &nbsp</strong>'



            var form_data = $('#login-form').serialize();

            $.ajax({
                method: "POST",
                url:    "{{ url('/do-login') }}",
                data:   form_data
            }).done(function( res ) {
                // $('.loading-icon').hide();
                console.log(res);

              //  return false;
                if(res.status){
                    window.location = "{{ url('/dashboard') }}";
                }else{
                    //    notify(res.message, 'danger');
                    msg_div += res.message;
                    msg_div += '</div>';

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