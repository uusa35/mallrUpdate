<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id('id');
            //$table->integer('product_id')->unsigned()->index();
            //$table->integer('size_id')->unsigned()->index()->nullable();
            //$table->integer('color_id')->unsigned()->index()->nullable();
            $table->integer('qty')->unsigned()->default(0);
            $table->text('notes_ar')->nullable();
            $table->text('notes_en')->nullable();

            $table->foreignId('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('size_id')->references('id')->on('sizes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('color_id')->references('id')->on('colors')->onDelete('restrict')->onUpdate('restrict');
            $table->unique(['product_id','size_id','color_id']);
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
        Schema::drop('product_attributes');
    }
}
