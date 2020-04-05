<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryShipmentPackagePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_shipment_package', function (Blueprint $table) {
            $table->integer('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('shipment_package_id')->unsigned()->index();
            $table->foreign('shipment_package_id')->references('id')->on('shipment_packages')->onDelete('cascade');
            $table->primary(['country_id', 'shipment_package_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('country_shipment_package');
    }
}
