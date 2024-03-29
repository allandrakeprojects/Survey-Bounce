<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('keywords', 'Campus Management System | BNU' ) </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="@yield('author', 'BNU')">
      <meta name="keywords" content="@yield('keywords', 'Campus Management System | BNU' )">
      <meta name="author" content="@yield('author', 'BNU')">
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/bootstrap/css/bootstrap.min.css')}}">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
      <!-- flag icon framework css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/flag-icon/flag-icon.min.css')}}">
      <!-- Menu-Search css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/menu-search/css/component.css')}}">
      <!-- Horizontal-Timeline css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/horizontal-timeline/css/style.css')}}">
      <!-- amchart css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/dashboard/amchart/css/amchart.css')}}">
      <!-- flag icon framework css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/flag-icon/flag-icon.min.css')}}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
      <!--color css-->

      
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/linearicons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/simple-line-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ionicons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.css')}}">

  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">


        <!-- topbar start -->
        @include('theme.topbar')
           <!-- topbar end -->

           



           <!-- chat start -->
           @include('chat.sidebar_widget')
           <!-- chat end -->


           


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">



                    

                    <!-- sidebar start -->
                    @include('theme.sidebar')
                    <!-- sidebar end -->



                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">


                                   <!-- content start -->
                                   @yield('content')
                                    <!-- content end -->


                                </div>
                            </div>

                            <div id="styleSelector"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jqurey -->
<script type="text/javascript" src="{{asset('assets/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{asset('assets/bower_components/classie/js/classie.js')}}"></script>
<!-- Rickshow Chart js -->
<script src="{{asset('assets/bower_components/d3/js/d3.js')}}" ></script>
<script src="{{asset('assets/bower_components/rickshaw/js/rickshaw.js')}}"></script>
<!-- Morris Chart js -->
<script src="{{asset('assets/bower_components/raphael/js/raphael.min.js')}}"></script>
<script src="{{asset('assets/bower_components/morris.js/js/morris.js')}}"></script>
<!-- Horizontal-Timeline js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/horizontal-timeline/js/main.js')}}"></script>
<!-- amchart js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/amcharts.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/serial.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/light.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/pages/dashboard/amchart/js/custom-amchart.js')}}"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="{{asset('assets/bower_components/i18next/js/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>

<!-- pcmenu js -->
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('assets/js/demo-12.js')}}"></script>
<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.mousewheel.min.js')}}"></script>
@yield('javascript')
</body>

</html>