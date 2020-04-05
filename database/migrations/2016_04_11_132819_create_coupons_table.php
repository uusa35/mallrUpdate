<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value')->unsigned()->default(0);
            $table->boolean('is_percentage')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('consumed')->default(0);
            $table->string('code');
            // price after sale
            $table->integer('minimum_charge')->nullable();
            $table->boolean('is_permanent')->default(0);
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('due_date')->nullable();
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
        Schema::drop('coupons');
    }
}
