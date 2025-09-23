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
        static::addGlobalScope('tenant_id', function (Builder $builder) {
            // Solo aplica el filtro si hay un usuario autenticado y su tenant_id es accesible.
            if (Auth::hasUser()) {
                $builder->where('tenant_id', Auth::user()->tenant_id);
            }
        });
    }
}
