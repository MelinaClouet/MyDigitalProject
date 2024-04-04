<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventVariation extends Model
{
    public function eventCategories(){
        return $this->belongsTo(EventCategorie::class);
    }

}
