@extends('t2e_dashboard')
@section('content')


    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
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
        <input type="hidden" id="deviceOS" value="{{$device}}">
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
        /*
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
*/

        /* --------------------------------

   Offers

   -------------------------------- */
        .offers {
            max-width: 960px;
            margin: 0 auto;
        }

        .offers h2 {
            font-size: 24px;
            text-align: center;
            margin: 10px;
            padding-top: 10px;
        }

        .offers p {
            font-weight: 300;
            width: 100%;
            font-size: 14px;
            line-height: 20px;
            text-align: center;
            margin-bottom: 25px;
        }

        .offerlist .offer p {
            font-weight: 300;
            width: 100%;
            font-size: 12px;
            line-height: 20px;
            text-align: left;
            margin-bottom: 2px;
            margin-top: 0;
        }

        .offerlist .offer {
            display: block;
            position: relative;
            margin: auto;
            border-bottom: 1px solid rgba(0,0,0,0.2);
            margin-bottom: 10px;
            padding-bottom: 10px;
            width: 95%;
        }


        .offerlist .offer {
            margin-bottom: 10px;
            background: white;
            border-radius: 10px;
            padding: 8px 10px;
        }

        .offerlist a, .offerlist a:hover, .offerlist a:visited {
            color: #000;
        }
        .offerlist .offer:last-child {
            border-bottom: none;
        }

        .offer:after, .totalpoints:after {
            content: "";
            display: table;
            clear: both;
        }

        .offerimg {
            max-width: 68px;
            float: left;
        }

        .offerimg img {
            width: 90%;
        }

        .offerinfo {
            width: 45%;
            float: left;
            overflow:hidden;
        }

        .offerinfo h3 {
            margin-bottom: 2px;
            margin-top: 5px;
            font-size: 16px;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
        }

        .offerinfo .worth {
            margin-bottom: 2px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .offer .download {
            width: 30%;
            float: right;
            height: 48px;
            margin: 10px 0;
            padding-left: 10px;
            border-left: 1px solid rgba(0,0,0,0.2);
        }

        .offer .download h4 {
            line-height: 40px;
            font-size: 12px;
            letter-spacing: 0px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }


        .offer .download .btn-o {
            width: 100%;
            margin-top: 4px;
            height: 40px;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }
        .btn-o {
            font-size: 14px;
            padding: 7px 1px;
            border-radius: 2px;
        }
        .offer .download .btn-o {
            border: 1px solid #ff0062;
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

            offerHTML += '<a target="_blank" href="'+obj.link+'"><div class="offer">';
        if(obj.picture){
            offerHTML += '<div class="offerimg"><img src="'+obj.picture+'"></div>';
        }
                        // str.substr(1, 4);

        // <p>'+obj.adcopy+'<b>$25.00</b>.	</p>
            var deviceOS = $('input#deviceOS').val();
            if(deviceOS != 'desktop'){
                offerHTML += '<div class="offerinfo"><h3>'+obj.name_short+' </h3><p>Download and install this app, then run it for 30 seconds to earn $25.00</b></p></div>';
            } else {
                offerHTML += '<div class="offerinfo"><h3>'+obj.name_short+' </h3><p>Click to earn $25</b></p></div>';
            }
            offerHTML += '<div class="download"><div class="btn-o"><h4>Earn $25.00</h4></div></div></div></a>';
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
