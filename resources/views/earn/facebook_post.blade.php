@extends('t2e_dashboard')
@section('content')

    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$390.00</b> paid <b id="secs">11 minutes</b> ago to @** via PayPal</div>
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
            <h2>Facebook Post Submission</h2>
            <br>
            <div class="c-card-body">
                <p>Like our new Facebook profile</p>
                <br>
                <a target="_blank" href="https://www.facebook.com/Tap-2-Earn-103656637837761/"><button class="btn btn-primary" style="background-color: #2196F3; border-color: #2196F3;"><i class="fab fa-facebook"></i> Like</button></a>
                <br>
                <br>
                <p>First, like our Facebook page. Then create a Facebook post using the post content provided below. Finally, enter the post link below to earn $50.</p>
                <br>
                <div class="form-group">
                    <label for="usr">Post content</label>
                    <div class="ref-box">💰 I just made $70 on Survey Bounce!! 💰 and YOU can too!
                        <br>
                        💵 Sign up today for a $25 bonus! 💵
                        <br>
                        ‼️ {{url('/sign-up/'.auth()->user()->username)}} ‼️
                        <br><br>
                        Make money online with Survey Bounce. Survey Bounce pays you for referring friends and family to their website.
                        <br>
                        You can earn up to $25 per referral!
                        <br><br>
                        Want to know why it works and where the money comes from? Check out this link: https://surveybounce.com/faq
                        <br><br>
                        Sign up with my referral link for $25 bonus! Limited time only!
                        <br>
                        {{url('/sign-up/'.auth()->user()->username)}}  </div>
                </div>
                <div class="form-group">
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
