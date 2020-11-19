<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeRolePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_role', function (Blueprint $table) {
            //$table->integer('privilege_id')->unsigned()->index();
            $table->foreignId('privilege_id')->references('id')->on('privileges')->cascadeOnDelete();
            //$table->integer('role_id')->unsigned()->index();
            $table->foreignId('role_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->boolean('index')->default(0);
            $table->boolean('view')->default(0);
            $table->boolean('create')->default(0);
            $table->boolean('update')->default(0);
            $table->boolean('delete')->default(0);
            $table->primary(['privilege_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('privilege_role');
    }
}
