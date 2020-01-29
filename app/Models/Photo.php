<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file', 'product_id'];
    protected $directory = '/images/';

    public function getFileAttribute($photo) {
        return $this->directory . $photo;
    }

    public  function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
