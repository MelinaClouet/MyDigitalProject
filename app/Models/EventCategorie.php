<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategorie extends Model
{
    public function events(){
        return $this->belongsTo(Event::class);
    }

    public function eventVariations(){
        return $this->hasMany(EventVariation::class);
    }

}
