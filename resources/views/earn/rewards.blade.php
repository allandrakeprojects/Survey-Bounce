@extends('t2e_dashboard')
@section('content')

    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$500.00</b> paid <b id="secs">2 minutes</b> ago to @*** via PayPal</div>
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
            <h3>Rewards Center</h3>
            <p>Welcome to the Survey Bounce Rewards Center! As a token of our gratitude for working with us, we're giving you prizes that reward your loyalty! You will earn 1 BOUNCE coin for every $1 that you earn. These coins can be exchanged for many different prizes that can be found below.</p><br>
            {{-- <div style="font-size: 15px;"><span style="font-weight: 600;background-color: #51cd6d;color: #fff;padding: 3px;border-radius: 5px;">

            70</span> TAP coins available</div>
            <br>
            <h5>Redeemed Prizes</h5>
            <div class="jcarousel-wrapper">
                <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul style="left: -1782px; top: 0px;">




















                        <li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/4CF72B86-D0D0-44A6-8833-AC1DA37B53C1.jpg" alt="Image 1"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/7F685FE2-1D67-4F06-9FAF-F88A0133F7C4.jpg" alt="Image 2"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/56FDBFAC-0E8D-412A-9E57-CE86F4CF83CF.jpg" alt="Image 3"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/74A128A8-6DF6-4286-932F-6C6B6BE1AB69.jpg" alt="Image 4"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/79FCA50E-703A-4D9D-8F8B-651EC0B64A70.jpg" alt="Image 5"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/790BDF6C-8BC2-4F37-AAC5-9504778272DD.jpg" alt="Image 6"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/4798EB5F-0F81-4FA6-B725-52616433797D.jpg" alt="Image 7"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/B3B9ED82-AF11-47D4-9719-6FD06539C552.jpg" alt="Image 8"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/D38338F8-CCBF-4099-8BD9-D691E37C4F19.jpg" alt="Image 9"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/EE8635A4-3F6B-4F01-94D2-0D575D72CE32.jpg" alt="Image 10"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/IMG_5671.jpg" alt="Image 11"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/IMG_5672.jpg" alt="Image 12"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/IMG_5673.jpg" alt="Image 13"></li><li style="width: 198px;"><img src="https://tap2earn.co/wp-content/uploads/2019/11/IMG_5674.jpg" alt="Image 14"></li></ul>
                </div>

                <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>

                <p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1">1</a><a href="#2">2</a><a href="#3">3</a><a href="#4">4</a><a href="#5">5</a><a href="#6">6</a><a href="#7">7</a><a href="#8" class="">8</a><a href="#9" class="">9</a><a href="#10" class="active">10</a><a href="#11">11</a><a href="#12">12</a><a href="#13">13</a><a href="#14">14</a></p>
            </div> --}}
        </div>

        <div class="c-card" style="padding: 20px 10px;">
            <h5 style="padding: 0 30px 10px 30px;">Available Rewards</h5>
            <br>
            <div class="offset-xl-1 col-xl-10">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">$25 Amazon Gift Card</h4>
                                    <input type="hidden" name="name" value="$25 Amazon Gift Card">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">250 Coins</h1>
                                    <input type="hidden" name="cost" value="250">
                                    <input type="hidden" name="retail" value="25">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            180 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://dash.tap2earn.co/assets/images/Dj30Na13.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="1">Claim</button>
                                </div>
                                <!-- Image wheel
                                <div id="image-wheel">
                                <div style="margin: 5px 0 5px 5px;display: inline-block;width: 30%;">
                                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Pictor_A_composite.jpg/220px-Pictor_A_composite.jpg">
                                        </div>
                                        <div style="margin: 5px 0px 5px 0px; display: inline-block; width: 30%;">
                                          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Pictor_A_composite.jpg/220px-Pictor_A_composite.jpg">
                                        </div>
                                        <div style="margin: 5px 5px 5px 0;display: inline-block;width: 30%;">
                                          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Pictor_A_composite.jpg/220px-Pictor_A_composite.jpg">
                                        </div>
                                  </div>
                                 /Image wheel -->
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-info text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">$50 Visa Gift Card</h4>
                                    <input type="hidden" name="name" value="$50 Visa Gift Card">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">300 Coins</h1>
                                    <input type="hidden" name="cost" value="300">
                                    <input type="hidden" name="retail" value="50">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            230 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://dash.tap2earn.co/assets/images/Dj30Na14.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="2">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">$100 Netflix Gift Card</h4>
                                    <input type="hidden" name="name" value="$100 Netflix Gift Card">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">400 Coins</h1>
                                    <input type="hidden" name="cost" value="400">
                                    <input type="hidden" name="retail" value="100">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            330 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://dash.tap2earn.co/assets/images/Dj30Na15.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="3">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">Apple AirPods</h4>
                                    <input type="hidden" name="name" value="Apple AirPods">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">500 Coins</h1>
                                    <input type="hidden" name="cost" value="500">
                                    <input type="hidden" name="retail" value="160">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            430 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://i.imgur.com/DR9v7DB.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="1">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-info text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">Apple iPad Mini</h4>
                                    <input type="hidden" name="name" value="Apple iPad Mini">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">1,000 Coins</h1>
                                    <input type="hidden" name="cost" value="1000">
                                    <input type="hidden" name="retail" value="400">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            930 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://i.imgur.com/nL5Ew5K.png"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="2">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">Apple Watch Series 4</h4>
                                    <input type="hidden" name="name" value="Apple Watch Series 4">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">1,000 Coins</h1>
                                    <input type="hidden" name="cost" value="1000">
                                    <input type="hidden" name="retail" value="400">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            930 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://i.imgur.com/DaQKFBP.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="3">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>




                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">Apple iPhone XR</h4>
                                    <input type="hidden" name="name" value="Apple iPhone XR">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">1,500 Coins</h1>
                                    <input type="hidden" name="cost" value="1500">
                                    <input type="hidden" name="retail" value="750">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            1,430 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://i.imgur.com/2Iemy5S.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="4">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-info text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">Apple iPad Pro</h4>
                                    <input type="hidden" name="name" value="Apple iPad Pro">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">1,500 Coins</h1>
                                    <input type="hidden" name="cost" value="1500">
                                    <input type="hidden" name="retail" value="650">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            1,430 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://i.imgur.com/1pfV4kK.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="5">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
                        <form id="paymentForm" method="post" action="" name="paymentForm">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white reward-name">Apple Macbook Air</h4>
                                    <input type="hidden" name="name" value="Apple MacBook Air">
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1 points">2,000 Coins</h1>
                                    <input type="hidden" name="cost" value="2000">
                                    <input type="hidden" name="retail" value="1000">
                                    <div class="progress">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 100%;background-color: #2ec551!important;">
                                            1,930 more coins needed
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <img alt="Card image cap" class="card-img-top mb-4" src="https://i.imgur.com/uwk1WPz.jpg"> <button class="btn btn-secondary btn-block btn-lg" disabled="" name="reward" value="6">Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <br>
            <p>Redemption: We are currently out of stock of rewards therefore the retail price of redeemed prizes will be added to the next payment invoice of the user.</p>
        </div>

        <div class="c-card" style="padding: 20px 0 0 0; display: none;">
            <h5 style="padding: 0 30px 10px 30px;">Redeemed Rewards</h5>
            <p style="padding: 20px !important;">The retail value will be added to your next requested payment!</p><table class="c-table" style="display: table; box-shadow: none;">
                <thead class="c-table__head">
                <tr class="c-table__row">
                    <th class="c-table__cell c-table__cell--head">Reward Name</th>
                    <th class="c-table__cell c-table__cell--head">Coins Cost</th>
                    <th class="c-table__cell c-table__cell--head">Retail Value</th>
                </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
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
