<?php

namespace Database\Seeders;

use App\Models\EstadoCarro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoCarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!EstadoCarro::where('nome', 'Pago')->first()){
            EstadoCarro::create([
                'nome' => 'Pago',
                'cor' => 'success',
            ]);
        }
        if(!EstadoCarro::where('nome', 'Pendente')->first()){
            EstadoCarro::create([
                'nome' => 'Pendente',
                'cor' => 'danger',
            ]);
        }
        if(!EstadoCarro::where('nome', 'Cancelado')->first()){
            EstadoCarro::create([
                'nome' => 'Cancelado',
                'cor' => 'warning',
            ]);
        }
    }
}
