<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_groups', function (Blueprint $table) {
            $table->id('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('is_multi')->default(0);
            $table->integer('order')->unsigned()->nullable();

//            $table->integer('category_id')->unsigned()->index();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::drop('category_groups');
    }
}
