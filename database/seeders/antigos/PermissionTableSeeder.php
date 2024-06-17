<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'users.index',
                'description' => 'Exibir usuários',
                'tabela_id'     =>  2
    
            ],
            [
                'name' => 'users.create',
                'description' => 'Novo usuários',
                'tabela_id'     =>  2
    
            ],
            [
                'name' => 'users.store',
                'description' => 'gravar  usuários no bd',
                'tabela_id'     =>  2
    
            ],
            [
                'name' => 'users.edit',
                'description' => 'Editar usuários',
                'tabela_id'     =>  2
    
            ],
            [
                'name' => 'users.update',
                'description' => 'Atualizar usuários no bd',
                'tabela_id'     =>  2
    
            ],
            [
                'name' => 'users.show',
                'description' => 'Exibir um usuários',
                'tabela_id'     =>  2
    
            ],
            [
                'name' => 'users.destroy',
                'description' => 'Excluir usuários',
                'tabela_id'     =>  2
    
            ]
            
    
    
    
           ]);
    }
}
