<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Http\Request;
use DataTables;
use DB;
class VendorController extends Controller
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

        return view('cms.vendors.vendors', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        // gets the selects colums only
        // $roles = Customer::select(['id','name', 'status']);
        $roles = DB::table('customers')->where('type',1)->select(['id','field_type','account_name','contact_person','telephone','mobile','cnic','email','region','sub_region','address','credit_limit','credit_terms','remarks','st_reg_no','website','fax', 'status']);

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

        return view('cms.vendors.add-vendor', $data);
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
            'account_name'      => 'required',
            'contact_person'    => 'max:11',
            'telephone'         => 'max:11',
            'mobile'            => 'max:11',
            'cnic'              => 'max:11',
            'credit_limit'      => 'max:11',
        ]);

        Customer::create($request->except('_token'));

        // form helpers.php
        logAction($request);

        return redirect()->route('vendors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $vendor)
    {
        $data = [
            'vendor' => $vendor,
            'isEdit' => true,
        ];

        return view('cms.vendors.add-vendor', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Customer $vendor)
    {
        $request->validate([
            'account_name'      => 'required',
            'contact_person'    => 'max:11',
            'telephone'         => 'max:11',
            'mobile'            => 'max:11',
            'cnic'              => 'max:11',
            'credit_limit'      => 'max:11',
        ]);

        $vendor->update($request->except('_token'));

        // form helpers.php
        logAction($request);

        return redirect()->route('vendors');
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

        $item = Customer::find($id);

        if ($item->update(['status' => $status])) {

            // form helpers.php
            logAction($request);

            $response['status'] = true;
            $response['message'] = 'Customers updated successfully.';
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
        $vendor = Customer::findOrFail($request->id);
        // apply your conditional check here
        if ( false ) {
            $response['error'] = 'Oops Something went wrong!';
            return response()->json($response, 409);
        } else {
            $vendor->delete();
            $response['success'] = 'Customer Deleted Successfully!';
            // form helpers.php
            logAction($request);

            return response()->json($response, 200);
        }
    }
}
