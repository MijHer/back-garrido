<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class)->with('tipousuario');
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso::class)->withPivot('grado_id', 'seccion', 'anioacademico_id', 'estado')->withTimestamps();
    }
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class)->withPivot('anioacademico_id', 'curso_id', 'grado_id', 'seccion', 'fecha', 'hora',  'asistencia', 'falta', 'tardanza', 'permiso')->withTimestamps();
    }
}
