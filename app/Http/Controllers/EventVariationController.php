<?php

namespace App\Http\Controllers;

use App\Models\EventVariation;
use Illuminate\Http\Request;

class EventVariationController extends Controller
{

    public function deleteEventVariation(Request $request){
        $eventVariation = EventVariation::where('id', $request->id)->first();
        $eventVariation->delete();
        return redirect('/admin/services');
    }
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

    public function typeEvent($id){
        $eventVariation = EventVariation::where('id', $id)->get();
        return $eventVariation;
    }
    public function getEventVariations($eventCategoryId) {
        // Récupérer les variations d'événements en fonction de l'ID de la catégorie d'événement
        $eventVariations = EventVariation::where('eventCategorie_id', $eventCategoryId)->get();

        return response()->json($eventVariations);
    }

}
