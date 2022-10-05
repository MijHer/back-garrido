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
        return $this->belongsTo(User::class);
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso::class)->withPivot('grado_id', 'anioacademico_id', 'estado')->withTimestamps();
    }
}
