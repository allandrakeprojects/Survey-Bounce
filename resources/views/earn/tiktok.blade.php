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
            <h2>TikTok Post Submission</h2>
            <br>
            <div class="c-card-body">
                <p>Follow us on TikTok!</p>
                <br>
                <a target="_blank" href="https://www.tiktok.com/@tap2earnco.pty"><button class="btn btn-primary" style="background-color: #2196F3; border-color: #2196F3;"><i class="fab fa-tiktok"></i> Follow</button></a>
                <br>
                <br>
                <p>First, follow us on TikTok. Then create a short TikTok video talking about Survey Bounce, how it works, how much you've made, and why you love it. Once finished, upload it to TikTok then enter the video link below to earn $50. *MAKE SURE TO ADD A "Survey Bounce" STICKER*</p>
                <br>
                <div class="form-group">
                    <?php
                    if( isset($validator) ){
                        $errors = $validator->errors();
                    }
                    echo '<p style="color:red;" >'.$errors->first('url').'</p>';
                    if( session()->get('status_message') != '' ){
                        echo '<p style="color:green;" >'.session()->get('status_message').'</p>';
                    }
                    ?>
                    <form role="form" action="<?=url('tiktok-submit')?>" method="post" class="has-validation-callback">
                        @csrf
                        <label for="usr">TikTok Post Link</label>
                        <input data-validation="required url" data-validation-error-msg="Please enter a valid video URL" type="url" class="form-control" name="url" required="">
                        <br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit Post">
                    </form>
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
    </script>
@endsection
