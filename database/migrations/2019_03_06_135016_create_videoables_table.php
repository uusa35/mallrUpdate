<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoables', function (Blueprint $table) {
            $table->id('id');
            //$table->integer('video_id')->index()->unsigned();
            $table->foreignId('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('videoable_id')->index();
            $table->string('videoable_type');
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
        Schema::drop('videoables');
    }
}
