<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
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
    
    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }
}
