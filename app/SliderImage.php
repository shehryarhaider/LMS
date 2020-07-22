<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $connection="padeaf_web";
    protected $table = 'sm_slider_images';


    protected $guarded = ['id','created_at','updated_at'];

    /**
     * Get the category
     */
    // public function category()
    // {
    //     return $this->hasOne('App\FAQCategory', 'id', 'sm_faq_category_id');
    // }
}
