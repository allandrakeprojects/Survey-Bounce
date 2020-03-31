<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;

use App\ProBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use Illuminate\Validation;
use Validator;
use File;
use Response;
use Storage;
use Image;
use App\Media;
use Auth;
use DB;
use App\Models\Account;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class TrialBalanceController extends Controller{


    function trial_balance(){

        $accounts = DB::table('accounts')->get();
        return view('trial_balance.accounts_lists', ['accounts'=>$accounts]);
    }


    function account_list(){

        $accounts = DB::table('line_items')->select('*',
            DB::raw('line_items.accountID as aID'),
            DB::raw('accounts.account_name as ac_title'),
            DB::raw('IF(line_items.amount > 0, line_items.amount, null) AS debit_amount'),
            DB::raw('IF(line_items.amount < 0, line_items.amount, null) AS credit_amount')
        )->join('transactions','transactions.transactionID','=','line_items.transactionID')
            ->join(DB::raw('line_items as c'), 'c.transactionID', '=', 'transactions.transactionID')
            ->join('accounts','accounts.accountID','=','line_items.accountID')
            ->join('accounts as ca','ca.accountID','=','c.accountID')
            ->groupBy('line_items.line_itemID')
            ->distinct()
            ->orderBy('date','desc')
            ->simplePaginate(50);
        return view('finance.journal_view', ['accounts'=>$accounts]);
    }



    function update_account_balance($accountID){


        Account::calculateTrailBalance($accountID);


        ////////// start from here
        $res = DB::table('accounts')->where('accountID', $accountID)->first();

        $ac_total = DB::table('accounts')->select(
            DB::raw('sum(debit_balance) as debit_total'),
            DB::raw('sum(credit_balance) as credit_total')
        )->first(); //->merge($res);
        $res->all_debit_total  = $ac_total->debit_total;
        $res->all_credit_total = $ac_total->credit_total;
        return response()->json(array('status' => true, 'data' => $res));

    }











    function old_update_account_balance_old($accountID){
       // echo ""; exit;
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

////////// start from here
        $res = DB::table('accounts')->where('accountID', $accountID)->first();


        $ac_total = DB::table('accounts')->select(
            DB::raw('sum(debit_balance) as debit_total'),
            DB::raw('sum(credit_balance) as credit_total')
        )->first(); //->merge($res);

         // print_r($ac_total); exit;

        $res->all_debit_total  = $ac_total->debit_total;
        $res->all_credit_total = $ac_total->credit_total;
        return response()->json(array('status' => true, 'data' => $res));

    }








}