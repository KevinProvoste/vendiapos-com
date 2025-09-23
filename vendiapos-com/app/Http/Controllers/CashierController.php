<?php
// File: vendiapos-com/app/Http/Controllers/CashierController.php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CashierController extends Controller
{
    /**
     * Muestra la lista de cajeros de la tienda activa.
     */
    public function index()
    {
        $activeStoreId = session('active_store_id');
        if (!$activeStoreId) {
            return redirect()->route('dashboard')->with('error', 'Por favor, selecciona una tienda para gestionarla.');
        }

        // Buscamos la tienda activa.
        $store = Store::find($activeStoreId);

        // SOLUCIÓN: Usamos wherePivot() para especificar que queremos filtrar por
        // la columna 'role' de la tabla intermedia 'store_user'.
        $cashiers = $store->users()->wherePivot('role', 'cashier')->get();

        return view('cashiers.index', compact('cashiers'));
    }

    /**
     * Muestra el formulario para crear un nuevo cajero.
     */
    public function create()
    {
        return view('cashiers.create');
    }

    /**
     * Guarda un nuevo cajero y lo asocia a la tienda activa.
     */
    public function store(Request $request)
    {
        $activeStoreId = session('active_store_id');
        if (!$activeStoreId) {
            return redirect()->route('dashboard')->with('error', 'Por favor, selecciona una tienda para gestionarla.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 1. Creamos el nuevo usuario.
        $cashier = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'cashier', // Asignamos el rol principal al usuario.
        ]);

        // 2. Buscamos la tienda activa.
        $store = Store::find($activeStoreId);

        // 3. Asociamos el nuevo usuario (cajero) a la tienda activa con su rol específico.
        $store->users()->attach($cashier->id, ['role' => 'cashier']);

        return redirect()->route('cashiers.index')->with('success', 'Cajero creado y asignado a la tienda exitosamente.');
    }
}

