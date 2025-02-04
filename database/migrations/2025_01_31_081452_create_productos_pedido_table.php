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
        Schema::create('productos_pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Pedido');
            $table->unsignedBigInteger('Codi_producte');
            $table->foreign('ID_Pedido')->referemces('id')->on('pedido')->onDelete('cascade');
            $table->foreign('Codi_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_pedido');
    }
};
