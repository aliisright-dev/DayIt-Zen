<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertMonthsInMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('months', function (Blueprint $table) {
            DB::table('months')->delete();

             DB::table('months')->insert(array(
                array(
                'number' => '1',
                'name' => 'Janvier'
                ),
                array(
                'number' => '2',
                'name' => 'Février'
                ),
                array(
                'number' => '3',
                'name' => 'Mars'
                ),
                array(
                'number' => '4',
                'name' => 'Avril'
                ),
                array(
                'number' => '5',
                'name' => 'Mai'
                ),
                array(
                'number' => '6',
                'name' => 'Juin'
                ),
                array(
                'number' => '7',
                'name' => 'Juillet'
                ),
                array(
                'number' => '8',
                'name' => 'Août'
                ),
                array(
                'number' => '9',
                'name' => 'Septembre'
                ),
                array(
                'number' => '10',
                'name' => 'Octobre'
                ),
                array(
                'number' => '11',
                'name' => 'Novembre'
                ),
                array(
                'number' => '12',
                'name' => 'Décembre'
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
        Schema::dropIfExists('months');
    }
}
