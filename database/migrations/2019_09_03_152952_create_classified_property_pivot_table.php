<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedPropertyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classified_property', function (Blueprint $table) {
            $table->integer('classified_id')->unsigned()->index();
            $table->foreign('classified_id')->references('id')->on('classifieds')->onDelete('cascade');
            $table->integer('category_group_id')->unsigned()->index();
            $table->foreign('category_group_id')->references('id')->on('category_groups')->onDelete('cascade');
            $table->integer('property_id')->unsigned()->index();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->string('value')->nullable();
            $table->primary(['classified_id','category_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classified_property');
    }
}
