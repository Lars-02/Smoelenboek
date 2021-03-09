<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbilityRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_roles', function (Blueprint $table) {
           $table->primary(['role_id', 'ability_id']);
           $table->unsignedBigInteger('ability_id');
           $table->unsignedBigInteger('role_id');
           $table->timestamps();

           $table->foreign('ability_id')
               ->references('id')
               ->on('abilities')
               ->onDelete('cascade');
           $table->foreign('role_id')
               ->references('id')
               ->on('roles')
               ->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability_roles');
    }
}
