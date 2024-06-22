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
                'nome' => 'Pedro Chissita Franciosco',
                'endereco' => 'Lubango/Mitcha',
                'telefone' => '932471147', 
                'bilhete' => '006706547HA048',
                'user_id' => 1,
                'salario' => 900650,
                'nivel_id' => 1,
            ]);
        }
        Funcionario::create([
            'nome' => 'Ilidio Mateus',
            'endereco' => 'Lubango/Arco-Iris',
            'telefone' => '923927170', 
            'bilhete' => '006706547HA048',
            'user_id' => 2,
            'salario' => 408569,            
            'nivel_id' => 3,
        ]);
        Funcionario::create([
            'nome' => 'Amelia',
            'endereco' => 'Lubango/Tchioco',
            'telefone' => '934183019', 
            'bilhete' => '006706547HA048',
            'user_id' => 3,
            'salario' => 250569,            
            'nivel_id' => 2,
        ]);

        Funcionario::create([
            'nome' => 'Antonio Mesquita',
            'endereco' => 'Lubango/Arco-Iris',
            'telefone' => '948325969', 
            'bilhete' => '006706547HA048',
            'user_id' => 8,
            'salario' => 408569,            
            'nivel_id' => 3,
        ]);

        Funcionario::create([
            'nome' => 'Luisa Francisco',
            'endereco' => 'Lubango/Arco-Iris',
            'telefone' => '948639785', 
            'bilhete' => '006706547HA048',
            'user_id' => 6,
            'salario' => 408569,            
            'nivel_id' => 5,
        ]);

        Funcionario::create([
            'nome' => 'Maria Pedro',
            'endereco' => 'Lubango/Mitcha',
            'telefone' => '924630329', 
            'bilhete' => '006706547HA048',
            'user_id' => 7,
            'salario' => 408569,            
            'nivel_id' => 5,
        ]);

    }
}
