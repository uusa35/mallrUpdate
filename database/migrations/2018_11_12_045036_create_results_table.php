<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id('id');

            //$table->integer('question_id')->unsigned()->index();
            $table->foreignId('question_id')->references('id')->on('questions');


            //$table->integer('answer_id')->unsigned()->index()->nullable();
            $table->foreignId('answer_id')->references('id')->on('answers');

            //$table->integer('questionnaire_id')->unsigned()->index();
            $table->foreignId('questionnaire_id')->references('id')->on('questionnaires');

            $table->mediumText('questioned')->nullable();
            $table->mediumText('answered')->nullable();

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
        Schema::drop('results');
    }
}
