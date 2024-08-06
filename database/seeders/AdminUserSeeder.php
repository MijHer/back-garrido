<?php

namespace Database\Seeders;

use App\Models\Tipousuario;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminTipo = Tipousuario::where('tipo_nom', 'Administrador')->first();
        User::create([
            'name' => 'Administrador',
            'usu_dni' => '43741706',
            'email' => 'Admin@mail.com',
            'usu_user' => 'Admin',
            'password' => Hash::make('43741706'),
            'usu_dir' => 'Jr. los Sauces',
            'usu_telf' => '956698856',
            'usu_rgst' => '2020-07-8',
            'usu_estado' =>  true,
            'tipousuario_id' => $adminTipo->id,
        ]);
    }
}
