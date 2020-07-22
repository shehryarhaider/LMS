<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExecutiveCommittee extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'term_executive_committee';


    protected $guarded = ['id','created_at','updated_at'];

}
