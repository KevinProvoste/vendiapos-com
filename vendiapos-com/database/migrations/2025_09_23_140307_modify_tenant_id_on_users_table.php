<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Cambia el tipo de la columna tenant_id a un número entero sin signo (para coincidir con el ID de la tienda).
            $table->unsignedBigInteger('tenant_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Para revertir, lo devolvemos a su estado anterior (probablemente string o uuid).
            $table->string('tenant_id')->nullable()->change();
        });
    }
};
