<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    protected $connection = 'padeaf_web';
    protected $table = 'cms';

    protected $guarded = ['id','created_at','updated_at'];
}
