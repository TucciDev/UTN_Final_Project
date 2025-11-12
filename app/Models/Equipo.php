<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo_invitacion',
        'icono',
        'color',
        'imagen',
        'creador_id',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    // ========================================
    // RELACIONES
    // ========================================

    /**
     * Creador del equipo
     */
    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }

    /**
     * Usuarios que pertenecen al equipo (relación many-to-many)
     */
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'equipo_usuario')
                    ->withPivot('rol', 'favorito', 'puntos')
                    ->withTimestamps();
    }

    /**
     * Solo administradores del equipo
     */
    public function administradores()
    {
        return $this->usuarios()->wherePivot('rol', 'admin');
    }

    /**
     * Solo miembros regulares del equipo
     */
    public function miembros()
    {
        return $this->usuarios()->wherePivot('rol', 'miembro');
    }

    // ========================================
    // MÉTODOS ÚTILES
    // ========================================

    /**
     * Verifica si un usuario es admin del equipo
     */
    public function esAdmin(User $user): bool
    {
        return $this->usuarios()
                    ->wherePivot('user_id', $user->id)
                    ->wherePivot('rol', 'admin')
                    ->exists();
    }

    /**
     * Verifica si un usuario pertenece al equipo
     */
    public function tieneUsuario(User $user): bool
    {
        return $this->usuarios()->where('user_id', $user->id)->exists();
    }

    /**
     * Agrega un usuario al equipo
     */
    public function agregarUsuario(User $user, string $rol = 'miembro'): void
    {
        if (!$this->tieneUsuario($user)) {
            $this->usuarios()->attach($user->id, [
                'rol' => $rol,
                'favorito' => false,
                'puntos' => 0,
            ]);
        }
    }

    /**
     * Remueve un usuario del equipo
     */
    public function removerUsuario(User $user): void
    {
        $this->usuarios()->detach($user->id);
    }

    /**
     * Genera un código de invitación único
     */
    
    public static function generarCodigoInvitacion(): string
    {
        do {
            $codigo = strtoupper(Str::random(8));
        } while (self::where('codigo_invitacion', $codigo)->exists());

        return $codigo;
    }

    /**
     * Obtiene la URL de la imagen del equipo
     */
    public function getImagenUrlAttribute(): string
    {
        if ($this->imagen && Storage::disk('public')->exists($this->imagen)) {
            return asset('storage/' . $this->imagen);
        }
        
        // Si no hay imagen, retornar null para usar el icono
        return '';
    }

    /**
     * Elimina la imagen anterior del storage
     */
    public function eliminarImagenAnterior(): void
    {
        if ($this->imagen && Storage::disk('public')->exists($this->imagen)) {
            Storage::disk('public')->delete($this->imagen);
        }
    }

    /*
    * Tareas del equipo
    */
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    /**
     * Obtiene la cantidad de tareas del equipo
     */
    public function cantidadTareas(): int
    {
        return $this->tareas()->count();
    }

    /**
     * Obtiene la cantidad de tareas completadas
     */
    public function tareasCompletadas(): int
    {
        return $this->tareas()->where('estado', 'completada')->count();
    }

    /**
     * Boot method para eliminar imagen al eliminar equipo
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($equipo) {
            $equipo->eliminarImagenAnterior();
        });
    }

    /**
     * Mensajes del equipo
     */
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }
}