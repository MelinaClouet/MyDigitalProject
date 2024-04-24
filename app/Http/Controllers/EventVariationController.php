<?php

namespace App\Http\Controllers;

use App\Models\EventVariation;
use Illuminate\Http\Request;

class EventVariationController extends Controller
{
    public function addService(Request $request)
    {
        $eventVariation = new EventVariation();
        $eventVariation->name = $request->name;
        $eventVariation->price = $request->price;
        $eventVariation->eventCategorie_id = $request->type;
        $eventVariation->max_capacity = $request->max_capacity;
        $eventVariation->duration = $request->duration;
        $eventVariation->save();
        return redirect('/admin/services');
    }
    public function addFormation(Request $request){
        $eventVariation = new EventVariation();
        $eventVariation->name = $request->name;
        $eventVariation->price = $request->price;
        $eventVariation->eventCategorie_id = $request->type;
        $eventVariation->max_capacity = $request->max_capacity;
        $eventVariation->duration = $request->duration;

        $eventVariation->save();
        return redirect('/admin/formations');
    }
}
