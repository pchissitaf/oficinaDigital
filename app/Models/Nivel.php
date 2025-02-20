<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    // Indicar o nome da tabela
    protected $table = 'nivels';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome',];

    // Criar Relacionamento
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function funcionario()
    {
        return $this->hasMany(Funcionario::class);
    }
}
