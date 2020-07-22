<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'sm_gallery';

    protected $guarded = ['id','created_at','updated_at'];

    public function eventCategory()
    {
        return $this->hasOne('App\EventCategory','id','mf_event_category_id');
    }

}
