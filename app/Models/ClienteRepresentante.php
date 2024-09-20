<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteRepresentante extends Model
{
    protected $fillable = [
        'cliente_id', 'representante_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function representante()
    {
        return $this->belongsTo(Representante::class);
    }
}
