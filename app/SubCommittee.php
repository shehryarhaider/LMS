<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCommittee extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'term_sub_committee';


    protected $guarded = ['id','created_at','updated_at'];

}
