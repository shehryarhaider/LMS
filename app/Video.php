<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'sm_videos';

    protected $guarded = ['id','created_at','updated_at'];
}
