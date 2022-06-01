<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
