<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'terms';

    protected $guarded = ['id','created_at','updated_at'];

}
