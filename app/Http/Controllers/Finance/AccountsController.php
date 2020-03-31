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

class AccountsController extends Controller{


    function searchAccount(Request $request){
//        $arr = array();
//        $arr[] = array('value'=>'Ahmed', 'label' => 'AS');
//        $arr[] = array('value'=>'Adnan', 'label' => 'AZ');
//        $arr[] = array('value'=>'Qasim', 'label' => 'QS');
//        $arr[] = array('value'=>'Ehsan', 'label' => 'EZ');

        $arr = DB::table('accounts')->select(DB::raw('account_name as value'),DB::raw('account_name as label'))->where('account_name', 'like', $request->get('search').'%')->limit(5)->get();

        return response()->json($arr);

    }

    function ledger(){
        // show all genral tranactions
        $accounts = DB::table('accounts')->get();
        $contacts = DB::table('contacts')->get();
        return view('hamid.accounts', ['accounts'=>$accounts, 'contacts' => $contacts]);
    }

    function trans_add($accountID){
        $accounts = DB::table('accounts')->get();
        $contacts = DB::table('contacts')->get();
        // return view('hamid.app', ['accounts'=>$accounts, 'contacts' => $contacts]);
        return view('hamid.accounts', ['accounts'=>$accounts, 'contacts' => $contacts]);
    }



    function accounts_lists(){
       $contacts = DB::table('contacts')->get();
       $accounts = DB::table('accounts')->select('*', 
       DB::raw('accounts.accountID as aID')
//        DB::raw('sum(IF(amount > 0, amount, null)) AS debit_amount'),
//        DB::raw('sum(IF(amount < 0, amount, null)) AS credit_amount')
        )
       ->leftJoin('line_items', 'accounts.accountID', '=', 'line_items.accountID')
       ->where('accounts.accountID', '>', 0)
       ->groupBy('accounts.accountID')
       ->get();
       return view('finance.accounts_lists', ['accounts'=>$accounts, 'contacts' => $contacts]);
    }

   

    function account_detail($accountID){
      //  $accountInfo = DB::table('accounts')->where('accountID','=',$accountID)->findOrFail();

        $accountInfo = Account::findOrFail($accountID);
        $accounts = DB::table('line_items')->select('*', 
                DB::raw('line_items.accountID as aID'),
                DB::raw('accounts.account_name as ac_title'),
                DB::raw('IF(line_items.amount > 0, line_items.amount, null) AS debit_amount'),
                DB::raw('IF(line_items.amount < 0, line_items.amount, null) AS credit_amount')
            )

            ->join('transactions','transactions.transactionID','=','line_items.transactionID')
            ->join(DB::raw('line_items as c'), 'c.transactionID', '=', 'transactions.transactionID')
            ->join('accounts','accounts.accountID','=','line_items.accountID')
            ->join('accounts as ca','ca.accountID','=','c.accountID')

            ->where('line_items.accountID', '=', $accountID)
            ->orWhere('c.accountID', '=', $accountID)

          //   ->where('c.accountID', '!=', $accountID)
            ->groupBy('line_items.line_itemID')
            ->distinct()

            ->havingRaw('line_items.accountID != ?', [$accountID])

            ->get();

//echo "<pre>";
//        print_r($accounts);
//        echo "</pre>";




      //    echo $accounts; exit;
        return view('finance.account_detail', ['accounts'=>$accounts,'info'=>$accountInfo]);
    }


    // function account_add(){
    //     return view('backend.accounts.add', ['accounts'=>array(),'info'=>array()]);
    // }

    function account_add(){
        return view('finance.add_account');
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'account_name' => 'required|unique:accounts|max:255',
            'account_type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('finance/accounts/add')
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('accounts')->insert(
            ['account_name' => $request->get('account_name'), 'account_desc' =>$request->get('account_desc'), 'account_type' => $request->get('account_type') ]
        );
        //   return redirect()->back()->with('success','Account has been added successfully!');
        return redirect('finance/accounts')->with('success','Account has been added successfully!');
    }

    function edit(Request $request){
        $acID = $request->get('id');
        $account = DB::table('accounts')->where('accountID', '=', $acID)->first();
        if(!($account)){
            abort(404);
        }
        return view('finance.edit_account',array('account' => $account));
    }

    function update(Request $request){
        $acID = $request->get('accountID');
        $validator = Validator::make($request->all(), [
            'account_name' => [
                'required',
                Rule::unique('accounts')->ignore($acID,'accountID'),
            ], //'required|unique:accounts|max:255',
            'account_type' => 'required',
            'accountID' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect('finance/accounts/edit?id='.$acID)
                ->withErrors($validator)
                ->withInput();
        }
        DB::table('accounts')->where('accountID',$request->get('id'))->update(
            ['account_name' => $request->get('account_name'), 'account_desc' =>$request->get('account_desc'), 'account_type' => $request->get('account_type') ]
        );
        //   return redirect()->back()->with('success','Account has been added successfully!');
        return redirect('finance/accounts')->with('success','Account has been updated successfully!');
    }



    function submit_data(Request $request){

        // Contact should be signle and make it common.
        $transID = DB::table('transactions')->insertGetId([
            'date'      => date('Y-m-d'),
            'contactID' => $request->get('contact_id'),
            'memo1'     => $request->get('desc')
        ]);

        //----  TO Account -------//
        $item = DB::table('line_items')->insertGetId([
            'transactionID' => $transID,
            'accountID' => $request->get('to_account_1'),
            'amount' => $request->get('to_amount_1'),
            'memo2' => $request->get('to_desc_1')
        ]);

        if( ($request->get('to_account_2') != '') && ($request->get('to_amount_2') != '')  ){
            $item = DB::table('line_items')->insertGetId([
                'transactionID' => $transID,
                'accountID' => $request->get('to_account_2'),
                'amount' => $request->get('to_amount_2'),
                'memo2' => $request->get('to_desc_2')
            ]);
        }

        //----  FROM Account -------//
        $amount  = (int) -$request->get('from_amount_1');
        $item = DB::table('line_items')->insertGetId([
            'transactionID' =>  $transID,
            'accountID' =>      $request->get('from_account_1'),
            'amount' =>         $amount,
            'memo2' => $request->get('from_desc_1')
        ]);

        if( ($request->get('from_account_2') != '') && ($request->get('from_amount_2') != '')  ){
            $item = DB::table('line_items')->insertGetId([
                'transactionID' => $transID,
                'accountID' => $request->get('from_account_2'),
                'amount' => -$request->get('from_amount_2'),
                'memo2' => $request->get('from_desc_2')
            ]);
        }
    }
}

//
//
//$accounts = DB::table('line_items')->select('*',
//    DB::raw('line_items.accountID as aID'),
//    DB::raw('IF(c.amount > 0, c.amount, null) AS debit_amount'),
//    DB::raw('IF(c.amount < 0, c.amount, null) AS credit_amount')
//)
//    ->join('transactions','transactions.transactionID','=','line_items.transactionID')
//    ->leftJoin(DB::raw('line_items as c'), 'c.transactionID', '=', 'transactions.transactionID')
//    ->join('accounts','accounts.accountID','=','c.accountID')
//    ->where('line_items.accountID', '=', $accountID)
//    ->orWhere('c.accountID', '=', $accountID)
//    ->where('c.accountID', '!=', $accountID)
//    ->groupBy('line_items.line_itemID')
//    ->distinct()
//    ->get();