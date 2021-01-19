<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRes extends Authenticatable
{
    protected $guard='residential';
    public function user()
    {
        return Auth::guard('residential')->user();
    }

protected $fillable = [
        'property_title','property_id','middlename','property_address','title','date_o_b','surname','firstname','phone_number','email','type_of_o','place_o_w','place_address','password','occupation'
    ];
}
