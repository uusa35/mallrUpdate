<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('active')->default(1);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            $table->integer('area_id')->unsigned()->index()->nullable();
            $table->foreign('area_id')->references('id')->on('areas');

            // did not use , just made in case company may have branches related to other countries.
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('branches');
    }
}
