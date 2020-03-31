@extends('t2e_dashboard')
@section('content')


    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$295.00</b> paid <b id="secs">15 minutes</b> ago to @*** via Bitcoin</div>
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
        <style>
            .uap-ap-theme-2 .uap-user-page-content {
                padding-left: 1% !important;
                padding-right: 3% !important;
            }
            /*STYLE CROSSED*/
            .uap-user-page-top-wrapper .uap-account-page-top-mess p, .uap-user-page-top-wrapper .uap-account-page-top-mess div {
                margin-bottom: 13px;
                font-weight: 400;
            }
            .offer .download .btn {
                background: #fff;
            }
            .offer .download h4 {
                line-height: 25px !important;
                color: #ff4231;
            }
            .offerlist .offer {
                margin-bottom: 5px;
            }
            [class^="fa-"], [class*=" fa-"] {
                width: unset !important;
            }
            .blog-image {
                width: 100%;
                text-align: center;
            }
            .blog-info h3 {
                margin-bottom: 2px;
                margin-top: 5px;
                font-size: 16px;
                width: 100%;
                overflow: hidden;
                white-space: nowrap;
            }
            .offer .download {
                width: 100% !important;
                float: right !important;
                height: 48px !important;
                margin: 10px 0 !important;
                padding: 0 !important;
                border: 0 !important;
            }
        </style>
        <link href="/mobilerewards_files/css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/mobilerewards_files/taskwall.css">
        <style>
            .offer .download .btn {
                border: 1px solid  #ff4231;
            }
            .offer .download .btn-o {
                border: 1px solid  #ff4231;
            }
            .cd-nav li {
                border-top: 1px solid rgba(41, 128, 185, 0.1);
            }
            .boximg {
                background: rgba(41, 128, 185, 0.7);
            }
        </style>
        <div class=".rewards-body" style="overflow: visible;">

            <div style="height: 100%; box-shadow: 0 0 0px #241d20;">
                <section class="cd-section getpoints cd-selected">
                    <div class="cd-content">

                        <!--  Offers Starts -->
                        <div class="offers" id="cd-nav" style="border-radius: 20px; padding: 8px;">
                            <!--  Info -->
                            <h2 style="font-size: 30px; font-weight: bold;">Review Wall</h2>
                            <center><p>Get paid to read quick blogs! Read the blogs below &amp; leave an honest review to earn! This will be automatically added to your account within <strong style="font-weight: bold;">5-10 minutes</strong>.</p>
                                <p> You can review each blog <strong style="font-weight: bold;">multiple times!</strong> </p>
                                <!-- <button onclick="multitasks();" class="c-btn c-btn--warning" style="background: #2196F3;">Want to complete tasks more than once?</button> -->
                                <!-- <a onclick="taskstut();">How to complete tasks tutorial</a> -->
                            </center>
                            <!--  Offer List -->
                            <div class="offerlist">

                                <div class="row">

                                    <div class="col-6 col-md-4 col-xl-4" style="padding: 0 5px;">
                                        <a target="_blank" href="/reviewwall?blog=Scam Reveal Blog Review&amp;link=https://scamreveal.co/2019/10/15/tap-2-earn-review-review-of-the-influencer-network-tap-2-earn/&amp;img=https://scamreveal.co/wp-content/uploads/2019/10/logo-1.png&amp;instructions=Read this review by Jimmy Linder on Tap 2 Earn, leave an honest comment, and receive $25!&amp;pay=25&amp;user=6392348">
                                            <div class="offer">
                                                <div class="blog-image"><img src="https://scamreveal.co/wp-content/uploads/2019/10/logo-1.png"></div>
                                                <div class="blog-info">
                                                    <h3>Scam Reveal Blog Review</h3>
                                                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>                                                <br>Read this review by Jimmy Linder on Tap 2 Earn, leave an honest comment, and receive $25!
                                                        <br>*You must be on the page for atleast 3 minutes*</p>
                                                </div>
                                                <div class="download">
                                                    <div class="btn-o">
                                                        <h4>Earn $25.00</h4></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-xl-4" style="padding: 0 5px;">
                                        <a target="_blank" href="/reviewwall?blog=Fraud Reveal Blog Review&amp;link=https://fraudreveal.com/is-tap-2-earn-legitimate-or-a-scam/&amp;img=https://fraudreveal.com/wp-content/uploads/2019/11/FRAUDREVEAL.png&amp;instructions=Read this review by Spencer Rovelli on Tap 2 Earn, leave an honest comment, and receive $25!&amp;pay=25&amp;user=6392348">
                                            <div class="offer">
                                                <div class="blog-image" style="
                                "><img style="max-height: 50px;" src="https://fraudreveal.com/wp-content/uploads/2019/11/FRAUDREVEAL.png"></div>
                                                <div class="blog-info">
                                                    <h3>Fraud Reveal Blog Review</h3>
                                                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>                                                <br>Read this review by Spencer Rovelli on Tap 2 Earn, leave an honest comment, and receive $25!
                                                        <br>*You must be on the page for atleast 3 minutes*</p>
                                                </div>
                                                <div class="download">
                                                    <div class="btn-o">
                                                        <h4>Earn $25.00</h4></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-xl-4" style="padding: 0 5px;">
                                        <a target="_blank" href="/reviewwall?blog=Scam Destruct Blog Review&amp;link=https://scamdestruct.com/2019/08/13/tap-2-earn-is-100-real/&amp;img=https://scamdestruct.com/wp-content/uploads/2019/11/Scam-Destruction-copy.png&amp;instructions=<p>Read this review by the Scam Destruct Blog on Tap 2 Earn, leave an honest comment, and receive $25!&amp;pay=25&amp;user=6392348">
                                            <div class="offer">
                                                <div class="blog-image" style="
                                "><img style="max-height: 50px;" src="https://scamdestruct.com/wp-content/uploads/2019/11/Scam-Destruction-copy.png"></div>
                                                <div class="blog-info">
                                                    <h3>Scam Destruct Blog Review</h3>
                                                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                                        <br>
                                                        Read this review by the Scam Destruct Blog on Tap 2 Earn, leave an honest comment, and receive $25!
                                                        <br>*You must be on the page for atleast 3 minutes*</p>
                                                </div>
                                                <div class="download">
                                                    <div class="btn-o">
                                                        <h4>Earn $25.00</h4></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-xl-4" style="padding: 0 5px;">
                                        <a target="_blank" href="/reviewwall?blog=Scam Detector Blog Review&amp;link=https://scamdetector.co/tap-2-earn-is-100-legitimate/&amp;img=https://scamdetector.co/wp-content/uploads/2019/10/logo-1-Recovered.png&amp;instructions=<p>Read this review by Sandra Martinez on Tap 2 Earn, leave an honest comment, and receive $25!&amp;pay=25&amp;user=6392348">
                                            <div class="offer">
                                                <div class="blog-image" style="
                                "><img style="max-height: 50px;" src="https://scamdetector.co/wp-content/uploads/2019/10/logo-1-Recovered.png"></div>
                                                <div class="blog-info">
                                                    <h3>Scam Detector Blog Review</h3>
                                                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>                                                <br>Read this review by the Sandra Martinez on Tap 2 Earn, leave an honest comment, and receive $25!
                                                        <br>*You must be on the page for atleast 3 minutes*</p>
                                                </div>
                                                <div class="download">
                                                    <div class="btn-o">
                                                        <h4>Earn $25.00</h4></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-4 col-xl-4" style="padding: 0 5px;">
                                        <a target="_blank" href="/reviewwall?blog=Scam Exposer Blog Review&amp;link=https://scamexposer.co/tap-2-earn-a-scam-or-an-influencer-network/&amp;img=https://scamexposer.co/wp-content/uploads/2019/10/blog-logo.png&amp;instructions=<p>Read this review by Sandra Martinez on Tap 2 Earn, leave an honest comment, and receive $25!&amp;pay=25&amp;user=6392348">
                                            <div class="offer">
                                                <div class="blog-image" style="
                                "><img style="max-height: 50px;" src="https://scamexposer.co/wp-content/uploads/2019/10/blog-logo.png"></div>
                                                <div class="blog-info">
                                                    <h3>Scam Exposer Blog Review</h3>
                                                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>                                                <br>Read this review by Daniel Oxford on Tap 2 Earn, leave an honest comment, and receive $25!
                                                        <br>*You must be on the page for atleast 3 minutes*</p>
                                                </div>
                                                <div class="download">
                                                    <div class="btn-o">
                                                        <h4>Earn $25.00</h4></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </section>
            </div>




            <div class="cd-overlay"><!-- shadow layer visible when navigation is visible --></div>
        </div>
    </div>



@endsection
@section('jscript')
    <script type="text/javascript">
    </script>
@endsection
