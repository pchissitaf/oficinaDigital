<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    
    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'endereco', 'telefone', 'user_id',];

    // Criar Relacionamentos
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function carro():HasMany
    {
        return $this->hasMany(Carro::class);
    }
}
