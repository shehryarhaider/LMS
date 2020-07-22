<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAccountType extends Model
{
    protected $table = 'mt_sub_accounts_types';

    protected $guarded = ['id','created_at','updated_at'];

}
