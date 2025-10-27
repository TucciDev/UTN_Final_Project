<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    // public function user()
    // {
    //    return $this->hasOne("App\Models\User");
    // }

    // public function usuarios()
    // {
    //    return $this->hasMany("App\Models\User");
    // }   

    public function usuarios()
    {
       return $this->belongsToMany("App\Models\User");
    }
    
}
