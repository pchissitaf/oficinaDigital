<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TabelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tabelas')->insert([
            [
                'name' => 'Tabelas',
                'description' => 'Tabelas com as tables',
                'table'     =>  'tabelas'
    
            ],
            [
                'name' => 'Usuário',
                'description' => 'Tabelas com os usuários',
                'table'     =>  'users'
    
            ],
            [
                'name' => 'Funções',
                'description' => 'Tabelas com as funções',
                'table'     =>  'roles'
    
            ],
            [
                'name' => 'Permissões',
                'description' => 'Tabelas com as permissoes',
                'table'     =>  'permissions'
    
            ],
    
    
    
           ]);
    }
}
