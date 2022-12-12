<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf_cnpj');
            $table->bigInteger('sexo')->unsigned();
            $table->timestamps();
        });
        Schema::table('pessoa_endereco', function (Blueprint $table) {
            $table->foreign('pessoa')->references('id')->on('pessoa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
}
