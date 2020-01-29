<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'desc_en',
        'desc_ar',
        'meta_keywords_en',
        'meta_description_en',
        'meta_keywords_ar',
        'meta_description_ar',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
