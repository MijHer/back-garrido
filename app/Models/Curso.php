<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grados()
    {
        return $this->belongsToMany(Grado::class)->withPivot('seccion', 'nivel', 'anioacademico_id', 'estado')->withTimestamps();
    }
    public function profesores()
    {
        return $this->belongsToMany(Profesor::class)->withPivot('grado_id', 'seccion', 'anioacademico_id', 'estado')->withTimestamps();
    }
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class)->withPivot('anioacademico_id', 'profesor_id', 'nota1', 'nota2', 'nota3', 'nota4','nota5','nota6', 'promedio', 'fecha', 'hora', 'obs', 'grado_id', 'sec');
    }
}
