<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('id');
            // member is the person who is doing the Rate
            //$table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreignId('user_id')->references('id')->on('users');

            // the person who is receiving the rate
            //$table->integer('member_id')->unsigned()->index()->nullable();
            $table->foreignId('member_id')->references('id')->on('users');

            $table->integer('value')->unsigned()->nullable();

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
        Schema::dropIfExists('ratings');
    }
}
