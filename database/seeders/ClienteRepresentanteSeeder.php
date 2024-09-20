<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteRepresentanteSeeder extends Seeder
{
    public function run()
    {
        DB::table('clientes_representantes')->insert([
            ['cliente_id' => 1, 'representante_id' => 1],
            ['cliente_id' => 2, 'representante_id' => 2],
        ]);
    }
}