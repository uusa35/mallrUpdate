<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id');
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('path')->nullable();
            $table->morphs('commentable');
            $table->boolean('active')->default(1);
            $table->boolean('viewed')->nullable();
            $table->integer('likes')->nullable();

            //$table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); // company that own this product ? !!
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
        Schema::drop('comments');
    }
}
