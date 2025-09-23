<?php
// File: vendiapos-com/app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Muestra la lista de tiendas del usuario (el nuevo dashboard principal).
     */
    public function index()
    {
        // SOLUCIÓN: Nos aseguramos de que $stores nunca sea null.
        // Si la relación ->stores devuelve null, la convertimos en una colección vacía.
        $stores = Auth::user()->stores ?? collect();
        
        return view('dashboard', compact('stores'));
    }

    /**
     * Establece la tienda activa y muestra su dashboard de gestión.
     */
    public function showStoreDashboard(Store $store)
    {
        // Verificamos que el usuario actual tenga acceso a esta tienda.
        if (!Auth::user()->stores->contains($store)) {
            abort(403, 'No tienes acceso a esta tienda.');
        }

        // Guardamos la tienda activa en la sesión del usuario.
        session(['active_store_id' => $store->id]);

        return view('store-dashboard', compact('store'));
    }
}

