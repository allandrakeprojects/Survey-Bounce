@extends('t2e_dashboard')
@section('content')

<div class="container">
    <div class="alert">
        <span class="closebtn"
            onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a
            style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;"
            href="account#paymethod">Add Payment Method</a>
    </div>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$145.00</b> paid <b
            id="secs">40 seconds</b> ago to @*** via Bitcoin</div>
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
        <h3>Members' Help Area</h3>
        <p>Find helpful videos, members' frequently asked questions, and tools/tips to help you earn more below.</p>
    </div>
    {{-- <div class="c-card" style="">
        <h3 style="margin-bottom: 10px !important;">Helpful Videos</h3>
        <br>
        <div style="margin-bottom: 20px;" class="row">
            <div class="col-md-6">
                <h6 style="margin-bottom: 10px;">Dashboard Overview</h6>
                <iframe style="width: 100%; border-radius: 30px;" src="https://www.youtube.com/embed/GqjQqaggKn8"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
            </div>
            <div class="col-md-6">
                <h6 style="margin-bottom: 10px;">Contact your Manager</h6>
                <iframe style="width: 100%; border-radius: 30px;" src="https://www.youtube.com/embed/Qfq8xj5DY8I"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
            </div>
        </div>
        <div style="margin-bottom: 20px;" class="row">
            <div class="col-md-6">
                <h6 style="margin-bottom: 10px;">Using Promo Posts</h6>
                <iframe style="width: 100%; border-radius: 30px;" src="https://www.youtube.com/embed/pfh-1UEj6YA"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
            </div>
            <div class="col-md-6">
                <h6 style="margin-bottom: 10px;">Submitting YouTube Videos</h6>
                <iframe style="width: 100%; border-radius: 30px;" src="https://www.youtube.com/embed/v4HA2ooiUcU"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
            </div>
        </div>
        <div style="margin-bottom: 20px;" class="row">
            <div class="col-md-6">
                <h6 style="margin-bottom: 10px;">Rewards Center</h6>
                <iframe style="width: 100%; border-radius: 30px;" src="https://www.youtube.com/embed/eUgRHLt6APQ"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
            </div>
            <div class="col-md-6">
                <h6 style="margin-bottom: 10px;">Cashing Out</h6>
                <iframe style="width: 100%; border-radius: 30px;" src="https://www.youtube.com/embed/m9yzGrcAIZM"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
            </div>
        </div>
    </div> --}}
    <div class="c-card">
        <h3>Members' FAQ</h3>
        <br>
        <div style="
margin-bottom: 25px;
">
            <h4>What's the best way to get referrals?</h4>
            <p>Getting referrals should be fairly easy. Start off by promoting your link on every social media platform
            and educating your followers about Tap 2 Earn using our various <a href="{{ route('promo') }}">Promotional
                    Posts</a>. <br>You can also try direct messaging (IG DM, Text, WhatsApp, etc) as it provides a one
                on one conversation.</p>
        </div>
        <div style="
margin-bottom: 25px;
">
            <h4>Are there other ways to earn?</h4>
            <p>Of course! If referring is not your thing, you can always earn MORE through our <a
                    href="{{ route('taskwall') }}">Task Wall!</a><br>The Task Wall features a variety of free apps, surveys, and
                offers from our sponsors. You can earn by testing out these free apps, completing free surveys, or
                trying out free offers!</p>
        </div>
        <div style="
margin-bottom: 25px;
">
            <h4>How much do I need to cashout?</h4>
            <p>We don't have a minimum payment amount to cashout. However, you must meet some requirements before you
                cash out for the first time to help prevent fraud.</p>
        </div>
        <div style="
margin-bottom: 25px;
">
            <h4>How soon can I receive my payment?</h4>
            <p>We believe that getting paid shouldn't be a hassle. Once you cash out, your payment will be scheduled,
                and you will recieve it immediately based on that payment schedule.</p>
        </div>
        <div style="
margin-bottom: 25px;
">
            <h4>My friend signed up but I didn't get credited?</h4>
            <p>If your friend "signed up" and you didn't get credited, it could be do to the following: Your friend
                already has an account, Your referral was fraudulent, You provided the wrong referral link, They entered
                the wrong link, They forgot to sign up with your link.</p>
        </div>
        <div style="
margin-bottom: 25px;
">
            <h4>I completed a task in the Task Wall but wasn't credited?</h4>
            <p>After completing a task, please allow 5-10 minutes for it to register back to our system. If you still
                aren't credited you either did the task incorectly by not following the directions, OR you already
                completed the task in the past. <br> If you still think it's an error and can provide proof.
                </a></p>

                {{-- , please <a
                    href="/contact">contact us --}}
        </div>
        <div style="
    margin-bottom: 25px;
">
            <h4>I completed a YouTube submission but wasn't credited?</h4>
            <p>If you weren't credited, it is due to the following reasons; You already submitted the video before, Your
                title is wrong, Your description is wrong</p>
        </div>
    </div>

    <div class="col-12">
        <footer class="c-footer">
            <p>© Copyright 2015-2019 Survey Bounce. All Rights Reserved.</p>
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
