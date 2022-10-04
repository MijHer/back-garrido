<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function anioacademico()
    {
        return $this->belongsTo(Anioacademico::class);
    }    

}
