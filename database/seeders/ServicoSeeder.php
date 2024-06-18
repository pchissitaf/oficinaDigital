<?php

namespace Database\Seeders;

use App\Models\Servico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(!Servico::where('nome', 'Manutencao')->first()){
            Servico::create([
                'nome' => 'Manutencao',
                'valor' => '50000',
            ]);
        }
        if(!Servico::where('nome', 'Lavagem')->first()){
            Servico::create([
                'nome' => 'Lavagem',
                'valor' => '786023',
            ]);
        }
        if(!Servico::where('nome', 'Bate Chapa')->first()){
            Servico::create([
                'nome' => 'Bate Chapa',
                'valor' => '25896',
            ]);
        }
    }
}
