<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullalbe();
            $table->string('email')->nullalbe();
            $table->string('mobile')->nullalbe();
            $table->dateTime('event_time')->nullalbe();
            $table->integer('total_individuals')->nullalbe();
            $table->integer('budget_individual')->nullalbe();

            $table->integer('area_id')->unsigned()->index();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade')->onUpdate('cascade');

            $table->string('type')->nullalbe();
            $table->string('status')->nullalbe();

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
        Schema::drop('quotes');
    }
}
