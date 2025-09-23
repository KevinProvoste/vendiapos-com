<?php
// File: vendiapos-com/routes/web.php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CashierLoginController;
use App\Http\Controllers\Cashier\DashboardController as CashierDashboardController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

// --- Rutas para Dueños de Tienda (Admins) ---
Route::middleware(['auth'])->group(function () {
    // El dashboard principal ahora es el selector de tiendas.
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Ruta para ver el panel de una tienda específica.
    Route::get('/stores/{store}/dashboard', [DashboardController::class, 'showStoreDashboard'])->name('store.dashboard');

    // Rutas de creación de recursos.
    Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
    Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
    
    // Las rutas de gestión ahora dependerán de la tienda activa en la sesión.
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    Route::get('/cashiers', [CashierController::class, 'index'])->name('cashiers.index');
    Route::get('/cashiers/create', [CashierController::class, 'create'])->name('cashiers.create');
    Route::post('/cashiers', [CashierController::class, 'store'])->name('cashiers.store');
});


// --- Rutas para Cajeros ---
Route::prefix('cashier')->name('cashier.')->group(function () {
    Route::middleware('guest:cashier')->group(function () {
        Route::get('/login', [CashierLoginController::class, 'showLoginForm'])->name('login.form');
        Route::post('/login', [CashierLoginController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:cashier')->group(function () {
        Route::get('/dashboard', [CashierDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [CashierLoginController::class, 'logout'])->name('logout');
    });
});

