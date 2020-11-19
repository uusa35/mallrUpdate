<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('caption_en')->nullable();
            $table->string('caption_ar')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('order')->nullable();
            $table->string('url')->nullable();
            $table->boolean('on_home')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
