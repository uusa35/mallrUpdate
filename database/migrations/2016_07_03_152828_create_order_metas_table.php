<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_metas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('qty')->unsigned();
            // price of the product / service  on the time the order is made (sale price in case on_sale applied)
            $table->decimal('price', 6, 2)->unsigned();
            $table->decimal('shipment_cost',6,2)->unsigned()->nullable();
            $table->text('notes')->nullable();

            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');

            $table->string('item_type')->nullable();
            $table->string('item_name')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();

            $table->integer('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');

            $table->date('service_date')->nullable();
            $table->time('service_time')->nullable();

            $table->integer('product_attribute_id')->unsigned()->index()->nullable();
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('collection_id')->unsigned()->index()->nullable();
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('service_id')->unsigned()->index()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('destination_id')->unsigned()->index()->nullable();
            $table->foreign('destination_id')->references('id')->on('countries')->onDelete('restrict')->onUpdate('restrict');


            $table->integer('timing_id')->unsigned()->index()->nullable();
            $table->foreign('timing_id')->references('id')->on('timings')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('questionnaire_id')->unsigned()->nullable();
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('merchant_id')->unsigned()->index()->nullable();
            $table->foreign('merchant_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::drop('order_metas');
    }
}
