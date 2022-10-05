<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anioacademico extends Model
{
    use HasFactory;
    
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
