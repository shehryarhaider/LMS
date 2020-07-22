<?php

namespace App\Providers;

use Config;
use DB;
use Illuminate\Support\ServiceProvider;
use App;
use Illuminate\Support\Facades\Cache;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(!App::runningInConsole()) {
            $config = [
                'driver' => $this->getLocalConfig('mail_driver'),
                'host' => $this->getLocalConfig('mail_host'),
                'port' => $this->getLocalConfig('mail_port'),
                'from' => ['address' => $this->getLocalConfig('from_address'), 'name' => $this->getLocalConfig('from_name')],
                'encryption' => $this->getLocalConfig('mail_encryption'),
                'username' => $this->getLocalConfig('mail_username'),
                'password' => $this->getLocalConfig('mail_password'),
                'sendmail' => '/usr/sbin/sendmail -bs',
            ];

            Config::set('mail', $config);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * return the value of a configuration
     *
     * @param String @key
     * @return String
     */
    private function getLocalConfig($key)
    {
        return Cache::rememberForever($key, function () use($key) {
            return DB::table('ven_configurations')->select('value')->where('key',$key)->first()->value;
        });
    }
}
