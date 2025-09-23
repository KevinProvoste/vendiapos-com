<?php
// File: vendiapos-com/app/Http/Controllers/Cashier/DashboardController.php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard del cajero con la interfaz del POS.
     */
    public function index()
    {
        // 1. Obtenemos el usuario (cajero) que ha iniciado sesión.
        $cashier = Auth::user();

        // 2. Buscamos la primera tienda a la que este cajero está asociado.
        $store = $cashier->stores()->first();
        
        // Preparamos una colección vacía para los productos.
        $products = collect();

        // 3. Si el cajero está asignado a una tienda...
        if ($store) {
            // ...buscamos todos los productos que pertenecen a esa tienda.
            $products = Product::where('tenant_id', $store->id)->get();
        }

        // 4. Retornamos la vista del dashboard, pasándole la lista de productos correcta.
        return view('cashier.dashboard', compact('products'));
    }
}

