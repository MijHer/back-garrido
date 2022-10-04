<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function alumno() 
    {
        return $this->belongsTo(Alumno::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function curso() 
    {
        return $this->belongsTo(Curso::class);
    }

    public function anioacademico()
    {
        return $this->belongsTo(Anioacademico::class);        
    }
}
