<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebMenus extends Model
{
    protected $table = 'web_menus';

    protected $guarded = ['id','created_at','updated_at'];


    /**
     * Has many children
     */
    public function children()
    {
        return $this->hasMany('App\WebMenus', 'parent_id', 'id');
    }

    /**
     * Has one father
     */
    public function father()
    {
        return $this->hasOne('App\WebMenus', 'id','parent_id');
    }
}
