@extends('btemplate')

@section('content')
    <div class="page-header">
        <div class="page-header-title">
            <h4><?=$info->account_name?></h4>
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
                    <div class="card-header">
                        <h5><?=$info->account_name?></h5>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-xs table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th style="max-width: 5px;">Ref</th>
                                    <th>Amount (Rs.)</th>

                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Ref</th>
                                    <th>Amount (Rs.)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
// style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "
                                    $maxCount    = max(count($debitArr),count($creditArr));
                                    $debitTotal  = 0;
                                    $creditTotal = 0;
                                   for($i = 0; $i <= $maxCount; $i++):

                                ?>
                                <tr>


                                    <?php

                                       // print_r($creditArr);

                                        if( isset($creditArr[$i]) ){

                                            $creditTotal += abs($creditArr[$i]->credit_amount);
                                        ?>
                                        <td><?=Carbon\Carbon::createFromFormat('Y-m-d', $creditArr[$i]->date)->format('d-M-Y')?></td>
                                        <td><?=$creditArr[$i]->ac_title?></td>
                                        <td style="max-width: 5px;" ></td>
                                        <td><?=abs($creditArr[$i]->credit_amount)?></td>
                                    <?php }else{
                                        echo '<td></td><td></td><td></td><td></td>';
                                    } ?>


                                    <?php if( isset($debitArr[$i]) ){
                                        $debitTotal += abs($debitArr[$i]->debit_amount);
                                        ?>
                                        <td><?=Carbon\Carbon::createFromFormat('Y-m-d', $debitArr[$i]->date)->format('d-M-Y')?></td>
                                    <td><?=$debitArr[$i]->ac_title?></td>
                                        <td style="max-width: 5px;" ></td>
                                    <td><?=$debitArr[$i]->debit_amount?></td>
                                    <?php }else{
                                        echo '<td></td><td></td><td></td><td></td>';
                                    } ?>

                                </tr>
                                <?php endfor; ?>

                                {{--<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>--}}


                                <tr>
                                <?php
                                    $bal = 0;



                                    if($debitTotal > $creditTotal){
                                      $bal = $debitTotal-$creditTotal;

                                        echo "<td></td><td>Balance c/d</td><td></td><td>$bal</td>";
                                    }else{
                                        echo "<td></td><td></td><td></td><td></td>";
                                    }


                                    if($creditTotal > $debitTotal){
                                        $bal = $creditTotal-$debitTotal;

                                        echo "<td></td><td> Balance c/d </td><td></td><td>$bal</td>";
                                    }else{
                                        echo "<td></td><td></td><td></td><td></td>";
                                    }

                                    $balance = 0;
                                    $balanceType = '';

                                    if($debitTotal > $creditTotal){
                                        $bal = $debitTotal-$creditTotal;
                                        $creditTotal += $bal;

                                        $balance        = $bal;
                                        $balanceType    = 'debit_balance';

                                    }


                                    if($creditTotal > $debitTotal){
                                        $bal = $creditTotal-$debitTotal;
                                        $debitTotal += $bal;

                                        $balance        = $bal;
                                        $balanceType    = 'credit_balance';

                                    }




                                ?>
                                </tr>

                                <tr style="border-top: 2px; background-color: lightgrey; font-weight: bold;"><td></td><td>Total</td><td></td><td><?=$debitTotal?></td><td></td><td>Total</td><td></td><td><?=$creditTotal?></td></tr>

                                <tr style="font-weight: bold;">
                                <?php



                                    if($balanceType == 'credit_balance'){
                                        echo '<td></td><td>Balance b/d</td><td></td><td>'.$balance.'</td>';
                                    }else{
                                        echo '<td></td><td></td><td></td><td></td>';
                                    }

                                    if($balanceType == 'debit_balance'){
                                        echo '<td></td><td>Balance b/d</td><td></td><td>'.$balance.'</td>';
                                    }else{
                                        echo '<td></td><td></td><td></td><td></td>';
                                    }



                                ?>
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
@endsection