<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('notes_ar')->nullable();
            $table->string('notes_en')->nullable();
            $table->boolean('is_multi')->default(1);
            $table->boolean('is_text')->default(0);
            $table->boolean('is_dropdown')->default(0);
            $table->boolean('active')->default(0);
            $table->integer('order')->unsigned();
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
        Schema::drop('questions');
    }
}
