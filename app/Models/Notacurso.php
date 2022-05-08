<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notacurso extends Model
{
    use HasFactory;

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}
