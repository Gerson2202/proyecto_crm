<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoequipo_id')->nullable(); //TIPO DE EQUIPO
            $table->string('codigo')->unique();
            
            $table->string('serial')->nullable()->unique(); 
            $table->unsignedBigInteger('user_id')->nullable(); 

            $table->string('mac')->nullable()->unique(); 
            $table->string('estado')->nullable();
            $table->longText('observacion')->nullable();
            $table->longText('destino');           
            $table->date('fecha')->nullable();            
            $table->integer('factura_id')->unsigned()->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('set null');           
            // $table->string('img')->nullable();

            $table->string('ip')->nullable();
            $table->string('winbox')->nullable();
            $table->string('ssid')->nullable();
            $table->string('otro')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('nodo_id')->nullable();

            $table->unsignedBigInteger('sede_id')->nullable();
            
            $table->foreign('cliente_id')
                        ->references('id')
                        ->on('clientes')
                        ->onDelete('set null');

            $table->foreign('nodo_id')->references('id')->on('nodos')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('tipoequipo_id')->references('id')->on('tipoequipos')->onDelete('set null');
            $table->foreign('sede_id')
            ->references('id')
            ->on('sedes')
            ->onDelete('set null');
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
        Schema::dropIfExists('equipos');
    }
}
