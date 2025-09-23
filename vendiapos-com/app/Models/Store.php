<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'tenant_id'];

    /**
     * Una tienda puede tener muchos usuarios (dueños, cajeros).
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }
}