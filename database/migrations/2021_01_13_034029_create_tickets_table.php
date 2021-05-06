<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
           
               
            $table->boolean('active')->default(1);
            // $table->string('file')->nullable();
            $table->string('mensaje');
            $table->unsignedBigInteger('user_id')->nullable();//quien lo creo
            $table->unsignedBigInteger('cliente_id')->nullable();           //cliente q se asigna 
            $table->unsignedBigInteger('project_id')->default(1);   //projecto perteneciente
            $table->unsignedBigInteger('level_id');    //level perteneciente                                                                   
            $table->unsignedBigInteger('support_id')->nullable();     //user asiganado                                                                                                               
            // $table->unsignedBigInteger('comentario_id')->nullable();  // mensajes cambio a comentario   
            //nuevas
            $table->unsignedBigInteger('tipologia_id')->nullable(); //tabla tipologia
            $table->unsignedBigInteger('peticion_id')->nullable();    //tabla peticiones 
            $table->unsignedBigInteger('medio_id');  //tabla medios de atencion 

            // end nuevas
            // foraneas
            $table->foreign('user_id')//para saber quien lo creo
            ->references('id')
            ->on('users')->onDelete('set null');

            $table->foreign('cliente_id')//cliete q se asigna
            ->references('id')
            ->on('clientes');
            
            $table->foreign('project_id')
            ->references('id')->on('projects');

            $table->foreign('level_id')
            ->references('id')->on('levels');

            $table->foreign('support_id')
            ->references('id')->on('users')->onDelete('set null');
            // $table->unsignedBigInteger('level_id');
            // $table->unsignedBigInteger('project_id');
            
            $table->foreign('tipologia_id')
            ->references('id')->on('tipologias');

            $table->foreign('peticion_id')            
            ->references('id')->on('peticions');

            $table->foreign('medio_id')
            ->references('id')->on('medio_atencions');
            $table->timestamps();

            // $table->foreign('comentario_id')//cliete q se asigna
            // ->references('id')
            // ->on('comentarios')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
