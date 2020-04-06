@extends('t2e_dashboard')
@section('content')

<div class="swal2-container swal2-center swal2-fade swal2-shown" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success" style="display: none;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Request Denied</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;"><div><p class="block-info">To ensure you aren't cheating the system with multiple accounts and to make sure you are getting the most out of Tap 2 Earn. You must meet the following requirements to cashout for the first time</p>

<br>
<p></p><p></p><div style="padding: 0 50px;">
<ul style="list-style-type: disc;">
    <li>20 clicks (20 needed)</li>
    <li>5 referrals (5 needed)</li>
    <li>5 completed taskwall tasks (5 needed)</li>
</ul>
        </div></div></div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><a href="{{ route('cashout') }}" type="button" class="swal2-confirm swal2-styled" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</a><button type="button" class="swal2-cancel swal2-styled" style="display: none;" aria-label="">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div></div>

<div class="container">
    <h3>Cash Out</h3>
    <br>
    <div class="alert">
        <span class="closebtn" onclick="if (!window.__cfRLUnblockHandlers) return false; this.parentElement.style.display='none';">×</span>
    You have not added a payment method to receive payments yet! <br><br> <a style="background: #fff;color: #e8796c;padding: 5px 8px;border-radius: 25px;border: 0;white-space: nowrap;" href="account#paymethod">Add Payment Method</a>
    </div>
    <div class="c-card c-card-success">
        <div class="c-card-body">
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 2%; background-color: #2ec551!important;"></div>
            </div>
            <div>
                <p style="margin-top: 10px"><b>Clicks:</b> 20% | <b>Referrals:</b> 0% | <b>Tasks:</b> 0%  | <b>Total:</b> 2% </p>
            </div>
            <p style="margin-top: 10px"><i class="fas fa-check-circle"></i> Track how close you are to reaching the requirements for your first cashout!</p>
        </div>
    </div>
    <div class="">
        <div class="c-card c-card-success">
            <div class="c-card-body">
                <form id="cashout" action="" method="post">
                    <div class="form-group">
                        <label for="usr">Amount</label>
                        <input type="text" class="c-input" name="amount" disabled="" value="${{ $earning ?? '0.00' }}">
                        <br>
                        <label for="usr">Payment Method</label>
                        <input type="text" class="c-input" name="pay_method" disabled="" value="PayPal">
                        <input type="hidden" name="pm" value="1">

                    </div>
                    <div class="form-group">
                        <input type="hidden" value="1" name="amount_update">
                    </div>
                </form>
                <a href="{{ route('cashout.certify') }}" type="button" class="btn btn-primary">Request Payment</a>
            </div></div></div>
</div>


@endsection

@section('jscript')
<script type="text/javascript">
    // alert('fasfasdfasdf');
</script>
@endsection
