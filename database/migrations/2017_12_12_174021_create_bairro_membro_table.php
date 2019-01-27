<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBairroMembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bairro_membro', function (Blueprint $table) {
            $table->integer('membro_id')->unsigned()->nullable();
            $table->foreign('membro_id')->references('id')
            ->on('membros')->onDelete('cascade');

            $table->integer('bairro_id')->unsigned()->nullable();
            $table->foreign('bairro_id')->references('id')
            ->on('bairros')->onDelete('cascade');

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
        Schema::dropIfExists('bairro_membro');
    }
}
