<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acta_equipo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salida_id')->nullable();
            $table->unsignedBigInteger('ingreso_id')->nullable();
            $table->unsignedBigInteger('acta_id');
            $table->timestamps();

            $table->foreign('salida_id')
            ->references('id')
            ->on('equipos')->onDelete('set null');

            $table->foreign('ingreso_id')
            ->references('id')
            ->on('equipos')->onDelete('set null');
          

            $table->foreign('acta_id')
            ->references('id')
            ->on('actas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acta_equipo');
    }
}
