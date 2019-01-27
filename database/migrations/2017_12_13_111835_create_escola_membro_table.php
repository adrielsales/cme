<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscolaMembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escola_membro', function (Blueprint $table) {
            $table->integer('membro_id')->unsigned()->nullable();
            $table->foreign('membro_id')->references('id')
            ->on('membros')->onDelete('cascade');

            $table->integer('escola_id')->unsigned()->nullable();
            $table->foreign('escola_id')->references('id')
            ->on('escolas')->onDelete('cascade');

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
        Schema::dropIfExists('escola_membro');
    }
}
