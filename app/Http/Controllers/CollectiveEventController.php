<?php

namespace App\Http\Controllers;

use App\Models\CollectiveEvent;
use Illuminate\Http\Request;

class CollectiveEventController extends Controller
{
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
}
