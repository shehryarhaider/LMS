<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAccountType extends Model
{
    protected $table = 'mt_sub_accounts_types';

    protected $fillable = ['name','chart_of_account_id','status'];
    protected $guarded = ['id','created_at','updated_at'];

}
