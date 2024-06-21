<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory;
    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'endereco', 'telefone', 
                'bilhete','documento','salario','nivel_id','user_id',];

    // Criar Relacionamento
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function nivels(): BelongsTo
    {
        return $this->belongsTo(Nivel::class);
    }
}
