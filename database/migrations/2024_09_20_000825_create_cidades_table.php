<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('estado', 2);  // Certifique-se de que essa linha está presente
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cidades');
    }
}
