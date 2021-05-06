<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('acta_id')->nullable();

            
            $table->foreign('ticket_id')
            ->references('id')->on('tickets')->onDelete('cascade');
            
            $table->foreign('acta_id')
            ->references('id')->on('actas')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
}
