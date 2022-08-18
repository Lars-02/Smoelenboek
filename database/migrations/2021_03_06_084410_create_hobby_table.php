<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('employee_hobby', function (Blueprint $table) {
            $table->primary(['employee_id', 'hobby_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('hobby_id');


            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->cascadeOnDelete();
            $table->foreign('hobby_id')
                ->references('id')
                ->on('hobbies')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobbies');
        Schema::dropIfExists('employee_hobby');
    }
}
