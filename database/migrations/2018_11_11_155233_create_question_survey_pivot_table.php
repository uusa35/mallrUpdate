<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSurveyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_survey', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('survey_id')->unsigned()->index();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
            $table->primary(['question_id', 'survey_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question_survey');
    }
}
