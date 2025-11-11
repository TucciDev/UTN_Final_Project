<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['por_hacer', 'en_progreso', 'completada'])->default('por_hacer');
            $table->enum('prioridad', ['baja', 'media', 'alta'])->default('media');
            $table->dateTime('fecha_vencimiento')->nullable();
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('creador_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('asignado_a')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('puntos')->default(0);
            $table->boolean('vista_por_asignado')->default(false);
            $table->timestamps();

            // Índices
            $table->index('equipo_id');
            $table->index('estado');
            $table->index('asignado_a');
            $table->index('creador_id');
            $table->index('vista_por_asignado');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};