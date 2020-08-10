<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order_tbl';
    protected $fillable = ['user_id','total_price','invoice_id','order_status'];

    public function users(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    
}
