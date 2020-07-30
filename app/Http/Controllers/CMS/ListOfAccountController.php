<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\ListofAccount;
use App\ChartOfAccount;
use App\SubAccountType;
use Illuminate\Http\Request;
use DataTables;
use DB;
class ListofAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,ChartOfAccount $chart_of_account ,SubAccountType $sub_account_type)
    {
        //getCurrentMenuId used from helpers.php
        $menu_id = getCurrentMenuId($request);

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);

        $data['sub_account_type'] = $sub_account_type;
        $data['chart_of_account'] = $chart_of_account;

        return view('cms.chart_of_account.list_of_accounts.list_of_accounts', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable($chart_of_account,$sub_account_type)
    {
        // gets the selects colums only
        // $roles = ListofAccount::select(['id','name', 'status']);
        $roles = ListofAccount::with('subAccountType')->where('sub_account_type_id',$sub_account_type)->select(['id','sub_account_type_id','name', 'status']);

        return DataTables::of($roles)->make();
    }

    /**
     * the ajax validator for this controller
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function validater(Request $request, $id)
    {
        $request->validate([
            'name' => "required|max:191|unique:list_of_accounts,name,{$id}"
        ]);

        return response()->json(['success'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ChartOfAccount $chart_of_account ,SubAccountType $sub_account_type)
    {
        $data = [
            'isEdit'            => false,
            'sub_account_type'  => $sub_account_type,
            'chart_of_account'  => $chart_of_account,
        ];

        return view('cms.chart_of_account.list_of_accounts.add-list_of_accounts', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ChartOfAccount $chart_of_account ,SubAccountType $sub_account_type)
    {
        $request->validate([
            'name' => 'required|max:191|unique:list_of_accounts,name'
        ]);

        $data = $request->all();
        $data['sub_account_type_id'] = $sub_account_type->id;
        ListofAccount::create($data);

        // form helpers.php
        logAction($request);

        return redirect()->route('list_of_account',[$chart_of_account->id,$sub_account_type->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubAccountType  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartOfAccount $chart_of_account ,SubAccountType $sub_account_type, ListofAccount $list_of_account)
    {
        $data = [
            'isEdit'            => true,
            'sub_account_type'  => $sub_account_type,
            'chart_of_account'  => $chart_of_account,
            'list_of_account'   => $list_of_account,
        ];

        return view('cms.chart_of_account.list_of_accounts.add-list_of_accounts', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubAccountType  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ChartOfAccount $chart_of_account ,SubAccountType $sub_account_type, ListofAccount $list_of_account)
    {
        $request->validate([
            'name' => "required|max:191|unique:list_of_accounts,name,{$list_of_account->id}"
        ]);

        $list_of_account->name                  = $request->name;
        $list_of_account->sub_account_type_id   = $sub_account_type->id;
        $list_of_account->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('list_of_account',[$chart_of_account->id,$sub_account_type->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request,$chart_of_account,$sub_account_type)
    {
        $response['status'] = false;
        $response['message'] = 'Oops! Something went wrong.';

        $id = $request->input('id');
        $status = $request->input('status');

        $item = ListofAccount::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status'] = true;
            $response['message'] = 'List of Account Status updated successfully.';
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
    public function destroy(Request $request,$chart_of_account,$sub_account_type)
    {
        $list_of_account = ListofAccount::find($request->id);

        // apply your conditional check here
        if ($list_of_account->delete()) {
            // form helpers.php
            logAction($request);

            $response['success'] = 'List of Account Deleted Successfully!';
            return response()->json($response, 200);
        }
        $response['error'] = 'Oops something went wrong';
        return response()->json($response, 409);
    }
}
