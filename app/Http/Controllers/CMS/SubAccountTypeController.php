<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\SubAccountType;
use App\ChartofAccount;
use App\ListofAccount;
use Illuminate\Http\Request;
use DataTables;
use DB;
class SubAccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ChartofAccount $chart_of_account)
    {
        //getCurrentMenuId used from helpers.php
        $menu_id = getCurrentMenuId($request);

        //getFrontEndPermissionsSetup used from helpers.php
        $data = getFrontEndPermissionsSetup($menu_id);
        $data['chart_of_account'] =  $chart_of_account;
        return view('cms.chart_of_account.sub_account_type.sub_account_type', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable($chart_of_account)
    {
        // gets the selects colums only
        // $roles = SubAccountType::select(['id','name', 'status']);
        $roles = SubAccountType::where('chart_of_account_id',$chart_of_account)->select(['id','chart_of_account_id','name', 'status']);

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
            'name' => "required|max:191|unique:mt_sub_accounts_types,name,{$id}"
        ]);

        return response()->json(['success'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ChartofAccount $chart_of_account)
    {
        $data = [
            'isEdit'            => false,
            'chart_of_account'  => $chart_of_account,
        ];

        return view('cms.chart_of_account.sub_account_type.add-sub_account_type', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ChartofAccount $chart_of_account)
    {
        $request->validate([
            'name' => 'required|max:191|unique:mt_sub_accounts_types,name'
        ]);

        $data = $request->all();
        $data['chart_of_account_id'] = $chart_of_account->id;
        SubAccountType::create($data);

        // form helpers.php
        logAction($request);

        return redirect()->route('sub_account_type',[$chart_of_account->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubAccountType  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartofAccount $chart_of_account, SubAccountType $sub_account_type)
    {
        $data = [
            'sub_account_type'  => $sub_account_type,
            'chart_of_account'  => $chart_of_account,
            'isEdit'            => true,
        ];

        return view('cms.chart_of_account.sub_account_type.add-sub_account_type', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubAccountType  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ChartofAccount $chart_of_account, SubAccountType $sub_account_type)
    {
        $request->validate([
            'name' => "required|max:191|unique:mt_sub_accounts_types,name,{$sub_account_type->id}"
        ]);

        $sub_account_type->name = $request->name;
        $sub_account_type->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('sub_account_type',[$chart_of_account->id]);
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

        $item = SubAccountType::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status'] = true;
            $response['message'] = 'User status updated successfully.';
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
        $user = SubAccountType::findOrFail($request->id);
        ListofAccount::where('sub_account_type_id',$request->id)->delete();
        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'Oops Something went Wrong!';
            return response()->json($response, 409);
        } else {
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
