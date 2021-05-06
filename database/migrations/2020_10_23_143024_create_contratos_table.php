<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            
                $table->id();
                $table->string('cod_contrato')->unique();
                $table->string('tipo');
                $table->date('fecha');
                $table->string('documento')->nullable();
                $table->unsignedBigInteger('cliente_id')->nullable();
                
                $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
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
        Schema::dropIfExists('contratos');
    }
}
