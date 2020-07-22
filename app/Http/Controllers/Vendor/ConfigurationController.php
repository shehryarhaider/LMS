<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Configuration;
use Illuminate\Http\Request;
use File;
use Cache;
use Storage;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsedashboard
     */
    public function index()
    {
        // configuration settings are loaded from helpers.php

        return view('vendor.settings.configuration');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Cache::flush();

        $request->validate([
            'site_logo_desktop' => 'nullable|image',
            'site_logo_smartphone' => 'nullable|image',
            'site_name' => 'required',
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'from_address' => 'required',
            'from_name' => 'required',
            'mail_password' => 'required',
            'files_link'    =>  'required',
        ]);

        $input = $request->except('_token');

        foreach ($request->file() as $key => $value) {
            Storage::disk('padeaf')->delete(Configuration::where('key', $key)->first()->value);

            $input[$key] = Storage::disk('padeaf')->putFile('', $value);
        }

        $input['two_factor_authentication'] = $request->two_factor_authentication ? 1 : 0;
        $input['single_user_session']       = $request->single_user_session ? 1 : 0;
        $input['text_graphic_logo']       = $request->text_graphic_logo ? 1 : 0;

        foreach ($input as $key => $value) {
            $config = Configuration::where('key', $key)->first();

            $config->value = $value;

            $config->save();
        }

        return redirect()->back();
    }

    /**
     * toggles the two factor authentication for the project
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request)
    {
        $response['status'] = false;
        $response['message'] = 'Oops! Something went wrong.';

        $status = $request->input('status');

        $item = Configuration::where('key', 'two_factor_authentication')->first();
        $item->value = $status;
        if ($item->save()) {
            $response['status'] = true;
            $response['message'] = 'User status updated successfully.';
            return response()->json($response, 200);
        }

        return response()->json($response, 409);
    }
}
