<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Solo aplica el filtro si hay un usuario autenticado y su tenant_id es accesible.
        if (Auth::check()) {
            User::addGlobalScope('tenant_id', function (Builder $builder) {
                $builder->where('tenant_id', Auth::user()->tenant_id);
            });
        }
    }
}
