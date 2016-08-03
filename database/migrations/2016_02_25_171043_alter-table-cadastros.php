<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCadastros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cadastros', function ($table) {
            $table->string('sexo');
            $table->string('nascimento');
            $table->string('tiporesidencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cadastros', function ($table) {
            $table->dropColumn('sexo');
            $table->dropColumn('nascimento');
            $table->dropColumn('tiporesidencia');
        });
    }
}
