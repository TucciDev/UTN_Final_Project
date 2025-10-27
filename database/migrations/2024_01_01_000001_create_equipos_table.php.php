<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('codigo_invitacion', 8)->unique();
            $table->string('icono')->default('bi-people'); // Icono de Bootstrap Icons
            $table->string('color')->default('#667eea'); // Color del equipo
            $table->string('imagen')->nullable(); // ✅ NUEVA: Ruta de la imagen
            $table->foreignId('creador_id')->constrained('users')->onDelete('cascade');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Índices
            $table->index('codigo_invitacion');
            $table->index('creador_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};