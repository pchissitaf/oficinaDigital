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
            'name'  => 'Steel Estranho',
            'email' => 'steelf@gmail.com',
            'nivel_id' => '4',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

    }
}
