<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            // the one that answered by clients which contains results
            $table->id('id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('notes')->nullable();
            $table->decimal('price', 6, 2)->unsigned();
            $table->decimal('net_price', 6, 2)->unsigned();
            $table->boolean('is_order')->nullable()->default(0);


            //$table->integer('survey_id')->unsigned()->index()->nullable();
            $table->foreignId('survey_id')->references('id')->on('surveys')->cascadeOnUpdate()->cascadeOnDelete();

            // person that quetionnaire was directed to
            //$table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

            // person who is answering the questionnaire
            //$table->integer('client_id')->unsigned()->index()->nullable();
            $table->foreignId('client_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::drop('questionnaires');
    }
}
