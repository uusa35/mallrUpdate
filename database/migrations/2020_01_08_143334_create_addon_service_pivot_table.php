<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddonServicePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon_service', function (Blueprint $table) {
            //$table->integer('addon_id')->unsigned()->index();
            $table->foreignId('addon_id')->references('id')->on('addons')->onDelete('cascade');
            //$table->integer('service_id')->unsigned()->index();
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->primary(['addon_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addon_service');
    }
}
