<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_user', function (Blueprint $table) {
            //$table->integer('area_id')->unsigned()->index();
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
            //$table->integer('user_id')->unsigned()->index();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['area_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('area_user');
    }
}
