<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertColorsInColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colors', function (Blueprint $table) {
             DB::table('colors')->delete();

             DB::table('colors')->insert(array(
                array(
                'name' => 'blanc',
                'code' => '#FFFFFF00'
                ),
                array(
                'name' => 'violine',
                'code' => '#DDB8ED'
                ),
                array(
                'name' => 'rose_claire',
                'code' => '#F5B6C8'
                ),
                array(
                'name' => 'bleu_ciel',
                'code' => '#B0EBFA'
                ),
                array(
                'name' => 'jaune',
                'code' => '#F7F8B0'
                ),
                array(
                'name' => 'gris',
                'code' => '#DFDDC7'
                ),
                array(
                'name' => 'orange',
                'code' => '#FBC58E'
                ),
                array(
                'name' => 'turquoise',
                'code' => '#B6EDD6'
                ),
                array(
                'name' => 'framboise',
                'code' => '#FF7790'
                )
              ));
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors', function (Blueprint $table) {
            //
        });
    }
}
