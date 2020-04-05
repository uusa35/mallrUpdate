<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIsPropertyToClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classifieds', function (Blueprint $table) {
            $table->dropColumn('exclusive');
            $table->dropColumn('is_property');
            $table->boolean('is_real_estate')->after('is_paid')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classifieds', function (Blueprint $table) {
            $table->dropColumn('is_real_estate');
        });
    }
}
