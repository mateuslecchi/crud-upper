<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); //nome do usuario
            $table->string('cpf'); //cpf do usuario
            $table->date('nasc'); //data de nascimento do usuario
            $table->string('email'); //email do usuario
            $table->string('telefone'); //telefone do usuario
            $table->string('logradouro'); //logradouro do usuario
            $table->string('cidade'); //cidade do usuario
            $table->string('estado'); //estado (uf) do usuario

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
