<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carro extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'carros';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['modelo', 'cor', 'marca', 'tipo', 'estado_carro_id', 'avaria','codigo_validacao', 'user_id','funcionario_id','ano',];

    // Criar Relacionamento
    public function estadoCarro()
    {
        return $this->belongsTo(EstadoCarro::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}