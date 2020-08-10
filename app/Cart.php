<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'add_to_cart';
    protected $fillable = ['user_id','product_id','status','restaurent_id'];

    public function users(){
       return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function menu(){
        return $this->hasMany('App\AddMenu', 'id', 'product_id');
    }
}
