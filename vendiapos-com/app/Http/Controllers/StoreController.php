<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Importar la clase Log

class StoreController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Asegurarse de que el usuario esté autenticado
        if (Auth::check()) {
            try {
                // Agregar el tenant_id a los datos validados
                $validatedData['tenant_id'] = Auth::user()->tenant_id;

                // ** Punto de Depuración **
                // Descomenta la siguiente línea para ver los datos en la consola
                // dd($validatedData);
                Log::info('Datos para crear la tienda:', $validatedData);

                // Crear la tienda
                $store = Store::create($validatedData);

                // Si la tienda se crea con éxito, redirigir al dashboard
                return redirect()->route('dashboard')->with('status', 'Tienda guardada con éxito.');

            } catch (\Exception $e) {
                // Si ocurre un error, registrarlo y redirigir con un mensaje de error
                Log::error('Error al crear la tienda: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error al guardar la tienda: ' . $e->getMessage());
            }
        }

        // Si el usuario no está autenticado, redirigir al login con un mensaje de error
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear una tienda.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
