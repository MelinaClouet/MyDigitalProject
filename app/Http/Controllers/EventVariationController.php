<?php

namespace App\Http\Controllers;

use App\Models\EventVariation;
use Illuminate\Http\Request;

class EventVariationController extends Controller
{

    //fonxtion pour supprimer une variation d'événement à partir de son ID
    public function deleteEventVariation(Request $request){
        $eventVariation = EventVariation::where('id', $request->id)->first();
        $eventVariation->delete();
        return redirect('/admin/services');
    }

    //fonction pour ajouter une variation d'événement de type service
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

    //fonction pour ajouter une variation d'événement de type formation
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

    //fonction pour récupérer le type d'événement en fonction de l'ID
    public function typeEvent($id){
        $eventVariation = EventVariation::where('id', $id)->get();
        return $eventVariation;
    }

    //fonction pour récupérer les variations d'événements en fonction de l'ID de la catégorie d'événement
    public function getEventVariations($eventCategoryId) {
        // Récupérer les variations d'événements en fonction de l'ID de la catégorie d'événement
        $eventVariations = EventVariation::where('eventCategorie_id', $eventCategoryId)->get();

        return response()->json($eventVariations);
    }

}
