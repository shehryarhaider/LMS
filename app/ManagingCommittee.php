<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagingCommittee extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'term_managing_committee';


    protected $guarded = ['id','created_at','updated_at'];

}
