<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function asistencias() 
    {
        return $this->hasMany(Asistencia::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function cursogrados()
    {
        return $this->hasMany(Cursogrado::class);
    } */
    public function profesores()
    {
        return $this->belongsToMany(Profesor::class)->withPivot('grado_id', 'anioacademico_id', 'estado')->withTimestamps();
    }

}
