<?php
// File: vendiapos-com/app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    /**
     * The user has been authenticated.
     *
     * Este método se llama después de una autenticación exitosa.
     * Lo usamos para verificar el rol del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Si el usuario autenticado no tiene el rol de 'owner',
        // cerramos su sesión inmediatamente.
        if ($user->role !== 'owner') {
            Auth::logout(); // O Auth::guard('web')->logout();

            // Redirigimos de vuelta al login con un mensaje de error específico.
            return redirect('/login')->withErrors([
                'email' => 'No tienes permiso para acceder como administrador.',
            ]);
        }

        // Si el rol es correcto, procedemos con la redirección normal.
        return redirect()->intended($this->redirectPath());
    }
}

