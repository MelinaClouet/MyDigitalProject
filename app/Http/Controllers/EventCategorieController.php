<?php

namespace App\Http\Controllers;

use App\Models\EventCategorie;
use Illuminate\Http\Request;

class EventCategorieController extends Controller
{
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
}
