<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('caption_en')->nullable();
            $table->string('caption_ar')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('order')->nullable();
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->string('url')->nullable();
            $table->boolean('on_home')->default(0);
            $table->boolean('is_video')->default(1);
            $table->boolean('is_intro')->default(0);
            $table->morphs('slidable');

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
        Schema::drop('slides');
    }
}
