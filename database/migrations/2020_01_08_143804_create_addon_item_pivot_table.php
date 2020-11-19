<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddonItemPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon_item', function (Blueprint $table) {
            //$table->integer('addon_id')->unsigned()->index();
            $table->foreignId('addon_id')->references('id')->on('addons')->onDelete('cascade');
            //$table->integer('item_id')->unsigned()->index();
            $table->foreignId('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->primary(['addon_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addon_item');
    }
}
