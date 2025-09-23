<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // SOLUCIÓN: Se define la columna como un número entero sin signo (unsignedBigInteger)
            // para que coincida exactamente con el tipo de la columna `id` de la tabla `stores`.
            $table->unsignedBigInteger('tenant_id');
            
            // Se establece la relación: products.tenant_id se conecta con stores.id.
            $table->foreign('tenant_id')->references('id')->on('stores')->onDelete('cascade');

            $table->string('sku')->nullable()->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
