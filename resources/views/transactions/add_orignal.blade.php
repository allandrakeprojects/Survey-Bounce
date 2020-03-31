@extends('btemplate')

@section('content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>Add the transaction</h4>
            <span>Account Detail</span>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Pages</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-md-12">


                <!-- Extra small table start-->
                <div class="card">


                    <form id="transaction_form">
                        @csrf


                        <div class="row">


                            <div class="col-md-8 to-info">
                                <label for="exampleFormControlSelect1">Description</label>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>

                        </div>


                        <div class="row">


                            <div class="col-md-4"> <!-- to account -->
                                <div class="account-to">

                                    <h6>Account To</h6>
                                    <div class="col-md-12 to-info">
                                        <label for="exampleFormControlSelect1">1.</label>
                                        <div class="form-group">
                                            <select class="form-control" name="to_account_1">
                                                <option value="" disable="true">Select Account</option>
                                                <?php foreach($accounts as $ac): ?>
                                                <option value="<?=$ac->accountID?>"><?=$ac->account_name?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <input type="input" class="form-control" placeholder="Amount 1"
                                                   name="to_amount_1">
                                        </div>
                                    </div>

                                    <div class="col-md-12 to-info">
                                        <label for="exampleFormControlSelect1">2.</label>
                                        <div class="form-group">
                                            <select class="form-control" name="to_account_2">
                                                <option value="" disable="true">Select Account</option>
                                                <?php foreach($accounts as $ac): ?>
                                                <option value="<?=$ac->accountID?>"><?=$ac->account_name?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <input type="input" class="form-control" placeholder="Amount 2"
                                                   name="to_amount_2">
                                        </div>
                                    </div>


                                </div> <!-- account to end -->
                            </div> <!-- to account end -->


                            <!-------------------------------------------------------------------------->
                            <!-------------------------------------------------------------------------->
                            <!-------------------------------------------------------------------------->


                            <div class="col-md-4"> <!-- from account -->
                                <h6>Account From</h6>
                                <div class="account-from">
                                    <div class="col-md-12 to-info">
                                        <label for="exampleFormControlSelect1">1.</label>
                                        <div class="form-group">
                                            <select name="from_account_1" class="form-control">
                                                <option value="" disable="true">Select Account</option>
                                                <?php foreach($accounts as $ac): ?>
                                                <option value="<?=$ac->accountID?>"><?=$ac->account_name?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <input type="input" class="form-control" placeholder="Amount 1"
                                                   name="from_amount_1">
                                        </div>
                                    </div>

                                    <div class="col-md-12 to-info">
                                        <label for="exampleFormControlSelect1">2.</label>
                                        <div class="form-group">
                                            <select onchange="get_enrollment_stats(this.value)" class="form-control"
                                                    id="atten_session_id">
                                                <option value="" disable="true">Select Account</option>
                                                <?php foreach($accounts as $ac): ?>
                                                <option value="<?=$ac->accountID?>"><?=$ac->account_name?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <input type="input" class="form-control" placeholder="Amount 2"
                                                   name="from_amount_2">
                                        </div>
                                    </div>


                                </div> <!-- account to end -->
                            </div> <!-- from account end -->


                        </div>


                        <div class="row" style="height:100px;">
                            <div class="col-md-12" allign="center">
                                <label for="exampleFormControlSelect1">.</label>
                                <button onclick="submit_data();" type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                    </form>


                </div><!-- card div end -->


            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script type="text/javascript">
        $("#myModal").on('show.bs.modal', function () {
            //$(this).addClass("vis-hidden");
        });
        $("#myModal").on('shown.bs.modal', function () {
            //$(this).css({"top":(($(window).height() - $(this).height()) / 2 )+"px"}).removeClass("vis-hidden");
        });


        function submit_data(e) {
            var fdata = $('#transaction_form').serialize();
            // console.log(fdata); return false;
            $.ajax({
                method: "POST",
                data: fdata,
                url: "{{ url('finance/transaction/save') }}"
            }).done(function (res) {
                console.log(res);

                if (res.status) {
                    window.location = '{{url('/finance/accounts')}}';
                }
            });
        }
    </script>
@endsection