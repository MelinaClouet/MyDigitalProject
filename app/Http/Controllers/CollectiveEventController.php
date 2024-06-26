<?php

namespace App\Http\Controllers;

use App\Models\CollectiveEvent;
use App\Models\Event;
use App\Models\EventVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectiveEventController extends Controller
{
    //fonction pour supprimer un cour collectif
    public function deleteCollectiveEvent(Request $request){
        $collectiveEvent = CollectiveEvent::find($request->id);
        $collectiveEvent->delete();
        return redirect('/admin/meet');
    }

    //fonction pour ajouter un cour collectif
    public function addMeet(Request $request){

        $collectiveEvent = new CollectiveEvent();
        $collectiveEvent->event_id = $request->event_id;
        $collectiveEvent->event_variation_id = $request->event_variation_id;
        $collectiveEvent->event_categorie_id = $request->event_category_id;
        $collectiveEvent->startDate = $request->startDate;
        $collectiveEvent->endDate = $request->endDate;
        $collectiveEvent->price = $request->price;
        $collectiveEvent->address = $request->address;
        $collectiveEvent->city = $request->city;
        $collectiveEvent->zipCode = $request->zipCode;

        $collectiveEvent->save();
        return redirect('/admin/meet');

    }

    //fonction pour récupérer tous les cours collectifs
    public function getCollectiveEvents(){
        $collectiveEvents = CollectiveEvent::all();
        return $collectiveEvents;
    }

    //fonction pour récupérer les cours collectifs à partir d'une date donnée
    public function getCollectiveEventsDate(Request $request){
        $collectiveEvents = CollectiveEvent::where('startDate', '>=', $request->date)->get();
        return $collectiveEvents;
    }

    //fonction pour faire une demande de participation d'un cours collectif
    public function requestCollectiveEvent($idEvent) {
        // Récupérer l'événement collectif et la variation d'événement correspondante
        $collectiveEvent = CollectiveEvent::find($idEvent);
        $eventVariation = EventVariation::find($collectiveEvent->event_variation_id);

        // Vérifier si une demande de participation a déjà été faite par la même personne
        $existingRequest = DB::table('collective_event_customer')
            ->where('collective_event_id', $idEvent)
            ->where('customer_id', session()->get('me')->id)
            ->first();

        // Si une demande existe déjà, renvoyer une erreur
        if ($existingRequest) {
            return ['status' => 'error', 'message' => 'Une demande pour ce cours a déjà été soumise.'];
        }

        // Vérifier si le nombre de participants n'a pas dépassé la capacité maximale
        $nbParticipants = DB::table('collective_event_customer')
            ->where('collective_event_id', $idEvent)
            ->count();

        if ($nbParticipants < $eventVariation->max_capacity) {
            // Insérer la nouvelle demande de participation
            DB::table('collective_event_customer')->insert([
                'collective_event_id' => $idEvent,
                'customer_id' => session()->get('me')->id,
                'created_at' => now(), // Ajout de timestamps pour le suivi
                'updated_at' => now()
            ]);

            return ['status' => 'success'];
        } else {
            return ['status' => 'error', 'message' => 'La capacité maximale pour ce cours a été atteinte.'];
        }
    }


}
