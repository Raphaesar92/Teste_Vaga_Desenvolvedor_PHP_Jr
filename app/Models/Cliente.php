<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cliente extends Model
{
    // Especifica os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome', 'cpf', 'data_nasc', 'genero', 'cidade_id', 'estado'
    ];

    // Relacionamento com City
    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class);
    }

    // Relacionamento com Representatives através da tabela pivot 'clients_representatives'
    protected $table = 'clientes';

    public function representantes()
    {
        return $this->belongsToMany(Representante::class, 'cliente_representante', 'cliente_id', 'representante_id');
    }


}