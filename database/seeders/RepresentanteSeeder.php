<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Representante;

class RepresentanteSeeder extends Seeder
{
    public function run()
    {
        Representante::create(['nome' => 'Carlos Pereira', 'cidade_id' => 1, 'estado' => 'SP']);
        Representante::create(['nome' => 'Ana Lima', 'cidade_id' => 3, 'estado' => 'MG']);
    }
}