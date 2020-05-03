<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShipmentFixedRateToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('shipment_fixed_rate')->default(1);
            $table->decimal('shipment_fuel_percentage', 4, 2)->unsigned()->default(0.01);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('shipment_fixed_rate');
            $table->dropColumn('shipment_fuel_percentage');
        });
    }
}
