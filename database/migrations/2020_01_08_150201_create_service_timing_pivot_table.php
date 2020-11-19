<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceTimingPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_timing', function (Blueprint $table) {
//            $table->integer('service_id')->unsigned()->index();
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
//            $table->integer('timing_id')->unsigned()->index();
            $table->foreignId('timing_id')->references('id')->on('timings')->onDelete('cascade');
            $table->primary(['service_id', 'timing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_timing');
    }
}
