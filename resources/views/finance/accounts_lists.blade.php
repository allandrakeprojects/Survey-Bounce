@extends('btemplate')
@section('content')
    <style>
.ac_title_link:hover, .ac_title_link{color: black;}

    </style>
    <div class="page-body">
        <div class="row">
            <div class="col-md-12">

                <small><?php //($row->updated_at)?'Last Update : '.Carbon\Carbon::parse($row->updated_at)->format('h:m a d-M-Y'):'' ?></small>
                <!-- Extra small table start-->
                <div class="card">
                    <div class="card-header">

                        <h5>Accounts Ledgers & Trial Balance</h5>

                        <span></span>
                        <div class="card-header-right">
                            <a href="{{ url('finance/accounts/add') }}" class="btn btn-primary m-b-0 m-r-10"><i
                                        class="icofont icofont-plus"></i> Add Account</a>

                        </div>

                    </div>


                    <div class="card-block">


                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif


                        <div class="table-responsive">
                            <table class="table table-xs table-bordered">
                                <thead>
                                <tr>
                                    <th width="1">A-ID</th>
                                    <th>Account</th>
                                    <th rowspan="2" >Debit Amount</th>
                                    <th rowspan="2" class="credit_amount">Credit Amount</th>
                                    <th style="width:5%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($accounts as $row): ?>
                                <tr>
                                    <td><?=$row->aID?></td>
                                    <td scope="row" class="ac_title" style="padding-left:5px; color: black; font-weight: bold; ">
                                        <a href="{{ url('finance/ledger/'.$row->accountID) }}" class="ac_title_link trial_update" data-account-id="<?=$row->aID?>" ><?=$row->account_name?> </a>
                                        <br>
                                    </td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; " id="deb_<?=$row->aID?>"><?=$row->debit_balance?></td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; " id="cre_<?=$row->aID?>"><?=$row->credit_balance?></td>
                                    <td>
                                        <a href="{{ url('finance/accounts/edit?id='.$row->accountID) }}">Edit</a> |
                                        <a href="{{ url('finance/ledger/'.$row->accountID) }}"  >Ledger</a>
                                     <!--   <a href="javascript:void(0);"  onclick="update_balance_by_accountID(<?=$row->aID?>);">Update Balance</a> -->
                                    </td>
                                </tr>
                                <?php endforeach; ?>


                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td id="debit_total" style="width:15px; text-align:right; font-weight: bold; padding-right:5px; " ></td>
                                    <td id="credit_total" style="width:15px; text-align:right; font-weight: bold; padding-right:5px; " ></td>
                                    <td></td>
                                </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Extra small table start-->


            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>
        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
                // clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();





        function update_balance_by_accountID(ac_id){
            console.log('request send for id',ac_id);
            $.ajax({
                method: "GET",
                url:    '<?=url('update_account_balance/')?>/'+ac_id
            }).done(function (res) {
                if(res.status){
                    console.log('debit side',res.data.debit_balance);
                    $('#deb_'+ac_id).html(res.data.debit_balance);
                    $('#cre_'+ac_id).html(res.data.credit_balance);

                    $('#debit_total').html(res.data.all_debit_total);
                    $('#credit_total').html(res.data.all_credit_total);

                }
            }).fail(function( res ) {
                console.log(res);
            });
        }


        function update_all_account_balance(){
            $('.trial_update').each(function (index,ele) {
                var id = $(ele).attr('data-account-id');
                delay(function(){
                    update_balance_by_accountID(id);
                }, 1000 );
            });
        }

        $(document).ready(function () {
            update_all_account_balance();
        });

    </script>
@endsection