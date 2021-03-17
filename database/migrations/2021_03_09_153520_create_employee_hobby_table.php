<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeHobbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('employee_hobby', function (Blueprint $table) {
            $table->primary(['employee_id', 'hobby_id']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('hobby_id');
            $table->timestamps();


            $table->foreign('employee_id')
                ->references('id')
                ->on('employee')
                ->onDelete('cascade');
            $table->foreign('hobby_id')
                ->references('id')
                ->on('hobby')
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
        Schema::dropIfExists('employee_hobby');
    }
}
