<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
        'fecha_vencimiento',
        'equipo_id',
        'creador_id',
        'asignado_a',
        'puntos',
        'vista_por_asignado',
        'archivada',
    ];

    protected $casts = [
        'fecha_vencimiento' => 'datetime',
        'vista_por_asignado' => 'boolean',
        'archivada' => 'boolean',
    ];

    // ========================================
    // RELACIONES
    // ========================================

    /**
     * Equipo al que pertenece la tarea
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    /**
     * Usuario que creó la tarea
     */
    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }

    /**
     * Usuario al que está asignada la tarea
     */
    public function asignado()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }

    // ========================================
    // MÉTODOS ÚTILES
    // ========================================

    /**
     * Obtiene el color según la prioridad
     */
    public function getColorPrioridadAttribute(): string
    {
        return match($this->prioridad) {
            'baja' => '#10b981',    // Verde
            'media' => '#f59e0b',   // Amarillo
            'alta' => '#ef4444',    // Rojo
            default => '#64748b',
        };
    }

    /**
     * Obtiene el texto de la prioridad
     */
    public function getTextoPrioridadAttribute(): string
    {
        return match($this->prioridad) {
            'baja' => 'Baja',
            'media' => 'Media',
            'alta' => 'Alta',
            default => 'Sin definir',
        };
    }

    /**
     * Obtiene el texto del estado
     */
    public function getTextoEstadoAttribute(): string
    {
        return match($this->estado) {
            'por_hacer' => 'Por Hacer',
            'en_progreso' => 'En Progreso',
            'completada' => 'Completada',
            default => 'Sin definir',
        };
    }

    /**
     * Verifica si la tarea está vencida
     */
    public function estaVencida(): bool
    {
        if (!$this->fecha_vencimiento) {
            return false;
        }

        return $this->fecha_vencimiento->isPast() && $this->estado !== 'completada';
    }

    /**
     * Verifica si la tarea está por vencer (próximos 3 días)
     */
    public function estaPorVencer(): bool
    {
        if (!$this->fecha_vencimiento || $this->estado === 'completada') {
            return false;
        }

        return $this->fecha_vencimiento->between(now(), now()->addDays(3));
    }
}