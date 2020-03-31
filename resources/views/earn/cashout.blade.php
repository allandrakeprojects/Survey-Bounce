@extends('t2e_dashboard')
@section('content')

    <div class="container">
        <h3>Cash Out</h3>
        <br>
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
                            <input type="text" class="c-input" name="amount" disabled="" value="$70.00">
                            <br>
                            <label for="usr">Payment Method</label>
                            <input type="text" class="c-input" name="pay_method" disabled="" value="PayPal">
                            <input type="hidden" name="pm" value="1">

                        </div>
                        <div class="form-group">
                            <input type="hidden" value="1" name="amount_update">
                        </div>
                    </form>
                    <button class="btn btn-primary" onclick="certify();">Request Payment</button>
                </div></div></div>
    </div>


@endsection
@section('jscript')
    <script type="text/javascript">
    </script>
@endsection
