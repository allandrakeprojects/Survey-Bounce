@extends('btemplate')

@section('content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>Accounts Lists</h4>
        </div>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-md-12">


                <!-- Extra small table start-->
                <div class="card">
                    <div class="card-header">

                        <span>Accounts Ledgers</span>
                        <span></span>
                        <div class="card-header-right">
                            <a href="{{ url('finance/accounts/add') }}" class="btn btn-primary m-b-0 m-r-10">
                                <i class="icofont icofont-plus"></i>
                                Add Account</a>
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
                                    <th>Account</th>
                                    <th>Debit Amount</th>
                                    <th class="credit_amount">Credit Amount</th>
                                    <th style="width:5%">Actions</th>
                                </tr>


                                </thead>
                                <tbody>

                                <?php foreach($accounts as $row): ?>
                                <tr>
                                    <td scope="row" style="padding-left:5px; ">
                                        <a href="<?=url('finance/accounts/detail/' . $row->accountID)?>"><?=$row->account_name?> </a>
                                    </td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "><?=$row->debit_balance?></td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "><?=$row->credit_balance?></td>
                                    <td><a href="{{ url('finance/accounts/edit?id='.$row->accountID) }}">Edit</a> |
                                        Delete
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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
@endsection