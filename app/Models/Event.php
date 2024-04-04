<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function eventsCategories()
    {
        return $this->hasMany(EventCategorie::class);
    }
}
