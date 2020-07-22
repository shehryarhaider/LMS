<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'um_menus';

    protected $guarded = ['id','created_at','updated_at'];


    /**
     * Has many children
     */
    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id', 'id');
    }

    /**
     * Has one father
     */
    public function father()
    {
        return $this->hasOne('App\Menu', 'id','parent_id');
    }
}
