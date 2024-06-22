<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'  => 'Pedro Chissita Francisco',
            'email' => 'pchissitaf@gmail.com',
            'nivel_id' => '1',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Ilidio Mateus',
            'email' => 'ilidio@gmail.com',
            'nivel_id' => '3',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Amelia',
            'email' => 'amelia@gmail.com',
            'nivel_id' => '2',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Steel O Estranho',
            'email' => 'steel@gmail.com',
            'nivel_id' => '4',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Tomas Francisco',
            'email' => 'tomas@gmail.com',
            'nivel_id' => '4',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Luisa Francisco',
            'email' => 'luisa@gmail.com',
            'nivel_id' => '5',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Maria Pedro',
            'email' => 'maria@gmail.com',
            'nivel_id' => '5',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Antonio Mesquita',
            'email' => 'antonio@gmail.com',
            'nivel_id' => '3',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        $user = User::create([
            'name'  => 'Usuario Indefinido',
            'email' => 'user@gmail.com',
            'nivel_id' => '6',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

    }
}
