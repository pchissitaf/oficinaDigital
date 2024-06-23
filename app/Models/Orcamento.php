<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orcamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'estado',
        'servico_id',
        'cliente_id'
    ];

    
    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function ordenServico(): HasOne
    {
        return $this->hasOne(OrdenServico::class);
    }
}
