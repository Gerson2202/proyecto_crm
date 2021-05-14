<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            // datos personales
            $table->string('ced')->unique();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo')->unique(); //para que no se repitase una unique
            $table->string('municipio');
            $table->string('calle');
            $table->integer('estrato');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->string('tipo_servicio');
            // $table->string('cant_megas');
            $table->string('reuso')->nullable();
            $table->string('tecnologia');
            $table->string('canon');
            $table->string('estado');
            $table->string('documento')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->unique();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->softDeletes();
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
        Schema::dropIfExists('clientes');
    }
}
