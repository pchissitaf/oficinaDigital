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
        if(!Cliente::where('nome', 'Steel O Estranho')->first()){
            Cliente::create([
                'nome' => 'Steel O Estranho',
                'endereco' => 'Lubango/Mictha',
                'telefone' => '922821244',
                'user_id' => 4,
            ]);
        }

        if(!Cliente::where('nome', 'Tomas Francisco')->first()){
            Cliente::create([
                'nome' => 'Tomas Francisco',
                'endereco' => 'Lubango/Mitcha',
                'telefone' => '924630329',                
                'user_id' => 5,
            ]);
        }

    }
}
