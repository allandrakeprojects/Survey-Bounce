@extends('btemplate')
@section('content')
    <div class="page-body"><div class="row"><div class="col-md-12">


                <!-- Extra small table start-->
                <div class="card">
                    <div class="card-header">
                        <h5><?=$info->account_name?> | <a href="<?=url('finance/accounts/detail/' . $info->accountID)?>"> Detail </a> </h5>
                    </div>

                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-xs table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount (Rs.)</th>

                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount (Rs.)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $maxCount    = max(count($debitArr),count($creditArr));
                                    $debitTotal  = 0;
                                    $creditTotal = 0;
                                   for($i = 0; $i < $maxCount; $i++):
                                ?>
                                <tr>



                                    <?php if( isset($debitArr[$i]) ){
                                    $debitTotal += abs($debitArr[$i]->debit_amount);
                                    ?>
                                    <td><?=($debitArr[$i]->date)?Carbon\Carbon::createFromFormat('Y-m-d', $debitArr[$i]->date)->format('d-M-Y'):''?></td>


                                    <td><?php
                                        if($debitArr[$i]->credit_accounts){
                                            $acs = explode(',',$debitArr[$i]->credit_accounts);
                                            echo $acs[0].' & Other '.count($acs).' accounts';
                                        }
                                        ?></td>
                                    <td><?=$debitArr[$i]->debit_amount?></td>
                                    <?php }else{
                                        echo '<td></td><td></td><td></td>';
                                    } ?>





                                    <?php
                                        if( isset($creditArr[$i]) ){
                                            $creditTotal += abs($creditArr[$i]->credit_amount);
                                        ?>
                                        <td><?=($creditArr[$i]->date)?Carbon\Carbon::createFromFormat('Y-m-d', $creditArr[$i]->date)->format('d-M-Y'):''?></td>
                                        <td>
                                            <?php
                                                if($creditArr[$i]->debit_accounts){
                                                    $acs = explode(',',$creditArr[$i]->debit_accounts);
                                                    echo $acs[0].' & other '.count($acs).' accounts';
                                                }

                                            ?></td>
                                        <td><?=abs($creditArr[$i]->credit_amount)?></td>
                                    <?php }else{
                                        echo '<td></td><td></td><td></td>';
                                    } ?>




                                </tr>
                                <?php endfor; ?>




                                <tr>
                                <?php
                                    $bal = 0;


                                    if($creditTotal > $debitTotal){
                                        $bal = $creditTotal-$debitTotal;
                                        echo "<td></td><td> Balance c/d </td><td>$bal</td>";
                                    }else{
                                        echo "<td></td><td></td><td></td>";
                                    }


                                    if($debitTotal > $creditTotal){
                                        $bal = $debitTotal-$creditTotal;
                                        echo "<td></td><td>Balance c/d</td><td>$bal</td>";
                                    }else{
                                        echo "<td></td><td></td><td></td>";
                                    }




                                    $balance = 0;
                                    $balanceType = '';


                                    if($creditTotal > $debitTotal){
                                        $bal = $creditTotal-$debitTotal;
                                        $debitTotal += $bal;

                                        $balance        = $bal;
                                        $balanceType    = 'credit_balance';

                                    }



                                    if($debitTotal > $creditTotal){
                                        $bal = $debitTotal-$creditTotal;
                                        $creditTotal += $bal;

                                        $balance        = $bal;
                                        $balanceType    = 'debit_balance';

                                    }







                                ?>
                                </tr>

                                <tr style="border-top: 2px; background-color: lightgrey; font-weight: bold;"><td colspan="2" >Total</td><td><?=$creditTotal?></td><td colspan="2">Total</td><td><?=$debitTotal?></td></tr>

                                <tr style="font-weight: bold;">
                                <?php


                                    if($balanceType == 'debit_balance'){
                                        // this will be show in credit side of debit balance
                                        echo '<td colspan="2" >Balance b/d</td><td>'.$balance.'</td>';
                                    }else{
                                        echo '<td colspan="3" ></td>';
                                    }



                                    if($balanceType == 'credit_balance'){
                                        // this will show in debit side of trial balance
                                        echo '<td colspan="2" >Balance b/d</td><td>'.$balance.'</td>';
                                    }else{
                                        echo '<td colspan="3" ></td>';
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