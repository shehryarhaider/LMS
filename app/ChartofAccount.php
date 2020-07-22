<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartofAccount extends Model
{
    protected $table = 'mt_chart_of_accounts';

    protected $guarded = ['id','created_at','updated_at'];

}
