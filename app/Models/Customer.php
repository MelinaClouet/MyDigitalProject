<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function events(){
        return $this->hasMany('App\Models\Event');
    }
    public function isAdmin(){
        if($this->status == 1){
            return true;
        }
        else{
            return false;
        }
    }
}
