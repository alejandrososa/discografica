<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert data
        DB::table('albumes')->insert(['titulo' => 'La Cantora de Ilerda', 'fecha' => '2009-03-23']);
        DB::table('artistas')->insert(['nombre' => 'Ilerdita Sánchez', 'instrumento' => 'Voz', 'albumid' => 1]);
        DB::table('artistas')->insert(['nombre' => 'Eustaquio Expósito', 'instrumento' => 'Guitarra Flamenca', 'albumid' => 1]);
        DB::table('artistas')->insert(['nombre' => 'Cachito Cachondeo', 'instrumento' => 'Palmas', 'albumid' => 1]);

        DB::table('albumes')->insert(['titulo' => 'Historia de la Guitarra Española', 'fecha' => '2010-05-14']);
        DB::table('artistas')->insert(['nombre' => 'Abel Abrera', 'instrumento' => 'Laud', 'albumid' => 2]);
        DB::table('artistas')->insert(['nombre' => 'Berta Barros', 'instrumento' => 'Vihuela', 'albumid' => 2]);
        DB::table('artistas')->insert(['nombre' => 'Diego Dominguez', 'instrumento' => 'Guitarra', 'albumid' => 2]);
        DB::table('artistas')->insert(['nombre' => 'Eustaquio Expósito', 'instrumento' => 'Guitarra Flamenca', 'albumid' => 2]);
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
