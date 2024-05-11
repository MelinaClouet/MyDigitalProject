<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function eventCategory(){
        return $this->belongsTo(EventCategorie::class);
    }

    public function eventVariation(){
        return $this->belongsTo(EventVariation::class);
    }
}
