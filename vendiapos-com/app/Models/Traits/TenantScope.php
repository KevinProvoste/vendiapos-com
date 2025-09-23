<?php
// File: vendiapos-com/app/Models/Traits/TenantScope.php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait TenantScope
{
    protected static function bootTenantScope()
    {
        // 1. Filtro para LEER: Esto ya lo teníamos. Muestra solo los datos de la tienda activa.
        static::addGlobalScope('tenant_id', function (Builder $builder) {
            if (session()->has('active_store_id')) {
                $builder->where('tenant_id', session('active_store_id'));
            }
        });

        // 2. SOLUCIÓN - Evento para CREAR: Asigna automáticamente el ID de la tienda activa.
        static::creating(function ($model) {
            // Si hay una tienda activa en la sesión...
            if (session()->has('active_store_id')) {
                // ...y el modelo que se está creando aún no tiene un tenant_id...
                if (!$model->tenant_id) {
                    // ...se lo asignamos automáticamente.
                    $model->tenant_id = session('active_store_id');
                }
            }
        });
    }
}
