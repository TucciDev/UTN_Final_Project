<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipo_id',
        'emisor_id',
        'receptor_id',
        'mensaje',
        'archivo',
        'nombre_archivo',
        'tipo',
        'leido',
        'leido_at',
    ];

    protected $casts = [
        'leido' => 'boolean',
        'leido_at' => 'datetime',
    ];

    // ========================================
    // RELACIONES
    // ========================================

    /**
     * Equipo al que pertenece el mensaje
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    /**
     * Usuario que envió el mensaje
     */
    public function emisor()
    {
        return $this->belongsTo(User::class, 'emisor_id');
    }

    /**
     * Usuario que recibe el mensaje
     */
    public function receptor()
    {
        return $this->belongsTo(User::class, 'receptor_id');
    }

    // ========================================
    // MÉTODOS ÚTILES
    // ========================================

    /**
     * Marca el mensaje como leído
     */
    public function marcarComoLeido(): void
    {
        if (!$this->leido) {
            $this->update([
                'leido' => true,
                'leido_at' => now(),
            ]);
        }
    }

    /**
     * Obtiene la URL del archivo
     */
    public function getArchivoUrlAttribute(): ?string
    {
        if ($this->archivo && Storage::disk('public')->exists($this->archivo)) {
            return asset('storage/' . $this->archivo);
        }
        
        return null;
    }

    /**
     * Obtiene el tamaño del archivo en formato legible
     */
    public function getArchivoTamañoAttribute(): ?string
    {
        if ($this->archivo && Storage::disk('public')->exists($this->archivo)) {
            $bytes = Storage::disk('public')->size($this->archivo);
            
            if ($bytes >= 1073741824) {
                return number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                return number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                return number_format($bytes / 1024, 2) . ' KB';
            }
            
            return $bytes . ' bytes';
        }
        
        return null;
    }

    /**
     * Obtiene el icono según el tipo de archivo
     */
    public function getArchivoIconoAttribute(): string
    {
        if (!$this->nombre_archivo) {
            return 'bi-file-earmark';
        }

        $extension = strtolower(pathinfo($this->nombre_archivo, PATHINFO_EXTENSION));

        return match($extension) {
            'pdf' => 'bi-file-earmark-pdf',
            'doc', 'docx' => 'bi-file-earmark-word',
            'xls', 'xlsx' => 'bi-file-earmark-excel',
            'ppt', 'pptx' => 'bi-file-earmark-ppt',
            'jpg', 'jpeg', 'png', 'gif', 'webp' => 'bi-file-earmark-image',
            'zip', 'rar', '7z' => 'bi-file-earmark-zip',
            'txt' => 'bi-file-earmark-text',
            'mp3', 'wav', 'ogg' => 'bi-file-earmark-music',
            'mp4', 'avi', 'mov' => 'bi-file-earmark-play',
            default => 'bi-file-earmark',
        };
    }

    /**
     * Verifica si el archivo es una imagen
     */
    public function esImagen(): bool
    {
        if (!$this->nombre_archivo) {
            return false;
        }

        $extension = strtolower(pathinfo($this->nombre_archivo, PATHINFO_EXTENSION));
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
    }

    /**
     * Elimina el archivo del storage
     */
    public function eliminarArchivo(): void
    {
        if ($this->archivo && Storage::disk('public')->exists($this->archivo)) {
            Storage::disk('public')->delete($this->archivo);
        }
    }

    /**
     * Boot method para eliminar archivo al eliminar mensaje
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($mensaje) {
            $mensaje->eliminarArchivo();
        });
    }
}
