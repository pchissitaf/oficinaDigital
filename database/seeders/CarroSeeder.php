<?php

namespace Database\Seeders;

use App\Models\Carro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(!Carro::where('modelo', 'Hilux')->first()){
            Carro::create([
                'modelo' => 'Hilux',
                'cor' => 'Amarelo',
                'marca' => 'Toyota',
                'tipo' => 'Ligeiro',
                'tipo_de_avaria' => 'Motor',
                'codigo_validacao' => Str::random(5),
                'valor' => '147.52',
                'ano' => '2024-01-23',
            ]);
        }

        if(!Carro::where('modelo', 'Elantra')->first()){
            Carro::create([
                'modelo' => 'Elantra',
                'cor' => 'Cinza',
                'marca' => 'Hiunday',
                'tipo' => 'Ligeiro',
                'tipo_de_avaria' => 'Chaparia',
                'codigo_validacao' => Str::random(5),
                'valor' => '250.52',
                'ano' => '2024-01-23',
            ]);
        }

        if(!Carro::where('modelo', 'Camaro')->first()){
            Carro::create([
                'modelo' => 'Camaro',
                'cor' => 'Vermelho',
                'marca' => 'Cheverlet',
                'tipo' => 'Ligeiro',
                'tipo_de_avaria' => 'Motor',
                'codigo_validacao' => Str::random(5),
                'valor' => '147.52',
                'ano' => '2024-01-23',
            ]);
        }

        if(!Carro::where('modelo', 'Hiace')->first()){
            Carro::create([
                'modelo' => 'Hiace',
                'cor' => 'Azul',
                'marca' => 'Toyota',
                'tipo' => 'Ligeiro',
                'tipo_de_avaria' => 'Motor',
                'codigo_validacao' => Str::random(5),
                'valor' => '147.52',
                'ano' => '2024-01-23',
            ]);
        }

        if(!Carro::where('modelo', 'Ranger Rover')->first()){
            Carro::create([
                'modelo' => 'Ranger Rover',
                'cor' => 'Preto',
                'marca' => 'Ranger',
                'tipo' => 'Ligeiro',
                'tipo_de_avaria' => 'Motor',
                'codigo_validacao' => Str::random(5),
                'valor' => '147.52',
                'ano' => '2024-01-23',
            ]);
        }

 
    }
}
