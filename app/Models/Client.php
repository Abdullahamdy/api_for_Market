<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Client extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password','pivot'
    ];
    public function Products(){
        return $this->belongsToMany('App\Models\Product','client_product')->withPivot('is_favourite','status','total_price')->withTimestamps();
    }
}
