<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    protected $table = 'um_users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar','name', 'email', 'password', 'role_id', 'user_type','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * gets all the users except super users
     */
    public function scopeAllUsers($query, $user_type = 1)
    {
        return $query->where('user_type', $user_type)->get();
    }

    /**
     * Get the role details associated with the user.
     */
    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    /**
     * gets the login history for the user
     */
    public function login_history()
    {
        return $this->hasMany('App\LoginHistory');
    }

    public function date()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at);
    }
}
