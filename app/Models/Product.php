<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function Clients(){
        return $this->belongsToMany('App\Models\Client','client_product')->withPivot('is_favourite','count_products','total_price')->withTimestamps();
    }
    public function imageable(){
        return $this->morphTo();
    }

    public function Section(){
        return $this->belongsTo('App\Store','store_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }


}
