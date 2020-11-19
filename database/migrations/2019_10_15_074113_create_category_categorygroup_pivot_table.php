<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCategoryGroupPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_category_groups', function (Blueprint $table) {
            //$table->integer('category_id')->unsigned()->index();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            //$table->integer('category_group_id')->unsigned()->index()->nullable();
            $table->foreignId('category_group_id')->references('id')->on('category_groups')->onDelete('cascade');
            $table->primary(['category_id', 'category_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_category_groups');
    }
}
