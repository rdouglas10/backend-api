<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usuario_id')->unsigned();
            $table->string('nome');
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
        Schema::dropIfExists('corretoras');
    }
}
