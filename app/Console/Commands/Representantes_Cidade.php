<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Representantes_Cidade extends Command
{
    // O nome e a assinatura do comando no terminal
    protected $signature = 'executar:sql {cidadeId}';

    // A descrição do comando
    protected $description = 'Executa um script SQL e exibe o resultado no console';

    // Execute o comando
    public function handle()
    {
        // Pegue o ID da cidade passado como argumento
        $cidadeId = $this->argument('cidadeId');

        // Query SQL para obter representantes por cidade
        $result = DB::select("
            SELECT r.id, r.nome, r.cidade_id, r.estado
            FROM representantes r
            WHERE r.cidade_id = :cidade_id
        ", ['cidade_id' => $cidadeId]);

        // Exibir o resultado no console
        if (count($result) > 0) {
            foreach ($result as $representante) {
                $this->info("ID: {$representante->id}, Nome: {$representante->nome}, Cidade ID: {$representante->cidade_id}, Estado: {$representante->estado}");
            }
        } else {
            $this->info("Nenhum representante encontrado para a cidade com ID: $cidadeId");
        }
    }
}