<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\EventVariation;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
class ReservationController extends Controller
{
    public function getAllEvent()
    {
        $reservations = Reservation::all();
        return $reservations;

    }

    public function getAllReservation(Request $request){
        $reservations = Reservation::whereDate('startDate', '=', $request->date)->get();
        return $reservations;
    }


    public function getEvents(){
        if(session()->get('me')){
            $me = session()->get('me');
            $events = Reservation::where('customer_id', $me->id)->get();
            return  ['events' => $events];
        }
    }

    public function getReservation($id){
        $event = Reservation::find($id);
        $customer= Customer::find($event->customer_id);
        $event_variation=EventVariation::find($event->event_variation_id);

        return ['event' => $event, 'customer' => $customer, 'event_variation' => $event_variation];
    }

    public function addReservation(Request $request)
    {

            $event = new Reservation();
            $event->customer_id = session()->get('me')->id;
            if ($request->event_id == 1) {
                $event->event_id = 1;
                $event->event_categorie_id = 4;
                $event->event_variation_id = 9;
                $event->time = "1h";
                $event->price = "20";

            }
            if ($request->event_id == 2) {
                $event->event_id = 1;
                $event->event_categorie_id = 3;
                $event->event_variation_id = 5;
                $event->time = "1h";
                $event->price = "20";
            }
            if ($request->event_id == 3) {
                $event->event_id = 1;
                $event->event_categorie_id = 3;
                $event->event_variation_id = 6;
                $event->time = "30-45min";
                $event->price = "30";
            }
            if ($request->event_id == 4) {
                $event->event_id = 1;
                $event->event_categorie_id = 3;
                $event->event_variation_id = 7;
                $event->time = "45min-1h";
                $event->price = "35";
            }
            if ($request->event_id == 5) {
                $event->event_id = 1;
                $event->event_categorie_id = 3;
                $event->event_variation_id = 8;
                $event->time = "45min-1h";
                $event->price = "40";
            }

            $date = Carbon::parse($request->date);
            $heureStr = str_replace('h', ':', $request->selectedHoraire);
            $heure = Carbon::createFromFormat('H:i', $heureStr);
            $startDate = $date->copy()->addHours($heure->hour)->addMinutes($heure->minute);

    // Cloner la date pour endDate
            $endDate = $date->copy()->addHours($heure->hour)->addMinutes($heure->minute);

            $event->startDate = $startDate;
            $event->endDate = $endDate->add('1h');

            $event->status = "pending";
            $event->save();
            return redirect('/rendezVous')->with('success', 'Demande de rendez-vous envoyée avec succès');

    }

    public function deleteReservation(Request $request){
        $event = Reservation::find($request->reservation_id);
        $event->delete();
        return redirect('/rendezVous')->with('success', 'Rendez-vous supprimé avec succès');
    }
}
