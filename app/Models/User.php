<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;

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
