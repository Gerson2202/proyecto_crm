<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();// quien lo crea
            $table->date('fecha');
            $table->string('direccion');
            $table->string('cliente');
            $table->string('actividad');
            $table->string('municipio');
            // $table->string('abrazaderas')->nullable();
            // $table->string('cableUtp')->nullable();
            // $table->string('chazoPlastico')->nullable();
            // $table->string('tornillos')->nullable();
            // $table->string('Rj45')->nullable();
            // $table->string('grapaUtp')->nullable();
            // $table->string('grapaDobleAla')->nullable();
            // $table->string('mastil')->nullable();
            // $table->string('pachtcord')->nullable();
            // $table->string('adicional1')->nullable();
            // $table->string('adicional2')->nullable();
            // $table->string('adicional3')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
            ->references('id')
            ->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actas');
    }
}
