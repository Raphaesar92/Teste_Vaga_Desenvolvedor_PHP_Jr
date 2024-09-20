<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentantesTable extends Migration
{
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->char('estado', 2)->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('representantes');
    }
}
