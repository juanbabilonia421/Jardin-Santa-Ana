<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja la autenticación de usuarios para la aplicación
    | y redirige según el rol que tenga el usuario autenticado.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirección después de login según el rol.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Si el usuario tiene rol SuperAdmin
        if (auth()->user()->hasRole('SuperAdmin')) {
            return route('admin.dashboard'); // Ajusta al nombre de tu ruta
        }

        // Resto de usuarios
        return RouteServiceProvider::HOME;
    }

    /**
     * Crear nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
