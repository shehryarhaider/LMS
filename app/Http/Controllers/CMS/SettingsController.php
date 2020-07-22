<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use File;
use Storage;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'settings' => Settings::get()
        ];

        return view('cms.settings.settings', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'site_logo'         => 'nullable|image',
            'site_name'         => 'required',
            'site_email'        => 'required|email',
            'no_reply_email'    => 'required|email',
            'website'           => 'required',
            'timmings'          => 'required',
            'contact_number'    => 'required',
            'contact_email'     => 'required|email',
            'address'           => 'required',
            'google_source'     => 'required',
            'social_facebook'   => 'required',
            'social_twitter'    => 'required',
            'social_linkedin'   => 'required',
            'social_googleplus' => 'required',
            'social_instagram'  => 'required',
            'files_link'        => 'required',
        ]);

        $input = $request->except('_token','site_logo');

        if ($request->site_logo) {
            $setting = Settings::where('key','site_logo')->first();

            Storage::disk('padeaf')->delete($setting->value);
            $input['site_logo'] = Storage::disk('padeaf')->putFile('', $request->site_logo);
        }
        foreach ($input as $key => $value) {
            $setting = Settings::where('key',$key)->first();

            $setting->value = $value;

            $setting->save();
        }

        return redirect()->back();
    }

}
