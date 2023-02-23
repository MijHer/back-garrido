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
        return $this->belongsToMany(Profesor::class)->withPivot('grado_id','seccion', 'anioacademico_id', 'estado')->withTimestamps();
    }
}
