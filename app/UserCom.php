<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Luc;

class UserCom extends Authenticatable
{
    protected $guard='commercial';
    
    
    public function charge()
    {
        $charge=Luc::where('landuse',$this->use)->first();
        return $charge;
    }
    

    protected $fillable = [
            'property_id','property_address','org_name','registration_no','contact_no','email','password','use'
        ];
}
