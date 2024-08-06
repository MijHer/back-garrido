<?php

namespace Database\Seeders;

use App\Models\Tipousuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipousuario::create([
            'tipo_nom' => 'Administrador',
            'tipo_descripcion' => 'Administrador general del sistema',
            'tipo_estado' => true
        ]);
    }
}
