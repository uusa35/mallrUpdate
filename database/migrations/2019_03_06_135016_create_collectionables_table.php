<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectionables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id')->index()->unsigned();
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('collectionable_id')->index();
            $table->string('collectionable_type');
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
        Schema::drop('collectionables');
    }
}
