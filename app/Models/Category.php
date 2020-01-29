<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name_en',
      'name_ar',
      'desc_en',
      'desc_ar',
      'photo_id',
        'meta_keywords_en',
        'meta_description_en',
        'meta_keywords_ar',
        'meta_description_ar'
    ];

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function subCategories() {
        return $this->hasMany('App\Models\SubCategory');
    }
}
