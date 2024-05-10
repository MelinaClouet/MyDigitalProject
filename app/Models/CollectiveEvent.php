<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectiveEvent extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function eventVariation()
    {
        return $this->belongsTo(EventVariation::class);
    }

    public function eventCategorie()
    {
        return $this->belongsTo(EventCategorie::class);
    }
}
