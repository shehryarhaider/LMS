<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'mf_event_categories';

    protected $guarded = ['id','created_at','updated_at'];

}
