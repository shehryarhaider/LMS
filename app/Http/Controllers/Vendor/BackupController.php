<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Backup;
use Carbon\Carbon;
use Artisan;
use Illuminate\Http\Request;
use Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //CDRMS is set in env app name
        $data['files'] = Storage::allFiles('padeaf-cms');

        return view('vendor.settings.backup', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function backup(Request $request)
    {
        // 1 is db
        // 2 is db and site

        if ($request->backup == 1) {
            Artisan::call('backup:run',['--only-db'=>true,"--disable-notifications"=>true]);
        } else if ($request->backup == 2) {
            Artisan::call('backup:run', ['--disable-notifications'=>true]);
        }

        // form helpers.php
        logAction($request);

        return redirect()->back();
    }

    /**
     * gives the download for the backup
     *
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$item)
    {
        $filePath = 'padeaf-cms/'.$item;

        // form helpers.php
        logAction($request);

        return Storage::download($filePath);
    }

    /**
     * gives the download for the backup
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $filePath = 'padeaf-cms/'.$request->id;
        if (Storage::delete($filePath)) {
            // form helpers.php
            logAction($request);
            return response()->json(['deleted'], 200);
        }
    }
}
