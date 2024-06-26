<?php

use App\Http\Controllers\CollectiveEventController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventCategorieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventVariationController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

//Route pour la page d'accueil
Route::get('/', function () {
    return view('home');
});

//Route pour la page A propos
Route::get('/about', function () {
    return view('about');
})->name('about');

//Route pour la page Services
Route::get('/services', function () {
    return view('service');
})->name('services');

//Route pour la page Calendrier
Route::get('/reservation', function () {
    return view('reservation',['me' => session('me')]);
})->name('reservation');

//Route pour la page connexion
Route::get('/login', function () {
    return view('login');
});

//Route pour la page d'inscription
Route::get('/register', function () {
    return view('register');
})->name('register');

//Route pour ajouter un client lors de l'inscription
Route::post('/addCustomer', [CustomerController:: class , 'addCustomer'])->name('addCustomer');

//Route pour la connexion d'un client
Route::post('/login', [CustomerController:: class , 'login'])->name('login');

//Route pour recuperer tous les rendez-vous
Route::get('getAllReservation', [ReservationController:: class , 'getAllReservation'])->name('getAllReservation');

//Route pour recuperer tous les cours collectifs
Route::get('/getCollectiveEvents', [CollectiveEventController:: class , 'getCollectiveEvents'])->name('getCollectiveEvents');

//Route pour recuperer les cours collectifs en fonction de la date
Route::get('/getCollectiveEventsDate', [CollectiveEventController:: class , 'getCollectiveEventsDate'])->name('getCollectiveEventsDate');

//Route pour recuperer le type de cours selon son id
Route::get('typeEvent/{id}', [EventVariationController:: class , 'typeEvent'])->name('typeEvent');

//Route pour la page des Mentions Legales
Route::get('legalNotice', function () {
    return view('legalNotice');
})->name('legalNotice');

//Route de test
Route::get('/trash', function () {
    return view('trash');
})->name('trash');





Route::middleware([\App\Http\Middleware\CheckSession::class])->group(function () {

    Route::get('/rendezVous', function () {
        return view('rendezVous');
    })->name('rendezVous');

    Route::post('/addReservation', [ReservationController:: class , 'addReservation'])->name('addReservation');

    Route::post('/deleteReservation', [ReservationController:: class , 'deleteReservation'])->name('deleteReservation');


    Route::get('/requestCollectiveEvent/{idEvent}' ,[CollectiveEventController::class , 'requestCollectiveEvent'])->name('requestCollectiveEvent');

    Route::get('logout', [CustomerController:: class , 'logout'])->name('logout');

    Route::get('/getReservationPersonnal', [ReservationController::class , 'getReservationPersonnal'])->name('getEventPersonnal');


});



Route::middleware([\App\Http\Middleware\CheckAdmin::class])->group(function () {

    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');

    Route::get('/admin/users', function () {
        $customers= App\Models\Customer::all();
        return view('admin.users', ['customers' => $customers]);
    })->name('admin');

    Route::get('/admin/deleteUser/{id}', [CustomerController:: class , 'deleteUser'])->name('deleteUser');

    Route::get ('/admin/services', function () {
        return view('admin.services',);
    })->name('admin');

    Route::post('/admin/addService', [EventVariationController:: class , 'addService'])->name('addService');

    Route::post('/admin/addEventCategorie', [EventCategorieController:: class , 'addEventCategorie'])->name('addEventCategorie');

    Route::get('/admin/formations', function () {
        return view('admin.formations');
    })->name('admin');

    Route::post('/admin/addFormation', [EventVariationController:: class , 'addFormation'])->name('addFormation');

    Route::get('/admin/allReservations', function () {
        $events= App\Models\Event::all();
        return view('admin.allReservations', ['events' => $events]);
    })->name('admin');

    Route::get('/admin/getAllEvent' , [ReservationController:: class , 'getAllEvent'])->name('getAllEvent');

    Route::get('/admin/getCustomer' , [CustomerController:: class , 'getCustomers'])->name('getCustomers');

    Route::get('getReservation/{id}', [ReservationController:: class , 'getReservation'])->name('getReservation');

    Route::get('/admin/activeAccount/{id}', [CustomerController:: class , 'activeAccount'])->name('activeAccount');

    Route::get('/admin/meet', function () {
        return view('admin.meet');
    })->name('admin');

    Route::post('/admin/addMeet', [CollectiveEventController:: class , 'addMeet'])->name('addMeet');

    Route::get('/admin/getEventCategories/{eventId}', [EventCategorieController:: class , 'getEventCategories'])->name('getEventCategories');

    Route::get('/admin/getEventVariations/{eventCategoryId}', [EventVariationController:: class , 'getEventVariations'])->name('getEventVariations');

    Route::post('/admin/acceptReservation', [ReservationController:: class , 'acceptReservation'])->name('acceptReservation');

    Route::post('/admin/refuseReservation', [ReservationController:: class , 'refuseReservation'])->name('refuseReservation');

    Route::post('/admin/deleteCollectiveEvent', [CollectiveEventController:: class , 'deleteCollectiveEvent'])->name('deleteCollectiveEvent');

    Route::post('/admin/EventVariation/delete', [EventVariationController:: class , 'deleteEventVariation'])->name('deleteEventVariation');

    Route::post('/admin/EventCategories/delete', [EventCategorieController:: class , 'deleteEventCategorie'])->name('deleteEventCategorie');
});


