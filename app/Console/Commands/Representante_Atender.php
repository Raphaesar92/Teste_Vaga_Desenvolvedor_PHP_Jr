<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Representante_Atender extends Command
{
    // O nome e a assinatura do comando no terminal
    protected $signature = 'executar:representantes {cliente_id}';

    // A descrição do comando
    protected $description = 'Retorna todos os representantes que podem atender um cliente baseado no ID do cliente';

    // Execute o comando
    public function handle()
    {
        // Pegue o ID do cliente passado como argumento
        $clienteId = $this->argument('cliente_id');

        // Query SQL para obter representantes por cliente
        $result = DB::select("
             SELECT r.id, r.nome, r.cidade_id, r.estado
             FROM representantes r
             JOIN clientes_representantes cr ON r.id = cr.representante_id
             JOIN clientes c ON cr.cliente_id = c.id
             WHERE c.id = :cliente_id;
         ", ['cliente_id' => $clienteId]);

        // Exibir o resultado no console
        if (count($result) > 0) {
            foreach ($result as $representante) {
                $this->info("ID: {$representante->id}, Nome: {$representante->nome}, Cidade ID: {$representante->cidade_id}, Estado: {$representante->estado}");
            }
        } else {
            $this->info("Nenhum representante encontrado para o cliente com ID: $clienteId");
        }
    }
}
