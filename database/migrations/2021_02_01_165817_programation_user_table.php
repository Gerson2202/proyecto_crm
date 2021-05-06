<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programation_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('programation_id')->nullable();
           
            $table->foreign('user_id')
            ->references('id')
            ->on('users')->onDelete('set null');
            $table->foreign('programation_id')
            ->references('id')
            ->on('programations')->onDelete('cascade');

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
        //
    }
}
