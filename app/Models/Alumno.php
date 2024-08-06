<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function user()
    {
        return $this->hasOne(User::class)->with('tipousuario');
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class)->withPivot('anioacademico_id', 'curso_id', 'grado_id', 'seccion', 'fecha', 'hora',  'asistencia', 'falta', 'tardanza', 'permiso')->withTimestamps();
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class)->withPivot('anioacademico_id', 'profesor_id', 'nota1', 'nota2', 'nota3', 'nota4', 'nota5', 'nota6', 'promedio', 'fecha', 'hora', 'obs', 'grado_id', 'sec');
    }
}
