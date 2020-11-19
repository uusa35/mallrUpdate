<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercials', function (Blueprint $table) {
            $table->id('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('caption_ar')->nullable();
            $table->string('caption_en')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('path')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('on_home')->default(0);
            $table->boolean('is_double')->default(0);
            $table->boolean('is_triple')->default(0);
            $table->boolean('active')->default(0);
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
        Schema::drop('commercials');
    }
}
