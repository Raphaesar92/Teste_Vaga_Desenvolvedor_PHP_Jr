<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 14)->unique();
            $table->date('data_nasc');
            $table->char('genero', 1);
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->char('estado', 2)->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        
            // Remova a linha abaixo, pois o Laravel não suporta 'check()'
            // $table->check('genero IN ("M", "F")');  <-- REMOVER ESTA LINHA
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}