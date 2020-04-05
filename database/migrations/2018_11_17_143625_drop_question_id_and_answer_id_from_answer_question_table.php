<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropQuestionIdAndAnswerIdFromAnswerQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('answer_question');
        Schema::create('answer_question', function (Blueprint $table) {
            $table->integer('answer_id')->unsigned()->nullable();
//            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->nullable();
//            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_question', function (Blueprint $table) {
            //
        });
    }
}
