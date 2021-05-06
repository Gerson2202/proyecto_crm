<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_salida', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salida_id');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->integer('stock')->nullable();
            $table->timestamps();

            
            $table->foreign('salida_id')
            ->references('id')
            ->on('salidas')
            ->onDelete('cascade');

            $table->foreign('material_id')
            ->references('id')
            ->on('materials')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_salida');
    }
}
