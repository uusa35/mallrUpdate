<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id('id');
            //$table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            //$table->integer('product_id')->unsigned()->index()->nullable();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');

            //$table->integer('service_id')->unsigned()->index()->nullable();
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('favorites');
    }
}
