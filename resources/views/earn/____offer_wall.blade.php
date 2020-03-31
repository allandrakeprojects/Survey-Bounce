@extends('t2e_dashboard')
@section('content')


    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$370.00</b> paid <b id="secs">27 minutes</b> ago to @* via PayPal</div>
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
                            <h2 style="font-size: 30px; font-weight: bold;">Task Wall</h2>
                            <center><p>Complete the easy tasks below to earn extra money. This will be automatically added to your account within <strong style="font-weight: bold;">5-10 minutes</strong>.</p>

                                <p>We only require you do <b>10</b> tasks before cashing out. Sometimes tasks take up to 10 minutes to show up as completed. In the meanwhile, you can complete others.</p>
                                <p> You can only complete each offer <strong style="font-weight: bold;">ONCE.</strong> </p>

                                <p> If your referral completes a task, <b>you earn 20%</b></p>
                                <!-- <button onclick="multitasks();" class="c-btn c-btn--warning" style="background: #2196F3;">Want to complete tasks more than once?</button> -->
                                <!-- <a onclick="taskstut();">How to complete tasks tutorial</a> -->
                            </center>
                            <!--  Offer List -->
                            <div class="offerlist">

                                <div style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div>
                                <!-- <p> You can only complete the following offers multiple times after 24 hours. If you completed a task below, you can complete it again after <b>24 hours</b></p> -->
                                Loading....
                                <div style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div><!-- /G OFFERS -->

                            </div>

                        </div>
                    </div>

                </section>
            </div>




            <div class="cd-overlay"><!-- shadow layer visible when navigation is visible --></div>
        </div>
    </div>

    <style>
        .prize{
            width: 200px;
            margin-top: 4px;
            height: 40px;
            text-align: center;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
            border: 1px solid #ff4231
        }

    </style>

@endsection
@section('jscript')
    <script type="text/javascript">
        function loadOffer(){
            $.ajax({
                method: "GET",
                url:    "https://mobverify.com/api/v1/?affiliateid=211091&country=US&device=<?=$device?>&ctype=1"
            }).done(function( res ) {
                console.log(res);
                $('.loading-icon').hide();
                var offerHTML = '';
                offerHTML += '<div style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div>';
                if( (res.success) && (res.offers.length > 0) ){
                    $(res.offers).each(function(index,obj){
                        offerHTML += '<a style="display:flex;" href="'+obj.link+'">';
                        offerHTML += '<div style="width: 70%;"><h4>'+obj.name+'</h4>';
                        offerHTML += ''+obj.description+'</p></div>';
                        offerHTML += '<div class="btn-o prize"><h4 style="margin:8px;">Earn $25.00</h4></div>';
                        offerHTML += '</a>';
                        offerHTML += '<div  style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div>';
                    });
                }else{
                    offerHTML += 'No offers found';
                    offerHTML += '<div style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div>';
                }
                $('.offerlist').html(offerHTML);
            }).fail(function( res ) {
                console.log(res.statusText);
                $('.loading-icon').hide();
            });
        }

        $(document).ready(function(){
            loadOffer();
        });


    </script>
@endsection
