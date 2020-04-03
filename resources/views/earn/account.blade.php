@extends('t2e_dashboard')
@section('content')




    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$230.00</b> paid <b id="secs">4 minutes</b> ago to @*** via Bitcoin</div>
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
        <h3>Account Settings</h3>
        <br>
        <div class="">

            <br>
            <div class="c-card">
                <h4>Account Info</h4><br>
                <form action="javascript:void(0);" method="POST" >
                <div class="c-card-body">
                    <div class="form-group">
                        <div class="message" id="message"></div>
                        <form class="has-validation-callback">
                            <label for="usr">Full Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="<?=auth()->user()->name?>" data-validation="required length alphanumeric" data-validation-allowing=" " data-validation-length="min1" data-validation-error-msg="Please enter a valid full name" required="">
                        </form></div>
                    <div class="form-group">
                        <label for="usr">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="<?=auth()->user()->email?>" data-validation="required length email" data-validation-length="min1" data-validation-error-msg="Please enter a valid email" required="">
                    </div>
                    <div class="form-group">
                        <label for="usr">Username</label>
                        <input type="text" class="form-control" name="username" value="<?=auth()->user()->username?>" disabled="">
                        <input type="hidden" name="account_update" value="1">
                    </div>


                    <div class="form-group">
                        <p id="form-message"></p>
                    </div>



                    <button id="account_update" type="button" onclick="bio_update();" class="btn btn-primary" name="login">Update Profile</button>

                </div>
                </form>
            </div>
            <br>
            <!-- Avatar -->
            <div class="c-card">
                <h4>Avatar</h4><br>
                <div class="c-card-body">
                    <div class="form-group">
                        <div class="message" id="avatarmessage"></div>
                        <form class="has-validation-callback">
                            <select class="image-picker" id="avatar" style="display: none;">
                                <option selected="" data-img-src="{{asset('assets/t2e/images/10.jpg')}}" data-img-class="first" data-img-alt="Avatar" value="10.jpg"> Avatar </option>
                                <option data-img-src="{{asset('assets/t2e/images/1.jpg')}}" data-img-alt="Avatar 1" value="1.jpg">  Avatar 1  </option>
                                <option data-img-src="{{asset('assets/t2e/images/2.jpg')}}" data-img-alt="Avatar 2" value="2.jpg">  Avatar 2  </option>
                                <option data-img-src="{{asset('assets/t2e/images/3.jpg')}}" data-img-alt="Avatar 3" value="3.jpg">  Avatar 3  </option>
                                <option data-img-src="{{asset('assets/t2e/images/4.jpg')}}" data-img-alt="Avatar 4" value="4.jpg">  Avatar 4  </option>
                                <option data-img-src="{{asset('assets/t2e/images/5.jpg')}}" data-img-alt="Avatar 5" value="5.jpg">  Avatar 5  </option>
                                <option data-img-src="{{asset('assets/t2e/images/6.jpg')}}" data-img-alt="Avatar 6" value="6.jpg">  Avatar 6  </option>
                                <option data-img-src="{{asset('assets/t2e/images/7.jpg')}}" data-img-alt="Avatar 7" value="7.jpg">  Avatar 7  </option>
                                <option data-img-src="{{asset('assets/t2e/images/8.jpg')}}" data-img-alt="Avatar 8" value="8.jpg">  Avatar 8  </option>
                                <option data-img-src="{{asset('assets/t2e/images/9.jpg')}}" data-img-alt="Avatar 9" value="9.jpg">  Avatar 9  </option>
                                <option data-img-src="{{asset('assets/t2e/images/11.jpg')}}" data-img-alt="Avatar 11" value="11.jpg"> Avatar 11 </option>
                                <option data-img-src="{{asset('assets/t2e/images/12.jpg')}}" data-img-alt="Avatar 12" value="12.jpg"> Avatar 12 </option>
                                <option data-img-src="{{asset('assets/t2e/images/13.jpg')}}" data-img-alt="Avatar 13" value="13.jpg"> Avatar 13 </option>
                                <option data-img-src="{{asset('assets/t2e/images/14.jpg')}}" data-img-alt="Avatar 14" value="14.jpg"> Avatar 14 </option>
                                <option data-img-src="{{asset('assets/t2e/images/15.jpg')}}" data-img-alt="Avatar 15" value="15.jpg"> Avatar 15 </option>
                                <option data-img-src="{{asset('assets/t2e/images/16.jpg')}}" data-img-alt="Avatar 16" value="16.jpg"> Avatar 16 </option>
                                <option data-img-src="{{asset('assets/t2e/images/17.jpg')}}" data-img-class="last" data-img-alt="Avatar 17" value="17.jpg"> Avatar 17 </option>
                            </select>


                            <button id="avatar_update_btn" type="button" onclick="avatar_update();" class="btn btn-primary">Update Avatar</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="c-card">
                <h4>Change Password</h4><br>
                <div class="c-card-body">

                    <form action="javascript:void(0);"  method="POST" >

                    <div class="form-group">
                        <div id="message2"></div>
                        <form class="has-validation-callback">
                            <label for="usr">Old Password</label>
                            <input id="old_pass" type="password" class="form-control" name="old_pass" placeholder="If changing, enter your old password" data-validation="required length" data-validation-error-msg="Please enter a valid password (minimum 8 chars.)" data-validation-length="min8" required="">
                        </form></div>
                    <div class="form-group">
                        <label for="usr">New Password</label>
                        <input id="new_pass" type="password" class="form-control" name="new_pass" placeholder="If changing, password must be minimum (8 chars.)" data-validation="required length" data-validation-error-msg="Please enter a valid password (minimum 8 chars.)" data-validation-length="min8" required="">
                    </div>
                    <div class="form-group">
                        <label for="usr">Confirm Password</label>
                        <input id="conf_pass" type="password" class="form-control" name="conf_pass" placeholder="If changing, confirm new password" data-validation="required length" data-validation-error-msg="Please enter the same password again" data-validation-length="min8" required="">
                    </div>

                        <p id="password-message"></p>

                    <button id="pass_update" class="btn btn-primary" onclick="change_password();" type="button" name="login">Change Password</button>


                    </form>



                </div>
            </div>
            <br>
            <div id="paymethod" class="c-card">
                <h4>Set Payment Method</h4><br>
                <div class="c-card-body">
                    <div class="form-group">
                        <div id="message3"></div>
                        <form class="has-validation-callback">
                            <label for="usr">Payment Method</label>
                            <select id="pmname" name="name" class="form-control">
                                <option value="PayPal">PayPal</option><option value="Cash App">Cash App</option><option value="Mailed Check">Mailed Check</option><option value="Bitcoin">Bitcoin</option></select>
                        </form></div>
                    <div class="form-group">
                        <label for="usr">Payment Details</label>
                        <textarea id="value" class="form-control" name="value" placeholder="Enter your PayPal email, CASHTAG, Bitcoin Wallet, or Address" data-validation="required length alphanumeric" data-validation-allowing="-_.@$,#" data-validation-length="min3" data-validation-error-msg="Please enter valid payment details" required=""></textarea>
                    </div>
                    <button id="pm_update" class="btn btn-primary">Add Payment Method</button>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="c-table-responsive@wide">
                        <table class="c-table" style="display: table;">
                            <thead class="c-table__head">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head">Method</th>
                                <th class="c-table__cell c-table__cell--head">Name</th>
                                <th class="c-table__cell c-table__cell--head">Details</th>
                                <th class="c-table__cell c-table__cell--head"></th>
                            </tr>
                            </thead>

                            <tbody>
                            {{-- <tr class="c-table__row">
                                <td class="c-table__cell">
                                    <img style="height:30px;" src="{{asset('assets/t2e/images/paypal.png')}}">
                                </td>
                                <td class="c-table__cell">
                                    PayPal
                                </td>
                                <td class="c-table__cell">ahmedshabbirawan@gmail.com</td>
                                <td class="c-table__cell">
                                </td>
                            </tr>                   --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-12">
            <footer class="c-footer">
                <p>© Copyright 2015-2019 Survey Bounce. All Rights Reserved.</p>
                <span class="c-footer__divider">|</span>
                <nav>
                    <a class="c-footer__link" target="_blank" href="https://surveybounce.com">Home</a>
                    <a class="c-footer__link" target="_blank" href="https://surveybounce.com/terms">Terms</a>
                    <a class="c-footer__link" target="_blank" href="https://surveybounce.com/privacy">Privacy</a>
                    <a class="c-footer__link" target="_blank" href="help.php">FAQ</a>
                    <a class="c-footer__link" target="_blank" href="help.php">Help</a>
                </nav>
            </footer>
            <center>
            </center>
        </div>
    </div>



@endsection
@section('jscript')
    <script type="text/javascript">
    </script>
    <script>
        $(document).ready(function(){
            $(".image-picker").imagepicker();
        });


        function bio_update(){
            var name_  = $('#name').val();
            var email_ = $('#email').val();
            $.ajax({
                method:'POST',
                url:'<?=url('/user/update-bio')?>',
                data:{name:name_,email:email_},
                success:function(res){
                    // console.log(res);
                    $('#form-message').html(res.message);
                }
            });
        }


        function avatar_update(){
            var avatar_  = $('#avatar').val();
            $.ajax({
                method:'POST',
                url:'<?=url('/user/avatar-update')?>',
                data:{avatar:avatar_},
                success:function(res){
                    // console.log(res);
                    // $('#form-message').html(res.message);
                    location.reload();
                }
            });
        }

        // old_pass   new_pass        conf_pass

        function change_password(){
            var old_password_     = $('#old_pass').val();
            var password_         = $('#new_pass').val();
            var confirm_password_ = $('#conf_pass').val();
            $.ajax({
                method:'POST',
                url:'<?=url('/user/change-password')?>',
                data:{ old_password:old_password_, password:password_, confirm_password:confirm_password_},
                success:function(res){
                    // console.log(res);
                    $('#password-message').html(res.message);
                }
            });
        }





    </script>
@endsection
