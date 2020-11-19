<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('sku')->nullable();
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('on_new')->default(0);
            $table->boolean('home_delivery_availability')->default(0);
            $table->boolean('shipment_availability')->default(0);
            $table->string('delivery_time')->nullable();
            $table->boolean('exclusive')->default(0);
            $table->boolean('on_sale')->default(0);
            $table->boolean('on_home')->default(0);
            $table->boolean('is_available')->default(0);
            $table->decimal('price', 6, 2)->unsigned();
            $table->decimal('weight', 4, 2)->unsigned();
            $table->decimal('sale_price', 6, 2)->unsigned()->nullable();
            $table->string('size_chart_image')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('notes_ar')->nullable();
            $table->text('notes_en')->nullable();
            $table->string('keywords')->nullable();
            $table->string('image')->nullable();
            $table->string('video_url_one')->nullable();
            $table->string('video_url_two')->nullable();
            $table->string('video_url_three')->nullable();
            $table->string('video_url_four')->nullable();
            $table->string('video_url_five')->nullable();

            $table->dateTime('start_sale')->nullable();
            $table->dateTime('end_sale')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('check_stock')->default(1);
            $table->boolean('is_hot_deal')->default(0);
            $table->boolean('has_attributes')->default(0);
            $table->boolean('show_attribute')->default(0);

            $table->integer('qty')->unsigned()->nullable();

            // $table->integer('user_id')->unsigned()->index();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate(); // company that own this product ? !!

            // $table->integer('brand_id')->unsigned()->index()->nullable();
            $table->foreignId('brand_id')->references('id')->on('brands');

            // $table->integer('color_id')->unsigned()->index()->nullable();
            $table->foreignId('color_id')->references('id')->on('colors');

            // $table->integer('size_id')->unsigned()->index()->nullable();
            $table->foreignId('size_id')->references('id')->on('sizes');

            // $table->integer('shipment_package_id')->unsigned()->index()->nullable();
            $table->foreignId('shipment_package_id')->references('id')->on('shipment_packages');

            $table->integer('views')->unsigned()->default(1);
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
        Schema::drop('products');
    }
}
