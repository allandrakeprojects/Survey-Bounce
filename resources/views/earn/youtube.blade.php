@extends('t2e_dashboard')
@section('content')


    <div class="container">
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
                <p>First, subscribe to our YouTube channel above then create a (1 MINUTE OR MORE) YouTube video talking about Tap 2 Earn, how it works, how much you've made, and why you love it. Once finished, upload it to YouTube and use the title and description provided below. Then enter the video link below to earn $50.</p>
                <br>
                <div class="form-group">
                    <label for="usr">Video Title</label>
                    <div class="ref-box">Tap 2 Earn! The LEGIT Way To Make Money Using Social Media</div>
                </div>
                <div class="form-group">
                    <label for="usr">Video Description</label>
                    <div class="ref-box">Sign up today for a $25 bonus! https://share.tap2earn.co/ahmedshabbirawan Make money online with Tap 2 Earn. Tap 2 Earn pays you for referring friends and family to their website. You can earn up to $10 per referral. Want to know why it works and where the money comes from? Check out this link: https://tap2earn.co/faq
                        <br>
                        Sign up with my referral link for $25 bonus! Limited time only! https://share.tap2earn.co/ahmedshabbirawan   <br><br>
                        -----------------------TAGS----------------------
                        <br>
                        tap2earn is real,
                        kids earn cash online,
                        is tap2earn a scam,
                        is tap2earn real,
                        teens earn cash online,
                        make money as a teen,
                        tap2earn,
                        teens earn money online,
                        online jobs,
                        make money as a teen,
                        online teens jobs,
                        pranks,
                        tap2earn legit,
                        teen online jobs,
                        teens get money online,
                        ways to make money,
                        life hacks,
                        winter jobs,
                        kids earn money online,
                        teens work from home,
                        make money online,
                        instagram model,
                        tap2earn pty ltd,
                        publicinterviews,
                        teen job online,
                        jobs for teens,
                        online make money,
                        social media money,
                        tap2earn.co,
                        influencer jobs online,
                        online marketing,
                        tap2earn not a scam,
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
                <p>© Copyright 2015-2019 Tap 2 Earn, Pty Ltd. All Rights Reserved.</p>
                <span class="c-footer__divider">|</span>
                <nav>
                    <a class="c-footer__link" target="_blank" href="https://tap2earn.co">Home</a>
                    <a class="c-footer__link" target="_blank" href="https://tap2earn.co/terms">Terms</a>
                    <a class="c-footer__link" target="_blank" href="https://tap2earn.co/privacy">Privacy</a>
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
