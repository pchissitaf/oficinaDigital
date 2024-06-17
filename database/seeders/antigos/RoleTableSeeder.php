<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('roles')->insert([
     
        [
            'name' => 'Visitante',
            'description' => 'Usuário visitante do sistema'

        ]



       ]);

        $role = Role::create([
            'name' => 'Adminstrador',
            'description' => 'Usuário adminstrador do sistema'


        ]);
        $permissions = Permission::all();

       $role->permissions()->saveMany($permissions);
    }
}
