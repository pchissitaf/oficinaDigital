<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;
    
    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'endereco', 'telefone', 'user_id',];

    public function carro()
    {
        return $this->hasMany(Carro::class);
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
