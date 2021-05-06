<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acta_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acta_id');
            $table->unsignedBigInteger('material_id')->nullable();
            $table->integer('stock')->nullable();
            $table->timestamps();

            
            $table->foreign('acta_id')
            ->references('id')
            ->on('actas')
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
        Schema::dropIfExists('acta_material');
    }
}
