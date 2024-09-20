<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $fillable = [
        'nome',
        'cidade_id',
        'estado'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'cliente_representante', 'representante_id', 'cliente_id');
    }
}
