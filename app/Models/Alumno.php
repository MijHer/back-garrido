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
        return $this->belongsToMany(Profesor::class)->withPivot('anioacademico', 'curso', 'grado', 'seccion', 'hora', 'asistencia', 'falta', 'tardanza', 'permiso')->withTimestamps();
    }
}
