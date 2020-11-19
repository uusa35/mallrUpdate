<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullalbe();
            $table->string('slug_ar')->nullalbe();
            $table->string('slug_en')->nullalbe();

            $table->boolean('active')->default(1);
            $table->string('order')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            //$table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreignId('country_id')->references('id')->on('governates')->cascadeOnDelete();
            //$table->integer('governate_id')->unsigned()->index()->nullable();
            $table->foreignId('governate_id')->references('id')->on('governates')->cascadeOnDelete();

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
        Schema::drop('areas');
    }
}
