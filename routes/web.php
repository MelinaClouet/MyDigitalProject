<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
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

Route::get('/getEvents', [EventController:: class , 'getEvents'])->name('getEvents');

Route::get('/trash', function () {
    return view('trash');
})->name('trash');

