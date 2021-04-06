<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function getLogoPathAttribute()
    {
        if(file_exists(public_path("storage/company-logo/$this->logo")) && $this->logo != '' ){
            return asset("storage/company-logo/$this->logo");
        }else{
            return asset('images/logo/defalt-logo.png');
        }
    }
}
