<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
}
