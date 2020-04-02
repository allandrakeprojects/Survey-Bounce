@extends('t2e_dashboard')
@section('content')

    <div class="container">
        <!--  <div class="alert warning">
          <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>Due to problems with our partners because of increased fraudulent activity, initial payment schedules have been changed to NET30<br><br> <a style="background: #fff;color: #d6932e;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="net30.php">Find out more</a></div> -->
    </div>

    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$260.00</b> paid <b id="secs">51 seconds</b> ago to @* via CASH app</div>
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
            <h3>Refer &amp; Earn</h3>
            <p>Share your referral link with your friends to earn. Earn $2 for every friend who clicks your link and $10 for every friend that signs up.</p>
            <br>
            <div class="form-group">
                <label for="usr">Your Referral Link:</label>
                <div class="ref-box"><?=url('sign-up/'.auth()->user()->username)?></div>
            </div>
            <br>

            <a target="_blank" href="https://twitter.com/intent/tweet?text=I'm inviting you to join Survey Bounce, a site that lets you earn money with social media. I just earned $70.00 and you can too! Sign up today for a $25 bonus! <?=url('sign-up/'.auth()->user()->username)?>">
                <button class="c-btn c-btn--warning" style="background: #2196F3;"><i class="fab fa-twitter"></i> Share</button></a>

            <a target="_blank" href="whatsapp://send?text=I'm inviting you to join Survey Bounce, a site that lets you earn money with social media. I just earned $70.00 and you can too! Sign up today for a $25 bonus! <?=url('sign-up/'.auth()->user()->username)?>">
                <button class="c-btn c-btn--warning" style="background: #34af23;"><i class="fab fa-whatsapp"></i> Share</button></a>

            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://share.surveybounce.com/ahmedshabbirawan&amp;quote=I'm inviting you to join Survey Bounce, a site that lets you earn money with social media. I just earned $70.00 and you can too! Sign up today for a $25 bonus! <?=url('sign-up/'.auth()->user()->username)?>">
                <button class="c-btn c-btn--warning" style="background: #3b5998;"><i class="fab fa-facebook"></i> Share</button></a>
            <br>

        </div>
        <div style="display: none;" class="c-card">
            <h2>Your Referrals</h2><br>
            <ul class="pagination"><li class="page-item "><a class="page-link" href="?page=0">0</a></li><li class="page-item  active"><a class="page-link" href="?page=1">1</a></li><li class="page-item "><a class="page-link" href="?page=2">2</a></li><li class="page-item "><a class="page-link" href="?page=3">3</a></li><li class="page-item "><a class="page-link" href="?page=4">4</a></li><li class="page-item "><a class="page-link" href="?page=5">5</a></li><li class="page-item "><a class="page-link" href="?page=2">&gt;&gt;</a></li><li class="page-item "><a class="page-link" href="?page=0">Last</a></li></ul>	<br>
            <input class="form-control" id="myInput" type="text" placeholder="Search Filter..."><br>
            <div class="row">
                <div class="col-12">
                    <div class="c-table-responsive@wide">
                        <table id="myTable" class="c-table" style="display: table">
                            <thead class="c-table__head">
                            <tr class="c-table__row">
                                <th class="c-table__cell c-table__cell--head">Influencer</th>
                                <th class="c-table__cell c-table__cell--head">Date</th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
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
        function loadOffer(){
            $.ajax({
                method: "GET",
                url:    "https://mobverify.com/api/v1/?affiliateid=211091&country=US&device=desktop&ctype=1"
            }).done(function( res ) {
                console.log(res);
                $('.loading-icon').hide();
                var offerHTML = '';
                offerHTML += '<div style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div>';
                if( (res.success) && (res.offers.length > 0) ){
                    $(res.offers).each(function(index,obj){
                        offerHTML += '<a href="'+obj.link+'">';
                        offerHTML += '<h4>'+obj.name+'</h4>';
                        offerHTML += '<p>'+obj.description+'</p>';
                        offerHTML += '</a>';
                        offerHTML += '<div style="height: 1.5px;background-color: #ff4231;margin: 15px;border-radius: 5px;"></div>';
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
