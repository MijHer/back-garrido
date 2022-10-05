<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }  
    public function cursos()
    {
        return $this->belongsToMany(Curso::class)->withPivot('anioacademico', 'estado')->withTimestamps();
    }
}

