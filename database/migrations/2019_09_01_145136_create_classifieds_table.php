<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifieds', function (Blueprint $table) {
            $table->id('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->mediumText('description_ar')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 6, 2)->unsigned();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('block')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('apartment')->nullable();
            $table->integer('rooms')->unsigned()->nullable();
            $table->integer('bathroom')->unsigned()->nullable();
            $table->integer('years_old')->unsigned()->nullable();
            $table->string('keywords')->nullable();

            $table->string('path')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            $table->string('years_experience')->nullable();
            $table->string('video_url_one')->nullable();
            $table->string('video_url_two')->nullable();
            $table->string('video_url_three')->nullable();
            $table->string('video_url_four')->nullable();
            $table->string('video_url_five')->nullable();

            $table->boolean('active')->default(1);
            $table->boolean('on_home')->default(0);
            $table->boolean('is_property')->default(0); // is_real_estate
            $table->boolean('is_negotiable')->default(0);
            $table->boolean('is_available')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->boolean('exclusive')->default(0); //
            $table->boolean('is_exclusive')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('has_balcony')->default(0);
            $table->boolean('only_whatsapp')->default(0);


            //$table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');

            //$table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');

            //$table->integer('governate_id')->unsigned()->index()->nullable();
            $table->foreignId('governate_id')->references('id')->on('governates')->onDelete('cascade');

            //$table->integer('area_id')->unsigned()->index()->nullable();
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');

            //$table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('views')->unsigned()->default(1);
            $table->dateTime('expired_at')->nullable();
            $table->rememberToken();
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('classifieds');
        Schema::enableForeignKeyConstraints();
    }
}
