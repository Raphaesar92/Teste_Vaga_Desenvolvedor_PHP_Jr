<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        // Cliente::create(['nome' => 'João Silva', 'cpf' => '123.456.789-10', 'data_nasc' => '1985-05-15', 'genero' => 'M', 'cidade_id' => 1, 'estado' => 'SP']);
        // Cliente::create(['nome' => 'Maria Souza', 'cpf' => '987.654.321-00', 'data_nasc' => '1990-12-30', 'genero' => 'F', 'cidade_id' => 2, 'estado' => 'RJ']);
        Cliente::create(['nome' => 'Wesley Barbosa','cpf' => '378.658.658-00','data_nasc' => '1990-06-06','genero' => 'M','cidade_id' => 2,'estado' => 'SP']);
        Cliente::create(['nome' => 'Ricardo Menezes','cpf' => '326.652.654-00','data_nasc' => '1980-06-06','genero' => 'M','cidade_id' => 1,'estado' => 'SP']);
        Cliente::create(['nome' => 'Margaret Hamil','cpf' => '235.326.148-12',  'data_nasc' => '1995-06-06','genero' => 'F','cidade_id' => 4,'estado' => 'RJ']);
        Cliente::create(['nome' => 'Joan Clarke','cpf' => '032.324.674-78','data_nasc' => '2000-06-06','genero' => 'M','cidade_id' => 5,'estado' => 'SC']);
    }
}