<?php
namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;

use App\Models\Account;
use App\ProBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use Illuminate\Validation;
use Validator;
use File;
use Response;
use Storage;
use Image;
use App\Models\LineItem;
use Auth;
use DB;
use Carbon\Carbon;

// use App\Http\Controllers\Finance\TrialBalanceController;

class TransactionController extends Controller{

    function trans_add(){
        $accounts = DB::table('accounts')->get();
        $contacts = DB::table('contacts')->get();
        return view('transactions.add', ['accounts'=>$accounts, 'contacts' => $contacts] );
    }

    // trans_edit
    function trans_edit($id){
        $accounts      = DB::table('accounts')->get();
        $transObj      = DB::table('transactions')->where('transactionID',$id)->first();
        $debit         = DB::table('line_items')->join('accounts', 'accounts.accountID', '=', 'line_items.accountID')->where('transactionID',$id)->where('type','=','d')->get();
        // print_r($debit); exit;
        $credit        = DB::table('line_items')->join('accounts', 'accounts.accountID', '=', 'line_items.accountID')->where('transactionID',$id)->where('type','=','c')->get();
        return view('transactions.edit', ['transObj'=>$transObj, 'debitArr' => $debit, 'creditArr' => $credit ,'accounts' => $accounts] );
    }

    function trans_delete($id){
        DB::table('line_items')->where('transactionID', '=',$id )->delete();
        DB::table('transactions')->where('transactionID', '=',$id )->delete();
        return response()->json(array('status' => true, 'data' => array(), 'message' => 'Transactions Deleted!'));
    }

    function trans_update(Request $request){
        $transID               = $request->get('tid');
        $transArr['contactID'] = $request->get('contact_id');
        $transArr['memo1']     = $request->get('desc');
        $transArr['date']      = $request->get('date');
        DB::table('transactions')
            ->where('transactionID',$transID)
            ->update($transArr);
        DB::table('line_items')->where('transactionID', '=', $transID)->delete();


        $debitAc  = $request->get('debit_account');
        $creditAc = $request->get('credit_account');

        $debitAmount  = $request->get('debit_amount');
        $creditAmount = $request->get('credit_amount');

        $debitDesc  = $request->get('debit_desc');
        $creditDesc = $request->get('credit_desc');

//      $max = max(count($debitAc),count($creditAc));

        $accountsArr = array();

        $dc = 0;
        foreach ($debitAc as $ac):
            $accountInfo = Account::firstOrCreate(['account_name' => ucfirst($ac)]);
            LineItem::create(['accountID' => $accountInfo->accountID, 'memo2' => $debitDesc[$dc], 'transactionID' => $transID ,'type' => 'd', 'amount' => $debitAmount[$dc]]);
            $dc++;
            $accountsArr[] = $accountInfo->accountID;
        endforeach;

        $dc = 0;
        foreach ($creditAc as $ac):
            $accountInfo = Account::firstOrCreate(['account_name' => ucfirst($ac)]);
            LineItem::create(['accountID' => $accountInfo->accountID, 'memo2' => $creditDesc[$dc], 'transactionID' => $transID  ,'type' => 'c', 'amount' => $creditAmount[$dc]]);
            $dc++;
            $accountsArr[] = $accountInfo->accountID;
        endforeach;


        foreach ($accountsArr as $acID):
            Account::calculateTrailBalance($acID);
        endforeach;

        $res = array('status'=>true, 'message'=> 'Transaction updated successfully!', 'data' => array() );
        return response()->json($res);


        /*
        //----  TO Account -------//
        DB::table('line_items')->insertGetId([
            'transactionID' => $transID,
            'accountID' => $request->get('to_account_1'),
            'amount' => $request->get('to_amount_1'),
            'memo2' => $request->get('to_desc_1')
        ]);
        //----  FROM Account -------//
        $amount  = (int) -$request->get('from_amount_1');
        DB::table('line_items')->insertGetId([
            'transactionID' =>  $transID,
            'accountID' =>      $request->get('from_account_1'),
            'amount' =>         $amount,
            'memo2' => $request->get('from_desc_1')
        ]);
        return response()->json(['status'=>true, 'data' => [] ]);
        */
    }



    function journal_view(){
        $accounts = DB::table('line_items')->select('*',
                DB::raw('line_items.accountID as aID'),
                DB::raw('accounts.account_name as ac_title'),
                DB::raw('count(line_items.transactionID) as t_counts'),
                DB::raw('IF(line_items.type = "d", line_items.amount, null) AS debit_amount'),
                DB::raw('IF(line_items.type = "c", line_items.amount, null) AS credit_amount')
               //  DB::raw('count() as total_line_item')
            )->join('transactions','transactions.transactionID','=','line_items.transactionID')
            ->join(DB::raw('line_items as c'), 'c.transactionID', '=', 'transactions.transactionID')
            ->join('accounts','accounts.accountID','=','line_items.accountID')
            ->join('accounts as ca','ca.accountID','=','c.accountID')
            ->groupBy('line_items.line_itemID')
            ->distinct()
            ->orderBy('date','desc')
            ->simplePaginate(50);
        //   dd($accounts);
        return view('finance.journal_view', ['accounts'=>$accounts]);
    }


    function add_or_update($accountName){
        Account::firstOrCreate($accountName);
    }


    function submit_data(Request $request){

        $transID = DB::table('transactions')->insertGetId([
            'date'      => $request->get('date'),
            'contactID' => $request->get('contact_id'),
            'memo1'     => $request->get('desc')
        ]);

        $debitAc  = $request->get('debit_account');
        $creditAc = $request->get('credit_account');

        $debitAmount  = $request->get('debit_amount');
        $creditAmount = $request->get('credit_amount');

        $debitDesc  = $request->get('debit_desc');
        $creditDesc = $request->get('credit_desc');

//      $max = max(count($debitAc),count($creditAc));


        $accountsArr = array();

        $dc = 0;
        foreach ($debitAc as $ac):
            $accountInfo = Account::firstOrCreate(['account_name' => ucfirst($ac)]);
            LineItem::create(['accountID' => $accountInfo->accountID, 'memo2' => $debitDesc[$dc], 'transactionID' => $transID ,'type' => 'd', 'amount' => $debitAmount[$dc]]);
            $dc++;
            $accountsArr[] = $accountInfo->accountID;
        endforeach;

        $dc = 0;
        foreach ($creditAc as $ac):
            $accountInfo = Account::firstOrCreate(['account_name' => ucfirst($ac)]);
            LineItem::create(['accountID' => $accountInfo->accountID, 'memo2' => $creditDesc[$dc], 'transactionID' => $transID  ,'type' => 'c', 'amount' => $creditAmount[$dc]]);
            $dc++;
            $accountsArr[] = $accountInfo->accountID;
        endforeach;


        foreach ($accountsArr as $acID):
            Account::calculateTrailBalance($acID);
        endforeach;


        $res = array('status'=>true, 'message'=> 'Transaction added successfully!', 'data' => array() );
        return response()->json($res);
    }






}
