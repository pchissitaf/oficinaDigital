<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;
    
    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'endereco', 'telefone', 'carro_id',];

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }
}
