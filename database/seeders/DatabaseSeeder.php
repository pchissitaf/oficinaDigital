<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        
        $this->call([
            
            NivelSeeder::class,
            UserSeeder::class,
            EstadoCarroSeeder::class,
            ClienteSeeder::class,
            FuncionarioSeeder::class,
            CarroSeeder::class,
            ServicoSeeder::class,
            FuncionarioSeeder::class,
        ]);
        \App\Models\User::factory(18)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
