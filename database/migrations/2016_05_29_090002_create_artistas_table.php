<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('instrumento');
            $table->integer('albumid')->unsigned();
            $table->timestamps();
        });

        //relation to album
        Schema::table('artistas', function(Blueprint $table){
            $table->foreign('albumid')->references('id')->on('albumes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artistas');
    }
}
