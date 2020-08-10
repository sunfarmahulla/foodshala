<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id','first_name','middle_name' ,'last_name','email','mobile' ,'password','food_type','user_type','name_of_restaurent'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address() {
        return $this->hasOne('App\Address', 'id', 'address_id');
    }
    public function menu(){
        return $this->hasMany('App\AddMenu', 'id','user_id');
    }
    public function order_tbl() {
        return $this->hasMany('App\Order','id','user_id');

    }

    public function add_to_cart(){
        return $this->hasMany('App\Cart','id','user_id');
    }
}
