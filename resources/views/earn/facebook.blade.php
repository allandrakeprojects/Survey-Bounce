@extends('t2e_dashboard')
@section('content')

    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
        <div id="sm" class="c-card">

            <p><span style="color: red;">HEY!</span> Follow Survey Bounce on all social media platforms!<br><a target="_blank" href="https://surveybounce.com/contact-us">Social Media Platforms</a></p>

        </div>          <div class="c-card">
            <h2>Facebook Video Submission</h2>
            <br>
            <div class="c-card-body">
                <p>Like our new Facebook profile</p>
                <br>
                <a target="_blank" href="https://www.facebook.com/Tap-2-Earn-103656637837761/"><button class="btn btn-primary" style="background-color: #2196F3; border-color: #2196F3;"><i class="fab fa-facebook"></i> Like</button></a>
                <br>
                <br>
                <p>First, like our Facebook page. Then create a (1 MINUTE OR MORE) video talking about Survey Bounce, how it works, how much you've made, and why you love it. Once finished, upload it to Facebook and use the post content provided below. Then enter the video link below to earn $50.</p>
                <br>
                <div class="form-group">
                    <label for="usr">Post content</label>
                    <div class="ref-box">
                        💰 I just made $70 on Survey Bounce!! 💰 and YOU can too!
                        <br>
                        💵 Sign up today for a $25 bonus! 💵
                        <br>
                        ‼️ https://share.surveybounce.com/ahmedshabbirawan ‼️
                        <br><br>
                        Make money online with Survey Bounce. Survey Bounce pays you for referring friends and family to their website.
                        <br>
                        You can earn up to $25 per referral!
                        <br><br>
                        Want to know why it works and where the money comes from? Check out this link: https://surveybounce.com/faq
                        <br><br>
                        Sign up with my referral link for $25 bonus! Limited time only!
                        <br>
                        https://share.surveybounce.com/ahmedshabbirawan  </div>
                </div>
                <div class="form-group">
                    <form role="form" action="" method="post" class="has-validation-callback">
                        <label for="usr">Post Link</label>
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
