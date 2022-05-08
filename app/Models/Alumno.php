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

    public function aistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
