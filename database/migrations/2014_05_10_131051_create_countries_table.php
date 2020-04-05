<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('has_currency')->default(0);
            $table->string('currency_symbol_ar', 25)->nullable();
            $table->string('currency_symbol_en', 25)->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('is_local')->default(0);
            $table->boolean('minimum_shipment_charge')->default(0);
            $table->boolean('fixed_shipment_charge')->default(0);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
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
        Schema::drop('countries');
    }
}
