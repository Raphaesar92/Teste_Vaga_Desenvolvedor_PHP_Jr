<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadeSeeder extends Seeder
{
    public function run()
    {
        Cidade::firstOrCreate(['nome' => 'São Paulo', 'estado' => 'SP']);
        Cidade::firstOrCreate(['nome' => 'Rio de Janeiro', 'estado' => 'RJ']);
        Cidade::firstOrCreate(['nome' => 'Acre', 'estado' => 'AC']);
        Cidade::firstOrCreate(['nome' => 'Alagoas', 'estado' => 'AL']);
        Cidade::firstOrCreate(['nome' => 'Amapá', 'estado' => 'AM']);
        Cidade::firstOrCreate(['nome' => 'Bahia', 'estado' => 'BA']);
        Cidade::firstOrCreate(['nome' => 'Ceará', 'estado' => 'CE']);
        Cidade::firstOrCreate(['nome' => 'Distrito Federal', 'estado' => 'DF']);
        Cidade::firstOrCreate(['nome' => 'Espírito Santo', 'estado' => 'ES']);
        Cidade::firstOrCreate(['nome' => 'Goiás', 'estado' => 'GO']);
        Cidade::firstOrCreate(['nome' => 'Maranhão', 'estado' => 'MA']);
        Cidade::firstOrCreate(['nome' => 'Mato Grosso', 'estado' => 'MT']);
        Cidade::firstOrCreate(['nome' => 'Mato Grosso do Sul', 'estado' => 'MS']);
        Cidade::firstOrCreate(['nome' => 'Minas Gerais', 'estado' => 'MG']);
        Cidade::firstOrCreate(['nome' => 'Pará', 'estado' => 'PA']);
        Cidade::firstOrCreate(['nome' => 'Paraíba', 'estado' => 'PB']);
        Cidade::firstOrCreate(['nome' => 'Paraná', 'estado' => 'PR']);
        Cidade::firstOrCreate(['nome' => 'Pernambuco', 'estado' => 'PE']);
        Cidade::firstOrCreate(['nome' => 'Piauí', 'estado' => 'PI']);
        Cidade::firstOrCreate(['nome' => 'Rio Grande do Norte', 'estado' => 'RN']);
        Cidade::firstOrCreate(['nome' => 'Rio Grande do Sul', 'estado' => 'RS']);
        Cidade::firstOrCreate(['nome' => 'Rondônia', 'estado' => 'RO']);
        Cidade::firstOrCreate(['nome' => 'Roraima', 'estado' => 'RR']);
        Cidade::firstOrCreate(['nome' => 'Santa Catarina', 'estado' => 'SC']);
        Cidade::firstOrCreate(['nome' => 'Sergipe', 'estado' => 'SE']);
        Cidade::firstOrCreate(['nome' => 'Tocantins', 'estado' => 'TO']);
    }
}
