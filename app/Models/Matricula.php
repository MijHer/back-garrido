<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
    public function anioacademico()
    {
        return $this->belongsTo(Anioacademico::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
