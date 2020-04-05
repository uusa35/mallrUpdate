<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->text('content_ar')->nullable();
            $table->text('content_en')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('on_menu_desktop')->default(1);
            $table->boolean('on_menu_mobile')->default(1);
            $table->boolean('on_footer')->default(1);
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
        Schema::drop('pages');
    }
}
