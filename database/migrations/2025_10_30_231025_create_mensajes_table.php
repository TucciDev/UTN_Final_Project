<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('emisor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receptor_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('mensaje')->nullable();
            $table->string('archivo')->nullable(); // Ruta del archivo
            $table->string('nombre_archivo')->nullable(); // Nombre original del archivo
            $table->enum('tipo', ['texto', 'archivo', 'ambos'])->default('texto');
            $table->boolean('leido')->default(false);
            $table->timestamp('leido_at')->nullable();
            $table->timestamps();

            // Índices para mejorar performance
            $table->index('equipo_id');
            $table->index('emisor_id');
            $table->index('receptor_id');
            $table->index(['emisor_id', 'receptor_id']);
            $table->index('leido');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};