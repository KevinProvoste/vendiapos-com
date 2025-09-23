<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierLoginController extends Controller
{
   

    public function showLoginForm()
    {
        return view('auth.cashier-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Intentar autenticar con el guard 'cashier'
        if (Auth::guard('cashier')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // Éxito, redirigir a su dashboard
            return redirect()->intended('/cashier/dashboard');
        }

        // Si falla, redirigir de vuelta con los datos del formulario y un error
        return back()->withInput($request->only('email', 'remember'))
                     ->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('cashier')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/cashier/login');
    }
}