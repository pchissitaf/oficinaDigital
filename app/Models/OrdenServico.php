<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrdenServico extends Model
{
    use HasFactory;
    protected $fillable = [
        'valor_total',
        'observacao',
        'estado',
        'orcamento_id',
        'funcionario_id',

    ];

    
    public function orcamento(): BelongsTo
    {
        return $this->belongsTo(Orcamento::class);
    }
    
    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class);
    }
}
