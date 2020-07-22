<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientFiles extends Model
{
    protected $guarded = ['id','created_at','updated_at'];


    /**
     * gets the clients for the files
     */
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
