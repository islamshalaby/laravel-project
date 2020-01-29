<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'desc_en',
        'desc_ar',
        'price',
        'meta_keywords_en',
        'meta_description_en',
        'meta_keywords_ar',
        'meta_description_ar',
        'sub_category_id'
    ];

    public function photos() {
        return $this->hasMany('App\Models\Photo');
    }

    public function links() {
        return $this->hasMany('App\Models\Link');
    }

    public function sub_category() {
        return $this->belongsTo('App\Models\SubCategory');
    }
}
