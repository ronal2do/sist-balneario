<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRequireds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('cadastros', function ($table) {
            $table->string('nome')->nullable()->change();
            $table->string('segmento')->nullable()->change();
            $table->string('contato_interno')->nullable()->change();
            $table->string('grau_apoio')->nullable()->change();
            $table->string('area_atuacao')->nullable()->change();
            $table->string('lng')->nullable()->change();
            $table->string('lat')->nullable()->change();
            $table->string('logradouro')->nullable()->change();
            $table->string('bairro')->nullable()->change();
            $table->string('numero')->nullable()->change();
            $table->string('telefone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('facebook')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
