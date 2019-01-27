<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo',['Carro', 'Panfleto']);
            $table->text('imagem');
            $table->text('titulo')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();

            $table->integer('carro_id')->unsigned();
            $table->foreign('carro_id')->references('id')
            ->on('carros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
