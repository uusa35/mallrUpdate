<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->integer('parent_id')->unsigned()->default(0)->index();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('caption_ar')->nullable();
            $table->string('caption_en')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->mediumText('description_ar')->nullable();

            $table->boolean('limited')->default(0);
            $table->boolean('on_home')->default(0);
            $table->boolean('on_new')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_service')->default(0);
            $table->boolean('is_product')->default(0);
            $table->boolean('is_commercial')->default(0);
            $table->boolean('is_user')->default(0);
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('active')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void'
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
