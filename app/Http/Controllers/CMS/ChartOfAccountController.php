<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\ChartofAccount;
use Illuminate\Http\Request;
use DataTables;
use DB;
class ChartOfAccountController extends Controller
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

        return view('cms.chart_of_account.chart_of_account', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        // $roles = ChartOfAccount::select(['id','name', 'status']);
        $roles = DB::table('mt_chart_of_accounts')->select(['id','name', 'status']);

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
            'name' => "required|max:191|unique:mt_chart_of_accounts,name,{$id}"
        ]);

        return response()->json(['success'], 200);
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

        return view('cms.chart_of_account.add-chart_of_account', $data);
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
            'name' => 'required|max:191|unique:mt_chart_of_accounts,name'
        ]);

        ChartofAccount::create($request->except('_token'));

        // form helpers.php
        logAction($request);

        return redirect()->route('chart_of_account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChartofAccount  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartOfAccount $chart_of_account)
    {
        $data = [
            'chart_of_account' => $chart_of_account,
            'isEdit' => true,
        ];

        return view('cms.chart_of_account.add-chart_of_account', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChartofAccount  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ChartOfAccount $chart_of_account)
    {
        $request->validate([
            'name' => "required|max:191|unique:mt_chart_of_accounts,name,{$chart_of_account->id}"
        ]);

        $chart_of_account->name = $request->name;
        $chart_of_account->save();

        // form helpers.php
        logAction($request);

        return redirect()->route('chart_of_account');
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

        $item = ChartOfAccount::find($id);

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
        $user = ChartOfAccount::findOrFail($request->id);

        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'This Chart Of Account has something assigned to it.';
            return response()->json($response, 409);
        } else {
            $response = $user->delete();

            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
