<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_para_publicar_destaque')->nullable();
            $table->date('data_de_expiracao_destaque')->nullable();
            $table->text('titulo');
            $table->text('sub_titulo')->nullable();
            $table->text('texto');
            $table->text('capa')->nullable();
            $table->boolean("destaque")->default(0); 
            $table->boolean("ativo")->default(0);            
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
        Schema::dropIfExists('noticias');
    }
}
