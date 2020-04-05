<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->nullable();
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('on_sale')->default(0);
            $table->boolean('exclusive')->default(0);
            $table->boolean('on_home')->default(0);
            $table->boolean('on_new')->default(0);
            $table->integer('duration')->default(1);
            $table->integer('setup_time')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->integer('individuals')->unsigned()->nullable();
            $table->decimal('delivery_charge', 6, 2)->unsigned()->default(0);
            $table->decimal('price', 6, 2)->unsigned();
            $table->decimal('sale_price', 6, 2)->unsigned()->nullable();
            $table->mediumText('description_en')->nullable();
            $table->mediumText('description_ar')->nullable();
            $table->mediumText('notes_ar')->nullable();
            $table->mediumText('notes_en')->nullable();
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
            $table->boolean('is_available')->default(1);
            $table->boolean('is_hot_deal')->default(0);
            $table->boolean('multi_booking')->default(0);
            $table->integer('booking_limit')->default(0);

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('views')->unsigned()->default(1);
            $table->softDeletes();
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
        Schema::drop('services');
    }
}
