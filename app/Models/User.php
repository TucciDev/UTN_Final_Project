<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Equipo;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'username',
        'password',
        'ruta_img',              // ✅ AGREGADO
        'provider',
        'provider_id',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->nombre} {$this->apellido}";
    }

    public function getInitialsAttribute(): string
    {
        return strtoupper(substr($this->nombre, 0, 1) . substr($this->apellido, 0, 1));
    }

    public function isSocialUser(): bool
    {
        return !is_null($this->provider);
    }

    // ✅ ACTUALIZADO: Usar ruta_img si existe, sino Gravatar
    public function getAvatarUrlAttribute(): ?string
    {
        if ($this->ruta_img) {
            return asset($this->ruta_img);
        }
        
        // Gravatar por defecto
        $hash = md5(strtolower(trim($this->email)));
        return null;
    }

     public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipo_usuario', 'user_id', 'equipo_id')
                    ->withPivot('rol', 'favorito', 'puntos')
                    ->withTimestamps();
    }
}

/*

class User extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    public function equipo()
    {
        return $this->belongsTo("App\Models\Equipo");
    }

    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
    */