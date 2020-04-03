@extends('t2e_dashboard')
@section('content')


    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$205.00</b> paid <b id="secs">5 minutes</b> ago to @* via PayPal</div>
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
        <div class="c-card">
            <h2>YouTube Submission</h2>
            <br>
            <div class="c-card-body">
                <p>Subscribe to our new YouTube channel!</p>
                <br>
                <a target="_blank" href="https://www.youtube.com/user/XxThexWallxX"><button class="btn btn-primary" style="background-color: red;"><i class="fab fa-youtube"></i> Subscribe</button></a>
                <br>
                <br>
                <p>First, subscribe to our YouTube channel above then create a (1 MINUTE OR MORE) YouTube video talking about Survey Bounce, how it works, how much you've made, and why you love it. Once finished, upload it to YouTube and use the title and description provided below. Then enter the video link below to earn $50.</p>
                <br>
                <div class="form-group">
                    <label for="usr">Video Title</label>
                    <div class="ref-box">Survey Bounce! The LEGIT Way To Make Money Using Social Media</div>
                </div>
                <div class="form-group">
                    <label for="usr">Video Description</label>
                    <div class="ref-box">Sign up today for a $25 bonus! {{url('/sign-up/'.auth()->user()->username)}} Make money online with Survey Bounce. Survey Bounce pays you for referring friends and family to their website. You can earn up to $10 per referral. Want to know why it works and where the money comes from? Check out this link: https://surveybounce.com/faq
                        <br>
                        Sign up with my referral link for $25 bonus! Limited time only! {{url('/sign-up/'.auth()->user()->username)}}   <br><br>
                        -----------------------TAGS----------------------
                        <br>
                        surveybounce is real,
                        kids earn cash online,
                        is surveybounce a scam,
                        is surveybounce real,
                        teens earn cash online,
                        make money as a teen,
                        surveybounce,
                        teens earn money online,
                        online jobs,
                        make money as a teen,
                        online teens jobs,
                        pranks,
                        surveybounce legit,
                        teen online jobs,
                        teens get money online,
                        ways to make money,
                        life hacks,
                        winter jobs,
                        kids earn money online,
                        teens work from home,
                        make money online,
                        instagram model,
                        surveybounce pty ltd,
                        publicinterviews,
                        teen job online,
                        jobs for teens,
                        online make money,
                        social media money,
                        surveybounce.com,
                        influencer jobs online,
                        online marketing,
                        surveybounce not a scam,
                        i need money, money hacks,
                        marketing jobs,
                        work from home,
                        teen get paid,
                    </div>
                </div>
                <div class="form-group">

                    <?php
                    if( isset($validator) ){
                        $errors = $validator->errors();
                    }
                    echo '<p style="color:red;" >'.$errors->first('url').'</p>';
                        if( session()->get('status_message') != '' ){
                            echo '<p style="color:green;" >'.session()->get('status_message').'</p>';
                        }
                    ?>



                    <form role="form" action="<?=url('youtube-video-submit')?>" method="post" class="has-validation-callback">
                        @csrf
                        <label for="usr">Video Link</label>
                        <input data-validation="required url" data-validation-error-msg="Please enter a valid video URL" type="url" class="form-control" name="url" required="">
                        <br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit Video">
                    </form>
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
@endsection
