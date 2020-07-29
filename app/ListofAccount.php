<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListofAccount extends Model
{
    protected $table = 'list_of_accounts';
    protected $fillable = ['sub_account_type_id','name','status'];

    protected $guarded = ['id','created_at','updated_at'];

    public function subAccountType()
    {
        return $this->hasOne('App\SubAccountType', 'id', 'sub_account_type_id');
    }

}
