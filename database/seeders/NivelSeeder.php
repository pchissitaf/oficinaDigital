<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Nivel::where('nome', 'Administrador')->first()){
            Nivel::create([
                'nome' => 'Administrador',
            ]);
        }

        Nivel::create([
            'nome' => 'Secretario',
        ]);
        Nivel::create([
            'nome' => 'Tecnico',
        ]);
        Nivel::create([
            'nome' => 'Cliente',
        ]);
        Nivel::create([
            'nome' => 'Gerente',
        ]);
        Nivel::create([
            'nome' => 'User',
        ]);
    }
}
