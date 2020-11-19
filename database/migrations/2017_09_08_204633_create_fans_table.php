<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->id('id');
            // the company / user receiving the fan
            //$table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            // the person who did the fan
            //$table->integer('fan_id')->unsigned()->index()->nullable();
            $table->foreignId('fan_id')->references('id')->on('users')->onDelete('cascade');

            //$table->integer('product_id')->unsigned()->index()->nullable();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');

            //$table->integer('service_id')->unsigned()->index()->nullable();
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');

            //$table->integer('collection_id')->unsigned()->index()->nullable();
            $table->foreignId('collection_id')->references('id')->on('collections')->onDelete('cascade');

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
        Schema::dropIfExists('fans');
    }
}
