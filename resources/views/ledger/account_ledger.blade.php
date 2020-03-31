@extends('btemplate')
@section('content')
    <div class="page-header">
        <div class="page-header-title">
            <h4><?=$info->account_name?></h4>
            <span>Account Detail</span>
        </div>
        <div class="page-header-breadcrumb"></div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <!-- Extra small table start-->
                <div class="card">
                    <!-- <div class="card-header">
                        <span>Accounts Ledgers</span>
                    </div> -->
                    <div class="card-block">
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
                                    <td style="padding-left:5px; ">
                                        <a href="<?=url('/finance/accounts/detail/' . $row->accountID)?>"> <?=$row->ac_title?> </a>
                                    </td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "><?=$row->debit_amount?></td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "><?=$row->credit_amount?></td>
                                    <td>Edit | Delete</td>
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