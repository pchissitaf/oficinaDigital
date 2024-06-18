<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    // Indicar o nome da tabela
    protected $table = 'servicos';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'valor'];
}
