<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* RUTAS PARA LOGIN */
Route::get('/login', function(){
    return view('auth.login');
})->name('login');
