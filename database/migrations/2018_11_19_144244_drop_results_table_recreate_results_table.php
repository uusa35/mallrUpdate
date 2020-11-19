<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropResultsTableRecreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('results');
        Schema::create('results', function (Blueprint $table) {
            $table->id('id');
//            ->onUpdate('cascade')->onDelete('cascade')
            // means that when deleting or updating a question .. the result will be deleted

            //$table->integer('question_id')->unsigned()->index()->nullable();
            $table->foreignId('question_id')->references('id')->on('questions');


            //$table->integer('answer_id')->unsigned()->index()->nullable();
            $table->foreignId('answer_id')->references('id')->on('answers');

            //$table->integer('questionnaire_id')->unsigned()->index()->nullable();
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
        Schema::table('results', function (Blueprint $table) {
            //
        });
    }
}
