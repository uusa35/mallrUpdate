<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHasAddsonToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('has_addons')->default(0);
            $table->boolean('has_only_items')->default(0);
            $table->boolean('force_original_price')->default(1);
            $table->boolean('is_package')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('has_addons');
            $table->dropColumn('has_only_items');
            $table->dropColumn('force_original_price');
            $table->dropColumn('is_package');
        });
    }
}
