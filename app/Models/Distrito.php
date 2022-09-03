<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class)->with('departamento');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
