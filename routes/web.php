<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventCategorieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventVariationController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('service');
})->name('services');

Route::get('/reservation', function () {
    return view('reservation',['me' => session('me')]);
})->name('reservation');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/addCustomer', [CustomerController:: class , 'addCustomer'])->name('addCustomer');

Route::post('/login', [CustomerController:: class , 'login'])->name('login');

Route::post('/addEvent', [EventController:: class , 'addEvent'])->name('addEvent');

Route::get('/getEvents', [ReservationController:: class , 'getEvents'])->name('getEvents');

Route::get('typeEvent/{id}', [EventVariationController:: class , 'typeEvent'])->name('typeEvent');

Route::get('getReservation/{id}', [ReservationController:: class , 'getReservation'])->name('getReservation');

Route::get('/trash', function () {
    return view('trash');
})->name('trash');

Route::get('logout', [CustomerController:: class , 'logout'])->name('logout');


Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin')->middleware(AdminMiddleware::class);

Route::get('/admin/users', function () {
    $customers= App\Models\Customer::all();
    return view('admin.users', ['customers' => $customers]);
})->name('admin')->middleware(AdminMiddleware::class);

Route::post('/admin/deleteUser/{id}', [CustomerController:: class , 'deleteUser'])->name('deleteUser')->middleware(AdminMiddleware::class);

Route::get ('/admin/services', function () {
    return view('admin.services',);
})->name('admin')->middleware(AdminMiddleware::class);

Route::post('/admin/addService', [EventVariationController:: class , 'addService'])->name('addService')->middleware(AdminMiddleware::class);

Route::post('/admin/addEventCategorie', [EventCategorieController:: class , 'addEventCategorie'])->name('addEventCategorie')->middleware(AdminMiddleware::class);

Route::get('/admin/formations', function () {
    return view('admin.formations');
})->name('admin')->middleware(AdminMiddleware::class);

Route::post('/admin/addFormation', [EventVariationController:: class , 'addFormation'])->name('addFormation')->middleware(AdminMiddleware::class);

Route::get('/admin/allReservations', function () {
    $events= App\Models\Event::all();
    return view('admin.allReservations', ['events' => $events]);
})->name('admin')->middleware(AdminMiddleware::class);

Route::get('/admin/getAllEvent' , [ReservationController:: class , 'getAllEvent'])->name('getAllEvent')->middleware(AdminMiddleware::class);

Route::get('/admin/getCustomer' , [CustomerController:: class , 'getCustomers'])->name('getCustomers')->middleware(AdminMiddleware::class);
