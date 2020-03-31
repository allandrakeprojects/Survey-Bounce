<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Account extends Model
{
    protected $primaryKey = 'accountID';
    protected $fillable = ['account_name', 'account_desc', 'account_type', 'account_type', 'credit_balance'];



    static function calculateTrailBalance($accountID){
        $accountInfo = Account::findOrFail($accountID);

        $accounts = DB::table('line_items')->select('*',
            DB::raw('line_items.accountID as aID'),
            DB::raw('accounts.account_name as ac_title'),
            DB::raw('IF(line_items.type = "d", line_items.amount, null) AS debit_amount'),
            DB::raw('IF(line_items.type = "c", line_items.amount, null) AS credit_amount')
        )
            ->join('transactions','transactions.transactionID','=','line_items.transactionID')
            ->join(DB::raw('line_items as c'), 'c.transactionID', '=', 'transactions.transactionID')
            ->join('accounts','accounts.accountID','=','line_items.accountID')
            ->join('accounts as ca','ca.accountID','=','c.accountID')

            ->where('line_items.accountID', '=', $accountID)
            ->orWhere('c.accountID', '=', $accountID)
            ->groupBy('line_items.line_itemID')
            ->distinct()
            ->havingRaw('line_items.accountID != ?', [$accountID])
            ->orderBy('transactions.transactionID')
            ->get();



        $debitArr   = array();
        $creditArr  = array();

        $debitTotal  = 0;
        $creditTotal = 0;

        foreach($accounts as $row):
            if($row->debit_amount){
                $debitArr[] = $row;
                $debitTotal += abs($row->debit_amount);
            }else{
                $creditArr[] = $row;
                $creditTotal += abs($row->credit_amount);
            }
        endforeach;

        $debit_bal  = 0;
        $credit_bal = 0;

        if($debitTotal > $creditTotal){
            // if debit is great then credit then it show credit side of trail balance
            $credit_bal = $debitTotal-$creditTotal;
            // echo "credit bal : ".$bal;
        }

        if($creditTotal > $debitTotal){
            // if credit is great then debit then it show debit side of trail balance
            $debit_bal = $creditTotal-$debitTotal;
            // echo "debit bal : ".$bal;
        }

        $updateArr = ['debit_balance' => $debit_bal, 'credit_balance' => $credit_bal,'updated_at' => Carbon::now()->toDateTimeString()];
        DB::table('accounts')->where('accountID', $accountID)->update($updateArr);
    }



}