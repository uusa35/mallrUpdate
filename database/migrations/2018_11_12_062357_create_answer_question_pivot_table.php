<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_question', function (Blueprint $table) {
            $table->integer('answer_id')->unsigned()->index();
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->primary(['answer_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answer_question');
    }
}
