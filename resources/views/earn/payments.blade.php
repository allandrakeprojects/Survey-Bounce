@extends('t2e_dashboard')
@section('content')

    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
        You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
        </div>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span><b>$375.00</b> paid <b id="secs">2 minutes</b> ago to @*** via Bitcoin</div>
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

        <div class="row">
            <div class="col-half col-md-6 col-xl-3">
                <div class="c-card c-card-x">
                    <div class="card-icon">
                <span class="c-icon c-icon--info u-mb-small">
                  <i class="fas fa-mouse-pointer"></i>
                </span>
                    </div>

                    <div class="card-stat">
                        <h3 class="c-text--subtitle">Total Earnings</h3>
                        <h1 class="card-stat-num">$70.00</h1>
                    </div>
                </div>
            </div>

            <div class="col-half col-md-6 col-xl-3">
                <div class="c-card c-card-x">
                    <div class="card-icon">
                <span class="c-icon c-icon--danger u-mb-small">
                  <i class="fas fa-users"></i>
                </span>
                    </div>

                    <div class="card-stat">
                        <h3 class="c-text--subtitle">Current Earnings</h3>
                        <h1 class="card-stat-num">$70.00</h1>
                    </div>
                </div>
            </div>

            <div class="col-half col-md-6 col-xl-3">
                <div class="c-card c-card-x">
                    <div class="card-icon">
                <span class="c-icon c-icon--success u-mb-small">
                  <i class="fas fa-tasks"></i>
                </span>
                    </div>

                    <div class="card-stat">
                        <h3 class="c-text--subtitle">Pending Payments</h3>
                        <h1 class="card-stat-num">0</h1>
                    </div>
                </div>
            </div>

            <div class="col-half col-md-6 col-xl-3">
                <div class="c-card c-card-x">
                    <div class="card-icon">
                <span class="c-icon c-icon--warning u-mb-small">
                  <i class="far fa-money-bill-alt"></i>
                </span>
                    </div>

                    <div class="card-stat">
                        <h3 class="c-text--subtitle">Payment Method</h3>
                        <h1 style="font-size: 1.1rem" class="card-stat-num">PayPal</h1>        </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="c-table-responsive@wide">
                    <table class="c-table" style="display: table">
                        <thead class="c-table__head">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">Payment ID</th>
                            <th class="c-table__cell c-table__cell--head">Scheduled Date</th>
                            <th class="c-table__cell c-table__cell--head">Amount</th>
                            <th class="c-table__cell c-table__cell--head">Status</th>
                            <th class="c-table__cell c-table__cell--head">View</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
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
