<html lang="en"><head>
    <link rel="shortcut icon" href="{{asset('assets/t2e/content/uploads/2019/10/logo.png')}}" />
    <meta property="og:url" content="https://surveybounce.com">
    <meta property="og:title" content="Survey Bounce">
    <meta property="og:description" content="#1 Influencer Network. Start earning with social media.">
    <meta property="og:image" content="https://tap2earn.co/wp-content/uploads/2019/10/meta-banner.jpg">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-146921121-2"></script>
    <script>
//        window.dataLayer = window.dataLayer || [];
//        function gtag(){dataLayer.push(arguments);}
//        gtag('js', new Date());
//
//        gtag('config', 'UA-146921121-2');
    </script>
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&amp;display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | Survey Bounce</title>
    <meta name="description" content="Neat">
    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>



    <link href="https://fonts.googleapis.com/css?family=Muli&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    {{-- <link rel="shortcut icon" href="favicon.png" type="image/x-icon"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/t2e/includes/css/neat.css')}}">
    <link rel="stylesheet" href="{{asset('assets/t2e/includes/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/t2e/includes/css/swal.css')}}">
    <!---->
</head>
<body>

<div class="o-page">
    <div class="o-page__sidebar js-page-sidebar">
        <aside class="c-sidebar">
            <!--  <a target="_blank" href="https://surveybounce.com/">  <div class="c-sidebar__brand">
              <center><img style="width: 200px;" src="https://tap2earn.co/wp-content/uploads/2019/09/logo.png" alt="Survey Bounce"></center>
                  </div> </a> -->

            <!-- Scrollable -->
            <div class="c-sidebar__body">
                <!-- <span class="c-sidebar__title">Dashboard</span> -->
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link is-active" href="<?=url('/dashboard')?>">
                            <i class="c-sidebar__icon fas fa-home"></i>Overview
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/chat')?>">
                            <i class="c-sidebar__icon fas fa-comments"></i>Chat
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/refer')?>">
                            <i class="c-sidebar__icon fas fa-users"></i>Refer &amp; Earn
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/taskwall')?>">
                            <i class="c-sidebar__icon fas fa-tasks"></i>$50 Task Wall
                        </a>
                    </li>
                    <!--
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/reviewwall')?>">
                            <i class="c-sidebar__icon fas fa-book"></i>$25 Review Wall
                        </a>
                    </li>
                    -->
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/promo')?>">
                            <i class="c-sidebar__icon fab fa-instagram"></i>Promo Posts
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/youtube')?>">
                            <i class="c-sidebar__icon fab fa-youtube"></i>$50 YouTube Submit
                        </a>
                    </li>
                    <li>
                        <!-- Favicon -->
                        <a class="c-sidebar__link " href="<?=url('/facebook')?>">
                            <i class="c-sidebar__icon fab fa-facebook"></i>$50 FB Video Submit
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/facebook-post')?>">
                            <i class="c-sidebar__icon fab fa-facebook"></i>$50 FB Post Submit
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/instagram')?>">
                            <i class="c-sidebar__icon fab fa-instagram"></i>$50 Instagram Submit
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/tiktok')?>">
                            <i class="c-sidebar__icon fas fa-video"></i>$50 TikTok Submit
                        </a>
                    </li>

                    <!-- <li>
                        <a class="c-sidebar__link " href="/dashboard/giveaways.php">
                        <i class="c-sidebar__icon fas fa-fw fa-award"></i>Giveaways
                        </a>
                    </li> -->
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/rewards')?>">
                            <i class="c-sidebar__icon fas fa-fw fa-trophy"></i>Rewards Center
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/account')?>">
                            <i class="c-sidebar__icon far fa-user-circle"></i>My Account
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/payments')?>">
                            <i class="c-sidebar__icon fas fa-money-check-alt"></i>Payments
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/cashout')?>">
                            <i class="c-sidebar__icon far fa-check-circle"></i>Cash Out
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link " href="<?=url('/help')?>">
                            <i class="c-sidebar__icon far fa-question-circle"></i>Help
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" target="_blank" href="<?=url('/payment-proof')?>">
                            <i class="c-sidebar__icon fas fa-star"></i>Payment Proofs
                        </a>
                    </li>
                </ul>
                <div class="manager-info" style="margin-bottom: 80px;">
                    <p style="margin-bottom: 10px;font-weight: 600;color: #fff; text-align: center">Your Account Manager</p>
                    <div class="row" style="padding: 0;width: 100%;margin: 0;">


                        <div class="col-md-3 col-3" style="padding: 0;">
                            <img src="https://tap2earn.co/wp-content/uploads/2019/09/Kayla-420x460.png" alt="manager" style="width: 100%;border-radius: 100px;background:#fff;border: 2px solid #ffffff;">
                        </div>
                        <div class="col-md-9 col-9" style="padding: 0 8px;">

                            <p style="font-weight: 700;font-size: 18px;color: #fff;">Kayla</p>
                            <p style="color: #fff;">Telegram: @kaylat2e</p>
                            <p style="color: #fff;">HMU on the <b>Telegram app</b> for fast support!</p>					</div>
                    </div>
                </div>
                <center>
                </center>
            </div>
        </aside>
    </div>
    <main class="o-page__content">
        <header class="c-navbar u-mb-medium">
            {{--<button class="c-sidebar-toggle js-sidebar-toggle">--}}
                {{--<i class="feather icon-align-left"></i>--}}
            {{--</button>--}}

            <button class="c-sidebar-toggle js-sidebar-toggle">
                {{--<i class="feather icon-align-left"></i>--}}
                <i style="color:white;" class="fa fa-align-justify"></i>
            </button>

            <h2 class="c-navbar__title">Hi, <?=auth()->user()->name?></h2>
            <div class="c-dropdown dropdown">
                <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <img class="c-avatar__img" src="{{asset('assets/t2e/images/'.auth()->user()->avatar)}}" alt="Profile pic">
                    <!--  <i class="fas fa-sort-down" style="margin-left: 5px;"></i> -->
                </div>

                <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
                    <a class="c-dropdown__item dropdown-item" href="<?=url('/account')?>">Edit Account</a>
                    <a class="c-dropdown__item dropdown-item" href="<?=url('/payments')?>">Payments</a>
                    <a class="c-dropdown__item dropdown-item" href="<?=url('/do-logout')?>">Log out</a>
                </div>
            </div>
        </header>


        <div class="container">
            <!--  <div class="alert warning">
              <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>Due to problems with our partners because of increased fraudulent activity, initial payment schedules have been changed to NET30<br><br> <a style="background: #fff;color: #d6932e;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="net30.php">Find out more</a></div> -->
        </div>


        @yield('content')


    </main>
</div>

<!-- Main JavaScript -->
<script src="{{asset('assets/t2e/includes/js/neat_libraries.js')}}"></script>
<script src="{{asset('assets/t2e/includes/image-picker/image-picker.min.js')}}"></script>



<!-- js  -->
@yield('jscript')
<!-- js -->
</body></html>
