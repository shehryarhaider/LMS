<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $table = 'sm_faq_categories';

    protected $guarded = ['id','created_at','updated_at'];

     /**
     * gets the FAQ's
     */
    public function faqs()
    {
        return $this->hasMany('App\FAQ');
    }

}
