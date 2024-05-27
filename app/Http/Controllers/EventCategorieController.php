<?php

namespace App\Http\Controllers;

use App\Models\EventCategorie;
use Illuminate\Http\Request;

class EventCategorieController extends Controller
{

    //fonction pour supprimer une catégorie d'événement
    public function deleteEventCategorie(Request $request){
        $eventCategorie = EventCategorie::where('id', $request->id)->first();
        $eventCategorie->delete();
        return redirect('/admin/services');
    }

    //fonction pour ajouter une catégorie d'événement
    public function addEventCategorie(Request $request)
    {
        $eventCategorie = new EventCategorie();
        $eventCategorie->name = $request->name;
        $eventCategorie->event_id = $request->event_id;
        $eventCategorie->save();

        if($request->event_id == 1)
            return redirect('/admin/services');
        else
            return redirect('/admin/formations');

    }

    //fonction pour recuperer les catégories d'événements en fonction de l'ID de l'événement
    public function getEventCategories($eventId) {
        // Récupérer les catégories d'événements en fonction de l'ID de l'événement
        $eventCategories = EventCategorie::where('event_id', $eventId)->get();

        return response()->json($eventCategories);
    }

}
