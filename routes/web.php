<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/addCustomer', [CustomerController:: class , 'addCustomer'])->name('addCustomer');

Route::post('/login', [CustomerController:: class , 'login'])->name('login');


