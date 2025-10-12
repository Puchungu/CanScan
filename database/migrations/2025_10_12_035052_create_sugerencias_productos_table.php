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
        Schema::create('sugerencias_productos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade'); // Quién lo sugirió
        $table->string('nombre');
        $table->string('marca')->nullable();
        $table->string('codigo_barra')->nullable();
        $table->string('status')->default('pendiente'); // pendiente, aprobado, rechazado
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sugerencias_productos');
    }
};
