<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait TenantScope
{
    /**
     * Boot the trait.
     */
    public static function bootTenantScope()
    {
        // Aplica un ámbito global para filtrar por tenant_id en todas las consultas.
        static::addGlobalScope('tenant_id', function (Builder $builder) {
            // Obtiene el tenant_id del usuario autenticado y lo aplica al filtro.
            $builder->where('tenant_id', Auth::user()->tenant_id);
        });
    }
}
