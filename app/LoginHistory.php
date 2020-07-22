<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{

    protected $table = 'users_login_history';
    protected $guarded = ['id','created_at','updated_at'];
    public $timestamps = FALSE;

    /**
     * returns the user
     */
    public function users()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
