<?php
// File: vendiapos-com/app/Models/Product.php

namespace App\Models;

// 1. IMPORTANTE: Nos aseguramos de importar el trait desde su ubicación.
use App\Models\Traits\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 2. SOLUCIÓN: Le decimos al modelo que use el trait TenantScope.
    // A partir de ahora, cualquier consulta como Product::all() se filtrará
    // automáticamente por la tienda que está activa en la sesión.
    use HasFactory, TenantScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sku',
        'description',
        'price',
        'stock',
        'tenant_id',
    ];

    /**
     * Define la relación: un producto pertenece a una tienda.
     */
    public function store()
    {
        return $this->belongsTo(Store::class, 'tenant_id');
    }
}

