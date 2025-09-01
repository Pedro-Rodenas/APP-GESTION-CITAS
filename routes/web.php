<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* RUTAS PARA LOGIN */
Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', function(Request $request) {
    $nombre = $request->get('nombre');
    $password = $request->get('password');

    if($nombre == "pedro" and $password == "123"){
        dd("Usuario correcto");        
    }else{
        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
})->name('verificar');

/* RUTAS PARA PACIENTES */
Route::get('/dashboard/pacientes', function() {
    /* Simulamos traer los datos */
    
    $pacientes = [
            [
                'id' => 1,
                'nombre' => 'Pedro',
                'apellido' => 'Perez',
                'especialidad' => 'Cardiologia',
                'telefono' => '123456789'
            ],
            [
                'id' => 1,
                'nombre' => 'Pedro',
                'apellido' => 'Perez',
                'especialidad' => 'Cardiologia',
                'telefono' => '123456789'
            ],
            [
                'id' => 1,
                'nombre' => 'Pedro',
                'apellido' => 'Perez',
                'especialidad' => 'Cardiologia',
                'telefono' => '123456789'
            ]
        ];

    return view('pacientes.index',compact('pacientes'));
    
})->name('pacientes');