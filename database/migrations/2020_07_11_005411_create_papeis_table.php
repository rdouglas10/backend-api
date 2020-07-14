<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapeisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papeis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usuario_id')->unsigned();
            $table->string('sigla');
            $table->string('descricao');
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papeis');
    }
}
