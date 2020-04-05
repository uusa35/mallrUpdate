<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValueToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->boolean('is_checkbox')->default(1);
            $table->boolean('is_text')->default(0);
            $table->string('value')->nullable();
            $table->boolean('on_home')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('is_checkbox');
            $table->dropColumn('is_text');
            $table->dropColumn('value');
            $table->dropColumn('on_home');
        });
    }
}
