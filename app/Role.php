<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'um_roles';

    protected $guarded = ['id','created_at','updated_at'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    /**
     * Has many Users
     */
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }

    /**
     * The assigned menus for the roles
     */
    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'um_role_menus', 'role_id', 'menu_id');
    }

    /**
     * The assigned permissions for the roles
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'um_role_permissions', 'role_id', 'permission_id');
    }

}
