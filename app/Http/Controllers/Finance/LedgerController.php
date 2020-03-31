<?php
namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use App\Models\Account;

class LedgerController extends Controller{

    function account_ledger($accountID){

        $accountInfo = Account::findOrFail($accountID);
        $accounts    = DB::table('line_items')->select('*',
                DB::raw('line_items.transactionID as tID'),
                DB::raw('line_items.accountID as aID'),
                DB::raw('accounts.account_name as ac_title'),
                DB::raw('IF(line_items.type = "d", line_items.amount, null) AS debit_amount'),
                DB::raw('IF(line_items.type = "c", line_items.amount, null) AS credit_amount'),
                DB::raw('(SELECT GROUP_CONCAT(accounts.account_name)  FROM line_items
                 JOIN accounts ON line_items.accountID = accounts.accountID  WHERE line_items.type = "d" AND 
                 transactionID = tID AND line_items.accountID != '.$accountID.' ) as debit_accounts'),
                DB::raw("(SELECT GROUP_CONCAT(accounts.account_name)  FROM line_items
                  JOIN accounts ON line_items.accountID = accounts.accountID  
                  WHERE line_items.type = 'c' and transactionID = tID AND line_items.accountID != $accountID) as credit_accounts")
                )
            ->join('transactions','transactions.transactionID','=','line_items.transactionID')
            ->join(DB::raw('line_items as c'), 'c.transactionID', '=', 'transactions.transactionID')
            ->join('accounts','accounts.accountID','=','line_items.accountID')
            ->join('accounts as ca','ca.accountID','=','c.accountID')
            ->where('line_items.accountID', '=', $accountID)
            ->orWhere('c.accountID', '=', $accountID)
            ->groupBy('transactions.transactionID')
            ->orderBy('transactions.transactionID')
            ->get();


      //  dd($accounts);


            $debitArr   = array();
            $creditArr  = array();
            foreach($accounts as $row):
                if($row->debit_amount){
                    $debitArr[] = $row;
                }
                if($row->credit_amount){
                    $creditArr[] = $row;
                }
            endforeach;
        return view('ledger.account_ledger_new', ['debitArr' => $debitArr, 'creditArr' => $creditArr ,'accounts'=>$accounts,'info'=>$accountInfo]);



    }
}