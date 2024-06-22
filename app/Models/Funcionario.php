<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funcionario extends Model
{
    use HasFactory;
    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'endereco', 'telefone', 
                'bilhete','doc_file','nivel_id','salario','user_id',];

    // Criar Relacionamento
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class);
    }
    public function carro(): HasMany
    {
        return $this->hasMany(Carro::class);
    }
}
