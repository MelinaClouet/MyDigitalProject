<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function addEvent(Request $request){
        $event= new Event();
        if(session()->get('me')){
            $me = session()->get('me');
            $event->lastName = $me->lastName;
            $event->firstName = $me->firstName;
            $event->customer_id = $me->id;
        }
        $event->lastName = $request->lastName;
        $event->firstName = $request->firstName;
        $event->age= $request->age;
        $event->startDate = $request->startDate;
        $event->endDate = $request->endDate;

        $event->comments = $request->comments;
        $event->status = $request->status;
        if(!session()->get('me')){
            $event->type_event= 1;
        }
        $event->type_event = $request->type_event;
        if($event->save()){
            return redirect('/');
        }

    }

    public function getEvents(){
        if(session()->get('me')){
            $me = session()->get('me');
            $events = Event::where('customer_id', $me->id)->get();
            return  ['events' => $events];
        }
    }
}
