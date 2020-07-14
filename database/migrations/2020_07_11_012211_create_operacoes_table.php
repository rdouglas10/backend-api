<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('papel_id')->unsigned();
            $table->integer('corretora_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->date('data');
            $table->string('tipo_operacao');
            $table->integer('quantidade');
            $table->float('valor');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('papel_id')
                ->references('id')->on('papeis')
                ->onDelete('cascade');

            
            $table->foreign('corretora_id')
                ->references('id')->on('corretoras')
                ->onDelete('cascade');

            
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
        Schema::dropIfExists('operacoes');
    }
}
