<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        "address1", 
        "address2",
        "country",
        "city",
        "state",
        "zip",
    ];
    public function users() {
        return $this->hasMany('App\User', 'id', 'address_id');
    }
}
