<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('segmento');
            $table->string('contato_interno');
            $table->string('grau_apoio');
            $table->string('area_atuacao');
            $table->string('lng');
            $table->string('lat');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('numero');
            $table->string('telefone');
            $table->string('email');
            $table->string('facebook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cadastros');
    }
}
