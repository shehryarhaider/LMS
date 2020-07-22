<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAccountType extends Model
{
    protected $table = 'mf_networks';

    protected $guarded = ['id','created_at','updated_at'];

}
