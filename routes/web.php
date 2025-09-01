<?php

use App\Http\Controllers\Api\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', function(Request $request) {
    $nombre = $request->get('nombre');
    $password = $request->get('password');

    if($nombre == "pedro" and $password == "123"){
        // dd("Usuario correcto");
        return view('sistem.dashboard');
    }else{
        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
})->name('verificar');

Route::get('/patients', function () {
    return view('patients.formulario');
})->name('patients.formulario');

Route::post('/patients', [PacienteController::class, 'store'])->name('patients.store');