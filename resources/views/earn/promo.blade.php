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
            <h3>Promotional Posts</h3>
            <p>Find some images below that you can posts on social media to help you gain more referrals.</p>
            <p>To save an image, press and hold it down then press save (mobile) or right click then save image (desktop)</p>
            <br>
            <div class="row">
                {{-- <div class="col-4">1. Click an image</div>
                <div class="col-4">2. Take a screenshot</div>
                <div class="col-4">3. Post on social media</div> --}}
            </div>
            <br>
            <style>
                .promo-img {
                    padding: 10px;
                }
            </style>
            <div class="row" style="
                margin-bottom: 25px;
            ">
                <div class="col-6 col-md-4 promo-img">
                    <a target="_blank" href="<?=asset('assets/t2e/content/uploads/2019/10/promo-01.jpg')?>"><img src="<?=asset('assets/t2e/content/uploads/2019/10/promo-01.jpg')?>"></a>
                </div>
                <div class="col-6 col-md-4 promo-img">
                    <a target="_blank" href="<?=asset('assets/t2e/content/uploads/2019/10/promo-02.jpg')?>"><img src="<?=asset('assets/t2e/content/uploads/2019/10/promo-02.jpg')?>"></a>
                </div>
                <div class="col-6 col-md-4 promo-img">
                    <a target="_blank" href="<?=asset('assets/t2e/content/uploads/2019/10/promo-03.jpg')?>"><img src="<?=asset('assets/t2e/content/uploads/2019/10/promo-03.jpg')?>"></a>
                </div>
            </div>

        </div>

        <div class="col-12">
            {{--<footer class="c-footer">--}}
                {{--<p>© Copyright 2015-2019 Survey Bounce. All Rights Reserved.</p>--}}
                {{--<span class="c-footer__divider">|</span>--}}
                {{--<nav>--}}
                    {{--<a class="c-footer__link" target="_blank" href="https://surveybounce.com">Home</a>--}}
                    {{--<a class="c-footer__link" target="_blank" href="https://surveybounce.com/terms">Terms</a>--}}
                    {{--<a class="c-footer__link" target="_blank" href="https://surveybounce.com/privacy">Privacy</a>--}}
                    {{--<a class="c-footer__link" target="_blank" href="help.php">FAQ</a>--}}
                    {{--<a class="c-footer__link" target="_blank" href="help.php">Help</a>--}}
                {{--</nav>--}}
            {{--</footer>--}}
            <center>
            </center>
        </div>
    </div>



@endsection
@section('jscript')
    <script type="text/javascript">
    </script>
@endsection
