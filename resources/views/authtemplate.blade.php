
<!DOCTYPE html>
<html lang="en">
<head>
    <meta property="og:url" content="https://surveybounce.com" />
    <meta property="og:title" content="Survey Bounce" />
    <meta property="og:description" content="#1 Influencer Network. Start earning with social media." />
    <meta property="og:image" content="https://tap2earn.co/wp-content/uploads/2019/10/meta-banner.jpg" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146921121-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-146921121-2');
    </script>
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign Up | Survey Bounce</title>
    <meta name="description" content="Join the Survey Bounce network and join over 65,000 people turning their social media accounts into money! Join today and get a $25 sign up bonus.">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=0.85, maximum-scale=0.85, shrink-to-fit=no">

    <!-- Google Font -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Favicon -->
    <link rel="apple-touch-icon" href="/dashboard/apple-touch-icon.png">
    <link rel="shortcut icon" href="/dashboard/favicon.png" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/t2e/auth/neat.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/t2e/auth/custom.css') }}">
</head>
<body style="background: linear-gradient(to right,#ffffff 0%, #ffffff 100%);">

<div class="o-page o-page--center">




    @yield('content')


</div>
<script src="/js/neat.min.js?v=1.0"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js">
</script>
<script>
    $.validate({
        lang: 'en',
        //  modules : 'toggleDisabled',
    });
</script>
<script>
    $("input#nosp").on({
        keydown: function(e) {
            if (e.which === 32)
                return false;
        },
        change: function() {
            this.value = this.value.replace(/\s/g, "");
        }
    });
</script>
@yield('javascript')
</body>
</html>
