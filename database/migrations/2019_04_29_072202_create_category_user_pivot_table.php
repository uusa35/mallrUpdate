<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_user', function (Blueprint $table) {
            //$table->integer('category_id')->unsigned()->index();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->integer('user_id')->unsigned()->index();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['category_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_user');
    }
}
