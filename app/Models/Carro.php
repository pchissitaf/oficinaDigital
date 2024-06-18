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
    protected $fillable = ['modelo', 'cor', 'marca', 'tipo', 'estado_carro_id', 'tipo_de_avaria','codigo_validacao', 'cliente_id','valor','ano',];

    public function estadoCarro()
    {
        return $this->belongsTo(EstadoCarro::class);
    }

    public function cliente()
    {
        return $this->hasMany(Cliente::class);
    }

}