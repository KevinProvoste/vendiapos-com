<?php
// File: vendiapos-com/app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $activeStoreId = session('active_store_id');
        if (!$activeStoreId) {
            return redirect()->route('dashboard')->with('error', 'Por favor, selecciona una tienda para gestionarla.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'sku' => 'nullable|string|max:255|unique:products,sku,NULL,id,tenant_id,' . $activeStoreId,
        ]);

        // Ya no necesitamos añadir 'tenant_id' manualmente.
        // El trait TenantScope se encargará de esto automáticamente gracias al evento 'creating'.
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'sku' => $request->sku,
        ]);

        return redirect()->route('products.index')->with('success', 'Producto añadido exitosamente.');
    }
}

