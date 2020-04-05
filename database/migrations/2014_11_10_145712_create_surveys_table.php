<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->mediumText('description_ar')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->boolean('is_home')->default(0);
            $table->boolean('on_sale')->default(0);
            $table->boolean('is_desktop')->default(0);
            $table->boolean('is_footer')->default(0);
            $table->boolean('is_order')->default(0);
            $table->decimal('price', 6, 2)->unsigned();
            $table->decimal('net_price', 6, 2)->unsigned();
            $table->boolean('active')->default(1);
            $table->integer('order')->unsigned()->nullable();


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
        Schema::drop('surveys');
    }
}
