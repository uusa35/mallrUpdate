<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChargesToShipmentPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipment_packages', function (Blueprint $table) {
            $table->decimal('charge_one', 6, 2)->unsigned()->nullable();
            $table->decimal('charge_two', 6, 2)->unsigned()->nullable();
            $table->decimal('charge_three', 6, 2)->unsigned()->nullable();
            $table->decimal('charge_four', 6, 2)->unsigned()->nullable();
            $table->decimal('charge_five', 6, 2)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment_packages', function (Blueprint $table) {
            $table->dropColumn('charge_one');
            $table->dropColumn('charge_two');
            $table->dropColumn('charge_three');
            $table->dropColumn('charge_four');
            $table->dropColumn('charge_five');
        });
    }
}
