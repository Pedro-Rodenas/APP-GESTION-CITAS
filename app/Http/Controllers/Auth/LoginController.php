<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Verificar usuario
    public function verificar(Request $request)
    {
        $nombre = $request->input('nombre');
        $password = $request->input('password');

        if ($nombre === 'admin' && $password === '123') {
            return redirect()->route('dashboard'); 
        }

        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }
}
