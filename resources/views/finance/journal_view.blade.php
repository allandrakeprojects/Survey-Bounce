@extends('btemplate')

@section('content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>Journal</h4>
            <span>Account Detail</span>
        </div>
        <div class="page-header-breadcrumb">
        </div>
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
                                {{--table table-xs table-bordered--}}
                                <thead>

                                {{--colspan="2"--}}
                                <tr>
                                    <th>Date</th>
                                    <th>Account Title and Explanations</th>
                                    <th>Debit Amount</th>
                                    <th class="credit_amount">Credit Amount</th>
                                    <th style="width:5%">Actions</th>
                                </tr>


                                </thead>
                                <tbody>
                                <?php
                                $tid = '';
                                $count = 0;
                                foreach($accounts as $row):
                                        $count++;
                                if (($tid != '') && ($row->transactionID != $tid)) {
                                    echo "<tr class='.$row->transactionID.' style='border-bottom-color: black; border-bottom-style: groove;' ><td></td><td colspan='3' >" . $accounts[$count-2]->memo1 . "</td><td></td></tr>";
                                }
                                ?>
                                <tr class="<?=$row->transactionID?>" style="border-bottom-color: white;" >
                                    <?php if($row->transactionID != $tid){ ?>
                                        <td rowspan="<?=$row->t_counts?>" ><?=($row->date)? Carbon\Carbon::createFromFormat('Y-m-d', $row->date)->format('d-M-Y'):''?></td>
                                    <?php }else{ ?>

                                    <?php } ?>

                                    <td style="padding-left:5px; ">
                                        <a href="<?=url('/finance/ledger/' . $row->accountID)?>"> <?=$row->ac_title?> </a>
                                    </td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "><?=$row->debit_amount?></td>
                                    <td style="width:15px; text-align:right; font-weight: bold; padding-right:5px; "><?=($row->credit_amount) ? $row->credit_amount : ''?></td>
                                    <?php if($row->transactionID != $tid){ ?>
                                        <td rowspan="<?=$row->t_counts?>" >
                                            <a href="{{ url('/finance/transaction/edit/'.$row->transactionID) }}"> Edit </a>
                                            |
                                            <a href="javascript:void(0);" onclick="trans_delete(<?=$row->transactionID?>);"> Delete </a>
                                        </td>
                                     <?php }else{ ?>

                                    <?php } ?>

                                </tr>
                                <?php
                                $tid = $row->transactionID;
                                if(count($accounts) == $count){
                                    echo '<tr class="'.$row->transactionID.'" style="border-bottom-color: black;" ><td></td><td colspan="3" >'. $accounts[$count-2]->memo1 . '</td><td></td></tr>';
                                }
                                endforeach;
                                ?>
                                </tbody>
                            </table>

                            {{ $accounts->links() }}
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

        ///finance/transaction/delete/{id}

        function trans_delete(id) {

            if (confirm('Are you sure you want to delete this ?')) {
                // Save it!
                $.ajax({
                    method: "GET",
                    url: "{{ url('finance/transaction/delete/') }}/"+id
                }).done(function (res) {
                    console.log(res);
                    alert(res.message);
                    if (res.status) {

                        $('.'+id).hide();

                        // window.location = '{{url('/finance/transaction/add')}}';
                    }
                });
            } else {
                // Do nothing!
            }


        }



    </script>
@endsection