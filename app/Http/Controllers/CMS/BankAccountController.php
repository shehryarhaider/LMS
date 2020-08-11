<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\BankAccount;
use App\SubAccountType;
use App\ListofAccount;
use Illuminate\Http\Request;
use DataTables;
use DB;
class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //getCurrentMenuId used from helpers.php
        $menu_id = getCurrentMenuId($request);

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        return view('cms.bank_account.bank_account', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        // $roles = BankAccount::select(['id','name', 'status']);
        $roles = DB::table('bank_accounts')->select(['id','bank_type_id','account_code','account_name','account_title','contact_person','telephone','mobile','email','address','remarks','website','fax', 'status']);

        return DataTables::of($roles)->make();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.bank_account.add-bank_account', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_code' => "required|max:50",
        ]);

        BankAccount::create($request->except('_token'));

        // form helpers.php
        logAction($request);

        return redirect()->route('bank_account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankAccount  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bank_account)
    {
        $data = [
            'bank_account' => $bank_account,
            'isEdit' => true,
        ];

        return view('cms.bank_account.add-bank_account', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankAccount  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BankAccount $bank_account)
    {
        $request->validate([
            'account_code' => "required|max:50|unique:bank_accounts,account_code,{$bank_account->id}"
        ]);

        $bank_account->name = $request->name;
        $bank_account->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('bank_account');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        $response['status'] = false;
        $response['message'] = 'Oops! Something went wrong.';

        $id = $request->input('id');
        $status = $request->input('status');

        $item = BankAccount::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status'] = true;
            $response['message'] = 'Bank Account status updated successfully.';
            return response()->json($response, 200);
        }

        return response()->json($response, 409);
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $bank_account = BankAccount::findOrFail($request->id);
        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'Oops Something went wrong.';
            return response()->json($response, 409);
        } else {
            $response = $bank_account->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
