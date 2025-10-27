<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipo_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('rol', ['admin', 'miembro'])->default('miembro');
            $table->boolean('favorito')->default(false);
            $table->integer('puntos')->default(0);
            $table->timestamps();

            // Evitar duplicados
            $table->unique(['equipo_id', 'user_id']);
            
            // Índices
            $table->index('equipo_id');
            $table->index('user_id');
            $table->index('rol');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipo_usuario');
    }
};