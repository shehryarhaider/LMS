<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $connection = 'padeaf_web';
    protected $table = 'settings';
}
