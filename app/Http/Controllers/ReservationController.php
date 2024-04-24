<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\EventVariation;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function getAllEvent()
    {
        $reservations = Reservation::all();
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
}
