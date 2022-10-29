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

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function profesores()
    {
        return $this->belongsToMany(Profesor::class)->withPivot('anioacademico', 'curso', 'hora', 'asistencia', 'falta', 'tardanza', 'permiso')->withTimestamps();
    }
}
