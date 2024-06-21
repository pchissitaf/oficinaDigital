<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(!Funcionario::where('nome', 'Pedro')->first()){
            Funcionario::create([
                'nome' => 'Pedro',
                'endereco' => 'Lubango',
                'telefone' => '932471147', 
                'bilhete' => '006706547HA048',
                'salario' => '408569',
            ]);
        }

    }
}
