<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->mediumText('caption_en')->nullable();
            $table->mediumText('caption_ar')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->mediumText('description_ar')->nullable();
            $table->boolean('active')->default(1);
            $table->string('image')->nullable();
            $table->boolean('exclusive')->default(0);
            $table->boolean('is_multi')->default(0);
            $table->integer('order')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('addons');
    }
}
