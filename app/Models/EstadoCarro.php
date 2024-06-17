<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoCarro extends Model
{
    use HasFactory;
    // Indicar o nome da tabela
    protected $table = 'estado_carros';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'cor'];

    public function carro()
    {
        return $this->hasMany(Carro::class);
    }
}