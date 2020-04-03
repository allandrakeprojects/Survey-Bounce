@extends('t2e_dashboard')
@section('content')

<div class="swal2-container swal2-center swal2-fade swal2-shown" style="overflow-y: auto;">
    <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show"
        tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
        <div class="swal2-header">
            <ul class="swal2-progresssteps" style="display: none;"></ul>
            <div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span
                        class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>
            <div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div>
            <div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div>
            <div class="swal2-icon swal2-info swal2-animate-info-icon" style="display: flex;"><span
                    class="swal2-icon-text">i</span></div>
            <div class="swal2-icon swal2-success" style="display: none;">
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span
                    class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div><img class="swal2-image" style="display: none;">
            <h2 class="swal2-title" id="swal2-title">Welcome to Survey Bounce</h2><button type="button"
                class="swal2-close" style="display: none;">×</button>
        </div>
        <div class="swal2-content">
            <div id="swal2-content" style="display: block;">
                <div style="font-size: 15px;">This is your dashboard, the place that is going to make you a lot of
                    money! Your referral link is below. <br><br>
                    <div class="ref-box">{{url('/sign-up/'.auth()->user()->username)}}</div> <br><br> You will
                    be paid
                    <b>$5</b> for every person that clicks your link and an extra <b>$25</b> when they join Survey Bounce.
                    What are you waiting for? Get to work!
                </div>
            </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file"
                style="display: none;">
            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select
                class="swal2-select" style="display: none;"></select>
            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox"
                style="display: none;"><input type="checkbox"></label><textarea class="swal2-textarea"
                style="display: none;"></textarea>
            <div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div>
        </div>
        <div class="swal2-actions" style="display: flex;">
            <a href="{{ route('dashboard') }}" type="button" class="swal2-confirm swal2-styled" aria-label=""
                style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</a>
            <button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button>
        </div>
        <div class="swal2-footer" style="display: none;"></div>
    </div>
</div>
<div class="container">
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$165.00</b> paid <b
            id="secs">1 minute</b> ago to @* via Bitcoin</div>
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
    <div id="sm" class="c-card">
        <p><span style="color: red;">🎉Happy New Year! 🎉</span> For a limited time, clicks are now <b>$5</b> and
            referrals are now <b>$20-25!</b>. Don't miss out! <br><b>Now until January 30th!</b></p>
    </div>
    <div id="sm" class="c-card">
        <p><span style="color: green;">💰NEW $25 Review Wall 💰</span> We just launched our NEW Review wall. Get paid to
            read reviews &amp; blogs! Earn up to $50 per read/review. <a href="reviewwall.php">GET STARTED!</a></p>
    </div>


    <div class="row">
        <div class="col-half col-md-6 col-xl-4">
            <div class="c-card c-card-x">
                <div class="card-icon">
                    <span class="c-icon c-icon--info u-mb-small">
                        <i class="fas fa-mouse-pointer"></i>
                    </span>
                </div>

                <div class="card-stat">
                    <div style="float: right">
                        <h3 class="c-text--subtitle">Clicks</h3>
                    </div>
                    <div>
                        <h1 class="card-stat-num">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-half col-md-6 col-xl-4">
            <div class="c-card c-card-x">
                <div class="card-icon">
                    <span class="c-icon c-icon--danger u-mb-small">
                        <i class="fas fa-users"></i>
                    </span>
                </div>

                <div class="card-stat">
                    <div style="float: right">
                        <h3 class="c-text--subtitle">Referrals</h3>
                    </div>
                    <div>
                        <h1 class="card-stat-num">{{ $referral_count ?? '0' }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-half col-md-6 col-xl-4">
            <div class="c-card c-card-x">
                <div class="card-icon">
                    <span class="c-icon c-icon--success u-mb-small">
                        <i class="fas fa-tasks"></i>
                    </span>
                </div>

                <div class="card-stat">
                    <div style="float: right">
                        <h3 class="c-text--subtitle">Tasks</h3>
                    </div>
                    <div>
                        <h1 class="card-stat-num">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-half col-md-6 col-xl-6">
            <div class="c-card c-card-x">
                <div class="card-icon">
                    <span class="c-icon c-icon--success u-mb-small" style="background: #FFC107;">
                        <i class="fas fa-hashtag"></i>
                    </span>
                </div>

                <div class="card-stat">
                    <div style="float: right">
                        <h3 class="c-text--subtitle">Submits &amp; Reviews</h3>
                    </div>
                    <div>
                        <h1 class="card-stat-num">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-xl-6">
            <div class="c-card c-card-x">
                <div class="card-icon">
                    <span class="c-icon c-icon--warning u-mb-small">
                        <i class="far fa-money-bill-alt"></i>
                    </span>
                </div>

                <div class="card-stat">
                    <div style="float: right">
                        <h3 class="c-text--subtitle">Earnings</h3>
                    </div>
                    <div>
                        <h1 class="card-stat-num">${{ $earning ?? '0' }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="margin-top: 15px;" class="row">
        <div class="col-md-6 col-xl-6">
            <div class="c-card ref-card" style="padding: 20px 30px 20px 30px;">
                <h3 class="c-text--subtitle">YOUR REFERRAL LINK <i class="fas fa-info-circle"></i></h3>
                <div class="ref-box"><?=url('/sign-up/'.auth()->user()->username)?></div>
                <br>
                <p><i class="fas fa-exclamation-circle" style="margin-right: 3px;"></i>Share this link and earn $5 for
                    every person who clicks on it. Earn an additional $20-25 when they sign up! <br><b>You earn 20% of
                        everything your referral makes!</b></p>

                <!-- <br> <h3 class="c-text--subtitle">FACEBOOK REFERRAL LINK <i class="fas fa-info-circle"></i></h3>
          <div class="ref-box">https://ref.surveybounce.com/ahmedshabbirawan</div>
          <br>
                      <p><i class="fab fa-facebook" style="margin-right: 3px;"></i>Use this link to share on Facebook!</p> -->
                <!--    <p><i class="fas fa-exclamation-circle" style="margin-right: 3px;"></i>Our share link currently doesn't work for Facebook, Instagram, & WhatsApp. Please refer your friends using Twitter, iMessage, etc for now. We are working on resolving this issue.</p> -->
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <a href="/dashboard/taskwall.php">
                <div class="c-card tw-card">
                    <h3 style="text-align: center;color: #fff; font-size: 25px; font-weight: 600;">$50 SURVEYS &amp;
                        APPS</h3>
                </div>
            </a>
        </div>
    </div>
    <div id="fraudcard" class="c-card">

        <p><i class="fas fa-exclamation-triangle" style="color:red;"></i><span style="color: red;">WARNING!</span> When
            confirming payments, if our team finds any <b>fake referrals/clicks</b>, your account will be <b>banned</b>
            and your payment will not be approved. <br><a target="_blank" href="https://surveybounce.com/fraud-policy">Fraud
                Policy</a></p>
        <center><button id="fraudaccept" class="btn btn-primary"
                style="background-color: red;width: 50%;margin-top: 10px;border-radius: 30px;">OK, I accept</button>
        </center>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="c-card task-card">
                <div>
                    <table class="task-table">
                        <thead>
                            <tr>
                                <td>Task</td>
                                <td>Earn</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Refer friends</td>
                                <td><a href="<?=url('/refer')?>"><button class="t-earn">Earn $10</button></a></td>
                            </tr>
                            <tr>
                                <td>Get clicks</td>
                                <td><a href="<?=url('/refer')?>"><button class="t-earn">Earn $2</button></a></td>
                            </tr>
                            <tr>
                                <td>Download apps</td>
                                <td><a href="/dashboard/taskwall.php"><button class="t-earn">Earn $10</button></a></td>
                            </tr>
                            <tr>
                                <td>Complete surveys</td>
                                <td><a href="/dashboard/taskwall.php"><button class="t-earn">Earn $25</button></a></td>
                            </tr>
                            <tr>
                                <td>Create YouTube videos</td>
                                <td><a href="/dashboard/youtube.php"><button class="t-earn">Earn $50</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="">
            <div class="c-card" style="padding: 20px 0 0 0;">
                <h5 style="padding: 0 30px 10px 30px;">Leaderboard</h5>
                <table class="c-table" style="display: table; box-shadow: none;">
                    <thead class="c-table__head">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">Username</th>
                            <th class="c-table__cell c-table__cell--head">Total Earnings</th>
                        </tr>
                    </thead>

                    <tbody>


                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                king_louis</td>
                            <td class="c-table__cell">$1,255,527</td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                itsjessss</td>
                            <td class="c-table__cell">$971,525</td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                kayla_x3</td>
                            <td class="c-table__cell">$879,025</td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                jdavis20</td>
                            <td class="c-table__cell">$832,640</td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                _lilisayez</td>
                            <td class="c-table__cell">$748,556</td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                brandongidsx20</td>
                            <td class="c-table__cell">$562,091</td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                luigitmstar2</td>
                            <td class="c-table__cell">$127,910</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="c-card">
                <h5>Instant Social Share</h5>
                <div class="card-body p-0">
                    <ul class="social-sales list-group list-group-flush">
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle facebook-bgcolor mr-2"><i
                                    class="fab fa-facebook-f"></i></span><span
                                class="social-sales-name">Facebook</span><span class="social-sales-count text-dark">
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{url('/sign-up/'.auth()->user()->username)}}&amp;quote=COME JOIN Survey Bounce, a site that lets you earn money with social media. I earned $25 and you can too! Sign up today for a $25 bonus! {{url('/sign-up/'.auth()->user()->username)}}"
                                    class="btn btn-primary btn-lg">
                                    Share Link</a></span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle whatsapp-bgcolor mr-2"><i
                                    class="fab fa-whatsapp"></i></span><span
                                class="social-sales-name">WhatsApp</span><span class="social-sales-count text-dark">
                                <a target="_blank"
                                    href="whatsapp://send?text=I'm inviting you to join Survey Bounce, a site that lets you earn money with social media. I just earned $25 and you can too! Sign up today for a $25 bonus! {{url('/sign-up/'.auth()->user()->username)}}"
                                    class="btn btn-primary btn-lg">
                                    Share Link</a></span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle twitter-bgcolor mr-2"><i
                                    class="fab fa-twitter"></i></span><span
                                class="social-sales-name">Twitter</span><span class="social-sales-count text-dark">
                                <a target="_blank"
                                    href="https://twitter.com/intent/tweet?url={{url('/sign-up/'.auth()->user()->username)}};text=COME JOIN Survey Bounce, a site that lets you earn money with social media. I earned $25 and you can too! Sign up today for a $25 bonus!;hashtags=onlinejob+%23earnmoney+%23makemoneyonline"
                                    class="btn btn-primary btn-lg">
                                    Share Link</a></span>
                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle pinterest-bgcolor mr-2"><i
                                    class="fab fa-pinterest-p"></i></span><span
                                class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">
                                <a target="_blank"
                                    href="https://pinterest.com/pin/create/link/?url={{url('/sign-up/'.auth()->user()->username)}}&amp;media=https://i.pinimg.com/564x/49/33/df/4933dfc29124448d91937132099303f4.jpg&amp;description=COME JOIN Survey Bounce, a site that lets you earn money with social media. I earned $25 and you can too! Sign up today for a $25 bonus! {{url('/sign-up/'.auth()->user()->username)}}"
                                    class="btn btn-primary btn-lg">
                                    Share Link</a></span>

                        </li>
                        <li class="list-group-item social-sales-content"><span
                                class="social-sales-icon-circle instagram-bgcolor mr-2"><i
                                    class="fab fa-instagram"></i></span><span
                                class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">
                                <a target="_blank" href="https://instagram.com" class="btn btn-primary btn-lg">
                                    Share Link</a></span>
                        </li>
                    </ul>
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
    // alert('fasfasdfasdf');
</script>
@endsection
