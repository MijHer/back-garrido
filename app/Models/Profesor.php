<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function notacursos()
    {
        return $this->hasMany(Notacurso::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
