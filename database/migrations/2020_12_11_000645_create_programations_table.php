<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programations', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
             $table->date('fecha');
            $table->string('hora_inicial')->nullable();
            $table->string('hora_final')->nullable();
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('direccion');
            $table->string('tareas')->nullable();
            $table->integer('estado')->default(1);

            // $table->foreign('user_id')
            // ->references('id')
            // ->on('users');

            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes');

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
        Schema::dropIfExists('programations');
    }
}
