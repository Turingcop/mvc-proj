<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDicehistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicehistory', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('value');
            $table->integer('count');
        });

        DB::table('dicehistory')->insert(['value' => 1, 'count' => 0]);
        DB::table('dicehistory')->insert(['value' => 2, 'count' => 0]);
        DB::table('dicehistory')->insert(['value' => 3, 'count' => 0]);
        DB::table('dicehistory')->insert(['value' => 4, 'count' => 0]);
        DB::table('dicehistory')->insert(['value' => 5, 'count' => 0]);
        DB::table('dicehistory')->insert(['value' => 6, 'count' => 0]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dicehistory');
    }
}
