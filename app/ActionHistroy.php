<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionHistroy extends Model
{
    protected $table = 'action_history';

    public $timestamps = false;

    
    /**
     * returns the user
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    
    /**
     * returns the menu
     */
    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }

    
    /**
     * returns the permission
     */
    public function permission()
    {
        return $this->hasOne('App\Permission', 'id', 'permission_id');
    }
    
}
