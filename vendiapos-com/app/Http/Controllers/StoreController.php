<?php
// File: vendiapos-com/app/Http/Controllers/StoreController.php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $store = Store::create([
            'name' => $request->name,
            'address' => $request->address,
            'tenant_id' => (string) \Illuminate\Support\Str::uuid(), // ID único para el registro de la tienda
        ]);

        // SOLUCIÓN: En lugar de modificar al usuario, creamos la relación en la tabla pivote.
        // Se conecta la tienda recién creada con el usuario actual, asignándole el rol de 'owner'.
        Auth::user()->stores()->attach($store->id, ['role' => 'owner']);

        return redirect()->route('dashboard')->with('success', '¡Nueva tienda creada y asignada correctamente!');
    }
}

