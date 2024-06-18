<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(!Cliente::where('nome', 'Pedro')->first()){
            Cliente::create([
                'nome' => 'Pedro',
                'endereco' => 'Lubango',
                'telefone' => '932471147',
            ]);
        }

        if(!Cliente::where('nome', 'Francisco')->first()){
            Cliente::create([
                'nome' => 'Francisco',
                'endereco' => 'Lubango',
                'telefone' => '922821244',
            ]);
        }

    }
}
