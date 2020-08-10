<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddMenu extends Model
{
    protected $table = 'menu';
    protected $fillable=['user_id',
    'restaurent_name',
    'food_title',
    'food_type',
    'location',
    'food_discription',
    'image',
    'actual_price',
    'discount_price'
    ];
    public function users(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function add_to_cart(){
        return $this->hasOne('App\Cart', 'id', 'product_id');
    }

}
