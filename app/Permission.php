<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'um_permissions';

    protected $guarded = ['id','created_at','updated_at'];

    /**
     * returns the menu
     */
    public function menus()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }
}
